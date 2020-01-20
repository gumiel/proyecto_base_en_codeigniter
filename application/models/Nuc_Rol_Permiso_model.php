<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_rol_permiso_model extends Generic_Model {

	public function __construct()
	{
		parent::__construct();
		
		// $this->tableName('rol');
		$this->foreignKeyName('id_rol_permiso');
	}

	public function listPorRol($idRol){

		$this->db->select('nuc_permiso.denominacion, 							
							nuc_permiso.descripcion, 
							nuc_rol_permiso.id_rol_permiso, 
							nuc_rol_permiso.id_rol, 
							nuc_permiso.id_permiso');
		$this->db->join('nuc_rol_permiso', 
						"nuc_permiso.id_permiso = nuc_rol_permiso.id_permiso and nuc_rol_permiso.estado_registro = 'activo' and nuc_rol_permiso.id_rol = ".$idRol." ", 'left');
		$this->db->where('nuc_permiso.estado_registro', 'activo');
		$this->db->order_by('nuc_rol_permiso.id_rol_permiso', 'desc');
		$result = $this->db->get('nuc_permiso');
		
		return $result->result();

	}

}

/* End of file Nuc_Rol_Permiso_model.php */
/* Location: ./application/models/Nuc_Rol_Permiso_model.php */