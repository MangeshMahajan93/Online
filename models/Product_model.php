<?php 
class product_model extends CI_Model
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
	return $this->db->order_by('product_id','desc')->limit($limit,$start)->get('product')->result();
	}
	public function get_where($table,$where)
	{
			return $this->db->where($where)->get('product')->row();
	}
	public function update($table,$data,$id)
	{
		$this->db->update('product', $data,array('product_id'=>$id));
		return 1;
	}
	public function get_where_result($table,$where)
	{
			return $this->db->where($where)->get($table)->result();
	}
	    	
}