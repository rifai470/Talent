<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pasien_model');
        $this->load->model('Hasil_swab_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'pasien/pasien_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Pasien_model->json();
    }

    public function read($id)
    {
        $row = $this->Pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_pasien' => $row->id_pasien,
                'nama_lengkap' => $row->nama_lengkap,
                'ktp' => $row->ktp,
                'tgl_lahir' => $row->tgl_lahir,
                'jenis_kelamin' => $row->jenis_kelamin,
                'alamat' => $row->alamat,
                'email' => $row->email,
                'no_pasien' => $row->no_pasien,
                'phone' => $row->phone,
                'perusahaan' => $row->perusahaan,
                'images' => $row->images,
            );
            $this->template->load('template', 'pasien/pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('pasien/create_action'),
            'id_pasien' => set_value('id_pasien'),
            'nama_lengkap' => set_value('nama_lengkap'),
            'ktp' => set_value('ktp'),
            'tgl_lahir' => set_value('tgl_lahir'),
            'jenis_kelamin' => set_value('jenis_kelamin'),
            'alamat' => set_value('alamat'),
            'email' => set_value('email'),
            'no_pasien' => set_value('no_pasien'),
            'phone' => set_value('phone'),
            'perusahaan' => set_value('perusahaan'),
            'images' => set_value('images'),
        );
        $this->template->load('template', 'pasien/pasien_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $day = date("d");
            $month = date("m");
            $year = date("y");
            $kode = $this->Pasien_model->buat_kode();
            $no_pasien = $day . $month . $year . $kode;
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
                'ktp' => $this->input->post('ktp', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'no_pasien' => $no_pasien,
                'phone' => $this->input->post('phone', TRUE),
                'perusahaan' => $this->input->post('perusahaan', TRUE),
                'images' => $this->input->post('images', TRUE),
            );

            $this->Pasien_model->insert($data);

            $password       = 'Mecc4ya@53h4t';
            $options        = array("cost" => 4);
            $hashPassword   = password_hash($password, PASSWORD_BCRYPT, $options);
            $row = $this->Pasien_model->get_pasien($no_pasien);
            $dataUser = array(
                'id_pasien' => $row->id_pasien,
                'username' => $this->input->post('email', TRUE),
                'password' => $hashPassword,
                'id_user_level' => 3,
                'is_aktif' => 'y',
            );

            $this->Pasien_model->insert_user($dataUser);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pasien'));
        }
    }

    public function update($id)
    {
        $row = $this->Pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pasien/update_action'),
                'id_pasien' => set_value('id_pasien', $row->id_pasien),
                'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
                'ktp' => set_value('ktp', $row->ktp),
                'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
                'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
                'alamat' => set_value('alamat', $row->alamat),
                'email' => set_value('email', $row->email),
                'no_pasien' => set_value('no_pasien', $row->no_pasien),
                'phone' => set_value('phone', $row->phone),
                'perusahaan' => set_value('perusahaan', $row->perusahaan),
            );
            $this->template->load('template', 'pasien/pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pasien', TRUE));
        } else {
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
                'ktp' => $this->input->post('ktp', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'email' => $this->input->post('email', TRUE),
                'no_pasien' => $this->input->post('no_pasien', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'perusahaan' => $this->input->post('perusahaan', TRUE),
            );

            $this->Pasien_model->update($this->input->post('id_pasien', TRUE), $data);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pasien'));
        }
    }

    public function update_hasil_swab($id)
    {
        $row = $this->Pasien_model->get_by_id($id);
        $row_hasilSwab = $this->Pasien_model->get_hasilSwab($id);

        if(empty($row_hasilSwab->hasil_id)){
            $button = 'Save';
        } else {
            $button = 'Update';
        }

        if ($row) {
            $data = array(
                'button' => $button,
                'action' => site_url('pasien/update_hasil_swab_action'),
                'id_pasien' => set_value('id_pasien', $row->id_pasien),
                'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
                'ktp' => set_value('ktp', $row->ktp),
                'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
                'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
                'alamat' => set_value('alamat', $row->alamat),
                'email' => set_value('email', $row->email),
                'no_pasien' => set_value('no_pasien', $row->no_pasien),
                'phone' => set_value('phone', $row->phone),
                'perusahaan' => set_value('perusahaan', $row->perusahaan),
                'suhu' => set_value('suhu', $row_hasilSwab->suhu),
                'saturasi' => set_value('saturasi', $row_hasilSwab->saturasi),
                'swab_antigen' => set_value('swab_antigen', $row_hasilSwab->swab_antigen),
                'tgl_periksa' => set_value('tgl_periksa', $row_hasilSwab->tgl_periksa),
                'id_klinik' => set_value('id_klinik', $row_hasilSwab->id_klinik),
                'id_jenis_pemeriksaan' => set_value('id_jenis_pemeriksaan', $row_hasilSwab->jenis_pemeriksaan),
                'hasil_id' => set_value('hasil_id', $row_hasilSwab->hasil_id),
                'no_rekam_medis' => set_value('no_rekam_medis', $row_hasilSwab->no_rekam_medis),
            );
            $this->template->load('template', 'pasien/pasien_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }

    public function update_hasil_swab_action()
    {
        $this->_rules();

        $hasil_id = $this->input->post('hasil_id', TRUE);
        if (empty($hasil_id)) {

            $day = date("d");
            $month = date("m");
            $year = date("y");
            $jenis_pemeriksaan = $this->input->post('jenis_pemeriksaan', TRUE);
            $kode = $this->Hasil_swab_model->buat_kode();
            $kode_pemeriksaan = $this->Hasil_swab_model->get_kode_pemeriksaan($jenis_pemeriksaan);
            $no_rekam_medis = $kode_pemeriksaan . $day . $month . $year . $kode;
            $dataSwab = array(
                'no_rekam_medis' => $no_rekam_medis,
                'jenis_pemeriksaan' => $this->input->post('jenis_pemeriksaan', TRUE),
                'suhu' => $this->input->post('suhu', TRUE),
                'saturasi' => $this->input->post('saturasi', TRUE),
                'swab_antigen' => strtoupper($this->input->post('swab_antigen', TRUE)),
                'tgl_periksa' => date('Y-m-d', strtotime($this->input->post('tgl_periksa', TRUE))),
                'id_klinik' => $this->input->post('id_klinik', TRUE),
                'no_pasien' => $this->input->post('no_pasien', TRUE),
            );

            $this->Pasien_model->insert_hasilSwab($dataSwab);
        } else {
            $dataSwab = array(
                'no_rekam_medis' => $this->input->post('no_rekam_medis', TRUE),
                'jenis_pemeriksaan' => $this->input->post('jenis_pemeriksaan', TRUE),
                'suhu' => $this->input->post('suhu', TRUE),
                'saturasi' => $this->input->post('saturasi', TRUE),
                'swab_antigen' => strtoupper($this->input->post('swab_antigen', TRUE)),
                'tgl_periksa' => date('Y-m-d', strtotime($this->input->post('tgl_periksa', TRUE))),
                'id_klinik' => $this->input->post('id_klinik', TRUE),
                'no_pasien' => $this->input->post('no_pasien', TRUE),
            );

            $this->Pasien_model->update_hasilSwab($hasil_id, $dataSwab);
        }

        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('pasien'));
    }

    public function create_hasil_swab($id)
    {
        $row = $this->Pasien_model->get_by_id($id);
        $row_hasilSwab = $this->Pasien_model->get_hasilSwab($id);
        $date = strtotime($row_hasilSwab->tgl_periksa);
        $today = strtotime(date('Y-M-d'));

        if ($date <> $today) {
            $data = array(
                'button' => 'Save',
                'action' => site_url('pasien/create_hasil_swab_action'),
                'id_pasien' => set_value('id_pasien', $row->id_pasien),
                'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
                'ktp' => set_value('ktp', $row->ktp),
                'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
                'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
                'alamat' => set_value('alamat', $row->alamat),
                'email' => set_value('email', $row->email),
                'no_pasien' => set_value('no_pasien', $row->no_pasien),
                'phone' => set_value('phone', $row->phone),
                'perusahaan' => set_value('perusahaan', $row->perusahaan),
                'suhu' => set_value('suhu'),
                'saturasi' => set_value('saturasi'),
                'swab_antigen' => set_value('swab_antigen'),
                'tgl_periksa' => set_value('tgl_periksa'),
                'id_klinik' => set_value('id_klinik'),
                'id_jenis_pemeriksaan' => set_value('id_jenis_pemeriksaan'),
                'hasil_id' => set_value('hasil_id'),
                'no_rekam_medis' => set_value('no_rekam_medis'),
            );
            $this->template->load('template', 'pasien/pasien_add_hasil', $data);
        } else {
            $this->session->set_flashdata('error', 'Anda Sudah menginput data Hasil Swab Pasien '.$row->nama_lengkap.'.');
            redirect(site_url('pasien'));
        }
    }

    public function create_hasil_swab_action()
    {
        $this->_rules();

            $day = date("d");
            $month = date("m");
            $year = date("y");
            $jenis_pemeriksaan = $this->input->post('jenis_pemeriksaan', TRUE);
            $kode = $this->Hasil_swab_model->buat_kode();
            $kode_pemeriksaan = $this->Hasil_swab_model->get_kode_pemeriksaan($jenis_pemeriksaan);
            $no_rekam_medis = $kode_pemeriksaan . $day . $month . $year . $kode;
            $dataSwab = array(
                'no_rekam_medis' => $no_rekam_medis,
                'jenis_pemeriksaan' => $this->input->post('jenis_pemeriksaan', TRUE),
                'suhu' => $this->input->post('suhu', TRUE),
                'saturasi' => $this->input->post('saturasi', TRUE),
                'swab_antigen' => strtoupper($this->input->post('swab_antigen', TRUE)),
                'tgl_periksa' => date('Y-m-d', strtotime($this->input->post('tgl_periksa', TRUE))),
                'id_klinik' => $this->input->post('id_klinik', TRUE),
                'no_pasien' => $this->input->post('no_pasien', TRUE),
            );

        $this->Pasien_model->insert_hasilSwab($dataSwab);

        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('pasien'));
    }

    public function delete($id)
    {
        $row = $this->Pasien_model->get_by_id($id);

        if ($row) {
            $this->Pasien_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pasien'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
        // $this->form_validation->set_rules('ktp', 'ktp', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        // $this->form_validation->set_rules('email', 'email', 'trim|required');
        // $this->form_validation->set_rules('no_rekam_medis', 'no rekam medis', 'trim|required');
        // $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|required');
        // $this->form_validation->set_rules('images', 'images', 'trim|required');

        $this->form_validation->set_rules('id_pasien', 'id_pasien', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pasien.xls";
        $judul = "pasien";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
        xlsWriteLabel($tablehead, $kolomhead++, "Ktp");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Email");
        xlsWriteLabel($tablehead, $kolomhead++, "No Rekam Medis");
        xlsWriteLabel($tablehead, $kolomhead++, "Phone");
        xlsWriteLabel($tablehead, $kolomhead++, "Perusahaan");
        xlsWriteLabel($tablehead, $kolomhead++, "Images");

        foreach ($this->Pasien_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
            xlsWriteNumber($tablebody, $kolombody++, $data->ktp);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
            xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $data->email);
            xlsWriteNumber($tablebody, $kolombody++, $data->no_pasien);
            xlsWriteLabel($tablebody, $kolombody++, $data->phone);
            xlsWriteLabel($tablebody, $kolombody++, $data->perusahaan);
            xlsWriteLabel($tablebody, $kolombody++, $data->images);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function import()
    {
        $this->form_validation->set_rules('excel', 'File', 'trim|required');
        $kode = $this->Pasien_model->buat_kode();

        if ($_FILES['excel']['name'] == '') {
            $this->session->set_flashdata('message', 'File harus diisi');
        } else {
            $config['upload_path'] = './assets/excel/';
            $config['allowed_types'] = 'xls|xlsx';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('excel')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = $this->upload->data();

                error_reporting(E_ALL);
                date_default_timezone_set('Asia/Jakarta');

                include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

                $inputFileName = './assets/excel/' . $data['file_name'];
                $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                // $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                foreach ($objPHPExcel->getWorksheetIterator() as $sheet) {
                    $title = $sheet->getTitle();
                    $highestRow = $sheet->getHighestRow();
                    $highestColumn = $sheet->getHighestColumn();
                    $sheetData = $objPHPExcel->getSheetByName($title);

                    if ($title == 'Pasien') {
                        $day = date("d");
                        $month = date("m");
                        $year = date("y");
                        for ($row = 2, $number = $kode; $row <= $highestRow; $row++, $number++) {
                            $nama_lengkap = $sheetData->getCellByColumnAndRow(0, $row)->getValue();
                            $ktp = $sheetData->getCellByColumnAndRow(1, $row)->getValue();
                            $tgl_lahir = $sheetData->getCellByColumnAndRow(2, $row)->getValue();
                            $jenis_kelamin = $sheetData->getCellByColumnAndRow(3, $row)->getValue();
                            $alamat = $sheetData->getCellByColumnAndRow(4, $row)->getValue();
                            $email = $sheetData->getCellByColumnAndRow(5, $row)->getValue();
                            $phone = $sheetData->getCellByColumnAndRow(6, $row)->getValue();
                            $perusahaan = $sheetData->getCellByColumnAndRow(7, $row)->getValue();
                            $no_pasien = $day . $month . $year . $number;

                            $check = $this->Pasien_model->check_pasien($ktp, $phone);
                            if (empty($check)) {
                                $dataPasien[] = array(
                                    'nama_lengkap' => $nama_lengkap,
                                    'ktp' => $ktp,
                                    'tgl_lahir' => date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($tgl_lahir)),
                                    'jenis_kelamin' => $jenis_kelamin,
                                    'alamat' => $alamat,
                                    'email' => $email,
                                    'phone' => $phone,
                                    'perusahaan' => $perusahaan,
                                    'no_pasien' => $no_pasien,
                                );
                            }
                        }
                    }
                }

                unlink('./assets/excel/' . $data['file_name']);

                if (count($dataPasien) != 0) {
                    //Insert Pasien
                    $result = $this->Pasien_model->insert_batch($dataPasien);

                    $password       = 123;
                    $options        = array("cost" => 4);
                    $hashPassword   = password_hash($password, PASSWORD_BCRYPT, $options);

                    $index = 0;
                    foreach ($dataPasien as $data) {
                        $noPasien[$index] = $data['no_pasien'];
                        $index++;
                    }

                    $row_pasien = $this->Pasien_model->get_pasien_import($noPasien);
                    $index1 = 0;
                    foreach ($row_pasien as $pasien) {
                        $id_pasien[$index1] = $pasien['id_pasien'];
                        $username[$index1] = $pasien['email'];
                        $index1++;
                    }

                    $userArray = array();
                    $lenght = count($id_pasien);
                    for ($i = 0; $i < $lenght; $i++) {
                        $dataUser = array(
                            'id_pasien' => $id_pasien[$i],
                            'username' => $username[$i],
                            'password' => $hashPassword,
                            'id_user_level' => 3,
                            'is_aktif' => 'y',
                        );
                        array_push($userArray, $dataUser);
                    }

                    $this->Pasien_model->insert_user_import($userArray);

                    if ($result > 0) {
                        $this->session->set_flashdata('message', 'Data Pasien Berhasil di Import');
                        redirect(site_url('pasien'));
                    }
                } else {
                    $this->session->set_flashdata('message', 'Data Pasien Gagal di Import');
                    redirect(site_url('pasien'));
                }
            }
        }
    }
}

/* End of file Pasien.php */