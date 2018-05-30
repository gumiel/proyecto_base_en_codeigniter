<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruta_asignado extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function deleteAllByUsuario($idUsuario=0)
	{	
		$this->db->where('id_usuario', $idUsuario);
		$this->db->delete('ruta_asignado');
	}
}

/* End of file Ruta_asignado.php */
/* Location: ./application/models/Ruta_asignado.php */