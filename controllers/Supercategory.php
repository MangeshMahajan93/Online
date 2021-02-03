<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supercategory extends CI_Controller 
{
	public function super_categories()
	{		
		$config['base_url'] = base_url('supercategory/super_categories/');
				$config['total_rows'] = $this->super_category_model->getcount('super_category');
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
	        	
	          	$data['page_name'] = 'super_category_list';
				
				$data['result'] = $this->super_category_model->getpagination('super_category',$config['per_page'],$start_index);
				
				 $this->load->view('layouts/design',$data);
	
}
	public function editSuperCategory($id)
	{		
		$id = base64_decode($id);
		if($this->input->post('superCategoryUpdate'))
		{
			$this->form_validation->set_rules('supercategoryName', 'Super Category Name', 'required');
			$this->form_validation->set_rules('supercategoryDescription', 'Super Category Description', 'required');
			
			if ($this->form_validation->run() == FALSE)
                {
                       //IF NOT GET VALIDATED.
                }
                else
                {
                	$updateData=array(			
						'super_category_name'=>$this->input->post('supercategoryName'),
						'super_category_description'=>$this->input->post('supercategoryDescription')				
						);
                	//$this->super_category_model->update('super_category',$updateData,$id);
                	$res=$this->super_category_model->update('super_category',$updateData,$id);

					if($res)
					{
						$this->session->set_flashdata('success', 'Super Category Successfully Updated.');
						redirect(base_url('supercategory/super_categories'));
					}else
					{
						$this->session->set_flashdata('error', 'some thing went wrong!');	
					}
				
                }			
		}
		$data['result'] = $this->super_category_model->get_where('super_category',array('super_category_id'=>$id ));
		$data['page_name'] = 'edit_super_category';
		$data['title_of_page'] = 'Super Category';		
		$this->load->view('layouts/design',$data);	
	}
		public function addSuperCategory()
	{		
		if($this->input->post('superCategorySubmit'))
		{
			$this->form_validation->set_rules('supercategoryName', 'Super Category Name', 'required|trim');
			$this->form_validation->set_rules('supercategoryDescription', 'Super Category Description', 'required|trim');
			
			if ($this->form_validation->run() == FALSE)
                {
                       //IF NOT GET VALIDATED.
                }
                else
                {
                	$insertData=array(			
						'super_category_name'=>$this->input->post('supercategoryName'),
						'super_category_description'=>$this->input->post('supercategoryDescription')				
						);
                	$this->super_category_model->insert('super_category',$insertData);

				if($this->db->insert_id())
				{
					$this->session->set_flashdata('success', 'Super Category Successfully Added.');	
					redirect(base_url('supercategory/super_categories'));		
				}
				else
				{
					$this->session->set_flashdata('error', 'Some thing went wrong!');	
				}

                }			
		}
		$data['page_name'] = 'add_super_category';
		$data['title_of_page'] = 'Super Category';		
		$this->load->view('layouts/design',$data);	
	}
	public function delete($id)
	{
		$this->super_category_model->delete('super_category',array('super_category_id'=>$id));	
		$this->session->set_flashdata('delete_success', 'Super Category Successfully Deleted.');		
		redirect(base_url('supercategory/super_categories'));
	}
	
}
