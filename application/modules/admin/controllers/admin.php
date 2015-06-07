<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_admin');
	}

	public function index()
	{
		$data['title']	= 'List Seleksi PKH';
		$data['main'] = "view_list";
		$data['table'] = $this->model_admin->getList()->result_array();
		$this->load->view('template_admin',$data);
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
		$objPHPExcel->getActiveSheet()->setCellValue("A4", 'NAMA :');
		$objPHPExcel->getActiveSheet()->setCellValue("B4", $data['nama']);
		$objPHPExcel->getActiveSheet()->setCellValue("A5", 'ALAMAT KTP :');
		$objPHPExcel->getActiveSheet()->setCellValue("B5", $data['alamat'].','.$data['rt'].','.$data['rw'].','.$data['kelurahan'].','.$data['kecamatan'].','.$data['kabupaten'].','.$data['provinsi']);
		$objPHPExcel->getActiveSheet()->setCellValue("A6", 'ALAMAT DOMISILI :');
		$objPHPExcel->getActiveSheet()->setCellValue("B6", $data['alamat_domisili'].','.$data['rt_domisili'].','.$data['rw_domisili'].','.$data['kelurahan_domisili'].','.$data['kecamatan_domisili'].','.$data['kabupaten_domisili'].','.$data['provinsi_domisili']);
		$objPHPExcel->getActiveSheet()->setCellValue("A7", 'NO TELP :');
		$objPHPExcel->getActiveSheet()->setCellValue("B7", $data['telp']);
		$objPHPExcel->getActiveSheet()->setCellValue("A8", 'EMAIl :');
		$objPHPExcel->getActiveSheet()->setCellValue("B8", $data['email']);
		$objPHPExcel->getActiveSheet()->setCellValue("A9", 'TEMPAT LAHIR :');
		$objPHPExcel->getActiveSheet()->setCellValue("B9", $data['tempat_lahir']);
		$objPHPExcel->getActiveSheet()->setCellValue("A10", 'TANGGAL LAHIR :');
		$objPHPExcel->getActiveSheet()->setCellValue("B10", date_formater($data['tanggal_lahir']));
		$objPHPExcel->getActiveSheet()->setCellValue("A11", 'JENJANG PENDIDIKAN :');
		$objPHPExcel->getActiveSheet()->setCellValue("B11", $data['jenjang_pendidikan']);
		$objPHPExcel->getActiveSheet()->setCellValue("A12", 'JURUSAN PENDIDIKAN :');
		$objPHPExcel->getActiveSheet()->setCellValue("B12", $data['jurusan_pendidikan']);
		if ($data['lama_kerja'] == 0) {
			$lama = 'Tidak Pernah';
		} elseif($data['lama_kerja'] == 1) {
			$lama = '0-1 Tahun';
		} elseif($data['lama_kerja'] == 2) {
			$lama = '2-3 Tahun';
		} else {
			$lama = '>3 Tahun';
		}
		$objPHPExcel->getActiveSheet()->setCellValue("A13", 'LAMA KERJA :');
		$objPHPExcel->getActiveSheet()->setCellValue("B13", $lama);
		$objPHPExcel->getActiveSheet()->setCellValue("A14", 'KEAHLIAN :');
		$objPHPExcel->getActiveSheet()->setCellValue("B14", $data['keahlian']);
		$objPHPExcel->getActiveSheet()->getStyle("A1:A14")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$objPHPExcel->getActiveSheet()->getStyle('A1:A14')->getFont()->setBold(true);
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
		$objPHPExcel->getActiveSheet()->getStyle("A1:F1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
        //fill with content
		$i = 2;
		foreach ($data as $key=>$val) {
			$objPHPExcel->getActiveSheet()->setCellValue("A" . $i, ($i - 1) . '.');
			$objPHPExcel->getActiveSheet()->setCellValue("B" . $i, $val['id']);
			$objPHPExcel->getActiveSheet()->setCellValue("C" . $i, date_formater($val['dateTime']));
			$objPHPExcel->getActiveSheet()->setCellValue("D" . $i, $val['nama']);
			$objPHPExcel->getActiveSheet()->setCellValue("E" . $i, $val['point']);
			$objPHPExcel->getActiveSheet()->setCellValue("F" . $i, $val['duration'].'seconds');
            // $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(60); //set height of detail
            $i++;
        }
        for ($i = 'A'; $i <= 'H'; $i++) {
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
