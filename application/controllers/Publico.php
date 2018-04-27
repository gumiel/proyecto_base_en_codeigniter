<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publico extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->library('form_validation');

		$this->load->helper('form_ci_helper');

		$this->load->model('usuario_model');
	}

	public function index()
	{
		
	}

	public function login()
	{
		
		$this->load->view('publico/login');
	}

	public function loginProcess()
	{
		$usuario = $this->input->post("usuario");
		
		$this->form_validation->set_rules('usuario[cuenta]', 'Cuenta', 'trim|required');
		$this->form_validation->set_rules('usuario[password]', 'Contraseña', 'trim|required|callback__verifyUsuarioPassword['.$usuario['cuenta'].']');
		
		if ($this->form_validation->run() == true)
		{
			$usuarioFind = $this->usuario_model->get( [ "cuenta"=>$usuario['cuenta'], "password"=>md5($usuario['password']) ] );
			$newSession = array(
		        'id_usuario'     => $usuarioFind->id_usuario,
		        'nombre'     => $usuarioFind->nombres.' '.$usuarioFind->materno.' '.$usuarioFind->paterno ,
		        'cuenta'  => $usuarioFind->cuenta
			);

			$this->session->set_userdata($newSession);
			$this->session->set_flashdata('message', [ "success"=>"Ingresaste al sistema" ]);
			redirect('principal/inicio','refresh');
		} else
		{
			$this->session->set_flashdata('message', [ "error"=>validation_errors() ]);
			redirect('publico/login','refresh');
		}

	}

	public function payment()
	{
		$this->load->view('publico/payment');
	}








	public function _verifyUsuarioPassword($password, $cuenta)
	{
		$this->form_validation->set_message(__FUNCTION__, 'El password no coincide');		
		$count = $this->usuario_model->count( ["cuenta"=>$cuenta, "password"=>md5($password)] );
		return ( $count == 1); 		
	}

	public function test()
	{
		// $this->load->library('uri', $config);
		$this->config->load('SystemSupervisor/config');

		echo "Hello";
		echo $this->getUri();
		// echo "<pre>";
		// var_dump($this->config->item('checkLogin')['pages_public']);
		// echo "</pre>";
		echo ( $this->verifyRoutePublicPage( $this->getUri(), [ "/publico/login", "/publico/test"]) )? "<br>if": "<br>else";
	}	

	private function getUri()
	{
		$route = "";

		for ($i=1; $i < 10; $i++) 
		{ 
			if($this->uri->segment($i)){
				$route = $route.'/'. $this->uri->segment($i);
			}
		}
		return $route;
	}

	private function verifyRoutePublicPage($route = '', $arrayPages = array() )
	{
		foreach ($arrayPages as $value) 
		{
			if ( $value == $route )
			{
				return true;
				break;
			}
		}
		return false;
	}

}

/* End of file publico.php */
/* Location: ./application/controllers/publico.php */