<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatih_model extends CI_Model
{
    public function get_all_pelatih()
    {
      return $this->db->get('pelatih')->result(); 
    }

    public function get_pelatih($nik)
    {
      $this->db->where('nik', $nik);
      return $this->db->get('pelatih')->row(); 
    }

    public function delete_pelatih($nik)
    {
      $this->db->where('nik', $nik);
      $this->db->delete('pelatih'); 
    }

    public function insert($data)
    {
      $this->db->insert('Pelatih', $data);
    }

    public function update($nik, $data)
    {
      $this->db->where('nik', $nik);
      $this->db->update('pelatih', $data); 
    }

    public function data_pelatih(){
      $this->db->select('*');
      $this->db->from('pelatih');

      return $this->db->get()->num_rows();
    }
}

?>