<?php 

trait UsuarioRule
{
	public $rule = array(
		        [
	                'field' => 'usuario[nombre]',
	                'label' => 'Nombres',
	                'rules' => 'required'
		        ],	        
			);

	public function apply()
	{
		return $this->rule;
	}

}


 ?>