<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

		public $Berita_model,$Kategori_model;

    public function __construct()
    {
        parent::__construct();
				$this->load->model('Berita_model');
				$this->load->model('Kategori_model');
    }

    public function index()
    {
			$row['kategori']  = $this->Kategori_model->getCount();
			$row['berita']  = $this->Berita_model->getCount();
			$this->load->view('layouts/header');
			$this->load->view('index',$row);
			$this->load->view('layouts/footer');
    }
}

/* End of file HomeController.php and path \application\controllers\HomeController.php */
