<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function get_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}