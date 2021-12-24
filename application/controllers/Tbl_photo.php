<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_photo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_photo_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_photo/tbl_photo_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_photo_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_photo_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_photo' => $row->id_photo,
		'photo' => $row->photo,
		'id_talent' => $row->id_talent,
		'SecLogUser' => $row->SecLogUser,
		'SecLogDate' => $row->SecLogDate,
	    );
            $this->template->load('template','tbl_photo/tbl_photo_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_photo'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('tbl_photo/create_action'),
	    'id_photo' => set_value('id_photo'),
	    'photo' => set_value('photo'),
	    'id_talent' => set_value('id_talent'),
	    'SecLogUser' => set_value('SecLogUser'),
	    'SecLogDate' => set_value('SecLogDate'),
	);
        $this->template->load('template','tbl_photo/tbl_photo_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'photo' => $this->input->post('photo',TRUE),
		'id_talent' => $this->input->post('id_talent',TRUE),
		'SecLogUser' => $this->input->post('SecLogUser',TRUE),
		'SecLogDate' => $this->input->post('SecLogDate',TRUE),
	    );

            $this->Tbl_photo_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_photo'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_photo_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_photo/update_action'),
		'id_photo' => set_value('id_photo', $row->id_photo),
		'photo' => set_value('photo', $row->photo),
		'id_talent' => set_value('id_talent', $row->id_talent),
		'SecLogUser' => set_value('SecLogUser', $row->SecLogUser),
		'SecLogDate' => set_value('SecLogDate', $row->SecLogDate),
	    );
            $this->template->load('template','tbl_photo/tbl_photo_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_photo'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_photo', TRUE));
        } else {
            $data = array(
		'photo' => $this->input->post('photo',TRUE),
		'id_talent' => $this->input->post('id_talent',TRUE),
		'SecLogUser' => $this->input->post('SecLogUser',TRUE),
		'SecLogDate' => $this->input->post('SecLogDate',TRUE),
	    );

            $this->Tbl_photo_model->update($this->input->post('id_photo', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_photo'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_photo_model->get_by_id($id);

        if ($row) {
            $this->Tbl_photo_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_photo'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_photo'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('photo', 'photo', 'trim|required');
	$this->form_validation->set_rules('id_talent', 'id talent', 'trim|required');
	$this->form_validation->set_rules('SecLogUser', 'secloguser', 'trim|required');
	$this->form_validation->set_rules('SecLogDate', 'seclogdate', 'trim|required');

	$this->form_validation->set_rules('id_photo', 'id_photo', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_photo.php */