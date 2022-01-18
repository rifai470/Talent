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
		$this->load->model('Tbl_tarif_model');
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

	public function create()
	{
		$row_kategori = $this->Tbl_kategori_model->get_all();
		$row_tarif = $this->Tbl_tarif_model->get_all();
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
			'id_tarif' => set_value('id_tarif'),
			'prestasi' => set_value('prestasi'),
			'instagram' => set_value('instagram'),
			'facebook' => set_value('facebook'),
			'twitter' => set_value('twitter'),
			'other' => set_value('other'),
			'tags' => set_value('tags'),
			'photo' => set_value('photo'),
			'row_kategori' => $row_kategori,
			'row_tarif' => $row_tarif,
			'code_talent' => set_value('code_talent'),
			'row_tags' => $row_tags,

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
			'id_tarif' => $this->input->post('id_tarif', TRUE),
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
		$row_tarif = $this->Tbl_tarif_model->get_all();

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
				'id_tarif' => set_value('id_tarif', $row->id_tarif),
				'prestasi' => set_value('prestasi', $row->prestasi),
				'instagram' => set_value('instagram', $row->instagram),
				'facebook' => set_value('facebook', $row->facebook),
				'twitter' => set_value('twitter', $row->twitter),
				'other' => set_value('other', $row->other),
				'photo' => set_value('photo', $row->photo),
				'tags' => set_value('tags', $row->tags),
				'row_kategori' => $row_kategori,
				'row_tarif' => $row_tarif,
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
			'id_tarif' => $this->input->post('id_tarif', TRUE),
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
			// }
			// }
			// if (!empty($data_photo)) {
			// 	// Insert files data into the database 
			// 	$this->Tbl_talent_model->insert_photo($data_photo);
			// }
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

	// public function tags(){
	// 	$data_tags = array();

	// 	$query = $this->db->get('tbl_tags');
	// 	$result = $query->result_array();
	// 	foreach ($result as $result){
	// 		$data_tags[] = array(
	// 			'tags_id' => $result['tags_id'],
	// 			'tags' => $result['tags']
	// 		)
	// 	}

	// 	$this->output
	// 	->set_content_type('asset/tags/dist')
	// 	->

	// }

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
		// $this->form_validation->set_rules('id_tarif', 'id tarif', 'trim|required');
		// $this->form_validation->set_rules('SecLogUser', 'secloguser', 'trim|required');
		// $this->form_validation->set_rules('SecLogaDate', 'seclogadate', 'trim|required');

		// $this->form_validation->set_rules('id_talent', 'id_talent', 'trim');
		// $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file Tbl_talent.php */