<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriController extends CI_Controller {

	public $Kategori_model,$form_validation,$session,$input;

    public function __construct()
    {
        parent::__construct();
		$this->load->model('Kategori_model');
    }

    public function index()
    {
		$data['kategori'] = $this->Kategori_model->getKategori();
		$this->load->view('layouts/header');
		$this->load->view('kategori/index',$data);
		$this->load->view('layouts/footer');
    }

	public function tambah()
    {
		$this->load->view('layouts/header');
		$this->load->view('kategori/tambah');
		$this->load->view('layouts/footer');
    }

	public function add()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori','required|min_length[1]|max_length[255]|is_unique[kategori.nama_kategori]');
		
		if ($this->form_validation->run()==true){
            $this->Kategori_model->insertKategori();
            $this->session->set_flashdata('success','Berhasil menambah kategori !');
            redirect('KategoriController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('KategoriController/tambah');
        }
        
    }

	public function hapus($id)
	{
		$this->Kategori_model->deleteKategori($id);
        $this->session->set_flashdata('success','Berhasil menghapus kategori !');
		redirect('KategoriController');
	}

	public function edit($id)
	{
        $data['kategori'] = $this->Kategori_model->getDetailKategori($id);
        $this->load->view('layouts/header');
        $this->load->view('kategori/edit',$data);
        $this->load->view('layouts/footer'); 
	}

	public function editProcess()
	{
		$data = $this->Kategori_model->getDetailKategori($this->input->post('id_kategori'));
		if($data['nama_kategori'] == $this->input->post('nama_kategori')){
			$this->form_validation->set_rules('nama_kategori', 'Nama Kategori','required|min_length[1]|max_length[255]');
		}
		else{
			$this->form_validation->set_rules('nama_kategori', 'Nama Kategori','required|min_length[1]|max_length[255]|is_unique[kategori.nama_kategori]');
		}
		
		if ($this->form_validation->run()==true){
			$this->Kategori_model->editKategori();
            $this->session->set_flashdata('success','Kategori berhasil diedit !');
			redirect('KategoriController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('KategoriController/edit/'.$this->input->post('id_kategori'));
        }
	}
}

/* End of file KategoriController.php and path \application\controllers\KategoriController.php */
