<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){

		parent::__construct();
		
		$this->load->model('user_model');

	}
	
	public function index()
	{
		redirect('user/login');
	}
	
	/*
	* @method: login
	*/
	public function login(){
		
		$this->load->helper(array('form'));
		
		$this->load->helper('security');

        $this->load->library('form_validation');
		
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required',
				array('required' => 'You must provide a %s.')
		);
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("login");
		}
		else
		{
			/* $data = $this->security->xss_clean($data); */
			$email = $this->input->post('user_email', TRUE); // TRUE enables the xss filtering
			$password = $this->input->post('user_password', TRUE); // TRUE enables the xss filtering

			if( $userdata=$this->user_model->login_user($email,$password) ){
				
				$this->session->set_userdata(array('user_data'=>$userdata));
				
				redirect('contacts');
				
			}else{
				
				$this->session->set_flashdata('error_msg','Please enter valid Username/Password!');
				$this->load->view("login");
			}
			
		}
		
	}
	
	/*
	* @method: logout
	*/
	public function logout(){
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
		
		#$this->session->sess_destroy();
	
		redirect('user/login');
		
	}

} // END: class User