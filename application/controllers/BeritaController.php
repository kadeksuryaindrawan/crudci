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
}

/* End of file BeritaController.php and path \application\controllers\BeritaController.php */
