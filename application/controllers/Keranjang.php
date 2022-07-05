<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

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
		$data['tittle'] = "Keranjang | Dunia Ilmu";
		$data['isi'] = $this->load->view('keranjang', $data, true);
        $data['total'] = $this->cart->total_items();
		$this->load->view('main_view', $data);
	}

    public function tambah($id)

	{
		$barang = $this->db->where('id_produk', $id)->get('tb_produk')->row();

		$data = array(
	        'id'      => $barang->id_produk,
	        'qty'     => 1,
	        'price'   => $barang->price,
	        'name'    => $barang->productName,
            'img'     => $barang->img
	);

    $this->cart->insert($data);
	redirect(base_url('shop'));
}

public function remove($rowid)
    {
        $removed_cart = array(
            'rowid'         => $rowid,
            'qty'           => 0
        );
         $this->cart->update($removed_cart);
         redirect(base_url('keranjang'));
    }
}