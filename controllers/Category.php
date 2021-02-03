<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller 
{
	public function categories()
	{		
		$config['base_url'] = base_url('category/categories/');
				$config['total_rows'] = $this->category_model->getcount('category');
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
	        	
	          	$data['page_name'] = 'category_list';
				
				$data['result'] = $this->category_model->getpagination('category',$config['per_page'],$start_index);
				
				 $this->load->view('layouts/design',$data);
	}
	public function editcategory($id)
	{		

		$id = base64_decode($id);
		if($this->input->post('categoryUpdate'))
		{	
			$this->form_validation->set_rules('supercategoryName', 'Super Category Name', 'required');
			$this->form_validation->set_rules('categoryName', 'Category Name', 'required');
			$this->form_validation->set_rules('categoryDescription', 'Category Description', 'required');
			
			if ($this->form_validation->run() == FALSE)
                {
                       //IF NOT GET VALIDATED.
                }
                else
                {
                	$updateData=array(			
                		'super_category_name'=>$this->input->post('supercategoryName'),
						'category_name'=>$this->input->post('categoryName'),
						'category_description'=>$this->input->post('categoryDescription')				
						);

                	$res=$this->category_model->update('category',$updateData,$id);

					if($res)
					{
						$this->session->set_flashdata('success', 'Category Successfully Updated.');
						redirect(base_url('category/categories'));
					}
					else
					{
						$this->session->set_flashdata('error', 'some thing went wrong!');	
					}
				
                }			
		}
		$data['super_category_result'] = $this->category_model->getdata('super_category','super_category_id');
		$data['result'] = $this->category_model->get_where('category',array('category_id'=>$id));
		$data['page_name'] = 'edit_category';
		$data['title_of_page'] = 'Category';		
		$this->load->view('layouts/design',$data);	
	}
		public function addcategory()
	{		
		if($this->input->post('categorySubmit'))
		{
			$this->form_validation->set_rules('supercategoryName', 'Super Category Name', 'required');
			$this->form_validation->set_rules('categoryName', 'Category Name', 'required');
			$this->form_validation->set_rules('categoryDescription', 'Category Description', 'required');
			
			if ($this->form_validation->run() == FALSE)
                {
                       //IF NOT GET VALIDATED.
                }
                else
                {
                	$insertData=array(			
                		'super_category_name'=>$this->input->post('supercategoryName'),
						'category_name'=>$this->input->post('categoryName'),
						'category_description'=>$this->input->post('categoryDescription')				
						);
                	$this->category_model->insert('category',$insertData);

				if($this->db->insert_id())
				{
					$this->session->set_flashdata('success', 'Category Successfully Added.');	
					redirect(base_url('category/categories'));		
				}
				else
				{
					$this->session->set_flashdata('error', 'Some thing went wrong!');	
				}

                }			
		}
		$data['super_category_result'] = $this->category_model->getdata('super_category','super_category_id');
		$data['page_name'] = 'add_category';
		$data['title_of_page'] = 'Category';		
		$this->load->view('layouts/design',$data);	
	}
	public function delete($id)
	{
		$this->category_model->delete('category',array('category_id'=>$id));	
		$this->session->set_flashdata('delete_success', 'Category Successfully Deleted.');		
		redirect(base_url('category/categories'));
	}
	
}
