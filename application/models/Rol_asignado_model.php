<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol_asignado_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function deleteAllByUsuario($idUsuario=0)
	{	
		$this->db->where('id_usuario', $idUsuario);
		$this->db->delete('rol_asignado');
	}

}

/* End of file Rol_asignado.php */
/* Location: ./application/models/Rol_asignado.php */