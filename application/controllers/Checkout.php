<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

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
		$data['tittle'] = "Checkout | Dunia Ilmu";
		$data['total'] = $this->cart->total_items();
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();
		$data['isi'] = $this->load->view('checkout', $data, true);
		$this->load->view('main_view', $data);
	}

    public function order()
	{
        date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama',true);
        $alamat = $this->input->post('alamat', true);
        $no_telp = $this->input->post('no_telp', true);
        $payment = $this->input->post('payment', true);
        $gambar = $_FILES['img'];

        if ($gambar['name'] != NULL) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('img')) {
                $err = $this->upload->display_errors();
                echo $err;
                die();
            } else {
                $gambar = $this->upload->data('file_name');
            }

        $invoice = array (
			'nama'			=> $nama,
			'alamat'		=> $alamat,
            'no_telp'       => $no_telp,
            'payment'       => $payment,
            'img_payment'   => $gambar,
			'tgl_pesan'		=> date('Y-m-d H:i:s'),
		);
		$this->db->insert('tb_invoice', $invoice);
		$id_invoice = $this->db->insert_id();
        
        foreach ($this->cart->contents() as $item){
			$data = array (
				'id_invoice'		=> $id_invoice,
				'id_produk'			=> $item['id'],
				'productName'		=> $item['name'],
				'jumlah'			=> $item['qty'],
				'harga'				=> $item['price']
			);
			$this->db->insert('tb_order', $data);
		}
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success alert-with-icon animated fadeInDown" role="alert" data-notify-position="top-center" style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; left: 0px; right: 0px;">
        <button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
        </button>
        <span data-notify="title"></span>
        <span data-notify="message">Berhasil melakukan pemesanan!</span>
    </div>');
    redirect(base_url());
	}
}

}
