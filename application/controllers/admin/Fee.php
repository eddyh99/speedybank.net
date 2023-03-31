<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fee extends CI_Controller
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
			"title"     => NAMETITLE . " - Default Fee",
			"content"   => "admin/fee/fee",
			"mn_fee"    => "active",
			"extra"     => "admin/fee/js/js_fee",
			"currency"  => apitrackless(URLAPI . "/v1/trackless/currency/getAllCurrency")->message,
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function getfee()
	{
		$currency		= $this->security->xss_clean($_GET["currency"]);

		$mfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=" . $currency);

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
				"referral_send_fxd" => number_format($mfee->message->referral_send_fxd, 2, ".", ","),
				"referral_send_pct" => number_format($mfee->message->referral_send_pct * 100, 2, ".", ","),
				"referral_receive_fxd" => number_format($mfee->message->referral_receive_fxd, 2, ".", ","),
				"referral_receive_pct" => number_format($mfee->message->referral_receive_pct * 100, 2, ".", ","),
				"referral_topup_fxd" => number_format($mfee->message->referral_topup_fxd, 2, ".", ","),
				"referral_topup_pct" => number_format($mfee->message->referral_topup_pct * 100, 2, ".", ","),
				"referral_bank_fxd" => number_format($mfee->message->referral_bank_fxd, 2, ".", ","),
				"referral_bank_pct" => number_format($mfee->message->referral_bank_pct * 100, 2, ".", ","),
				"card_fxd" => number_format($mfee->message->card_fxd, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"topup_circuit_fxd" => number_format(0, 2, ".", ","),
				"topup_circuit_pct" => number_format(0 * 100, 2, ".", ","),
				"topup_outside_fxd" => number_format(0, 2, ".", ","),
				"topup_outside_pct" => number_format(0 * 100, 2, ".", ","),
				"wallet_sender_fxd" => number_format(0, 2, ".", ","),
				"wallet_sender_pct" => number_format(0 * 100, 2, ".", ","),
				"wallet_receiver_fxd" => number_format(0, 2, ".", ","),
				"wallet_receiver_pct" => number_format(0 * 100, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format(0, 2, ".", ","),
				"walletbank_circuit_pct" => number_format(0 * 100, 2, ".", ","),
				"walletbank_outside_fxd" => number_format(0, 2, ".", ","),
				"walletbank_outside_pct" => number_format(0 * 100, 2, ".", ","),
				"referral_send_fxd" => number_format(0, 2, ".", ","),
				"referral_send_pct" => number_format(0 * 100, 2, ".", ","),
				"referral_receive_fxd" => number_format(0, 2, ".", ","),
				"referral_receive_pct" => number_format(0 * 100, 2, ".", ","),
				"referral_topup_fxd" => number_format(0, 2, ".", ","),
				"referral_topup_pct" => number_format(0 * 100, 2, ".", ","),
				"referral_bank_fxd" => number_format(0, 2, ".", ","),
				"referral_bank_pct" => number_format(0 * 100, 2, ".", ","),
				"card_fxd" => number_format(0, 2, ".", ","),
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
				"referral_send_fxd" => number_format($mfee->message->referral_send_fxd, 2, ".", ","),
				"referral_send_pct" => number_format($mfee->message->referral_send_pct * 100, 2, ".", ","),
				"referral_receive_fxd" => number_format($mfee->message->referral_receive_fxd, 2, ".", ","),
				"referral_receive_pct" => number_format($mfee->message->referral_receive_pct * 100, 2, ".", ","),
				"referral_topup_fxd" => number_format($mfee->message->referral_topup_fxd, 2, ".", ","),
				"referral_topup_pct" => number_format($mfee->message->referral_topup_pct * 100, 2, ".", ","),
				"referral_bank_fxd" => number_format($mfee->message->referral_bank_fxd, 2, ".", ","),
				"referral_bank_pct" => number_format($mfee->message->referral_bank_pct * 100, 2, ".", ","),
				"card_fxd" => number_format($mfee->message->card_fxd, 2, ".", ","),
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
				"referral_send_fxd" => number_format(0, 2, ".", ","),
				"referral_send_pct" => number_format(0, 2, ".", ","),
				"referral_receive_fxd" => number_format(0, 2, ".", ","),
				"referral_receive_pct" => number_format(0, 2, ".", ","),
				"referral_topup_fxd" => number_format(0, 2, ".", ","),
				"referral_topup_pct" => number_format(0, 2, ".", ","),
				"referral_bank_fxd" => number_format(0, 2, ".", ","),
				"referral_bank_pct" => number_format(0, 2, ".", ","),
				"card_fxd" => number_format(0, 2, ".", ","),
			);
		}

		$data = array(
			"title"     => NAMETITLE . " - Edit Default Fee",
			"content"   => "admin/fee/editfee",
			"extra"     => "admin/js/js_btn_disabled",
			"mn_fee"    => "active",
			"fee"       => $mdata,
			"currency"  => $currency
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function updatefee()
	{
		$input		= $this->input;
		$currency   = $this->security->xss_clean($input->post("currency"));
		
		$new_topup_circuit_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("topup_circuit_fxd"));
        $_POST["topup_circuit_fxd"]=$new_topup_circuit_fxd;
		$new_topup_circuit_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("topup_circuit_pct"));
        $_POST["topup_circuit_pct"]=$new_topup_circuit_pct;
		$new_topup_outside_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("topup_outside_fxd"));
        $_POST["topup_outside_fxd"]=$new_topup_outside_fxd;
		$new_topup_outside_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("topup_outside_pct"));
        $_POST["topup_outside_pct"]=$new_topup_outside_pct;
		$new_wallet_sender_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("wallet_sender_fxd"));
        $_POST["wallet_sender_fxd"]=$new_wallet_sender_fxd;
		$new_wallet_sender_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("wallet_sender_pct"));
        $_POST["wallet_sender_pct"]=$new_wallet_sender_pct;
		$new_wallet_receiver_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("wallet_receiver_fxd"));
        $_POST["wallet_receiver_fxd"]=$new_wallet_receiver_fxd;
		$new_wallet_receiver_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("wallet_receiver_pct"));
        $_POST["wallet_receiver_pct"]=$new_wallet_receiver_pct;
		$new_walletbank_circuit_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("walletbank_circuit_fxd"));
        $_POST["walletbank_circuit_fxd"]=$new_walletbank_circuit_fxd;
		$new_walletbank_circuit_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("walletbank_circuit_pct"));
        $_POST["walletbank_circuit_pct"]=$new_walletbank_circuit_pct;
		$new_walletbank_outside_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("walletbank_outside_fxd"));
        $_POST["walletbank_outside_fxd"]=$new_walletbank_outside_fxd;
		$new_walletbank_outside_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("walletbank_outside_pct"));
        $_POST["walletbank_outside_pct"]=$new_walletbank_outside_pct;
		$new_referral_send_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_send_fxd"));
        $_POST["referral_send_fxd"]=$new_referral_send_fxd;
		$new_referral_send_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_send_pct"));
        $_POST["referral_send_pct"]=$new_referral_send_pct;
		$new_referral_receive_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_receive_fxd"));
        $_POST["referral_receive_fxd"]=$new_referral_receive_fxd;
		$new_referral_receive_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_receive_pct"));
        $_POST["referral_receive_pct"]=$new_referral_receive_pct;
		$new_referral_topup_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_topup_fxd"));
        $_POST["referral_topup_fxd"]=$new_referral_topup_fxd;
		$new_referral_topup_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_topup_pct"));
        $_POST["referral_topup_pct"]=$new_referral_topup_pct;
		$new_referral_bank_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_bank_fxd"));
        $_POST["referral_bank_fxd"]=$new_referral_bank_fxd;
		$new_referral_bank_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_bank_pct"));
        $_POST["referral_bank_pct"]=$new_referral_bank_pct;
		$new_card_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("card_fxd"));
				$_POST["card_fxd"]=$new_card_fxd;

		if (($currency == "USD") ||
			($currency == "EUR") ||
			($currency == "GBP")
		) {
			$this->form_validation->set_rules('topup_circuit_fxd', 'Topup Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_circuit_pct', 'Topup Circuit (%)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_outside_fxd', 'Topup Outside (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_outside_pct', 'Topup Outside (%)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('walletbank_outside_fxd', 'Walletbank Outside (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('walletbank_outside_pct', 'Walletbank Outside (%)', 'trim|required|greater_than_equal_to[0]');
		}

		if (($currency == "AUD") ||
			($currency == "NZD") ||
			($currency == "CAD") ||
			($currency == "HUF") ||
			($currency == "SGD") ||
			($currency == "RON") ||
			($currency == "TRY")
		) {
			$this->form_validation->set_rules('topup_circuit_fxd', 'Topup Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_circuit_pct', 'Topup Circuit (%)', 'trim|required|greater_than_equal_to[0]');
		}
				if ($currency=="EUR"){
			$this->form_validation->set_rules('card_fxd', 'Card (Fixed)', 'trim|required|greater_than_equal_to[0]');
        }
		$this->form_validation->set_rules('wallet_sender_fxd', 'Wallet Sender (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('wallet_sender_pct', 'Wallet Sender (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('wallet_receiver_fxd', 'Wallet Receive (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('wallet_receiver_pct', 'Wallet Receive (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('walletbank_circuit_fxd', 'Walletbank Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('walletbank_circuit_pct', 'Walletbank Circuit (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('referral_send_fxd', 'Referral Wallet to Sender (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('referral_send_pct', 'Referral Wallet to Sender (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('referral_receive_fxd', 'Referral Wallet to Reveice (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('referral_receive_pct', 'Referral Wallet to Reveice (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('referral_topup_fxd', 'Referral Wallet to Topup (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('referral_topup_pct', 'Referral Wallet to Topup (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('referral_bank_fxd', 'Referral Wallet to Bank (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('referral_bank_pct', 'Referral Wallet to Bank (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required|max_length[3]|min_length[3]');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
			redirect(base_url() . "admin/fee/editfee/" . $currency);
			return;
		}

		$topup_circuit_fxd = $this->security->xss_clean($input->post("topup_circuit_fxd"));
		$topup_circuit_pct = $this->security->xss_clean($input->post("topup_circuit_pct"));
		$topup_outside_fxd = $this->security->xss_clean($input->post("topup_outside_fxd"));
		$topup_outside_pct = $this->security->xss_clean($input->post("topup_outside_pct"));
		$wallet_sender_fxd = $this->security->xss_clean($input->post("wallet_sender_fxd"));
		$wallet_sender_pct = $this->security->xss_clean($input->post("wallet_sender_pct"));
		$wallet_receiver_fxd = $this->security->xss_clean($input->post("wallet_receiver_fxd"));
		$wallet_receiver_pct = $this->security->xss_clean($input->post("wallet_receiver_pct"));
		$walletbank_circuit_fxd = $this->security->xss_clean($input->post("walletbank_circuit_fxd"));
		$walletbank_circuit_pct = $this->security->xss_clean($input->post("walletbank_circuit_pct"));
		$walletbank_outside_fxd = $this->security->xss_clean($input->post("walletbank_outside_fxd"));
		$walletbank_outside_pct = $this->security->xss_clean($input->post("walletbank_outside_pct"));
		$referral_send_fxd = $this->security->xss_clean($input->post("referral_send_fxd"));
		$referral_send_pct = $this->security->xss_clean($input->post("referral_send_pct"));
		$referral_receive_fxd = $this->security->xss_clean($input->post("referral_receive_fxd"));
		$referral_receive_pct = $this->security->xss_clean($input->post("referral_receive_pct"));
		$referral_topup_fxd = $this->security->xss_clean($input->post("referral_topup_fxd"));
		$referral_topup_pct = $this->security->xss_clean($input->post("referral_topup_pct"));
		$referral_bank_fxd = $this->security->xss_clean($input->post("referral_bank_fxd"));
		$referral_bank_pct = $this->security->xss_clean($input->post("referral_bank_pct"));
		$card_fxd = $this->security->xss_clean($input->post("card_fxd"));

		if ($topup_circuit_fxd == '') {
			$topup_circuit_fxd = 0;
		}
		if ($topup_circuit_pct == '') {
			$topup_circuit_pct = 0;
		}
		if ($topup_outside_fxd == '') {
			$topup_outside_fxd = 0;
		}
		if ($topup_outside_pct == '') {
			$topup_outside_pct = 0;
		}
		if ($wallet_sender_fxd == '') {
			$wallet_sender_fxd = 0;
		}
		if ($wallet_sender_pct == '') {
			$wallet_sender_pct = 0;
		}
		if ($wallet_receiver_fxd == '') {
			$wallet_receiver_fxd = 0;
		}
		if ($wallet_receiver_pct == '') {
			$wallet_receiver_pct = 0;
		}
		if ($walletbank_circuit_fxd == '') {
			$walletbank_circuit_fxd = 0;
		}
		if ($walletbank_circuit_pct == '') {
			$walletbank_circuit_pct = 0;
		}
		if ($walletbank_outside_fxd == '') {
			$walletbank_outside_fxd = 0;
		}
		if ($walletbank_outside_pct == '') {
			$walletbank_outside_pct = 0;
		}
		if ($referral_send_fxd == '') {
			$referral_send_fxd = 0;
		}
		if ($referral_send_pct == '') {
			$referral_send_pct = 0;
		}
		if ($referral_receive_fxd == '') {
			$referral_receive_fxd = 0;
		}
		if ($referral_receive_pct == '') {
			$referral_receive_pct = 0;
		}
		if ($referral_topup_fxd == '') {
			$referral_topup_fxd = 0;
		}
		if ($referral_topup_pct == '') {
			$referral_topup_pct = 0;
		}
		if ($referral_bank_fxd == '') {
			$referral_bank_fxd = 0;
		}
		if ($referral_bank_pct == '') {
			$referral_bank_pct = 0;
		}
		if ($card_fxd == '') {
			$card_fxd = 0;
		}

		$mdata = array(
			"currency"          => $currency,
			"topup_circuit_fxd" => $topup_circuit_fxd,
			"topup_circuit_pct" => $topup_circuit_pct / 100,
			"topup_outside_fxd" => $topup_outside_fxd,
			"topup_outside_pct" => $topup_outside_pct / 100,
			"wallet_sender_fxd" => $wallet_sender_fxd,
			"wallet_sender_pct" => $wallet_sender_pct / 100,
			"wallet_receiver_fxd" => $wallet_receiver_fxd,
			"wallet_receiver_pct" => $wallet_receiver_pct / 100,
			"walletbank_circuit_fxd" => $walletbank_circuit_fxd,
			"walletbank_circuit_pct" => $walletbank_circuit_pct / 100,
			"walletbank_outside_fxd" => $walletbank_outside_fxd,
			"walletbank_outside_pct" => $walletbank_outside_pct / 100,
			"referral_send_fxd" => $referral_send_fxd,
			"referral_send_pct" => $referral_send_pct / 100,
			"referral_receive_fxd" => $referral_receive_fxd,
			"referral_receive_pct" => $referral_receive_pct / 100,
			"referral_topup_fxd" => $referral_topup_fxd,
			"referral_topup_pct" => $referral_topup_pct / 100,
			"referral_bank_fxd" => $referral_bank_fxd,
			"referral_bank_pct" => $referral_bank_pct / 100,
			"card_fxd"          => $card_fxd,
		);
		$result = apitrackless(URLAPI . "/v1/admin/fee/setFee", json_encode($mdata));

		if (@$result->code == 200) {
			$this->session->set_flashdata("success", "Default Fee is successfully updated");
			redirect('admin/fee');
		} else {
			$this->session->set_flashdata("failed", $result->message);
			redirect(base_url() . "admin/fee/editfee/" . $currency);
		}
	}
}