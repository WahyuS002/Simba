<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('tb_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['menu_id'];

        $accessMenu = $ci->db->get_where('tb_user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($accessMenu->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function pagination()
{
    $ci = get_instance();

    $ci->load->library('pagination');

    $config['base_url'] = site_url('home/index'); //site url
    $config['total_rows'] = $ci->db->count_all('tb_lomba'); //total row
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

    $ci->pagination->initialize($config);
    $data['page'] = ($ci->uri->segment(3)) ? $ci->uri->segment(3) : 0;

    //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
    $ci->load->model('Lomba_model', 'lomba_list');

    $data['data'] = $ci->lomba_list->get_lomba_list($config["per_page"], $data['page']);
}
