

var ctnActor            = new ContainerJS("#ctnActor");
var ctnBotonera         = new ContainerJS("#ctnBotonera");
var ctnModalCrearActor  = new ContainerJS("#modalCrearActor");
var ctnModalEditarActor = new ContainerJS("#modalEditarActor");

var tblUsuarios = new CDataTable('#tblUsuarios');



ctnActor.registerTable(tblUsuarios, 'tblActor');

// ctnModalEditarActor.registerId('formEditarActor');
ctnModalCrearActor.registerId('formCrearActor', '$formCrearActor');
ctnModalEditarActor.registerElement('#formEditarActor', 'formEditarActor');


ctnActor._iniciar = function(){
    this.llenarTabla();
};

ctnActor.llenarTabla = function(res){

    var self = this;
	ctnActor.tblActor.clean(); // Limpia primeramente la tabla si es que tiene algun dato           

    var url  = '/actor/list';
    var data = '';

    CallRest.post(url, data, function(res){
        $.each(res.actors, function(index, actor) {
            var row = "";
            row += "<tr>";
            row += "    <td><input type='hidden'name='actor_id' value='"+actor.actor_id+"' /></td>";
            row += "    <td>"+actor.first_name+"</td>";
            row += "    <td>"+actor.last_name+"</td>";
            row += "    <td>"+actor.last_update+"</td>";
            row += "</tr>";

            ctnActor.tblActor.append(row);                 
        });

        ctnActor.tblActor.simpleSelect();
    });

};

ctnBotonera._iniciar = function(){
	var self = this;
	self.ele.find('#btnCrear').click(function(event) {
		ctnModalCrearActor.ele.modal();
	});

    self.ele.find('#btnEditar').click(function(event) {
        ctnModalEditarActor.obtenerActor();
        ctnModalEditarActor.ele.modal();
    });

    self.ele.find('#btnActualizar').click(function(event) {
        ctnActor.llenarTabla();
    });

    self.ele.find('#btnEliminar').click(function(event) {
        bootbox.confirm("¿Desea elimnar este registro?", function(res){ 
            
            if(res){
                var self = this;
                var dataActor = ctnActor.tblActor.getIds();
                var actor_id  = dataActor[0].actor_id;   

                var url = '/actor/delete' 
                var data = {actor:{actor_id: actor_id}};
                
                CallRest.post(url, data, function(res)
                {
                    if(res.result==1)
                    {
                        Notificacions.success();  
                        ctnActor.llenarTabla();                  
                    }else{
                        Notificacions.errors()
                    }
                });
            }            

        });
    });
}

ctnModalCrearActor._iniciar = function(){
	
    var self = this;	

	this.$formCrearActor.validate({
        rules: {
            "actor[first_name]": {
                required: true
            },
            "actor[last_name]": {
                required: true
            }
        }
    });

	ctnModalCrearActor.insertarActor();        

}

ctnModalEditarActor._iniciar = function(){
    // alert(this._prueba.html());
    var self = this;    

    this.formEditarActor.validate({
        rules: {
            "actor[first_name]": {
                required: true
            },
            "actor[last_name]": {
                required: true
            },
            "actor[actor_id]": {
                required: true
            }
        }
    });

    self.editarActor();        

}

ctnModalCrearActor.insertarActor = function(){

	var self = this;	

	this.$formCrearActor.submitValidation(function(resultado){
        
        if(resultado) 
        {
            var url  = "/actor/insert";            
            var data = self.$formCrearActor.serialize();
            
            CallRest.post(url, data, function(res)
            {
                if(res.result==1)
                {
                    self.ele.modal("hide");
                    Notificacions.success();                    
                    ctnModalCrearActor.limpiarFormulario();
                    ctnActor.llenarTabla();
                }else{
                    Notificacions.errors()
                }
            });
        }

    });
}

ctnModalEditarActor.obtenerActor = function(){
    var self = this;
    var dataActor = ctnActor.tblActor.getIds();
    var actor_id  = dataActor[0].actor_id;   

    var url = '/actor/get' 
    var data = {actor:{actor_id: actor_id}};


    CallRest.post(url, data, function(res)
    {
        if(res.result==1)
        {            
            self.llenarFormularioEdicion(res.actor);      
        }else{
            Notificacions.errors()
        }
    });
}

ctnModalEditarActor.editarActor = function(){    
    var self = this;    

    this.formEditarActor.submitValidation(function(resultado){
        
        if(resultado) 
        {
            var url  = "/actor/edit";            
            var data = self.formEditarActor.serialize();
            
            CallRest.post(url, data, function(res)
            {
                if(res.result==1)
                {
                    self.ele.modal("hide");
                    self.limpiarFormulario();
                    Notificacions.success();  
                    ctnActor.llenarTabla();                  
                }else{
                    Notificacions.errors()
                }
            });
        }

    });
}

ctnModalCrearActor.limpiarFormulario = function(){
	this.$formCrearActor.trigger("reset");
}

ctnModalEditarActor.limpiarFormulario = function(){
    this.formEditarActor.trigger("reset");
}

ctnModalEditarActor.llenarFormularioEdicion = function(actor){
    var self = this;
    self.limpiarFormulario();
    console.log("aqui");
    self.ele.find("input[name='actor[first_name]']").val(actor.first_name);
    self.ele.find("input[name='actor[last_name]']").val(actor.last_name);
    self.ele.find("input[name='actor[actor_id]']").val(actor.actor_id);
}




jQuery(document).ready(function($) {
	console.log("/*-*/-*/-*/");
	ctnActor.init();
	ctnBotonera.init();
	ctnModalCrearActor.init();
	ctnModalEditarActor.init();
});