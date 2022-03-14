<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_sosmed extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_sosmed_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_sosmed/tbl_sosmed_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_sosmed_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_sosmed_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_sosmed' => $row->id_sosmed,
		'instagram' => $row->instagram,
		'facebook' => $row->facebook,
        'twitter' => $row->twitter,
		'tiktok' => $row->tiktok,
        'youtube' => $row->youtube,
        'other' => $row->other,
		'code_talent' => $row->code_talent,
		'SecLogUser' => $row->SecLogUser,
		'SecLogDate' => $row->SecLogDate,
	    );
            $this->template->load('template','tbl_sosmed/tbl_sosmed_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_sosmed'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('tbl_sosmed/create_action'),
	    'id_sosmed' => set_value('id_sosmed'),
	    'instagram' => set_value('instagram'),
        'facebook' => set_value('facebook'),
        'twitter' => set_value('twitter'),
        'tiktok' => set_value('tiktok'),
        'youtube' => set_value('youtube'),
        'other' => set_value('other'),
	    'code_talent' => set_value('code_talent'),
	    'SecLogUser' => set_value('SecLogUser'),
	    'SecLogDate' => set_value('SecLogDate'),
	);
        $this->template->load('template','tbl_sosmed/tbl_sosmed_form', $data);
    }
    
    public function create_action() 
    {
        // $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'instagram' => $this->input->post('instagram',TRUE),
		'facebook' => $this->input->post('facebook',TRUE),
        'twitter' => $this->input->post('twitter',TRUE),
		'tiktok' => $this->input->post('tiktok',TRUE),
        'youtube' => $this->input->post('youtube',TRUE),
		'other' => $this->input->post('other',TRUE),
		'code_talent' => $this->input->post('code_talent',TRUE),
		'SecLogUser' => $this->input->post('SecLogUser',TRUE),
		'SecLogDate' => $this->input->post('SecLogDate',TRUE),
	    );

            $this->Tbl_sosmed_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_sosmed'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_sosmed_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_sosmed/update_action'),
		'id_sosmed' => set_value('id_sosmed', $row->id_sosmed),
		'instagram' => set_value('instagram', $row->instagram),
		'facebook' => set_value('facebook', $row->facebook),
        'twitter' => set_value('twitter', $row->twitter),
		'tiktok' => set_value('tiktok', $row->tiktok),
        'youtube' => set_value('youtube', $row->youtube),
		'other' => set_value('other', $row->other),
		'code_talent' => set_value('code_talent', $row->code_talent),
		'SecLogUser' => set_value('SecLogUser', $row->SecLogUser),
		'SecLogDate' => set_value('SecLogDate', $row->SecLogDate),
	    );
            $this->template->load('template','tbl_sosmed/tbl_sosmed_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_sosmed'));
        }
    }
    
    public function update_action() 
    {
        // $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sosmed', TRUE));
        } else {
            $data = array(
		'instagram' => $this->input->post('instagram',TRUE),
		'facebook' => $this->input->post('facebook',TRUE),
        'twitter' => $this->input->post('twitter',TRUE),
		'tiktok' => $this->input->post('tiktok',TRUE),
        'youtube' => $this->input->post('youtube',TRUE),
		'other' => $this->input->post('other',TRUE),
		'code_talent' => $this->input->post('code_talent',TRUE),
		'SecLogUser' => $this->input->post('SecLogUser',TRUE),
		'SecLogDate' => $this->input->post('SecLogDate',TRUE),
	    );

            $this->Tbl_sosmed_model->update($this->input->post('id_sosmed', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_sosmed'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_sosmed_model->get_by_id($id);

        if ($row) {
            $this->Tbl_sosmed_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_sosmed'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_sosmed'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('instagram', 'instagram', 'trim|required');
	// $this->form_validation->set_rules('facebook', 'facebook', 'trim|required');
    // $this->form_validation->set_rules('twitter', 'twitter', 'trim|required');
	// $this->form_validation->set_rules('other', 'other', 'trim|required');
	// $this->form_validation->set_rules('code_talent', 'code talent', 'trim|required');
	// $this->form_validation->set_rules('SecLogUser', 'secloguser', 'trim|required');
	// $this->form_validation->set_rules('SecLogDate', 'seclogdate', 'trim|required');

	// $this->form_validation->set_rules('id_sosmed', 'id_sosmed', 'trim');
	// $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_sosmed.php */