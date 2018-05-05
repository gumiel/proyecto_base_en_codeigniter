<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/rules/Rule.php';

class Usuario_rule {

	protected $ci;	
	use Rule;

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

}

/* End of file Usuario_rule.php */
/* Location: ./application/libraries/rules/Usuario_rule.php */