<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kategori_model");
        $this->load->library("form_validation");
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $data["kategori"] = $this->kategori_model->getAll();
            $this->load->view('templates/dashboard_header');
            $this->load->view('templates/dashboard_sidebar');
            $this->load->view('templates/dashboard_topbar');
            $this->load->view('admin/kategori/kategori', $data);
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
        $kategori = $this->kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/kategori/tambah_kategori");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/kategori');

        $kategori = $this->kategori_model;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->update($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kategori"] = $this->db->where('id', $id)->get('tb_kategori')->result();
        // if (!$data["kategori"]) show_404();

        $this->load->view("admin/kategori/update_kategori", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->kategori_model->delete($id)) {
            redirect(site_url('admin/kategori'));
        }
    }
}
