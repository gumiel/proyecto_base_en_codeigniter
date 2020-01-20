<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_usuario_model extends Generic_Model {

	public function __construct()
	{
		parent::__construct();
		
		// $this->tableName('rol');
		$this->foreignKeyName('id_usuario');
	}

	public function listUsuario()
	{
		$res = $this->db->get('nuc_usuario');
		$this->db->where('estado_activo', "activo");
		return $res->result_array();
	}

	public function searchUsuario($label='', $text='')
	{		
		$this->db->like($label, $text, 'BOTH');
		$res = $this->db->get('nuc_usuario');
		return $res->result_array();
	}

}

/* End of file Nuc_Usuario_model.php */
/* Location: ./application/models/Nuc_Usuario_model.php */