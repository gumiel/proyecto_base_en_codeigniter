<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('form_ci');
		$this->load->library('form_validation');
		$this->load->library('utils');
		$this->load->model('rol_model');
		$this->load->model('rol_ruta_model');
		$this->load->model('ruta_model');
	}

	public function index()
	{		
		$this->load->view('ruta/index', null, FALSE);
	}

	public function listAjax()
	{
		$rutas = $this->ruta_model->getAll();
		$data['rutas'] = $rutas;
		$this->utils->json($data);
	}

	public function getAjax()
	{
		$data = array();
		
		$ruta = $this->input->post('ruta');
		$rutaFind = $this->ruta_model->getById( $ruta['id_ruta'] );
		$data['ruta'] = $rutaFind;
		$data['result'] = 1;
		$this->utils->json($data);	
	}

	public function createAjax()
	{
		$data = array();

		$ruta = $this->input->post('ruta');
		
		$this->form_validation->set_rules('ruta[denominacion]', 'denominacion', 'trim|required|callback__verify_repeat_denominacion_ruta');

		if ( $this->form_validation->run()==true ) 
		{
			// unset($ruta['id_ruta']);
			$this->ruta_model->insert($ruta);
			$data['result'] = 1;
		} else
		{
			$data['message'] = validation_errors();
			$data['result'] = 0;
		}

		$this->utils->json($data);	
	}

	public function editAjax()
	{
		$data = array();

		$ruta = $this->input->post('ruta');
		
		$this->form_validation->set_rules('ruta[denominacion]', 'denominacion', 'trim|required|callback__verify_repeat_denominacion_ruta_edit['.$ruta['id_ruta'].']');

		if ( $this->form_validation->run()==true ) 
		{			
			$this->ruta_model->updateById( $ruta, $ruta['id_ruta'] );
			$data['result'] = 1;
		} else
		{
			$data['result'] = 0;
		}

		$this->utils->json($data);	
	}
























	public function _verify_repeat_denominacion_ruta($denominacion)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Existe la {field}');
		$numberOfResult = $this->ruta_model->count( [ 'denominacion'=>$denominacion ] );
		return ( $numberOfResult==0 );
	}

	public function _verify_repeat_denominacion_ruta_edit($denominacion, $idRuta)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Existe la {field}');
		$numberOfResult = $this->ruta_model->count( [ 'denominacion'=>$denominacion, 'id_ruta!='=>$idRuta ] );
		return ( $numberOfResult==0 );
	}

}

/* End of file Ruta.php */
/* Location: ./application/controllers/Ruta.php */