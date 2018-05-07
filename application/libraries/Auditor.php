<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditor
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function query($query = null, )
	{
		if( $this->ci->config->item('auditor_update') )
		{
			$id         = $this->ci->config->item('sessions_id');
			$session_id = ( $this->ci->session->has_userdata($id) )? $this->session->userdata($id): 0;
			
			$query = ( $query!=null )? $query: $this->db->last_query();
			
			$this->db->insert('auditor_query', [ 
													'class_controller'  =>$this->router->fetch_class(), 
													'method_controller' =>$this->router->fetch_method(),
													'class_model'       =>__CLASS__,
													'method_model'      =>__METHOD__,
													'query'             =>$query,
													'execution_date'    =>date('Y-m-d H:i:s'),
													'user'				=>$session_id,
													'type'				=>'MANUAL',

												]
							);
		}
	}

}

/* End of file Auditor.php */
/* Location: ./application/libraries/Auditor.php */
