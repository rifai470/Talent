<?php
date_default_timezone_set('Asia/Jakarta');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasil_swab_detail extends CI_Controller
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
        $detail = $this->Hasil_swab_model->get_all();
        $data = array(
            'detail' => $detail
        );
        $this->template->load('template', 'hasil_swab/hasil_swab_detail', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Hasil_swab_model->json_detail();
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
            $this->template->load('template', 'hasil_swab/hasil_swab_detail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasil_swab_detail'));
        }
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
        $this->load->view('hasil_swab/hasil_swab_detail_pdf', $data);

        // Get output html
		$html = $this->output->get_output();

		// Load pdf library
		$this->load->library('pdf');

		$this->dompdf->loadHtml($html);
		$this->dompdf->set_option('isRemoteEnabled', TRUE);

		$this->dompdf->setPaper('A4', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("Hasil Swab.pdf", array("Attachment" => 0));
    }
}

/* End of file Hasil_swab.php */