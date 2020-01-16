<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_Usuario_Rol extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('nuc_usuario_rol_model');
	}

	public function index()
	{
		
	}

	public function listPorUsuarioAjax()
	{
		$usuario = $this->input->post("nuc_usuario");
		
		$usuario_roles = $this->nuc_usuario_rol_model->listPorUsuario($usuario["id_usuario"]);

		$data['usuario_roles'] = $usuario_roles;
		$data['result'] = 1;
		$this->utils->json($data);	
	}

	public function cambiarAsignacionRol()
	{
		$usuario_rol = $this->input->post("nuc_usuario_rol");
		
		$cantidad = $this->nuc_usuario_rol_model->count($usuario_rol);
		
		if( $cantidad >=1 ){
			$this->nuc_usuario_rol_model->delete($usuario_rol);
		
		}else{
			$this->nuc_usuario_rol_model->insert($usuario_rol);
		}

		$data['result'] = 1;
		$this->utils->json($data);	
	}

}

/* End of file Nuc_Usuario_Rol.php */
/* Location: ./application/controllers/nucleo/Nuc_Usuario_Rol.php */