/*--------------------------------------*/
/* Contenedores */
/*--------------------------------------*/
var ctnBotonera    = new ContainerJS("#ctnBotonera");
var ctnBuscador    = new ContainerJS("#ctnBuscador");
var ctnTabla       = new ContainerJS("#ctnTabla");

var ctnModalCrear  = new ContainerJS("#modalCrear");




/*--------------------------------------*/
/* Tablas */
/*--------------------------------------*/
var tblList      = new CDataTable('#tblList');



/*--------------------------------------*/
/* Registrar tablas en los componentes*/
/*--------------------------------------*/
ctnTabla.registerTable(tblList, 'tblList');



/*--------------------------------------*/
/* Registrar tablas en los componentes*/
/*--------------------------------------*/
ctnBuscador.registerId('formBuscador', '$formBuscador');
ctnModalCrear.registerId('formCrear', '$formCrear');






ctnBotonera._iniciar = function()
{
	var self = this;

	/*-------------------------*/
	self.ele.find("#btnCrear").click(function(){
		ctnModalCrear.ele.modal();
		ctnModalCrear.limpiarFormulario();
	});

	/*-------------------------*/
	self.ele.find("#btnEditar").click(function(){
		ctnModalCrear.ele.modal();
		ctnModalCrear.limpiarFormulario();
		ctnModalCrear.llenarFormularioEdicion();
	});
};

ctnTabla._iniciar = function(){
	var self = this;
	self.llenarTabla();
};


ctnModalCrear._iniciar = function()
{
	var self = this;
	
	/*-------------------------*/
	self.listarAtributosProducto();

	/*-------------------------*/
	self.agregarAtributo();

	/*-------------------------*/
	$(document).on('click', '.btnCerrarInputAtributo', function(){
		$(this).closest('.form-group').remove();
		self.listarAtributosProducto();
	});

	/*-------------------------*/
	self.ele.find('#btnActualizarAtributo').click(function(){
		self.listarAtributosProducto();
	});

	/*-------------------------*/
	ctnModalCrear.procesarCreacion();

};

ctnModalCrear.agregarAtributo = function()
{
	var self = this;
	self.ele.find("#btnAgregarAtributo").click(function()
	{
		var id = self.ele.find('#listaAtributos').val();
		var text = self.ele.find('#listaAtributos option:selected').text();
		
		if(id>=1){
			var campo = '<div class="form-group">'+
			            '	<label class="col-sm-4 control-label">'+
			            '		'+text+
			            '	</label>'+
			            '	<div class="col-sm-6">'+
			            '		<input type="text" name="com_valor_producto['+id+'][valor]" class="form-control" >'+
			            '		<input type="hidden" name="com_valor_producto['+id+'][id_atributo_producto]" value="'+id+'" >'+
			            '	</div>'+
			            '	<div class="col-md-2">'+
		                '		<button type="button" class="btn btn-default btn-xs btn-danger btnCerrarInputAtributo">'+
						'			<span class="glyphicon glyphicon-remove"></span>'+
						'		</button>'+
		                '	</div>'+
		                '</div>';
			self.ele.find('#panelAtributos').append(campo);
		}

		self.ele.find('#listaAtributos  option:first').prop('selected', true);

		self.sincronizarAtributosConSelect();
		
	});
};

ctnModalCrear.limpiarFormulario = function(){
	var self = this;
	self.$formCrear.trigger('reset');
	self.ele.find("#panelAtributos").html('');
};

ctnModalCrear.sincronizarAtributosConSelect = function()
{
	var self = this;
	self.ele.find("#panelAtributos").find("input[name='com_atributo_producto[id_atributo_producto]']").each(function(val, index){
	    
	    var idAttributosSeleccionados = $(this).val();
	    self.ele.find('#listaAtributos option').each(function(){
	    
	    	
		    if( $(this).val() == idAttributosSeleccionados ){
		        $(this).attr('disabled','disabled');
		    }
		
		});

	});
};



ctnModalCrear.listarAtributosProducto = function()
{
	var self = this;
	var url = "/mod_compras/ComAtributoProducto/listAjax";            
    var data = [];

	CallRest.post(url, data, function(res){	
        if(res.result==1)
        {        	
        	$html = '<option>Seleccione</option>';

        	res.com_atributo_productos.forEach( function(data, index) {
        		$html += '<option value="'+data.id_atributo_producto+'">'+data.nombre_atributo+'</option>';
        	});

            self.ele.find("#listaAtributos").html($html);

            self.sincronizarAtributosConSelect();

        }else{
            Notificacions.errors();
        }
    });
};


ctnModalCrear.procesarCreacion = function()
{
	var self = this;
	self.$formCrear.submitValidation(function(resultado){
        
        if(resultado) 
        {
            var url = "/mod_compras/ComProducto/crearAjax";            
            var data = self.$formCrear.serialize();
            
            CallRest.post(url, data, function(res) {
                if(res.result==1)
                {
                    self.ele.modal("hide");
                    Notificacions.success();                    
                    // ctnModalCreate.limpiarFormulario();
                    // ctnTabla.llenarTabla();
                }else{
                    Notificacions.errors('asdasd');
                }
            });
        }

    });
};

ctnTabla.llenarTabla = function(dataFilter)
{
	var self = this;

	self.tblList.clean(); // Limpia primeramente la tabla si es que tiene algun dato           

    var url = '/mod_compras/ComProducto/listaAjax';
    var data = dataFilter;

    CallRest.post(url, data, function(res){
        $.each(res.com_productos, function(index, data) {
            var row = "";
            row += "<tr>";
            row += "    <td><input type='hidden'name='id_producto' value='"+data.id_producto+"' /></td>";
            row += "    <td>"+data.codigo+"</td>";
            row += "    <td>"+data.nombre+"</td>";
            row += "    <td>"+data.fecha_creacion+"</td>";
            row += "    <td>"+data.fecha_modificacion+"</td>";
            row += "</tr>";

            self.tblList.append(row);                 
        });

        self.tblList.simpleSelect();
    });
};

ctnModalCrear.llenarFormularioEdicion = function()
{
	var self = this;
    
    if(ctnTabla.tblList.getIds().length>0){
    	var dataFind = ctnTabla.tblList.getIds();	
    	var id_producto  = dataFind[0].id_producto;   
    	var url = '/mod_compras/ComProducto/getAjax';
    	var data = {com_producto:{id_producto: id_producto}};

    	CallRest.post(url, data, function(res){
	        if(res.result==1)
	        {            
	            self.ele.find("input[name='com_producto[codigo]']").val(res.com_producto.codigo);
	            self.ele.find("input[name='com_producto[nombre]']").val(res.com_producto.nombre);
	            self.ele.find("input[name='com_producto[descripcion]']").val(res.com_producto.descripcion);

	            res.com_producto.com_atributos_valores.forEach( function(element, index) {
	            	



	            	var id = res.com_producto.id_producto;
					var text = self.ele.find('#listaAtributos option:selected').text();
		
					if(id>=1){
						var campo = '<div class="form-group">'+
						            '	<label class="col-sm-4 control-label">'+
						            '		'+text+
						            '	</label>'+
						            '	<div class="col-sm-6">'+
						            '		<input type="text" name="com_valor_producto['+id+'][valor]" class="form-control" >'+
						            '		<input type="hidden" name="com_valor_producto['+id+'][id_atributo_producto]" value="'+id+'" >'+
						            '	</div>'+
						            '	<div class="col-md-2">'+
					                '		<button type="button" class="btn btn-default btn-xs btn-danger btnCerrarInputAtributo">'+
									'			<span class="glyphicon glyphicon-remove"></span>'+
									'		</button>'+
					                '	</div>'+
					                '</div>';
						self.ele.find('#panelAtributos').append(campo);
					}

					self.ele.find('#listaAtributos  option:first').prop('selected', true);










	            });

	        }else{
	            Notificacions.errors();
	        }
	    });
    }    
};


jQuery(document).ready(function($) 
{

	ctnBotonera.init();
	ctnBuscador.init();
	ctnTabla.init();
	ctnModalCrear.init();

});