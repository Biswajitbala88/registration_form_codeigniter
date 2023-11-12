<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	 
	 
	 
	 
	 
	 
	 
	 
	
		public function get_user_details()
		{
			$query = $this->db->query("SELECT * from users");
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
		public function getuser_details($id)
		{
			$query = $this->db->query("SELECT * from users where user_id='$id'");
			if($query->num_rows() >= 1)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
		public function user_logIn($phone,$password)
		{
			$query = $this->db->query("SELECT * from members where member_phone=$phone and member_password=$password");
			if($query->num_rows() >= 1)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
	
	
	
	
}
