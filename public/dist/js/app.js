jQuery(document).ready(function($) {
	

	jQuery.confirmCI = function( callback )
	{	    
	    
	    bootbox.confirm({
	        message: "This is a confirm with custom button text and color! Do you like it?",
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