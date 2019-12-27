var formCreate = $('#formCreate');
var formEdit   = $('#formEdit');
var formSearch = $('#formSearch');
var tblList    = $('#tblList');

jQuery(document).ready(function($) 
{

	loadListUsuarios();

	$("#btnCreate").click(function(event) {
	  $("#modalCreate").modal("show");
	});

	formCreate.submit(function(event) {
		event.preventDefault();
		
		if( $('#formCreate').valid() )
		{
			$.ajax({
				url: site_url('usuario/createAjax'),
				type: 'POST',
				dataType: 'json',
				data: $('#formCreate').serialize(),
			})
			.done(function(data) {
				if(data.result==1)
				{
					$.notifySuccess(data.message);	
					$('#modalCreate').modal('hide');
					loadListUsuarios();
				} else 
				{
					$.notifyDanger(data.message);
				}
			});
					
		}
	});

	$(document).on('click', ".btnEditar", function()
	{
	  var id_usuario = $(this).data("id");
	  var form = $("#formEdit");
	  form.trigger('reset')
	  form.find("input[name='usuario[id_usuario]']").val("");

	  $.ajax({
	    url: site_url("usuario/getUsuarioAjax"),
	    type: 'POST',
	    dataType: 'json',
	    data: {"usuario[id_usuario]": id_usuario},
	  })
	  .done(function(data) {
	    form.find("input[name='usuario[cuenta]']").val(data.usuario.cuenta);
	    form.find("input[name='usuario[email]']").val(data.usuario.email);
	    form.find("input[name='usuario[id_usuario]']").val(data.usuario.id_usuario);

	    $("#modalEdit").modal("show");

	  });
	});

	formEdit.submit(function(event) {
		event.preventDefault();
		
		if( $('#formEdit').valid() )
		{
			$.ajax({
				url: site_url('usuario/editAjax'),
				type: 'POST',
				dataType: 'json',
				data: $('#formEdit').serialize(),
			})
			.done(function(data) {
				if(data.result==1)
				{
					$.notifySuccess(data.message);
					$('#modalEdit').modal('hide');
					loadListUsuarios();
				} else 
				{
					$.notifyDanger(data.message);
				}
			});
					
		}
	});

	$(document).on('click', ".btnEliminar", function()
	{
	  
	  var id_usuario = $(this).data("id");

	  $.confirmCI( '', function(result){

	    if (result)
	    {
	      $.ajax({
	        url: site_url("usuario/deleteUsuarioAjax"),
	        type: 'POST',
	        dataType: 'json',
	        data: {"usuario[id_usuario]": id_usuario},
	      })
	      .done(function(data) {

	        if(data.result == 1){
	        	$.notifySuccess(data.message);
	        	loadListUsuarios();
	        } else {
	        	$.notifyDanger(data.message);
	        }

	      });
	    }
	  
	  });
	});


	$(document).on('click', ".btnAssignRol", function(){
		$('#modalRol').modal();
	})


	$(document).on('click', ".btnAssignRuta", function(){
		$('#modalRuta').modal();	
	})



	formCreate.validate({
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

	formEdit.validate({
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
		},
	});

	formSearch.submit(function(event) {
		
		event.preventDefault();
		
		var dataForm = formSearch.serialize();
		loadListUsuarios(dataForm);
	});

});


function loadListUsuarios(dataForm)
{

	$('tbody', tblList).html('');

	$.ajax({
		url: site_url('usuario/listaAjax'),
		type: 'POST',
		dataType: 'json',
		data: dataForm
	})
	.done(function(data) {
		if( data.result==1 ){
			let rows = '';
			$.each(data.usuarios, function(index, usuario) {
				
                rows = rows+ '<tr>'								
								+'<td>'+usuario.email+'</td>'
								+'<td>'+usuario.cuenta+'</td>'								
								+'<td>'+usuario.fecha_creacion+'</td>'								
								+'<td>'+usuario.fecha_modificacion+'</td>'								
								+'<td>'
								+'<a href="#" class="btn btn-info btnAssignRol" data-id="'+usuario.id_usuario+'" >Rol</a>'
								+'<a href="#" class="btn btn-info btnAssignRuta" data-id="'+usuario.id_usuario+'" >Ruta</a>'
								+'<a href="#" class="btn btn-info btnEditar" data-id="'+usuario.id_usuario+'" >Editar</a>'
								+'<a href="#" class="btn btn-info btnEliminar" data-id="'+usuario.id_usuario+'" >Eliminar</a>'
								+'</td>'
							+'</tr>';                
			});
			$('#tblList').find('tbody').html(rows);
		}
	});
}