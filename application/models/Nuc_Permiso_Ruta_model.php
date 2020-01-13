<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_Permiso_Ruta_model extends Generic_Model {

	public function __construct()
	{
		parent::__construct();
		
		// $this->tableName('rol');
		$this->foreignKeyName('id_permiso_ruta');
	}

	public function listPorPermiso($idPermiso){

		$this->db->select('nuc_ruta.denominacion, nuc_ruta.url, nuc_ruta.descripcion, ');
		$this->db->join('nuc_ruta', 'nuc_ruta.id_ruta = nuc_permiso_ruta.id_ruta', 'inner');
		$this->db->where('nuc_permiso_ruta.id_permiso', $idPermiso);
		$this->db->where('nuc_permiso_ruta.estado_registro', 'activo');
		$result = $this->db->get('nuc_permiso_ruta');
		return $result->result();

	}

}

/* End of file Nuc_Permiso_Ruta_model.php */
/* Location: ./application/models/Nuc_Permiso_Ruta_model.php */