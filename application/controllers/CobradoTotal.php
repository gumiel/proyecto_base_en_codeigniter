<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CobradoTotal extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();

		$this->load->library('session');
		$this->load->library('form_validation');

		$this->load->helper('form_ci_helper');

		$this->load->model('usuario_model');
	}

	public function index()
	{
		
	}

	public function simple()
	{
		$this->load->view('cobradoTotal/simple');
	}

}

/* End of file CobradoTotal.php */
/* Location: ./application/controllers/CobradoTotal.php */