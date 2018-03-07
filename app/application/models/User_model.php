<?php
class User_model extends CI_model{

	public function __construct(){

		parent::__construct();
		
		$this->load->database();
		//$this->load->library('database');

	}
	
	/*
	*@method: login_user
	*@params: $email{String}
	*@params: $pass{String}
	*@return: array of user | false(boolean)
	*/
	public function login_user($email,$pass){
 
		$this->db->select('user_id, user_email')
				->from('user')
				->where('user_email',$email)
				->where('user_password',SHA1($pass));

		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else{
			return false;
		}
	 
	 
	}
	

} // END Class: User_model

