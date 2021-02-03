<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }
	    public function admin_auth()
     {

        if (isset($_POST['authenticateAdmin']))
         {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == true)
             {
                 $email = $this->input->post('email');
                 $password = $this->input->post('password');
            

                $res = $this->login_model->admin_auth($email, $password);
               // $res['data'] = $this->login_model->admin_auth($username,$password);
                // print_r($res['data']);
                if (!empty($res))
                {
                   $data = array(
                    'admin_login' => true,
                    // 'is_user' => true,                       
                    'Email' => $res->emailID,
                    
                    );
                    $this->session->set_userdata($data);
                    redirect(base_url() . 'supercategory/super_categories');
                } 
                else 
                {
                    $this->session->set_flashdata('error', 'Sorry....! The Email ID or Password is invalid. Please try again');
                    
                   // redirect(base_url('Login_Controller/admin_auth'));
                }
               
            } 
            else 
            {
               
            // redirect(base_url('Login_Controller/admin_auth'));
            }
        }

          
        $this->load->view('admin_login');  
    }

public function logout()
	 {
		$data = array(
			'Email' => ''
		);
		// $this->session->set_userdata($data);
		$this->session->sess_destroy($data);
		redirect('login/admin_auth');
	}


}
