<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Tbl_talent_verify extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Tbl_talent_model');
		$this->load->model('Tbl_prestasi_model');
		$this->load->model('Tbl_sosmed_model');
		$this->load->model('Tbl_photo_model');
		$this->load->model('Tbl_tarif_model');
		$this->load->model('Tbl_kategori_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->template->load('template', 'tbl_talent/tbl_talent_list_verify');
	}

	public function json()
	{
		header('Content-Type: application/json');
		echo $this->Tbl_talent_model->json_verify();
	}

	public function json_rejected()
	{
		header('Content-Type: application/json');
		echo $this->Tbl_talent_model->json_rejected();
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
				'status' => $row->status,
				'SecLogUser' => $row->SecLogUser,
				'SecLogDate' => $row->SecLogDate,
			);
			$this->template->load('template', 'tbl_talent/tbl_talent_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('tbl_talent'));
		}
	}

	public function approve($id)
	{	
		$row = $this->Tbl_talent_model->get_email($id);
		$this->send_notif_talent($row, $id);

		$data = array(
			'status' => 'active',			
		);
		$this->Tbl_talent_model->update($id, $data);

		$this->session->set_flashdata('message', 'Update Record Success');
		redirect(site_url('tbl_talent_verify'));
	}

	public function send_notif_talent($row, $id)
	{
		//Load Data
		$mail = $row->username;

		$message = "
        <html>
        <head>
            <title>Account Talent On Air Now!</title>
        </head>
        <body>
            <h2>Thank you for Registering Mustika Ratu Talent Account.</h2>
            <p>Please click the link below to see your account.</p>
            <h4><a href='" . base_url(). "'>See My Account</a></h4>
        </body>
        </html>
        ";

		//Send Email
		$config['protocol'] = 'smtp';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'mustikaratu.mailer@gmail.com';
		$config['smtp_pass'] = 'MustikaGoogle@MR2022';
		$config['mailtype'] = 'html';

		$this->load->library('email', $config);

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from('mustikaratu.mailer@gmail.com', 'Mustika Ratu Talent');
		// $this->email->to($data['username']);
		$this->email->to($mail);
		$this->email->subject('Mustika Ratu Talent account is already active now');
		$this->email->message($message);

		if ($this->email->send()) {
			$this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
		} else {
			$this->session->set_flashdata("email_sent", "Error in sending Email.");
			// show_error($this->email->print_debugger());
		}
	}
	

	public function reject($id)
	{
		$data = array(
			'status' => 'rejected',
		);
		// print_r($data);
		// die;

		$this->Tbl_talent_model->update($id, $data);
		
		$this->session->set_flashdata('message', 'Update Record Success');
		redirect(site_url('tbl_talent_verify'));
	}

	public function follow_up($id)
	{
		$data = array(
			'status' => 'inactive',
		);
		// print_r($data);
		// die;

		$this->Tbl_talent_model->update($id, $data);

		$this->session->set_flashdata('message', 'Update Record Success');
		redirect(site_url('tbl_talent_verify'));
	}

	
}

/* End of file Tbl_talent.php */