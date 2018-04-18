<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{
		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup();

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('codeigniter.backupBD.gz', $backup);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('codeigniter.backupBD.gz', $backup);
	}

}

/* End of file Backup.php */
/* Location: ./application/controllers/Backup.php */