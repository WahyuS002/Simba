<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Admin';

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/dashboard_footer');
    }
}
