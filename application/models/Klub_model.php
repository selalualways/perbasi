<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Klub_model extends CI_Model
{
public function get_all_klub()
 {
   return $this->db->get('klub')->result(); 
 }

 public function delete_klub($id_klub)
 {
   $this->db->where('id_klub', $id_klub);
   $this->db->delete('klub'); 
 }

 public function insert($data)
{
  $this->db->insert('Klub', $data);
}
}

?>