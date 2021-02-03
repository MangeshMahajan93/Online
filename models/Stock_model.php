<?php 
class stock_model extends CI_Model
{	
	public function insert($table,$data)
	{		
	   return $this->db->insert($table,$data);
	}
	public function get_where($table,$where)
	{
			return $this->db->where($where)->get($table)->row();
	}
	public function update($table,$data,$id)
	{
		$this->db->update($table, $data,array('stock_id'=>$id));
		return 1;
	}
	public function getcount($table)
	{
		return $this->db->count_all($table);
	} 
	public function getpagination($table,$limit,$start)
	{
	return $this->db->order_by('stock_id','desc')->limit($limit,$start)->get($table)->result();
	}
	public function get_pagination_search($table,$limit, $start,$text = NULL)
    {  	
    	if ($text == "NIL") $text = "";
    	$where = array('super_category_name'=>$text['super_category_name'],'category_name'=>$text['category_name'],'product_name'=>$text['product_name']);
    	return $this->db->where($where)		
		->limit($limit,$start)
		->get($table)->result();      
    }
    public function page_count_search($table,$text = NULL)
    {
    	if ($text == "NIL") $text = "";
    	$where = array('super_category_name'=>$text['super_category_name'],'category_name'=>$text['category_name'],'product_name'=>$text['product_name']);
    	return $this->db->where($where)
		->get($table)
        ->num_rows();
       
    }
		   	
}