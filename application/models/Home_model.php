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

    public function getKategoriId($id_kategori)
    {
        $query = "SELECT `tb_lomba`.`id_kategori`,`tb_kategori`.`kategori`
                    FROM `tb_lomba` JOIN `tb_kategori`
                      ON `tb_lomba`.`id_kategori` = `tb_kategori`.`id_kategori`
                   WHERE `tb_lomba`.`id_lomba` = $id_kategori
        ";
        return $this->db->query($query)->row_array();
    }

    public function getLombaById($id_lomba)
    {
        return $this->db->get_where('tb_lomba', ['id_lomba' => $id_lomba])->row_array();
    }
}
