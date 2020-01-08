<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_Ruta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('nuc_ruta_model');

	}

	public function index()
	{		
		$data = array();
		$this->load->view('/nucleo/nuc_ruta/index', $data, FALSE);

	}

	public function listAjax(){

		$ruta = $this->input->post('ruta');

		$data = array();

		if ( $ruta != null && sizeof($ruta)>0 && $ruta['label']!='' && $ruta['text']!='' )
		{									
			$rutas = $this->nuc_ruta_model->search($ruta['label'], $ruta["text"]);
		} else
		{
			$rutas = $this->nuc_ruta_model->getAll(["estado_registro"=>"activo"]);
		}

		
		


		
		$data['rutas'] = $rutas;
		$data['result'] = 1;
		$this->utils->json($data);
	}

	public function createAjax()
	{
		$data = array();

		$ruta = $this->input->post('ruta');
		
		$this->form_validation->set_rules('ruta[denominacion]', 'Denominacion', 'trim|required|callback__verify_repeat_denominacion');

		if ( $this->form_validation->run()==true ) 
		{
			$this->nuc_ruta_model->insert($ruta);
			$data['result']  = 1;
			$data['message'] = "Se creo la ruta";
		} else
		{
			$data['result']  = 0;
			$data['message'] = validation_errors();
		}

		$this->utils->json($data);	
	}

	public function editAjax()
	{
		$data = array();
		$ruta = $this->input->post('ruta');
		
		$this->form_validation->set_rules('ruta[denominacion]', 'denominacion', 'trim|required|callback__verify_repeat_denominacion_edit['.$ruta['id_ruta'].']');

		if ( $this->form_validation->run()==true ) 
		{
			$this->nuc_ruta_model->updateById( $ruta, $ruta['id_ruta'] );

			$data['result'] = 1;
			$data['message'] = "Se edito el registro";
		} else
		{
			$data['result'] = 0;
			$data['message'] = validation_errors();
		}

		$this->utils->json($data);	
	}

	public function getAjax()
	{
		$data = array();
		
		$ruta     = $this->input->post('ruta');

		$data['ruta'] =  $this->nuc_ruta_model->getById( $ruta['id_ruta'] );	
		$data['result']  = 1;
		
		$this->utils->json($data);	
	}

	public function deleteAjax()
	{
		$data = array();

		$ruta = $this->input->post('ruta');

		$this->form_validation->set_rules('ruta[id_ruta]', 'Identificador', 'trim|required');

		if ( $this->form_validation->run()==true ) 
		{			
			$this->nuc_ruta_model->deleteById( $ruta['id_ruta'] );
			$data['result'] = 1;
			$data['message'] = "Se elimino el registro";
		} else
		{
			$data['result'] = 0;
			$data['message'] = validation_errors();
		}

		$this->utils->json($data);
	}












	public function _verify_repeat_denominacion($denominacion)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Existe la {field}');
		$numberOfResult = $this->nuc_ruta_model->count( [ 'denominacion'=>$denominacion ] );
		return ( $numberOfResult==0 );
	}

	public function _verify_repeat_denominacion_edit($denominacion, $id)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Existe la {field}');
		$numberOfResult = $this->nuc_ruta_model->count( [ 'denominacion'=>$denominacion, 'id_ruta!='=>$id ] );
		return ( $numberOfResult==0 );
	}

}

/* End of file Nuc_Ruta.php */
/* Location: ./application/controllers/nucleo/Nuc_Ruta.php */