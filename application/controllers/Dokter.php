<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Dokter_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'dokter/dokter_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Dokter_model->json();
    }

    public function read($id)
    {
        $row = $this->Dokter_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_dokter' => $row->id_dokter,
                'nama_dokter' => $row->nama_dokter,
                'image_ttd' => $row->image_ttd,
            );
            $this->template->load('template', 'dokter/dokter_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dokter'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('dokter/create_action'),
            'id_dokter' => set_value('id_dokter'),
            'nama_dokter' => set_value('nama_dokter'),
            'image_ttd' => set_value('image_ttd'),
        );
        $this->template->load('template', 'dokter/dokter_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            //upload file
            $config['upload_path'] = './assets/images/ttd/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']    = 20000;
            $config['max_width']  = 1024;
            $config['max_height']  = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // $upload = 'image_klinik';
            if (!$this->upload->do_upload('image_ttd')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata("message", $error);
                $data_file = array('file_name' => "");
            } else {
                $data_file = $this->upload->data();
            }

            $data = array(
                'nama_dokter' => $this->input->post('nama_dokter', TRUE),
                'image_ttd' => $data_file['file_name'],
            );

            $this->Dokter_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2 ' . $error . '');
            redirect(site_url('dokter'));
        }
    }

    public function update($id)
    {
        $row = $this->Dokter_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dokter/update_action'),
                'id_dokter' => set_value('id_dokter', $row->id_dokter),
                'nama_dokter' => set_value('nama_dokter', $row->nama_dokter),
                'image_ttd' => set_value('image_ttd', $row->image_ttd),
            );
            $this->template->load('template', 'dokter/dokter_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dokter'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_dokter', TRUE));
        } else {

            //upload file
            $config['upload_path'] = './assets/images/ttd/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']    = 20000;
            $config['max_width']  = 1024;
            $config['max_height']  = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // $upload = 'image_klinik';
            if (!$this->upload->do_upload('image_ttd')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata("message", $error);
                $data_file = array('file_name' => "");
            } else {
                $data_file = $this->upload->data();
            }

            $image = $_FILES['image_ttd'];
            $old_image = $this->input->post('old_image', TRUE);
            if (!empty($image)) {
                unlink("./assets/images/ttd/".$old_image);
                $data = array(
                    'nama_dokter' => $this->input->post('nama_dokter', TRUE),
                    'image_ttd' => $data_file['file_name'],
                );
            } else {
                $data = array(
                    'nama_dokter' => $this->input->post('nama_dokter', TRUE),
                    'image_ttd' => $this->input->post('old_image', TRUE),
                );
            }
            $this->Dokter_model->update($this->input->post('id_dokter', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dokter'));
        }
    }

    public function delete($id)
    {
        $row = $this->Dokter_model->get_by_id($id);

        if ($row) {
            $this->Dokter_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dokter'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dokter'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_dokter', 'nama dokter', 'trim|required');
        // $this->form_validation->set_rules('image_ttd', 'image ttd', 'trim|required');

        $this->form_validation->set_rules('id_dokter', 'id_dokter', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dokter.xls";
        $judul = "dokter";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Dokter");

        foreach ($this->Dokter_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_dokter);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Dokter.php */