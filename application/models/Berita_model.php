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
	
	public function insertBerita()
	{
        $insert = array(
            'id_kategori' => $this->input->post('id_kategori'),
			'judul_berita' => $this->input->post('judul_berita'),
			'isi_berita' => $this->input->post('isi_berita'),
        );
		$this->db->set('tanggal_upload', 'NOW()');
		$this->db->set('tanggal_update', 'NOW()');
        $result = $this->db->insert('berita', $insert);

		return $result;
	}

	public function deleteBerita($id)
	{
		$this->db->where('id_berita', $id);
		$result = $this->db->delete('berita');
		return $result;
	}

	public function getDetailBerita($id)
	{
		$this->db->where('berita.id_berita',$id);
		$this->db->join('kategori', 'berita.id_kategori = kategori.id_kategori');
		$result = $this->db->get('berita')->result_array();
		return $result[0];
	}

	public function editBerita()
	{
		$edit = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'judul_berita' => $this->input->post('judul_berita'),
			'isi_berita' => $this->input->post('isi_berita'),
		);
		$this->db->set('tanggal_update', 'NOW()');
        $this->db->where('id_berita', $this->input->post('id_berita'));
		$result = $this->db->update('berita', $edit);

		return $result;
	}
                        
}


/* End of file Berita_model.php and path \application\models\Berita_model.php */
