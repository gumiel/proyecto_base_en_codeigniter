<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NucRol extends CI_Controller {



	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Nuc_Rol_model', 'nuc_rol_model');

	}

	public function index()
	{		
		$this->load->view('/nucleo/NucRol/index', null, FALSE);
	}

	public function listAjax()
	{
		$rol = $this->input->post('rol');

		$data = array();

		if ( $rol != null && sizeof($rol)>0 && $rol['label']!='' && $rol['text']!='' )
		{									
			$roles = $this->nuc_rol_model->search($rol['label'], $rol["text"]);
		} else
		{
			$roles = $this->nuc_rol_model->getAll(["estado_registro"=>"activo"]);
		}

		
		


		
		$data['roles'] = $roles;
		$data['result'] = 1;
		$this->utils->json($data);
	}

	public function getAjax()
	{
		$data = array();
		
		$rol     = $this->input->post('rol');
		$rolFind = $this->nuc_rol_model->getById( $rol['id_rol'] );
		$data['rol']    = $rolFind;
		$data['result'] = 1;
		$this->utils->json($data);	
	}

	public function createAjax()
	{
		$data = array();

		$rol = $this->input->post('rol');
		
		$this->form_validation->set_rules('rol[denominacion]', 'denominacion', 'trim|required|callback__verify_repeat_denominacion_rol');

		if ( $this->form_validation->run()==true ) 
		{
			$this->nuc_rol_model->insert($rol);
			$data['result']  = 1;
			$data['message'] = "Se creo el usuario";
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

		$rol = $this->input->post('rol');
		
		$this->form_validation->set_rules('rol[denominacion]', 'denominacion', 'trim|required|callback__verify_repeat_denominacion_rol_edit['.$rol['id_rol'].']');

		if ( $this->form_validation->run()==true ) 
		{			
			$this->nuc_rol_model->updateById( $rol, $rol['id_rol'] );
			$data['result'] = 1;
			$data['message'] = "Se edito el registro";
		} else
		{
			$data['result'] = 0;
			$data['message'] = validation_errors();
		}

		$this->utils->json($data);	
	}

	public function deleteAjax()
	{
		$data = array();

		$rol = $this->input->post('rol');

		$this->form_validation->set_rules('rol[id_rol]', 'Identificador', 'trim|required');

		if ( $this->form_validation->run()==true ) 
		{			
			$this->nuc_rol_model->deleteById( $rol['id_rol'] );
			$data['result'] = 1;
			$data['message'] = "Se elimino el registro";
		} else
		{
			$data['result'] = 0;
			$data['message'] = validation_errors();
		}

		$this->utils->json($data);
	}

	public function getRelationWithRutasAjax()
	{
		$data  = array();
		$rol   = $this->input->post('rol');
		$rutas = $this->rutas_model->getRutasByRol( $rol['id_rol'] );
		$data['rutas']  = $rutas;
		$data['result'] = 1;
		$this->utils->json($data);	
	}

	public function AssignRutasAjax()
	{
		$data = array();		

		$rutas = $this->input->post('ruta');
		$rol   = $this->input->post('rol');

		if ( $rol['id_rol']>0 )
		{			
			$this->rol_ruta_model->deleteAllByRol( $rol['id_rol'] );
			foreach ($rutas as $ruta) 
			{
				$this->rol_ruta_model->insert( [ 'id_rol'=>$rol['id_rol'], 'id_ruta'=>$ruta['id_ruta'] ] );
			}
			$data['result'] = 1;
		} else
		{
			$data['result'] = 0;
		}

		$this->utils->json($data);	
	}
	

	public function _verify_repeat_denominacion_rol($denominacion)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Existe la {field}');
		$numberOfResult = $this->nuc_rol_model->count( [ 'denominacion'=>$denominacion ] );
		return ( $numberOfResult==0 );
	}

	public function _verify_repeat_denominacion_rol_edit($denominacion, $idRol)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Existe la {field}');
		$numberOfResult = $this->nuc_rol_model->count( [ 'denominacion'=>$denominacion, 'id_rol!='=>$idRol ] );
		return ( $numberOfResult==0 );
	}

}

/* End of file Nuc_Rol.php */
/* Location: ./application/controllers/nucleo/Nuc_Rol.php */