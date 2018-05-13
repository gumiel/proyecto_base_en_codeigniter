<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/rules/Rule.php';

class Usuario_rule {

	use Rule;

	public function rule()
	{

		$rule = array(
		    array(
		        'field' => 'usuario[nombres]',
		        'label' => 'Nombres',
		        'rules' => array( 'required','trim')
		    ),
		    array(
		        'field' => 'usuario[paterno]',
		        'label' => 'Paterno',
		        'rules' => array( 'required','trim')
		    ),
		    array(
		        'field' => 'usuario[materno]',
		        'label' => 'Materno',
		        'rules' => array( 'required','trim')
		    ),
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
		    array(
		        'field' => 'usuario[ci]',
		        'label' => 'CI',
		        'rules' => array( 'required','trim')
		    ),
		);

		return $rule;
	}

}

/* End of file Usuario_rule.php */
/* Location: ./application/libraries/rules/Usuario_rule.php */