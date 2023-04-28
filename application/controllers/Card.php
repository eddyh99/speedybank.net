<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Card extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_id'))) {
            redirect("/");
        }
    }

    public function index()
    {
        $_SESSION["currency"]   = 'EUR';
        $_SESSION["symbol"]     = '&euro;';
        $result = apitrackless(URLAPI . "/v1/member/card/check_card?userid=" . $_SESSION["user_id"]);
        if (@$result->message->card == "unavailable"){
            // tampilkan untuk pendaftaran card baru            
            $_SESSION["currency"]="EUR";
            $data=array(
                "title"                 => NAMETITLE . " - Card",
                "basecard"              => 'homepage/requestcard',
                "requestcard"           => base64_decode("cmVxdWVzdGNhcmQ="),
                "requestcard_physical"  => base64_decode(@$_GET['requestcard_physical']),
                "card"                  => @$_GET['card'],
                "extra"                 => "member/card/js/js_index"
            );

            $this->load->view('tamplate/header', $data);
            $this->load->view('member/card/card-request', $data);
            $this->load->view('tamplate/navbar-bottom-back', $data);
            $this->load->view('tamplate/footer', $data);

        }else{
            if (@$result->message->status == "new"){
                $data=array(
                    "title"                     => NAMETITLE . " - Card",
                    "basecard"                  => 'homepage/requestcard',
                    "requestcard"               => base64_decode(@$_GET['requestcard']),
                    "requestcard_physical"      => base64_decode(@$_GET['requestcard_physical']),
                    "card"                      => "awaiting",
                );

                $this->load->view('tamplate/header', $data);
                $this->load->view('member/card/card', $data);
                $this->load->view('tamplate/navbar-bottom-back', $data);
                $this->load->view('tamplate/footer', $data); 
                return;               
            }

            // print_r(@$result->message->status);
            // die;

            @$card_id     = $result->message->card_id;
            @$account_id  = $result->message->account_id;


            $cardbalance = apitrackless(URLAPI . "/v1/member/card/getcardbalance?card_id=" . $card_id . "&account_id=" . $account_id);
            $exp    = explode("T",$cardbalance->exp_date)[0];
            $exp    = date("d M Y",strtotime($exp));
            $card   = apitrackless(URLAPI . "/v1/member/card/decodeCard?card_id=" . $card_id);


            $mcard = (object)array(
                    "cardnumber"    => @$card->cardnumber,
                    "cardbalance"   => @$cardbalance->cardbalance,
                    "cvv"           => @$card->cvv
                );

            // history dan topup
            $data=array(
                "title"                     => NAMETITLE . " - Card",
                "basecard"                  => 'homepage/card',
                "detailcard"                => $mcard,
                "exp"                       => $exp,
                "card"                      => 'card',
                "requestcard"               => base64_decode(@$_GET['requestcard']),
                "requestcard_physical"      => base64_decode(@$_GET['requestcard_physical']),
                "extra"                     => "member/js/js_index"
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
        if ($balance<$fee){
            $this->session->set_flashdata("failed","Insufficient EUR balance");
            redirect ("card");
        }
        $data=array(
            "title"                     => NAMETITLE . " - Card",
            "basecard"                  => 'homepage/requestcard',
            "price"                     => number_format((float)$card_fee+$card_cost, 2, '.', ''),
            "requestcard"               => base64_decode(@$_GET['requestcard']),
            "requestcard_physical"      => base64_decode(@$_GET['requestcard_physical']),
            "card"                      => @$_GET['card'],
            "extra"                     => "member/card/js/js_index"
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card-request', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data);        
    }

    public function activecard(){
        $this->form_validation->set_rules('telp', 'Phone Number', 
            array(
                'trim',
                'required',
                array(
                    'validate_security',
                    function($str) {
                        $pattern="/\+\d{1,14}$/";
                        if (preg_match($pattern, $str)){
                            return TRUE;
                        } else {
                            return FALSE;
                        }
                    }
                )
            ),
            array('validate_security' => 'Invalid {field} format')
        );
        $this->form_validation->set_rules('passwd', '3d secure password', 'trim|required|min_length[8]|max_length[36]');
        $this->form_validation->set_rules('confpasswd', 'Confirm 3d secure password', 'trim|required|matches[passwd]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed",validation_errors());
            redirect ("card/requestcard?requestcard=YWN0aXZlbm93");
        }
        $input      = $this->input;
        $telp       = $this->security->xss_clean($input->post("telp"));
        $passwd     = $this->security->xss_clean($input->post("passwd"));

        $mdata  = array(
            "userid"    => $_SESSION["user_id"],
            "ucode"     => $_SESSION["ucode"],
            "currency"  => 'EUR',
            "phone"     => $telp,
            "password"  => $passwd
        );

        // Active this comment For Checking Get Information
        // $card_id='be3838a4-72ff-49a7-8f03-82f84a54d73d';
        // $exp_date="2026-03-31T23:59:59Z";
        // $exp    = explode("T",$exp_date)[0];
        // $exp    = date("d M Y",strtotime($exp_date));
        // $card   = apitrackless(URLAPI . "/v1/member/card/decodeCard?card_id=" . $card_id);


        // Comment this for Debugging Request Card
        $result = apitrackless(URLAPI . "/v1/member/card/activate_card", json_encode($mdata));
        if (@$result->code != "200") {
            $this->session->set_flashdata('failed', "Please check your phone format or 3ds Password");
            redirect ("homepage/card?requestcard=YWN0aXZlbm93");
            return;
        }

        $exp    = explode("T",$result->message->exp_date)[0];
        $exp    = date("d M Y",strtotime($result->message->exp_date));
        $card   = apitrackless(URLAPI . "/v1/member/card/decodeCard?card_id=" . $result->message->card_id);

        $data=array(
            "title"         => NAMETITLE . " - Card",
            "basecard"      => 'homepage/requestcard',
            "requestcard"   => 'detailcard',
            "card"          => base64_decode(@$_GET['card']),
            "requestcard_physical"  => base64_decode(@$_GET['requestcard_physical']),
            "card"          => @$_GET['card'],
            "detailcard"    => $card,
            "exp"           => $exp,
            "extra"         => "member/card/js/js_index"
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card-request', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data);        
    }

    public function requestcard_physical()
    {
        $mfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=EUR");
        $mcost = apitrackless(URLAPI . "/v1/admin/cost/getCost?currency=EUR");

        $card_fee = @$mfee->message->card_fxd;
        $card_cost = @$mcost->message->card_fxd;
        $fee = number_format($card_fee+$card_cost,2, '.', '');

        $balance=balance($_SESSION["user_id"],'EUR');
        if ($balance<$fee){
            $this->session->set_flashdata("failed","Insufficient EUR balance");
            redirect ("card");
        }

        $data=array(
            "title"                 => NAMETITLE . " - Card Physical",
            "basecard"              => 'homepage/requestcard_physical',
            "requestcard"           => base64_decode(@$_GET['requestcard']),            
            "requestcard_physical"  => base64_decode(@$_GET['requestcard_physical']),
            "card"                  => @$_GET['card'],
            "price"                 => $fee,
            "ship"                  => $mcost->message,
            "extra"                 => "member/card/js/js_index"
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card-request-physical', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data);
    }

    public function shipping(){
        $this->form_validation->set_rules('dhl', 'Shipping', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed",validation_errors());
            redirect ("card/requestcard_physical?requestcard_physical=cmVxdWVzdGNhcmRfcGh5c2ljYWw=");
        }
        $input      = $this->input;
        $shiptype   = $this->security->xss_clean($input->post("dhl"));

        $mfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=EUR");
        $mcost = apitrackless(URLAPI . "/v1/admin/cost/getCost?currency=EUR");
        $card_fee = @$mfee->message->card_fxd;
        $card_cost = @$mcost->message->card_fxd;

        if ($shiptype=="reg"){
            $ship_fee=@$mcost->message->card_ship_reg;
        }else{
            $ship_fee=@$mcost->message->card_ship_fast;
        }
        $fee = number_format($card_fee+$card_cost+$ship_fee,2, '.', '');        
        $balance=balance($_SESSION["user_id"],'EUR');

        if ($balance<$fee){
            $this->session->set_flashdata("failed","Insufficient EUR balance");
            redirect ("card");
        }

        $data=array(
            "title"                 => NAMETITLE . " - Card Shipping",
            "basecard"              => 'homepage/requestcard_physical',            
            "requestcard_physical"  => 'shippingdetails',
            "requestcard"           => base64_decode(@$_GET['requestcard']), 
            "card"                  => @$_GET['card'],
            "shiptype"              => $shiptype,
            "extra"                 => "member/card/js/js_index"
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card-request-physical', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data);
    }

    public function cardsecurity(){
        $this->form_validation->set_rules('firstname', 'First name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last name', 'trim');
        $this->form_validation->set_rules('telp', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('companyname', 'Company Name', 'trim');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zip Code', 'trim|required');
        $this->form_validation->set_rules('addressone', 'Address 1', 'trim|required');
        $this->form_validation->set_rules('addresstwo', 'Address 2', 'trim');
        $this->form_validation->set_rules('shiptype', 'Ship type', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed",validation_errors());
            redirect ("card/requestcard_physical?requestcard_physical=cmVxdWVzdGNhcmRfcGh5c2ljYWw=");
        }

        $input      = $this->input;
        $firstname  = $this->security->xss_clean($input->post("firstname"));        
        $lastname   = $this->security->xss_clean($input->post("lastname"));        
        $telp       = $this->security->xss_clean($input->post("telp"));
        $company    = $this->security->xss_clean($input->post("companyname"));
        $country    = $this->security->xss_clean($input->post("country"));
        $city       = $this->security->xss_clean($input->post("city"));
        $zipcode    = $this->security->xss_clean($input->post("zipcode"));
        $addressone = $this->security->xss_clean($input->post("addressone"));
        $addresstwo = $this->security->xss_clean($input->post("addresstwo"));
        $shiptype   = $this->security->xss_clean($input->post("shiptype"));

        $shipdetail = array(
            "first_name"    => $firstname,
            "phone"         => $telp,
            "country_code"  => $country,
            "city"          => $city,
            "postal_code"   => $zipcode,
            "address1"      => $addressone,
        );

        if (!empty($lastname)){
            $shipdetail["last_name"]=$lastname;
        }
        if (!empty($company)){
            $shipdetail["company_name"]=$company;
        }
        if (!empty($addresstwo)){
            $shipdetail["address2"]=$addresstwo;
        }

        if ($shiptype=="reg"){
            $shipdetail["dispatch_method"]="DHLGlobalMail";
        }elseif($shiptype=="fast"){
            $shipdetail["dispatch_method"]="DHLExpress";
        }        

        $_SESSION["shipdetail"]=$shipdetail;
        $data=array(
            "title"                 => NAMETITLE . " - Card Security",
            "basecard"              => 'homepage/requestcard_physical',            
            "requestcard_physical"  => '3dpassword',
            "requestcard"           => base64_decode(@$_GET['requestcard']), 
            "card"                  => @$_GET['card'],
            "extra"                 => "member/card/js/js_index"
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card-request-physical', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data);
    }

    public function cardsummary(){
        $mfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=EUR");
        $mcost = apitrackless(URLAPI . "/v1/admin/cost/getCost?currency=EUR");
        $card_fee = @$mfee->message->card_fxd;
        $card_cost = @$mcost->message->card_fxd;

        if ($_SESSION["shipdetail"]["dispatch_method"]=="DHLGlobalMail"){
            $ship_fee=@$mcost->message->card_ship_reg;
        }else{
            $ship_fee=@$mcost->message->card_ship_fast;
        }
        $price=number_format($card_fee+$card_cost,2,'.','');
        $fee = number_format($card_fee+$card_cost+$ship_fee,2, '.', '');        
        $balance=balance($_SESSION["user_id"],'EUR');

        if ($balance<$fee){
            $this->session->set_flashdata("failed","Insufficient EUR balance");
            redirect ("card");
        }

        $this->form_validation->set_rules('telp', 'Phone Number', 
            array(
                'trim',
                'required',
                array(
                    'validate_security',
                    function($str) {
                        $pattern="/\+\d{1,14}$/";
                        if (preg_match($pattern, $str)){
                            return TRUE;
                        } else {
                            return FALSE;
                        }
                    }
                )
            ),
            array('validate_security' => 'Invalid {field} format')
        );
        $this->form_validation->set_rules('passwd', '3d secure password', 'trim|required|min_length[8]|max_length[36]');
        $this->form_validation->set_rules('confpasswd', 'Confirm 3d secure password', 'trim|required|matches[passwd]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed",validation_errors());
            redirect ("card/requestcard_physical?requestcard_physical=cmVxdWVzdGNhcmRfcGh5c2ljYWw=");
        }

        $input          = $this->input;
        $printedname    = $this->security->xss_clean($input->post("printedname"));
        $telp           = $this->security->xss_clean($input->post("telp"));
        $passwd         = $this->security->xss_clean($input->post("passwd"));

        $carddetail=array(
            "3d_secure_settings"    => array(
                "mobile"    => $telp,
                "password"  => $passwd
            ),
            "delivery_address"      => $_SESSION["shipdetail"]
        );
        if (!empty($printedname)){
            $carddetail["embossing_name"]=$printedname;
        }
        $_SESSION["carddetail"]=$carddetail;
        $data=array(
            "title"                 => NAMETITLE . " - Card Summary",
            "basecard"              => 'homepage/requestcard_physical',            
            "requestcard_physical"  => 'summary',
            "requestcard"           => base64_decode(@$_GET['requestcard']), 
            "card"                  => @$_GET['card'],
            "carddetail"            => $carddetail,
            "price"                 => $price,
            "ship"                  => $mcost->message,
            "extra"                 => "member/card/js/js_index"
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card-request-physical', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data);
    }

    public function activephysiccard(){
        $mfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=EUR");
        $mcost = apitrackless(URLAPI . "/v1/admin/cost/getCost?currency=EUR");
        $card_fee = @$mfee->message->card_fxd;
        $card_cost = @$mcost->message->card_fxd;

        if ($_SESSION["carddetail"]["delivery_address"]["dispatch_method"]=="DHLGlobalMail"){
            $ship_fee=@$mcost->message->card_ship_reg;
        }else{
            $ship_fee=@$mcost->message->card_ship_fast;
        }
        $fee = number_format($card_fee+$card_cost+$ship_fee,2, '.', '');        
        $balance=balance($_SESSION["user_id"],'EUR');

        if ($balance<$fee){
            $this->session->set_flashdata("failed","Insufficient EUR balance");
            redirect ("card");
        }

        $mdata  = array(
            "userid"    => $_SESSION["user_id"],
            "ucode"     => $_SESSION["ucode"],
            "currency"  => 'EUR',
            "card_detail"    => $_SESSION["carddetail"]
        );

        // Comment this for Debugging Request Card
        $result = apitrackless(URLAPI . "/v1/member/card/activate_physical_card", json_encode($mdata));

        if (@$result->code != "200") {
            $this->session->set_flashdata('failed', "Please check shipping address, your phone format or 3ds Password");
            redirect ("card/requestcard_physical?requestcard_physical=cmVxdWVzdGNhcmRfcGh5c2ljYWw=");
            return;
        }

        $data=array(
            "title"                         => NAMETITLE . " - Card Success",
            "basecard"                      => 'homepage/requestcard',
            "requestcard_physical"          => 'success',
            "requestcard"                   => base64_decode(@$_GET['requestcard']), 
            "card"                          => @$_GET['card'],
            "extra"                         => "member/card/js/js_index"
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card-request-physical', $data);
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
            "title"                     => NAMETITLE . " - Topup Card",
            "basecard"                  => 'homepage/card',
            "card"                      => 'topup',
            "requestcard"               => base64_decode(@$_GET['requestcard']),
            "requestcard_physical"      => base64_decode(@$_GET['requestcard_physical']),
            "fee"                       => $fee,
            "extra"                     => "member/js/js_index"
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
            "title"                     => NAMETITLE . " - Topup Card",
            "basecard"                  => 'homepage/card',
            "card"                      => 'confirm',
            "requestcard"               => base64_decode(@$_GET['requestcard']),
            "requestcard_physical"      => base64_decode(@$_GET['requestcard_physical']),
            "detail"                    => $temp,
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
            "title"                     => NAMETITLE . " - Card History",
            "basecard"                  => 'homepage/card',
            "card"                      => 'history',
            "requestcard"               => base64_decode(@$_GET['requestcard']),
            "requestcard_physical"      => base64_decode(@$_GET['requestcard_physical']),
            "extra"                     => "member/card/js/js_history"
        );

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/card/card-history', $data);
        $this->load->view('tamplate/navbar-bottom-back', $data);
        $this->load->view('tamplate/footer', $data );
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
        $awal = date_format(date_create($tgl[0]), "Y-m-d")."T"."00:00:00Z";
        $akhir = date_format(date_create($tgl[1]), "Y-m-d")."T"."23:59:59Z";

        $mdata = array(
            "userid"    => $_SESSION["user_id"],
            "date_start" => $awal,
            "date_end"  => $akhir,
        );
        $result = apitrackless(URLAPI . "/v1/member/card/gethistory", json_encode($mdata));
        $data['history'] = $result->message;
        $response = array(
            "token"     => $this->security->get_csrf_hash(),
            "message"   => utf8_encode($this->load->view('member/card/detail-card-history', $data, TRUE))
        );
        echo json_encode($response);
    }    

    
}