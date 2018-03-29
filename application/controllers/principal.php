<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/validator/base.php';

class Principal extends CI_Controller {

	use Base;

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		
	}

	public function inicio()
	{		
		echo $this->getSaludo();
		$this->load->view('principal/inicio');
	}

}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */