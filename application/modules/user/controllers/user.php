<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['title']	= 'Manage User';
		$data['main'] = "view_user";
		$data['table'] = array();
		$this->load->view('template_admin',$data);
	}

	function edit($id){
		if($id != ""){
			$data = $this->input->post('ds');

			if(isset($data)){
				if($this->model_member->update($data,$id,'user')){
					$this->session->set_flashdata('success_message',"Success, data berhasil di update.");
					redirect(cur_url(-2));
				}else{
					$this->session->set_flashdata('error_message',"Error, data gagal di update.");
					redirect(cur_url(-2));
				}
			}else{
				$this->session->set_flashdata('error_message',"Error, data gagal di update.");
				redirect(cur_url(-2));
			}
		}else{
			$this->session->set_flashdata('error_message',"Error, data gagal di update.");
			redirect(cur_url(-2));
		}
	}

	function delete($id = ''){
		if($id != ""){
			if($this->model_member->delete($id,'user')){
				$this->session->set_flashdata('error_message',"Success, data berhasil di hapus.");
				redirect(cur_url(-2));
			}else{
				$this->session->set_flashdata('error_message',"Error, data gagal di hapus.");
				redirect(cur_url(-2));
			}
		}else{
			$this->session->set_flashdata('error_message',"Error, data gagal di hapus.");
			redirect(cur_url(-2));
		}
	}

	function enable($id,$flag){
		$data = array('status' =>  $flag);
		$this->db->where('user_id', $id);
		$this->db->update('user', $data); 
	}

}