<?php 
class Contact_model extends CI_Model
{
	public function getcount($table)
	{
	    return $this->db->count_all($table);
	}
	public function getpagination($table,$limit,$start)
	{
	    return $this->db->order_by('id','desc')->limit($limit,$start)->get($table)->result();
	}
}