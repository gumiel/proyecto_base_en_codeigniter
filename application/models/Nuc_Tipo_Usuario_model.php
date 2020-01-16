<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_Tipo_Usuario_model extends Generic_Model {

	public function __construct()
	{
		parent::__construct();
		
		// $this->tableName('permiso');
		$this->foreignKeyName('id_tipo_usuario');
	}

}

/* End of file Nuc_Tipo_Usuario_model.php */
/* Location: ./application/models/Nuc_Tipo_Usuario_model.php */