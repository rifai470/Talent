<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasil_swab extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Hasil_swab_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'hasil_swab/hasil_swab_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Hasil_swab_model->json();
    }

    public function read($id)
    {
        $row = $this->Hasil_swab_model->get_by_id($id);
        if ($row) {
            $data = array(
                'hasil_id' => $row->hasil_id,
                'no_rekam_medis' => $row->no_rekam_medis,
                'jenis_pemeriksaan' => $row->jenis_pemeriksaan,
                'suhu' => $row->suhu,
                'saturasi' => $row->saturasi,
                'swab_antigen' => $row->swab_antigen,
                'tgl_periksa' => date('d F Y', strtotime($row->tgl_periksa)),
                'nama_lengkap' => $row->nama_lengkap,
                'ktp' => $row->ktp,
                'tgl_lahir' => date('d F Y', strtotime($row->tgl_lahir)),
                'jenis_kelamin' => $row->jenis_kelamin,
                'alamat' => $row->alamat,
                'phone' => $row->phone,
                'perusahaan' => $row->perusahaan,
                'email' => $row->email,
                'nama_dokter' => $row->nama_dokter,
                'image_ttd' => $row->image_ttd,
                'image_klinik' => $row->image_klinik,
                'nama_klinik' => $row->nama_klinik,
                'alamat_klinik' => $row->alamat_klinik,
                'phone' => $row->phone,
                'other_phone' => $row->other_phone,
                'fax' => $row->fax,
                'kota' => $row->kota,
                'provinsi' => $row->provinsi,
                'no_pasien' => $row->no_pasien,
            );
            $this->template->load('template', 'hasil_swab/hasil_swab_read2', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasil_swab'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('hasil_swab/create_action'),
            'hasil_id' => set_value('hasil_id'),
            'no_rekam_medis' => set_value('no_rekam_medis'),
            'jenis_pemeriksaan' => set_value('jenis_pemeriksaan'),
            'suhu' => set_value('suhu'),
            'saturasi' => set_value('saturasi'),
            'swab_antigen' => set_value('swab_antigen'),
            'tgl_periksa' => set_value('tgl_periksa'),
            'id_klinik' => set_value('id_klinik'),
            'id_jenis_pemeriksaan' => set_value('id_jenis_pemeriksaan'),
        );
        $this->template->load('template', 'hasil_swab/hasil_swab_form', $data);
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
            $jenis_pemeriksaan = $this->input->post('jenis_pemeriksaan', TRUE);
            $kode = $this->hasil_swab_model->buat_kode();
            $kode_pemeriksaan = $this->hasil_swab_model->get_kode_pemeriksaan($jenis_pemeriksaan);
            $no_rekam_medis = $kode_pemeriksaan . $day . $month . $year . $kode;
            $data = array(
                'no_rekam_medis' => $no_rekam_medis,
                'jenis_pemeriksaan' => $this->input->post('jenis_pemeriksaan', TRUE),
                'suhu' => $this->input->post('suhu', TRUE),
                'saturasi' => $this->input->post('saturasi', TRUE),
                'swab_antigen' => $this->input->post('swab_antigen', TRUE),
                'tgl_periksa' => $this->input->post('tgl_periksa', TRUE),
                'id_klinik' => $this->input->post('id_klinik', TRUE),
                'no_pasien' => $this->input->post('no_pasien', TRUE),
            );

            $this->Hasil_swab_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('hasil_swab'));
        }
    }

    public function update($id)
    {
        $row = $this->Hasil_swab_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hasil_swab/update_action'),
                'hasil_id' => set_value('hasil_id', $row->hasil_id),
                'no_rekam_medis' => set_value('no_rekam_medis', $row->no_rekam_medis),
                'jenis_pemeriksaan' => set_value('jenis_pemeriksaan', $row->jenis_pemeriksaan),
                'id_jenis_pemeriksaan' => set_value('id_jenis_pemeriksaan', $row->id_jenis_pemeriksaan),
                'suhu' => set_value('suhu', $row->suhu),
                'saturasi' => set_value('saturasi', $row->saturasi),
                'swab_antigen' => set_value('swab_antigen', $row->swab_antigen),
                'tgl_periksa' => set_value('tgl_periksa', $row->tgl_periksa),
                'id_klinik' => set_value('id_klinik', $row->id_klinik),
            );
            $this->template->load('template', 'hasil_swab/hasil_swab_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasil_swab'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('hasil_id', TRUE));
        } else {
            $data = array(
                'no_rekam_medis' => $this->input->post('no_rekam_medis', TRUE),
                'jenis_pemeriksaan' => $this->input->post('jenis_pemeriksaan', TRUE),
                'suhu' => $this->input->post('suhu', TRUE),
                'saturasi' => $this->input->post('saturasi', TRUE),
                'swab_antigen' => $this->input->post('swab_antigen', TRUE),
                'tgl_periksa' => $this->input->post('tgl_periksa', TRUE),
                'id_klinik' => $this->input->post('id_klinik', TRUE),
            );

            $this->Hasil_swab_model->update($this->input->post('hasil_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hasil_swab'));
        }
    }

    public function delete($id)
    {
        $row = $this->Hasil_swab_model->get_by_id($id);

        if ($row) {
            $this->Hasil_swab_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hasil_swab'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasil_swab'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('no_rekam_medis', 'no rekam medis', 'trim|required');
        $this->form_validation->set_rules('jenis_pemeriksaan', 'jenis pemeriksaan', 'trim|required');
        // $this->form_validation->set_rules('suhu', 'suhu', 'trim|required');
        // $this->form_validation->set_rules('saturasi', 'saturasi', 'trim|required');
        // $this->form_validation->set_rules('swab_antigen', 'swab antigen', 'trim|required');
        $this->form_validation->set_rules('tgl_periksa', 'tgl periksa', 'trim|required');

        $this->form_validation->set_rules('hasil_id', 'hasil_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
	{
		// Load plugin PHPExcel
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excel = new PHPExcel();
		$excel->getProperties()->setCreator('SEHAT')
							   ->setLastModifiedBy('SEHAT')
							   ->setTitle("Hasil Swab")
							   ->setSubject("SEHAT")
							   ->setDescription("Hasil Swab")
							   ->setKeywords("Hasil Swab");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "No");
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Nama Lengkap");
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Jenis Kelamin");
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Tanggal Lahir");
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Suhu");
        $excel->setActiveSheetIndex(0)->setCellValue('F1', "Saturasi");
        $excel->setActiveSheetIndex(0)->setCellValue('G1', "Hasil Swab");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);

		$hasil_swab = $this->Hasil_swab_model->get_all();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($hasil_swab as $data){
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_lengkap);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->jenis_kelamin);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, date('d/m/Y', strtotime($data->tgl_lahir)));
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->suhu);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->saturasi);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->swab_antigen);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Hasil Swab");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Hasil Swab.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

    // public function excel()
    // {
    //     $this->load->helper('exportexcel');
    //     $namaFile = "hasil_swab.xls";
    //     $judul = "hasil_swab";
    //     $tablehead = 0;
    //     $tablebody = 1;
    //     $nourut = 1;
    //     //penulisan header
    //     header("Pragma: public");
    //     header("Expires: 0");
    //     header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    //     header("Content-Type: application/force-download");
    //     header("Content-Type: application/octet-stream");
    //     header("Content-Type: application/download");
    //     header("Content-Disposition: attachment;filename=" . $namaFile . "");
    //     header("Content-Transfer-Encoding: binary ");

    //     xlsBOF();

    //     $kolomhead = 0;
    //     xlsWriteLabel($tablehead, $kolomhead++, "No");
    //     xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
    //     xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
    //     xlsWriteLabel($tablehead, $kolomhead++, "Suhu");
    //     xlsWriteLabel($tablehead, $kolomhead++, "Saturasi");
    //     xlsWriteLabel($tablehead, $kolomhead++, "Swab Antigen");

    //     foreach ($this->Hasil_swab_model->get_all() as $data) {
    //         $kolombody = 0;

    //         //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
    //         xlsWriteNumber($tablebody, $kolombody++, $nourut);
    //         xlsWriteNumber($tablebody, $kolombody++, $data->nama_lengkap);
    //         xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
    //         xlsWriteLabel($tablebody, $kolombody++, $data->suhu);
    //         xlsWriteLabel($tablebody, $kolombody++, $data->saturasi);
    //         xlsWriteLabel($tablebody, $kolombody++, $data->swab_antigen);

    //         $tablebody++;
    //         $nourut++;
    //     }

    //     xlsEOF();
    //     exit();
    // }

    public function pdf($id)
    {
        $row = $this->Hasil_swab_model->get_by_id($id);

        $data = array(
            'hasil_id' => $row->hasil_id,
            'no_rekam_medis' => $row->no_rekam_medis,
            'jenis_pemeriksaan' => $row->jenis_pemeriksaan,
            'suhu' => $row->suhu,
            'saturasi' => $row->saturasi,
            'swab_antigen' => $row->swab_antigen,
            'tgl_periksa' => date('d F Y', strtotime($row->tgl_periksa)),
            'nama_lengkap' => $row->nama_lengkap,
            'ktp' => $row->ktp,
            'tgl_lahir' => date('d F Y', strtotime($row->tgl_lahir)),
            'jenis_kelamin' => $row->jenis_kelamin,
            'alamat' => $row->alamat,
            'phone' => $row->phone,
            'perusahaan' => $row->perusahaan,
            'email' => $row->email,
            'nama_dokter' => $row->nama_dokter,
            'image_ttd' => $row->image_ttd,
            'image_klinik' => $row->image_klinik,
            'nama_klinik' => $row->nama_klinik,
            'alamat_klinik' => $row->alamat_klinik,
            'phone' => $row->phone,
            'other_phone' => $row->other_phone,
            'fax' => $row->fax,
            'kota' => $row->kota,
            'provinsi' => $row->provinsi,
        );
        $this->load->view('hasil_swab/hasil_swab_pdf2', $data);

        // Get output html
		$html = $this->output->get_output();

		// Load pdf library
		$this->load->library('pdf');

		$this->dompdf->loadHtml($html);
		$this->dompdf->set_option('isRemoteEnabled', TRUE);

		$this->dompdf->setPaper('A4', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("Hasil Swab - $row->nama_lengkap.pdf", array("Attachment" => 1));
    }
}

/* End of file Hasil_swab.php */