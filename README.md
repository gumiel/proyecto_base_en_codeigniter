## DEMO
La demo del uso esta en proceso pero lo pueden ver en.<br>
Url: https://goo.gl/K6xJ2h<br>
Usuario: admin<br>
Contraseña: admin<br>
<img src="http://res.cloudinary.com/daid2fusr/image/upload/v1526505003/inicio_cvrqjv.jpg" >

<img src="http://res.cloudinary.com/daid2fusr/image/upload/v1526504520/lista_usuarios_pcq23q.jpg" >

## CONVENCIONES DE CODIGO
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

* Si un modal tiene ID en el HTML tiene que empezar con el prefijo "modal" Por Ejemplo.
<br>
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
Este proyecto en CI es un una plantilla para empezar a programar directamente en Codeigniter.


Demo: http://www.ci.gumiel.es
Usuario: smith
Contraseña: smith



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
