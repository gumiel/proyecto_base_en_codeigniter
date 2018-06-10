<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class My_model extends CI_Model
{
 	public function construct(){
		parent::__construct();
 	}
}

/**
 * Esta clase sera heredada por los model del desarrollo para poder consumir sus metodos genericos
 * 
 * @author: Henry Perez Gumiel prez.gumiel@gmail.com
 * @version: Beta 06/06/2018/
 * @see https://github.com/gumiel/librarie-codeigniter-generic-model
 */
class Generic extends My_model
{

	public $nameClass;
	public $nameTable;
	
	// Estes son los configuradores para el primary key de la tabla como por Ejemplo "id_user"
	private $positionStart     = 'id'; // Puede ser ( id, i, identificaro, vacio o cualquier nombre )
	private $positionSeparator = '_'; // Puede ser ( , - . vacio o cualquier caracter ) 
	private $positionEnd       = 'nameTable'; // Puede ser ( nameTable ó vacio ) 
											  //Si es nameTable tomara el nombre de la tabla por defecto 
											  //Si es vacio ya no tomara 
	
	public function construct()
	{
		parent::__construct();
	}



	/**
	 * Devuelve el nombre de la clase model
	 * 
	 * @return string nombre de clase model
	 */
	public function getNameClass()
	{
		return get_class($this);
	}



	/**
	 * Devuelve el nombre de la tabla relacionada a la clase model
	 * 
	 * @return string nombre de tabla
	 */
	public function getNameTable()
	{
		return $this->comvertNameTable(get_class($this));		
	}



	/**
	 * Ingresa un nuevo registro en la base de datos segudo la tabla de la clase model relacionada 
	 * 
	 * @param  array  Es un arreglo asociativo con todos los datos que se insertaran en la bd
	 * @return integer       retorna el id asociado al nuevo registro 	
	 */
	public function insert($data)
	{
		$this->nameTable = $this->getNameTable();
		$res = $this->db->insert($this->nameTable, $data);

		if( $this->config->item('auditor_insert') )
			$this->auditorAction();

		return $res;
	}



	/**
	 * Actualiza un registro en la base de datos segun la tabla de la clase model relacionada	
	 * 	
	 * @param  array $data el arreglo de todos los datos que se actualizaran
	 * @param  array_asoc $array   es un arreglo asociativo de los datos que van en el WHERE 
	 */
	public function update($data, $array)
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where( $array );
		$this->db->update($this->nameTable, $data);

		if( $this->config->item('auditor_update') )
			$this->auditorAction();
		
	}



	/**
	 * Actualiza un registro en la base de datos segun la tabla de la clase model relacionada	
	 * 	
	 * @param  array $data el arreglo de todos los datos que se actualizaran
	 * @param  integer $id   es la columna identificadora del registro	 
	 */
	public function updateById($data, $id)
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where('id_'.$this->nameTable, $id);
		$this->db->update( $this->nameTable, $data);

		if( $this->config->item('auditor_update') )
			$this->auditorAction();
		
	}



	/**
	 * Elimina un registro en la base de datos segun la tabla de la clase model relacionada
	 * 
	 * @param  integer $id es la column aidentificadora del registro
	 */
	public function delete($id)
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where('id_'.$this->nameTable, $id);	
		$this->db->delete($this->nameTable);

		if( $this->config->item('auditor_delete') )
			$this->auditorAction();

	}



	/**
	 * Elimina un registro en la base de datos segun la tabla de la clase model relacionada
	 * 
	 * @param  integer $id es la column aidentificadora del registro
	 */
	public function deleteById($id)
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where('id_'.$this->nameTable, $id);	
		$this->db->delete($this->nameTable);

		if( $this->config->item('auditor_delete') )
			$this->auditorAction();

	}



	/**
	 * Devuelve un registro unico de la seleccion segun el id de la base de datos (Usando ID)
	 * 
	 * @param  integer $id Identificador de la tabla para la busqueda
	 * @return array_asoc  $array   El resultado a la busqueda de registros en la base de datos
	 */
	public function getById($id)
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where('id_'.$this->nameTable, $id);
		$res = $this->db->get($this->nameTable);
		return $res->row();
	}



	/**
	 * Devuelve un registro unico de la seleccion segun el id de la base de datos (Usando arreglo array_asociativo)			
	 * 
	 * @param  array  $array Es un arreglo asociativo que se envia para poder seleccionar un registro
	 * @return array_asoc  $array  El resultado a la busqueda de registros en la base de datos
	 */
	public function get($array=array())
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where($array);
		$res = $this->db->get($this->nameTable);
		return $res->row();
	}



	/**
	 * Cantidad de registros encontrados por la consulta en la base de datos
	 * 
	 * @param  array_asoc  $array Es un arreglo asociativo de todos los datos que seran usados para la busqueda de registros
	 * @return integer        Es la cantidad de registros encontrados
	 */
	public function count($array=array())
	{

		$this->nameTable = $this->getNameTable();

		$this->db->select('count(*) as c');
		$this->db->where($array);
		$res = $this->db->get($this->nameTable);			
		return $res->row()->c;	
	}



	/**
	 * Devuelve todos los registros seleccionados de la tabla y si esta vacio revolvera todos los registros de la tabla
	 * 
	 * @param  array_asoc  $array Son todos los datos en arreglo asociativo que se buscaran
	 * @return array         Es un arreglo normal con todos los registros encontrados
	 */
	public function getAll( $array=array() )
	{
		if ( sizeof($array)>0 )
		{
			$this->nameTable = $this->getNameTable();
			$this->db->where($array);
			return $this->db->get($this->nameTable)->result_array();	
		} else
		{
			$this->nameTable = $this->getNameTable();
			return $this->db->get($this->nameTable)->result_array();
		}
	}



	/**
	 * Convierte el el nombre de nombre de la clase a nombre de tabla
	 * 
	 * @param  string $nameModel nombre de clase
	 * @return string            nombre de tabla
	 */
	private function comvertNameTable($nameModel)
	{
		return strtolower(str_replace("_model","", $nameModel));
	}



	private function nameIdentificatorTable( )
	{
		$positionStart     = ( $this->positionStart=='nameTable' )? $this->nameTable: $this->positionStart;
		$positionSeparator = ( $this->positionSeparator=='nameTable' )? $this->nameTable: $this->positionSeparator;
		$positionEnd       = ( $this->positionEnd=='nameTable' )? $this->nameTable: $this->positionEnd;
		return $positionStart.$positionSeparator.$positionEnd;
	}



	private function auditorAction()
	{
		$id         = $this->config->item('sessions_id');
		$session_id = ( $this->ci->session->has_userdata($id) )? $this->session->userdata($id): 0;
		$query      = $this->db->last_query();
		
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