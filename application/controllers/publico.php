<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publico extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form_ci_helper');
	}

	public function index()
	{
		
	}

	public function login()
	{
		
		$this->load->view('publico/login');
	}

	public function payment()
	{
		$this->load->view('publico/payment');
	}

}

/* End of file publico.php */
/* Location: ./application/controllers/publico.php */