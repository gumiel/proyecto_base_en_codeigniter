<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruta_rol_model extends Generic {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function listRutasDeRol( $idRol )
	{
		$this->db->select('ruta.*');
		$this->db->join('ruta_rol', 'ruta_rol.id_ruta = ruta.id_ruta', 'inner');
		$this->db->where('ruta_rol.id_rol', $idRol);
		return $this->db->get('ruta')->result_array();
	}

}

/* End of file Ruta_rol_model.php */
/* Location: ./application/models/Ruta_rol_model.php */