<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    function index()
    {
        $this->load->view('auth/page');
    }
}