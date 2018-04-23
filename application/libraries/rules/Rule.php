<?php
defined('BASEPATH') OR exit('No direct script access allowed');

trait Rule
{
	
	protected $ci;
	public $config;

	public function __construct()
	{
        $this->ci =& get_instance();
        $config = array();
	}

	public function apply()
	{
		return $this->rule();
	}	


}

/* End of file Rule.php */
/* Location: ./application/libraries/rules/Rule.php */



