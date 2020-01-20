<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_permiso_model extends Generic_model {

	public function __construct()
	{
		parent::__construct();		

		// $this->tableName('permiso');
		$this->foreignKeyName('id_permiso');
	}

}

/* End of file Nuc_Permiso_model.php */
/* Location: ./application/models/Nuc_Permiso_model.php */