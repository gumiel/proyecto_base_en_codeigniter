jQuery(document).ready(function($) {
	

	jQuery.confirmCI = function( message, callback )
	{	    
	    console.log(message);
	    var message = ( message!=''  )? message: "¿Desea continuar con el proceso?";

	    bootbox.confirm({
	        message: message,
	        buttons: {
	            confirm: {
	                label: '<i class="fa fa-check"></i> Confirmar',
	                className: 'btn-success'
	            },
	            cancel: {
	                label: '<i class="fa fa-times"></i> Cancelar',
	                className: 'btn-danger'
	            }
	        },
	        callback: function (result) {
	            return callback(result);
	        }
	    });
	}

	jQuery.notifySuccess = function( message )
	{	    
	    
	    $.notify({
			icon: 'glyphicon glyphicon-ok',
			title: "<strong>Correcto:</strong> ",
			message: message
		},{
			type: 'success'
		});
	}

	jQuery.notifyDanger = function( message )
	{	    
	    $.notify({
			icon: 'glyphicon glyphicon-ok',
			title: "<strong>Error:</strong> ",
			message: message
		},{
			type: 'danger'
		});
	}

	jQuery.notifyWarning = function( message )
	{	    
	    $.notify({
			icon: 'glyphicon glyphicon-warning-sign',
			title: "<strong>Advertencia:</strong> ",
			message: notifyWarningTitle
		},{
			type: 'warning'
		});
	}

	

	$(".notifySuccess").each(function(index, el) {
		var notifySuccessTitle = $(this).find(".notifySuccessTitle").html();
		var notifySuccessMessage = $(this).find(".notifySuccessMessage").html();
		$.notify({
			icon: 'glyphicon glyphicon-ok',
			title: "<strong>"+notifySuccessTitle+":</strong> ",
			message: notifySuccessMessage
		},{
			type: 'success'
		});
	});

	$(".notifyDanger").each(function(index, el) {
		var notifyDangerTitle = $(this).find(".notifyDangerTitle").html();
		var notifyDangerMessage = $(this).find(".notifyDangerMessage").html();
		$.notify({
			icon: 'glyphicon glyphicon-remove',
			title: "<strong>"+notifyDangerTitle+":</strong> ",
			message: notifyDangerMessage
		},{
			type: 'danger'
		});
	});

	$(".notifyWarnig").each(function(index, el) {
		var notifyWarningTitle = $(this).find(".notifyWarningTitle").html();
		var notifyWarningTitle = $(this).find(".notifyWarningMessage").html();
		$.notify({
			icon: 'glyphicon glyphicon-warning-sign',
			title: "<strong>"+notifyWarningTitle+":</strong> ",
			message: notifyWarningTitle
		},{
			type: 'warning'
		});
	});

	

});