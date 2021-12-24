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
		'sosmed' => $row->sosmed,
		'url' => $row->url,
		'id_talent' => $row->id_talent,
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
	    'sosmed' => set_value('sosmed'),
	    'url' => set_value('url'),
	    'id_talent' => set_value('id_talent'),
	    'SecLogUser' => set_value('SecLogUser'),
	    'SecLogDate' => set_value('SecLogDate'),
	);
        $this->template->load('template','tbl_sosmed/tbl_sosmed_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'sosmed' => $this->input->post('sosmed',TRUE),
		'url' => $this->input->post('url',TRUE),
		'id_talent' => $this->input->post('id_talent',TRUE),
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
		'sosmed' => set_value('sosmed', $row->sosmed),
		'url' => set_value('url', $row->url),
		'id_talent' => set_value('id_talent', $row->id_talent),
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
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sosmed', TRUE));
        } else {
            $data = array(
		'sosmed' => $this->input->post('sosmed',TRUE),
		'url' => $this->input->post('url',TRUE),
		'id_talent' => $this->input->post('id_talent',TRUE),
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
	$this->form_validation->set_rules('sosmed', 'sosmed', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	$this->form_validation->set_rules('id_talent', 'id talent', 'trim|required');
	$this->form_validation->set_rules('SecLogUser', 'secloguser', 'trim|required');
	$this->form_validation->set_rules('SecLogDate', 'seclogdate', 'trim|required');

	$this->form_validation->set_rules('id_sosmed', 'id_sosmed', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_sosmed.php */