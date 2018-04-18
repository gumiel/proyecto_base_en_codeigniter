<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utils
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function json($data)
	{
		$this->ci->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
		exit;
	}

}

/* End of file utils.php */
/* Location: ./application/libraries/utils.php */
