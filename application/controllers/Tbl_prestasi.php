<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_prestasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_prestasi_model');
        $this->load->model('Tbl_talent_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_prestasi/tbl_prestasi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_prestasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_prestasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_prestasi' => $row->id_prestasi,
		'prestasi' => $row->prestasi,
		'code_talent' => $row->code_talent,
		'SecLogUser' => $row->SecLogUser,
		'SecLogDate' => $row->SecLogDate,
	    );
            $this->template->load('template','tbl_prestasi/tbl_prestasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_prestasi'));
        }
    }

    public function create() 
    {
        $row_talent = $this->Tbl_talent_model->get_all();
        $data = array(
            'button' => 'Save',
            'action' => site_url('tbl_prestasi/create_action'),
	    'id_prestasi' => set_value('id_prestasi'),
	    'prestasi' => set_value('prestasi'),
	    'code_talent' => set_value('code_talent'),
        'row_talent' => $row_talent,
	);
        $this->template->load('template','tbl_prestasi/tbl_prestasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'prestasi' => $this->input->post('prestasi',TRUE),
		'code_talent' => $this->input->post('code_talent',TRUE),
		'SecLogUser' => $this->session->userdata('full_name'),
		'SecLogDate' => date('Y-m-d H:i:s'),
	    );

            $this->Tbl_prestasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_prestasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_prestasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_prestasi/update_action'),
		'id_prestasi' => set_value('id_prestasi', $row->id_prestasi),
		'prestasi' => set_value('prestasi', $row->prestasi),
		'code_talent' => set_value('code_talent', $row->code_talent),
		
        );
            $this->template->load('template','tbl_prestasi/tbl_prestasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_prestasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_prestasi', TRUE));
        } else {
            $data = array(
		'prestasi' => $this->input->post('prestasi',TRUE),
		'code_talent' => $this->input->post('code_talent',TRUE),
		'SecLogUser' => $this->session->userdata('full_name'),
		'SecLogDate' => date('Y-m-d H:i:s'),
        );

            $this->Tbl_prestasi_model->update($this->input->post('id_prestasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_prestasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_prestasi_model->get_by_id($id);

        if ($row) {
            $this->Tbl_prestasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_prestasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_prestasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('prestasi', 'prestasi', 'trim|required');
	$this->form_validation->set_rules('code_talent', 'code talent', 'trim|required');
	$this->form_validation->set_rules('SecLogUser', 'secloguser', 'trim|required');
	$this->form_validation->set_rules('SecLogDate', 'seclogdate', 'trim|required');

	$this->form_validation->set_rules('id_prestasi', 'id_prestasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_prestasi.php */