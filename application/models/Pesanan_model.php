<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
    private $_table = "tb_invoice";

    public $id;
    public $nama;
    public $alamat;
    public $no_telp;
    public $payment;
    public $img_payment;
    public $tgl_pesan;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get($this->_table, ["id" => $id])->row();
    }

    public function detail_pesanan($id)
    {
        $result = $this->db->where('id', $id)->get('tb_invoice');

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            echo "Pesanan tidak ditemukan!";
        }
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array(['id' => $id]));
    }
}
