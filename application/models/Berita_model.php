<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Berita_model extends CI_Model 
{
    public function getBerita()
	{
		$this->db->join('kategori', 'berita.id_kategori = kategori.id_kategori');
		$this->db->order_by('berita.id_berita','desc');
		$result = $this->db->get('berita');
		return $result;
	}                   
                        
}


/* End of file Berita_model.php and path \application\models\Berita_model.php */
