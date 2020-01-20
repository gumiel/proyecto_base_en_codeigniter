<?php 
$config['sessions_id']          = "id_usuario"; // Este es el identificador de session que sera igual al ID de la base de datos de la tabla USUARIO

$config['pages_public']         = [ "/nucleo/NucPublico/login", 
									"/nucleo/NucPublico/payment", 
									"/nucleo/NucPublico/crearCaptcha", 
								];
								
$config['page_login']           = "/nucleo/NucPublico/login";
$config['process_login']        = "/nucleo/NucPublico/loginProcess";
$config['close_login']          = "/nucleo/NucUsuario/desconectar";
$config['default_page_public']  = "/nucleo/NucPublico/login";
$config['default_page_private'] = "/nucleo/NucPrincipal/inicio";


?>