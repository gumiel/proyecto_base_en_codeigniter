/*--------------------------------------*/
/* Contenedores */
/*--------------------------------------*/
var ctnBotonera           = new ContainerJS("#ctnBotonera");
var ctnBuscador           = new ContainerJS("#ctnBuscador");
var ctnTabla              = new ContainerJS("#ctnTabla");

var ctnModalCreate = new ContainerJS("#modalCreate");
var ctnModalEdit   = new ContainerJS("#modalEdit");



/*--------------------------------------*/
/* Tablas */
/*--------------------------------------*/
var tblList = new CDataTable('#tblList');




/*--------------------------------------*/
/* Registrar tablas en los componentes*/
/*--------------------------------------*/
ctnTabla.registerTable(tblList, 'tblList');

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

                var url = "/nucleo/nuc_rol/deleteAjax"; 
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
            var url  = "/nucleo/nuc_rol/createAjax";            
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
            var url  = "/nucleo/nuc_rol/editAjax";            
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

    var url  = '/nucleo/nuc_rol/listAjax';
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

    var url = '/nucleo/nuc_rol/getAjax';
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










jQuery(document).ready(function($) 
{

	ctnBotonera.init();
	ctnBuscador.init();
	ctnTabla.init();
	ctnModalCreate.init();
	ctnModalEdit.init();

});


