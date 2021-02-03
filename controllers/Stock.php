<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller 
{
	public function addStock()
	{		
		if($this->input->post('stockSubmit'))
		{			
			for($n=0; $n<7;$n++)
            	{                           
              $supercategoryName = $this->input->post('supercategoryName')[$n];
              $categoryName = $this->input->post('categoryName')[$n];
              $productName=$this->input->post('productName')[$n];
              $price = $this->input->post('price')[$n];             
              $quantity = $this->input->post('quantity')[$n];
             

              if($supercategoryName!="" AND $categoryName!="" AND $productName!="" AND $price!="" AND $quantity!="")
                    {

                     $stockExists = $this->stock_model->get_where('stock',array('super_category_name'=>$supercategoryName,'category_name'=>$categoryName,'product_name'=>$productName,'rent_amount'=>$price));

                    if($stockExists)
                    {
                     $stockID = $stockExists->stock_id;
                     $updatedQuantity = $stockExists->quantity + $quantity;                    
                    	$updateStock=array(		                    	
                		'super_category_name'=>$supercategoryName,
						'category_name'=>$categoryName,
						'product_name'=>$productName,	
						'rent_amount'=>$price,					
						'quantity'=> $updatedQuantity									
						);                 	
                 	$res=$this->stock_model->update('stock',$updateStock,$stockID);
                 	$this->session->set_flashdata('success_stock', 'Successfully Updated Stock.');
                    }
                    else
                    {
                    	$insertStock=array(		                    	
                		'super_category_name'=>$supercategoryName,
						'category_name'=>$categoryName,
						'product_name'=>$productName,	
						'rent_amount'=>$price,					
						'quantity'=>$quantity						
											
						);
                 	$this->stock_model->insert('stock',$insertStock); 
                 	$this->session->set_flashdata('success_stock', 'Successfully Added Stock.');
                    }
          }			
            	}            	
            	          			
                       
		}	
		$data['super_category_result'] = $this->product_model->getdata('super_category','super_category_id');
		$data['page_name'] = 'stockAdd';				
		$this->load->view('layouts/design',$data);
	}
	public function getCategory()
	{	
		$getSuperCategoryName=$this->input->post('SuperCategory');
		$k=$this->input->post('k');
		$supercategory_result= $this->product_model->get_where_result('category',array('super_category_name'=>$getSuperCategoryName));		
		$option="";
		$option.= '<option value="">--Select--</option>';
        foreach ($supercategory_result as $supercategory) 
        { 			  
     		$option .= "<option value='$supercategory->category_name'>$supercategory->category_name</option>";
        }		
 		echo $option;

	}

		public function getProduct()
	{
		
		$getSuperCategoryName=$this->input->post('SuperCategory');
		$getCategoryName=$this->input->post('category');
		$k=$this->input->post('k');
		$category_result= $this->product_model->get_where_result('product',array('super_category_name'=>$getSuperCategoryName,'category_name'=>$getCategoryName));
			
		$option1="";
		$option1.= '<option value="">--Select--</option>';
        foreach ($category_result as $category) 
        { 			  
     		$option1 .= "<option value='$category->product_name'>$category->product_name</option>";
        }		
 		echo $option1;
	}	

	
	public function getPrice()
	{		
		$getSuperCategoryName=$this->input->post('SuperCategory');
		$getCategoryName=$this->input->post('category');
		$getProductName=$this->input->post('product');
		
		$k=$this->input->post('k');
		$product_result= $this->product_model->get_where_result('product',array('super_category_name'=>$getSuperCategoryName,'category_name'=>$getCategoryName,'product_name'=>$getProductName));
		
		$option2="";		
        foreach ($product_result as $product) 
        { 	
        	
     		$option2 .= $product->product_rent_price;
     	 
        }		
 		echo $option2;
	}		
		public function stockReport()
	{
				$config['base_url'] = base_url('stock/stockReport/');
				$config['total_rows'] = $this->stock_model->getcount('stock');
				$config['per_page'] = 7;
			 	$config['full_tag_open'] = "<ul class='pagination'>";
			    $config['full_tag_close'] = '</ul>';
			    $config['num_tag_open'] = '<li>';
			    $config['num_tag_close'] = '</li>';
			    $config['cur_tag_open'] = '<li class="active"><a href="#">';
			    $config['cur_tag_close'] = '</a></li>';
			    $config['prev_tag_open'] = '<li>';
			    $config['prev_tag_close'] = '</li>';
			    $config['first_tag_open'] = '<li>';
			    $config['first_tag_close'] = '</li>';
			    $config['last_tag_open'] = '<li>';
			    $config['last_tag_close'] = '</li>';

			    $config['prev_link'] = 'Previous Page';
			    $config['prev_tag_open'] = '<li>';
			    $config['prev_tag_close'] = '</li>';
			    $config['next_link'] = 'Next Page';
			    $config['next_tag_open'] = '<li>';
			    $config['next_tag_close'] = '</li>';
				$this->pagination->initialize($config);
	        	$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

	        	// IMP START.
	        	$data['start'] = $start_index+1;
	        	$data['end'] = $start_index + $config['per_page'];
	            $data['totalEntries']= $config['total_rows'];
	        	// IMP END.	        	
	        	$data['super_category_result'] = $this->product_model->getdata('super_category','super_category_id');
	          	$data['page_name'] = 'stockReport_list';
				
				$data['result'] = $this->stock_model->getpagination('stock',$config['per_page'],$start_index);
				
				 $this->load->view('layouts/design',$data);
	}

	public function filterStock()
	{
		$search = ($this->input->post('Filter'))? $this->input->post('Filter'): "NIL";
		$SuperCategory = $this->input->post('supercategoryName');
		$categoryName = $this->input->post('categoryName');
		$productName = $this->input->post('productName');
		   $filter = array('super_category_name'=>$SuperCategory,'category_name'=>$categoryName,'product_name'=>$productName);
		
		$search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
		$config['base_url'] = base_url('stock/filterStock/'.$search);
		$config['total_rows'] = $this->stock_model->page_count_search('stock',$filter);
	
		//$config['base_url'] = base_url('stock/stockReport/');
				//$config['total_rows'] = $this->stock_model->getcount('stock');
				$config['per_page'] = 7;
			 	$config['full_tag_open'] = "<ul class='pagination'>";
			    $config['full_tag_close'] = '</ul>';
			    $config['num_tag_open'] = '<li>';
			    $config['num_tag_close'] = '</li>';
			    $config['cur_tag_open'] = '<li class="active"><a href="#">';
			    $config['cur_tag_close'] = '</a></li>';
			    $config['prev_tag_open'] = '<li>';
			    $config['prev_tag_close'] = '</li>';
			    $config['first_tag_open'] = '<li>';
			    $config['first_tag_close'] = '</li>';
			    $config['last_tag_open'] = '<li>';
			    $config['last_tag_close'] = '</li>';

			    $config['prev_link'] = 'Previous Page';
			    $config['prev_tag_open'] = '<li>';
			    $config['prev_tag_close'] = '</li>';


			    $config['next_link'] = 'Next Page';
			    $config['next_tag_open'] = '<li>';
			    $config['next_tag_close'] = '</li>';
				$this->pagination->initialize($config);
	        	$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

	        	// IMP START.
	        	$data['start'] = $start_index+1;
	        	$data['end'] = $start_index + $config['per_page'];
	            $data['totalEntries']= $config['total_rows'];
	        	// IMP END.
	        	
	        	$data['super_category_result'] = $this->product_model->getdata('super_category','super_category_id');
	          	$data['page_name'] = 'stockReport_list';
				
				//$data['result'] = $this->stock_model->getpagination('stock',$config['per_page'],$start_index);

				$data['result'] = $this->stock_model->get_pagination_search('stock',$config['per_page'], $data['page_name'], $filter);

				 $this->load->view('layouts/design',$data);
	}

}
