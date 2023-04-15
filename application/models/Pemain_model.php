<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain_model extends CI_Model
{
public function get_all_pemain()
 {
   return $this->db->get('pemain')->result(); 
 }

 public function delete_pemain($nik)
 {
   $this->db->where('nik', $nik);
   $this->db->delete('pemain'); 
 }

 public function insert($data)
{
  $this->db->insert('Pemain', $data);
}
}

?>