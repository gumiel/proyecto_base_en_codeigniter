<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/rules/Rule.php';

class ExampleTwo_Rule
{
	protected $ci;	
	use Rule;

	public $closureValidName;

	public function __construct()
	{
        $this->ci =& get_instance();

        $this->closureValidName = function($login) {
			//$nameValidName = 'valid_name';
			$this->ci->form_validation->set_message( 'valid_name' , "Not is valid Name");
			return ( $login=='smith' );	
		}; 

		// $this->initClousures();
	}

	public function rule()
	{

		$rule = array(
		    array(
		        'field' => 'user[name]',
		        'label' => 'Login',
		        'rules' => array( 'required','trim', [ 'valid_name' , $this->closureValidName ])
		    ),
		    array(
		        'field' => 'user[login]',
		        'label' => 'Login',
		        'rules' => array( 'required','trim', array('valid_user', 
				        		function($password)
						        {
						        	$this->ci->form_validation->set_message( 'valid_user' , "Not is valid User");
						        	return ( $password=='smith' );											        		
						        })
		        			)
		    ),
		    array(
		        'field' => 'user[password]',
		        'label' => 'Password',
		        'rules' => [ 'required', 'trim', $this->valid_password(), $this->is_numeric_custom() ]
		    )
		);

		return $rule;
	}


	
	

	public function valid_password()
	{
		$namefunction = __FUNCTION__;
        return [ 	
        			$namefunction , 
	        		function($password) use ($namefunction)
			        {
			        	$this->ci->form_validation->set_message( $namefunction , "Not is valid Password");
			        	return ( $password=='123' );											        		
			        }
		        ];
	}

	public function is_numeric_custom()
	{
		$namefunction = __FUNCTION__;
		return [ $namefunction , 
					function($password) use ($namefunction)
			        {
			        	$this->is_numeric_custom_process($password, $namefunction);											        		
			        } 

			  	];
	}

	public function is_numeric_custom_process($password, $namefunction) 
	{
		$this->ci->form_validation->set_message( $namefunction, "Not is numeric");
		return is_numeric($password);
	}

	

}

/* End of file ExampleTwoRule.php */
/* Location: ./application/libraries/moduleTwo/ExampleTwoRule.php */
