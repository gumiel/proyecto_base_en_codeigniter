<?php

if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 

class AccessControlCI
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
		$this->ci->config->load('AccessControlCI/config');
		 
		$default_page_private = $this->ci->config->item('default_page_private');
		$default_page_public  = $this->ci->config->item('default_page_public');
		$page_login           = $this->ci->config->item('page_login');
		$process_login        = $this->ci->config->item('process_login');
		$pages_public         = $this->ci->config->item('pages_public');
		$sessions_id          = $this->ci->config->item('sessions_id');
		
		$class = $this->ci->router->fetch_class();
		$method = $this->ci->router->fetch_method();
		$currentRoute = $this->getUriCurrent();
		
		if ( $this->ci->session->has_userdata($sessions_id) == FALSE && $process_login != $currentRoute )
		{ 										
			$typePage = $this->verifyRoutePublicPage( $currentRoute, $pages_public);

			if( $typePage=='PRIVATE') // verifica si la ruta actual es PRIVADA
				redirect( $default_page_public,'refresh' );	

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
		foreach ($arrayPages as $value) 
		{
			if ( $value == $route )
			{
				return 'PUBLIC';
				break;
			}
		}
		return 'PRIVATE';
	}


}
/*
/end hooks/
*/