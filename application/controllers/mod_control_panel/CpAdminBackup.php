<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CpAdminBackup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		// Load the DB utility class
		$this->load->dbutil();

		$prefs = array(
			'tables'        => array(),   // Array of tables to backup.
			'ignore'        => array(),                     // List of tables to omit from the backup
			'format'        => 'txt',                       // gzip, zip, txt
			'filename'      => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
			'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
			'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
			'newline'       => "\n"                         // Newline character used in backup file
		);

		// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup($prefs);

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		$fecha = date('Y-m-d_H_i_s');
		
		write_file('backup_db/codeigniter.backupBD.'.$fecha.'.gz', $backup);

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
		// Load the DB utility class
		$this->load->dbforge();
		$this->load->helper('file');
		$this->load->helper('download');
		
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

/* End of file CpAdminBackup.php */
/* Location: ./application/controllers/mod_control_panel/CpAdminBackup.php */