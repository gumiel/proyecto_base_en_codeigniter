var contenedorLogin = new ContainerJS('#contenedorLogin');

contenedorLogin._validarFormulario = function()
{
    
};

contenedorLogin._formLogin = function()
{
    var self = this;
    var formLogin = self.ele.find("#formLogin");
    
    formLogin.validate({
        rules: {
            "login": {
                required: true
            },
            "password": {
                required: true
            }
        }
    });



    formLogin.submitValidation(function(res){
        if(res) {
            event.preventDefault();

            var login    = self.ele.find("input[name='login']").val();
            var password = self.ele.find("input[name='password']").val();

            password = self.datosVerificacion(password);

            $.ajax({
                url: Config.baseUrl()+'/lib/lib_control/Intermediario.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    x: '../../sis_seguridad/control/Auten/verificarCredenciales',
                    p: '{"_tipo":"auten","contrasena":"'+password+'","usuario":"'+login+'"}',
                },
            })
            .done(function(res) {
                res = eval('(' + res+ ')');
                if(res.success==true)
                {
                    window.location.href = Config.siteUrl()+"/app/main.php";
                }else {
                    Notificacions.errors(res.mensaje);
                    formLogin.find("input[name='password']").val('');
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        }
    });
};


contenedorLogin.datosVerificacion = function(pass){
    var respuesta = {};

    $.ajax({
        url: Config.baseUrl()+'/lib/lib_control/Intermediario.php',
        type: 'POST',
        async: false,
        dataType: 'html',
        data: {
            x: '../../sis_seguridad/control/Auten/getPublicKey',
            p: '{"_tipo":"inter"}',
        },
    })
    .done(function(res) {            
        respuesta= res;
        var regreso = Ext.util.JSON.decode(Ext.util.Format.trim(res));
        console.log(regreso);
        var nuevo =new Phx.Encriptacion({
                        encryptionExponent:regreso.e,
                        modulus:regreso.m,
                        permutacion:regreso.p,
                        k:regreso.k});    
                    
        respuesta = nuevo.Encriptar(pass);
        
    });
    
    return respuesta;
};

contenedorLogin.preparaDatos = function(){

    var url  = '../../sis_seguridad/control/Auten/prepararLlavesSession';
    var data = '{"_tipo":"inter"}';
    CallRest.post(url, data, function(res){
        
    });
};











jQuery(document).ready(function($) {

    contenedorLogin.init();
    contenedorLogin.preparaDatos();
    
});