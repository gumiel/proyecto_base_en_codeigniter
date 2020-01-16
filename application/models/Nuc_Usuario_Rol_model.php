<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_Usuario_Rol_model extends Generic_Model {

	public function __construct()
	{
		parent::__construct();
		
		// $this->tableName('rol');
		$this->foreignKeyName('id_usuario_rol');
	}

	public function listPorUsuario($idUsuario){

		$this->db->select('nuc_rol.denominacion, 							
							nuc_rol.descripcion, 
							nuc_usuario_rol.id_usuario_rol, 
							nuc_usuario_rol.id_usuario, 
							nuc_rol.id_rol');
		$this->db->join('nuc_usuario_rol', 
						"nuc_rol.id_rol = nuc_usuario_rol.id_rol and nuc_usuario_rol.estado_registro = 'activo' and nuc_usuario_rol.id_usuario = ".$idUsuario." ", 'left');
		$this->db->where('nuc_rol.estado_registro', 'activo');
		$this->db->order_by('nuc_usuario_rol.id_usuario_rol', 'desc');
		$result = $this->db->get('nuc_rol');
		// echo $this->db->last_query(); exit;
		return $result->result();

	}

}

/* End of file Nuc_Usuario_Rol_model.php */
/* Location: ./application/models/Nuc_Usuario_Rol_model.php */