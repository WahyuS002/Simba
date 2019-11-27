<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getLomba()
    {
        return $this->db->get('tb_lomba')->result_array();
    }

    public function getKategori()
    {
        return $this->db->get('tb_kategori')->result_array();
    }

    public function getLombaByKategori($id)
    {
        return $this->db->get_where('tb_lomba', ['id_kategori' => $id])->result_array();
    }
}
