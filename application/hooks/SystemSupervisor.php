<?php

if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 

class SystemSupervisor
{
	private $ci;
	
	public function __construct()
	{
		$this->ci =& get_instance();
		!$this->ci->load->helper('url') ? $this->ci->load->helper('url') : false;
		!$this->ci->load->library('session') ? $this->ci->load->library('session') : false;
		!$this->ci->load->helper('url') ? $this->ci->load->helper('url') : false;		
	} 

	public function checkLogin()
	{		
		$this->ci->config->load('otros/config_system_supervisor');

		$sessions_id          = $this->ci->config->item('sessions_id');
		$pages_public         = $this->ci->config->item('pages_public');
		$page_login           = $this->ci->config->item('page_login');
		$process_login        = $this->ci->config->item('process_login');
		$close_login          = $this->ci->config->item('close_login');
		$default_page_private = $this->ci->config->item('default_page_private');
		$default_page_public  = $this->ci->config->item('default_page_public');
		
		$class = $this->ci->router->fetch_class();
		$method = $this->ci->router->fetch_method();
		$currentRoute = $this->getUriCurrent();
		
		if ( $this->ci->session->has_userdata($sessions_id) == FALSE )
		{ 										
			
			array_push($pages_public, $process_login);
			$typePage = $this->verifyRoutePublicPage( $currentRoute, $pages_public );

			if( $typePage=='PRIVATE'){ // verifica si la ruta actual es PRIVADA
				if($process_login != $currentRoute){						
					redirect( $default_page_public,'refresh' );
				}
			}				
			
			
		} else{
			
			$tipoUsuario = $this->ci->session->userdata('tipo_usuario');
			
			if($tipoUsuario!='SuperAdmin')
			{		
				array_push($pages_public, $process_login);
				array_push($pages_public, $default_page_private);
				array_push($pages_public, $close_login);
				$typePage = $this->verifyRoutePublicPage( $currentRoute, $pages_public );
				
				if( $typePage=='PRIVATE'){ // verifica si la ruta actual es PRIVADA

					$pagesPublicDB = $this->getUrlToDB( $this->ci->session->userdata($sessions_id) );
					if( !$this->validRoute($currentRoute, $pagesPublicDB) )
					{
						if( !$this->istypeHttpCallRest() )
						{							
							redirect( $default_page_private,'refresh' );
						} else{
							header('HTTP/1.0 403 Forbidden');
     						die('Tu no tienes los permisos requeridos para esta solicitud.');
						}	
					}

				}
			}
		}

	}

	private function getUriCurrent()
	{
		$route = "";

		for ($i=1; $i < 10; $i++) 
		{ 
			if($this->ci->uri->segment($i))
				$route = $route. $this->ci->uri->slash_segment($i, 'leading');
			
		}
		return $route;
	}

	private function verifyRoutePublicPage($route = '', $arrayPages = array() )
	{
		$res = 'PRIVATE';
		foreach ($arrayPages as $value) 
		{		
			if ( $value == $route )
			{
				$res = 'PUBLIC';
				break;

			}
		}
		
		return $res;
	}

	private function getUrlToDB($sessionsId)
	{
		$this->ci->db->select('nuc_ruta.url');
		$this->ci->db->join('nuc_usuario_rol', 'nuc_usuario_rol.id_usuario = nuc_usuario.id_usuario', 'inner');
		$this->ci->db->join('nuc_rol', 'nuc_usuario_rol.id_rol = nuc_rol.id_rol', 'inner');
		$this->ci->db->join('nuc_rol_permiso', 'nuc_rol.id_rol = nuc_rol_permiso.id_rol', 'inner');
		$this->ci->db->join('nuc_permiso', 'nuc_permiso.id_permiso = nuc_rol_permiso.id_permiso', 'inner');
		$this->ci->db->join('nuc_permiso_ruta', 'nuc_permiso_ruta.id_permiso = nuc_permiso.id_permiso', 'inner');
		$this->ci->db->join('nuc_ruta', 'nuc_ruta.id_ruta = nuc_permiso_ruta.id_ruta', 'inner');
		$this->ci->db->where('nuc_usuario.id_usuario', $sessionsId);
		$result = $this->ci->db->get('nuc_usuario');

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
			if( $value == $currentRoute ){
				$res = true;
				break;
			}
		}
		return $res;
	}

	private function istypeHttpCallRest(){
		$res = false;
		foreach (getallheaders() as $name => $value) 
		{		
			if($name=='typeCallRest' && $value=='json')
			{
				$res = true;
				break;
			}   
		}		
		return $res;
	}

}
/*
/end hooks/
*/