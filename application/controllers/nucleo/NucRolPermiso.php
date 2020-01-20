<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NucRolPermiso extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('nuc_rol_permiso_model');
	}

	public function index()
	{
		
	}

	public function listPorRolAjax()
	{
		$rol = $this->input->post("rol");
		
		$rol_permisos = $this->nuc_rol_permiso_model->listPorRol($rol["id_rol"]);

		$data['rol_permisos'] = $rol_permisos;
		$data['result'] = 1;
		$this->utils->json($data);	
	}

	public function cambiarAsignacionPermiso()
	{
		$rol_permiso = $this->input->post("rol_permiso");
		
		$cantidad = $this->nuc_rol_permiso_model->count($rol_permiso);
		
		if( $cantidad >=1 ){
			$this->nuc_rol_permiso_model->delete($rol_permiso);
		
		}else{
			$this->nuc_rol_permiso_model->insert($rol_permiso);
		}

		$data['result'] = 1;
		$this->utils->json($data);	
	}

}

/* End of file Nuc_Permiso_Ruta.php */
/* Location: ./application/controllers/nucleo/Nuc_Permiso_Ruta.php */