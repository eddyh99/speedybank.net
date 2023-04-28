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
        /*$currency = $_SESSION["currency"];
        $url = URLAPI. "/v1/bank/getBank?currency=" . $currency;
        $result = apitrackless($url);
        print_r();
        if ($result->code != 200) {
            $body["bank"] = NULL;
        } else {
            $body["bank"] = $result->message;
        }
*/
        $data['title'] = NAMETITLE . " - Add Receive";

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top', $data);
        $this->load->view('tamplate/navbar-bottom', $data);
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
        $data['title'] = NAMETITLE . " - Add Receive";

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/topup/localbank', $body);
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

        $data['title'] = NAMETITLE . " - Add Receive";

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/topup/interbank', $body);
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

        $data['title'] = NAMETITLE . " - Add Receive";

        $this->load->view('tamplate/header', $data);
        $this->load->view('member/topup/cash', $body);
        $this->load->view('tamplate/footer');
    }
}