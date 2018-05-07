<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {

	public function index()
	{
		$this->load->view('configuration/index');
	}

}

/* End of file Configuration.php */
/* Location: ./application/controllers/Configuration.php */