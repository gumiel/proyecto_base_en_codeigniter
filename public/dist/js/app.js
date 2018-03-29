jQuery(document).ready(function($) {
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
            console.log('This was logged in the callback: ' + result);
        }
    });

	

});