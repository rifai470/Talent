<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_hak_akses extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_hak_akses_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_hak_akses/tbl_hak_akses_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_hak_akses_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_hak_akses_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_user_level' => $row->id_user_level,
		'id_menu' => $row->id_menu,
	    );
            $this->template->load('template','tbl_hak_akses/tbl_hak_akses_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_hak_akses'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('tbl_hak_akses/create_action'),
	    'id' => set_value('id'),
	    'id_user_level' => set_value('id_user_level'),
	    'id_menu' => set_value('id_menu'),
	);
        $this->template->load('template','tbl_hak_akses/tbl_hak_akses_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user_level' => $this->input->post('id_user_level',TRUE),
		'id_menu' => $this->input->post('id_menu',TRUE),
	    );

            $this->Tbl_hak_akses_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_hak_akses'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_hak_akses_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_hak_akses/update_action'),
		'id' => set_value('id', $row->id),
		'id_user_level' => set_value('id_user_level', $row->id_user_level),
		'id_menu' => set_value('id_menu', $row->id_menu),
	    );
            $this->template->load('template','tbl_hak_akses/tbl_hak_akses_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_hak_akses'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_user_level' => $this->input->post('id_user_level',TRUE),
		'id_menu' => $this->input->post('id_menu',TRUE),
	    );

            $this->Tbl_hak_akses_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_hak_akses'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_hak_akses_model->get_by_id($id);

        if ($row) {
            $this->Tbl_hak_akses_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_hak_akses'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_hak_akses'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
	$this->form_validation->set_rules('id_menu', 'id menu', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_hak_akses.php */