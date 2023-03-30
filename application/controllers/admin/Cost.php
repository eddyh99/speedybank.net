<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cost extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user_id'))) {
			redirect(base_url());
		}
	}

	public function index()
	{

		$data = array(
			"title"     => NAMETITLE . " - Default Cost",
			"content"   => "admin/cost/cost",
			"mn_cost"    => "active",
			"extra"     => "admin/cost/js/js_cost",
			"currency"  => apitrackless(URLAPI . "/v1/trackless/currency/getAllCurrency")->message,
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function getcost()
	{
		$currency		= $this->security->xss_clean($_GET["currency"]);

		$mfee = apitrackless(URLAPI . "/v1/admin/cost/getCost?currency=" . $currency);

		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"topup_circuit_fxd" => number_format($mfee->message->topup_circuit_fxd, 2, ".", ","),
				"topup_circuit_pct" => number_format($mfee->message->topup_circuit_pct * 100, 2, ".", ","),
				"topup_outside_fxd" => number_format($mfee->message->topup_outside_fxd, 2, ".", ","),
				"topup_outside_pct" => number_format($mfee->message->topup_outside_pct * 100, 2, ".", ","),
				"wallet_sender_fxd" => number_format($mfee->message->wallet_sender_fxd, 2, ".", ","),
				"wallet_sender_pct" => number_format($mfee->message->wallet_sender_pct * 100, 2, ".", ","),
				"wallet_receiver_fxd" => number_format($mfee->message->wallet_receiver_fxd, 2, ".", ","),
				"wallet_receiver_pct" => number_format($mfee->message->wallet_receiver_pct * 100, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format($mfee->message->walletbank_circuit_fxd, 2, ".", ","),
				"walletbank_circuit_pct" => number_format($mfee->message->walletbank_circuit_pct * 100, 2, ".", ","),
				"walletbank_outside_fxd" => number_format($mfee->message->walletbank_outside_fxd, 2, ".", ","),
				"walletbank_outside_pct" => number_format($mfee->message->walletbank_outside_pct * 100, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"topup_circuit_fxd" => number_format(0, 2, ".", ","),
				"topup_circuit_pct" => number_format(0, 2, ".", ","),
				"topup_outside_fxd" => number_format(0, 2, ".", ","),
				"topup_outside_pct" => number_format(0, 2, ".", ","),
				"wallet_sender_fxd" => number_format(0, 2, ".", ","),
				"wallet_sender_pct" => number_format(0, 2, ".", ","),
				"wallet_receiver_fxd" => number_format(0, 2, ".", ","),
				"wallet_receiver_pct" => number_format(0, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format(0, 2, ".", ","),
				"walletbank_circuit_pct" => number_format(0, 2, ".", ","),
				"walletbank_outside_fxd" => number_format(0, 2, ".", ","),
				"walletbank_outside_pct" => number_format(0, 2, ".", ","),
			);
		}
		echo json_encode($mdata);
	}

	public function editfee($currency)
	{
		$mfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=" . $currency);

		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"topup"             => number_format($mfee->message->topup, 2, ".", ","),
				"walletbank_local"  => number_format($mfee->message->walletbank_circuit, 2, ".", ","),
				"walletbank_inter"  => number_format($mfee->message->walletbank_outside, 2, ".", ","),
				"wallet2wallet"     => number_format($mfee->message->wallet, 2, ".", ","),
				"ref_send"          => number_format($mfee->message->referral_send, 2, ".", ","),
				"ref_receive"       => number_format($mfee->message->referral_receive, 2, ".", ","),
				"swap"              => number_format($mfee->message->swap, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"topup"             => number_format(0, 2, ".", ","),
				"walletbank_local"  => number_format(0, 2, ".", ","),
				"walletbank_inter"  => number_format(0, 2, ".", ","),
				"wallet2wallet"     => number_format(0, 2, ".", ","),
				"ref_send"          => number_format(0, 2, ".", ","),
				"ref_receive"       => number_format(0, 2, ".", ","),
				"swap"              => number_format(0, 2, ".", ","),
			);
		}

		$data = array(
			"title"     => NAMETITLE . " - Edit Default Fee",
			"content"   => "admin/fee/editfee",
			"mn_fee"    => "active",
			"fee"       => $mdata,
			"currency"  => $currency
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function updatefee()
	{
		$new_topup = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("topup"));
		$_POST["topup"]=$new_topup;
		$new_walletbank_local = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("walletbank_local"));
		$_POST["walletbank_local"]=$new_walletbank_local;
		$new_walletbank_inter = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("walletbank_inter"));
		$_POST["walletbank_inter"]=$new_walletbank_inter;
		$new_wallet2wallet = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("wallet2wallet"));
		$_POST["wallet2wallet"]=$new_wallet2wallet;
		$new_referral_send = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_send"));
		$_POST["referral_send"]=$new_referral_send;
		$new_referral_receive = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_receive"));
		$_POST["referral_receive"]=$new_referral_receive;
		$new_swap = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("swap"));
		$_POST["swap"]=$new_swap;
		
		$this->form_validation->set_rules('topup', 'Topup', 'trim|required|greater_than_equal_to[0]|decimal');
		$this->form_validation->set_rules('walletbank_local', 'Wallet to Bank Local', 'trim|required|greater_than_equal_to[0]|decimal');
		$this->form_validation->set_rules('walletbank_inter', 'Wallet to Bank International', 'trim|required|greater_than_equal_to[0]|decimal');
		$this->form_validation->set_rules('wallet2wallet', 'Wallet to Wallet', 'trim|required|greater_than_equal_to[0]|decimal');
		$this->form_validation->set_rules('referral_send', 'Referral Sender', 'trim|required|greater_than_equal_to[0]|decimal');
		$this->form_validation->set_rules('referral_receive', 'Referral Receiver', 'trim|required|greater_than_equal_to[0]|decimal');
		$this->form_validation->set_rules('swap', 'Swap', 'trim|required|greater_than_equal_to[0]|decimal');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required|max_length[3]|min_length[3]');

		$input		= $this->input;
		$currency   = $this->security->xss_clean($input->post("currency"));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
			redirect(base_url() . "admin/fee/editfee/" . $currency);
			return;
		}

		$topup		        = $this->security->xss_clean($input->post("topup"));
		$walletbank_local   = $this->security->xss_clean($input->post("walletbank_local"));
		$walletbank_inter	= $this->security->xss_clean($input->post("walletbank_inter"));
		$wallet2wallet		= $this->security->xss_clean($input->post("wallet2wallet"));
		$referral_send		= $this->security->xss_clean($input->post("referral_send"));
		$referral_receive   = $this->security->xss_clean($input->post("referral_receive"));
		$swap		        = $this->security->xss_clean($input->post("swap"));

		$mdata = array(
			"topup"                 => $topup,
			"walletbank_circuit"    => $walletbank_local,
			"walletbank_outside"    => $walletbank_inter,
			"wallet"                => $wallet2wallet,
			"referral_send"         => $referral_send,
			"referral_receive"      => $referral_receive,
			"swap"                  => $swap,
			"currency"              => $currency,
		);
		$result = apitrackless(URLAPI . "/v1/admin/fee/setFee", json_encode($mdata));
		if ($result->code == 200) {
			$this->session->set_flashdata("success", "Default Fee is successfully updated");
			redirect('admin/fee');
		} else {
			$this->session->set_flashdata("failed", $result->message);
		}
	}
}