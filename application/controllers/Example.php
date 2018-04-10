<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {

	public function index()
	{
		
	}

	public function exampleForm()
	{
		$this->load->helper('form_ci_helper');
		
		$this->load->view('example/exampleForm');
	}

}

/* End of file Example.php */
/* Location: ./application/controllers/Example.php */