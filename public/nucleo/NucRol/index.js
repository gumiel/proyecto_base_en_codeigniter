/*--------------------------------------*/
/* Contenedores */
/*--------------------------------------*/
var ctnBotonera           = new ContainerJS("#ctnBotonera");
var ctnBuscador           = new ContainerJS("#ctnBuscador");
var ctnTabla              = new ContainerJS("#ctnTabla");

var ctnModalCreate      = new ContainerJS("#modalCreate");
var ctnModalEdit        = new ContainerJS("#modalEdit");
var ctnModalAsignarPermiso = new ContainerJS("#modalAsignarPermiso");



/*--------------------------------------*/
/* Tablas */
/*--------------------------------------*/
var tblList = new CDataTable('#tblList');
var tblListPermisos = new CDataTable('#tblListPermisos');




/*--------------------------------------*/
/* Registrar tablas en los componentes*/
/*--------------------------------------*/
ctnTabla.registerTable(tblList, 'tblList');
ctnModalAsignarPermiso.registerTable(tblListPermisos, 'tblListPermisos');







/*--------------------------------------*/
/* Registrar tablas en los componentes*/
/*--------------------------------------*/
ctnBuscador.registerId('formBuscador', '$formBuscador');
ctnModalCreate.registerId('formCreate', '$formCreate');
ctnModalEdit.registerElement('#formEdit', '$formEdit');




ctnBotonera._iniciar = function(){
	
	var self = this;
	self.ele.find('#btnActualizar').click(function(event) {
        ctnTabla.llenarTabla();
    });


    self.ele.find('#btnCrear').click(function(event) {
		ctnModalCreate.ele.modal();
	});

	self.ele.find('#btnEditar').click(function(event) {
        ctnModalEdit.obtenerDatos();
        ctnModalEdit.ele.modal();
    });

    self.ele.find('#btnEliminar').click(function(event){

    	bootbox.confirm("¿Desea elimnar este registro?", function(res){ 
            
            if(res){
                var dataFind = ctnTabla.tblList.getIds();
                var id_rol  = dataFind[0].id_rol;   

                var url = "/nucleo/NucRol/deleteAjax"; 
                var data = {rol:{id_rol: id_rol}};
                
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

    self.ele.find("#btnAsignarPermiso").click(function(event){

        var dataFind = ctnTabla.tblList.getIds();
        var id_rol  = dataFind[0].id_rol;

        if( typeof id_rol != "undefined" )
        {
            ctnModalAsignarPermiso.ele.modal();
            ctnModalAsignarPermiso.llenarTablaPermisos(id_rol);
        }

    });

};

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

ctnModalCreate._iniciar = function(){
	
	var self = this;	

	self.$formCreate.validate({
        rules: {
            "rol[denominacion]": {
                required: true
            },
            "rol[descripcion]": {
                required: true,
            }
        },
    });

	self.insertar();   
};

ctnModalCreate.insertar = function(){
	var self = this;	

	this.$formCreate.submitValidation(function(resultado){
        
        if(resultado) 
        {
            var url = "/nucleo/NucRol/createAjax";            
            var data = self.$formCreate.serialize();
            
            CallRest.post(url, data, function(res) {
                if(res.result==1)
                {
                    self.ele.modal("hide");
                    Notificacions.success();                    
                    ctnModalCreate.limpiarFormulario();
                    ctnTabla.llenarTabla();
                }else{
                    Notificacions.errors('asdasd');
                }
            });
        }

    });
};

ctnModalEdit._iniciar = function(){
	var self = this;    

    self.$formEdit.validate({
        rules: {
            rules: {
            "rol[denominacion]": {
                required: true
            },
            "rol[descripcion]": {
                required: true,
            }
        },
        }
    });

    self.editarDatos();  
};

ctnModalEdit.editarDatos = function(){
	var self = this;    

    self.$formEdit.submitValidation(function(resultado){
        
        if(resultado) 
        {
            var url = "/nucleo/NucRol/editAjax";            
            var data = self.$formEdit.serialize();
            
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


ctnTabla.llenarTabla = function(dataFilter){
	var self = this;
	self.tblList.clean(); // Limpia primeramente la tabla si es que tiene algun dato           

    var url = '/nucleo/NucRol/listAjax';
    var data = dataFilter;

    CallRest.post(url, data, function(res){
        $.each(res.roles, function(index, rol) {
            var row = "";
            row += "<tr>";
            row += "    <td><input type='hidden'name='id_rol' value='"+rol.id_rol+"' /></td>";
            row += "    <td>"+rol.denominacion+"</td>";
            row += "    <td>"+rol.descripcion+"</td>";
            row += "</tr>";

            self.tblList.append(row);                 
        });

        self.tblList.simpleSelect();
    });
};

ctnModalCreate.limpiarFormulario = function(){
	var self = this;
    self.$formCreate.trigger("reset");
};







ctnModalEdit.obtenerDatos = function()
{
	var self = this;
    var dataFind = ctnTabla.tblList.getIds();
    var id_rol  = dataFind[0].id_rol;   

    var url = '/nucleo/NucRol/getAjax';
    var data = {rol:{id_rol: id_rol}};


    CallRest.post(url, data, function(res){
        if(res.result==1)
        {            
            self.llenarFormularioEdicion(res.rol);      
        }else{
            Notificacions.errors();
        }
    });
};

ctnModalEdit.llenarFormularioEdicion = function(data)
{
	var self = this;
    self.limpiarFormulario();
    
    self.ele.find("input[name='rol[denominacion]']").val(data.denominacion);
    self.ele.find("input[name='rol[descripcion]']").val(data.descripcion);
    self.ele.find("input[name='rol[id_rol]']").val(data.id_rol);
};

ctnModalEdit.limpiarFormulario = function(){
	var self = this;
    self.$formEdit.trigger("reset");
};


ctnModalAsignarPermiso._iniciar = function(){
    var self = this;

    self.ele.find("#actualizarRolPermiso").click(function(event){

        var dataFind = ctnTabla.tblList.getIds();
        var id_rol  = dataFind[0].id_rol;

        if( typeof id_rol != "undefined" )
        {            
            self.llenarTablaPermisos(id_rol);
        }
    });

    self.ele.on("click", "input[name='asignacionPermiso']", function(ele){
        var idPermiso = $(this).val();
        
        if(idPermiso!=null){
            self.cambiarAsignacionPermiso(idPermiso);
        }

    });
};


ctnModalAsignarPermiso.llenarTablaPermisos = function(idRol){
    var self = this;

    self.tblListPermisos.clean();

    var url  = '/nucleo/NucRolPermiso/listPorRolAjax';
    var data = { "rol":{ "id_rol":idRol}};

    CallRest.post(url, data, function(res){
        $.each(res.rol_permisos, function(index, data) {
            var row = "";
            var checkbox = (data.id_rol_permiso!=null)? "checked='checked'":"";
            row += "<tr>";
            row += "    <td><input type='hidden' name='id_rol_permisos' value='"+data.id_rol_permisos+"' /></td>";
            row += "    <td><input type='checkbox' name='asignacionPermiso' "+checkbox +" value='"+data.id_permiso+"' ></td>";
            row += "    <td>"+data.denominacion+"</td>";
            row += "    <td>"+data.descripcion+"</td>";
            row += "</tr>";

            self.tblListPermisos.append(row);                 
        });

        self.tblListPermisos.simple();
    });

};


ctnModalAsignarPermiso.cambiarAsignacionPermiso = function(idPermiso){

    var self = this;

    var dataFind = ctnTabla.tblList.getIds();
    var id_rol  = dataFind[0].id_rol;

    var url  = "/nucleo/NucRolPermiso/cambiarAsignacionPermiso";            
    var data = { rol_permiso: { id_permiso: idPermiso, id_rol: id_rol}};
    
    CallRest.post(url, data, function(res){
        if(res.result==1)
        {            
            Notificacions.success(); 
            self.llenarTablaPermisos(id_rol);
        }else{
            Notificacions.errors();
        }
    });

};





jQuery(document).ready(function($) 
{

	ctnBotonera.init();
	ctnBuscador.init();
	ctnTabla.init();
	ctnModalCreate.init();
	ctnModalEdit.init();
    ctnModalAsignarPermiso.init();

});


