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
				"card_fxd" => number_format(0, 2, ".", ","),
			);
		}
		echo json_encode($mdata);
	}
}