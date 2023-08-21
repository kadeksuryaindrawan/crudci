<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class BeritaController extends CI_Controller {

	public $Berita_model,$Kategori_model,$form_validation,$session,$input;

    public function __construct()
    {
        parent::__construct();
				$this->load->model('Berita_model');
				$this->load->model('Kategori_model');
    }

    public function index()
    {
			$data['berita'] = $this->Berita_model->getBerita();
			$this->load->view('layouts/header');
			$this->load->view('berita/index',$data);
			$this->load->view('layouts/footer');
    }

		public function tambah()
    {
			$data['kategori'] = $this->Kategori_model->getKategori();
			$this->load->view('layouts/header');
			$this->load->view('berita/tambah',$data);
			$this->load->view('layouts/footer');
    }

		public function add()
    {
        $this->form_validation->set_rules('id_kategori', 'Kategori','required|min_length[1]|max_length[255]');
				$this->form_validation->set_rules('judul_berita', 'Judul Berita','required|min_length[1]|max_length[255]|is_unique[berita.judul_berita]');
				$this->form_validation->set_rules('isi_berita', 'Isi Berita','required|min_length[1]');

				if ($this->form_validation->run()==true){
            $this->Berita_model->insertBerita();
            $this->session->set_flashdata('success','Berhasil menambah berita !');
            redirect('BeritaController');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
						redirect('BeritaController/tambah');
        }
        
    }

		public function hapus($id)
		{
			$this->Berita_model->deleteBerita($id);
			$this->session->set_flashdata('success','Berhasil menghapus berita !');
			redirect('BeritaController');
		}

		public function edit($id)
		{
        $data['berita'] = $this->Berita_model->getDetailBerita($id);
				$data['kategori'] = $this->Kategori_model->getKategori();
        $this->load->view('layouts/header');
        $this->load->view('berita/edit',$data);
        $this->load->view('layouts/footer'); 
		}

		public function editProcess()
		{
			$data = $this->Berita_model->getDetailBerita($this->input->post('id_berita'));
			if($data['judul_berita'] == $this->input->post('judul_berita')){
				$this->form_validation->set_rules('id_kategori', 'Kategori','required|min_length[1]|max_length[255]');
				$this->form_validation->set_rules('judul_berita', 'Judul Berita','required|min_length[1]|max_length[255]');
				$this->form_validation->set_rules('isi_berita', 'Isi Berita','required|min_length[1]');
			}
			else{
				$this->form_validation->set_rules('id_kategori', 'Kategori','required|min_length[1]|max_length[255]');
				$this->form_validation->set_rules('judul_berita', 'Judul Berita','required|min_length[1]|max_length[255]|is_unique[berita.judul_berita]');
				$this->form_validation->set_rules('isi_berita', 'Isi Berita','required|min_length[1]');
			}
			
			if ($this->form_validation->run()==true){
				$this->Berita_model->editBerita();
				$this->session->set_flashdata('success','Berita berhasil diedit !');
				redirect('BeritaController');
			}
			else{
				$this->session->set_flashdata('error', validation_errors());
				redirect('BeritaController/edit/'.$this->input->post('id_berita'));
			}
		}
}

/* End of file BeritaController.php and path \application\controllers\BeritaController.php */
