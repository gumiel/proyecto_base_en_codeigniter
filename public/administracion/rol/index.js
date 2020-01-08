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

                var url = "/administracion/rol/deleteAjax"; 
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
            var url  = "/administracion/rol/createAjax";            
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
            var url  = "/administracion/rol/editAjax";            
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

    var url  = '/administracion/rol/listAjax';
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

    var url = '/administracion/rol/getAjax';
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










var formCreate      = $('#formCreate');
var formEdit        = $('#formEdit');
var formSearch      = $('#formSearch');
var tblList         = $('#tblList');
var formAsignarRuta = $('#formAsignarRuta');

jQuery(document).ready(function($) 
{

	ctnBotonera.init();
	ctnBuscador.init();
	ctnTabla.init();
	ctnModalCreate.init();
	ctnModalEdit.init();

	// loadListRol();

	// $("#btnCreate").click(function(event) {
	//   $("#modalCreate").modal("show");
	// });

	// formCreate.submit(function(event) {
	// 	event.preventDefault();
		
	// 	if( $('#formCreate').valid() )
	// 	{
	// 		$.ajax({
	// 			url: site_url('/administracion/rol/createAjax'),
	// 			type: 'POST',
	// 			dataType: 'json',
	// 			data: $('#formCreate').serialize(),
	// 		})
	// 		.done(function(data) {
	// 			if(data.result==1)
	// 			{
	// 				$.notifySuccess(data.message);	
	// 				$('#modalCreate').modal('hide');
	// 				loadListRol();
	// 			} else 
	// 			{
	// 				$.notifyDanger(data.message);
	// 			}
	// 		});
					
	// 	}
	// });

	// $(document).on('click', ".btnEditar", function()
	// {
	  // var id = $(this).data("id");
	  // var form = $("#formEdit");
	  // form.trigger('reset')
	  // form.find("input[name='rol[id_rol]']").val("");

	  // $.ajax({
	  //   url: site_url("/administracion/rol/getAjax"),
	  //   type: 'POST',
	  //   dataType: 'json',
	  //   data: {"rol[id_rol]": id},
	  // })
	  // .done(function(data) {

	  //   form.find("input[name='rol[denominacion]']").val(data.rol.denominacion);
	  //   form.find("input[name='rol[descripcion]']").val(data.rol.descripcion);
	  //   form.find("input[name='rol[id_rol]']").val(data.rol.id_rol);

	  //   $("#modalEdit").modal("show");

	  // });
	// });

	// formEdit.submit(function(event) 
	// {
	// 	event.preventDefault();
		
	// 	if( $('#formEdit').valid() )
	// 	{
	// 		$.ajax({
	// 			url: site_url('/administracion/rol/editAjax'),
	// 			type: 'POST',
	// 			dataType: 'json',
	// 			data: formEdit.serialize(),
	// 		})
	// 		.done(function(data) {
	// 			if(data.result==1)
	// 			{
	// 				$.notifySuccess(data.message);
	// 				$('#modalEdit').modal('hide');
	// 				loadListRol();
	// 			} else 
	// 			{
	// 				$.notifyDanger(data.message);
	// 			}
	// 		});
					
	// 	}
	// });

	// $(document).on('click', ".btnEliminar", function()
	// {
	  
	//   var id = $(this).data("id");

	//   $.confirmCI( 'Desea eliminar el registro?', function(result){

	//     if (result)
	//     {
	//       $.ajax({
	//         url: site_url("/administracion/rol/deleteAjax"),
	//         type: 'POST',
	//         dataType: 'json',
	//         data: {"rol[id_rol]": id},
	//       })
	//       .done(function(data) {

	//         if(data.result == 1){
	//         	$.notifySuccess(data.message);
	//         	loadListRol();
	//         } else {
	//         	$.notifyDanger(data.message);
	//         }

	//       });
	//     }
	  
	//   });
	// });

	// $('.btnAsignarRuta').click(function(event) {
	$(document).on('click', "#btnAsignarRuta", function(event) {
		
		$('#modalAsignarRuta').modal();
		var id_rol = $(this).data('id');
		formAsignarRuta.find('input[name="rol[id_rol]"]').val(id_rol);
		loadSelectOrigen();
		loadSelectDestino(id_rol)
		
		
	});


	formAsignarRuta.submit(function(event) {
		event.preventDefault();
				formAsignarRuta.find('#destino option').prop('selected','selected')

		$.ajax({
			url: site_url('/administracion/rutaRol/create'),
			type: 'POST',
			dataType: 'json',
			data: formAsignarRuta.serialize(),
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		
	});


	formCreate.validate({
		rules: {
			"rol[denominacion]": {
				required: true
			},
			"rol[descripcion]": {
				required: true
			},			
		},
	});

	formEdit.validate({
		rules: {
			"rol[denominacion]": {
				required: true
			},
			"rol[descripcion]": {
				required: true
			},
		},
	});

	formSearch.submit(function(event) {
		
		event.preventDefault();
		
		var dataForm = formSearch.serialize();
		loadListRol(dataForm);
	});

	









	$().ready(function() 
	{
		$('.pasar').click(function() { return !$('#origen option:selected').remove().appendTo('#destino'); });  
		$('.quitar').click(function() { return !$('#destino option:selected').remove().appendTo('#origen'); });
		$('.pasartodos').click(function() { $('#origen option').each(function() { $(this).remove().appendTo('#destino'); }); });
		$('.quitartodos').click(function() { $('#destino option').each(function() { $(this).remove().appendTo('#origen'); }); });
		$('.submit').click(function() { $('#destino option').prop('selected', 'selected'); });
	});

});


function loadListRol(dataForm)
{

	$('tbody', tblList).html('');

	$.ajax({
		url: site_url('/administracion/rol/listAjax'),
		type: 'POST',
		dataType: 'json',
		data: dataForm
	})
	.done(function(data) {
		if( data.result==1 ){
			let rows = '';
			$.each(data.rols, function(index, rol) {
				
                rows = rows+ '<tr>'
								+'<td>'+rol.denominacion+'</td>'
								+'<td>'+rol.descripcion+'</td>'								
								+'<td>'
									+'<a href="#" class="btn btn-info btnAsignarRuta" data-id="'+rol.id_rol+'" >Asignar Ruta</a>'
									+'<a href="#" class="btn btn-info btnEditar" data-id="'+rol.id_rol+'" >Editar</a>'
									+'<a href="#" class="btn btn-info btnEliminar" data-id="'+rol.id_rol+'" >Eliminar</a>'
								+'</td>'
							+'</tr>';                
			});
			$('#tblList').find('tbody').html(rows);
		}
	});
}

function loadSelectOrigen()
{
	$.ajax({
		url: site_url('ruta/listAjax'),
		type: 'POST',
		dataType: 'json'
	})
	.done(function(data) 
	{
		$('#origen').html('');
	    if ( data.result==1 )
	    {
	    	$.each(data.rutas, function(index, ruta) {
	    		var option = '<option value="'+ruta.id_ruta+'" >'+ruta.denominacion+'</option>'
	    		$('#origen').append(option);
	    	});
	    }


	});
	
}

function loadSelectDestino(id_rol)
{
	$.ajax({
		url: site_url('rutaRol/listRutasAsignadasARol'),
		type: 'POST',
		dataType: 'json',
		data: {'rol[id_rol]': id_rol }
	})
	.done(function(data) 
	{
		$('#destino').html('');
	    if ( data.result==1 )
	    {
	    	$.each(data.rutas, function(index, ruta) {
	    		var option = '<option value="'+ruta.id_ruta+'" >'+ruta.denominacion+'</option>'
	    		$('#destino').append(option);
	    	});
	    }

	});

}