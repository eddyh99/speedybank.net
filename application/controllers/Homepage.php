<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('auth/login'));
        }
    }

    public function index()
    {
        $srcref = base_url() . 'qr/ref/' . $_SESSION["ucode"] . 'Thumbnail.png';
        if (@getimagesize($srcref) == FALSE) {
            $this->ciqrcode->createThumbnail($_SESSION["ucode"], 'qr/ref/');
        }
        
        if (!isset($_SESSION["referral"])){
            $url = URLAPI . "/v1/auth/getmember_byucode?ucode=".$_SESSION["ucode"];
            $member   = apitrackless($url, json_encode($mdata))->message;
            $_SESSION["referral"]=$member->refcode;
        }
        
        $mdata = array(
            "userid" => $_SESSION["user_id"]
        );

        $url = URLAPI . "/v1/member/currency/getActiveCurrency";
        $currency   = apitrackless($url, json_encode($mdata))->message;

        $data = array();
        foreach ($currency as $dt) {
            if ($dt->status == 'active') {
                $temp["currency"] = $dt->currency;
                $temp["symbol"] = $dt->symbol;
                $temp["status"] = $dt->status;
                $temp["balance"] = apitrackless(URLAPI . "/v1/member/wallet/getBalance?currency=" . $dt->currency . "&userid=" . $_SESSION["user_id"])->message->balance;
                array_push($data, (object) $temp);
            }
        }

        $dataobj = (object)$data;

        $data['title'] = NAMETITLE . " - Homepage";
        $footer["extra"]    = "member/js/js_index";
        $body["currency"] = $dataobj;


        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-bottom-homepage', $data);
        $this->load->view('member/index', $body);
        $this->load->view('tamplate/footer', $footer);
    }

    public function crypto()
    {
        $data['title'] = NAMETITLE . " - Homepage";
        $footer["extra"]    = "member/js/js_index";

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/crypto');
        $this->load->view('tamplate/footer', $footer);
    }

    public function setting_currency()
    {
        $mdata = array(
            "userid" => $_SESSION["user_id"]
        );

        $url = URLAPI . "/v1/member/currency/getActiveCurrency";
        $body["currency"]   = apitrackless($url, json_encode($mdata))->message;

        $footer["extra"]    = "member/js/js_currency";
        $data['title']      = NAMETITLE . " - Currency Setting";

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-bottom-homepage', $data);
        $this->load->view('member/setting-currency', $body);
        $this->load->view('tamplate/footer', $footer);
    }

    public function wallet()
    {
        if (!empty($_GET["cur"])) {
            $url = URLAPI . "/v1/member/currency/getByCurrency?currency=" . $_GET["cur"] . "&userid=" . $_SESSION["user_id"];
            $result = apitrackless($url);
            if ($result->code == 200) {
                $_SESSION["currency"] = @$_GET["cur"];
                $_SESSION["symbol"] = $result->message->symbol;
            } else {
                $_SESSION["currency"] = "USD";
                $_SESSION["symbol"] = "&dollar;";
            }
        }

        $mdata = array(
            "userid" => $_SESSION["user_id"]
        );
        $url = URLAPI . "/v1/member/currency/getActiveCurrency";
        $body["currency"]   = apitrackless($url, json_encode($mdata))->message;
        $data['title'] = NAMETITLE . " - Homepage";
        $footer["extra"]    = "member/js/js_index";


        $this->load->view('tamplate/header', $data);
        $this->load->view('member/mywallet', $body);
        $this->load->view('tamplate/navbar-bottom-homepage', $data);
        $this->load->view('tamplate/footer', $footer);
    }

    public function setCurrency()
    {
        $currency = $_GET["currency"];
        $status = $_GET["status"];
        $url = URLAPI . "/v1/member/currency/setCurrency?status=" . $status . "&userid=" . $_SESSION["user_id"] . "&currency=" . $currency;
        $result = apitrackless($url);
        echo json_encode($result);
    }

    public function getHistory()
    {
        $this->form_validation->set_rules('tgl', 'Date', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            header("HTTP/1.1 500 Internal Server Error");
            $error = array(
                "token"     => $this->security->get_csrf_hash(),
                "message"   => validation_errors()
            );
            echo json_encode($error);
            return;
        }

        $input = $this->input;
        $tgl = explode("-", $this->security->xss_clean($input->post("tgl")));
        $awal = date_format(date_create($tgl[0]), "Y-m-d");
        $akhir = date_format(date_create($tgl[1]), "Y-m-d");

        $mdata = array(
            "userid"    => $_SESSION["user_id"],
            "currency"  => $_SESSION["currency"],
            "date_start" => $awal,
            "date_end"  => $akhir,
            "timezone"  => $_SESSION["time_location"]
        );
        $result = apitrackless(URLAPI . "/v1/member/history/getAll", json_encode($mdata));
        $data["history"] = $result->message;
        $response = array(
            "token"     => $this->security->get_csrf_hash(),
            "message"   => utf8_encode($this->load->view('member/history', $data, TRUE))
        );
        echo json_encode($response);
    }


    // public function card()
    // {   
        
    //     $data['title'] = NAMETITLE . " - Homepage";
    //     $data['basecard'] = base_url() . 'homepage/card';
    //     $data['card'] = base64_decode($_GET['card']) ;
    //     $data['requestcard'] = base64_decode(@$_GET['requestcard']) ;
    //     $footer["extra"] = "member/js/js_index";

    //     // PERLU VALUE UNTUK VALIDASI, UNTUK KONDISI BELUM FIKS MASIH PERLU DIPERBAIKI
    //     // IF ALREADY CARD 
    //     if($_SESSION['user_id'] == !isset($_GET[base_url() . 'homepage/card' ]) )
    //     {
    //         $this->load->view('tamplate/header', $data);
    //         $this->load->view('member/card/card', $data);
    //         $this->load->view('tamplate/navbar-bottom-back', $data);
    //         $this->load->view('tamplate/footer', $footer);
    //     }


    // }

    // public function requestcard()
    // {   
        
    //     $data['title'] = NAMETITLE . " - Homepage";
    //     $data['basecard'] = base_url() . 'homepage/requestcard';
    //     $data['requestcard'] = base64_decode($_GET['requestcard']) ;
    //     $data['card'] = base64_decode(@$_GET['card']) ;
    //     $footer["extra"] = "member/js/js_index";
        
    //     // PERLU VALUE UNTUK VALIDASI, UNTUK KONDISI BELUM FIKS MASIH PERLU DIPERBAIKI
    //     // IF REQUEST CARD
    //     if($_SESSION['user_id'] == !isset($_GET[base_url() . 'homepage/requestcard']) )
    //     {
    //         $this->load->view('tamplate/header', $data);
    //         $this->load->view('member/card/card-request', $data);
    //         $this->load->view('tamplate/navbar-bottom-back', $data);
    //         $this->load->view('tamplate/footer', $footer);
    //     }

    // }
    

    
    public function card()
    {   
        $_SESSION["currency"]   = 'EUR';
        $_SESSION["symbol"]     = '&euro;';
        $result = apitrackless(URLAPI . "/v1/member/card/check_card?userid=" . $_SESSION["user_id"]);
        if ($result->message->card == "unavailable"){
            // tampilkan untuk pendaftaran card baru
            
            $mfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=EUR");
            $mcost = apitrackless(URLAPI . "/v1/admin/cost/getCost?currency=EUR");
            $_SESSION["currency"]="EUR";
            
            $card_fee = @$mfee->message->card_fxd;
            $card_cost = @$mcost->message->card_fxd;

            $data=array(
                "title"         => NAMETITLE . " - Card",
                "basecard"      => 'homepage/requestcard',
                "price"         => number_format((float)$card_fee+$card_cost, 2, '.', ''),
                "requestcard"   => base64_decode("cmVxdWVzdGNhcmQ="),
                "card"          => base64_decode(@$_GET['card']),
                "extra"         => "member/js/js_index"
            );

            $this->load->view('tamplate/header', $data);
            $this->load->view('member/card/card-request', $data);
            $this->load->view('tamplate/navbar-bottom-back', $data);
            $this->load->view('tamplate/footer', $data);

        }else{
            $card_id     = $result->message->card_id;
            $account_id  = $result->message->account_id;

            // $card_id='be3838a4-72ff-49a7-8f03-82f84a54d73d';
            // $exp_date="2026-03-31T23:59:59Z";
            // $exp    = explode("T",$exp_date)[0];

            $cardbalance = apitrackless(URLAPI . "/v1/member/card/getcardbalance?card_id=" . $card_id . "&account_id=" . $account_id);
            $exp    = explode("T",$cardbalance->exp_date)[0];
            $exp    = date("d M Y",strtotime($exp));
            $card   = apitrackless(URLAPI . "/v1/member/card/decodeCard?card_id=" . $cardbalance->card_id);
            // $card   = apitrackless(URLAPI . "/v1/member/card/decodeCard?card_id=" . $card_id);
            
            $mcard = (object)array(
                    "cardnumber"    => $card->cardnumber,
                    "cardbalance"   => $cardbalance->cardbalance,
                    "cvv"           => $card->cvv
                );
                
            // history dan topup
            $data=array(
                "title"         => NAMETITLE . " - Card",
                "basecard"      => 'homepage/card',
                "detailcard"    => $mcard,
                "exp"           => $exp,
                "card"          => 'card',
                "requestcard"   => base64_decode(@$_GET['requestcard']),
                "extra"         => "member/js/js_index"
            );
            
            $this->load->view('tamplate/header', $data);
            $this->load->view('member/card/card', $data);
            $this->load->view('tamplate/navbar-bottom-back', $data);
            $this->load->view('tamplate/footer', $data);

        }
        
    }

    public function requestcard()
    {   
        $mfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=EUR");
        $mcost = apitrackless(URLAPI . "/v1/admin/cost/getCost?currency=EUR");

        $card_fee = @$mfee->message->card_fxd;
        $card_cost = @$mcost->message->card_fxd;
        $fee = number_format($card_fee+$card_cost,2);
        
        $balance=balance($_SESSION["user_id"],'EUR');
        if ($balance<=$fee){
            $this->session->set_flashdata("failed","Insufficient EUR balance");
            redirect ("homepage/card?requestcard=cmVxdWVzdGNhcmQ=");
        }else{
            $data=array(
                "title"         => NAMETITLE . " - Card",
                "basecard"      => 'homepage/requestcard',
                "price"         => $fee,
                "requestcard"   => base64_decode(@$_GET['requestcard']),
                "card"          => base64_decode(@$_GET['card']),
                "extra"         => "member/card/js/js_index"
            );

            $this->load->view('tamplate/header', $data);
            $this->load->view('member/card/card-request', $data);
            $this->load->view('tamplate/navbar-bottom-back', $data);
            $this->load->view('tamplate/footer', $data);
        }
    }
    
    public function activecard(){
        $this->form_validation->set_rules('telp', 'Phone number', 'trim|required');
        $this->form_validation->set_rules('passwd', '3d secure password', 'trim|required');
        $this->form_validation->set_rules('confpasswd', 'Confirm 3d secure password', 'trim|required|matches[passwd]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed",validation_errors());
            redirect ("homepage/card?requestcard=YWN0aXZlbm93");
        }
        $input      = $this->input;
        $telp       = $this->security->xss_clean($input->post("telp"));
        $passwd     = $this->security->xss_clean($input->post("passwd"));

        $mdata  = array(
            "userid"    => $_SESSION["user_id"],
            "ucode"     => $_SESSION["ucode"],
            "currency"  => 'EUR',
            "phone"     => $telp,
            "3dpass"    => $passwd
        );
        
        $result = apitrackless(URLAPI . "/v1/member/card/activate_card", json_encode($mdata));
        if (@$result->code != "200") {
            $this->session->set_flashdata('failed', $result->message);
            redirect ("homepage/card?requestcard=YWN0aXZlbm93");
            return;
        }
        
        // $card_id='be3838a4-72ff-49a7-8f03-82f84a54d73d';
        // $exp_date="2026-03-31T23:59:59Z";
        
        $exp    = explode("T",$result->exp_date)[0];
        $exp    = date("d M Y",strtotime($result->exp_date));
        $card   = apitrackless(URLAPI . "/v1/member/card/decodeCard?card_id=" . $result->card_id);
        // $card   = apitrackless(URLAPI . "/v1/member/card/decodeCard?card_id=" . $card_id);

        $data=array(
            "title"         => NAMETITLE . " - Card",
            "basecard"      => 'homepage/requestcard',
            "requestcard"   => 'detailcard',
            "card"          => base64_decode(@$_GET['card']),
            "detailcard"    => $card,
            "exp"           => $exp,
            "extra"         => "member/card/js/js_index"
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card-request', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data);        
    }
    
    public function topupcard(){
        $bankcost = apitrackless(URLAPI . "/v1/admin/cost/getCost?currency=" . $_SESSION['currency']);
        $bankfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=" . $_SESSION['currency']);

        $fee = (balance($_SESSION['user_id'], $_SESSION["currency"]) *
            @$bankcost->message->walletbank_circuit_pct) +
            (balance($_SESSION['user_id'], $_SESSION["currency"]) *
                @$bankfee->message->walletbank_circuit_pct) +
            (balance($_SESSION['user_id'], $_SESSION["currency"]) *
                @$bankfee->message->referral_bank_pct) +
            @$bankcost->message->walletbank_circuit_fxd +
            @$bankfee->message->walletbank_circuit_fxd +
            @$bankfee->message->referral_bank_fxd;

        if ((balance($_SESSION['user_id'], $_SESSION["currency"]) * 100) <= 0) {
            $fee = 0;
        }

        if ((balance($_SESSION['user_id'], $_SESSION["currency"]) * 100) < ($fee * 100)) {
            $fee = balance($_SESSION['user_id'], $_SESSION["currency"]);
        }
        
        // history dan topup
        $data=array(
            "title"         => NAMETITLE . " - Topup Card",
            "basecard"      => 'homepage/card',
            "card"          => 'topup',
            "requestcard"   => base64_decode(@$_GET['requestcard']),
            "fee"           => $fee,
            "extra"         => "member/js/js_index"
        );
        
        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data);
    }
    
    public function topupconfirm(){
        $_SESSION["currency"]="EUR";
        $amount = $this->security->xss_clean($this->input->post("amount"));

        $a = $this->input->post("amount");
        $b = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $a);
        $_POST["amount"] = $b;

        $input    = $this->input;
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('confirmamount', 'Confirm Amount', 'trim|required|greater_than[0]|matches[amount]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect("homepage/topupcard");
        }
        
        $mdata = array(
            "userid"            => $_SESSION["user_id"],
            "currency"          => "EUR",
            "amount"            => $this->security->xss_clean($input->post("amount")),
            "transfer_type"     => 'circuit',
        );        
        
        $result = apitrackless(URLAPI . "/v1/member/wallet/bankSummary", json_encode($mdata));

        if (@$result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect(base_url() . "homepage/topupcard");
        }

        $transfer_type  = $this->security->xss_clean($input->post("transfer_type"));
        $temp["fee"]               = $result->message->fee;
        $temp["deduct"]            = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $result->message->deduct);
        $temp["amount"]            = $this->security->xss_clean($input->post("amount"));
        
        $data=array(
            "title"         => NAMETITLE . " - Topup Card",
            "basecard"      => 'homepage/card',
            "card"          => 'confirm',
            "requestcard"   => base64_decode(@$_GET['requestcard']),
            "detail"        => $temp,
        );
        
        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data);

    }
    
    public function topupproses(){
        $input    = $this->input;
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect("homepage/topupcard");
        }
        
        $mdata = array(
            "userid"            => $_SESSION["user_id"],
            "currency"          => "EUR",
            "amount"            => $this->security->xss_clean($input->post("amount")),
            "transfer_type"     => 'circuit',
        );        

        $result = apitrackless(URLAPI . "/v1/member/card/topupprocess", json_encode($mdata));
        if (@$result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect(base_url() . "homepage/topupcard");
        }
        
        $data=array(
            "title"         => NAMETITLE . " - Topup Card",
            "basecard"      => 'homepage/card',
            "card"          => 'success',
        );
        
        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data);
    }
    
    public function historycard(){
        $data=array(
            "title"         => NAMETITLE . " - History Card",
            "basecard"      => 'homepage/card',
            "card"          => 'success',
        );
        
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('member/card/card-history', $data);
        $this->load->view('tamplate/footer', $data );
    }
    
    public function detailhistory(){
        
    }


}

