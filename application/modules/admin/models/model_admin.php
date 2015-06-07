<?php if (! defined("BASEPATH")) exit;
class model_admin extends CI_Model {

	function getList()
	{
		$this->db->select('id, noPendaftaran, nik, point, nama, dateTime, duration');
		return $this->db->get_where('tb_form', array('status'=>1));
	}
	function getData($id)
	{
		return $this->db->get_where('tb_form', array('id'=>$id));
	}
}