<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_rol_model extends Generic_Model {

	public function __construct()
	{
		parent::__construct();
		
		// $this->tableName('rol');
		$this->foreignKeyName('id_rol');
	}

}

/* End of file Nuc_Rol_model.php */
/* Location: ./application/models/Nuc_Rol_model.php */