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

	public function listaAjax()
	{
		$usuario = $this->input->post('usuario');

		$data = array();

		if ( $usuario != null && sizeof($usuario)>0 && $usuario['label']!='' && $usuario['text']!='' )
		{			
			$data["usuarios"] = $this->usuario_model->searchUsuario($usuario['label'], $usuario['text']);
		} else
		{
			$data["usuarios"] = $this->usuario_model->listUsuario();
		}

		$data["result"] = 1;
		$this->utils->json($data);
	}

}

/* End of file UsuarioComponente.php */
/* Location: ./application/controllers/administracion/UsuarioComponente.php */