<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Klinik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Klinik_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'klinik/klinik_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Klinik_model->json();
    }

    public function read($id)
    {
        $row = $this->Klinik_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_klinik' => $row->id_klinik,
                'nama_klinik' => $row->nama_klinik,
                'alamat_klinik' => $row->alamat_klinik,
                'phone' => $row->phone,
                'other_phone' => $row->other_phone,
                'fax' => $row->fax,
                'nama_dokter' => $row->nama_dokter,
                'image_ttd' => $row->image_ttd,
                'image_klinik' => $row->image_klinik,
            );
            $this->template->load('template', 'klinik/klinik_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klinik'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('klinik/create_action'),
            'id_klinik' => set_value('id_klinik'),
            'nama_klinik' => set_value('nama_klinik'),
            'alamat_klinik' => set_value('alamat_klinik'),
            'phone' => set_value('phone'),
            'other_phone' => set_value('other_phone'),
            'fax' => set_value('fax'),
            'id_dokter' => set_value('id_dokter'),
            'image_klinik' => set_value('image_klinik'),
            'kota' => set_value('kota'),
            'provinsi' => set_value('provinsi'),
        );
        $this->template->load('template', 'klinik/klinik_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            //upload file
            $config['upload_path'] = './assets/images/logo/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']	= 20000;
            $config['max_width']  = 1024;
            $config['max_height']  = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // $upload = 'image_klinik';
            if (!$this->upload->do_upload('image_klinik')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata("message", $error);
                $data_file = array('file_name' => "");
            } else {
                $data_file = $this->upload->data();
            }

            $data = array(
                'nama_klinik' => $this->input->post('nama_klinik', TRUE),
                'alamat_klinik' => $this->input->post('alamat_klinik', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'other_phone' => $this->input->post('other_phone', TRUE),
                'fax' => $this->input->post('fax', TRUE),
                'id_dokter' => $this->input->post('id_dokter', TRUE),
                'image_klinik' => $data_file['file_name'],
                'kota' => $this->input->post('kota', TRUE),
                'provinsi' => $this->input->post('provinsi', TRUE),
            );

            $this->Klinik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2 '.$error.'');
            redirect(site_url('klinik'));
        }
    }

    public function update($id)
    {
        $row = $this->Klinik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('klinik/update_action'),
                'id_klinik' => set_value('id_klinik', $row->id_klinik),
                'nama_klinik' => set_value('nama_klinik', $row->nama_klinik),
                'alamat_klinik' => set_value('alamat_klinik', $row->alamat_klinik),
                'phone' => set_value('phone', $row->phone),
                'other_phone' => set_value('other_phone', $row->other_phone),
                'fax' => set_value('fax', $row->fax),
                'id_dokter' => set_value('id_dokter', $row->id_dokter),
                'kota' => set_value('kota', $row->kota),
                'provinsi' => set_value('provinsi', $row->provinsi),
            );
            $this->template->load('template', 'klinik/klinik_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klinik'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_klinik', TRUE));
        } else {
            $data = array(
                'nama_klinik' => $this->input->post('nama_klinik', TRUE),
                'alamat_klinik' => $this->input->post('alamat_klinik', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'other_phone' => $this->input->post('other_phone', TRUE),
                'fax' => $this->input->post('fax', TRUE),
                'id_dokter' => $this->input->post('id_dokter', TRUE),
                'kota' => $this->input->post('kota', TRUE),
                'provinsi' => $this->input->post('provinsi', TRUE),
            );

            $this->Klinik_model->update($this->input->post('id_klinik', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('klinik'));
        }
    }

    public function delete($id)
    {
        $row = $this->Klinik_model->get_by_id($id);

        if ($row) {
            $this->Klinik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('klinik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klinik'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_klinik', 'nama klinik', 'trim|required');
        $this->form_validation->set_rules('alamat_klinik', 'alamat klinik', 'trim|required');
        // $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        // $this->form_validation->set_rules('other_phone', 'other phone', 'trim|required');
        // $this->form_validation->set_rules('fax', 'fax', 'trim|required');
        $this->form_validation->set_rules('id_dokter', 'id dokter', 'trim|required');
        // $this->form_validation->set_rules('image_klinik', 'image klinik', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');

        $this->form_validation->set_rules('id_klinik', 'id_klinik', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "klinik.xls";
        $judul = "klinik";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Klinik");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat Klinik");
        xlsWriteLabel($tablehead, $kolomhead++, "Phone");
        xlsWriteLabel($tablehead, $kolomhead++, "Other Phone");
        xlsWriteLabel($tablehead, $kolomhead++, "Fax");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Dokter");

        foreach ($this->Klinik_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_klinik);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat_klinik);
            xlsWriteLabel($tablebody, $kolombody++, $data->phone);
            xlsWriteLabel($tablebody, $kolombody++, $data->other_phone);
            xlsWriteLabel($tablebody, $kolombody++, $data->fax);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_dokter);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function get_provinsi()
	{
		$kota = $this->input->post('id', TRUE);
		$data = $this->Klinik_model->get_provinsi($kota)->result();
		echo json_encode($data);
	}
}

/* End of file Klinik.php */