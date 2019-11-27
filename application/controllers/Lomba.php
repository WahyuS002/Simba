<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lomba extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Lomba';

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/dashboard_header', $data);
        $this->load->view('templates/dashboard_sidebar', $data);
        $this->load->view('templates/dashboard_topbar', $data);
        $this->load->view('lomba/index', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function upload()
    {
        $data['title'] = 'Upload Lomba';

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $user = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Verifikasi_model', 'verifikasi');

        $verifikasi = $this->verifikasi->getVerifikasiById($user['id_user']);

        if ($user['is_uploader'] == '0') {
            // jika user sudah upload verifikasi
            if ($verifikasi) {
                $this->load->view('templates/dashboard_header', $data);
                $this->load->view('templates/dashboard_sidebar', $data);
                $this->load->view('templates/dashboard_topbar', $data);
                $this->load->view('lomba/is_waiting', $data);
                $this->load->view('templates/dashboard_footer');
            } else {
                $this->load->view('templates/dashboard_header', $data);
                $this->load->view('templates/dashboard_sidebar', $data);
                $this->load->view('templates/dashboard_topbar', $data);
                $this->load->view('lomba/kyc', $data);
                $this->load->view('templates/dashboard_footer');
            }
        } else {
            $data['kategori'] = $this->db->get('tb_kategori')->result_array();

            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('lomba/upload', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }

    public function verification()
    {
        $ktp = $_FILES['ktp']['name'];
        $data_diri = $_FILES['data_diri']['name'];

        $user = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        if ($ktp && $data_diri) {
            $config['upload_path'] = './assets/img/verifikasi/';
            $config['max_size']     = '8000';
            $config['allowed_types'] = 'jpg|png';

            $this->load->library('upload', $config);

            $this->upload->do_upload('ktp');
            $this->upload->do_upload('data_diri');

            $data = [
                'ktp' => $ktp,
                'data_diri' => $data_diri,
                'id_user' => $user['id_user']
            ];

            $this->db->insert('tb_verifikasi', $data);
            redirect('lomba/upload');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">
            Please insert required data!
            </div>');
            redirect('lomba/upload');
        }
    }

    public function upload_lomba()
    {
        $data['title'] = 'Upload Lomba';

        $data['kategori'] = $this->db->get('tb_kategori')->result_array();

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        $upload_image = $_FILES['gambar']['name'];

        if ($upload_image) {
            $config = [
                'upload_path' => './assets/img/lomba',
                'max_size' => '5000',
                'allowed_types' => 'jpg|png'
            ];

            $this->load->library('upload', $config);

            $this->upload->do_upload('gambar');

            $image = $this->upload->data('file_name');
        }

        $data = [
            'judul_lomba' => htmlspecialchars($this->input->post('judul', true)),
            'id_kategori' => htmlspecialchars($this->input->post('kategori', true)),
            'gambar' => $image,
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'hadiah' => htmlspecialchars($this->input->post('hadiah', true))
        ];

        $this->db->insert('tb_lomba', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Lomba berhasil di upload silahkan cek di menu lomba
          </div>');
        redirect('lomba/upload');
    }
}
