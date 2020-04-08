<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateCI
{
	protected $ci;

	public $title = "ADMIN DEV";
	public $icono = "";
	public $titlePage = "";
	public $descriptionPage = "";

	private $listCss = [
				["url"=> "public/template/bower_components/bootstrap/dist/css/bootstrap.min.css"],
				["url"=> "public/template/bower_components/font-awesome/css/font-awesome.min.css"],
				["url"=> "public/template/bower_components/Ionicons/css/ionicons.min.css"],
				["url"=> "public/template/dist/css/AdminLTE.min.css"],
				["url"=> "public/template/dist/css/skins/_all-skins.min.css"],
				["url"=> "public/template/dist/css/SourceSansPro.css"],
				["url"=> "public/template/dist/css/app.css"],
			
				/* Integracion con datatble */
				["url"=> "public/libs/datatables/css/datatables.min.css"],
				["url"=> "public/libs/datatables/css/select.dataTables.min.css"],
				["url"=> "public/libs/datatables/css/buttons.dataTables.min.css"],
				["url"=> "public/libs/datatables/css/fixedHeader.bootstrap.min.css"],
				["url"=> "public/libs/datatables/css/responsive.bootstrap.min.css"],
				
			];



	private $listJs = [
				["url"=> "public/libs/jquery/jquery.min.js"],
				["url"=> "public/template/bower_components/bootstrap/dist/js/bootstrap.min.js"],
				["url"=> "public/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"],
				["url"=> "public/template/bower_components/fastclick/lib/fastclick.js"],
				["url"=> "public/libs/bootstrap-notify/bootstrap-notify.min.js"],
				["url"=> "public/libs/bootbox/js/bootbox.min.js"],
				["url"=> "public/libs/jquery-validation/js/jquery.validate.min.js"],
				["url"=> "public/configurations/config.jquery.validate.js"],
				["url"=> "public/template/dist/js/adminlte.min.js"],
				["url"=> "public/template/dist/js/app.js"],
				["url"=> "public/template/dist/js/demo.js"],

				/* Integracion con datatble */
				["url"=> "public/libs/datatables/js/jquery.dataTables.min.js"],
				["url"=> "public/libs/datatables/js/dataTables.bootstrap.min.js"],
				["url"=> "public/libs/datatables/js/dataTables.select.min.js"],
				["url"=> "public/libs/datatables/js/dataTables.buttons.min.js"],
				["url"=> "public/libs/datatables/responsive/dataTables.responsive.min.js"],

				["url"=> "public/libs/datatables/exports/buttons.flash.min.js"],
			    ["url"=> "public/libs/datatables/exports/jszip.min.js"],
			    ["url"=> "public/libs/datatables/exports/pdfmake.min.js"],
			    ["url"=> "public/libs/datatables/exports/vfs_fonts.js"],
			    ["url"=> "public/libs/datatables/exports/buttons.html5.min.js"],
			    ["url"=> "public/libs/datatables/exports/buttons.print.min.js"],
			    ["url"=> "public/libs/datatables/js/dataTables.fixedHeader.min.js"],
			    ["url"=> "public/libs/datatables/js/dataTables.responsive.min.js"],
			    ["url"=> "public/libs/datatables/js/responsive.bootstrap.min.js"],

			    /* PNotify */
			    ["url"=> "public/libs/pnotify/js/pnotify.custom.min.js"],


				/* Configuradores de integracion con componentes */
				["url"=> "public/configurations/config.js"],
				["url"=> "public/configurations/config.jquery.validate.js"],

				/* Integracion con componentes */
				["url"=> "public/core/ContainerJS.js"],
				["url"=> "public/components/CallRest.js"],
				["url"=> "public/components/CDatatable.js"],
				["url"=> "public/components/Notifications.js"],
			];

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->icono = base_url('/public/assets/images/favicon.ico');
	}

	public function menuPrincipal()
	{
		// Para saber los iconos ingresar a http://localhost/codeigniter/recursos/AdminLTE-master/pages/UI/icons.html
		$res = [ 
					["name" => "Inicio", "url" => "/nucleo/NucPrincipal/inicio", "icon" => "fa fa-dashboard" ],			
					["name" => "Nucleo", "url" => "#", "icon" => "fa fa-fw fa-gear", 
						'subMenu'=> [
										["name" => "Usuarios", "url" => "/nucleo/NucUsuario/index"],
										["name" => "Roles", "url" => "/nucleo/NucRol/index"],
										["name" => "Permisos", "url" => "/nucleo/NucPermiso/index"],
										["name" => "Rutas", "url" => "/nucleo/NucRuta/index",
											'subMenu'=> [
											["name" => "Producto", "url" => "/mod_compras/comProducto/"],
										]],
									] 
					],
					["name" => "Modulo de Pagos", "url" => "principal/inicio", "icon" => "fa fa-bank", 
						'subMenu'=> [
										["name" => "Producto", "url" => "/mod_compras/comProducto/"],
									] 
					],

				];
		
		return $res;
	}

	public function menuPrincipal2()
    {
        $sql = "SELECT id, label, link, parent FROM menus ORDER BY parent, sort, label";
        $result = $this->ci->db->query($sql);
        
        $datas = $result->result_array();
        
        
        $menus = array(
                'items' => array(),
                'parents' => array()
        );

        foreach ($datas as $items) {
            // Create current menus item id into array
            $menus['items'][$items['id']] = $items;
            // Creates list of all items with children
            $menus['parents'][$items['parent']][] = $items['id'];
        }



        // Print all tree view menus 
        echo $this->createTreeView(0, $menus);

    }

	public function createTreeView($parent, $menu) {
        $html = "";
		if (isset($menu['parents'][$parent])) 
		{
			// $html .= "<ul class='tree'>";
            foreach ($menu['parents'][$parent] as $itemId) {
                if(!isset($menu['parents'][$itemId])) {
                    $html .= "<li><label for='subfolder2'> -1- <a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['label']."</a></label> <input type='checkbox' name='subfolder2'/></li>";
                }
                if(isset($menu['parents'][$itemId])) {
                    $html .= "
                    <li class='treeview'><a href='".$menu['items'][$itemId]['link']."'><i class='fa fa-circle-o text-red'></i>".$menu['items'][$itemId]['label']."</a>";
                    $html .= $this->createTreeView($itemId, $menu);
                    $html .= "</li>";
                }
            }
            // $html .= "</ul>";
        }
        return $html;

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
		// $this->icono = '111'.base_url('/public/images/favicon.ico');
	}

	public function setDescriptionPage($descriptionPage)
	{
		$this->descriptionPage = $descriptionPage;
	}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
