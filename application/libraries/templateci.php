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
					["name" => "Inicio", "icon" => "fa fa-book", "url" => "principal/inicio" ],
					["name" => "Contactanos", "icon" => "fa fa-book", "url" => "principal/inicio" ],
					["name" => "Usuarios", "icon" => "fa fa-user", "url" => "usuario/lista" ],
		];
		return $res;
	}

	public function setMenuPrincipal()
	{

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
