<?php 
// echo "string";
$config['pages_public']         = [ "/publico/publico/login", "/publico/publico/payment", "/publico/publico/crearCaptcha"];
$config['default_page_private'] = [ "/publico/publico/login" ];
$config['sessions_id']          = "id_usuario"; // Este es el identificador de session que sera igual al ID de la base de datos de la tabla USUARIO
$config['page_login']           = "/publico/publico/login";
$config['process_login']        = "/publico/publico/loginProcess";
$config['default_page_private'] = "/usuario/lista";
$config['default_page_public']  = "/publico/publico/login";

?>