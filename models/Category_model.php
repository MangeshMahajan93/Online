<?php 
class category_model extends CI_Model
{
	public function getdata($table,$id)
	{
		return $this->db->order_by($id,'desc')->get($table)->result();
	}
	public function insert($table,$data)
	{
	   $this->db->insert($table,$data);
	}
	public function delete($table,$where)
	{
		$this->db->delete($table,$where);
	}
		public function getcount($table)
	{
		return $this->db->count_all($table);
	}
	public function getpagination($table,$limit,$start)
	{
		return $this->db->order_by('category_id','desc')->limit($limit,$start)->get('category')->result();
	}
	public function get_where($table,$where)
	{
		return $this->db->where($where)->get('category')->row();
	}
	public function update($table,$data,$id)
	{
		$this->db->update('category', $data,array('category_id'=>$id));
		return 1;
	}
    	
}