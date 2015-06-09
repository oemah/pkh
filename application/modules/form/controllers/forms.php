<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_form');
	}

	function index()
	{
		$data['title']	= 'Home';
		$data['main'] = "view_home";
		$data['dt'] = $this->model_form->getNews()->result_array();
		$this->load->view('template',$data);
	}

	function pendamping()
	{
		$data['title']	= 'Form Seleksi Pendamping';
		$data['main'] = "view_form_pendamping";
		$this->load->view('template',$data);
	}

	function operator()
	{
		$data['title']	= 'Form Seleksi Operator';
		$data['main'] = "view_form_operator";
		$this->load->view('template',$data);
	}

	function saveData()
	{
		if ($_POST) {
			$nik = $_POST['ds']['nik'];
			$check = $this->model_form->checkAvail($nik)->row();
			$data = $_POST['ds'];
			$category = $data['category_id'];
			$point = 0;
			// point
			if (!empty($data['kategori_kabupaten']) && $data['kategori_kabupaten'] == $data['kabupaten']) {
				$point += 5;
			}elseif($data['kategori_kabupaten'] != $data['kabupaten']){
				$point += 1;
			}
			if ($data['kontrak'] == 'Tidak') {
				$point += 5;
			}elseif($data['kontrak'] == 'Ya1'){
				$point += 5;
			}elseif($data['kontrak']=='Ya2'){
				$point += 0;
			}
			if ($data['jenjang_pendidikan'] == 'D3') {
				$point += 1;
			}elseif($data['jenjang_pendidikan'] == 'D4' OR $data['jenjang_pendidikan'] == 'S1' OR $data['jenjang_pendidikan']=='S2/S3'){
				$point += 2;
			}
			if ($data['lama_kerja'] != 0) {
				$point += 1;
			}
			if ($data['lama_kerja'] == 3) {
				$point += 5;
			}elseif($data['lama_kerja'] == 2){
				$point += 3;
			}elseif($data['lama_kerja'] == 1){
				$point += 1;
			}
			if ($category=='pendamping') {
				if ($data['jurusan_pendidikan'] == 'Sosial') {
					$point += 2;
				}elseif($data['jurusan_pendidikan'] == 'NonSosial'){
					$point += 1;
				}
				if (!empty($data['kecamatan_pendamping']) && $data['kecamatan_pendamping'] == $data['kecamatan_domisili']) {
					$point += 5;
				}elseif($data['kecamatan_pendamping'] != $data['kecamatan_domisili']){
					$point += 1;
				}
			} else {
				if ($data['jurusan_pendidikan'] == 'Teknik') {
					$point += 2;
				}elseif($data['jurusan_pendidikan'] == 'NonTeknik'){
					$point += 1;
				}
			}
			$sk = $_POST['keahlian'];
			$skill ='';
			foreach ($sk as $val) {
				$skill .= $val.', ';
			}
			$dtpoint = array(
						'point'=>$point,
						'dateTime'=>date('Y-m-d H:i:s'),
						'keahlian'=>$skill
					);
			$dtinsert = array_merge($data,$dtpoint);

			if (empty($check) && $nik!=null) {
				$up = $this->upload();
				$upload['file'] = ($up!=false) ? $up : '' ;
				$dtsave = array_merge($upload,$dtinsert);
				if($this->model_form->save($dtsave,'tb_form')){
					$this->session->set_flashdata('success_message',"Success, data berhasil di simpan.");
					redirect(base_url('form/operator'));
				}else{
					$this->session->set_flashdata('message',"Error, data gagal di simpan.");
					redirect(base_url('form/operator'));
				}
			}else{
				$this->session->set_flashdata('error_message',"Error, data gagal di simpan. NIK sudah dipakai atau kosong.");
				redirect(base_url('form/operator'));
			}
		}
	}

	function upload()
	{
		$allowedExts = array("pdf", "doc", "docx");
		$extension = end(explode(".", $_FILES["file"]["name"]));
		if (($_FILES["file"]["type"] == "application/pdf")
			|| ($_FILES["file"]["type"] == "application/msword")
			|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
			&& ($_FILES["file"]["size"] < 5000)
			&& in_array($extension, $allowedExts))
			{
				if ($_FILES["file"]["error"] > 0)
				{
					return "Return Code: " . $_FILES["file"]["error"] . "<br>";
				}
				else
				{
					if (file_exists("files/" . $_FILES["file"]["name"]))
					{
						return false;
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],
							"files/" . $_FILES["file"]["name"]);
						return $_FILES["file"]["name"];
					}
				}
			}
	}

	function checkavailable($nik=null){
		$check = $this->model_form->checkAvail($nik)->row();
		$status = (empty($check) && $nik!=null) ? 'Available' : 'Not Available' ;
		echo $status;
	}
}
