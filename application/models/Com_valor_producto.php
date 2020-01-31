<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Com_valor_producto extends Generic_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->foreignKeyName('id_valor_producto');
	}

	public function listAtributosValoresByIdProducto($idProducto)
	{
		$this->db->join('com_valor_producto', 'com_valor_producto.id_producto = com_producto.id_producto', 'inner');
		$this->db->join('com_atributo_producto', 'com_atributo_producto.id_atributo_producto = com_valor_producto.id_atributo_producto', 'inner');
		$this->db->where('com_producto.id_producto', $idProducto);
		$result = $this->db->get('com_producto');
		return $result->result();
	}

}

/* End of file Com_valor_producto.php */
/* Location: ./application/models/Com_valor_producto.php */