<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends CI_Controller 
{
	public function productBooking()
	{	      
	    if($this->input->post('BookingSubmit'))
		{
    		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required');		 
			$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|numeric|exact_length[10]|regex_match[^[7-9]\d{9}$^]',array('regex_match' => 'Mobile Number should be start with 7 or 8 or 9 with followed by 9 numeric numbers.'));
			$this->form_validation->set_rules('email_id', 'Email Id', 'required|valid_email');
			$this->form_validation->set_rules('aadhar_number', 'Aadhar Card', 'required|numeric|exact_length[12]');
			$this->form_validation->set_rules('start_date', 'Start Date', 'required');
			$this->form_validation->set_rules('end_date', 'End Date', 'required');
			$this->form_validation->set_rules('depositamount', 'Deposit Amount', 'required');
			
			$this->form_validation->set_rules('confirm', 'Booking confirmation', 'required');
			if ($this->form_validation->run() == FALSE)
                {                	
                }
                else
                {	
                    $todayDate = date('d/m/Y');
                    $bookingStartDate = date("d/m/Y", strtotime($this->input->post('start_date')));
                    $bookingEndDate = date("d/m/Y", strtotime($this->input->post('end_date')));
                    $rand = random_string('alnum', 7);
                	$bookingData=array(	
		            'booking_id'=>$rand,
            		'customer_name'=>$this->input->post('customer_name'),
					'mobile_number'=>$this->input->post('mobile_number'),
					'email_id'=>$this->input->post('email_id'),
					'aadhar_number'=>$this->input->post('aadhar_number'),
					'total'=>$this->input->post('allRowAmount'),
					'discount'=>$this->input->post('discount'),
					'discount_obtained_amount'=>$this->input->post('discountObtained'),					
					'deposit_amount'=>$this->input->post('depositamount'),
					'grand_total'=>$this->input->post('finalamount'),
					'booking_date'=>$todayDate,	
					'booking_start_date'=>$bookingStartDate,
					'booking_end_date'=>$bookingEndDate,
					'booking_status'=>"Active",
					'deposit_status'=>"Submitted"				
				);                	
                	$this->booking_model->insert('booking',$bookingData);  
                	$insertId = $rand;
                	$data['booking_last_insert_row'] = $this->booking_model->get_where('booking',array('booking_id'=>$insertId ));
                	$nm = $this->input->post('customer_name');
                	$mbl= $this->input->post('mobile_number');

                	$bk_nm = $data['booking_last_insert_row']->customer_name;
                	$bk_mbl= $data['booking_last_insert_row']->mobile_number;
                	if($nm === $bk_nm && $mbl === $bk_mbl)
                	{                		                	
                   		for($n=0; $n<7;$n++)
            			{
              $customer_name  = $this->input->post('customer_name');
              $mobile_number = $this->input->post('mobile_number');
               $email_id = $this->input->post('email_id');
               $aadhar_number = $this->input->post('aadhar_number');
               $start_date = $this->input->post('start_date');
               $end_date = $this->input->post('end_date');              
              $supercategoryName = $this->input->post('supercategoryName')[$n];
              $categoryName = $this->input->post('categoryName')[$n];
              $productName=$this->input->post('productName')[$n];
              $price = $this->input->post('price')[$n];
              $rentDuration = $this->input->post('rentDuration')[$n];
              $quantity = $this->input->post('quantity')[$n];
              $rowAmount = $this->input->post('rowAmount')[$n];
               

              if($supercategoryName!="" AND $categoryName!="" AND $productName!="" AND $price!="" AND $rentDuration!="" AND $quantity!="" AND $rowAmount!="")
                    {                    	
                    $insertData=array(		
                    	'booking_id'=>$insertId,
                    	'booking_date'=>$todayDate,
            		'customer_name'=>$customer_name,
						'mobile_number'=>$mobile_number,
						'email_id'=>$email_id,
						'aadhar_number'=>$aadhar_number,
						'booking_start_date'=>$start_date,
						'booking_end_date'=>$end_date,
                		'super_category_name'=>$supercategoryName,
						'category_name'=>$categoryName,
						'product_name'=>$productName,
						'rent_duration'=>$rentDuration,
						'quantity'=>$quantity,
						'rent_price'=>$price,
						'amount'=>$rowAmount						
						);
                 	$this->booking_model->insert('booking_details',$insertData); 
                 	$stockExists = $this->stock_model->get_where('stock',array('super_category_name'=>$supercategoryName,'category_name'=>$categoryName,'product_name'=>$productName,'rent_amount'=>$price));
                   
                    if($stockExists)
                    { 
                     $stockID = $stockExists->stock_id;
                     
                     $updatedQuantity = $stockExists->quantity - $quantity;                    
                    	$updateStock=array(		                    	
                		'super_category_name'=>$supercategoryName,
						'category_name'=>$categoryName,
						'product_name'=>$productName,	
						'rent_amount'=>$price,					
						'quantity'=> $updatedQuantity									
						); 
					
                 	$res=$this->stock_model->update('stock',$updateStock,$stockID);
                 	$this->session->set_flashdata('success_booking', 'Successfully Booking.');
                    }                 	      				
            		}			
            	} 
            	}
            	else
                	{
                		echo "Something get Wrong while booking";
                	}           			
            }              
		}	
		$data['super_category_result'] = $this->product_model->getdata('super_category','super_category_id');
		$data['page_name'] = 'products_booking';				
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
		// $option2.= '<option value="">--Select--</option>';
        foreach ($product_result as $product) 
        { 	
        	 //  <!-- IMP FOR DROP DOWN START -->
     	     // $option2 .= "<option value='$product->product_price'>$product->product_price</option>";
     		// <!-- IMP FOR DROP DOWN END -->
     		 //  <!-- IMP FOR INPUT FIELD START -->
     		$option2 .= $product->product_rent_price;
     	 //  <!-- IMP FOR INPUT FIELD END -->
        }		
 		echo $option2;
	}	

	public function getQuantity()
	{		
		$getSuperCategoryName=$this->input->post('SuperCategory');
		$getCategoryName=$this->input->post('category');
		$getProductName=$this->input->post('product');
		
		
		$k=$this->input->post('k');
		$stock_result= $this->booking_model->get_where_result('stock',array('super_category_name'=>$getSuperCategoryName,'category_name'=>$getCategoryName,'product_name'=>$getProductName));
		
		$option3="";
		// $option2.= '<option value="">--Select--</option>';
        foreach ($stock_result as $stock) 
        { 	
        	 //  <!-- IMP FOR DROP DOWN START -->
     	     // $option2 .= "<option value='$product->product_price'>$product->product_price</option>";
     		// <!-- IMP FOR DROP DOWN END -->
     		 //  <!-- IMP FOR INPUT FIELD START -->
     		$option3 .= $stock->quantity;
     	 //  <!-- IMP FOR INPUT FIELD END -->
        }		
 		if($option3 !=0)
 		{
 			$option3;
 		}
 		else
 		{
 			$option3 =0;
 		}
 		echo $option3; 		
	}		
	public function manageBooking()
	{
		$config['base_url'] = base_url('booking/manageBooking/');
				$config['total_rows'] = $this->booking_model->getcount('booking');
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
	        	
	          	$data['page_name'] = 'booking_list';
				
				$data['result'] = $this->booking_model->getpagination('booking',$config['per_page'],$start_index);
				
				 $this->load->view('layouts/design',$data);
	}
	public function viewBookingDetails($id)
	{
		$booking_id = base64_decode($id);
		$data['booking_result'] = $this->booking_model->get_where('booking',array('booking_id'=>$booking_id));
		
		$data['booking_details_result'] = $this->booking_model->get_where_result('booking_details',array('booking_id'=>$booking_id));
		$data['page_name'] = 'booking_details_list';
		$this->load->view('layouts/design',$data);
	}
	public function changeStatus($id)
	{
		$booking_id = base64_decode($id);
		$booking_status = $this->booking_model->get_where('booking',array('booking_id'=>$booking_id));
		$bookingStatus = $booking_status->booking_status;						
		$updateStatus=array('booking_status'=>"Success",'deposit_status'=>"Refunded",'booking_success_date'=>date("Y-m-d H:i:s"));
		$res_status=$this->booking_model->update('booking',$updateStatus,$booking_id);
		if($res_status)
			{
				$booking_result = $this->booking_model->get_where('booking',array('booking_id'=>$booking_id));		
				$booking_details_result = $this->booking_model->get_where_result('booking_details',array('booking_id'=>$booking_id));
				foreach ($booking_details_result as $value) 
				{					
				   $super_category = $value->super_category_name;
				   $category = $value->category_name;
				   $product = $value->product_name;
				   $rent_price = $value->rent_price;
				   $quantity = $value->quantity;
				
				$stockExists = $this->stock_model->get_where('stock',array('super_category_name'=>$super_category,'category_name'=>$category,'product_name'=>$product,'rent_amount'=>$rent_price));

				$stockID = $stockExists->stock_id;
				$ExistsQuantity = $stockExists->quantity; 
				$updateQuantity = $ExistsQuantity + $quantity; 				       
            	$updateStockQty=array(		                    	
    			// 'super_category_name'=>$supercategoryName,
				// 'category_name'=>$categoryName,
				// 'product_name'=>$productName,	
				// 'rent_amount'=>$price,					
				'quantity'=> $updateQuantity									
				);                 	
         	$res=$this->stock_model->update('stock',$updateStockQty,$stockID);			
				}				
			$this->session->set_flashdata('success', 'Booking Status Successfully Updated.');
			}
		else
			{
				$this->session->set_flashdata('error', 'some thing went wrong!');	
			}
		redirect(base_url('booking/manageBooking'));
	}
}