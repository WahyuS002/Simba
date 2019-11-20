<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getLomba()
    {
        $query = "SELECT * FROM tb_lomba";
        return $this->db->query($query)->result_array();
    }
}
