<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'models/Generic.php';

class Usuario_model extends CI_Model {

	use Generic;

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function listUsuario()
	{
		$res = $this->db->get('usuario');
		return $res->result_array();
	}

	public function searchUsuario($label='', $text='')
	{		
		$this->db->like($label, $text, 'BOTH');
		$res = $this->db->get('usuario');
		return $res->result_array();
	}

	



}

/* End of file Uçsuario_model.php */
/* Location: ./application/models/Uçsuario_model.php */