/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: ES (Spanish; Español)
 */
$.extend( $.validator.messages, {
	required: "Este campo es obligatorio.",
	remote: "Por favor, rellena este campo.",
	email: "Por favor, escribe una dirección de correo válida",
	url: "Por favor, escribe una URL válida.",
	date: "Por favor, escribe una fecha válida.",
	dateISO: "Por favor, escribe una fecha (ISO) válida.",
	number: "Por favor, escribe un número entero válido.",
	digits: "Por favor, escribe sólo dígitos.",
	creditcard: "Por favor, escribe un número de tarjeta válido.",
	equalTo: "Por favor, escribe el mismo valor de nuevo.",
	accept: "Por favor, escribe un valor con una extensión aceptada.",
	maxlength: $.validator.format("Por favor, no escribas más de {0} caracteres."),
	minlength: $.validator.format("Por favor, no escribas menos de {0} caracteres."),
	rangelength: $.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
	range: $.validator.format("Por favor, escribe un valor entre {0} y {1}."),
	max: $.validator.format("Por favor, escribe un valor menor o igual a {0}."),
	min: $.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});

jQuery.validator.setDefaults({
    highlight: function(element) {
        jQuery(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        jQuery(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'label label-danger',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
}); 

jQuery.validator.addMethod("sinCaracteresEspeciales",
           function(value, element) {
                   return /^[A-Za-z\d=#$%@_ -]+$/.test(value);
           },
   "Nada de caracteres especiales, por favor"
);






(function($) {
	$.fn.submitValidation = function(callback){
		$(this).submit(function( event ) {        
			var res = false;
	        event.preventDefault();		        
	        res = ($(this).valid())? true: false;		        
			return callback(res);				
	    });
	}
})(jQuery);

// $.validator.setDefaults({
// 	errorElement: "span",
// 	errorPlacement: function ( error, element ) {
// 		// Add the `help-block` class to the error element
// 		error.addClass( "help-block" );

// 		if ( element.prop( "type" ) === "checkbox" ) {
// 			error.insertAfter( element.parent( "label" ) );
// 		} else {
// 			error.insertAfter( element );
// 		}
// 	},
// 	highlight: function ( element, errorClass, validClass ) {
// 		$( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
// 	},
// 	unhighlight: function (element, errorClass, validClass) {
// 		$( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
// 	}
// });