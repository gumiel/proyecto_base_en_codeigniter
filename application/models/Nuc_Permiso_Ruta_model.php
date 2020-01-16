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

		$this->db->select('nuc_ruta.denominacion, 
							nuc_ruta.url, 
							nuc_ruta.descripcion, 
							nuc_permiso_ruta.id_permiso_ruta, 
							nuc_permiso_ruta.id_permiso, 
							nuc_ruta.id_ruta');
		$this->db->join('nuc_permiso_ruta', 
						"nuc_ruta.id_ruta = nuc_permiso_ruta.id_ruta and nuc_permiso_ruta.estado_registro = 'activo' and nuc_permiso_ruta.id_permiso = ".$idPermiso." ", 'left');
		$this->db->where('nuc_ruta.estado_registro', 'activo');
		$this->db->order_by('nuc_permiso_ruta.id_permiso_ruta', 'desc');
		$result = $this->db->get('nuc_ruta');
		
		return $result->result();

	}

}

/* End of file Nuc_Permiso_Ruta_model.php */
/* Location: ./application/models/Nuc_Permiso_Ruta_model.php */
