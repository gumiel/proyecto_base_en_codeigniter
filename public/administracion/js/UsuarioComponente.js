
var ctnBotonera         = new ContainerJS("#ctnBotonera");

var ctnTabla            = new ContainerJS("#ctnTabla");
var ctnModalCrearUsuario  = new ContainerJS("#modalCrearUsuario");
// var ctnModalEditarActor = new ContainerJS("#modalEditarActor");

var tblUsuario = new CDataTable('#tblUsuario');



ctnTabla.registerTable(tblUsuario, 'tblUsuario');

ctnModalCrearUsuario.registerId('formCrearUsuario', '$formCrearUsuario');
// ctnModalEditarActor.registerId('formEditarActor');
// ctnModalEditarActor.registerElement('#formEditarActor', 'formEditarActor');


ctnTabla._iniciar = function(){
    var self = this;
    self.llenarTabla();
};

ctnTabla.llenarTabla = function(res){

    var self = this;
	self.tblUsuario.clean(); // Limpia primeramente la tabla si es que tiene algun dato           

    var url  = '/administracion/usuarioComponente/listaAjax';
    var data = '';

    CallRest.post(url, data, function(res){
        $.each(res.usuarios, function(index, usuario) {
            var row = "";
            row += "<tr>";
            row += "    <td><input type='hidden'name='id_usuario' value='"+usuario.id_usuario+"' /></td>";
            row += "    <td>"+usuario.email+"</td>";
            row += "    <td>"+usuario.cuenta+"</td>";
            row += "    <td>"+usuario.fecha_creacion+"</td>";
            row += "    <td>"+usuario.fecha_modificacion+"</td>";
            row += "</tr>";

            self.tblUsuario.append(row);                 
        });

        self.tblUsuario.simpleSelect();
    });

};

ctnBotonera._iniciar = function(){
	var self = this;

	self.ele.find('#btnCrear').click(function(event) {
		ctnModalCrearUsuario.ele.modal();
	});

//     self.ele.find('#btnEditar').click(function(event) {
//         ctnModalEditarActor.obtenerActor();
//         ctnModalEditarActor.ele.modal();
//     });

    self.ele.find('#btnActualizar').click(function(event) {
        ctnTabla.llenarTabla();
    });

//     self.ele.find('#btnEliminar').click(function(event) {
//         bootbox.confirm("¿Desea elimnar este registro?", function(res){ 
            
//             if(res){
//                 var self = this;
//                 var dataActor = ctnActor.tblActor.getIds();
//                 var actor_id  = dataActor[0].actor_id;   

//                 var url = '/actor/delete' 
//                 var data = {actor:{actor_id: actor_id}};
                
//                 CallRest.post(url, data, function(res)
//                 {
//                     if(res.result==1)
//                     {
//                         Notificacions.success();  
//                         ctnActor.llenarTabla();                  
//                     }else{
//                         Notificacions.errors()
//                     }
//                 });
//             }            

//         });
//     });
}

ctnModalCrearUsuario._iniciar = function(){
	
    var self = this;	

	self.$formCrearUsuario.validate({
        rules: {
            "usuario[cuenta]": {
                required: true
            },
            "usuario[email]": {
                required: true,
                email: true,
            },
            "usuario[clave]": {
                required: true
            },
            "usuario[rep_clave]": {
                required: true,
                equalTo: 'input[name="usuario[clave]"]'
            },
        },
    });

	ctnModalCrearUsuario.insertarUsuario();        

};

// ctnModalEditarActor._iniciar = function(){
//     // alert(this._prueba.html());
//     var self = this;    

//     this.formEditarActor.validate({
//         rules: {
//             "actor[first_name]": {
//                 required: true
//             },
//             "actor[last_name]": {
//                 required: true
//             },
//             "actor[actor_id]": {
//                 required: true
//             }
//         }
//     });

//     self.editarActor();        

// }

ctnModalCrearUsuario.insertarUsuario = function(){

	var self = this;	
	this.$formCrearUsuario.submitValidation(function(resultado){
        
        if(resultado) 
        {
            var url  = "/administracion/usuario/createAjax";            
            var data = self.$formCrearUsuario.serialize();
            
            CallRest.post(url, data, function(res) {
                if(res.result==1)
                {
                    self.ele.modal("hide");
                    Notificacions.success();                    
                    ctnModalCrearUsuario.limpiarFormulario();
                    ctnTabla.llenarTabla();
                }else{
                    Notificacions.errors('asdasd');
                }
            });
        }

    });
};

// ctnModalEditarActor.obtenerActor = function(){
//     var self = this;
//     var dataActor = ctnActor.tblActor.getIds();
//     var actor_id  = dataActor[0].actor_id;   

//     var url = '/actor/get' 
//     var data = {actor:{actor_id: actor_id}};


//     CallRest.post(url, data, function(res)
//     {
//         if(res.result==1)
//         {            
//             self.llenarFormularioEdicion(res.actor);      
//         }else{
//             Notificacions.errors()
//         }
//     });
// }

// ctnModalEditarActor.editarActor = function(){    
//     var self = this;    

//     this.formEditarActor.submitValidation(function(resultado){
        
//         if(resultado) 
//         {
//             var url  = "/actor/edit";            
//             var data = self.formEditarActor.serialize();
            
//             CallRest.post(url, data, function(res)
//             {
//                 if(res.result==1)
//                 {
//                     self.ele.modal("hide");
//                     self.limpiarFormulario();
//                     Notificacions.success();  
//                     ctnActor.llenarTabla();                  
//                 }else{
//                     Notificacions.errors()
//                 }
//             });
//         }

//     });
// }

ctnModalCrearUsuario.limpiarFormulario = function(){
	var self = this;
    self.$formCrearActor.trigger("reset");
};

// ctnModalEditarActor.limpiarFormulario = function(){
//     this.formEditarActor.trigger("reset");
// }

// ctnModalEditarActor.llenarFormularioEdicion = function(actor){
//     var self = this;
//     self.limpiarFormulario();
//     console.log("aqui");
//     self.ele.find("input[name='actor[first_name]']").val(actor.first_name);
//     self.ele.find("input[name='actor[last_name]']").val(actor.last_name);
//     self.ele.find("input[name='actor[actor_id]']").val(actor.actor_id);
// }




jQuery(document).ready(function($) {
	// console.log("/*-*/-*/-*/");
	ctnTabla.init();
	ctnBotonera.init();
	ctnModalCrearUsuario.init();
	// ctnModalEditarActor.init();
});