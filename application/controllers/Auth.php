<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('home/index.php');
        $this->load->view('templates/footer');
    }
}
