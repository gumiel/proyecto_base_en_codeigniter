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
		
		$class = $this->ci->router->fetch_class();
		$method = $this->ci->router->fetch_method();
		
		if ( $this->ci->session->has_userdata('id_usuario') == FALSE )
		{ 	
			// $this->session->unset_tempdata('id_usuario');
			// $this->session->sess_destroy();			
			redirect('usuario/login');
		} else if ( $class == "usuario" && $method == "login" )
		{
			redirect('pagina/index');
		}

	}


}
/*
/end hooks/home.php
*/