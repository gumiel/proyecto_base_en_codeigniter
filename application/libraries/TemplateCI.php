<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateCI
{
	protected $ci;

	public $title = "ADMINISTRADOR";
	public $titlePage = "";
	public $descriptionPage = "";

	private $listCss = [
				["url"=> "public/bower_components/bootstrap/dist/css/bootstrap.min.css"],
				["url"=> "public/bower_components/font-awesome/css/font-awesome.min.css"],
				["url"=> "public/bower_components/Ionicons/css/ionicons.min.css"],
				["url"=> "public/dist/css/AdminLTE.min.css"],
				["url"=> "public/dist/css/skins/_all-skins.min.css"],
				["url"=> "public/dist/css/SourceSansPro.css"],
				["url"=> "public/dist/css/app.css"]];

	private $listJs = [
				["url"=> "public/bower_components/jquery/dist/jquery.min.js"],
				["url"=> "public/bower_components/bootstrap/dist/js/bootstrap.min.js"],
				["url"=> "public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"],
				["url"=> "public/bower_components/fastclick/lib/fastclick.js"],
				["url"=> "public/bower_components/bootstrap-notify/bootstrap-notify.min.js"],
				["url"=> "public/bower_components/bootbox/bootbox.min.js"],
				["url"=> "public/bower_components/jquery-validation/jquery.validate.min.js"],
				["url"=> "public/bower_components/jquery-validation/jquery.validate.config.js"],
				["url"=> "public/dist/js/adminlte.min.js"],
				["url"=> "public/dist/js/app.js"],
				["url"=> "public/dist/js/demo.js"]];

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function menuPrincipal()
	{
		// Para saber los iconos ingresar a http://localhost/codeigniter/recursos/AdminLTE-master/pages/UI/icons.html
		$res = [ 
					["name" => "Inicio", "url" => "principal/inicio", "icon" => "fa fa-dashboard" ],			
					["name" => "Usuarios", "url" => "#", "icon" => "fa fa-user", 
						'subMenu'=> [
										["name" => "Usuarios", "url" => "/administracion/usuario/index"],
										["name" => "Roles", "url" => "/administracion/rol/index"],
										["name" => "Rutas", "url" => "/administracion/ruta/index"],
									] 
					],
					["name" => "Cobranza", "url" => "principal/inicio", "icon" => "fa fa-bank", 
						'subMenu'=> [
										["name" => "Cobros Simples", "url" => "/pagos/cobradoTotal/simple"],
										["name" => "Cobros con Cheques", "url" => "/pagos/cobradoTotal/simple"],
									] 
					],
				];

		$sql = "SELECT id_menu, nombre as name, ruta as url, icono as icon, '' as subMenu, id_menu_padre FROM menu";
		$query = $this->ci->db->query($sql);
		$result = $query->result_array();
		
		// $res = array();

		// foreach ($result as $menu) 
		// {
		// 	if( $menu['url']=='' && $menu['id_menu_padre']=='0')
		// 	{
		// 		array_push($res, array('name'=> $menu['name'],
		// 							'url'=> $menu['url'],
		// 							'icon'=> $menu['icon']
		// 							)
		// 				);
		// 		$res = array_shift($res); // quita el primer elemento
				
		// 	} else{
		// 		array_push($res, 
		// 					array('name'=> $menu['name'],
		// 						'url'=> $menu['url'],
		// 						'icon'=> $menu['icon'],
		// 						'subMenu'=> $this->obtenerSubMenu($menu['id_menu_padre'], $result)
		// 					)
		// 				);
		// 	}

			
		// }
		
		return $res;
	}

	public function obtenerSubMenu($id_menu_padre, $result)
	{	
		if(isset($result)){
			foreach ($result as $menu) 
			{
				if( $menu['url']=='' &&  $menu['id_menu_padre'] == $id_menu_padre )
				{
					array_push($result, array('name'=> $menu['name'],
										'url'=> $menu['url'],
										'icon'=> $menu['icon']
										)
							);
					$result = array_shift($result); // quita el primer elemento
					
				} else{

					array_push($result, 
								array('name'=> $menu['name'],
									'url'=> $menu['url'],
									'icon'=> $menu['icon'],
									'subMenu'=> $this->obtenerSubMenu($menu['id_menu_padre'], $result)
								)
							);
				}

				
			}
		}
		else{
			return false;
		}
		
	}

	

	public function listCss()
	{		
		return $this->listCss;
	}

	public function setListCss($arrayCss)
	{
		$this->listCss = $arrayCss;
	}

	public function addEndListCss($arrayCss)
	{
		foreach ($arrayCss as $css) {
			array_push($this->listCss, $css);
		}
	}

	public function listJs()
	{
		return $this->listJs;
	}

	public function setListJsEnd($arrayJs)
	{
		$this->listJs = $arrayJs;
	}

	public function addJs($arrayJs)
	{
		if ( is_array($arrayJs) )
		{
			foreach ($arrayJs as $js) {
				array_push($this->listJs, $js);
			}
		} else
		{
			array_push($this->listJs, ["url"=>$arrayJs]);
		}	
	}

	public function addEndListJs($arrayJs)
	{
		foreach ($arrayJs as $js) {
			array_push($this->listJs, $js);
		}
	}
	
	public function setTitlePage($title){
		$this->titlePage = $title;
	}

	public function setDescriptionPage($descriptionPage)
	{
		$this->descriptionPage = $descriptionPage;
	}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
