<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wasit_model extends CI_Model
{
    public function get_all_wasit()
    {
      return $this->db->get('wasit')->result(); 
    }

    public function get_wasit($nik)
    {
      $this->db->where('nik', $nik);
      return $this->db->get('wasit')->row(); 
    }

    public function delete_wasit($nik)
    {
      $this->db->where('nik', $nik);
      $this->db->delete('wasit'); 
    }

    public function insert($data)
    {
      $this->db->insert('Wasit', $data);
    }

    public function update($nik, $data)
    {
      $this->db->where('nik', $nik);
      $this->db->update('wasit', $data); 
    }
}

?>