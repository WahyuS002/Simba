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

        $user = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $user['id_user'];

        $this->load->model('Home_model', 'lomba_home');
        $this->load->model('Lomba_model', 'lomba');

        $data['lomba_user'] = $this->lomba->getLombaByUserId($id_user);

        $data['lomba'] = $this->lomba_home->getLomba();

        $this->load->library('pagination');

        $config['base_url'] = site_url('lomba/index'); //site url
        $config['total_rows'] = $this->db->count_all('tb_lomba'); //total row
        $config['per_page'] = 3;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $this->load->model('Lomba_model', 'lomba_list');

        $data['lomba'] = $this->lomba_list->get_lomba_list($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

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
        $user = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => 'Judul harus diisi'
        ]);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => 'Kategori harus diisi'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi harus diisi'
        ]);
        $this->form_validation->set_rules('hadiah', 'Hadiah', 'required', [
            'required' => 'Isi nominal hadiah'
        ]);
        $this->form_validation->set_rules('url', 'Url', 'required', [
            'required' => 'Isi link pendaftaran'
        ]);

        if ($this->form_validation->run()) {
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
                'hadiah' => htmlspecialchars($this->input->post('hadiah', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'id_user' => $user['id_user']
            ];

            $this->db->insert('tb_lomba', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Lomba berhasil di upload silahkan cek di menu lomba
              </div>');
            redirect('lomba/upload');
        } else {
            $data['kategori'] = $this->db->get('tb_kategori')->result_array();

            $this->load->view('templates/dashboard_header', $data);
            $this->load->view('templates/dashboard_sidebar', $data);
            $this->load->view('templates/dashboard_topbar', $data);
            $this->load->view('lomba/upload', $data);
            $this->load->view('templates/dashboard_footer');
        }
    }

    public function edit_lomba($id_lomba)
    {
        $data['title'] = 'Edit Lomba';

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();

        $cek_id_lomba = $this->db->get_where('tb_lomba', ['id_lomba' => $id_lomba])->row_array();

        if ($cek_id_lomba == null) {
            redirect('lomba');
        } else {
            $this->load->model('Lomba_model', 'lomba');

            $data['lomba_user'] = $this->lomba->getLombaById($id_lomba);

            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
            $this->form_validation->set_rules('hadiah', 'Hadiah', 'required|trim');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/dashboard_header', $data);
                $this->load->view('templates/dashboard_sidebar', $data);
                $this->load->view('templates/dashboard_topbar', $data);
                $this->load->view('lomba/edit', $data);
                $this->load->view('templates/dashboard_footer');
            } else {
                $judul = $this->input->post('judul');
                $kategori = $this->input->post('kategori');
                $deskripsi = $this->input->post('deskripsi');
                $hadiah = $this->input->post('hadiah');

                $id_lomba = $this->uri->segment(3);
                // cek file upload
                $upload_image = $_FILES['gambar']['name'];

                if ($upload_image) {
                    $config['upload_path'] = './assets/img/profile/';
                    $config['max_size']     = '2048';
                    $config['allowed_types'] = 'gif|jpg|png';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {

                        // cek image lama agar tidak terjadi duplikat image
                        $old_image = $data['user']['gambar'];
                        if ($old_image != 'default.jpg') {
                            unlink('assets/img/profile/' . $old_image);
                        }

                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
                        ' . $error . '
                        </div>');
                        redirect('lomba');
                    }
                }

                $this->db->set('hadiah', $hadiah);
                $this->db->set('deskripsi', $deskripsi);
                $this->db->set('id_kategori', $kategori);
                $this->db->set('judul_lomba', $judul);
                $this->db->where('id_lomba', $id_lomba);
                $this->db->update('tb_lomba');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Your Profile has been updated!
                </div>');
                redirect('lomba');
            }
        }
    }

    public function delete_lomba($id_lomba)
    {
        $this->load->model('Lomba_model', 'lomba');
        $this->lomba->deleteLomba($id_lomba);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Lomba berhasil dihapus
          </div>');
        redirect('lomba');
    }
}
