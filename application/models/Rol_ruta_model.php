<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol_ruta_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function deleteAllByRol($idRol=0)
	{	
		$this->db->where('id_rol', $idRol);
		$this->db->delete('rol_ruta');
	}

	

}

/* End of file Rol_ruta_model.php */
/* Location: ./application/models/Rol_ruta_model.php */