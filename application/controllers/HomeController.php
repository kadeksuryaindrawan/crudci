<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		$this->load->view('layouts/header');
		$this->load->view('index');
		$this->load->view('layouts/footer');
    }
}

/* End of file HomeController.php and path \application\controllers\HomeController.php */
