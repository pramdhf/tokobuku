<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("pesanan_model");
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $data["pesanan"] = $this->pesanan_model->getAll();
            $this->load->view('templates/dashboard_header');
            $this->load->view('templates/dashboard_sidebar');
            $this->load->view('templates/dashboard_topbar');
            $this->load->view('admin/pesanan/pesanan', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Harap Login Terlebih Dahulu!");';
            echo 'window.location.href ="' . base_url() .  '/auth";';
            echo '</script>';
        }
    }

    public function detail($id)
    {
        $data["pesanan"] = $this->pesanan_model->detail_pesanan($id);
        $this->load->view('admin/pesanan/detail_pesanan', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->pesanan_model->delete($id)) {
            redirect(site_url('admin/pesanan'));
        }
    }
}
