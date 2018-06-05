var formCreate = $('#formCreate');
var formEdit   = $('#formEdit');
var formSearch = $('#formSearch');
var tblList    = $('#tblList');

jQuery(document).ready(function($) 
{

	loadListRol();

	$("#btnCreate").click(function(event) {
	  $("#modalCreate").modal("show");
	});

	formCreate.submit(function(event) {
		event.preventDefault();
		
		if( $('#formCreate').valid() )
		{
			$.ajax({
				url: site_url('rol/createAjax'),
				type: 'POST',
				dataType: 'json',
				data: $('#formCreate').serialize(),
			})
			.done(function(data) {
				if(data.result==1)
				{
					$.notifySuccess(data.message);	
					$('#modalCreate').modal('hide');
					loadListRol();
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
	  form.find("input[name='rol[id_rol]']").val("");

	  $.ajax({
	    url: site_url("rol/getAjax"),
	    type: 'POST',
	    dataType: 'json',
	    data: {"rol[id_rol]": id},
	  })
	  .done(function(data) {

	    form.find("input[name='rol[denominacion]']").val(data.rol.denominacion);
	    form.find("input[name='rol[descripcion]']").val(data.rol.descripcion);
	    form.find("input[name='rol[id_rol]']").val(data.rol.id_rol);

	    $("#modalEdit").modal("show");

	  });
	});

	formEdit.submit(function(event) 
	{
		event.preventDefault();
		
		if( $('#formEdit').valid() )
		{
			$.ajax({
				url: site_url('rol/editAjax'),
				type: 'POST',
				dataType: 'json',
				data: formEdit.serialize(),
			})
			.done(function(data) {
				if(data.result==1)
				{
					$.notifySuccess(data.message);
					$('#modalEdit').modal('hide');
					loadListRol();
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
	        	loadListRol();
	        } else {
	        	$.notifyDanger(data.message);
	        }

	      });
	    }
	  
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

});


function loadListRol(dataForm)
{

	$('tbody', tblList).html('');

	$.ajax({
		url: site_url('rol/listAjax'),
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
									+'<a href="#" class="btn btn-info btnEditar" data-id="'+rol.id_rol+'" >Editar</a>'
									+'<a href="#" class="btn btn-info btnEliminar" data-id="'+rol.id_rol+'" >Eliminar</a>'
								+'</td>'
							+'</tr>';                
			});
			$('#tblList').find('tbody').html(rows);
		}
	});
}