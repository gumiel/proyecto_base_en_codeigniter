<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioComponente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('form_ci');
		$this->load->library('form_validation');
		$this->load->library('rules/Usuario_rule');		
		$this->load->library('Utils');		
		$this->load->model('usuario_model');

	}
	
	public function index()
	{
		$data = array();
		$this->load->view('/administracion/usuario/usuarioComponente', $data, FALSE);	
	}

}

/* End of file UsuarioComponente.php */
/* Location: ./application/controllers/administracion/UsuarioComponente.php */