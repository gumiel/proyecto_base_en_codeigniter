<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'validator/Base.php';

class NucPrincipal extends CI_Controller {

	public $arregloMenus = array();

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$idPadre = 0;
		$this->llamada($idPadre);
		echo "<pre>";
		var_dump($this->arregloMenus);
		echo "</pre>";
	}

	public function llamada($idPadre){
		$sql = "select id_menu, codigo, nombre, id_menu_padre from nuc_menu where id_menu_padre = ".$idPadre;
		$query = $this->db->query($sql);
		$menus = $query->result();
		echo $sql.'<br>';
		if( count($menus)>0 )
		{
			foreach ($menus as $menu) 
			{	array_push($this->arregloMenus, $menu);

				

				$this->llamada($menu->id_menu);
			}
		}
	}

	public function inicio()
	{				
		$this->load->view('nucleo/NucPrincipal/inicio');
	}

	public function dos()
	{
		$currentRoute = $this->getUriCurrent();

		$pagesPublicDB = $this->getUrlToDB( $this->session->userdata('id_usuario') );
		echo $currentRoute.'<br>';
		var_dump($pagesPublicDB);
		if( $this->validRoute($currentRoute, $pagesPublicDB) ){
			echo "IF";
		} else{
			echo "ELSE";
		}

	}













	private function getUrlToDB($sessionsId)
	{
		



		$this->db->select('nuc_ruta.url');
		$this->db->join('nuc_usuario_rol', 'nuc_usuario_rol.id_usuario = nuc_usuario.id_usuario', 'inner');
		$this->db->join('nuc_rol', 'nuc_usuario_rol.id_rol = nuc_rol.id_rol', 'inner');
		$this->db->join('nuc_rol_permiso', 'nuc_rol.id_rol = nuc_rol_permiso.id_rol', 'inner');
		$this->db->join('nuc_permiso', 'nuc_permiso.id_permiso = nuc_rol_permiso.id_permiso', 'inner');
		$this->db->join('nuc_permiso_ruta', 'nuc_permiso_ruta.id_permiso = nuc_permiso.id_permiso', 'inner');
		$this->db->join('nuc_ruta', 'nuc_ruta.id_ruta = nuc_permiso_ruta.id_ruta', 'inner');
		$this->db->where('nuc_usuario.id_usuario', $sessionsId);
		$result = $this->db->get('nuc_usuario');

		$res = array();
		foreach ($result->result_array() as $data) {
			array_push($res, $data['url']);			
		}
		return $res;
	}

	private function validRoute($currentRoute, $pagesPublicDB)
	{
		$res = false;
		foreach ($pagesPublicDB as $value) {
			if($value==$currentRoute){
				$res = true;
				break;
			}
		}
		return $res;
	}

	private function getUriCurrent()
	{
		$route = "";

		for ($i=1; $i < 10; $i++) 
		{ 
			if($this->uri->segment($i))
				$route = $route. $this->uri->slash_segment($i, 'leading');
			
		}
		return $route;
	}

}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */