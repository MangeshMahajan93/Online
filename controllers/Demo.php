<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

	public function index()
	{		
		$data['page_name'] = 'demo';
		$data['title_of_page'] = 'Demo Page.';		
		$this->load->view('layouts/design',$data);	
	}
}
