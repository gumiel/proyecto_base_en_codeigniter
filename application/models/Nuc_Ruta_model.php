<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_ruta_model extends Generic_Model {

	public function __construct()
	{
		parent::__construct();
		
		// $this->tableName('permiso');
		$this->foreignKeyName('id_ruta');
	}

}

/* End of file Nuc_Ruta_model.php */
/* Location: ./application/models/Nuc_Ruta_model.php */