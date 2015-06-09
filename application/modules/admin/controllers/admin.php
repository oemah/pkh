<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_admin');
	}

	function index()
	{
		$data['title']	= 'List Seleksi PKH';
		$data['main'] = "view_list";
		$data['table'] = $this->model_admin->getList()->result_array();
		$this->load->view('template_admin',$data);
	}

	function news()
	{
		if ($_POST) {
			$dtsave = $_POST['ds'];
			if($this->model_admin->saveNews($dtsave,'tb_news')){
				$this->session->set_flashdata('success_message',"Success, data berhasil di simpan.");
				redirect(base_url('admin/news'));
			}else{
				$this->session->set_flashdata('message',"Error, data gagal di simpan.");
				redirect(base_url('admin/news'));
			}
		}else{
			$data['title']	= 'News PKH';
			$data['main'] = "view_news";
			$data['dt'] = $this->model_admin->getNews()->result_array();
			$this->load->view('template_admin',$data);
		}
	}

	function editnews($id){
		if($id != ""){
			$data = $this->input->post('ds');

			if(isset($data)){
				if($this->model_admin->updatenews($data, $id,'tb_news')){
					$this->session->set_flashdata('success_message',"Success, data berhasil di simpan.");
				redirect(base_url('admin/news'));
				}else{
					$this->session->set_flashdata('error_message',"Error, data gagal di simpan.");
				redirect(base_url('admin/news'));
				}
			}else{
				$this->session->set_flashdata('error_message',"Error, data gagal di update.");
				redirect(base_url('admin/news'));
			}
		}else{
			$this->session->set_flashdata('error_message',"Error, data gagal di update.");
				redirect(base_url('admin/news'));
		}
	}

	function deletenews($id = ''){
		if($id != ""){
			if($this->model_admin->deletenews($id,'tb_news')){
				$this->session->set_flashdata('error_message',"Success, data berhasil di hapus.");
				redirect(base_url('admin/news'));
			}else{
				$this->session->set_flashdata('error_message',"Error, data gagal di hapus.");
				redirect(base_url('admin/news'));
			}
		}else{
			$this->session->set_flashdata('error_message',"Error, data gagal di hapus.");
				redirect(base_url('admin/news'));
		}
	}

	function download($id='')
	{
		$this->load->library('phpexcel');
		$this->load->library('PHPExcel/iofactory');
        //init excel
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setTitle("Biodata")
					->setDescription("Biodata PKH");
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPHPExcel->setActiveSheetIndex(0);
        //#init excel
        //get the data
		$data = $this->model_admin->getData($id)->row_array();
        //init the table header
		$objPHPExcel->getActiveSheet()->setCellValue("A1", 'Category :');
		$objPHPExcel->getActiveSheet()->setCellValue("B1", $data['category_id']);
		$objPHPExcel->getActiveSheet()->setCellValue("A2", 'NIK :');
		$objPHPExcel->getActiveSheet()->setCellValue("B2", $data['nik']);
		$objPHPExcel->getActiveSheet()->setCellValue("A3", 'KABUPATEN/KOTA :');
		$objPHPExcel->getActiveSheet()->setCellValue("B3", $data['kategori_kabupaten']);
		$objPHPExcel->getActiveSheet()->setCellValue("A4", 'KECAMATAN :');
		$objPHPExcel->getActiveSheet()->setCellValue("B4", $data['kecamatan_pendamping']);
		$objPHPExcel->getActiveSheet()->setCellValue("A5", 'NAMA :');
		$objPHPExcel->getActiveSheet()->setCellValue("B5", $data['nama']);
		$objPHPExcel->getActiveSheet()->setCellValue("A6", 'ALAMAT KTP :');
		$objPHPExcel->getActiveSheet()->setCellValue("B6", $data['alamat'].','.$data['rt'].','.$data['rw'].','.$data['kelurahan'].','.$data['kecamatan'].','.$data['kabupaten'].','.$data['provinsi']);
		$objPHPExcel->getActiveSheet()->setCellValue("A7", 'ALAMAT DOMISILI :');
		$objPHPExcel->getActiveSheet()->setCellValue("B7", $data['alamat_domisili'].','.$data['rt_domisili'].','.$data['rw_domisili'].','.$data['kelurahan_domisili'].','.$data['kecamatan_domisili'].','.$data['kabupaten_domisili'].','.$data['provinsi_domisili']);
		$objPHPExcel->getActiveSheet()->setCellValue("A8", 'NO TELP :');
		$objPHPExcel->getActiveSheet()->setCellValue("B8", $data['telp']);
		$objPHPExcel->getActiveSheet()->setCellValue("A9", 'EMAIl :');
		$objPHPExcel->getActiveSheet()->setCellValue("B9", $data['email']);
		$objPHPExcel->getActiveSheet()->setCellValue("A10", 'TEMPAT LAHIR :');
		$objPHPExcel->getActiveSheet()->setCellValue("B10", $data['tempat_lahir']);
		$objPHPExcel->getActiveSheet()->setCellValue("A11", 'TANGGAL LAHIR :');
		$objPHPExcel->getActiveSheet()->setCellValue("B11", date_formater($data['tanggal_lahir']));
		$objPHPExcel->getActiveSheet()->setCellValue("A12", 'JENJANG PENDIDIKAN :');
		$objPHPExcel->getActiveSheet()->setCellValue("B12", $data['jenjang_pendidikan']);
		$objPHPExcel->getActiveSheet()->setCellValue("A13", 'JURUSAN PENDIDIKAN :');
		$objPHPExcel->getActiveSheet()->setCellValue("B13", $data['jurusan_pendidikan']);
		if ($data['lama_kerja'] == 0) {
			$lama = 'Tidak Pernah';
		} elseif($data['lama_kerja'] == 1) {
			$lama = '0-1 Tahun';
		} elseif($data['lama_kerja'] == 2) {
			$lama = '2-3 Tahun';
		} else {
			$lama = '>3 Tahun';
		}
		$objPHPExcel->getActiveSheet()->setCellValue("A14", 'LAMA KERJA :');
		$objPHPExcel->getActiveSheet()->setCellValue("B14", $lama);
		$objPHPExcel->getActiveSheet()->setCellValue("A15", 'KEAHLIAN :');
		$objPHPExcel->getActiveSheet()->setCellValue("B15", $data['keahlian']);
		$objPHPExcel->getActiveSheet()->getStyle("A1:A15")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$objPHPExcel->getActiveSheet()->getStyle('A1:A15')->getFont()->setBold(true);
        //fill with content
        for ($i = 'A'; $i <= 'C'; $i++) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true); //set width column auto
        }
        //end fill
        // Save it as an excel 2003 file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Biodata '.$data['nik'].'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = IOFactory::createWriter($objPHPExcel, "Excel5");
        $objWriter->save('php://output');
        exit;
	}

	function export()
	{
		$this->load->library('phpexcel');
		$this->load->library('PHPExcel/iofactory');
        //init excel
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setTitle("List Seleksi")
					->setDescription("List seleksi PKH");
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPHPExcel->setActiveSheetIndex(0);
        //#init excel
        //get the data
		$data = $this->model_admin->getList()->result_array();
        //init the table header
		$objPHPExcel->getActiveSheet()->setCellValue("A1", 'NO.');
		$objPHPExcel->getActiveSheet()->setCellValue("B1", 'NO PENDAFTAR');
		$objPHPExcel->getActiveSheet()->setCellValue("C1", 'TANGGAL DAN JAM');
		$objPHPExcel->getActiveSheet()->setCellValue("D1", 'NAMA PENDAFTAR');
		$objPHPExcel->getActiveSheet()->setCellValue("E1", 'NILAI');
		$objPHPExcel->getActiveSheet()->setCellValue("F1", 'DURASI');
		$objPHPExcel->getActiveSheet()->setCellValue("G1", 'NIK');
		$objPHPExcel->getActiveSheet()->setCellValue("H1", 'KABUPATEN/KOTA');
		$objPHPExcel->getActiveSheet()->setCellValue("I1", 'KECAMATAN');
		$objPHPExcel->getActiveSheet()->setCellValue("J1", 'ALAMAT SESUAI KTP');
		$objPHPExcel->getActiveSheet()->setCellValue("K1", 'ALAMAT DOMISILI');
		$objPHPExcel->getActiveSheet()->setCellValue("L1", 'NO.TELP');
		$objPHPExcel->getActiveSheet()->setCellValue("M1", 'EMAIL');
		$objPHPExcel->getActiveSheet()->setCellValue("N1", 'TEMPAT LAHIR');
		$objPHPExcel->getActiveSheet()->setCellValue("O1", 'TANGGAL LAHIR');
		$objPHPExcel->getActiveSheet()->setCellValue("P1", 'NO.IJAZAH');
		$objPHPExcel->getActiveSheet()->setCellValue("Q1", 'NO.BPKB');
		$objPHPExcel->getActiveSheet()->setCellValue("R1", 'NO.SIM');
		$objPHPExcel->getActiveSheet()->setCellValue("S1", 'JENJANG');
		$objPHPExcel->getActiveSheet()->setCellValue("T1", 'JURUSAN');
		$objPHPExcel->getActiveSheet()->setCellValue("U1", 'PENGALAMAN KERJA');
		$objPHPExcel->getActiveSheet()->setCellValue("V1", 'LAMA KERJA');
		$objPHPExcel->getActiveSheet()->setCellValue("W1", 'KEAHLIAN LAIN');
		$objPHPExcel->getActiveSheet()->setCellValue("X1", 'KONTRAK');
		$objPHPExcel->getActiveSheet()->getStyle("A1:X1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A1:X1')->getFont()->setBold(true);
        //fill with content
		$i = 2;
		foreach ($data as $key=>$val) {
			$objPHPExcel->getActiveSheet()->setCellValue("A" . $i, ($i - 1) . '.');
			$objPHPExcel->getActiveSheet()->setCellValue("B" . $i, $val['id']);
			$objPHPExcel->getActiveSheet()->setCellValue("C" . $i, date('d M, Y H:i:s',strtotime($val['dateTime'])));
			$objPHPExcel->getActiveSheet()->setCellValue("D" . $i, $val['nama']);
			$objPHPExcel->getActiveSheet()->setCellValue("E" . $i, $val['point']);
			$objPHPExcel->getActiveSheet()->setCellValue("F" . $i, $val['duration'].'seconds');
			$objPHPExcel->getActiveSheet()->setCellValue("G" . $i, $val['nik']);
			$objPHPExcel->getActiveSheet()->setCellValue("H" . $i, $val['kategori_kabupaten']);
			$objPHPExcel->getActiveSheet()->setCellValue("I" . $i, $val['kecamatan_pendamping']);
			$objPHPExcel->getActiveSheet()->setCellValue("J" . $i, $val['alamat'].' '.$val['rt'].' '.$val['rw'].' '.$val['kelurahan'].' '.$val['kecamatan'],' '.$val['kabupaten'].' '.$val['provinsi']);
			$objPHPExcel->getActiveSheet()->setCellValue("K" . $i, $val['alamat_domisili'].' '.$val['rt_domisili'].' '.$val['rw_domisili'].' '.$val['kelurahan_domisili'].' '.$val['kecamatan_domisili'],' '.$val['kabupaten_domisili'].' '.$val['provinsi_domisili']);
			$objPHPExcel->getActiveSheet()->setCellValue("L" . $i, $val['telp']);
			$objPHPExcel->getActiveSheet()->setCellValue("M" . $i, $val['email']);
			$objPHPExcel->getActiveSheet()->setCellValue("N" . $i, $val['tempat_lahir']);
			$objPHPExcel->getActiveSheet()->setCellValue("O" . $i, date_formater($val['tanggal_lahir']));
			$objPHPExcel->getActiveSheet()->setCellValue("P" . $i, $val['no_ijazah']);
			$objPHPExcel->getActiveSheet()->setCellValue("Q" . $i, $val['no_bpkb']);
			$objPHPExcel->getActiveSheet()->setCellValue("R" . $i, $val['no_sim']);
			$objPHPExcel->getActiveSheet()->setCellValue("S" . $i, $val['jenjang_pendidikan']);
			$objPHPExcel->getActiveSheet()->setCellValue("T" . $i, $val['jurusan_pendidikan']);
			$objPHPExcel->getActiveSheet()->setCellValue("U" . $i, $val['pengalaman']);
			if ($val['lama_kerja'] == 0) {
				$lama = 'Tidak Pernah';
			} elseif($val['lama_kerja'] == 1) {
				$lama = '0-1 Tahun';
			} elseif($val['lama_kerja'] == 2) {
				$lama = '2-3 Tahun';
			} else {
				$lama = '>3 Tahun';
			}
			$objPHPExcel->getActiveSheet()->setCellValue("V" . $i, $lama);
			$objPHPExcel->getActiveSheet()->setCellValue("W" . $i, $val['keahlian']);
			if ($val['kontrak'] == 'Tidak') {
				$kontrak = 'Tidak';
			} elseif($val['kontrak'] == 'Ya1') {
				$kontrak = 'Ya (Bersedia putus jika diterima)';
			} elseif($val['kontrak'] == 'Ya2') {
				$kontrak = 'Ya (Tidak bersedia putus jika diterima)';
			} else {
				$kontrak = '';
			}
			$objPHPExcel->getActiveSheet()->setCellValue("X" . $i, $kontrak);
            $i++;
        }
        for ($i = 'A'; $i <= 'X'; $i++) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true); //set width column auto
        }
        //end fill
        // Save it as an excel 2003 file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="List seleksi.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = IOFactory::createWriter($objPHPExcel, "Excel5");
        $objWriter->save('php://output');
        exit;
    }
}
