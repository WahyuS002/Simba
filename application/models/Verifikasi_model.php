<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi_model extends CI_Model
{
    public function getVerifikasiById($id_user)
    {
        return $this->db->get_where('tb_verifikasi', ['id_user' => $id_user])->row_array();
    }

    public function getUserByVerifikasiId()
    {
        $query = "SELECT `tb_user`.*,`tb_verifikasi`.`id_verifikasi`
                    FROM `tb_user` JOIN `tb_verifikasi`
                      ON `tb_user`.`id_user` = `tb_verifikasi`.`id_user` 
        ";
        return $this->db->query($query)->result_array();
    }
}
