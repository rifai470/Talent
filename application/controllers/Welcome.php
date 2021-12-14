<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Welcome_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->template->load('template', 'welcome');
    }

    public function form()
    {
        $this->template->load('template', 'form');
    }

    function autocomplate()
    {
        autocomplate_json('tbl_user', 'full_name');
    }

    function __autocomplate()
    {
        $this->db->like('nama_lengkap', $_GET['term']);
        $this->db->select('nama_lengkap');
        $products = $this->db->get('pegawai')->result();
        foreach ($products as $product) {
            $return_arr[] = $product->nama_lengkap;
        }

        echo json_encode($return_arr);
    }
}
