<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/rules/Rule.php';

class Usuario_rule {

	use Rule;

	public function rule()
	{

		$rule = array(
		    array(
		        'field' => 'usuario[cuenta]',
		        'label' => 'Cuenta',
		        'rules' => array( 'required','trim')
		    ),
		    array(
		        'field' => 'usuario[email]',
		        'label' => 'Email',
		        'rules' => array( 'required','trim','valid_email')
		    ),
		);

		return $rule;
	}

}

/* End of file Usuario_rule.php */
/* Location: ./application/libraries/rules/Usuario_rule.php */