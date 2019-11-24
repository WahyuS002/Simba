<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Admin';
        //$data['user'] = $this->db->get('tb_user')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function verification()
    {
        $data['title'] = 'Admin';
        //$data['user'] = $this->db->get('tb_user')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('User_model', 'user');

        $data['AllUser'] = $this->user->getAllUser();

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('admin/verification', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function submenu_delete()
    {
        $id = $this->uri->segment(3);
        $this->load->model('User_model', 'user');
        $this->user->deleteUser($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            User has been deleted!
          </div>');
        redirect('admin/verification');
    }
}
