<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//
		$tablesRequired = array("auditor_query");
	}

	public function index()
	{

		$this->load->view('configuration/index');
	}

	private function verifyTables()
	{		

		$existingTables = $this->db->list_tables();

		foreach ($tablesRequired as $table)
		{
		    if (in_array($table, $existingTables) == false) {
 				return false;
 				break;
			}

		}

		return true;
		
	}

}



/* End of file Configuration.php */
/* Location: ./application/controllers/Configuration.php */