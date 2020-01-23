<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Com_atributo_producto extends Generic_Model {

	public function __construct()
	{
		parent::__construct();		

		// $this->tableName('permiso');
		$this->foreignKeyName('id_atributo_producto');
	}

}

/* End of file Nuc_atributo_producto.php */
/* Location: ./application/models/Nuc_atributo_producto.php */