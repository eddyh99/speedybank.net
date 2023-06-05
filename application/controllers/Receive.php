<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Receive extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url('/'));
        }
    }

    public function index()
    {
        $data['title'] = NAMETITLE . " - Top Up";

        // print_r(json_encode($_SESSION));
        // print_r($this->session->userdata['logged_status'])
        // die;

        // $data = array(
        //     'title'     = NAMETITLE . " - Top Up",
        //     'header'
        // );

        // print_r($this->session->role);
        // die;

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top');
        $this->load->view('tamplate/navbar-bottom');
        $this->load->view('member/topup/receive');
        $this->load->view('tamplate/footer');
    }

    public function localbank()
    {
        $currency = $_SESSION["currency"];
        $url = URLAPI . "/v1/trackless/bank/getBank?currency=" . $currency;
        $result = apitrackless($url);
        if ($result->code != 200) {
            $body["bank"] = NULL;
        } else {
            $body["bank"] = $result->message;
        }
        $body["currency"] = $currency;
        $data['title'] = NAMETITLE . " - Top Up";
        
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top');
        $this->load->view('member/topup/localbank', $body);
        $this->load->view('tamplate/footer');
    }
    
    public function localbank_confirm()
    {

        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('confirm_amount', 'Confirm Amount', 'trim|required|greater_than[0]|matches[amount]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("receive");
            return;
        }

        $input              = $this->input;
        $amount             = $this->security->xss_clean($input->post("amount"));
        
        $infolist = array(
            'amount'         => $amount,
        );

        $data['title'] = NAMETITLE . " - Top up Confirmation";
        $body["data"] = $infolist;

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top');
        $this->load->view('member/topup/localbank_confirm', $body);
        $this->load->view('tamplate/footer');
    }

    public function localbank_notif()
    {

        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("receive");
            return;
        }

        $input              = $this->input;
        $amount             = $this->security->xss_clean($input->post("amount"));
        
        $mdata = array(
            'userid'        => $_SESSION["user_id"],
            'amount'        => $amount,
            'currency'      => $_SESSION["currency"],
            'transfer_type' => 'topup circuit'
        );

        $result = apitrackless(URLAPI . "/v1/member/wallet/topup", json_encode($mdata));
        // print_r(json_encode($result->message));
        // die;

        
        if (@$result->code != "200") {
            $this->session->set_flashdata('failed', $result->message);
            redirect("receive");
            return;
        }

        $data['title'] = NAMETITLE . " - Top Up Process";
        $body['data'] = $result->message;
        $body['amount'] = $amount;


        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top');
        $this->load->view('member/topup/localbank_notif', $body);
        $this->load->view('tamplate/footer');
    }
    
    public function interbank()
    {
        if (@$_GET['currency'] == '') {
            $currency = $_SESSION["currency"];
        } else {
            $currency = $_GET['currency'];
        }

        $url = URLAPI . "/v1/trackless/bank/getBank?currency=" . $currency;
        $result = apitrackless($url);
        if ($result->code != 200) {
            $body["bank"] = NULL;
        } else {
            $body["bank"] = $result->message;
        }
        
        $body["currency"] = $currency;
        $data['title'] = NAMETITLE . " - Top Up";
        
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top');
        $this->load->view('member/topup/interbank', $body);
        $this->load->view('tamplate/footer');
    }

    public function interbank_confirm()
    {
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('confirm_amount', 'Confirm Amount', 'trim|required|greater_than[0]|matches[amount]');
        $this->form_validation->set_rules('currency', 'Currency', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("receive");
            return;
        }
  
        $input              = $this->input;
        $amount             = $this->security->xss_clean($input->post("amount"));
        $currency             = $this->security->xss_clean($input->post("currency"));
        
        $infolist = array(
            'amount'         => $amount,
            'currency'       => $currency
        );

        $data['title'] = NAMETITLE . " - Top up Confirmation";
        $body["data"] = $infolist;

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top');
        $this->load->view('member/topup/interbank_confirm', $body);
        $this->load->view('tamplate/footer');
    }


    public function interbank_notif()
    {

        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('currency', 'Currency', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("receive");
            return;
        }

        $input              = $this->input;
        $amount             = $this->security->xss_clean($input->post("amount"));
        $currency             = $this->security->xss_clean($input->post("currency"));
        
        $mdata = array(
            'userid'        => $_SESSION["user_id"],
            'amount'        => $amount,
            'currency'      => $currency,
            'transfer_type' => 'topup outside'
        );

        $result = apitrackless(URLAPI . "/v1/member/wallet/topup", json_encode($mdata));
        // print_r(json_encode($result));
        // die;

        if (@$result->code != "200") {
            $this->session->set_flashdata('failed', $result->message);
            redirect("receive");
            return;
        }

        $data['title'] = NAMETITLE . " - Top Up Process";
        $body['data'] = $result->message;
        $body['amount'] = $amount;
        $body['currency'] = $currency;
        $body['coma'] = ',';

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top');
        $this->load->view('member/topup/interbank_notif', $body);
        $this->load->view('tamplate/footer');
    }

    public function cash()
    {
        $currency = $_SESSION["currency"];
        $url = URLAPI . "/v1/trackless/bank/getBank?currency=" . $currency;
        $result = apitrackless($url);
        if ($result->code != 200) {
            $body["bank"] = NULL;
        } else {
            $body["bank"] = $result->message;
        }

        $data['title'] = NAMETITLE . " - Top Up";

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/topup/cash', $body);
        $this->load->view('tamplate/footer');
    }
}