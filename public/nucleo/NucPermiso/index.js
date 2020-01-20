/*--------------------------------------*/
/* Contenedores */
/*--------------------------------------*/
var ctnBotonera           = new ContainerJS("#ctnBotonera");
var ctnBuscador           = new ContainerJS("#ctnBuscador");
var ctnTabla              = new ContainerJS("#ctnTabla");

var ctnModalCreate      = new ContainerJS("#modalCreate");
var ctnModalEdit        = new ContainerJS("#modalEdit");
var ctnModalAsignarRuta = new ContainerJS("#modalAsignarRuta");



/*--------------------------------------*/
/* Tablas */
/*--------------------------------------*/
var tblList      = new CDataTable('#tblList');
var tblListRutas = new CDataTable('#tblListRutas');









/*--------------------------------------*/
/* Registrar tablas en los componentes*/
/*--------------------------------------*/
ctnTabla.registerTable(tblList, 'tblList');
ctnModalAsignarRuta.registerTable(tblListRutas, 'tblListRutas');







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
                var id_permiso  = dataFind[0].id_permiso;   

                var url = "/nucleo/NucPermiso/deleteAjax"; 
                var data = {permiso:{id_permiso: id_permiso}};
                
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

    self.ele.find("#btnAsignarRuta").click(function(event){

        var dataFind = ctnTabla.tblList.getIds();
        var id_permiso  = dataFind[0].id_permiso;

        if( typeof id_permiso != "undefined" )
        {
            ctnModalAsignarRuta.ele.modal();
            ctnModalAsignarRuta.llenarTablaRutas(id_permiso);
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
            "permiso[denominacion]": {
                required: true
            },
            "permiso[descripcion]": {
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
            var url = "/nucleo/NucPermiso/createAjax";            
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
            "permiso[denominacion]": {
                required: true
            },
            "permiso[descripcion]": {
                required: true,
            }
        }
    });

    self.editarDatos();  
};

ctnModalEdit.editarDatos = function(){
	var self = this;    

    self.$formEdit.submitValidation(function(resultado){
        
        if(resultado) 
        {
            var url = "/nucleo/NucPermiso/editAjax";            
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

    var url = '/nucleo/NucPermiso/listAjax';
    var data = dataFilter;

    CallRest.post(url, data, function(res){
        $.each(res.permisos, function(index, data) {
            var row = "";
            row += "<tr>";
            row += "    <td><input type='hidden'name='id_permiso' value='"+data.id_permiso+"' /></td>";
            row += "    <td>"+data.denominacion+"</td>";
            row += "    <td>"+data.descripcion+"</td>";
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
    var id_permiso  = dataFind[0].id_permiso;   

    var url = '/nucleo/NucPermiso/getAjax';
    var data = {permiso:{id_permiso: id_permiso}};


    CallRest.post(url, data, function(res){
        if(res.result==1)
        {            
            self.llenarFormularioEdicion(res.permiso);      
        }else{
            Notificacions.errors();
        }
    });
};

ctnModalEdit.llenarFormularioEdicion = function(data)
{
	var self = this;
    self.limpiarFormulario();
    
    self.ele.find("input[name='permiso[denominacion]']").val(data.denominacion);
    self.ele.find("input[name='permiso[descripcion]']").val(data.descripcion);
    self.ele.find("input[name='permiso[id_permiso]']").val(data.id_permiso);
};

ctnModalEdit.limpiarFormulario = function(){
	var self = this;
    self.$formEdit.trigger("reset");
};





















ctnModalAsignarRuta._iniciar = function(){
    var self = this;

    self.ele.find("#actualizarPermisoRuta").click(function(event){

        var dataFind = ctnTabla.tblList.getIds();
        var id_permiso  = dataFind[0].id_permiso;

        if( typeof id_permiso != "undefined" )
        {            
            self.llenarTablaRutas(id_permiso);
        }
    });

    self.ele.on("click", "input[name='asignacionRuta']", function(ele){
        var idRuta = $(this).val();
        
        if(idRuta!=null){
            self.cambiarAsignacionRuta(idRuta);
        }

    });
};

ctnModalAsignarRuta.llenarTablaRutas = function(idPermiso){
    var self = this;

        self.tblListRutas.clean();

        var url  = '/nucleo/NucPermisoRuta/listPorPermisoAjax';
        var data = { "permiso":{ "id_permiso":idPermiso}};

        CallRest.post(url, data, function(res){
            $.each(res.permiso_rutas, function(index, data) {
                var row = "";
                var checkbox = (data.id_permiso_ruta!=null)? "checked='checked'":"";
                row += "<tr>";
                row += "    <td><input type='hidden' name='id_permiso_ruta' value='"+data.id_permiso_ruta+"' /></td>";
                row += "    <td><input type='checkbox' name='asignacionRuta' "+checkbox +" value='"+data.id_ruta+"' ></td>";
                row += "    <td>"+data.denominacion+"</td>";
                row += "    <td>"+data.url+"</td>";
                row += "    <td>"+data.descripcion+"</td>";
                row += "</tr>";

                self.tblListRutas.append(row);                 
            });

            self.tblListRutas.simple();
        });

    


};

ctnModalAsignarRuta.cambiarAsignacionRuta = function(idRuta){

    var self = this;

    var dataFind = ctnTabla.tblList.getIds();
    var id_permiso  = dataFind[0].id_permiso;

    var url = "/nucleo/NucPermisoRuta/cambiarAsignacionRuta";            
    var data = { permiso_ruta: { id_ruta: idRuta, id_permiso: id_permiso}};
    
    CallRest.post(url, data, function(res){
        if(res.result==1)
        {            
            Notificacions.success(); 
            self.llenarTablaRutas(id_permiso);
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
    ctnModalAsignarRuta.init();
});