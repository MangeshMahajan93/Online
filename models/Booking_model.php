<?php 
class booking_model extends CI_Model
{	
	public function insert($table,$data)
	{		
	   return $this->db->insert($table,$data);
	}

	public function get_where($table,$where)
	{
			return $this->db->where($where)->get($table)->row();
	}
	public function get_where_result($table,$where)
	{
			return $this->db->where($where)->get($table)->result();
	}
	public function getpagination($table,$limit,$start)
	{
	return $this->db->order_by('booking_id','desc')->limit($limit,$start)->get($table)->result();
	}
	public function getcount($table)
	{
		return $this->db->count_all($table);
	}   
	public function update($table,$updateStatus,$booking_id)
	{
		$this->db->update($table, $updateStatus,array('booking_id'=>$booking_id));
		return 1;
	}
	
}