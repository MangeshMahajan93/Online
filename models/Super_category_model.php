<?php 
class Super_category_model extends CI_Model
{
	public function getdata($table)
	{
		return $this->db->order_by('super_category_id','desc')->get('super_category')->result();
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
	return $this->db->order_by('super_category_id','desc')->limit($limit,$start)->get('super_category')->result();
	}
	public function get_where($table,$where)
	{
			return $this->db->where($where)->get('super_category')->row();
	}
		public function update($table,$data,$id){
		$this->db->update('super_category', $data,array('super_category_id'=>$id));
		return 1;
	}
    	
}