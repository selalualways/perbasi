<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Klub_model extends CI_Model
{
public function get_all_klub()
 {
   return $this->db->get('klub')->result(); 
 }

}

?>