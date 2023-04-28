<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SendWallet extends CI_Controller
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
        $ucode = "";
        $amount = "";
        $causal = "";

        $data = array(
            "title"     => NAMETITLE . " - Master Wallet",
            "content"   => "admin/mwallet/wallet/send-wallet",
            "s_wallet" => "active",
            // "extra"     => "admin/mwallet/wallet/js/js-send-wallet",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function send_confirm()
    {

        $this->form_validation->set_rules('ucode', 'Unique Code', 'trim|required');
        $this->form_validation->set_rules('confirm_ucode', 'Confirm Unique Code', 'trim|required|matches[ucode]');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('confirm_amount', 'Confirm Amount', 'trim|required|greater_than[0]|matches[amount]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("admin/sendwallet");
            return;
        }


        $input      = $this->input;
        $ucode      = $this->security->xss_clean($input->post("ucode"));
        $amount     = $this->security->xss_clean($input->post("amount"));
        $causal     = $this->security->xss_clean($input->post("causal"));

        // $mdata  = array(
        //     "userid"    => $_SESSION["user_id"],
        //     "currency"  => $_SESSION["currency"],
        //     "ucode"     => $ucode,
        //     "amount"    => $amount
        // );

        // $result = apitrackless(URLAPI . "/v1/member/wallet/getSummary", json_encode($mdata));

        // if (@$result->code != "200") {
        //     $this->session->set_flashdata('failed', $result->message);
        //     redirect("admin/sendwallet");
        //     return;
        // }


        $data = array(
            "title"         => NAMETITLE . " - Master Wallet",
            "content"       => "admin/mwallet/wallet/send-confirm",
            "s_wallet"      => "active",
            'ucode'         => @$ucode,
            'amount'        => @$amount,
            'causal'        => @$causal,
            'fee'           => '0.35',
            'deduct'        => '10.35'
            // "extra"     => "admin/mwallet/wallet/js/js-send-wallet",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function send_notif()
    {
        $data = array(
            "title"         => NAMETITLE . " - Master Wallet",
            "content"       => "admin/mwallet/wallet/wallet-notif",
            "s_wallet"      => "active",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }


}
