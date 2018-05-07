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

		if( $this->ci->config->item('auditor_insert') )
		{
			$query = $this->db->last_query();
			$this->db->insert('auditor_query', [ 
													'class_controller'  =>$this->router->fetch_class(), 
													'method_controller' =>$this->router->fetch_method(),
													'class_model'       =>__CLASS__,
													'method_model'      =>__METHOD__,
													'query'             =>$query,
													'execution_date'    =>date('Y-m-d H:i:s')
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

		if( $this->ci->config->item('auditor_update') )
		{
			$query = $this->db->last_query();
			$this->db->insert('auditor_query', [ 
													'class_controller'  =>$this->router->fetch_class(), 
													'method_controller' =>$this->router->fetch_method(),
													'class_model'       =>__CLASS__,
													'method_model'      =>__METHOD__,
													'query'             =>$query,
													'execution_date'    =>date('Y-m-d H:i:s')
												]
							);
		}
		
	}

	public function delete($id)
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$this->db->where('id_'.$nameTable, $id);	
		$this->db->delete($nameTable);

		if( $this->ci->config->item('auditor_delete') )
		{
			$query = $this->db->last_query();
			$this->db->insert('auditor_query', [ 
													'class_controller'  =>$this->router->fetch_class(), 
													'method_controller' =>$this->router->fetch_method(),
													'class_model'       =>__CLASS__,
													'method_model'      =>__METHOD__,
													'query'             =>$query,
													'execution_date'    =>date('Y-m-d H:i:s')
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
