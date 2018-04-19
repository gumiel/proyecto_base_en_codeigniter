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
		// echo FCPATH;
		// exit;
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

	public function export()
	{
		// Load the DB utility class
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');

		$prefs = array(
	        'format'        => 'txt',                       // gzip, zip, txt
	        'filename'      => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
	        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
	        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
	        'newline'       => "\n"                         // Newline character used in backup file
		);

		// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup($prefs);

		// Load the file helper and write the file to your server
		write_file(FCPATH.'codeigniter.backupBD.sql', $backup);

		// Load the download helper and send the file to your desktop
		force_download('codeigniter.backupBD.sql', $backup);
	}

	public function import()
	{
		if ($this->dbforge->drop_database('codeigniter'))
		{
		    echo 'Database deleted!<br>';
		}

		if ($this->dbforge->create_database('codeigniter'))
		{
		    echo 'Database created!<br>';
		    $this->db->query(file_get_contents(FCPATH."codeigniter.backupBD.sql"));
		}
	}

}

/* End of file Backup.php */
/* Location: ./application/controllers/Backup.php */