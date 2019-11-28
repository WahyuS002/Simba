<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Home';
        $this->load->model('Home_model', 'lomba');
        $this->load->model('Lomba_model', 'lomba_list');

        $data['kategori'] = $this->lomba->getKategori();

        // pagination();

        // $data['pagination'] = $this->pagination->create_links();
        $this->load->library('pagination');

        $config['base_url'] = site_url('home/index'); //site url
        $config['total_rows'] = $this->db->count_all('tb_lomba'); //total row
        $config['per_page'] = 4;  //show record per halaman
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

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function kategori_lomba($id)
    {
        $data['title'] = 'Home';
        $this->load->model('Home_model', 'lomba');

        $data['lomba'] = $this->lomba->getLomba();
        $data['kategori'] = $this->lomba->getKategori();
        $data['katLomba'] = $this->lomba->getLombaByKategori($id);

        $this->load->view('templates/header', $data);
        $this->load->view('home/kategori_lomba', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_lomba)
    {
        $data['title'] = 'Detail Lomba';
        $this->load->model('Detail_lomba_model', 'detail');
        $this->load->model('Home_model', 'lomba');

        $data['kategori'] = $this->lomba->getKategori();

        $id_lomba = $this->uri->segment(3);

        $data['kategori_lomba'] = $this->lomba->getKategoriId($id_lomba);

        $data['lomba'] = $this->lomba->getLombaById($id_lomba);

        $data['detail'] = $this->detail->getDetailById($id_lomba);

        $cek_id_lomba = $this->db->get_where('tb_lomba', ['id_lomba' => $id_lomba])->row_array();
        if ($cek_id_lomba == null) {
            redirect('home');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('detail/index', $data);
            $this->load->view('templates/footer');
        }
    }
}
