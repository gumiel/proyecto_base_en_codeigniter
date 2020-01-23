<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Com_valor_producto extends Generic_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->foreignKeyName('id_valor_producto');
	}

}

/* End of file Com_valor_producto.php */
/* Location: ./application/models/Com_valor_producto.php */