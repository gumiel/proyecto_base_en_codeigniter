<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

trait Generic {

	public $nameClass;

	public function getClass()
	{
		return $this->comvertNameTable(get_class($this));
		// return "hola";
	}

	public function insert($data)
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$res = $this->db->insert($nameTable, $data);


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

	public function update($id, $data)
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$this->db->where('id_'.$nameTable, $id);
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

	public function delete($id)
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$this->db->where('id_'.$nameTable, $id);	
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

	public function getId($id)
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$this->db->where('id_'.$nameTable, $id);
		$res = $this->db->get($nameTable);
		return $res->row();
	}

	public function get($array=array())
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$this->db->where($array);
		$res = $this->db->get($nameTable);
		return $res->row();
	}

	public function count($array=array())
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$this->db->select('count(*) as c');
		$this->db->where($array);
		$res = $this->db->get($nameTable);			
		return $res->row()->c;	
	}

	public function getAll()
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$this->db->get($nameTable);
	}

	public function comvertNameTable($nameModel)
	{
		return strtolower(str_replace("_model","", $nameModel));
	}

}
