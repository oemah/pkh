<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Kategori_tree{
	
	private $kategori = array();
	private $anak = array();

	function built_tree($data, $parent = 0) {
	    static $i = -1;
	    if (isset($data[$parent])) {
	        $i++;
	        foreach ($data[$parent] as $v) {
	            $this->kategori[] = array(
								'id'	=>$v->category_id,
								'level'	=>$i,
								'name'	=>$v->category_name,
								'parent'=>$v->category_parent,
								);
				$child = $this->built_tree($data, $v->category_id);
	            if ($child) {
	                $i--;
				}
			}
	        return true;
	    } else {
	        return false;
	    }
	}

	function test($data, $parent = 0){
		static $i = -1;
		if (isset($data[$parent])) {
			$i++;
			$child = array();
			foreach ($data[$parent] as $v) {
				$this->kategori[$v->category_id][] = $v->category_id;

				$child = $this->test($data, $v->category_id);
	            if ($child) {
	                $i--;
				}
				
				
			}
			return true;
		} else {
			return false;
		}
		
	}

	function get_category()
	{
		$CI =& get_instance();
		$CI->db->order_by('category_id');
		$ds = $CI->db->get_where('tb_category', array('category_flag' => 1));
		$data = array();
		foreach ($ds->result() as $row) {
			$data[$row->category_parent][] = $row;
		}
		// $this->test($data);
		$this->built_tree($data);
		// debug_array($this->kategori);

		return $this->kategori;
	}

	function get_category_menu(){
		$kategori = $this->get_category();
		$dtm = array();
		$dt = array();
		foreach ($kategori as $key) {
			if ($key['level'] == 0) {
				$dt['menu'][$key['id']] = $key;
			}
			if ($key['level'] == 1) {
				$dt['menu'][$key['parent']]['sub'][$key['id']] = $key;
			}
			if ($key['level'] == 2) {
				$dt['sub_menu'][$key['parent']][] = $key;
			}
		}
		return $dt;
	}

	function get_new_item(){
		$CI =& get_instance();
		$ds = $CI->db->limit(4)->order_by('item_id','desc')->get_where('tb_item',array('item_flag'=>1))->result_array();
		return $ds;
	}
}
