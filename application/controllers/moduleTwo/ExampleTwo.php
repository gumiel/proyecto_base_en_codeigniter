<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExampleTwo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('moduleTwo/ExampleTwoRule');
	}

	public function index()
	{
		// echo "Hello programmer from /moduleTwo/ExampleTwo";

		$data['dataSend'] = "Hello Programmer";
		$this->load->view('moduleTwo/exampleTwo', $data, FALSE);
	}

	public function processForm()
	{
		
	}
}

/* End of file ExampleTwo.php */
/* Location: ./application/controllers/moduleTwo/ExampleTwo.php */