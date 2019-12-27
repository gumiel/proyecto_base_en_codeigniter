<?php 

$config['pages_public']         = [ "/publico/login", 
									"/publico/payment",
									"/publico/crearCaptcha",
									];
$config['sessions_id']          = "id_usuario"; // Este es el identificador de session que sera igual al ID de la base de datos de la tabla USUARIO
$config['page_login']           = "/publico/login";
$config['process_login']        = "/publico/loginProcess";
$config['default_page_private'] = "/usuario/lista";
$config['default_page_public']  = "/publico/login";

?>