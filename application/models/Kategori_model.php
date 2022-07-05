<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    private $_table = "tb_kategori"; // Nama tabel

    public $id;
    public $categoryName;

    public function rules()
    {
        return [
            [
                'field' => 'categoryName',
                'label' => 'Nama_Kategori',
                'rules' => 'trim|required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->categoryName = $post["categoryName"];
        return $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->id = $id;
        $this->categoryName = $post["categoryName"];
        return $this->db->update($this->_table, $this, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
