var formCreate = $('#formCreate');
var formEdit   = $('#formEdit');
var formSearch = $('#formSearch');
var tblList    = $('#tblList');

jQuery(document).ready(function($) 
{

	loadListRuta();

	$("#btnCreate").click(function(event) {
	  $("#modalCreate").modal("show");
	});

	formCreate.submit(function(event) {
		event.preventDefault();
		
		if( $('#formCreate').valid() )
		{
			$.ajax({
				url: site_url('/administracion/ruta/createAjax'),
				type: 'POST',
				dataType: 'json',
				data: $('#formCreate').serialize(),
			})
			.done(function(data) {
				if(data.result==1)
				{
					$.notifySuccess(data.message);	
					$('#modalCreate').modal('hide');
					loadListRuta();
				} else 
				{
					$.notifyDanger(data.message);
				}
			});
					
		}
	});

	$(document).on('click', ".btnEditar", function()
	{
	  var id = $(this).data("id");
	  var form = $("#formEdit");
	  form.trigger('reset')
	  form.find("input[name='ruta[id_ruta]']").val("");

	  $.ajax({
	    url: site_url("/administracion/ruta/getAjax"),
	    type: 'POST',
	    dataType: 'json',
	    data: {"ruta[id_ruta]": id},
	  })
	  .done(function(data) {

	    form.find("input[name='ruta[denominacion]']").val(data.ruta.denominacion);
	    form.find("input[name='ruta[descripcion]']").val(data.ruta.descripcion);
	    form.find("input[name='ruta[id_ruta]']").val(data.ruta.id_ruta);

	    $("#modalEdit").modal("show");

	  });
	});

	formEdit.submit(function(event) 
	{
		event.preventDefault();
		
		if( $('#formEdit').valid() )
		{
			$.ajax({
				url: site_url('/administracion/ruta/editAjax'),
				type: 'POST',
				dataType: 'json',
				data: formEdit.serialize(),
			})
			.done(function(data) {
				if(data.result==1)
				{
					$.notifySuccess(data.message);
					$('#modalEdit').modal('hide');
					loadListRuta();
				} else 
				{
					$.notifyDanger(data.message);
				}
			});
					
		}
	});

	$(document).on('click', ".btnEliminar", function()
	{
	  
	  var id = $(this).data("id");

	  $.confirmCI( 'Desea eliminar el registro?', function(result){

	    if (result)
	    {
	      $.ajax({
	        url: site_url("rol/deleteAjax"),
	        type: 'POST',
	        dataType: 'json',
	        data: {"rol[id_rol]": id},
	      })
	      .done(function(data) {

	        if(data.result == 1){
	        	$.notifySuccess(data.message);
	        	loadListRuta();
	        } else {
	        	$.notifyDanger(data.message);
	        }

	      });
	    }
	  
	  });
	});





	formCreate.validate({
		rules: {
			"ruta[denominacion]": {
				required: true
			},
			"ruta[descripcion]": {
				required: true
			},			
		},
	});

	formEdit.validate({
		rules: {
			"ruta[denominacion]": {
				required: true
			},
			"ruta[descripcion]": {
				required: true
			},
		},
	});

	formSearch.submit(function(event) {
		
		event.preventDefault();
		
		var dataForm = formSearch.serialize();
		loadListRuta(dataForm);
	});

});


function loadListRuta(dataForm)
{

	$('tbody', tblList).html('');

	$.ajax({
		url: site_url('/administracion/ruta/listAjax'),
		type: 'POST',
		dataType: 'json',
		data: dataForm
	})
	.done(function(data) {
		if( data.result==1 ){
			let rows = '';
			$.each(data.rutas, function(index, ruta) {
				
                rows = rows+ '<tr>'
								+'<td>'+ruta.denominacion+'</td>'
								+'<td>'+ruta.descripcion+'</td>'								
								+'<td>'
									+'<a href="#" class="btn btn-info btnEditar" data-id="'+ruta.id_ruta+'" >Editar</a>'
									+'<a href="#" class="btn btn-info btnEliminar" data-id="'+ruta.id_ruta+'" >Eliminar</a>'
								+'</td>'
							+'</tr>';                
			});
			$('#tblList').find('tbody').html(rows);
		}
	});
}