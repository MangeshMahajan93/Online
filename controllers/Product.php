<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller 
{
	public function products()
	{		
		$config['base_url'] = base_url('product/products/');
				$config['total_rows'] = $this->product_model->getcount('product');
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
	        	
	          	$data['page_name'] = 'product_list';
				
				$data['result'] = $this->product_model->getpagination('product',$config['per_page'],$start_index);
				
				 $this->load->view('layouts/design',$data);
	}
	public function editproduct($id)
	{	
		
		$id = base64_decode($id);
		if($this->input->post('productUpdate'))
		{				
			$imgNames = $this->product_model->get_where('product',array('product_id'=>$id ));
			$oldImg1 = $imgNames->product_image1;
			$oldImg2 = $imgNames->product_image2;
			$oldImg3 = $imgNames->product_image3;
			$oldImg4 = $imgNames->product_image4;
		
			$this->form_validation->set_rules('supercategoryName', 'Super Product Name', 'required');
			$this->form_validation->set_rules('categoryName', 'Category Name', 'required');
			$this->form_validation->set_rules('productName', 'Product Name', 'required');

			$this->form_validation->set_rules('productDescription', 'Product Description', 'required');
			// $this->form_validation->set_rules('image1', 'Image 1', 'required');
			// $this->form_validation->set_rules('image2', 'Image 2', 'required');
			// $this->form_validation->set_rules('image3', 'Image 3', 'required');
			// $this->form_validation->set_rules('image4', 'Image 4', 'required');

// 			if (empty($_FILES['image1']['name']))
// {
//     //$this->form_validation->set_rules('image1', 'Image 1', 'required');
//     $insertData['product_image1']= $oldImg1;
    
   
// }

// if (empty($_FILES['image2']['name']))
// {
//     //$this->form_validation->set_rules('image2', 'Image 2', 'required');
//     $insertData['product_image1']= $oldImg2;
   

// }

// if (empty($_FILES['image3']['name']))
// {
//     //$this->form_validation->set_rules('image3', 'Image 3', 'required');
//     $insertData['product_image1']= $oldImg3;


// }

// if (empty($_FILES['image4']['name']))
// {
//     //$this->form_validation->set_rules('image4', 'Image 4', 'required');
//     $insertData['product_image1']= $oldImg4;   
// }
	

			$this->form_validation->set_rules('productTechSpec', 'Product Technical Specification', 'required');
			$this->form_validation->set_rules('productFeatures', 'Product Features', 'required');
			$this->form_validation->set_rules('productRentPrice', 'Product Price', 'required');
					
			if ($this->form_validation->run() == FALSE)
                {
                       //IF NOT GET VALIDATED.
                }
                else
                {

            if($_FILES["image1"]["name"])
			{
				unlink(FCPATH .'assets/uploads/' . $oldImg1);
				$Img1= $this->uploadimage('image1');
			}
			else
			{	
				$Img1= $oldImg1;

			}

			if($_FILES["image2"]["name"])
			{
				unlink(FCPATH .'assets/uploads/' . $oldImg2);
				$Img2= $this->uploadimage('image2');
			}
			else
			{	
				$Img2= $oldImg2;

			}


			if($_FILES["image3"]["name"])
			{
				unlink(FCPATH .'assets/uploads/' . $oldImg3);
				$Img3= $this->uploadimage('image3');
			}
			else
			{	
				$Img3= $oldImg3;

			}

			if($_FILES["image4"]["name"])
			{
				unlink(FCPATH .'assets/uploads/' . $oldImg4);
				$Img4= $this->uploadimage('image4');
			}
			else
			{	
				$Img4= $oldImg4;

			}

			$updateData=array(			
                		'super_category_name'=>$this->input->post('supercategoryName'),
						'category_name'=>$this->input->post('categoryName'),
						'product_name'=>$this->input->post('productName'),

						'product_description'=>$this->input->post('productDescription'),
						'product_technical_specification'=>$this->input->post('productTechSpec'),

						'product_features'=>$this->input->post('productFeatures'),
						'product_rent_price'=>$this->input->post('productRentPrice')									
						);

            	$updateData['product_image1']=$Img1;	
				$updateData['product_image2']=$Img2;	
				$updateData['product_image3']=$Img3;	
				$updateData['product_image4']=$Img4;   	
			
                	$res=$this->product_model->update('product',$updateData,$id);

					if($res)
					{
						$this->session->set_flashdata('success', 'product Successfully Updated.');
						redirect(base_url('product/products'));
					}
					else
					{
						$this->session->set_flashdata('error', 'some thing went wrong!');	
					}
				
                }			
		}
		$data['super_category_result'] = $this->product_model->getdata('super_category','super_category_id');
		$data['category_result'] = $this->product_model->getdata('category','category_id');		
		$data['result'] = $this->product_model->get_where('product',array('product_id'=>$id ));
		$data['page_name'] = 'edit_product';
		$data['title_of_page'] = 'product';		
		$this->load->view('layouts/design',$data);	
	}
		public function addproduct()
	{		
		if($this->input->post('productSubmit'))
		{
			$this->form_validation->set_rules('supercategoryName', 'Super Product Name', 'required');
			$this->form_validation->set_rules('categoryName', 'Category Name', 'required');
			$this->form_validation->set_rules('productName', 'Product Name', 'required|is_unique[product.product_name]', array(
                               'is_unique'     => 'This %s is already exists.'
        ));

			$this->form_validation->set_rules('productDescription', 'Product Description', 'required');
			// $this->form_validation->set_rules('image1', 'Image 1', 'required');
			// $this->form_validation->set_rules('image2', 'Image 2', 'required');
			// $this->form_validation->set_rules('image3', 'Image 3', 'required');
			// $this->form_validation->set_rules('image4', 'Image 4', 'required');
			if (empty($_FILES['image1']['name']))
{
    $this->form_validation->set_rules('image1', 'Image 1', 'required');
    
   
}

if (empty($_FILES['image2']['name']))
{
    $this->form_validation->set_rules('image2', 'Image 2', 'required');
   

}

if (empty($_FILES['image3']['name']))
{
    $this->form_validation->set_rules('image3', 'Image 3', 'required');


}

if (empty($_FILES['image4']['name']))
{
    $this->form_validation->set_rules('image4', 'Image 4', 'required');   
}

			$this->form_validation->set_rules('productTechSpec', 'Product Technical Specification', 'required');
			$this->form_validation->set_rules('productFeatures', 'Product Features', 'required');
			$this->form_validation->set_rules('productRentPrice', 'Product Price', 'required');
					
			if ($this->form_validation->run() == FALSE)
                {
                       //IF NOT GET VALIDATED.
                }
                else
                {

                	if($_FILES["image1"]["name"])
			{
				$Img1= $this->uploadimage('image1');
			}

			if($_FILES["image2"]["name"])
			{
				$Img2= $this->uploadimage('image2');
			}


			if($_FILES["image3"]["name"])
			{
				$Img3= $this->uploadimage('image3');
			}

			if($_FILES["image4"]["name"])
			{
				$Img4= $this->uploadimage('image4');
			}



                	$insertData=array(			
                		'super_category_name'=>$this->input->post('supercategoryName'),
						'category_name'=>$this->input->post('categoryName'),
						'product_name'=>$this->input->post('productName'),

						'product_description'=>$this->input->post('productDescription'),
						'product_technical_specification'=>$this->input->post('productTechSpec'),

						//'product_image1'=>$_FILES['image1']['name'],
						// 'product_image2'=>$_FILES['image2']['name'],
						// 'product_image3'=>$_FILES['image3']['name'],
						// 'product_image4'=>$_FILES['image4']['name'],
						'product_features'=>$this->input->post('productFeatures'),
						'product_rent_price'=>$this->input->post('productRentPrice')								
						);
                	if($_FILES["image1"]["name"])
						{
							$insertData['product_image1']=$Img1;				
						}
						if($_FILES["image2"]["name"])
						{
							$insertData['product_image2']=$Img2;				
						}
						if($_FILES["image3"]["name"])
						{
							$insertData['product_image3']=$Img3;				
						}
						if($_FILES["image4"]["name"])
						{
							$insertData['product_image4']=$Img4;				
						}
			     //   echo"<pre>";
			     //   print_r($insertData);
			        
			     //   echo"<pre>";
			     //   print_r($_POST);
			        
			     //   die();
                	$this->product_model->insert('product',$insertData);

				if($this->db->insert_id())
				{
					$this->session->set_flashdata('success', 'Product Successfully Added.');	
					redirect(base_url('product/products'));		
				}
				else
				{
					$this->session->set_flashdata('error', 'Some thing went wrong!');	
				}

                }			
		}
		$data['super_category_result'] = $this->product_model->getdata('super_category','super_category_id');
		// $data['category_result'] = $this->product_model->getdata('category','category_id');		
		$data['page_name'] = 'add_product';
		$data['title_of_page'] = 'product';		
		$this->load->view('layouts/design',$data);	
	}
	public function getCategoryBySupercategory()
	{
		
		$getCategoryName=$this->input->post('selected');

		$category_result= $this->product_model->get_where_result('category',array('super_category_name'=>$getCategoryName));		
		$option="";
				$option.= '<option value="">--Select--</option>';
				            foreach ($category_result as $category) 
				            { 			  
			             $option .= "<option value='$category->category_name'>$category->category_name</option>";
				            }			   
				
 echo $option;
	}
	public function delete($id)
	{
		$this->product_model->delete('product',array('product_id'=>$id));	
		$this->session->set_flashdata('delete_success', 'product Successfully Deleted.');		
		redirect(base_url('product/products'));
	}
	public function uploadimage($filedname)
		{
			$config['upload_path']          = FCPATH .'assets/uploads/';
			$config['allowed_types']        = '*';
			//$config['allowed_types']        = 'gif|jpg|png';
			// $config['max_size']             = 50000;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

				if ( ! $this->upload->do_upload($filedname))
				{
					return array($this->upload->display_errors());
				}
				else
				{
				$data =  $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = FCPATH .'assets/uploads/'.$data['file_name'];
				// $config['new_image'] = FCPATH .'assets/uploads/thumb/'.$data['file_name'];
				$config['maintain_ratio'] = TRUE;
				// $config['width']         = 300;
				// $config['height']       = 100;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				return $data['file_name'];
			}
			die;
		}	
}
