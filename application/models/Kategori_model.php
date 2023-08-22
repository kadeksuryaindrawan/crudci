<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Kategori_model extends CI_Model 
{
    public function getKategori()
    {
		$this->db->order_by('id_kategori','desc');
		$result = $this->db->get('kategori');
		return $result;
    }
	
	public function getCount()
	{
		$result = $this->db->get('kategori');
		$row = $result->num_rows();
		return $row;
	}
	
	public function insertKategori()
	{
        $insert = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $result = $this->db->insert('kategori', $insert);

		return $result;
	}    

	public function deleteKategori($id)
	{
		$this->db->where('id_kategori', $id);
		$result = $this->db->delete('kategori');
		return $result;
	}

	public function getDetailKategori($id)
	{
		$this->db->where('id_kategori',$id);
		$result = $this->db->get('kategori')->result_array();
		return $result[0];
	}

    public function editKategori()
	{
		$edit = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
		$result = $this->db->update('kategori', $edit);

		return $result;
	}
                        
}


/* End of file Kategori_model.php and path \application\models\Kategori_model.php */
