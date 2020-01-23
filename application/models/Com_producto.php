<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Com_producto extends Generic_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->foreignKeyName('id_producto');
	}

}

/* End of file Com_producto.php */
/* Location: ./application/models/Com_producto.php */