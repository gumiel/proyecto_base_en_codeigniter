<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComProducto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('com_producto');
		$this->load->model('com_valor_producto');
	}

	public function index()
	{
		$data = array();
		$this->load->view('/mod_compras/ComProducto/index', $data, FALSE);
	}

	public function listaAjax()
	{
		$usuario = $this->input->post('usuario');

		$data = array();

		if ( $usuario != null && sizeof($usuario)>0 && $usuario['label']!='' && $usuario['text']!='' )
		{			
			// $data["com_productos"] = $this->com_producto->searchUsuario($usuario['label'], $usuario['text']);
		} else
		{
			$data["com_productos"] = $this->com_producto->getAll(['estado_registro'=>'activo']);
		}
		
		$data["result"] = 1;
		$this->utils->json($data);
	}

	public function crearAjax()
	{
		$comProducto = $this->input->post('com_producto');
		$comValorProductos = $this->input->post('com_valor_producto');
		
		if( $this->com_producto->insert($comProducto) ){
			$idProducto = $this->db->insert_id();

			foreach ($comValorProductos as $comValorProducto) {
				$comValorProducto['id_producto'] = $idProducto;
				$this->com_valor_producto->insert($comValorProducto);
			}
			$data['result'] = 1;
		}else{
			$data['result'] = 0;
			$data['msg'] = 'No se inserto';
		}
		

		$this->utils->json($data);
	}

	public function getAjax()
	{
		$comProducto = $this->input->post('com_producto');
		
		
		if( isset($comProducto) )
		{
			

			$comProducto = $this->com_producto->get(["id_producto"=>$comProducto['id_producto'], "estado_registro"=>"activo"]);
			$comAtributosValores = $this->com_valor_producto->listAtributosValoresByIdProducto($comProducto->id_producto);
				
			$data = array();
			$data['com_producto'] = $comProducto;
			$data['com_producto']->com_atributos_valores = $comAtributosValores;
			
			$data['result'] = 1;
		}else
		{
			$data['result'] = 0;
			$data['msg'] = 'No se inserto';
		}
		$this->utils->json($data);
	}

}

/* End of file ComProducto.php */
/* Location: ./application/controllers/mod_compras/ComProducto.php */