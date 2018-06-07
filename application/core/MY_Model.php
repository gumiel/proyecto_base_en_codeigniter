<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_model extends CI_Model
{
 	public function construct(){
		parent::__construct();
 	}
}

class Generic extends My_model
{
	public $nameClass;
	public $nameTable;
	
	public function construct()
	{
		parent::__construct();
	}

	// Devuelve el Nombre de la clase Modelo
	public function getNameClass()
	{
		return get_class($this);
	}

	// Devuelve el nombre de la tabla mapeada por el modelo
	public function getNameTable()
	{
		return $this->comvertNameTable(get_class($this));		
	}

	// Inserta datos
	public function insert($data)
	{
		$this->nameTable = $this->getNameTable();
		$res = $this->db->insert($this->nameTable, $data);

		if( $this->config->item('auditor_insert') )
		{
			$id         = $this->config->item('sessions_id');
			$session_id = ( $this->ci->session->has_userdata($id) )? $this->session->userdata($id): 0;
			
			$query = $this->db->last_query();
			
			$this->db->insert('auditor_query', [ 
													'class_controller'  =>$this->router->fetch_class(), 
													'method_controller' =>$this->router->fetch_method(),
													'class_model'       =>__CLASS__,
													'method_model'      =>__METHOD__,
													'query'             =>$query,
													'execution_date'    =>date('Y-m-d H:i:s'),
													'user'				=>$session_id
												]
							);
		}

		return $res;
	}

	// Modifica datos segun el id Ejm: id_entidad
	public function update($data, $id)
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where('id_'.$this->nameTable, $id);
		$this->db->update($nameTable, $data);

		if( $this->config->item('auditor_update') )
		{
			$id         = $this->config->item('sessions_id');
			$session_id = ( $this->ci->session->has_userdata($id) )? $this->session->userdata($id): 0;
			
			$query = $this->db->last_query();
			
			$this->db->insert('auditor_query', [ 
													'class_controller'  =>$this->router->fetch_class(), 
													'method_controller' =>$this->router->fetch_method(),
													'class_model'       =>__CLASS__,
													'method_model'      =>__METHOD__,
													'query'             =>$query,
													'execution_date'    =>date('Y-m-d H:i:s'),
													'user'				=>$session_id
												]
							);
		}
		
	}

	// Elimina datos segun el id Ejm: id_entidad
	public function delete($id)
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where('id_'.$this->nameTable, $id);	
		$this->db->delete($nameTable);

		if( $this->config->item('auditor_delete') )
		{
			$id         = $this->config->item('sessions_id');
			$session_id = ( $this->ci->session->has_userdata($id) )? $this->session->userdata($id): 0;
			
			$query = $this->db->last_query();
			
			$this->db->insert('auditor_query', [ 
													'class_controller'  =>$this->router->fetch_class(), 
													'method_controller' =>$this->router->fetch_method(),
													'class_model'       =>__CLASS__,
													'method_model'      =>__METHOD__,
													'query'             =>$query,
													'execution_date'    =>date('Y-m-d H:i:s'),
													'user'				=>$session_id
												]
							);
		}
	}

	// Obtiene todo el registro segun el id Ejm: id_entidad
	public function getId($id)
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where('id_'.$this->nameTable, $id);
		$res = $this->db->get($this->nameTable);
		return $res->row();
	}

	// Obtiene  todo el registr segun un arreglo de datos Ejm: [ 'id_entidad'=>1, 'nombre'=>'nombre']
	public function get($array=array())
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where($array);
		$res = $this->db->get($this->nameTable);
		return $res->row();
	}

	// Devuelve la cantidad de registros que obtiene 
	public function count($array=array())
	{

		$this->nameTable = $this->getNameTable();

		$this->db->select('count(*) as c');
		$this->db->where($array);
		$res = $this->db->get($this->nameTable);			
		return $res->row()->c;	
	}

	public function getAll()
	{
		$this->nameTable = $this->getNameTable();
		return $this->db->get($this->nameTable)->result_array();
	}

	public function getAllBy( $array=array() )
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where($array);
		return $this->db->get($this->nameTable)->result_array();	
	}

	private function comvertNameTable($nameModel)
	{
		return strtolower(str_replace("_model","", $nameModel));
	}
}