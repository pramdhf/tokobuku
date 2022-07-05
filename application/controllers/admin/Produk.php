<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("produk_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $data["produk"] = $this->produk_model->getAll();
            $this->load->view('templates/dashboard_header');
            $this->load->view('templates/dashboard_sidebar');
            $this->load->view('templates/dashboard_topbar');
            $this->load->view('admin/produk/produk', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Harap Login Terlebih Dahulu!");';
            echo 'window.location.href ="' . base_url() .  '/auth";';
            echo '</script>';
        }
    }

    public function add()
    {
        $produk = $this->produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());

        if ($validation->run()) {
            $produk->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/produk/tambah_produk");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/produk');

        $produk = $this->produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());

        if ($validation->run()) {
            $produk->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["produk"] = $this->db->where('id_produk', $id)->get('tb_produk')->result();
        if (!$data["produk"]) show_404();

        $this->load->view("admin/produk/update_produk", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->produk_model->delete($id)) {
            redirect(site_url('admin/produk'));
        }
    }
}
