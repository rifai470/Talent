<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_kategori_model');
        $this->load->model('Tbl_talent_model');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    function index()
    {
        $get_kategori = $this->Tbl_kategori_model->get_all();
        $data = array(
            'get_kategori' => $get_kategori,
        );
        $this->template->load('home_page/tamplate', 'home_page/home_page', $data);
    }

    function talent_list($id_kategori)
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('home_page/talent_list/').$id_kategori;
        $config['total_rows'] = count($this->Tbl_talent_model->get_kategori_talent_count($id_kategori));
        $config['per_page'] = 8;
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //style
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
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $get_talent = $this->Tbl_talent_model->get_kategori_talent($id_kategori, $config["per_page"], $data['page']);
        $get_kategori = $this->Tbl_kategori_model->get_by_id($id_kategori);
        $get_tags_label = $this->Tbl_talent_model->get_tags_label();

        if (!empty($get_talent)) {
            $index = 0;
            foreach ($get_talent as $talent) {
                $code_talent[$index] = $talent->code_talent;
                $index++;
            }
        } else {
            $code_talent = "";
        }
        $row_image = $this->Tbl_talent_model->image($code_talent);
        if($this->session->userdata('logged')){
            $logged = 1;
        } else {
            $logged = 0;
        }
        $data = array(
            'kategori' => $get_kategori->kategori,
            'get_talent' => $get_talent,
            'row_image' => $row_image,
            'get_tags_label' => $get_tags_label,
            'logged' => $logged,
            'pagination' => $this->pagination->create_links(),
            'search' => '',
        );
        // print_r($this->session->userdata('logged'));
        // die;
        $this->template->load('home_page/tamplate', 'home_page/talent_list', $data);
    }

    function search()
    {
        $search = $this->input->post('search', TRUE);
        //konfigurasi pagination
        $config['base_url'] = base_url('home_page/search/');
        $config['total_rows'] = count($this->Tbl_talent_model->get_search_talent_count($search));
        $config['per_page'] = 8;
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //style
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
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $get_talent = $this->Tbl_talent_model->get_search_talent($search, $config["per_page"], $data['page']);
        $get_tags_label = $this->Tbl_talent_model->get_tags_label();

        if (!empty($get_talent)) {
            $index = 0;
            foreach ($get_talent as $talent) {
                $code_talent[$index] = $talent->code_talent;
                $index++;
            }
        } else {
            $code_talent = "";
        }
        $row_image = $this->Tbl_talent_model->image($code_talent);
        if($this->session->userdata('logged')){
            $logged = 1;
        } else {
            $logged = 0;
        }
        $data = array(
            'kategori' => '',
            'search' => $search,
            'get_talent' => $get_talent,
            'row_image' => $row_image,
            'get_tags_label' => $get_tags_label,
            'logged' => $logged,
            'pagination' => $this->pagination->create_links(),
        );

        $this->template->load('home_page/tamplate', 'home_page/talent_list', $data);
    }

    function talent_list_endorse($id_talent)
    {
        $get_talent = $this->Tbl_talent_model->get_talent($id_talent);
        $get_tags_label = $this->Tbl_talent_model->get_tags_label();
        
        if($this->session->userdata('logged')){
            $logged = 1;
        } else {
            $logged = 0;
        }

        $data = array(
            'get_tags_label' => $get_tags_label,
            'code_talent' => $get_talent->code_talent,
            'photo' => $get_talent->photo,
            'nama' => $get_talent->nama,
            'tempat' => $get_talent->tempat,
            'pekerjaan' => $get_talent->pekerjaan,
            'id_talent' => $id_talent,
            'tentang' => $get_talent->tentang,
            'instagram' => $get_talent->instagram,
            'facebook' => $get_talent->facebook,
            'twitter' => $get_talent->twitter,
            'other' => $get_talent->other,
            'logged' => $logged,
        );

        $this->template->load('home_page/tamplate', 'home_page/talent_list_endorse', $data);
    }

    
}
