<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_tarif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_tarif_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_tarif/tbl_tarif_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_tarif_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_tarif_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tarif' => $row->id_tarif,
		'tarif' => $row->tarif,
	    );
            $this->template->load('template','tbl_tarif/tbl_tarif_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_tarif'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('tbl_tarif/create_action'),
	    'id_tarif' => set_value('id_tarif'),
	    'tarif' => set_value('tarif'),
	);
        $this->template->load('template','tbl_tarif/tbl_tarif_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tarif' => $this->input->post('tarif',TRUE),
	    );

            $this->Tbl_tarif_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_tarif'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_tarif_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_tarif/update_action'),
		'id_tarif' => set_value('id_tarif', $row->id_tarif),
		'tarif' => set_value('tarif', $row->tarif),
	    );
            $this->template->load('template','tbl_tarif/tbl_tarif_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_tarif'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tarif', TRUE));
        } else {
            $data = array(
		'tarif' => $this->input->post('tarif',TRUE),
	    );

            $this->Tbl_tarif_model->update($this->input->post('id_tarif', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_tarif'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_tarif_model->get_by_id($id);

        if ($row) {
            $this->Tbl_tarif_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_tarif'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_tarif'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tarif', 'tarif', 'trim|required');

	$this->form_validation->set_rules('id_tarif', 'id_tarif', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_tarif.php */