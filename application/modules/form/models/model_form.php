<?php if (! defined("BASEPATH")) exit;
class model_form extends CI_Model {

	function checkAvail($id)
	{
		return $this->db->get_where('tb_form',array('nik'=>$id));
	}

	function save($data = '',$tabel=''){
		if($data != ''){
			$this->db->insert($tabel,$data);
			return true;
		}else{
			return false;
		}
	}
}