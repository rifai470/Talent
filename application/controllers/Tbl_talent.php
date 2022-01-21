<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Tbl_talent extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Tbl_talent_model');
		$this->load->model('Tbl_prestasi_model');
		$this->load->model('Tbl_sosmed_model');
		$this->load->model('Tbl_photo_model');
		$this->load->model('Tbl_kategori_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->template->load('template', 'tbl_talent/tbl_talent_list');
	}

	public function json()
	{
		header('Content-Type: application/json');
		echo $this->Tbl_talent_model->json();
	}

	public function read($id)
	{
		$row = $this->Tbl_talent_model->get_by_id($id);
		$row_tags_by_id = $this->Tbl_talent_model->get_tags_talent($id);
		$row_photo = $this->Tbl_talent_model->image($row->code_talent);
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
				'tarif_minimum' => number_format($row->tarif_minimum),
				'tarif_maximum' => number_format($row->tarif_maximum),
				'SecLogUser' => $row->SecLogUser,
				'SecLogDate' => $row->SecLogDate,
				'prestasi' => $row->prestasi,
				'instagram' => $row->instagram,
				'facebook' => $row->facebook,
				'twitter' => $row->twitter,
				'other' => $row->other,
				'row_tags_by_id' => $row_tags_by_id,
				'row_photo' => $row_photo,
			);
			$this->template->load('template', 'tbl_talent/tbl_talent_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('tbl_talent'));
		}
	}

	public function create()
	{
		$row_kategori = $this->Tbl_kategori_model->get_all();
		$row_tags = $this->Tbl_talent_model->get_tags();
		$data = array(
			'button' => 'Save',
			'action' => site_url('tbl_talent/create_action'),
			'id_talent' => set_value('id_talent'),
			'nama' => set_value('nama'),
			'nama_panggilan' => set_value('nama_panggilan'),
			'tempat' => set_value('tempat'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
			'usia' => set_value('usia'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'hobby' => set_value('hobby'),
			'pendidikan' => set_value('pendidikan'),
			'pekerjaan' => set_value('pekerjaan'),
			'bahasa' => set_value('bahasa'),
			'tinggi_badan' => set_value('tinggi_badan'),
			'berat_badan' => set_value('berat_badan'),
			'id_kategori' => set_value('id_kategori'),
			'tentang' => set_value('tentang'),
			'tarif_minimum' => set_value('tarif_minimum'),
			'tarif_maximum' => set_value('tarif_maximum'),
			'prestasi' => set_value('prestasi'),
			'instagram' => set_value('instagram'),
			'facebook' => set_value('facebook'),
			'twitter' => set_value('twitter'),
			'other' => set_value('other'),
			'tags' => set_value('tags'),
			'photo' => set_value('photo'),
			'row_kategori' => $row_kategori,
			'code_talent' => set_value('code_talent'),
			'row_tags' => $row_tags,
			'row_tags_by_id' => array(),
		);
		$this->template->load('template', 'tbl_talent/tbl_talent_form', $data);
	}

	public function create_action()
	{

		$cek_code = $this->Tbl_talent_model->cek_code();
		$code_talent = "TLN-" . $cek_code;
		$tags = $this->input->post('tags', TRUE);

		$data = array(
			'code_talent' => $code_talent,
			'nama' => $this->input->post('nama', TRUE),
			'nama_panggilan' => $this->input->post('nama_panggilan', TRUE),
			'tempat' => $this->input->post('tempat', TRUE),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
			'usia' => $this->input->post('usia', TRUE),
			'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
			'hobby' => $this->input->post('hobby', TRUE),
			'pendidikan' => $this->input->post('pendidikan', TRUE),
			'pekerjaan' => $this->input->post('pekerjaan', TRUE),
			'bahasa' => $this->input->post('bahasa', TRUE),
			'tinggi_badan' => $this->input->post('tinggi_badan', TRUE),
			'berat_badan' => $this->input->post('berat_badan', TRUE),
			'id_kategori' => $this->input->post('id_kategori', TRUE),
			'tentang' => $this->input->post('tentang', TRUE),
			'tarif_minimum' => $this->input->post('tarif_minimum', TRUE),
			'tarif_maximum' => $this->input->post('tarif_maximum', TRUE),
			'status' => 'inactive',
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);

		$id_talent = $this->Tbl_talent_model->insert($data);

		//buat array sosmed
		$data_sosmed = array(
			'instagram' => $this->input->post('instagram', TRUE),
			'facebook' => $this->input->post('facebook', TRUE),
			'twitter' => $this->input->post('twitter', TRUE),
			'other' => $this->input->post('other', TRUE),
			'code_talent' => $code_talent,
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);

		$this->Tbl_talent_model->insert_sosmed($data_sosmed);

		//array prestasi 
		$data_prestasi = array(
			'prestasi' => $this->input->post('prestasi', TRUE),
			'code_talent' => $code_talent,
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);
		$this->Tbl_talent_model->insert_prestasi($data_prestasi);

		//Tags
		$tagss = json_decode($tags);
		for ($i = 0; $i < count($tagss); $i++) {
			$tagsPost[$i] = $tagss[$i]->value;
		}

		$row_tags = $this->Tbl_talent_model->get_tags_array();
		if (empty($row_tags)) {
			$row_tags = array();
		}
		$arrayTags = array_diff($tagsPost, $row_tags);
		$arrayTags = array_values($arrayTags);

		if (!empty($arrayTags)) {
			for ($x = 0; $x < count($arrayTags); $x++) {
				$data_tags[$x] = array(
					'tags' => $arrayTags[$x],
					'SecLogUser' => $this->session->userdata('nama_lengkap'),
					'SecLogDate' => date('Y-m-d H:i:s'),
				);
			}
			$this->Tbl_talent_model->insert_tags($data_tags);
		}

		//Tags Label
		$get_tags = $this->Tbl_talent_model->get_id_tags($tagsPost);
		$index = 1;
		$tagsArray = array();
		foreach ($get_tags as $data_tags) {
			//buat array tags
			$data_tags_label['id_tags'] = $data_tags->id_tags;
			$data_tags_label['rel_id'] = $id_talent;
			$data_tags_label['rel_type'] = 'talent';
			$data_tags_label['tag_order'] = $index;
			$index++;
			array_push($tagsArray, $data_tags_label);
		}

		$this->Tbl_talent_model->insert_tags_label($tagsArray);


		//array photo
		// If files are selected to upload 
		if (!empty($_FILES['upload']['name']) && count(array_filter($_FILES['upload']['name'])) > 0) {
			$filesCount = count($_FILES['upload']['name']);
			for ($i = 0; $i < $filesCount; $i++) {
				$_FILES['file']['name']     = $_FILES['upload']['name'][$i];
				$_FILES['file']['type']     = $_FILES['upload']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
				$_FILES['file']['error']     = $_FILES['upload']['error'][$i];
				$_FILES['file']['size']     = $_FILES['upload']['size'][$i];

				// File upload configuration 
				$uploadPath = './uploads/photo/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';

				// Load and initialize upload library 
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// Upload file to server 
				if ($this->upload->do_upload('file')) {
					// Uploaded file data 
					$fileData = $this->upload->data();
					$uploadData[$i]['photo'] = $fileData['file_name'];
					$uploadData[$i]['code_talent'] = $code_talent;
					$uploadData[$i]['SecLogUser'] = $this->session->userdata('nama_lengkap');
					$uploadData[$i]['SecLogDate'] = date("Y-m-d H:i:s");
				}
			}

			if (!empty($uploadData)) {
				// Insert files data into the database 
				$this->Tbl_talent_model->insert_photo($uploadData);
			}
		}

		$this->session->set_flashdata('message', 'Create Record Success');
		redirect(site_url('tbl_talent'));
		// }
	}

	public function update($id)
	{
		$row = $this->Tbl_talent_model->get_by_id($id);
		$row_kategori = $this->Tbl_kategori_model->get_all();
		$row_tags = $this->Tbl_talent_model->get_tags();
		$row_tags_by_id = $this->Tbl_talent_model->get_tags_talent($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('tbl_talent/update_action'),
				'id_talent' => set_value('id_talent', $row->id_talent),
				'nama' => set_value('nama', $row->nama),
				'nama_panggilan' => set_value('nama_panggilan', $row->nama_panggilan),
				'tempat' => set_value('tempat', $row->tempat),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				'usia' => set_value('usia', $row->usia),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'hobby' => set_value('hobby', $row->hobby),
				'pendidikan' => set_value('pendidikan', $row->pendidikan),
				'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
				'bahasa' => set_value('bahasa', $row->bahasa),
				'tinggi_badan' => set_value('tinggi_badan', $row->tinggi_badan),
				'berat_badan' => set_value('berat_badan', $row->berat_badan),
				'id_kategori' => set_value('id_kategori', $row->id_kategori),
				'tentang' => set_value('tentang', $row->tentang),
				'tarif_minimum' => set_value('tarif_minimum', number_format($row->tarif_minimum)),
				'tarif_maximum' => set_value('tarif_maximum', number_format($row->tarif_maximum)),
				'prestasi' => set_value('prestasi', $row->prestasi),
				'instagram' => set_value('instagram', $row->instagram),
				'facebook' => set_value('facebook', $row->facebook),
				'twitter' => set_value('twitter', $row->twitter),
				'other' => set_value('other', $row->other),
				'photo' => set_value('photo', $row->photo),
				'row_kategori' => $row_kategori,
				'row_tags' => $row_tags,
				'row_tags_by_id' => $row_tags_by_id,
				'code_talent' => set_value('code_talent', $row->code_talent),
			);
			$this->template->load('template', 'tbl_talent/tbl_talent_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('tbl_talent'));
		}
	}

	public function update_action()
	{
		$code_talent = $this->input->post('code_talent', TRUE);
		$row = $this->Tbl_talent_model->get_by_id($this->input->post('id_talent', TRUE));

		$data = array(
			'nama' => $this->input->post('nama', TRUE),
			'nama_panggilan' => $this->input->post('nama_panggilan', TRUE),
			'tempat' => $this->input->post('tempat', TRUE),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
			'usia' => $this->input->post('usia', TRUE),
			'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
			'hobby' => $this->input->post('hobby', TRUE),
			'pendidikan' => $this->input->post('pendidikan', TRUE),
			'pekerjaan' => $this->input->post('pekerjaan', TRUE),
			'bahasa' => $this->input->post('bahasa', TRUE),
			'tinggi_badan' => $this->input->post('tinggi_badan', TRUE),
			'berat_badan' => $this->input->post('berat_badan', TRUE),
			'id_kategori' => $this->input->post('id_kategori', TRUE),
			'tentang' => $this->input->post('tentang', TRUE),
			'tarif_minimum' => str_replace(",", "", $this->input->post('tarif_minimum', TRUE)),
			'tarif_maximum' => str_replace(",", "", $this->input->post('tarif_maximum', TRUE)),
			'SecLogUser' => $this->session->userdata('full_name'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);

		$this->Tbl_talent_model->update($this->input->post('id_talent', TRUE), $data);

		//update prestasi
		$data_update_prestasi = array(
			'prestasi' => $this->input->post('prestasi', TRUE),
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);
		$this->Tbl_talent_model->update_prestasi($code_talent, $data_update_prestasi);

		//update sosmed
		$data_update_sosmed = array(
			'instagram' => $this->input->post('instagram', TRUE),
			'facebook' => $this->input->post('facebook', TRUE),
			'twitter' => $this->input->post('twitter', TRUE),
			'other' => $this->input->post('other', TRUE),
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);
		$this->Tbl_talent_model->update_sosmed($code_talent, $data_update_sosmed);

		//update tags
		$data_update_tags = array(
			'tags' => $this->input->post('tags', TRUE),
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);
		$this->Tbl_talent_model->update_tags($code_talent, $data_update_tags);

		//update photo
		if ($_FILES['upload']['name'] == '') {
			$this->session->set_flashdata('massage', 'file harus diisi');
		} else {
			$config['upload_path'] = './uploads/photo/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			// $config['max_size'] = '1024';
			// $config['max_width'] = '1920';
			// $config['max_height'] = '1280';
			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			$upload = 'upload';
			if (!$this->upload->do_upload($upload)) {
				$data_file = array('file_name' => $row->photo);
			} else {
				$data_file = $this->upload->data();
			}
			$data_update_photo = array(
				'photo' => $data_file['file_name'],
				'SecLogUser' => $this->session->userdata('nama_lengkap'),
				'SecLogDate' => date('Y-m-d H:i:s'),
			);
			$this->Tbl_talent_model->update_photo($code_talent, $data_update_photo);
		}


		$this->session->set_flashdata('message', 'Update Record Success');
		redirect(site_url('tbl_talent'));
	}

	public function profile_talent($id)
	{
		$row = $this->Tbl_talent_model->check_talent($id);
		$id_talent = $row->id_talent;
		$code_talent = $row->code_talent;
		$row_kategori = $this->Tbl_kategori_model->get_all();
		$row_tags = $this->Tbl_talent_model->get_tags();
		$row_talent = $this->Tbl_talent_model->get_by_id($id_talent);
		$row_tags_by_id = $this->Tbl_talent_model->get_tags_talent($id_talent);
		$row_image = $this->Tbl_talent_model->image($code_talent);
		
		if ($row->code_talent == NULL) {
			$data = array(
				'button' => 'Save',
				'action' => site_url('tbl_talent/profile_talent_action'),
				'update' => 0,
				'id_talent' => set_value('id_talent'),
				'nama' => set_value('nama'),
				'nama_panggilan' => set_value('nama_panggilan'),
				'tempat' => set_value('tempat'),
				'tanggal_lahir' => set_value('tanggal_lahir'),
				'usia' => set_value('usia'),
				'jenis_kelamin' => set_value('jenis_kelamin'),
				'hobby' => set_value('hobby'),
				'pendidikan' => set_value('pendidikan'),
				'pekerjaan' => set_value('pekerjaan'),
				'bahasa' => set_value('bahasa'),
				'tinggi_badan' => set_value('tinggi_badan'),
				'berat_badan' => set_value('berat_badan'),
				'id_kategori' => set_value('id_kategori'),
				'tentang' => set_value('tentang'),
				'tarif_minimum' => set_value('tarif_minimum'),
				'tarif_maximum' => set_value('tarif_maximum'),
				'prestasi' => set_value('prestasi'),
				'instagram' => set_value('instagram'),
				'facebook' => set_value('facebook'),
				'twitter' => set_value('twitter'),
				'other' => set_value('other'),
				'tags' => set_value('tags'),
				'photo' => set_value('photo'),
				'row_kategori' => $row_kategori,
				'code_talent' => set_value('code_talent'),
				'row_tags' => $row_tags,
				'row_tags_by_id' => array(),
			);
			$this->template->load('home_page/tamplate', 'tbl_talent/form_profile', $data);
		} else {
			$data = array(
				'id_talent' => $row_talent->id_talent,
				'nama' => $row_talent->nama,
				'nama_panggilan' => $row_talent->nama_panggilan,
				'tempat' => $row_talent->tempat,
				'tanggal_lahir' => $row_talent->tanggal_lahir,
				'usia' => $row_talent->usia,
				'jenis_kelamin' => $row_talent->jenis_kelamin,
				'hobby' => $row_talent->hobby,
				'pendidikan' => $row_talent->pendidikan,
				'pekerjaan' => $row_talent->pekerjaan,
				'bahasa' => $row_talent->bahasa,
				'tinggi_badan' => $row_talent->tinggi_badan,
				'berat_badan' => $row_talent->berat_badan,
				'kategori' => $row_talent->kategori,
				'tentang' => $row_talent->tentang,
				'tarif_minimum' => $row_talent->tarif_minimum,
				'tarif_maximum' => $row_talent->tarif_maximum,
				'prestasi' => $row_talent->prestasi,
				'instagram' => $row_talent->instagram,
				'facebook' => $row_talent->facebook,
				'twitter' => $row_talent->twitter,
				'other' => $row_talent->other,
				'photo' => $row_talent->photo,
				'code_talent' => $row_talent->code_talent,
				'row_tags_by_id' => $row_tags_by_id,
				'row_image' => $row_image,
				'id_users' => $row_talent->id_users,
				'status' => $row_talent->status,
			);
			$this->template->load('home_page/tamplate', 'tbl_talent/profile', $data);
		}
	}

	public function profile_talent_action()
	{

		$cek_code = $this->Tbl_talent_model->cek_code();
		$code_talent = "TLN-" . $cek_code;
		$tags = $this->input->post('tags', TRUE);

		$data = array(
			'id_users' => $this->input->post('id_users', TRUE),
			'code_talent' => $code_talent,
			'nama' => $this->input->post('nama', TRUE),
			'nama_panggilan' => $this->input->post('nama_panggilan', TRUE),
			'tempat' => $this->input->post('tempat', TRUE),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
			'usia' => $this->input->post('usia', TRUE),
			'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
			'hobby' => $this->input->post('hobby', TRUE),
			'pendidikan' => $this->input->post('pendidikan', TRUE),
			'pekerjaan' => $this->input->post('pekerjaan', TRUE),
			'bahasa' => $this->input->post('bahasa', TRUE),
			'tinggi_badan' => $this->input->post('tinggi_badan', TRUE),
			'berat_badan' => $this->input->post('berat_badan', TRUE),
			'id_kategori' => $this->input->post('id_kategori', TRUE),
			'tentang' => $this->input->post('tentang', TRUE),
			'tarif_minimum' => $this->input->post('tarif_minimum', TRUE),
			'tarif_maximum' => $this->input->post('tarif_maximum', TRUE),
			'status' => 'inactive',
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);

		$id_talent = $this->Tbl_talent_model->insert($data);

		//buat array sosmed
		$data_sosmed = array(
			'instagram' => $this->input->post('instagram', TRUE),
			'facebook' => $this->input->post('facebook', TRUE),
			'twitter' => $this->input->post('twitter', TRUE),
			'other' => $this->input->post('other', TRUE),
			'code_talent' => $code_talent,
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);

		$this->Tbl_talent_model->insert_sosmed($data_sosmed);

		//array prestasi 
		$data_prestasi = array(
			'prestasi' => $this->input->post('prestasi', TRUE),
			'code_talent' => $code_talent,
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);
		$this->Tbl_talent_model->insert_prestasi($data_prestasi);

		//Tags
		$tagss = json_decode($tags);
		for ($i = 0; $i < count($tagss); $i++) {
			$tagsPost[$i] = $tagss[$i]->value;
		}

		$row_tags = $this->Tbl_talent_model->get_tags_array();
		if (empty($row_tags)) {
			$row_tags = array();
		}
		$arrayTags = array_diff($tagsPost, $row_tags);
		$arrayTags = array_values($arrayTags);

		if (!empty($arrayTags)) {
			for ($x = 0; $x < count($arrayTags); $x++) {
				$data_tags[$x] = array(
					'tags' => $arrayTags[$x],
					'SecLogUser' => $this->session->userdata('nama_lengkap'),
					'SecLogDate' => date('Y-m-d H:i:s'),
				);
			}
			$this->Tbl_talent_model->insert_tags($data_tags);
		}

		//Tags Label
		$get_tags = $this->Tbl_talent_model->get_id_tags($tagsPost);
		$index = 1;
		$tagsArray = array();
		foreach ($get_tags as $data_tags) {
			//buat array tags
			$data_tags_label['id_tags'] = $data_tags->id_tags;
			$data_tags_label['rel_id'] = $id_talent;
			$data_tags_label['rel_type'] = 'talent';
			$data_tags_label['tag_order'] = $index;
			$index++;
			array_push($tagsArray, $data_tags_label);
		}

		$this->Tbl_talent_model->insert_tags_label($tagsArray);


		//array photo
		// If files are selected to upload 
		if (!empty($_FILES['upload']['name']) && count(array_filter($_FILES['upload']['name'])) > 0) {
			$filesCount = count($_FILES['upload']['name']);
			for ($i = 0; $i < $filesCount; $i++) {
				$_FILES['file']['name']     = $_FILES['upload']['name'][$i];
				$_FILES['file']['type']     = $_FILES['upload']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
				$_FILES['file']['error']     = $_FILES['upload']['error'][$i];
				$_FILES['file']['size']     = $_FILES['upload']['size'][$i];

				// File upload configuration 
				$uploadPath = './uploads/photo/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|jpeg|png';

				// Load and initialize upload library 
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// Upload file to server 
				if ($this->upload->do_upload('file')) {
					// Uploaded file data 
					$fileData = $this->upload->data();
					$uploadData[$i]['photo'] = $fileData['file_name'];
					$uploadData[$i]['code_talent'] = $code_talent;
					$uploadData[$i]['SecLogUser'] = $this->session->userdata('nama_lengkap');
					$uploadData[$i]['SecLogDate'] = date("Y-m-d H:i:s");
				}
			}

			if (!empty($uploadData)) {
				// Insert files data into the database 
				$this->Tbl_talent_model->insert_photo($uploadData);
			}
		}

		$this->send($data);
		$this->session->set_flashdata('message', 'Create Record Success');
		redirect(site_url('tbl_talent/profile_talent/'.$this->input->post('id_users', TRUE).''));
		// }
	}

	function ubah_profile($id)
	{
		$row = $this->Tbl_talent_model->check_talent($id);
		$id_talent = $row->id_talent;
		$code_talent = $row->code_talent;
		$row_kategori = $this->Tbl_kategori_model->get_all();
		$row_tags = $this->Tbl_talent_model->get_tags();
		$row_talent = $this->Tbl_talent_model->get_by_id($id_talent);
		$row_tags_by_id = $this->Tbl_talent_model->get_tags_talent($id_talent);
		$row_image = $this->Tbl_talent_model->image($code_talent);

		$data = array(
			'button' => 'Save',
			'action' => site_url('tbl_talent/ubah_profile_action'),
			'update' => 1,
			'id_talent' => set_value('id_talent', $row_talent->id_talent),
			'nama' => set_value('nama', $row_talent->nama),
			'nama_panggilan' => set_value('nama_panggilan', $row_talent->nama_panggilan),
			'tempat' => set_value('tempat', $row_talent->tempat),
			'tanggal_lahir' => set_value('tanggal_lahir', $row_talent->tanggal_lahir),
			'usia' => set_value('usia', $row_talent->usia),
			'jenis_kelamin' => set_value('jenis_kelamin', $row_talent->jenis_kelamin),
			'hobby' => set_value('hobby', $row_talent->hobby),
			'pendidikan' => set_value('pendidikan', $row_talent->pendidikan),
			'pekerjaan' => set_value('pekerjaan', $row_talent->pekerjaan),
			'bahasa' => set_value('bahasa', $row_talent->bahasa),
			'tinggi_badan' => set_value('tinggi_badan', $row_talent->tinggi_badan),
			'berat_badan' => set_value('berat_badan', $row_talent->berat_badan),
			'id_kategori' => set_value('id_kategori', $row_talent->id_kategori),
			'tentang' => set_value('tentang', $row_talent->tentang),
			'tarif_minimum' => set_value('tarif_minimum', number_format($row_talent->tarif_minimum)),
			'tarif_maximum' => set_value('tarif_maximum', number_format($row_talent->tarif_maximum)),
			'prestasi' => set_value('prestasi', $row_talent->prestasi),
			'instagram' => set_value('instagram', $row_talent->instagram),
			'facebook' => set_value('facebook', $row_talent->facebook),
			'twitter' => set_value('twitter', $row_talent->twitter),
			'other' => set_value('other', $row_talent->other),
			'tags' => set_value('tags'),
			'row_image' => $row_image,
			'row_kategori' => $row_kategori,
			'code_talent' => set_value('code_talent', $row_talent->code_talent),
			'row_tags' => $row_tags,
			'row_tags_by_id' => $row_tags_by_id,
		);
		$this->template->load('home_page/tamplate', 'tbl_talent/form_profile', $data);
	}

	public function ubah_profile_action()
	{
		$code_talent = $this->input->post('code_talent', TRUE);
		$row = $this->Tbl_talent_model->get_by_id($this->input->post('id_talent', TRUE));

		$data = array(
			'nama' => $this->input->post('nama', TRUE),
			'nama_panggilan' => $this->input->post('nama_panggilan', TRUE),
			'tempat' => $this->input->post('tempat', TRUE),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
			'usia' => $this->input->post('usia', TRUE),
			'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
			'hobby' => $this->input->post('hobby', TRUE),
			'pendidikan' => $this->input->post('pendidikan', TRUE),
			'pekerjaan' => $this->input->post('pekerjaan', TRUE),
			'bahasa' => $this->input->post('bahasa', TRUE),
			'tinggi_badan' => $this->input->post('tinggi_badan', TRUE),
			'berat_badan' => $this->input->post('berat_badan', TRUE),
			'id_kategori' => $this->input->post('id_kategori', TRUE),
			'tentang' => $this->input->post('tentang', TRUE),
			'tarif_minimum' => str_replace(",", "", $this->input->post('tarif_minimum', TRUE)),
			'tarif_maximum' => str_replace(",", "", $this->input->post('tarif_maximum', TRUE)),
			'SecLogUser' => $this->session->userdata('full_name'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);

		$this->Tbl_talent_model->update($this->input->post('id_talent', TRUE), $data);

		//update prestasi
		$data_update_prestasi = array(
			'prestasi' => $this->input->post('prestasi', TRUE),
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);
		$this->Tbl_talent_model->update_prestasi($code_talent, $data_update_prestasi);

		//update sosmed
		$data_update_sosmed = array(
			'instagram' => $this->input->post('instagram', TRUE),
			'facebook' => $this->input->post('facebook', TRUE),
			'twitter' => $this->input->post('twitter', TRUE),
			'other' => $this->input->post('other', TRUE),
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);
		$this->Tbl_talent_model->update_sosmed($code_talent, $data_update_sosmed);

		//update tags
		$data_update_tags = array(
			'tags' => $this->input->post('tags', TRUE),
			'SecLogUser' => $this->session->userdata('nama_lengkap'),
			'SecLogDate' => date('Y-m-d H:i:s'),
		);
		$this->Tbl_talent_model->update_tags($code_talent, $data_update_tags);

		//update photo
		if ($_FILES['upload']['name'] == '') {
			$this->session->set_flashdata('massage', 'file harus diisi');
		} else {
			$config['upload_path'] = './uploads/photo/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			// $config['max_size'] = '1024';
			// $config['max_width'] = '1920';
			// $config['max_height'] = '1280';
			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			$upload = 'upload';
			if (!$this->upload->do_upload($upload)) {
				$data_file = array('file_name' => $row->photo);
			} else {
				$data_file = $this->upload->data();
			}
			$data_update_photo = array(
				'photo' => $data_file['file_name'],
				'SecLogUser' => $this->session->userdata('nama_lengkap'),
				'SecLogDate' => date('Y-m-d H:i:s'),
			);
			$this->Tbl_talent_model->update_photo($code_talent, $data_update_photo);
		}


		$this->session->set_flashdata('message', 'Update Record Success');
		redirect(site_url('tbl_talent'));
	}

	public function delete($id)
	{
		$row = $this->Tbl_talent_model->get_by_id($id);

		if ($row) {
			$this->Tbl_talent_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('tbl_talent'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('tbl_talent'));
		}
	}

	function send($data)
	{
		//Load data
        $id_users = $data['id_users'];
		$row_user = $this->Tbl_talent_model->get_users($id_users);
		// $mail = 'johan.jaffarudin@mustika-ratu.co.id';
		$mail = 'development@mustika-ratu.co.id';

		$message = "
        <html>
        <head>
            <title>Talent Verification</title>
        </head>
        <body>
            <p>Yth. Bapak/Ibu Johan Jaffarudin,<br/><br/>A request by $row_user->nama_lengkap has been submitted that requires your approval to verified.</p>
            <h4><a href='" . base_url("tbl_talent_verify")."'>Click this link to check your approval.</a></h4>
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
		$config['smtp_pass'] = 'mustikagoogle@2022';
		$config['mailtype'] = 'html';

		$this->load->library('email', $config);

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from('mustikaratu.mailer@gmail.com', 'Mustika Ratu Talent');
		$this->email->to($mail);
		$this->email->subject('Talent Verification');
		$this->email->message($message);

		if ($this->email->send()) {
			$this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
		} else {
			$this->session->set_flashdata("email_sent", "Error in sending Email.");
			// show_error($this->email->print_debugger());
		}
	}

	public function _rules()
	{
		// $this->form_validation->set_rules('nama', 'nama', 'trim|required');
		// $this->form_validation->set_rules('nama_panggilan', 'nama panggilan', 'trim|required');
		// $this->form_validation->set_rules('tempat', 'tempat', 'trim|required');
		// $this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		// $this->form_validation->set_rules('usia', 'usia', 'trim|required');
		// $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		// $this->form_validation->set_rules('hobby', 'hobby', 'trim|required');
		// $this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
		// $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
		// $this->form_validation->set_rules('bahasa', 'bahasa', 'trim|required');
		// $this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'trim|required');
		// $this->form_validation->set_rules('berat_badan', 'berat badan', 'trim|required');
		// $this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
		// $this->form_validation->set_rules('tentang', 'tentang', 'trim|required');
		// $this->form_validation->set_rules('tarif_minimum', 'tarif minimum', 'trim|required');
		// $this->form_validation->set_rules('tarif_maximum', 'tarif maximum', 'trim|required');
		// $this->form_validation->set_rules('SecLogUser', 'secloguser', 'trim|required');
		// $this->form_validation->set_rules('SecLogaDate', 'seclogadate', 'trim|required');

		// $this->form_validation->set_rules('id_talent', 'id_talent', 'trim');
		// $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Tbl_talent.php */