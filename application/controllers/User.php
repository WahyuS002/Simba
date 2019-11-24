<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('edit/index', $data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek file upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['max_size']     = '2048';
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    // cek image lama agar tidak terjadi duplikat image
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink('assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
                    ' . $error . '
                    </div>');
                    redirect('user/edit');
                }
            }

            $this->db->set('username', $name);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your Profile has been updated!
            </div>');
            redirect('user');
        }
    }
}
