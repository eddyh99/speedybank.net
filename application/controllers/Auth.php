<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = NAMETITLE . " - Digital Bank";
		$data['extra'] = "auth/landingpage/js/js_index";

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/index');
		$this->load->view('tamplate/footer', $data);
	}

	public function page404()
	{
		$this->output->set_status_header('404');
		$data['title'] = NAMETITLE . " - 404 Page Not Found";
		$data['extra'] = "auth/landingpage/js/js_index";

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/404');
		$this->load->view('tamplate/footer', $data);
	}

	public function login()
	{
		$this->session->unset_userdata('referral');
		$data['title'] = NAMETITLE . " - Login";

		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/login');
		$this->load->view('tamplate/footer');
	}

	public function signup()
	{
		if (@$_GET['ref']) {
			$ref = @$_GET['ref'];
			$this->input->set_cookie("ref", @$ref, time()+60 * 60 * 24);
			redirect('auth/signup');
		}
		$data['title'] = NAMETITLE . " - Signup";

		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/signup');
		$this->load->view('tamplate/footer');
		$this->load->view('auth/js/js_signup');
	}

	public function register()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
		$userIp = $this->input->ip_address();
		$secret = $this->config->item('google_secret');
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);

		$status = json_decode($output, true);

		if (!$status['success']) {
			$this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
			redirect(base_url() . "auth/signup");
		}

		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('confirmemail', 'Confirm Email', 'trim|required|valid_email|matches[email]');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[9]|max_length[15]');
		$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'trim|required|matches[pass]');
		$this->form_validation->set_rules('referral', 'Referral', 'trim');

		if (@$this->security->xss_clean($this->input->post("referral"))) {
			$ref = $this->security->xss_clean($this->input->post("referral"));
			$this->input->set_cookie("ref", @$ref, 60 * 60 * 24);
		}

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
			$this->session->set_flashdata('email', set_value('email'));
			$this->session->set_flashdata('confirmemail', set_value('confirmemail'));
			redirect(base_url() . "auth/signup");
			return;
		}

		$input		= $this->input;
		$email		= $this->security->xss_clean($input->post("email"));
		$pass		= $this->security->xss_clean($input->post("pass"));
		$referral	= $this->security->xss_clean($input->post("referral"));
		$time_location = $this->security->xss_clean($input->post("time_location"));

		if (empty($time_location)) {
			$time_location = "Asia/Singapore";
		}

		if ($referral == "sp33dy34") {
			$referral = NULL;
		}

		if (!preg_match('/(?=[A-Za-z0-9!@#$%^&*\-_=+]+$)^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*(?:[^!@#$%^&*\-_=+]*[!@#$%^&*\-_=+]){2})(?=.{9,}).*$/', $pass) == true) {
			$this->session->set_flashdata('failed', "Invalid Password. Password should contain 1 Uppercase, 1 lowercase, 1 Numeric and 2 Special Charaters");
			redirect(base_url('auth/signup'));
			return;
		}

		$mdata = array(
			'email'     => $email,
			'password'  => $pass,
			'referral'  => $referral,
			'timezone'  => $time_location
		);

		$url = URLAPI . "/v1/auth/register";
		$result = apitrackless($url, json_encode($mdata));
		if ($result->code == 200) {
			//kirim email registrasi

			$subject = "SpeedyBank Registration";
			$message = "Thank you for registering on SpeedyBank<br><br>
			username : " . $email . "<br>
			password : (your chosen password)<br><br>
			click this <a href='" . base_url("auth/activate?token=") . $result->message->token . "'>link</a> to activate your account<br><br>
			";

			$urlqr = base_url() . 'wallet/send?' . base64_encode('cur=' . @$_SESSION["currency"] . '&ucode=' . $result->message->ucode);
			sendmail($email, $subject, $message, $this->phpmailer_lib->load());
			$this->qrcodeuser($result->message->ucode);
			$this->qrcodereceive($urlqr, $result->message->ucode);

			$this->session->unset_userdata('referral');
			$this->session->set_flashdata('success', "<p style='color:black'>You have successfully register</p>");
			redirect(base_url() . "auth/signup_notif");
			return;
		} else {
			$this->session->set_flashdata('failed', $result->message);
			redirect(base_url() . "auth/signup");

			return;
		}
	}

	public function signup_notif()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$data['title'] = NAMETITLE . " - Succes Signup";

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/signup-notif');
		$this->load->view('tamplate/footer');
	}

	public function activate()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$token = $this->security->xss_clean($this->input->get('token'));
		$url = URLAPI . "/v1/auth/activate?token=" . $token;
		$result = apitrackless($url);

		if (!empty(@$result->code == 200)) {
			$this->session->set_flashdata('success', "<p style='color:black'>Activation success</p>");
			redirect(base_url() . "auth/login");
			return;
		} else {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . $result->message . "</p>");
			redirect(base_url() . "auth/login");
			return;
		}
	}

	public function auth_login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', validation_errors());
			redirect(base_url() . "auth/login");
			return;
		}

		$uname = $this->security->xss_clean($this->input->post('email'));
		$pass = $this->security->xss_clean($this->input->post('password'));

		$mdata = array(
			'email' => $uname,
			'password' => sha1($pass)
		);

		$url = URLAPI . "/v1/auth/signin";
		$result = apitrackless($url, json_encode($mdata));
		if (@$result->code != 200) {
			$this->session->set_flashdata('failed', $result->message);
			redirect(base_url() . "auth/login");
			return;
		}

		$userid = $result->message->id;

		$session_data = array(
			'user_id'   => $userid,
			'role'      => $result->message->role,
			'time_location' => $result->message->time_location,
			'currency'  => "USD",
			'symbol'    => "&dollar;",
			'ucode'     => @$result->message->ucode,
			'referral'  => @$result->message->refcode
		);
		$this->session->set_userdata($session_data);
		if ($result->message->role == 'member') {
			$src = base_url() . 'qr/user/' . $result->message->ucode . '.png';
			// $srcr = base_url() . 'qr/receive/' . $result->message->ucode . '.png';
			if (@getimagesize($src) == FALSE) {
				$this->qrcodeuser($result->message->ucode);
			}

			$srcref = base_url() . 'qr/ref/' . $result->message->ucode . '.png';
			$refurl = base_url() . "auth/signup?ref=" . $result->message->refcode;
			if (@getimagesize($srcref) == FALSE) {
				$this->qrcoderef($refurl, $result->message->ucode);
			}

			$srcrefwlogo = base_url() . 'qr/ref/' . $result->message->ucode . 'wlogo.png';
			if (@getimagesize($srcrefwlogo) == FALSE) {
				$this->ciqrcode->addLogo($result->message->ucode, '/qr/ref/', '/assets/img/speedybank/logoQR.png');
			}

			if (empty($this->session->userdata('wallet_req'))) {
				redirect("homepage");
			} else {
				$get_url = str_replace(base_url(LINKQRCODE . "?"), "", $_SESSION['wallet_req']);
				$decode_url = base64_decode($get_url);

				// Get currency
				$get_datacurr = str_replace("cur=", "", $decode_url);
				$curr = strstr($get_datacurr, '&', true);

				$url = URLAPI . "/v1/member/currency/getByCurrency?currency=" . $curr . "&userid=" . $_SESSION["user_id"];
				$result = apitrackless($url);

				if ($result->code == 200) {
					$_SESSION["currency"] = @$curr;
					$_SESSION["symbol"] = $result->message->symbol;
				} else {
					$_SESSION["currency"] = "USD";
					$_SESSION["symbol"] = "&dollar;";
				}

				redirect($_SESSION['wallet_req']);
			}
		} elseif ($result->message->role == 'admin') {
			$_SESSION["mwallet"] = apitrackless(URLAPI . "/v1/admin/user/getMasterwallet")->message->ucode_mwallet;
			redirect("/admin/dashboard");
		}
	}

	public function forget_pass()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("/admin/dashboard");
			}
		}

		$data['title'] = NAMETITLE . " - Forgot Password";

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/forget-pass');
		$this->load->view('tamplate/footer');
	}

	public function recovery()
	{
		$token = $this->security->xss_clean($_GET["token"]);
		/*	    $now=time();
	    
	    $result=$this->member->decode_token($token);
	    if (($result[1]+3600000)<$now){
    		$this->session->set_flashdata('failed', "<p style='color:black'>Your reset token has been expired, please try again</p>");
    	    redirect(base_url()."auth/forgotpass");
            return;
	    }
	    
	    $member = $this->member->get_single_by_token($token);
*/
		$this->session->set_flashdata("token", $token);
		redirect(base_url() . "auth/updatepassword");
	}

	public function updatepassword()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect("homepage");
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect("admin/dashboard");
			}
		}


		$data['title'] = NAMETITLE . " - Forgot Password";

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/forget-pass-2');
		$this->load->view('tamplate/footer');
	}

	public function resetpass()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', validation_errors());
			redirect(base_url() . "auth/login");
			return;
		}

		$email = $this->security->xss_clean($this->input->post('email'));
		$url = URLAPI . "/v1/auth/resetpassword?email=" . $email;
		$result = apitrackless($url);
		if (!empty(@$result->code == 200)) {

			$subject = "Reset Password for Speedybank Account";
			// kirim email forgot password dengan token validasi, lebih dari 1jam expired tokennya
			$message = "Hi,<br><br>

                  Someone has requested a new password for the following account on " . $email . ":<br><br>

                  If you didn't make this request, just ignore this email. If you'd like to proceed:<br><br>

                  <a href='" . base_url() . "auth/recovery?token=" . $result->message->token . "'>Click here to reset your password</a><br><br>

                  Thanks for reading.";

			sendmail($email, $subject, $message, $this->phpmailer_lib->load());

			$this->session->set_flashdata('success', "<p style='color:black'>Your password has been reset, please check your email to complete the process</p>");
			redirect(base_url() . "auth/login");
			return;
		} else {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . $result->message . "</p>");
			redirect(base_url() . "auth/login");
			return;
		}
	}

	public function changepass()
	{
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[9]|max_length[15]');
		$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'trim|required|matches[pass]');
		$this->form_validation->set_rules('token', 'Token', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
			redirect(base_url() . "auth/login");
			return;
		}

		$input		= $this->input;
		$pass		= $this->security->xss_clean($input->post("pass"));
		$token		= $this->security->xss_clean($input->post("token"));

		$mdata = array(
			'password'  => sha1($pass),
			'token'     => $token
		);

		$url = URLAPI . "/v1/auth/updatepassword";
		$result = apitrackless($url, json_encode($mdata));
		if ($result->code == 200) {
			$this->session->set_flashdata("success", "Your password is successfully changed");
			redirect(base_url() . "auth/login");
		} else {
			$this->session->set_flashdata("failed", $result->message);
			redirect(base_url() . "auth/forget_pass");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		$this->session->set_flashdata('success', 'You Have been logged out');
		redirect(base_url());
	}

	public function qrcodereceive($url, $kodeqr)
	{
		if ($kodeqr) {
			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './qr/'; //string, the default is application/cache/
			$config['errorlog']     = './qr/'; //string, the default is application/logs/
			$config['imagedir']     = './qr/receive/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name = $kodeqr . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $url; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			return  $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		}
	}
	public function qrcodeuser($kodeqr)
	{
		if ($kodeqr) {
			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './qr/'; //string, the default is application/cache/
			$config['errorlog']     = './qr/'; //string, the default is application/logs/
			$config['imagedir']     = './qr/user/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name = $kodeqr . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $kodeqr; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			return  $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		}
	}

	public function qrcoderef($kodeqr, $name)
	{
		if ($kodeqr) {
			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './qr/'; //string, the default is application/cache/
			$config['errorlog']     = './qr/'; //string, the default is application/logs/
			$config['imagedir']     = './qr/ref/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name = $name . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $kodeqr; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			return $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		}
	}

	public function requestbank($curr = '', $ucode = '', $amount = NULL, $causal = '')
	{
		if ((empty($curr)) || (empty($ucode))) {
			redirect(base_url());
		}

		$banks = URLAPI . "/v1/member/wallet/getAllbank";
		$symbol = URLAPI . "/v1/trackless/currency/getsymbol?currency=" . base64_decode($curr);

		if ($amount) {
			$data['urlamount'] = "&amount=" . base64_decode($amount);
		}
		$data['banks'] = apitrackless($banks)->message;
		$data['symbol'] = apitrackless($symbol)->message;
		$data['curr'] = base64_decode($curr);
		$data['ucode'] = base64_decode($ucode);
		$data['amount'] = base64_decode(@$amount);
		$data['causal'] = base64_decode(@$causal);


		$data['title'] = NAMETITLE . " - Request";

		$this->load->view('tamplate/header', $data);
		$this->load->view('auth/request-bank', $data);
		$this->load->view('tamplate/footer');
	}

	// public function test_notif(){
	// 	$data['title'] = NAMETITLE . " - Succes Signup";

	// 	$this->load->view('tamplate/header', $data);
	// 	$this->load->view('auth/signup-notif');
	// 	$this->load->view('tamplate/footer');
	// }

}
