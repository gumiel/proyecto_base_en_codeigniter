<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	// use UsuarioRule;
	

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('form_ci');
		$this->load->library('form_validation');
		$this->load->library('rules/Usuario_rule');		
		$this->load->library('Utils');
		// $this->load->library('lib_log');

		$this->load->model('usuario_model');

	}

	public function index()
	{
		$data = array();		
		$data["usuarios"] = $this->usuario_model->listUsuario();

		$this->load->view('usuario/index', $data);
	}

	public function lista()
	{

		$data = array();		
		$data["usuarios"] = $this->usuario_model->listUsuario();

		$this->load->view('usuario/listaUsuarios', $data);

	}

	public function listaAjax()
	{

		$data = array();
		$data["usuarios"] = $this->usuario_model->listUsuario();
		$data["result"] = 1;
		$this->utils->json($data);
	}


	public function createUsuario()
	{
		$usuario = $this->input->post("usuario");


		$this->form_validation->set_rules($this->usuario_rule->apply());
		$this->form_validation->set_rules('usuario[cuenta]', 'Cuenta', 'callback__verificar_cuenta_repetida');
		$this->form_validation->set_rules('usuario[rep_password]', 'Repetir Contraseña', 'trim|required|callback__validar_repetir_password['.$usuario["password"].']');

		if ( $this->form_validation->run() ) 
		{
			unset($usuario["rep_password"]);
			$usuario["password"] = md5($usuario["password"]);

			$this->usuario_model->insert($usuario);
			$this->session->set_flashdata('message', [ "success"=>"Se creo el usuario" ]);
			redirect('usuario/lista');
		} else
		{			
			$this->session->set_flashdata('message', [ "error"=>validation_errors() ]);
			$this->lista();
		}

	}

	public function createAjax()
	{
		$usuario = $this->input->post("usuario");


		$this->form_validation->set_rules($this->usuario_rule->apply());
		$this->form_validation->set_rules('usuario[cuenta]', 'Cuenta', 'callback__verificar_cuenta_repetida');
		$this->form_validation->set_rules('usuario[rep_password]', 'Repetir Contraseña', 'trim|required|callback__validar_repetir_password['.$usuario["password"].']');

		if ( $this->form_validation->run() ) 
		{
			unset($usuario["rep_password"]);
			$usuario["password"] = md5($usuario["password"]);

			$this->usuario_model->insert($usuario);
			$data['result'] = 1;
			$data['message'] = "Se creo el usuario";
			
		} else
		{						
			$data['result'] = 0;
			$data['message'] = validation_errors();
		}

		$this->utils->json($data);
	}

	public function editUsuario()
	{
		$usuario = $this->input->post("usuario");

		$this->form_validation->set_rules($this->usuariorule->apply());
		$this->form_validation->set_rules('usuario[id_usuario]', 'ID', 'trim|required|callback__verificar_id_usuario');

		if ( isset($usuario["password"]) && $usuario["password"] != '')
		{
			$this->form_validation->set_rules('usuario[password]', 'Contraseña', 'trim|required');			
			$this->form_validation->set_rules('usuario[rep_password]', 'Repetir Contraseña', 'trim|required|callback__validar_repetir_password['.$usuario["password"].']');		
			$usuario["password"] = md5($usuario["password"]);
				
		} else
		{
			unset($usuario["password"]);
		}
		

		if ( $this->form_validation->run() )
		{
	
			unset($usuario["rep_password"]);			

			$this->usuario_model->update($usuario["id_usuario"], $usuario);
			$this->session->set_flashdata('message', [ "success"=>"Se edito el registro" ]);
		} else
		{
			$this->session->set_flashdata('message', [ "error"=>validation_errors() ]);

		}
		redirect('usuario/lista','refresh');

	}

	public function editAjax()
	{
		$usuario = $this->input->post("usuario");

		$this->form_validation->set_rules($this->usuariorule->apply());
		$this->form_validation->set_rules('usuario[id_usuario]', 'ID', 'trim|required|callback__verificar_id_usuario');

		if ( isset($usuario["password"]) && $usuario["password"] != '')
		{
			$this->form_validation->set_rules('usuario[password]', 'Contraseña', 'trim|required');			
			$this->form_validation->set_rules('usuario[rep_password]', 'Repetir Contraseña', 'trim|required|callback__validar_repetir_password['.$usuario["password"].']');		
			$usuario["password"] = md5($usuario["password"]);
				
		} else
		{
			unset($usuario["password"]);
		}
		

		if ( $this->form_validation->run() )
		{
	
			unset($usuario["rep_password"]);			

			$this->usuario_model->update($usuario["id_usuario"], $usuario);
			$this->session->set_flashdata('message', [ "success"=>"Se edito el registro" ]);
		} else
		{
			$this->session->set_flashdata('message', [ "error"=>validation_errors() ]);

		}
		redirect('usuario/lista','refresh');

	}

	public function desconectar()
	{
		$this->session->sess_destroy();
		$this->config->load('SystemSupervisor/config');
		redirect($this->config->item('page_login'),'refresh');
	}




























	public function getUsuarioAjax()
	{
		$data = array();

		$usuario = $this->input->post("usuario");
		$data["usuario"] = $this->usuario_model->getId($usuario["id_usuario"]);  

		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
		exit;
	}

	public function deleteUsuarioAjax()
	{
		$usuario = $this->input->post("usuario");
		$data = array();

		$this->form_validation->set_rules('usuario[id_usuario]', 'ID', 'trim|required|callback__verificar_id_usuario');

		if ( $this->form_validation->run() )
		{
			$this->usuario_model->delete($usuario["id_usuario"]);
			$data["result"] = 1;
		} else
		{
			$data["result"] = 0;
			$data["msg"] = validation_errors();
		}
		
		$this->utils->json($data);
	}




























	public function _verificar_cuenta_repetida($cuenta)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Ya existe la cuenta');
		$cantidad = $this->usuario_model->count( [ 'cuenta'=>$cuenta ] );
		return ( $cantidad==0 );
	}

	public function _validar_repetir_password($repPassword, $password)
	{
		$this->form_validation->set_message(__FUNCTION__, 'Repetir el mismo password escrito');
		return ($repPassword == $password);		
	}

	public function _verificar_id_usuario($idUsuario)
	{
		$this->form_validation->set_message(__FUNCTION__, 'No existe el identificador del usuario');
		if ($idUsuario > 0)
		{			
			$usuario = $this->usuario_model->getId($idUsuario);			
			return ( isset($usuario) );
		} else
		{
			return FALSE;
		}
	}


	

}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */