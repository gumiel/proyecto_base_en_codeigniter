<?php 

$config['checkLogin']['pages_public']         = [ "/publico/login", "/publico/payment"];
$config['checkLogin']['default_page_private'] = [ "/publico/login" ];
$config['checkLogin']['sessions_id']          = "id_usuario"; // Este es el identificador de session que sera igual al ID de la base de datos de la tabla USUARIO
$config['checkLogin']['page_login']           = "/publico/login";
$config['checkLogin']['default_page_private'] = [ "/usuario/lista" ];
$config['checkLogin']['default_page_public']  = [ "/publico/login" ];

?>