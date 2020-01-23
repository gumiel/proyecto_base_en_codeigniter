<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComAtributoProducto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('com_atributo_producto');
	}

	public function index()
	{
		
	}

	public function listAjax()
	{
		$atributos = $this->com_atributo_producto->getAll(["estado_registro"=>"activo"]);
		$data = array();
		$data['com_atributo_productos'] = $atributos;
		$data['result'] = 1;

		$this->utils->json($data);
	}

}

/* End of file ComAtributoProducto.php */
/* Location: ./application/controllers/mod_compras/ComAtributoProducto.php */