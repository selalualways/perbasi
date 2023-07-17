<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Klub_model extends CI_Model
{
    public function get_all_klub()
    {
      return $this->db->get('klub')->result(); 
    }

    public function get_klub($id_klub)
    {
      $this->db->where('id_klub', $id_klub);
      return $this->db->get('klub')->row(); 
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

    public function update($id_klub, $data)
    {
      $this->db->where('id_klub', $id_klub);
      $this->db->update('klub', $data); 
    }

    public function data_klub(){
      $this->db->select('*');
      $this->db->from('klub');

      return $this->db->get()->num_rows();
    }

    public function inqlastid()
	{   
       $query = $this->db->query('SELECT LAST_INSERT_ID() as lastid');
        
       $res = $query->row();
       return $res;

	}

  public function reset_logo($id_klub)
    {
      $data = array(
          'id_klub' => $id_klub,
          'logo' => NULL
      );
      
        if($this->db->update('klub', $data, array('id_klub' => $id_klub)))
        {
            return true;  
        }
    }

    public function reset_struktur($id_klub)
    {
      $data = array(
          'id_klub' => $id_klub,
          'struktur_pengurus' => NULL
      );
      
        if($this->db->update('klub', $data, array('id_klub' => $id_klub)))
        {
            return true;  
        }
    }
}

?>