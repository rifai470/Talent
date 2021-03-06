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
        $this->template->load('template', 'tbl_kategori/tbl_kategori_list');
    }

    public function json()
    {
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
                'icon' => $row->icon,
            );
            $this->template->load('template', 'tbl_kategori/tbl_kategori_read', $data);
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
            'icon' => set_value('icon'),
        );
        $this->template->load('template', 'tbl_kategori/tbl_kategori_form', $data);
    }

    public function create_action()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->create();
        // } else {
        //array photo
        if ($_FILES['upload']['name'] == '') {
            $this->session->set_flashdata('message', 'file harus diisi');
            redirect(site_url('tbl_kategori'));
        } else {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            // $config['max_size'] = '1024';
            // $config['max_width'] = '1920';
            // $config['max_height'] = '1280';
            $this->load->library('upload', $config);

            // foreach ($_FILES as $fieldname => $fileObject)  //fieldname is the form field name
            // {
            // if (!empty($fileObject['upload'])) {
            $this->upload->initialize($config);
            $upload = 'upload';
            if (!$this->upload->do_upload($upload)) {
                $errors = $this->upload->display_errors();
                //flashMsg($errors);
            } else {
                // Code After Files Upload Success GOES HERE
                // 				print_r($this->upload->data());
                // die;
                $fileData = $this->upload->data();
                // $data_icon['kategori'] = $kategori;
                $data = array(
                    'kategori' => $this->input->post('kategori', TRUE),
                    'icon' => $fileData['file_name'],
                );
            }
            // }
            // }
            if (!empty($data)) {
                // Insert files data into the database 
                $this->Tbl_kategori_model->insert_icon($data);
            }
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_kategori'));
        }
        // }
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
                'icon' => set_value('icon', $row->icon),
            );
            $this->template->load('template', 'tbl_kategori/tbl_kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kategori'));
        }
    }

    public function update_action()
    {
        //$this->_rules();

        $this->update($this->input->post('id_kategori', TRUE));

             //update photo
            //  print_r($_FILES['upload']['name']);
            //  die;
             if ($_FILES['upload']['name'] == '') {
                $this->session->set_flashdata('massage', 'file harus diisi');
            } else {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                // $config['max_size'] = '1024';
                // $config['max_width'] = '1920';
                // $config['max_height'] = '1280';
                $this->load->library('upload', $config);
    
                $this->upload->initialize($config);
                $upload = 'upload';
                if (!$this->upload->do_upload($upload)) {
                    $data_file = array('file_name');
                } else {
                    $data_file = $this->upload->data();

                    $data = array(
                        'kategori' => $this->input->post('kategori', TRUE),
                        'icon' => $data_file['file_name'],
                    );
                }
                // $data_update_icon = array(
                //     'icon' => $data_file['file_name'],
                // );
                // $this->Tbl_kategori_model->update();
                // }
                // }
                // if (!empty($data_photo)) {
                // 	// Insert files data into the database 
                // 	$this->Tbl_talent_model->insert_photo($data_photo);
                $this->Tbl_kategori_model->update($this->input->post('id_kategori', TRUE), $data);
                // }
            }

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kategori'));
        
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
        // $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

        // $this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
        // $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Tbl_kategori.php */