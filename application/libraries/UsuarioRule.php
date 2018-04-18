<?php 

class UsuarioRule
{
	public $rule = array(
		        [
	                'field' => 'usuario[nombres]',
	                'label' => 'Nombres',
	                'rules' => 'required|trim'
		        ],		        
		        [
	                'field' => 'usuario[paterno]',
	                'label' => 'Apellido Paterno',
	                'rules' => 'required|trim'
		        ],
				[
	                'field' => 'usuario[materno]',
	                'label' => 'Apellido Materno',
	                'rules' => 'required|trim'
		        ],
		        [
	                'field' => 'usuario[usuario]',
	                'label' => 'Usuario',
	                'rules' => 'required|trim'
		        ],
		        [
	                'field' => 'usuario[email]',
	                'label' => 'Email',
	                'rules' => 'required|trim'
		        ],
		        [
	                'field' => 'usuario[ci]',
	                'label' => 'CI',
	                'rules' => 'required|trim'
		        ]		        

			);

	public function apply()
	{
		return $this->rule;
	}

	public function add($fiel, $label, $rules)
	{
		array_push($this->rule, [$fiel, $label, $rules]);
	}

	

}


 ?>