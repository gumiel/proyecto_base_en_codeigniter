<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditor
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function query($query = null, $classController=null, $methodController=null, $classModel=null, $methodModel=null, $session_id_send=null)
	{
		if( $this->ci->config->item('auditor_update') )
		{
			$id         = $this->ci->config->item('sessions_id');
			$session_id = ( $this->ci->session->has_userdata($id) )? $this->ci->session->userdata($id): 0;
			
			$query            = ( $query!=null )? $query: $this->ci->db->last_query();
			$classController  = ( $classController==null )? $this->ci->router->fetch_class(): $classController;
			$methodController = ( $methodController==null )? $this->ci->router->fetch_method():$methodController;
			$classModel       = ( $classModel==null )? __CLASS__: $classModel;
			$methodModel      = ( $methodModel==null )? __METHOD__: $methodModel;
			$session_id       = ( $session_id_send==null )? $session_id: $session_id_send;
			
			$this->ci->db->insert('auditor_query', [ 
													'class_controller'  => $classController, 
													'method_controller' => $methodController,
													'class_model'       => $classModel,
													'method_model'      => $methodModel,
													'query'             => $query,
													'execution_date'    => date('Y-m-d H:i:s'),
													'user'				=> $session_id,
													'type'				=> 'MANUAL',
												]
							);
		}
	}

}

/* End of file Auditor.php */
/* Location: ./application/libraries/Auditor.php */
