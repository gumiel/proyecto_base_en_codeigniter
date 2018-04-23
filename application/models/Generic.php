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
		$this->db->insert($nameTable, $data);
	}

	public function update($id, $data)
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$this->db->where('id_'.$nameTable, $id);
		$this->db->update($nameTable, $data);
		
	}

	public function delete($id)
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$this->db->where('id_'.$nameTable, $id);	
		$this->db->delete($nameTable);
	}

	public function getId($id)
	{
		$nameTable = $this->comvertNameTable(get_class($this));
		$this->db->where('id_'.$nameTable, $id);
		$res = $this->db->get($nameTable);
		return $res->row();
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
