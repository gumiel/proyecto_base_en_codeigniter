<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*Se tiene que defiinir la forma que seran los primary key Ejm id_nametabla*/
// El 'Identificador' Puede ser ( id, i, identificaro, vacio o cualquier nombre )
// El 'Separador' Puede ser ( , - . vacio o cualquier caracter ) 
// El 'Nombre de tabla' Puede ser ( nameTable ó vacio ) 



/* Este es un ejemplo de un primary key id_usuario */
$config['gm_positionStart'] = 'id'; 
$config['gm_positionSeparator'] = '_';
$config['gm_positionEnd'] = 'nameTable';



/* Este es un ejemplo de un primary key user_id */
// $config['gm_positionStart'] = 'nameTable'; 
// $config['gm_positionSeparator'] = '_';
// $config['gm_positionEnd'] = 'id';

