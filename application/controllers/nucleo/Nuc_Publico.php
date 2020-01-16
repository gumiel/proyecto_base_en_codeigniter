<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuc_Publico extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->library('form_validation');

		$this->load->helper('form_ci_helper');

		$this->load->model('nuc_usuario_model');
		$this->load->model('nuc_tipo_usuario_model');
	}

	public function index()
	{
		
	}

	public function login()
	{
		
		$this->load->view('nucleo/nuc_publico/login');
	}

	public function loginProcess()
	{
		$this->config->load('otros/config_system_supervisor');

		$usuario = $this->input->post("usuario");
		$captcha = $this->input->post("captcha");
		
		


		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|callback__verifyCaptcha');
		$this->form_validation->set_rules('usuario[cuenta]', 'Cuenta', 'trim|required');
		$this->form_validation->set_rules('usuario[clave]', 'Contraseña', 'trim|required|callback__verifyUsuarioPassword['.$usuario['cuenta'].']');
		
		if ($this->form_validation->run() == true)
		{		
			
			$usuarioFind = $this->nuc_usuario_model->get( [ "cuenta"=>$usuario['cuenta'] ] );
			$tipoUsuario = $this->nuc_tipo_usuario_model->get( [ "id_tipo_usuario"=>$usuarioFind->id_tipo_usuario ]);
			
			$newSession = array(
		        'id_usuario'     => $usuarioFind->id_usuario,		        
		        'cuenta'  => $usuarioFind->cuenta,
		        'tipo_usuario' => $tipoUsuario->denominacion
			);

			$this->session->set_userdata($newSession);
			$this->session->set_flashdata('message', [ "success"=>"Ingresaste al sistema" ]);
			

			redirect($this->config->item('default_page_private'),'refresh');
		} else
		{
			$this->session->set_flashdata('message', [ "error"=>validation_errors() ]);
			redirect('/nucleo/nuc_publico/login','refresh');
		}

	}

	public function payment()
	{
		$this->load->view('/nucleo/nuc_publico/payment');
	}

	public function crearCaptcha()
	{
		$this->load->library('Captcha_ci');		
		$this->captcha_ci->crear();
		$cadenaCaptchaCreado = $this->captcha_ci->obtenerString();

		$this->session->set_userdata('captcha', $cadenaCaptchaCreado);
		
	}




	public function _verifyCaptcha($captcha)
	{
		$this->form_validation->set_message(__FUNCTION__, 'El captcha no coincide');	
		$captcha_session = $this->session->userdata('captcha');
		return ( $captcha_session == $captcha );
	}

	public function _verifyUsuarioPassword($password, $cuenta)
	{
		$this->load->library('encryption');

		$this->form_validation->set_message(__FUNCTION__, 'El password no coincide');	

		$usuarioFind = $this->nuc_usuario_model->get( [ "cuenta"=>$cuenta ] );

		return (isset($usuarioFind->clave) && $this->encryption->decrypt($usuarioFind->clave)==$password);

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