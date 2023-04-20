<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
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
        $data['title'] = NAMETITLE . " - Wallet to Bank";

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top', $data);
        $this->load->view('tamplate/navbar-bottom', $data);
        $this->load->view('member/tobank/bank');
        $this->load->view('tamplate/footer');
    }

    public function local()
    {
        $currencyCode = array(
            "BDT" => "BD",
            "CZK" => "CZ",
            "CLP" => "CL",
            "EGP" => "EG",
            "GHS" => "GH",
            "HKD" => "HK",
            "IDR" => "ID",
            "ILS" => "IL",
            "INR" => "IN",
            "JPY" => "JP",
            "KES" => "KE",
            "LKR" => "LK",
            "MAD" => "MA",
            "NGN" => "NG",
            "NPR" => "NP",
            "PEN" => "PE",
            "PHP" => "PH",
            "RUB" => "RU",
            "SGD" => "SG",
            "THB" => "TH",
            "VND" => "VN",
            "ZAR" => "ZA"
        );
        if (@$currencyCode[$_SESSION['currency']] == '') {
            $data["codecur"] = '';
        } else {
            $url = URLAPI . "/v1/member/wallet/getBankCode?country=" . $currencyCode[$_SESSION['currency']];
            $data["codecur"]   = apitrackless($url)->message->values;
        }

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

        $data['title'] = NAMETITLE . " - Wallet to Bank";
        $footer['extra'] = "member/tobank/currency/js/js_form_currency";
        $data['currencycode'] = @$currencyCode[$_SESSION['currency']];
        $data['fee'] = @$fee;

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-bottom', $data);
        $this->load->view('member/tobank/bank-local');
        $this->load->view('tamplate/footer', $footer);
    }

    public function inter()
    {
        $currencyCode = array(
            "BDT" => "BD",
            "CZK" => "CZ",
            "CLP" => "CL",
            "EGP" => "EG",
            "GHS" => "GH",
            "HKD" => "HK",
            "IDR" => "ID",
            "ILS" => "IL",
            "INR" => "IN",
            "JPY" => "JP",
            "KES" => "KE",
            "LKR" => "LK",
            "MAD" => "MA",
            "NGN" => "NG",
            "NPR" => "NP",
            "PEN" => "PE",
            "PHP" => "PH",
            "RUB" => "RU",
            "SGD" => "SG",
            "THB" => "TH",
            "VND" => "VN",
            "ZAR" => "ZA"
        );
        if (@$currencyCode[$_SESSION['currency']] == '') {
            $data["codecur"] = '';
        } else {
            $url = URLAPI . "/v1/member/wallet/getBankCode?country=" . $currencyCode[$_SESSION['currency']];
            $data["codecur"]   = apitrackless($url)->message->values;
        }

        $bankcost = apitrackless(URLAPI . "/v1/admin/cost/getCost?currency=" . $_SESSION['currency']);
        $bankfee = apitrackless(URLAPI . "/v1/admin/fee/getFee?currency=" . $_SESSION['currency']);

        $fee = (balance($_SESSION['user_id'], $_SESSION["currency"]) *
            @$bankcost->message->walletbank_outside_pct) +
            (balance($_SESSION['user_id'], $_SESSION["currency"]) *
                @$bankfee->message->walletbank_outside_pct) +
            (balance($_SESSION['user_id'], $_SESSION["currency"]) *
                @$bankfee->message->referral_bank_pct) +
            @$bankcost->message->walletbank_outside_fxd +
            @$bankfee->message->walletbank_outside_fxd +
            @$bankfee->message->referral_bank_fxd;

        if ((balance($_SESSION['user_id'], $_SESSION["currency"]) * 100) <= 0) {
            $fee = 0;
        }

        if ((balance($_SESSION['user_id'], $_SESSION["currency"]) * 100) < ($fee * 100)) {
            $fee = balance($_SESSION['user_id'], $_SESSION["currency"]);
        }

        $data['title'] = NAMETITLE . " - Wallet to Bank";
        $footer['extra'] = "admin/js/js_btn_disabled";
        $data['currencycode'] = @$currencyCode[$_SESSION['currency']];
        $data['fee'] = @$fee;

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-bottom', $data);
        $this->load->view('member/tobank/bank-inter');
        $this->load->view('tamplate/footer', $footer);
    }

    public function getbranchCode()
    {
        $this->form_validation->set_rules('currencycode', 'Country', 'trim|required');
        $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim|required');
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
        $country = $this->security->xss_clean($input->post("currencycode"));
        $bankCode = $this->security->xss_clean($input->post("bankCode"));

        $url = URLAPI . "/v1/member/wallet/getBranchCode?country=" . $country . "&bankcode=" . $bankCode;
        $result = apitrackless($url)->message->values;
        $data['bankCode'] = $result;
        $response = array(
            "token"     => $this->security->get_csrf_hash(),
            "message"   => utf8_encode($this->load->view('member/tobank/currency/js/branchCode', $data, TRUE))
        );

        echo json_encode($response);
    }

    public function bankconfirm()
    {
        $amount = $this->security->xss_clean($this->input->post("amount"));

        $a = $this->input->post("amount");
        $b = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $a);
        $_POST["amount"] = $b;

        $input    = $this->input;
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');
        $this->form_validation->set_rules(
            'transfer_type',
            'Transfer Type',
            array(
                'trim',
                'required',
                array(
                    'undefined',
                    function ($str) {
                        return $str === "circuit" || $str === "outside";
                    }
                )
            ),
            array(
                'undefined' => 'Unknown {field} [' . $this->input->post('transfer_type') . ']',
            )
        );

        $this->form_validation->set_rules('accountHolderName', 'Recipient Name', 'trim|required');

        if ($_SESSION["currency"] == "USD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country initial', 'trim');
            $this->form_validation->set_rules('state', 'State initial', 'trim');
            $this->form_validation->set_rules('abartn', 'Abartn', 'trim');
            $this->form_validation->set_rules('swiftCode', 'swift Code', 'trim');
        }

        if ($_SESSION["currency"] == "EUR") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        if ($_SESSION["currency"] == "AED") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "ARS") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('taxId', 'TAX ID', 'trim');
        }

        if ($_SESSION["currency"] == "AUD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country initial', 'trim');
            $this->form_validation->set_rules('state', 'State initial', 'trim');
            $this->form_validation->set_rules('bsbCode', 'BSB Code', 'trim');
            $this->form_validation->set_rules('billerCode', 'BPAY biller code', 'trim');
            $this->form_validation->set_rules('customerReferenceNumber', 'Customer Reference Number (CRN)', 'trim');
        }

        if ($_SESSION["currency"] == "BDT") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION["currency"] == "CAD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('institutionNumber', 'Institution Number', 'trim');
            $this->form_validation->set_rules('transitNumber', 'Transit Number', 'trim');
            $this->form_validation->set_rules('interacAccount', 'Interac registered email', 'trim');
        }

        if ($_SESSION["currency"] == "CLP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('rut', 'Rut', 'trim');
            $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'trim');
        }

        if ($_SESSION["currency"] == "CNY") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
        }

        if ($_SESSION["currency"] == "CZK") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'bank Code', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "DKK") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "EGP") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "GBP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('sortCode', 'Sort Code', 'trim');
        }

        if ($_SESSION["currency"] == "GEL") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "GHS") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION["currency"] == "HKD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "HRK") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "HUF") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "IDR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "ILS") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "INR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('ifscCode', 'ifsc Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "JPY") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION["currency"] == "KES") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "KRW") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('dateOfBirth', 'Date of Birth', 'trim');
        }

        if ($_SESSION["currency"] == "LKR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION["currency"] == "MAD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "MXN") {
            $this->form_validation->set_rules('clabe', 'Clabe', 'trim');
        }

        if ($_SESSION["currency"] == "MYR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
        }

        if ($_SESSION["currency"] == "NGN") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "NOK") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "NPR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "NZD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
        }

        if ($_SESSION["currency"] == "PHP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "PKR") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "PLN") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "RON") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "SEK") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "SGD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "THB") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "TRY") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "UAH") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "VND") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        if ($_SESSION["currency"] == "ZAR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect(base_url() . "bank/" . $this->security->xss_clean($input->post("url")));
        }

        $mdata = array(
            "userid"            => $_SESSION["user_id"],
            "currency"          => $_SESSION["currency"],
            "amount"            => $this->security->xss_clean($input->post("amount")),
            "transfer_type"     => $this->security->xss_clean($input->post("transfer_type")),
        );

        $result = apitrackless(URLAPI . "/v1/member/wallet/bankSummary", json_encode($mdata));

        if (@$result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect(base_url() . "bank/" . $this->security->xss_clean($input->post("url")));
        }

        $transfer_type  = $this->security->xss_clean($input->post("transfer_type"));
        $temp["fee"]               = $result->message->fee;
        $temp["deduct"]            = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $result->message->deduct);
        $temp["accountHolderName"] = $this->security->xss_clean($input->post("accountHolderName"));
        $temp["amount"]            = $this->security->xss_clean($input->post("amount"));
        $temp["causal"]            = $this->security->xss_clean($input->post("causal"));
        $temp["transfer_type"]     = $transfer_type;

        if ($_SESSION["currency"] == "USD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
            $temp["state"] = $this->security->xss_clean($input->post("state"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["abartn"] = $this->security->xss_clean($input->post("abartn"));
            $temp["swiftCode"] = $this->security->xss_clean($input->post("swiftCode"));
        }

        if ($_SESSION["currency"] == "EUR") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["swiftCode"] = $this->security->xss_clean($input->post("swiftCode"));
        }

        if ($_SESSION["currency"] == "AED") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "ARS") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["taxId"] = $this->security->xss_clean($input->post("taxId"));
        }

        if ($_SESSION["currency"] == "AUD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["state"] = $this->security->xss_clean($input->post("state"));
            $temp["bsbCode"] = $this->security->xss_clean($input->post("bsbCode"));
            $temp["billerCode"] = $this->security->xss_clean($input->post("billerCode"));
            $temp["customerReferenceNumber"] = $this->security->xss_clean($input->post("customerReferenceNumber"));
        }

        if ($_SESSION["currency"] == "BDT") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["branchCode"] = $this->security->xss_clean($input->post("branchCode"));
        }

        if ($_SESSION["currency"] == "CAD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
            $temp["institutionNumber"] = $this->security->xss_clean($input->post("institutionNumber"));
            $temp["transitNumber"] = $this->security->xss_clean($input->post("transitNumber"));
            $temp["interacAccount"] = $this->security->xss_clean($input->post("interacAccount"));
        }

        if ($_SESSION["currency"] == "CLP") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["rut"] = $this->security->xss_clean($input->post("rut"));
            $temp["phoneNumber"] = $this->security->xss_clean($input->post("phoneNumber"));
        }

        if ($_SESSION["currency"] == "CNY") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
        }

        if ($_SESSION["currency"] == "CZK") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "DKK") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "EGP") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "GBP") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
            $temp["sortCode"] = $this->security->xss_clean($input->post("sortCode"));
        }

        if ($_SESSION["currency"] == "GEL") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "GHS") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["branchCode"] = $this->security->xss_clean($input->post("branchCode"));
        }

        if ($_SESSION["currency"] == "HKD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION["currency"] == "HRK") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "HUF") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "IDR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION["currency"] == "ILS") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION["currency"] == "INR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["ifscCode"] = $this->security->xss_clean($input->post("ifscCode"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION["currency"] == "JPY") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["branchCode"] = $this->security->xss_clean($input->post("branchCode"));
        }

        if ($_SESSION["currency"] == "KES") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION["currency"] == "KRW") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["dateOfBirth"] = $this->security->xss_clean($input->post("dateOfBirth"));
        }

        if ($_SESSION["currency"] == "LKR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["branchCode"] = $this->security->xss_clean($input->post("branchCode"));
        }

        if ($_SESSION["currency"] == "MAD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION["currency"] == "MXN") {
            $temp["clabe"] = $this->security->xss_clean($input->post("clabe"));
        }

        if ($_SESSION["currency"] == "MYR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["swiftCode"] = $this->security->xss_clean($input->post("swiftCode"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
        }

        if ($_SESSION["currency"] == "NGN") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION["currency"] == "NOK") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "NPR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION["currency"] == "NZD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
        }

        if ($_SESSION["currency"] == "PHP") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION["currency"] == "PKR") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "PLN") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "RON") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "SEK") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "SGD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION["currency"] == "THB") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION["currency"] == "TRY") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
        }

        if ($_SESSION["currency"] == "UAH") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
            $temp["phoneNumber"] = $this->security->xss_clean($input->post("phoneNumber"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION["currency"] == "VND") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["swiftCode"] = $this->security->xss_clean($input->post("swiftCode"));
        }

        if ($_SESSION["currency"] == "ZAR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["swiftCode"] = $this->security->xss_clean($input->post("swiftCode"));
        }

        $body["data"] = $temp;

        $data['title'] = NAMETITLE . " - Wallet to Bank Confirmation";
        $footer['extra'] = "admin/js/js_btn_disabled";

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-bottom', $body);
        $this->load->view('member/tobank/bank-confirm');
        $this->load->view('tamplate/footer', $footer);
    }

    public function banknotif()
    {
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');
        $this->form_validation->set_rules(
            'transfer_type',
            'Transfer Type',
            array(
                'trim',
                'required',
                array(
                    'undefined',
                    function ($str) {
                        return $str === "circuit" || $str === "outside";
                    }
                )
            ),
            array(
                'undefined' => 'Unknown {field} [' . $this->input->post('transfer_type') . ']',
            )
        );

        if ($_SESSION["currency"] == "USD") {
            $this->form_validation->set_rules('accountHolderName', 'Recipient Name', 'trim|required');
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country initial', 'trim');
            $this->form_validation->set_rules('state', 'State initial', 'trim');
            $this->form_validation->set_rules('abartn', 'Abartn', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        if ($_SESSION["currency"] == "EUR") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }
        if ($_SESSION["currency"] == "AED") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }
        if ($_SESSION["currency"] == "ARS") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('taxId', 'TAX ID', 'trim');
        }

        if ($_SESSION["currency"] == "AUD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country initial', 'trim');
            $this->form_validation->set_rules('state', 'State initial', 'trim');
            $this->form_validation->set_rules('bsbCode', 'BSB Code', 'trim');
            $this->form_validation->set_rules('billerCode', 'BPAY biller code', 'trim');
            $this->form_validation->set_rules('customerReferenceNumber', 'Customer Reference Number (CRN)', 'trim');
        }

        if ($_SESSION["currency"] == "BDT") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION["currency"] == "CAD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('institutionNumber', 'Institution Number', 'trim');
            $this->form_validation->set_rules('transitNumber', 'Transit Number', 'trim');
            $this->form_validation->set_rules('interacAccount', 'Interac registered email', 'trim');
        }

        if ($_SESSION["currency"] == "CLP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('rut', 'Rut', 'trim');
            $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'trim');
        }

        if ($_SESSION["currency"] == "CNY") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
        }

        if ($_SESSION["currency"] == "CZK") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'bank Code', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "DKK") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "EGP") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "GBP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('sortCode', 'Sort Code', 'trim');
        }

        if ($_SESSION["currency"] == "GEL") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "GHS") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION["currency"] == "HKD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "HRK") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "HUF") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "IDR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "ILS") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "INR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('ifscCode', 'ifsc Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "JPY") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION["currency"] == "KES") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "KRW") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('dateOfBirth', 'Date of Birth', 'trim');
        }

        if ($_SESSION["currency"] == "LKR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION["currency"] == "MAD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "MXN") {
            $this->form_validation->set_rules('clabe', 'Clabe', 'trim');
        }

        if ($_SESSION["currency"] == "MYR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
        }

        if ($_SESSION["currency"] == "NGN") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "NOK") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "NPR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "NZD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
        }

        if ($_SESSION["currency"] == "PHP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "PKR") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "PLN") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "RON") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "SEK") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "SGD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION["currency"] == "THB") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "TRY") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
        }

        if ($_SESSION["currency"] == "UAH") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION["currency"] == "VND") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        if ($_SESSION["currency"] == "ZAR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect(base_url() . "bank");
        }

        $input = $this->input;
        $transfer_type = $this->security->xss_clean($input->post("transfer_type"));
        $accountHolderName = $this->security->xss_clean($input->post("accountHolderName")) . ' xxx';
        $amount = $this->security->xss_clean($input->post("amount"));
        $causal = $this->security->xss_clean($input->post("causal"));
        $transfer_type = $transfer_type;

        if ($_SESSION["currency"] == "USD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $city = $this->security->xss_clean($input->post("city"));
            $postCode = $this->security->xss_clean($input->post("postCode"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $accountType = $this->security->xss_clean($input->post("accountType"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $state = $this->security->xss_clean($input->post("state"));
            $abartn = $this->security->xss_clean($input->post("abartn"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => @$accountNumber,
                    "accountType"       => $accountType,
                    "abartn"            => $abartn,
                    "firstLine"         => $firstLine,
                    "city"              => $city,
                    "state"             => $state,
                    "postCode"          => $postCode,
                    "swiftCode"         => $swiftCode,
                    "countryCode"       => @$countryCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "EUR") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "accountNumber"     => @$accountNumber,
                    "swiftCode"         => @$swiftCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "AED") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "ARS") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $taxId = $this->security->xss_clean($input->post("taxId"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "taxId"             => $taxId,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "AUD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $city = $this->security->xss_clean($input->post("city"));
            $postCode = $this->security->xss_clean($input->post("postCode"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $state = $this->security->xss_clean($input->post("state"));
            $bsbCode = $this->security->xss_clean($input->post("bsbCode"));
            $billerCode = $this->security->xss_clean($input->post("billerCode"));
            $customerReferenceNumber = $this->security->xss_clean($input->post("customerReferenceNumber"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "city"              => $city,
                    "postCode"          => $postCode,
                    "firstLine"         => $firstLine,
                    "countryCode"       => $countryCode,
                    "state"             => $state,
                    "bsbCode"           => $bsbCode,
                    "billerCode"        => $billerCode,
                    "customerReferenceNumber" => $customerReferenceNumber,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "BDT") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $branchCode = $this->security->xss_clean($input->post("branchCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "branchCode"        => $branchCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "CAD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $accountType = $this->security->xss_clean($input->post("accountType"));
            $institutionNumber = $this->security->xss_clean($input->post("institutionNumber"));
            $transitNumber = $this->security->xss_clean($input->post("transitNumber"));
            $interacAccount = $this->security->xss_clean($input->post("interacAccount"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "accountType"       => $accountType,
                    "institutionNumber" => $institutionNumber,
                    "transitNumber"     => $transitNumber,
                    "interacAccount"     => $interacAccount,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "CLP") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $accountType = $this->security->xss_clean($input->post("accountType"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $rut = $this->security->xss_clean($input->post("rut"));
            $phoneNumber = $this->security->xss_clean($input->post("phoneNumber"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "accountType"       => $accountType,
                    "bankCode"          => $bankCode,
                    "rut"               => $rut,
                    "phoneNumber"       => $phoneNumber,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "CNY") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "CZK") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "DKK") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "EGP") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "GBP") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $IBAN = $this->security->xss_clean($input->post("IBAN"));
            $sortCode = $this->security->xss_clean($input->post("sortCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "IBAN"              => $IBAN,
                    "sortCode"          => $sortCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "GEL") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "GHS") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $branchCode = $this->security->xss_clean($input->post("branchCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "branchCode"        => $branchCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "HKD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "HRK") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "HUF") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "IDR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "ILS") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "INR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $ifscCode = $this->security->xss_clean($input->post("ifscCode"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "ifscCode"          => $ifscCode,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "JPY") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $accountType = $this->security->xss_clean($input->post("accountType"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $branchCode = $this->security->xss_clean($input->post("branchCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "accountType"       => $accountType,
                    "bankCode"          => $bankCode,
                    "branchCode"        => $branchCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "KES") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "KRW") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $dateOfBirth = $this->security->xss_clean($input->post("dateOfBirth"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "dateOfBirth"       => $dateOfBirth,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "LKR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $branchCode = $this->security->xss_clean($input->post("branchCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "branchCode"        => $branchCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "MAD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "MXN") {
            $clabe = $this->security->xss_clean($input->post("clabe"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "clabe"             => $clabe,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "MYR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));
            $accountType = $this->security->xss_clean($input->post("accountType"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "accountType"       => $accountType,
                    "swiftCode"         => $swiftCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "NGN") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "NOK") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "NPR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "NZD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "causal"            => @$causal,
                )
            );
        }


        if ($_SESSION["currency"] == "PHP") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "PKR") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "PLN") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "RON") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "SEK") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }


        if ($_SESSION["currency"] == "SGD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "THB") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "TRY") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "UAH") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $IBAN = $this->security->xss_clean($input->post("IBAN"));
            $phoneNumber = $this->security->xss_clean($input->post("phoneNumber"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "IBAN"              => $IBAN,
                    "phoneNumber"          => $phoneNumber,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "VND") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "swiftCode"         => $swiftCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "ZAR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "swiftCode"         => $swiftCode,
                    "causal"            => @$causal,
                )
            );
        }

        $result = apitrackless(URLAPI . "/v1/member/wallet/bankTransfer", json_encode($mdata));

        if (@$result->code != 200) {
            if (@$result->code == 5055) {
                $this->session->set_flashdata("failed", $result->message);
                redirect(base_url() . "bank");
            }
            $this->session->set_flashdata("failed", $result->message);
            redirect(base_url() . "bank");
        }

        $data['title'] = NAMETITLE . " - Wallet to Bank Completed";

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-bottom');
        $this->load->view('member/tobank/bank-notif');
        $this->load->view('tamplate/footer');
    }
}
