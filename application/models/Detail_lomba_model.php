<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_lomba_model extends CI_Model
{
    public function getDetailById($id_lomba)
    {
        return $this->db->get_where('tb_lomba', ['id_lomba' => $id_lomba])->row_array();
    }
}
