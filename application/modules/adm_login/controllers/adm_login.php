<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm_login extends CI_Controller {

	public function index()
	{
		$this->load->view('view_login');
	}

	function login(){
		if(admin_login_cek($_POST['email'],$_POST['password'])){
			$this->session->set_flashdata('success_message','Selamat Datang. ');
		    redirect(base_url('home-admin'));	
		}else{
			$this->session->set_flashdata('error_message','Email & password not found');
		    redirect(base_url('app-admin'));
		}
	}

	function logout(){
		admin_logout();
		$this->session->set_flashdata('success_message','Anda telah berhasil logout. ');
		redirect(base_url('app-admin'));
	}
}
