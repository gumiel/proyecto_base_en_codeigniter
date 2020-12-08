Este es un proyecto en Codeigniter que tiene desarrollado partes muy importantes y basica que muchas aplicaciones usan como LOGIN, CONTROL DE ROLES, AUDITORIA DE ACCIONES, TEMPLATE DE LA APP, CONTROL DE ACCESSOS Etc. Este desarrollo no restringe el uso cotidiano de Codeigniter por tal motivo que si no desearia usar algo de la estructura usted pueda cambiarlo o usar su propio desarrollo.<br>

## DEMO
La demo del uso esta en proceso pero lo pueden ver en.<br>
Url(Actualizado 20-01-2020): http://bit.ly/2tn2tNT<br>
Usuario: admin<br>
Contraseña: 123<br>
Solo se tiene como ejemplo la creacion de usuarios pero se puede ver la estructura.
<img src="http://res.cloudinary.com/daid2fusr/image/upload/v1526505003/inicio_cvrqjv.jpg" >

<img src="http://res.cloudinary.com/daid2fusr/image/upload/v1526504520/lista_usuarios_pcq23q.jpg" >

## ESTRUCTURA DE DIRECTORIO NUEVOS
Estos son los nuevos archivos y carpetas que se crearon. Estos archivos son necesarios para desplegar la aplicacion pero no son obligatorios usarlos<br>
  
```
application/
----config/
--------auditor/
------------config.php
--------SystemSupervisor/
------------config.php
----helpers/
--------form_ci_helper.php
----libreries/
--------Auditor.php
--------Lib_log.php
--------TemplateCI.php
--------Utils.php
----models/
--------Generic.php
----template/
--------breadcrumb.php
--------css.php
--------down.php
--------js.php
--------menu.php
--------notify.php
--------sidebar-menu.php
--------up.php

recursos/
----AdminLTE-master/
```


## INCLUYEN PLUGINS Y LIBRERIAS
Se agregaron los siguientes plugins y librerias al proyecto para la agilidad de desarrollo<br>

#### JAVASCRIPT NECESARIOS
- AdminLTE => https://adminlte.io/<br>
- Bootstrap => http://getbootstrap.com/docs/3.3<br>
- Jquery => https://jquery.com<br>
- Jquery Validation => https://jqueryvalidation.org<br>
- Jquery DataTable => https://datatables.net<br>
- BotBox => http://bootboxjs.com<br>
- Bootstrap Notify => http://bootstrap-notify.remabledesigns.com<br>

#### JAVASCRIPT SUGERIDOS
-....<br>





## SUGERENCIA DE CONVENCIONES DE CODIGO
* El nombre de las funciones "CALL_BACK" de las validaciones empiezan con "_" <br>
Name is function 'CALL_BACK' of validation is underscode at first<br>
Example.<br>
$this->form_validation->set_rules('entity[tribute]', 'Label tribute', 'trim|required|callback__verifyEmail');<br>

```
public function _verifyEmail(){
	.............
}
```
* La creacion de las tablas en el proyecto deben ser en singular Ejm. usuario.<br>
Esto es para que se usen la letra "s" en las listas "usuarios". Ejm $data["usuarios"] = $this->usuario_model->listUsuario();<br>
<br>

* Los metodos del "CONTROLADOR" si son llamadas Ajax tiene que tener el sufijo "Ajax" Por Ejemplo.<br>

```
public function creationAjax(){
    ...........	
}
```

* Si un boton tiene ID en HTML tiene que empezar con el prefijo "btn" Por Ejemplo.<br>
```
 <button id="btnSubmitForm">Submit</button>
```

* Si un modal tiene ID en el HTML tiene que empezar con el prefijo "modal" Por Ejemplo. <br>

```
<div id="modalFormCreate" class="modal fade" role="dialog">
.................
.................
</div>
```

* Si una tabla tiene ID en el html tiene que empezar con el prefijo "tbl" Por Ejemplo.<br>
```
<table id="tblListUser" class="table table-condensed">
.............
</table>
```

* Si un input tiene ID en el html tiene que empezar en el prefijo "input" Por Ejemplo.<br>
```
<input id="inputDirecction" name="user['direction']" />
```

## PROYECTO CODEIGNITER



#### Plantillas base.

- Tiene como plantilla en PHP al Framework CODEIGNITER 3 de donde puede descargarse => https://codeigniter.com/

- Tiene como plantilla base para el backend al template AdminTLE => https://adminlte.io 

#### Librerias CI agregadas (NUEVAS)

- Libreria para manipular las plantillas como los nuevos CSS y JS 
/libreries/TemplateCi.php

- Libreria para tener utilitarios extras 
/libreries/utils.php


#### Librerias CI agregadas (DESCARGADAS)

- Libreria para manipular los log y no mostrarlos cuando este en produccion 
/libreries/Lib_log.php

#### Helpers CI agregados (NUEVOS)

- Funciones creadas similares a la del helper "form" de Codeigniter que fueron reescritos para BOOTSTRAP 3 y implementa el label
/helpers/form_ci_helper.php

#### Componentes JS agregados

#### Componentes CSS agregados


#### Hook (Creados)
- Tiene una clase que controla toda accion como por ejemplo las sessiones

/hooks/SystemSupervisor.php
