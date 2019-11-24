<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getAllUser()
    {
        $query = "SELECT * FROM tb_user";
        return $this->db->query($query)->result_array();
    }

    public function deleteUser($id)
    {
        return $this->db->delete('tb_user', ['id_user' => $id]);
    }
}
