## PROYECTO CODEIGNITER


Este proyecto en CI es un una plantilla para empezar a programar directamente en Codeigniter.

## CODE CONVENTION

Name is function 'CALL_BACK' of validation is underscode at first
Example.

$this->form_validation->set_rules('entity[tribute]', 'Label tribute', 'trim|required|callback__verifyEmail');

public function _verifyEmail(){
	.............
}

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
