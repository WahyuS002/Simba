<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi_model extends CI_Model
{
    public function getVerifikasiById($id_user)
    {
        return $this->db->get_where('tb_verifikasi', ['id_user' => $id_user])->row_array();
    }
}
