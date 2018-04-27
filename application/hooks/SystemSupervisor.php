<?php

if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 

class SystemSupervisor
{
	private $ci;
	
	public function __construct()
	{
		$this->ci =& get_instance();
		!$this->ci->load->library('session') ? $this->ci->load->library('session') : false;
		!$this->ci->load->helper('url') ? $this->ci->load->helper('url') : false;
	} 

	public function checkLogin()
	{
		$this->config->load('SystemSupervisor/config');

		$default_page_private = $this->config->item('checkLogin')['default_page_private'];
		$default_page_public  = $this->config->item('checkLogin')['default_page_public'];
		$page_login           = $this->config->item('checkLogin')['page_login'];
		$pages_public         = $this->config->item('checkLogin')['pages_public'];
		$sessions_id          = $this->config->item('checkLogin')['sessions_id'];
		
		$class = $this->ci->router->fetch_class();
		$method = $this->ci->router->fetch_method();
		$currentRoute = $this->getUriCurrent();
		
		if ( $this->ci->session->has_userdata($sessions_id) == FALSE )
		{ 										
			$typePage = $this->verifyRoutePublicPage( $currentRoute, $pages_public);
			
			if( $typePage=='PRIVATE') // verifica si la ruta actual es PRIVADA
				redirect( $default_page_public,'refresh' );	

		} else
		{
			if( $currentRoute == $page_login )			
				redirect( $default_page_private,'refresh' );	
		}

	}

	private function getUriCurrent()
	{
		$route = "";

		for ($i=1; $i < 10; $i++) 
		{ 
			if($this->uri->segment($i))
				$route = $route.'/'. $this->uri->segment($i);
			
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