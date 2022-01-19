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
        $get_kategori = $this->Tbl_kategori_model->get_by_id($id_kategori);
        $get_talent = $this->Tbl_talent_model->get_kategori_talent($id_kategori);
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
            'get_kategori' => $get_kategori,
            'get_talent' => $get_talent,
            'row_image' => $row_image,
            'get_tags_label' => $get_tags_label,
            'logged' => $logged,
        );
        // print_r($this->session->userdata('logged'));
        // die;
        $this->template->load('home_page/tamplate', 'home_page/talent_list', $data);
    }

    function talent_list_endorse($id_talent)
    {
        $get_form_talent_endorse = $this->Tbl_talent_model->get_form_talent_endorse($id_talent);
        $get_tags_label = $this->Tbl_talent_model->get_tags_label();
        
        if($this->session->userdata('logged')){
            $logged = 1;
        } else {
            $logged = 0;
        }

        $data = array(
            'get_form_talent_endorse' => $get_form_talent_endorse,
            'get_tags_label' => $get_tags_label,
            'logged' => $logged,
        );

        $this->template->load('home_page/tamplate', 'home_page/talent_list_endorse', $data);
    }
}
