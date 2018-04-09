jQuery(document).ready(function($) 
{

	$("#btnCreate").click(function(event) {
	  $("#create").modal("show");
	});

	$(".btnEditar").click(function()
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

	    form.find("input[name='usuario[nombres]']").val(data.usuario.nombres);
	    form.find("input[name='usuario[paterno]']").val(data.usuario.paterno);
	    form.find("input[name='usuario[materno]']").val(data.usuario.materno);
	    form.find("input[name='usuario[usuario]']").val(data.usuario.usuario);
	    form.find("input[name='usuario[email]']").val(data.usuario.email);
	    form.find("input[name='usuario[ci]']").val(data.usuario.ci);
	    form.find("input[name='usuario[id_usuario]']").val(data.usuario.id_usuario);

	    $("#modalEdit").modal("show");

	  });
	  

	});

	$(".btnEliminar").click( function(){
	  
	  var id_usuario = $(this).data("id");

	  $.confirmCI( function(result){

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
	          location.reload();
	        }

	      });
	    }
	  
	  });

	});






	$("#formCreate").validate({
		rules: {
			"usuario[nombres]": {
				required: true
			}
		}

	});

});
