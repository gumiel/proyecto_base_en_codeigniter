<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruta_model extends Generic    {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getRutasByRol($idRol)
	{
		$this->db->select('ruta.*');
		$this->db->join('rol_ruta', 'rol_ruta.id_ruta = ruta.id_ruta', 'inner');
		$this->db->where('rol_ruta.id_rol', $idRol);
		$res = $this->db->get('ruta');
		return $res->result_array();
	}

	public function getRutasByUsuario($idUsuario)
	{
		$this->db->select('ruta.*');
		$this->db->join('ruta_asignado', 'ruta_asignado.id_ruta = ruta.id_ruta', 'inner');
		$this->db->where('ruta_asignado.id_usuario', $idUsuario);
		$res = $this->db->get('ruta');
		return $res->result_array();
	}

}

/* End of file Ruta_model.php */
/* Location: ./application/models/Ruta_model.php */