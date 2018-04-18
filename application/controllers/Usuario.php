<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	// use UsuarioRule;
	

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('form_ci');
		$this->load->library('form_validation');
		// $this->load->library('usuariorule');		
		// $this->load->library('utils');
		// $this->load->library('lib_log');

		$this->load->model('usuario_model');

	}

	public function index()
	{
		
	}

	public function lista()
	{

		$data = array();		
		$data["usuarios"] = $this->usuario_model->listUsuario();

		$this->load->view('usuario/listaUsuarios', $data);

	}


	public function createUsuario()
	{
		$usuario = $this->input->post("usuario");


		$this->form_validation->set_rules($this->usuariorule->apply());
		$this->form_validation->set_rules('usuario[password]', 'Contraseña', 'trim|required');
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

	public function editUsuario()
	{
		$usuario = $this->input->post("usuario");

		$this->form_validation->set_rules($this->usuariorule->apply());
		$this->form_validation->set_rules('usuario[id_usuario]', 'ID', 'trim|required|callback__verificarIdUsuario');

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

		$this->form_validation->set_rules('usuario[id_usuario]', 'ID', 'trim|required|callback__verificarIdUsuario');

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






























	public function _validar_repetir_password($repPassword, $password)
	{
		if ($repPassword == $password)
		{
			return TRUE;
		} else
		{
			$this->form_validation->set_message('_validar_repetir_password', 'Repetir el mismo password escrito');
			return FALSE;
		}
	}

	public function _verificarIdUsuario($idUsuario)
	{
		if ($idUsuario > 0)
		{
			
			$usuario = $this->usuario_model->getId($idUsuario);
			
			if ( isset($usuario) )
			{
				return TRUE;
			} else 
			{
				$this->form_validation->set_message('_verificarIdUsuario', 'No existe el identificador del usuario');
				return FALSE;
			}

		} else
		{
			$this->form_validation->set_message('_verificarIdUsuario', 'No existe el identificador del usuario');
			return FALSE;
		}
	}


	

}

/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */