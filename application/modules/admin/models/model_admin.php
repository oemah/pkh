<?php if (! defined("BASEPATH")) exit;
class model_admin extends CI_Model {

	function getList()
	{
		return $this->db->get_where('tb_form', array('status'=>1));
	}

	function getData($id)
	{
		return $this->db->get_where('tb_form', array('id'=>$id));
	}

	function saveNews($data = '',$tabel=''){
		if($data != ''){
			$this->db->insert($tabel,$data);
			return true;
		}else{
			return false;
		}
	}

	function updatenews($data = '',$id = '', $tabel = ''){
		if(($data != '') && ($id != '')){
			$this->db->where('id_news',$id);
			$this->db->update($tabel,$data);
			return true;
		}else{
			return false;
		}
	}

	function getNews()
	{
		return $this->db->get('tb_news');
	}

	function deletenews($id = '',$tabel = ''){
		if($id != ''){
			$this->db->where('id_news',$id);
			$this->db->delete($tabel);
			return true;
		}else{
			return false;
		}
	}
}