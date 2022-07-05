<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['tittle'] = "Shop | Dunia Ilmu";
		$data['produk'] = $this->db->get('tb_produk')->result_array();
		$data['isi'] = $this->load->view('shop', $data, true);
		$this->load->view('main_view', $data);
	}

	public function detail() {
		$data["id"] = $this->input->get('id', true);
        $idProduk = $this->input->get('id', true);

        if (isset($data["id"])) {
            $this->db->where('id_produk', $data['id']);
            $cek = $this->db->get('tb_produk');

            if ($cek->num_rows() == 0) {
                redirect(base_url());
            } else {
		$data['tittle'] = "Detail | Dunia Ilmu";
		$data['product'] = $this->db->where('id_produk', $idProduk)->get('tb_produk')->row_array();
		$data['isi'] = $this->load->view('detail', $data, true);
		$this->load->view('main_view', $data);
		
	}
} else {
	redirect(base_url());
}
	}
}
