<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('encryptkey()'))
{
	function encryptkey(){
		$CI =& get_instance();
		return $CI->config->item('encryption_key');
	}
}

if ( ! function_exists('admin_login()'))
{
	function admin_login(){
		$CI =& get_instance();
		return $CI->session->userdata('admin_'.encryptkey());
	}
}

if ( ! function_exists('get_user_admin()'))
{
	function get_user_admin($a='')
	{
		$CI =& get_instance();
		$ses = array(
			'user_id'		=> $CI->session->userdata('user_id'),
			'email' 		=> $CI->session->userdata('email'),
			'group_id'		=> $CI->session->userdata('group_id')
		);
		if(!$CI->session->userdata('admin_'.encryptkey()))
			return false;
			else{
				if($a == ''){
					return $ses;
				} else return $ses[$a];
			} 
	}
}

if ( ! function_exists('admin_login_cek()'))
{
	function admin_login_cek($email='',$pwd='')
	{
		$CI =& get_instance();
		$ds = $CI->db->get_where('user u', array('email' => $email));
		if($ds->num_rows() == 1){
			$ds = $ds->result_array();
			$ds = $ds[0];
			if(md5($pwd) == $ds['password']){
				admin_sess_register($ds);
				return true;
			}else return false;
		}else return false;
	}
}

if ( ! function_exists('admin_sess_register()'))
{
	function admin_sess_register($data=array())
	{
		$CI =& get_instance();
		$CI->session->set_userdata(array('admin_'.encryptkey() => true));
		$CI->session->set_userdata($data);
	}
}

if ( ! function_exists('admin_logout()'))
{
	function admin_logout()
	{
		$CI =& get_instance();
		$CI->session->set_userdata(array('admin_'.encryptkey() => false));
		$CI->session->sess_destroy();
	}
}

