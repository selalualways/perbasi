<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public function get_all_berita()
    {
      $this->db->order_by('tanggal', 'desc');
      return $this->db->get('berita')->result(); 
    }

    public function get_berita($id_berita)
    {
      $this->db->where('id_berita', $id_berita);
      return $this->db->get('berita')->row(); 
    }

    public function get_berita_slug($slug)
    {
      $this->db->where('slug', $slug);
      return $this->db->get('berita')->row(); 
    }

    public function delete_berita($id_berita)
    {
      $this->db->where('id_berita', $id_berita);
      $this->db->delete('berita'); 
    }

    public function insert($data)
    {
      $this->db->insert('Berita', $data);
    }

    public function update($id_berita, $data)
    {
      $this->db->where('id_berita', $id_berita);
      $this->db->update('berita', $data); 
    }

    public function inqlastid()
	{   
       $query = $this->db->query('SELECT LAST_INSERT_ID() as lastid');
        
       $res = $query->row();
       return $res;

	}
}


?>