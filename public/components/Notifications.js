
var Notificacions = {
	success: function(message){
		var msg = (message && message!="")? message: 'Se proceso correctamente sus datos.';
		PNotify.desktop.permission();
	    (new PNotify({
	        title: 'Correcto.',
	        text: msg,
	        type: 'success',
	        desktop: {
	            desktop: true
	        }
	    })); 
	},
	errors: function(message){
		var msg = (message && message!="")? message: 'Existieron errores al procesar sus datos.';
		PNotify.desktop.permission();
		(new PNotify({
		    title: 'Error.',
		    text: msg,
		    type: 'error',
		    desktop: {
		        desktop: true
		    }
		}));
	},
	warning: function(message){
		var msg = (message && message!="")? message: 'Cuidado con los datos procesados.';
		PNotify.desktop.permission();
		(new PNotify({
		    title: 'Advertencia.',
		    text: msg,
		    desktop: {
		        desktop: true,
		        icon: 'includes/le_happy_face_by_luchocas-32.png'
		    }
		}));
	},
	info: function(message){
		var msg = (message && message!="")? message: 'Existieron errores al procesar sus datos.';
		PNotify.desktop.permission();
		(new PNotify({
		    title: 'Información.',
		    text: msg,
		    type: 'info',
		    desktop: {
		        desktop: true
		    }
		}));
	},
	confirm: function (message, callbackConfim){
		bootbox.confirm({ 
		    size: "small",
		    message: message,
		    callback: function(result){ /* result is a boolean; true = OK, false = Cancel*/ 
		    	return callbackConfim(result);
		    },
		    buttons: {
		        confirm: {
		            label: 'Aceptar',
		            className: 'btn-success'
		        },
		        cancel: {
		            label: 'Cancelar',
		            className: 'btn-danger'
		        }
		    },
		})
	},
	alert: function(message, callbackAlert){
		bootbox.alert({
		    size: "small",
		    title: "Mensaje:",
		    message: message,
		    callback: function(){  },
		    buttons: {
		        ok: {
		            label: 'Aceptar',
		            className: 'btn-info'
		        }
		    },
		})
	}
}