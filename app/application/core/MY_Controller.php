<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function is_logged_in()
    {
        $user = $this->session->userdata('user_data');
        return isset($user);
    }
	
	public function get_csrf_token(){
		
		$token_name = $this->security->get_csrf_token_name();
		$token_hash = $this->security->get_csrf_hash();
		
		return array('token_name'=>$token_name, 'token_hash'=>$token_hash);
		
	}
	
	
}