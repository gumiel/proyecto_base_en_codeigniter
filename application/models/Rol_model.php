<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol_model extends Generic_model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getRolByUsuario( $idUsuario=0 )
	{
		$this->db->select('rol.*');
		$this->db->join('rol_asignado', 'rol_asignado.id_rol = rol.id_rol', 'inner');
		$this->db->where('rol_asignado.id_usuario', $idUsuario);
		$res = $this->db->get('rol');
		return $res->result_array();
	}

}

/* End of file Rol_model.php */
/* Location: ./application/models/Rol_model.php */