<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NucPermiso extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('nuc_permiso_model');

	}

	public function index()
	{		
		$data = array();
		$this->load->view('/nucleo/NucPermiso/index', $data, FALSE);

	}

	public function listAjax(){

		$permiso = $this->input->post('permiso');

		$data = array();

		if ( $permiso != null && sizeof($permiso)>0 && $permiso['label']!='' && $permiso['text']!='' )
		{									
			$permisos = $this->nuc_permiso_model->search($permiso['label'], $permiso["text"]);
		} else
		{
			$permisos = $this->nuc_permiso_model->getAll(["estado_registro"=>"activo"]);
		}

		
		$data['permisos'] = $permisos;
		$data['result'] = 1;
		$this->utils->json($data);
	}

	public function createAjax()
	{
		$data = array();

		$permiso = $this->input->post('permiso');
		// var_dump($permiso); exit;
		$this->form_validation->set_rules('permiso[denominacion]', 'Denominacion', 'trim|required|callback__verify_repeat_denominacion');

		if ( $this->form_validation->run()==true ) 
		{
			$this->nuc_permiso_model->insert($permiso);
			$data['result']  = 1;
			$data['message'] = "Se creo el permiso";
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
		$permiso = $this->input->post('permiso');
		
		$this->form_validation->set_rules('permiso[denominacion]', 'denominacion', 'trim|required|callback__verify_repeat_denominacion_edit['.$permiso['id_permiso'].']');

		if ( $this->form_validation->run()==true ) 
		{
			$this->nuc_permiso_model->updateById( $permiso, $permiso['id_permiso'] );

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
		
		$permiso     = $this->input->post('permiso');

		$data['permiso'] =  $this->nuc_permiso_model->getById( $permiso['id_permiso'] );	
		$data['result']  = 1;
		
		$this->utils->json($data);	
	}

	public function deleteAjax()
	{
		$data = array();

		$permiso = $this->input->post('permiso');

		$this->form_validation->set_rules('permiso[id_permiso]', 'Identificador', 'trim|required');

		if ( $this->form_validation->run()==true ) 
		{			
			$this->nuc_permiso_model->deleteById( $permiso['id_permiso'] );
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
		$numberOfResult = $this->nuc_permiso_model->count( [ 'denominacion'=>$denominacion ] );
		return ( $numberOfResult==0 );
	}

	public function _verify_repeat_denominacion_edit($denominacion, $id)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Existe la {field}');
		$numberOfResult = $this->nuc_permiso_model->count( [ 'denominacion'=>$denominacion, 'id_permiso!='=>$id ] );
		return ( $numberOfResult==0 );
	}

}

/* End of file Nuc_Permiso.php */
/* Location: ./application/controllers/administracion/Nuc_Permiso.php */