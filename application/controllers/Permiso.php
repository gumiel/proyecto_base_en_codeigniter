<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
		$this->load->model('permiso_model');
		//Do your magic here
	}

	public function index()
	{
		$data = array();

		$data["permisos"] = $this->permiso_model->getAll();

		$this->load->view('permiso/index', $data);	
	}

}

/* End of file Permiso.php */
/* Location: ./application/controllers/Permiso.php */