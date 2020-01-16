<?php 
$config['sessions_id']          = "id_usuario"; // Este es el identificador de session que sera igual al ID de la base de datos de la tabla USUARIO

$config['pages_public']         = [ "/nucleo/nuc_publico/login", 
									"/nucleo/nuc_publico/payment", 
									"/nucleo/nuc_publico/crearCaptcha", 
								];
								
$config['page_login']           = "/nucleo/nuc_publico/login";
$config['process_login']        = "/nucleo/nuc_publico/loginProcess";
$config['close_login']          = "/nucleo/nuc_usuario/desconectar";
$config['default_page_public']  = "/nucleo/nuc_publico/login";
$config['default_page_private'] = "/nucleo/nuc_principal/inicio";


?>