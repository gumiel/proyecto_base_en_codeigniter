/*--------------------------------------*/
/* Contenedores */
/*--------------------------------------*/
var ctnBotonera           = new ContainerJS("#ctnBotonera");
var ctnBuscador           = new ContainerJS("#ctnBuscador");
var ctnTabla              = new ContainerJS("#ctnTabla");

var ctnModalCrearUsuario  = new ContainerJS("#modalCrearUsuario");
var ctnModalEditarUsuario = new ContainerJS("#modalEditarUsuario");
var ctnModalAsignarRol    = new ContainerJS("#modalAsignarRol");





/*--------------------------------------*/
/* Tablas */
/*--------------------------------------*/
var tblUsuario = new CDataTable('#tblUsuario');
var tblListRol = new CDataTable('#tblListRol');




/*--------------------------------------*/
/* Registrar tablas en los componentes*/
/*--------------------------------------*/
ctnTabla.registerTable(tblUsuario, 'tblUsuario');
ctnModalAsignarRol.registerTable(tblListRol, 'tblListRol');





/*--------------------------------------*/
/* Registrar tablas en los componentes*/
/*--------------------------------------*/
ctnBuscador.registerId('formBuscador', '$formBuscador');
ctnModalCrearUsuario.registerId('formCrearUsuario', '$formCrearUsuario');
// ctnModalEditarActor.registerId('formEditarUsuario');
ctnModalEditarUsuario.registerElement('#formEditarUsuario', 'formEditarUsuario');


ctnBuscador._iniciar = function(){
    var self = this;    
    self.$formBuscador.submitValidation(function(resultado){
        
        if(resultado) 
        {
            var data = self.$formBuscador.serialize();
            ctnTabla.llenarTabla(data);
        }

    });
};

ctnTabla._iniciar = function(){
    var self = this;
    self.llenarTabla();
};

ctnTabla.llenarTabla = function(dataFilter){

    var self = this;
	self.tblUsuario.clean(); // Limpia primeramente la tabla si es que tiene algun dato           

    var url  = '/nucleo/NucUsuario/listaAjax';
    var data = dataFilter;

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

    self.ele.find('#btnEditar').click(function(event) {
        ctnModalEditarUsuario.obtenerUsuario();
        ctnModalEditarUsuario.ele.modal();
    });

    self.ele.find('#btnActualizar').click(function(event) {
        ctnTabla.llenarTabla();
    });

    self.ele.find('#btnEliminar').click(function(event) {
        bootbox.confirm("¿Desea elimnar este registro?", function(res){ 
            
            if(res){
                var self = this;
                var dataUsuario = ctnTabla.tblUsuario.getIds();
                var id_usuario  = dataUsuario[0].id_usuario;   

                var url = "/nucleo/NucUsuario/deleteUsuarioAjax"; 
                var data = {usuario:{id_usuario: id_usuario}};
                
                CallRest.post(url, data, function(res){

                    if(res.result==1)
                    {
                        Notificacions.success();  
                        ctnTabla.llenarTabla();                  
                    }else{
                        Notificacions.errors();
                    }
                });
            }            

        });
    });

    self.ele.find("#btnAsignarRol").click(function(event){

        var dataFind = ctnTabla.tblUsuario.getIds();
        var id_usuario  = dataFind[0].id_usuario;

        if( typeof id_usuario != "undefined" )
        {
            ctnModalAsignarRol.ele.modal();
            ctnModalAsignarRol.llenarTablaRoles(id_usuario);
        }

    });
};

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

ctnModalEditarUsuario._iniciar = function(){
    
    var self = this;    

    self.formEditarUsuario.validate({
        rules: {
            "usuario[cuenta]": {
                required: true
            },
            "usuario[email]": {
                required: true,
                email: true,
            },
            "usuario[rep_clave]": {
                equalTo: '#clave'
            },
        }
    });

    self.editarUsuario();        

};

ctnModalCrearUsuario.insertarUsuario = function(){

	var self = this;	
	this.$formCrearUsuario.submitValidation(function(resultado){
        
        if(resultado) 
        {
            var url  = "/nucleo/NucUsuario/createAjax";            
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

ctnModalEditarUsuario.obtenerUsuario = function(){
    var self = this;
    var dataUsuario = ctnTabla.tblUsuario.getIds();
    var id_usuario  = dataUsuario[0].id_usuario;   

    var url = '/nucleo/NucUsuario/getUsuarioAjax';
    var data = {usuario:{id_usuario: id_usuario}};


    CallRest.post(url, data, function(res){
        if(res.result==1)
        {            
            self.llenarFormularioEdicion(res.usuario);      
        }else{
            Notificacions.errors();
        }
    });
};

ctnModalEditarUsuario.editarUsuario = function(){    
    var self = this;    

    self.formEditarUsuario.submitValidation(function(resultado){
        
        if(resultado) 
        {
            var url  = "/nucleo/NucUsuario/editAjax";            
            var data = self.formEditarUsuario.serialize();
            
            CallRest.post(url, data, function(res){
                if(res.result==1)
                {
                    self.ele.modal("hide");
                    self.limpiarFormulario();
                    Notificacions.success();  
                    ctnTabla.llenarTabla();                  
                }else{
                    Notificacions.errors();
                }
            });
        }

    });
};

ctnModalCrearUsuario.limpiarFormulario = function(){
	var self = this;
    self.$formCrearUsuario.trigger("reset");
};

ctnModalEditarUsuario.limpiarFormulario = function(){
    var self = this;
    self.formEditarUsuario.trigger("reset");
};

ctnModalEditarUsuario.llenarFormularioEdicion = function(data){
    var self = this;
    self.limpiarFormulario();
    
    self.ele.find("input[name='usuario[cuenta]']").val(data.cuenta);
    self.ele.find("input[name='usuario[email]']").val(data.email);
    self.ele.find("input[name='usuario[id_usuario]']").val(data.id_usuario);
};

ctnModalAsignarRol._iniciar = function(){
    var self = this;

    self.ele.find("#actualizarUsuarioRol").click(function(event){

        var dataFind = ctnTabla.tblUsuario.getIds();
        var id_usuario  = dataFind[0].id_usuario;

        if( typeof id_usuario != "undefined" )
        {            
            self.llenarTablaRoles(id_usuario);
        }
    });

    self.ele.on("click", "input[name='asignacionRol']", function(ele){
        var idUsuario = $(this).val();
        
        if(idUsuario!=null){
            self.cambiarAsignacionRol(idUsuario);
        }

    });
};


ctnModalAsignarRol.llenarTablaRoles = function(idUsuario){
    var self = this;

    self.tblListRol.clean();

    var url  = '/nucleo/NucUsuarioRol/listPorUsuarioAjax';
    var data = { "nuc_usuario":{ "id_usuario":idUsuario}};

    CallRest.post(url, data, function(res){
        $.each(res.usuario_roles, function(index, data) {
            var row = "";
            var checkbox = (data.id_usuario_rol!=null)? "checked='checked'":"";
            row += "<tr>";
            row += "    <td><input type='hidden' name='id_usuario_rol' value='"+data.id_usuario_rol+"' /></td>";
            row += "    <td><input type='checkbox' name='asignacionRol' "+checkbox +" value='"+data.id_rol+"' ></td>";
            row += "    <td>"+data.denominacion+"</td>";
            row += "    <td>"+data.descripcion+"</td>";
            row += "</tr>";

            self.tblListRol.append(row);                 
        });

        self.tblListRol.simple();
    });

};


ctnModalAsignarRol.cambiarAsignacionRol = function(idRol){

    var self = this;

    var dataFind = ctnTabla.tblUsuario.getIds();
    var id_usuario  = dataFind[0].id_usuario;

    var url  = "/nucleo/NucUsuarioRol/cambiarAsignacionRol";            
    var data = { nuc_usuario_rol: { id_rol: idRol, id_usuario: id_usuario}};
    
    CallRest.post(url, data, function(res){
        if(res.result==1)
        {            
            Notificacions.success(); 
            self.llenarTablaRoles(id_usuario);
        }else{
            Notificacions.errors();
        }
    });

};



jQuery(document).ready(function($) {
	
	ctnTabla.init();
	ctnBotonera.init();
	ctnModalCrearUsuario.init();
	ctnModalEditarUsuario.init();
    ctnBuscador.init();
    ctnModalAsignarRol.init();

});