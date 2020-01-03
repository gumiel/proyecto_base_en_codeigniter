jQuery(document).ready(function($) {

    $('a[href="#recibida"]').attr('href', Config.baseUrl()+Config.folder+"/app/correspondencia/recibida-interna.php");
    $('a[href="#emitida"]').attr('href', Config.baseUrl()+Config.folder+"/app/correspondencia/emitida-interna.php");            

    $('#btnCerrarSession').click(function(event) {
        
        event.preventDefault();
        CallRest.postFree("/sis_seguridad/control/auten/cerrar.php", null, function(res){
            location.href = Config.baseUrl()+Config.folder+"/login.php";
        });

    });

});