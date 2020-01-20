<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NucPermisoRuta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('nuc_permiso_ruta_model');
	}

	public function index()
	{
		
	}

	public function listPorPermisoAjax()
	{
		$permiso = $this->input->post("permiso");
		
		$permiso_rutas = $this->nuc_permiso_ruta_model->listPorPermiso($permiso["id_permiso"]);

		$data['permiso_rutas'] = $permiso_rutas;
		$data['result'] = 1;
		$this->utils->json($data);	
	}

	public function cambiarAsignacionRuta()
	{
		$permiso_ruta = $this->input->post("permiso_ruta");
		
		$cantidad = $this->nuc_permiso_ruta_model->count($permiso_ruta);
		
		if( $cantidad >=1 ){
			$this->nuc_permiso_ruta_model->delete($permiso_ruta);
		
		}else{
			$this->nuc_permiso_ruta_model->insert($permiso_ruta);
		}

		$data['result'] = 1;
		$this->utils->json($data);	
	}

}

/* End of file Nuc_Permiso_Ruta.php */
/* Location: ./application/controllers/nucleo/Nuc_Permiso_Ruta.php */