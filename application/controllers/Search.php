<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
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
        $url = URLAPI . "/v1/member/findme/get_countrylist";
        $country   = apitrackless($url)->message;

        $url      = URLAPI . "/v1/member/findme/get_category";
        $category = apitrackless($url)->message;

        $data['title']      = NAMETITLE . " - Search";
        $data["country"]    = $country;
        $data["category"]   = $category;
        $footer["extra"]    = "member/js/js_search";        

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-top', $data);
        $this->load->view('tamplate/navbar-bottom', $data);
        $this->load->view('member/search');
        $this->load->view('tamplate/footer', $footer);
    }

    public function getstate(){
        $country    = $_GET["country"];
        $url    = URLAPI . "/v1/member/findme/get_statelist?country=".$country;
        $state  = apitrackless($url)->message;
        echo json_encode($state);
    }

    public function getcity(){
        $country    = $_GET["country"];
        $state      = $_GET["state"];
        $url    = URLAPI . "/v1/member/findme/get_citylist?country=".$country."&state=".$state;
        $city   = apitrackless($url)->message;
        echo json_encode($city);
    }

    public function searchme(){
        $input = $this->input;
        $city = $this->security->xss_clean($input->post("city"));
        $kategori = $this->security->xss_clean($input->post("kategori"));
        $url    = URLAPI . "/v1/member/findme/getlocation?city=".$city."&category=".$kategori;
        $result = apitrackless($url)->message;
        $data["token"] = $this->security->get_csrf_hash();
        $data["history"]=$result;
        echo json_encode($data);
    }
}