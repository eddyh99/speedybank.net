<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wallet extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Get 
        $get_url = str_replace(LINKQRCODE, "", $_SERVER['REQUEST_URI']);

        $linkurl = base_url(uri_string()) . $get_url;
        $ucode = "";
        $amount = "";
        if (strpos($linkurl, "send?")) {
            $session_data = array(
                'wallet_req'   => $linkurl
            );
            $this->session->set_userdata($session_data);
            if (empty($this->session->userdata('user_id'))) {
                $this->session->set_flashdata('failed', "You must login first to make a transaction");
                redirect(base_url('/'));
            }
        } else {
            if (empty($this->session->userdata('user_id'))) {
                redirect(base_url('/'));
            }
        }
    }

    public function index()
    {
        $data['title'] = NAMETITLE . " - Wallet to Wallet";

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top', $data);
        $this->load->view('tamplate/navbar-bottom', $data);
        $this->load->view('member/wallet/wallet');
        $this->load->view('tamplate/footer');
    }

    public function send()
    {
        // Get URL
        $this->session->unset_userdata('wallet_req');
        $linkurl = $_SERVER['REQUEST_URI'];

        $ucode = "";
        $amount = "";
        $causal = "";

        if (strpos($linkurl, "send?")) {
            $get_url = str_replace(LINKQRCODE . "?", "", $linkurl);
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

            // Get UCode
            $get_dataucode = str_replace("cur=" . $_SESSION["currency"] . "&ucode=", "", $decode_url);
            $ucode = strstr($get_dataucode, '&', true);
            
            // Get Amount
            $amount = str_replace("cur=" . $_SESSION["currency"] . "&ucode=" . $ucode . "&amount="  , "", $decode_url);
            
            // GET Causal
            $get_datacausal = str_replace("cur=" . $_SESSION["currency"] . "&ucode=" . $ucode . "&amount=" . $amount . "&causal=", "", $decode_url);
            $only_causal = strstr($get_datacausal, '&causal=', false);
            $causal = substr($only_causal, 8);
            
            if (empty($ucode)) {
                $ucode = $get_dataucode;
                $amount = '';
            }
             

        }

        $footer['extra'] = "admin/js/js_btn_disabled";

        $data = array(
            'title' => NAMETITLE . ' - Wallet to Wallet',
            'ucode' => @$ucode,
            'amount' => @$amount,
            'causal' => @$causal,
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/wallet/wallet-send');
        $this->load->view('tamplate/footer', $footer);
    }

    public function send_confirm()
    {

        $amount = $this->input->post("amount");
        $new_amount = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $amount);
        $_POST["amount"] = $new_amount;

        $confirm_amount = $this->input->post("confirm_amount");
        $new_confirm_amount = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $confirm_amount);
        $_POST["confirm_amount"] = $new_confirm_amount;

        $this->form_validation->set_rules('ucode', 'Unique Code', 'trim|required');
        $this->form_validation->set_rules('confirm_ucode', 'Confirm Unique Code', 'trim|required|matches[ucode]');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('confirm_amount', 'Confirm Amount', 'trim|required|greater_than[0]|matches[amount]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("wallet/send");
            return;
        }

        $input        = $this->input;
        $ucode        = $this->security->xss_clean($input->post("ucode"));
        $amount        = $this->security->xss_clean($input->post("amount"));
        $causal        = $this->security->xss_clean($input->post("causal"));

        $mdata  = array(
            "userid"    => $_SESSION["user_id"],
            "currency"  => $_SESSION["currency"],
            "ucode"     => $ucode,
            "amount"    => $amount
        );

        $result = apitrackless(URLAPI . "/v1/member/wallet/getSummary", json_encode($mdata));

        if (@$result->code != "200") {
            $this->session->set_flashdata('failed', $result->message);
            redirect("wallet/send");
            return;
        }

        $infolist = array(
            "userid"    => $_SESSION["user_id"],
            "currency"  => $_SESSION["currency"],
            "ucode"     => $ucode,
            "fee"       => $result->message->fee,
            "deduct"    => preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $result->message->deduct),
            "amount"    => $amount,
            "causal"    => $causal
        );

        $data['title'] = NAMETITLE . " - Wallet to Wallet";
        $body["data"] = $infolist;
        $footer['extra'] = "admin/js/js_btn_disabled";

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/wallet/wallet-send-confirm', $body);
        $this->load->view('tamplate/footer', $footer);
    }

    public function send_notif()
    {
        $amount = $this->input->post("amount");
        $new_amount = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $amount);
        $_POST["amount"] = $new_amount;

        $this->form_validation->set_rules('ucode', 'Unique Code', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|decimal|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("wallet/send");
            return;
        }

        $input        = $this->input;
        $ucode        = $this->security->xss_clean($input->post("ucode"));
        $amount        = $this->security->xss_clean($input->post("amount"));
        $causal        = $this->security->xss_clean($input->post("causal"));

        $mdata  = array(
            "userid"    => $_SESSION["user_id"],
            "currency"  => $_SESSION["currency"],
            "ucode"     => $ucode,
            "amount"    => $amount,
            "causal"    => $causal
        );

        $result = apitrackless(URLAPI . "/v1/member/wallet/walletTransfer", json_encode($mdata));
        if (@$result->code != "200") {
            $this->session->set_flashdata('failed', $result->message);
            redirect("wallet/send");
            return;
        }

        $data['title'] = NAMETITLE . " - Wallet to Wallet";
        $body["data"] = $mdata;

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/wallet/wallet-send-notif', $body);
        $this->load->view('tamplate/footer');
    }

    public function receive()
    {
        $srcr = base_url() . 'qr/receive/' . $_SESSION["ucode"] . $_SESSION["currency"] . '.png';
        if (@getimagesize($srcr) == FALSE) {
            $urlqr = base_url() . 'auth/requestbank/' . base64_encode($_SESSION["currency"]) . '/' . base64_encode($_SESSION["ucode"]);
            $this->qrcodereceive($urlqr, $_SESSION["ucode"] . $_SESSION["currency"]);
        }

        $data['title'] = NAMETITLE . " - Wallet to Wallet";

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/wallet/wallet-receive');
        $this->load->view('tamplate/footer');
    }

    public function request()
    {
        $data['title'] = NAMETITLE . " - Wallet to Wallet";
        $footer['extra'] = "admin/js/js_btn_disabled";

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/wallet/wallet-request');
        $this->load->view('tamplate/footer', $footer);
    }

    public function request_qrcode()
    {
        $amount = $this->input->post("amount");
        $new_amount = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $amount);
        $_POST["amount"] = $new_amount;

        $confirm_amount = $this->input->post("confirm_amount");
        $new_confirm_amount = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $confirm_amount);
        $_POST["confirm_amount"] = $new_confirm_amount;

        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('confirm_amount', 'Confirm Amount', 'trim|required|greater_than[0]|matches[amount]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', validation_errors());
            redirect("wallet/request");
            return;
        }

        $input        = $this->input;
        $amount        = $this->security->xss_clean($input->post("amount"));
        $causal        = $this->security->xss_clean($input->post("causal"));
        if (($amount * 100) < 2) {
            $this->session->set_flashdata('failed', 'Minimum amount is 0.02');
            redirect("wallet/request");
            return;
        }

        $linkqr = base_url() . 'auth/requestbank/' . base64_encode($_SESSION["currency"]) . '/' . base64_encode($_SESSION["ucode"]) . '/' . base64_encode($amount) . '/' . base64_encode($causal);
        $codename = substr(sha1(time()), 0, 8);
        $nameqr = $_SESSION["ucode"] . '-' . $codename;
        $src = base_url() . 'qr/request/' . $nameqr . '.png';

        if (@getimagesize($src)) {
            $codename = substr(sha1(time()), 0, 8);
            $nameqr = $_SESSION["ucode"] . '-' . $codename;
        }

        $this->qrcode($linkqr, $nameqr);
        $data = array(
            'title' => NAMETITLE . ' - Wallet to Wallet',
            'nameqr' => $nameqr,
            'linkqr' => $linkqr
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/wallet/wallet-request-qrcode', $data);
        $this->load->view('tamplate/footer');
    }

    public function request_notif()
    {
        $data['title'] = NAMETITLE . " - Wallet to Wallet";

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/wallet/wallet-request-notif');
        $this->load->view('tamplate/footer');
    }

    public function qrcode($kodeqr, $name)
    {
        if ($kodeqr) {
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './qr/'; //string, the default is application/cache/
            $config['errorlog']     = './qr/'; //string, the default is application/logs/
            $config['imagedir']     = './qr/request/'; //direktori penyimpanan qr code
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
            return  $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        }
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
}
