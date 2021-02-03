<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

	public function admin_auth($emailId, $password)
	 {
		$admin = $this->db->select('*')
		->from('admin_login_tb')
		->where('emailID', $emailId)
		->where('password', md5($password))
		->get()->row();
		return $admin;
		//echo $this->db->last_query();
		//_pa($admin);die;
	}

}
