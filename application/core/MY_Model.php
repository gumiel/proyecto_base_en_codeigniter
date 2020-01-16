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
class Generic_model extends My_model
{

	public $nameClass;
	public $nameTable = '';
	public $nameForeignKey = '';
	
	// Estes son los configuradores para el primary key de la tabla como por Ejemplo "id_user"
	private $positionStart     = ''; // Puede ser ( id, i, identificaro, vacio o cualquier nombre )
	private $positionSeparator = ''; // Puede ser ( , - . vacio o cualquier caracter ) 
	private $positionEnd       = ''; // Puede ser ( nameTable ó vacio ) 
											  //Si es nameTable tomara el nombre de la tabla por defecto 
											  //Si es vacio ya no tomara 
	private $typeResult; // Es el tipo de resultado que podria devolvernos
	
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
		return ($this->nameTable=='')? $this->comvertNameTable(get_class($this)): $this->nameTable;
	}



	/**
	 * Ingresa un nuevo registro en la base de datos segudo la tabla de la clase model relacionada 
	 * 
	 * @param  array  Es un arreglo asociativo con todos los datos que se insertaran en la bd
	 * @return integer       retorna el id asociado al nuevo registro 	
	 */
	public function insert($data)
	{		
		if(!isset($data['id_usuario_creacion']) || $data['id_usuario_creacion']==null || $data['id_usuario_creacion']==''){
			$data['id_usuario_creacion'] = $this->session->userdata('id_usuario');			
		} 

		if(!isset($data['fecha_creacion']) || $data['fecha_creacion']==null || $data['fecha_creacion']==''){
			$data['fecha_creacion'] = date("Y-m-d H:i:s");		
		} 


		$this->nameTable = $this->getNameTable();
		$res = $this->db->insert($this->nameTable, $data);
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
		if(!isset($data['id_usuario_modificacion']) || $data['id_usuario_modificacion']==null || $data['id_usuario_modificacion']==''){
			$data['id_usuario_modificacion'] =  $this->session->userdata('id_usuario');		
		} 

		if(!isset($data['fecha_modificacion']) || $data['fecha_modificacion']==null || $data['fecha_modificacion']==''){
			$data['fecha_modificacion'] = date("Y-m-d H:i:s");		
		} 

		$this->nameTable = $this->getNameTable();
		$this->db->where( $array );
		$this->db->update($this->nameTable, $data);
		
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
		$this->db->where($this->nameIdentificatorTable(), $id);
		$this->db->update( $this->nameTable, $data);
		
	}



	/**
	 * Elimina un registro en la base de datos segun la tabla de la clase model relacionada
	 * 
	 * @param  integer $id es la column aidentificadora del registro
	 */
	public function delete($array)
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where($array);	
		$this->db->delete($this->nameTable);

	}



	/**
	 * Elimina un registro en la base de datos segun la tabla de la clase model relacionada
	 * 
	 * @param  integer $id es la column aidentificadora del registro
	 */
	public function deleteById($id)
	{
		$this->nameTable = $this->getNameTable();
		$this->db->where($this->nameIdentificatorTable(), $id);	
		$this->db->delete($this->nameTable);

	}



	/**
	 * Devuelve un registro unico de la seleccion segun el id de la base de datos (Usando ID)
	 * 
	 * @param  integer $id Identificador de la tabla para la busqueda
	 * @return array_asoc  $array   El resultado a la busqueda de registros en la base de datos
	 */
	public function getById($id, $tipo = null)
	{
		$this->obtenerDatosDeConfiguracion();

		if($tipo == null){
			$tipo = $this->typeResult;			
		}

		$this->nameTable = $this->getNameTable();
		$this->db->where($this->nameIdentificatorTable(), $id);
		$res = $this->db->get($this->nameTable);
		return ($tipo == 'array')? $res->row_array(): $res->row();
	}



	/**
	 * Devuelve un registro unico de la seleccion segun el id de la base de datos (Usando arreglo array_asociativo)			
	 * 
	 * @param  array  $array Es un arreglo asociativo que se envia para poder seleccionar un registro
	 * @return array_asoc  $array  El resultado a la busqueda de registros en la base de datos
	 */
	public function get($array=array(), $tipo = null)
	{
		$this->obtenerDatosDeConfiguracion();

		if($tipo == null){
			$tipo = $this->typeResult;			
		}
		
		$this->nameTable = $this->getNameTable();
		$this->db->where($array);
		$res = $this->db->get($this->nameTable);
		return ($tipo == 'array')? $res->row_array(): $res->row();
	}



	/**
	 * Cantidad de registros encontrados por la consulta en la base de datos
	 * 
	 * @param  array_asoc  $array Es un arreglo asociativo de todos los datos que seran usados para la busqueda de registros
	 * @return integer        Es la cantidad de registros encontrados
	 */
	public function count($array=array(), $tipo = null)
	{
		$this->obtenerDatosDeConfiguracion();

		if($tipo == null){
			$tipo = $this->typeResult;			
		}

		$this->nameTable = $this->getNameTable();

		$this->db->select('count(*) as c');
		
		if ( sizeof($array)>0 ){
			$this->db->where($array);
		}
		
		$res = $this->db->get($this->nameTable);	

		return ($tipo == 'array')? $res->row_array()->c: $res->row()->c;	

	}



	/**
	 * Devuelve todos los registros seleccionados de la tabla y si esta vacio revolvera todos los registros de la tabla
	 * 
	 * @param  array_asoc  $array Son todos los datos en arreglo asociativo que se buscaran
	 * @return array         Es un arreglo normal con todos los registros encontrados
	 */
	public function getAll( $array=array() , $tipo = null)
	{
		$this->obtenerDatosDeConfiguracion();

		if($tipo == null){
			$tipo = $this->typeResult;			
		}

		$result = null;
		if ( sizeof($array)>0 )
		{
			$this->nameTable = $this->getNameTable();
			$this->db->where($array);
						
			$result = ($tipo=='array')? $this->db->get($this->nameTable)->result_array(): $this->db->get($this->nameTable)->result();	
			
		} else
		{
			$this->nameTable = $this->getNameTable();
			
			$result = ($tipo=='array')? $this->db->get($this->nameTable)->result_array(): $this->db->get($this->nameTable)->result();
			
		}

		return $result;
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



	private function nameIdentificatorTable()
	{

		$this->obtenerDatosDeConfiguracion();

		$positionStart     = ( $this->positionStart=='nameTable' )? $this->nameTable: $this->positionStart;
		$positionSeparator = ( $this->positionSeparator=='nameTable' )? $this->nameTable: $this->positionSeparator;
		$positionEnd       = ( $this->positionEnd=='nameTable' )? $this->nameTable: $this->positionEnd;
		
		return ($this->nameForeignKey == '')? $positionStart.$positionSeparator.$positionEnd: $this->nameForeignKey;
	}

	private function obtenerDatosDeConfiguracion()
	{
		$this->config->load('otros/config_generic_model');

		$this->positionStart     = $this->config->item('gm_positionStart');
		$this->positionSeparator = $this->config->item('gm_positionSeparator');
		$this->positionEnd       = $this->config->item('gm_positionEnd');
		$this->typeResult        = $this->config->item('gm_type_result');		

	}

	protected function tableName($name)
	{
		if(isset($name) && $name != '' && $name != null ){
			$this->nameTable = $name;			
		}
	}

	protected function foreignKeyName($name)
	{
		if(isset($name) && $name != '' && $name != null ){
			$this->nameForeignKey = $name;			
		}
		
	}


}