<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain_model extends CI_Model
{
    public function get_all_pemain()
    {
      $this->db->select('*');
      $this->db->from('pemain');
      $this->db->join('klub','klub.id_klub = pemain.id_klub');

      return $this->db->get()->result();
    }

    public function get_all_pemain_by_klub($id_klub)
    {
      $this->db->select('*');
      $this->db->from('pemain');
      $this->db->join('klub','klub.id_klub = pemain.id_klub');
      $this->db->where('pemain.id_klub', $id_klub);

      return $this->db->get()->result();
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

    public function data_pemain(){
      $this->db->select('*');
      $this->db->from('pemain');

      return $this->db->get()->num_rows();
    }

    public function reset_foto($nik)
    {
      $data = array(
          'nik' => $nik,
          'foto_pemain' => NULL
      );
      
        if($this->db->update('pemain', $data, array('nik' => $nik)))
        {
            return true;  
        }
    }
  
}

?>