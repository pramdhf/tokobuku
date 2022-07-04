<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/dashboard_sidebar');
        $this->load->view('templates/dashboard_topbar');
        $this->load->view('admin/pesanan');
        $this->load->view('templates/dashboard_footer');
    }
}
