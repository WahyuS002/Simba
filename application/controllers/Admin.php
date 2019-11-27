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

        $this->load->model('Verifikasi_model', 'verifikasi');

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $id_user = $this->uri->segment(3);

        if ($id_user) {
            // cek valid id_user
            $id_user_valid['user'] = $this->db->get_where('tb_verifikasi', ['id_user' => $id_user])->row_array();

            if ($id_user_valid) {
                $this->load->view('templates/dashboard_header', $data);
                $this->load->view('templates/dashboard_sidebar', $data);
                $this->load->view('templates/dashboard_topbar', $data);
                $this->load->view('admin/user_verification', $id_user_valid);
                $this->load->view('templates/dashboard_footer');
            } else {
                redirect('admin/verification');
            }
        } else {
            $this->load->model('User_model', 'user');

            $data['AllUser'] = $this->verifikasi->getUserByVerifikasiId();

            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('admin/verification', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->load->model('User_model', 'user');
        $this->user->deleteUser($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            User has been deleted!
          </div>');
        redirect('admin/verification');
    }

    public function user_verification($id_user)
    {
        $this->db->set('is_uploader', '1');
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user');
        redirect('admin/verification');
    }
}
