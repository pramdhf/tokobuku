<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    private $_table = "tb_produk"; // Nama tabel

    public $id_produk;
    public $productName;
    public $img = "default.jpg";
    public $stock;
    public $categoryId;
    public $price;

    public function rules()
    {
        return [
            [
                'field' => 'productName',
                'label' => 'Nama_Produk',
                'rules' => 'required'
            ],

            [
                'field' => 'stock',
                'label' => 'Stok',
                'rules' => 'required'
            ],

            [
                'field' => 'price',
                'label' => 'Harga',
                'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get($this->_table, ["id_produk" => $id])->row();
    }

    public function save()
    {
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
                die();
            } else {
                $gambar = $this->upload->data('file_name');
            }
            $post = $this->input->post();
            $this->productName = $post["productName"];
            $this->img = $gambar;
            $this->stock = $post["stock"];
            $this->categoryId = $post["categoryId"];
            $this->price = $post["price"];
            return $this->db->insert($this->_table, $this);
        }
    }

    public function update($id)
    {
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
                die();
            } else {
                $gambar = $this->upload->data('file_name');
            }
            $post = $this->input->post();
            $this->id_produk = uniqid();
            $this->productName = $post["productName"];
            $this->img = $gambar;
            $this->stock = $post["stock"];
            $this->categoryId = $post["categoryId"];
            $this->price = $post["price"];
            return $this->db->update($this->_table, $this, array('id_produk' => $id));
        }
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }
}
