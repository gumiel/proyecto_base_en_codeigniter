<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExampleTwo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->helper('form_helper');
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
		$this->form_validation->set_rules($this->exampletworule->rule());

		if ($this->form_validation->run() == TRUE)
		{
			echo "entry";
		} else{
			echo "not entry";
		}
		$this->index();
		// redirect('moduleTwo/ExampleTwo/index','refresh');
	}
}

/* End of file ExampleTwo.php */
/* Location: ./application/controllers/moduleTwo/ExampleTwo.php */