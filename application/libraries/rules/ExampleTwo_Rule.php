<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExampleTwo_Rule
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function rule()
	{
		$config = array(
		    array(
		        'field' => 'user[login]',
		        'label' => 'Login',
		        'rules' => array( 'required','trim')
		    ),
		    array(
		        'field' => 'user[password]',
		        'label' => 'Password',
		        'rules' => array( 'required',
		        					'trim', 
		        					array(
										'valid_password', function($password)
								        {
								        	$this->ci->form_validation->set_message('valid_password', "no.existe.gestion.anual");
								        	return ( $password=='123' );											        		
								        })
		        )
		    )
		);


		return $config;
	}

	public function apply()
	{
		
	}
	

}

/* End of file ExampleTwoRule.php */
/* Location: ./application/libraries/moduleTwo/ExampleTwoRule.php */
