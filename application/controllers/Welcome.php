<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Welcome_model');
        $this->load->model('Tbl_talent_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->template->load('template', 'welcome');
    }

    public function read($id)
	{
		$row = $this->Tbl_talent_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_talent' => $row->id_talent,
				'nama' => $row->nama,
				'nama_panggilan' => $row->nama_panggilan,
				'tempat' => $row->tempat,
				'tanggal_lahir' => $row->tanggal_lahir,
				'usia' => $row->usia,
				'jenis_kelamin' => $row->jenis_kelamin,
				'hobby' => $row->hobby,
				'pendidikan' => $row->pendidikan,
				'pekerjaan' => $row->pekerjaan,
				'bahasa' => $row->bahasa,
				'tinggi_badan' => $row->tinggi_badan,
				'berat_badan' => $row->berat_badan,
				'id_kategori' => $row->id_kategori,
				'tentang' => $row->tentang,
				'id_tarif' => $row->id_tarif,
				'SecLogUser' => $row->SecLogUser,
				'SecLogDate' => $row->SecLogDate,
			);
			$this->template->load('template', 'tbl_talent/tbl_talent_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('tbl_talent'));
		}
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
