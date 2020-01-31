<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NucMenu extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
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
        // var_dump($menus); 
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
                    $html .= "<li><label for='subfolder2'>1<a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['label']."</a></label> <input type='checkbox' name='subfolder2'/></li>";
                }
                if(isset($menu['parents'][$itemId])) {
                    $html .= "
                    <li><label for='subfolder2'>0<a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['label']."</a></label> <input type='checkbox' name='subfolder2'/>";
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