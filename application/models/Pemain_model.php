<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain_model extends CI_Model
{
    public function get_all_pemain()
    {
      return $this->db->get('pemain')->result(); 
    }

    public function get_pemain($nik)
    {
      $this->db->where('nik', $nik);
      return $this->db->get('pemain')->row(); 
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

    public function update($nik, $data)
    {
      $this->db->where('nik', $nik);
      $this->db->update('pemain', $data); 
    }

    public function inqlastid()
	{   
       $query = $this->db->query('SELECT LAST_INSERT_ID() as lastid');
        
       $res = $query->row();
       return $res;

	}
}

?>