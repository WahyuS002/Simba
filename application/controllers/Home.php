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

        $data['lomba'] = $this->lomba->getLomba();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_lomba)
    {
        $data['title'] = 'Detail Lomba';
        $this->load->model('Detail_lomba_model', 'detail');

        $id_lomba = $this->uri->segment(3);
        $data['detail'] = $this->detail->getDetailById($id_lomba);

        $this->load->view('templates/header', $data);
        $this->load->view('detail/index', $data);
        $this->load->view('templates/footer');
    }
}
