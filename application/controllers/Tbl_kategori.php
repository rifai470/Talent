<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_kategori_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tbl_kategori/tbl_kategori_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_kategori_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori' => $row->id_kategori,
		'kategori' => $row->kategori,
	    );
            $this->template->load('template','tbl_kategori/tbl_kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kategori'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('tbl_kategori/create_action'),
	    'id_kategori' => set_value('id_kategori'),
	    'kategori' => set_value('kategori'),
	);
        $this->template->load('template','tbl_kategori/tbl_kategori_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Tbl_kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_kategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kategori/update_action'),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'kategori' => set_value('kategori', $row->kategori),
	    );
            $this->template->load('template','tbl_kategori/tbl_kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Tbl_kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kategori_model->get_by_id($id);

        if ($row) {
            $this->Tbl_kategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tbl_kategori.php */