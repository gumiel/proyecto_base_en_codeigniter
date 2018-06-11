<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RutaRol extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('ruta_rol_model');
	}

	public function index()
	{
		
	}

	public function listRutasAsignadasARol()
	{
		

		$rol = $this->input->post('rol');
		$data = array();

		$rutas = $this->ruta_rol_model->listRutasDeRol($rol['id_rol']);
		
		$data['rutas'] = $rutas;
		$data['result'] = 1;

		$this->utils->json($data);
	}

	public function create()
	{
		$rutas = $this->input->post('rutas');
		$rol = $this->input->post('rol');

		foreach ($rutas as $ruta) {
			$this->ruta_rol_model->insert( [ 'id_rol'=>$rol['id_rol'], 'id_ruta'=>$ruta['id_ruta'] ] );
		}
		$data['result'] = 1;

		$this->utils->json($data);
	}

}

/* End of file Ruta_rol.php */
/* Location: ./application/controllers/Ruta_rol.php */