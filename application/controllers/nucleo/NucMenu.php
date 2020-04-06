<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NucMenu extends CI_Controller {

    public $arregloMenus = array();
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function index2()
    {
        $sql = "SELECT id, label, link, parent FROM menus ORDER BY parent, sort, label";
        $result = $this->db->query($sql);
        $datos = $result->result_array();

        $this->llammada(0, 0);

        echo '<pre>';
        var_dump($this->arregloMenus);
        echo '</pre>';
    }

    function get_menu_items()
    {
        // Change the field names and the table name in the query below to match tour needs
        // $sql = 'SELECT id, parent_id, title, link, position FROM menu_item ORDER BY parent_id, position;';
        // return $this->fetch_assoc_all( $sql );
        $sql = "SELECT id, parent_id, title, link, position FROM menu_item ORDER BY parent_id, position;";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function get_menu_html( $root_id = 0 )
    {
        $this->html  = array();
        $this->items = $this->get_menu_items();

        foreach ( $this->items as $item )
            $children[$item['parent_id']][] = $item;

        // loop will be false if the root has no children (i.e., an empty menu!)
        $loop = !empty( $children[$root_id] );

        // initializing $parent as the root
        $parent = $root_id;
        $parent_stack = array();

        // HTML wrapper for the menu (open)
        $this->html[] = '<ul>';
        // var_dump($children);
        // while ( $loop && ( ( $option = each( $children[$parent] ) ) || ( $parent > $root_id ) ) )
        if($loop && $parent > $root_id){
            foreach ($children[$parent] as $option)
            {
                if ( $option === false )
                {
                    $parent = array_pop( $parent_stack );

                    // HTML for menu item containing childrens (close)
                    $this->html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 ) . '</ul>';
                    $this->html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ) . '</li>';
                }
                elseif ( !empty( $children[$option['value']['id']] ) )
                {
                    $tab = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 );

                    // HTML for menu item containing childrens (open)
                    $this->html[] = sprintf(
                        '%1$s<li><a href="%2$s">%3$s</a>',
                        $tab,   // %1$s = tabulation
                        $option['value']['link'],   // %2$s = link (URL)
                        $option['value']['title']   // %3$s = title
                    ); 
                    $this->html[] = $tab . "\t" . '<ul class="submenu">';

                    array_push( $parent_stack, $option['value']['parent_id'] );
                    $parent = $option['value']['id'];
                }
                else
                    // HTML for menu item with no children (aka "leaf") 
                    $this->html[] = sprintf(
                        '%1$s<li><a href="%2$s">%3$s</a></li>',
                        str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ),   // %1$s = tabulation
                        $option['value']['link'],   // %2$s = link (URL)
                        $option['value']['title']   // %3$s = title
                    );
            }
        }

        // HTML wrapper for the menu (close)
        $this->html[] = '</ul>';

        echo implode( "\r\n", $this->html );
    }

    function llammada($idPadre)
    {
        $posicion++;

        $sql = "SELECT id, label, link, parent FROM menus WHERE parent = ".$idPadre." ORDER BY parent, sort, label";
        $result = $this->db->query($sql);
        $datos = $result->result_array();
        

        foreach ($datos as $dato) {
            array_push($this->arregloMenus, $dato);
            $dato['menus'] = array();
        }

    }

    public function index()
    {
        $sql = "SELECT id, label, link, parent FROM menus ORDER BY parent, sort, label";
        $result = $this->db->query($sql);
        
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
        
        echo "<pre>";
        var_dump($menus); 
        echo "</pre>";


        // Print all tree view menus 
        echo $this->createTreeView(0, $menus);

    }

    public function createTreeView($parent, $menu) {
        $html = "";
        if (isset($menu['parents'][$parent])) {
            $html .= "
            <ol class='tree'>";
            foreach ($menu['parents'][$parent] as $itemId) {
                if(!isset($menu['parents'][$itemId])) {
                    $html .= "<li><label for='subfolder2'> -1- <a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['label']."</a></label> <input type='checkbox' name='subfolder2'/></li>";
                }
                if(isset($menu['parents'][$itemId])) {
                    $html .= "
                    <li><label for='subfolder2'> -0- <a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['label']."</a></label> <input type='checkbox' name='subfolder2'/>";
                    $html .= $this->createTreeView($itemId, $menu);
                    $html .= "</li>";
                }
            }
            $html .= "</ol>";
        }
        return $html;

    }


}

/* End of file Controllername.php */

?>