<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soon extends CI_Controller
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
        $data['title'] = NAMETITLE . " - Search";

        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/navbar-bottom-homepage', $data);
        $this->load->view('member/soon');
        $this->load->view('tamplate/footer');
    }
}