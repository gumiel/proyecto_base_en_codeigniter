function CDataTable(element, configCustom)
{
    var constructor = function (){
        $(element).closest('.preloadContainer').find('table').css("display","none");        
    };
    constructor();


	this.element = element;
    this.table   = null;
	this.dataSelected   = [];
	
	var configIni = {
        responsive: true,
    	language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
	            "first": "Primero",
	            "last": "Ultimo",
	            "next": "Siguiente",
	            "previous": "Anterior"
	        }
	    },
	    rowReorder: true
    };

    var configSelectMultiple = {
        responsive: true,
        colReorder: true,
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
    };

    var configSelectSimple = {
    	columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: true,
        order: [[ 1, 'asc' ]]
	};

	var configExports = {
		dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ],
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="glyphicon glyphicon-save-file">Copiar</i>',
                titleAttr: 'Copiar'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="glyphicon glyphicon-save-file">Excel</i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="glyphicon glyphicon-save-file">CSV</i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="glyphicon glyphicon-save-file">PDF</i>',
                titleAttr: 'PDF'
            },
            {
                extend:    'print',
                text:      '<i class="glyphicon glyphicon-save-file">Imprimir</i>',
                titleAttr: 'Imprimir'
            },
        ]
	};

    this.simple = function ()
    {
        $(this.element).closest('.preloadContainer').find('table').css("display","block");
        $(this.element).closest('.preloadContainer').find('.spanLoader').css("display","none");
    	this.table = $(this.element).DataTable(configIni);
    };

    this.simpleSelect = function()
    {   
        $(this.element).closest('.preloadContainer').find('table').css("display","block");
        $(this.element).closest('.preloadContainer').find('.spanLoader').css("display","none");
        this.buildCheckboxs();
        var config = Object.assign(configSelectSimple, configIni);
        this.table = $(this.element).DataTable(config);
        this.accumulated();
        this.table.rows( { selected: true } ).data();
    };

    this.simpleSelectExport = function()
    {        
        $(this.element).closest('.preloadContainer').find('table').css("display","block");
        $(this.element).closest('.preloadContainer').find('.spanLoader').css("display","none");
        this.buildCheckboxs();
        var config1 = Object.assign(configSelectSimple, configIni);
        var config = Object.assign(configExports, config1);
        this.table = $(this.element).DataTable(config);
        this.accumulated();
        this.table.rows( { selected: true } ).data();
    };

    this.multiSelect = function()
    {   
        $(this.element).closest('.preloadContainer').find('table').css("display","block");
        $(this.element).closest('.preloadContainer').find('.spanLoader').css("display","none");
        this.buildCheckboxs();
        var config1 = Object.assign(configSelectMultiple, configIni);
        this.table = $(this.element).DataTable(config1);
        this.accumulated();
        this.table.rows( { selected: true } ).data();
    };

    this.multiSelectExport = function()
    {
        $(this.element).closest('.preloadContainer').find('table').css("display","block");
        $(this.element).closest('.preloadContainer').find('.spanLoader').css("display","none");
        this.buildCheckboxs();
        var config1 = Object.assign(configSelectMultiple, configIni);
        var config = Object.assign(configExports, config1);
        this.table = $(this.element).DataTable(config);
        this.accumulated();
        this.table.rows( { selected: true } ).data();
    };

    this.clean = function()
    {
        this.dataSelected   = []; 


        if(this.table && $.fn.DataTable.isDataTable( this.element )){
            this.table.destroy();
        }

        if($(this.element).find('tbody').length>0){
            $(this.element).find('tbody').html("");
        }else{
            $(this.element).html("");
        }
        $(this.element).closest('.preloadContainer').find('.spanLoader').css("display","block");
        $(this.element).closest('.preloadContainer').find('table').css("display","none");
    };

    this.append = function(row)
    {
        if($(this.element).find('tbody').length>0){
            $(this.element).find('tbody').append(row);
        }else{
            $(this.element).append(row);
        }
    };

    this.html = function(tabla)
    {
        if($(this.element).find('tbody').length>0){
            $(this.element).find('tbody').html(tabla);
        }else{
            $(this.element).html(tabla);
        }
    };

    this.OnSelect = function(callback)
    {
        var self = this;
        this.table.on( 'select', function ( e, dt, type, indexes ) {
            if ( type === 'row' ) {
                var data = self.table.rows( indexes ).data().pluck( 'id' );
                // alert(data);
                var rowData = self.table.rows( indexes ).data().toArray(); 
                var elements = $.parseHTML(rowData[0][0]);

                var objectRow = [];
                objectRow = self.convertElementsHtmlToObject(elements);

                return callback(objectRow);
            }
        });
    };

    this.buildCheckboxs = function ()
    {
    	$(this.element).find('[data-type~="checkbox"]').each(function(index, el) {
    		var id = $(el).data('id');
    		$(el).html('<input type="checkbox" name="data[]" value="'+id+'" />');
    	});
    };

    this.accumulated = function()
    {
        var self = this;
        self.table
        .on( 'select', function ( e, dt, type, indexes ) {
            var rowData = self.table.rows( indexes ).data().toArray();
            // if(rowData[0].data_input){// para el caso de los ajax
            //     self.dataSelected.push(rowData[0]);
            // } else{
            //     self.dataSelected.push(rowData[0]);
            // }
            self.dataSelected.push(rowData[0]);
        } )
        .on( 'deselect', function ( e, dt, type, indexes ) {
            var rowData = self.table.rows( indexes ).data().toArray();            
            self.removeItemFromArr ( self.dataSelected, rowData[0] );
        } );
    };

    this.removeItemFromArr = function( arr, item ) {
        var i = arr.indexOf( item );
        arr.splice( i, 1 );
    };

    this.getIds = function()
    {
        var self = this;
        var ids = [];
        this.dataSelected.forEach( function(element, index) {
            var elements = $.parseHTML(element[0]);
            var objectRow = [];
            objectRow = self.convertElementsHtmlToObject(elements);
            ids.push(objectRow);
        });
        return ids;
    };

    this.getData = function()
    {
        // var self = this;
        // var ids = [];
        // this.dataSelected.forEach( function(element, index) {
        //     var elements = $.parseHTML(element);
        //     // elements = self.listInputInArray(elements);
        //     var objectRow = [];
        //     objectRow = self.convertElementsHtmlToObject(elements);
        //     ids.push(objectRow);
        // });
        return this.dataSelected;
    };

    this.listInputInArray = function(listData)
    {
        var dataArray = [];
        for(var i = 0; i<listData.length; i++)
        {
            dataAll = {};
            var value = $(listData[i]).val();
            var name = $(listData[i]).prop('name');            
            dataAll.name = name;
            dataAll.value = value;
            dataArray.push(dataAll);
        }
        return dataArray;
    };

    this.convertElementsHtmlToObject = function(elements)
    {
        var self = this;
        var objectRow = [];
        elements.forEach(function(dataElements){
            var attribute = {};
            var name  = $(dataElements).prop('name');
            var value = $(dataElements).val();
            // eval('attribute = {"'+name+'":'+value+'}');
            if(self.isInt(value)){
                value = parseInt(value);
            }

            if(typeof name != 'undefined'){
                attribute[name] = value;
                objectRow = Object.assign(objectRow, attribute);
            }
        });
        return objectRow;
    };

    this.isInt = function (x){
        var y = parseInt(x);
        if (isNaN(y)) 
            return false;
        return x == y && x.toString() == y.toString();
    };

    this.addDataRow = function(object){
        var listNameAttr = Object.keys(object);
        var inputs = [];
        listNameAttr.forEach(function(name){
            inputs.push('<input type="hidden" name="'+name+'" value="'+object[name]+'" />');
        });
        return inputs.join('');
    };
    
    // this.isBoolean = function (x){
    //     // Falta crear la validacion
    // };
    
    // this.isFloat = function (x){
    //     // falta crear la validacion
    // };
    // 
    this.configBasicServerSide = function(type, structure, data, url, columns, search)
    {
        var self = this;

        if( columns[0].data==null )
            columns[0].data = 'data_input';

        var configAjax = {
            "processing": true,
            "pageLength": structure.cantRow,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                url: url, //Config.protocol+"//"+Config.domain+Config.folderServer+"/lib/lib_control/Intermediario.php",
                type: type, //"POST",
                data: function ( d ) {
                    // d.otherData = 0; // este dato se envia cuando se cambia la paguinacion 
                    // d.otherData1 = '1'; // La variable d es un objeto con todas las columnas
                },
                dataFilter: function(data){

                    var dataList = [];
                    var dataServer = jQuery.parseJSON( data );                        
                    var jsonDataTable = {};
                    
                    if(typeof structure != undefined && structure != null && structure != '') {
                        dataList = eval('dataServer.'+structure.data);                                                 
                    } else {
                        dataList = dataServer;
                    }

                    var addDataRow = "";
                    for (var i = 0; i < dataList.length; i++) {
                        addDataRow = self.addDataRow(dataList[i]);
                        dataList[i].data_input = addDataRow;
                    }

                    var total = eval('dataServer.'+structure.total);

                    jsonDataTable.data = dataList;
                    jsonDataTable.recordsTotal    = total;
                    jsonDataTable.recordsFiltered = total;
                    
                    return JSON.stringify( jsonDataTable ); // return JSON string
                }
            },
            "columns": columns,
            columnDefs : [{
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }],
            select: false,
            order: [[ 1, 'asc' ]]
        };


        

        return configAjax;
    };

    this.serverSide = function(type, structure, data, url, columns, search){

        var self       = this;
        var configAjax = this.configBasicServerSide(type, structure, data, url, columns, search);

        // Corrige la primera columna que sale para marcar
        // if(typeof configCustom != 'undefined' && 
        //     typeof configCustom.select != 'undefined' &&            
        //     typeof configCustom.columnDefs == 'undefined' &&
        //     configCustom.select == false )
        // {           
        //     configAjax.columnDefs = [{
        //         "targets": [ 0 ],
        //         "visible": false,
        //         "searchable": false
        //     }];            
        // }
        
        configAjax = Object.assign(configAjax, configIni);
        configAjax = Object.assign(configAjax, configCustom);

        configAjax = this.verifySelect(configAjax);
        
        this.table = $(this.element).DataTable( configAjax );
        
            
        this.generateSearchFields(configAjax);

        this.accumulated();
        // this.table.rows( { selected: true } ).data();
    };

    this.verifySelect = function(configAjax)
    {
        if( typeof configAjax.select != undefined && configAjax.select != false)
        {               
            configAjax.columnDefs = [{
                                    targets: 0,
                                    orderable: false,
                                    className: 'select-checkbox',
                                }];
        }
        return configAjax;
    };

    this.generateSearchFields = function(configAjax)
    {
        if( typeof configAjax != 'undefined' && typeof configAjax.searchInputs != 'undefined' && configAjax.searchInputs==true ){
            $(this.element+' tfoot th').each( function () {
                var title = $(this).text();
                 
                if(title!=''){
                    $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
                }
            } );

            this.table.columns().every( function () {
                var that = this;
         
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    };
    
    this.serverSide1 = function(type, structure, data, url, columns, search){
        var self = this;

        if( columns[0].data==null )
            columns[0].data = 'data_input';

        var configAjax = {
            "processing": true,
            "pageLength": structure.cantRow,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                url: url, //Config.protocol+"//"+Config.domain+Config.folderServer+"/lib/lib_control/Intermediario.php",
                type: type, //"POST",
                data: function ( d ) {
                    // d.otherData = 0; // este dato se envia cuando se cambia la paguinacion 
                    // d.otherData1 = '1'; // La variable d es un objeto con todas las columnas
                },
                dataFilter: function(data){

                    var dataList = [];
                    var dataServer = jQuery.parseJSON( data );                        
                    var jsonDataTable = {};
                    
                    if(typeof structure != undefined && structure != null && structure != '') {
                        dataList = eval('dataServer.'+structure.data);                                                 
                    } else {
                        dataList = dataServer;
                    }

                    var addDataRow = "";
                    for (var i = 0; i < dataList.length; i++) {
                        addDataRow = self.addDataRow(dataList[i]);
                        dataList[i].data_input = addDataRow;
                    }

                    var total = eval('dataServer.'+structure.total);

                    jsonDataTable.data = dataList;
                    jsonDataTable.recordsTotal    = total;
                    jsonDataTable.recordsFiltered = total;
                    
                    return JSON.stringify( jsonDataTable ); // return JSON string
                }
            },
            "columns": columns,
            "columnDefs": [ {
                "targets": 0,
            //     "data": null,
            //     "defaultContent": "",
                orderable: false,
                className: 'select-checkbox',
            } ],
            select: true,
            order: [[ 1, 'asc' ]]
        };

        // Corrige la primera columna que sale para marcar
        if(typeof configCustom != 'undefined' && 
            typeof configCustom.select != 'undefined' &&            
            typeof configCustom.columnDefs == 'undefined' &&
            configCustom.select == false )
        {           
            configAjax.columnDefs = [{
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }];            
        }
        
        configAjax = Object.assign(configAjax, configIni);
        configAjax = Object.assign(configAjax, configCustom);
        
        this.table = $(this.element).DataTable( configAjax );
        this.accumulated();
        // this.table.rows( { selected: true } ).data();
    };
    
    this.serverSideSimple = function(type, structure, data, url, columns, search){
        var self = this;

        if( columns[0].data==null )
            columns[0].data = 'data_input';

        // var configAjax = {
        //     "processing": true,
        //     "pageLength": structure.cantRow,
        //     "serverSide": true,
        //     "responsive": true,
        //     "ajax": {
        //         url: url, //Config.protocol+"//"+Config.domain+Config.folderServer+"/lib/lib_control/Intermediario.php",
        //         type: type, //"POST",
        //         data: function ( d ) {
        //             // console.log(d);
        //             // d.otherData = 0; // este dato se envia cuando se cambia la paguinacion 
        //             // d.otherData1 = '1'; // La variable d es un objeto con todas las columnas
        //         },
        //         dataFilter: function(data){

        //             var dataList = [];
        //             var dataServer = jQuery.parseJSON( data );                        
        //             var jsonDataTable = {};
                    
        //             if(typeof structure != undefined && structure != null && structure != '') {
        //                 dataList = eval('dataServer.'+structure.data);                                                 
        //             } else {
        //                 dataList = dataServer;
        //             }

        //             var addDataRow = "";
        //             for (var i = 0; i < dataList.length; i++) {
        //                 addDataRow = self.addDataRow(dataList[i]);
        //                 dataList[i].data_input = addDataRow;
        //             }

        //             var total = eval('dataServer.'+structure.total);

        //             jsonDataTable.data = dataList;
        //             jsonDataTable.recordsTotal    = total;
        //             jsonDataTable.recordsFiltered = total;
                    
        //             return JSON.stringify( jsonDataTable ); // return JSON string
        //         }
        //     },
        //     "columns": columns,
        //     select: false,
        //     order: [[ 1, 'asc' ]],
        //     columnDefs : [{
        //         "targets": [ 0 ],
        //         "visible": false,
        //         "searchable": false
        //     }]   
        // };
        var configAjax = this.configBasicServerSide(type, structure, data, url, columns, search);
        
        configAjax = Object.assign(configAjax, configIni);
        configAjax = Object.assign(configAjax, configCustom);
        
        this.table = $(this.element).DataTable( configAjax );
        $(this.element+' tfoot th').each( function (index, el) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
        } );

        this.table.columns().every( function () {
            var that = this;
     
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        this.accumulated();
    };

    this.serverSideSimpleSelect = function(type, structure, data, url, columns, search){
        var self = this;

        if( columns[0].data==null )
            columns[0].data = 'data_input';

        var configAjax = {
            "processing": true,
            "pageLength": structure.cantRow,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                url: url, //Config.protocol+"//"+Config.domain+Config.folderServer+"/lib/lib_control/Intermediario.php",
                type: type, //"POST",
                data: function ( d ) {
                    // d.otherData = 0; // este dato se envia cuando se cambia la paguinacion 
                    // d.otherData1 = '1'; // La variable d es un objeto con todas las columnas
                },
                dataFilter: function(data){

                    var dataList = [];
                    var dataServer = jQuery.parseJSON( data );                        
                    var jsonDataTable = {};
                    
                    if(typeof structure != undefined && structure != null && structure != '') {
                        dataList = eval('dataServer.'+structure.data);                                                 
                    } else {
                        dataList = dataServer;
                    }

                    var addDataRow = "";
                    for (var i = 0; i < dataList.length; i++) {
                        addDataRow = self.addDataRow(dataList[i]);
                        dataList[i].data_input = addDataRow;
                    }

                    var total = eval('dataServer.'+structure.total);

                    jsonDataTable.data = dataList;
                    jsonDataTable.recordsTotal    = total;
                    jsonDataTable.recordsFiltered = total;
                    
                    return JSON.stringify( jsonDataTable ); // return JSON string
                }
            },
            "columns": columns,
            "columnDefs": [ {
                "targets": 0,
                orderable: false,
                className: 'select-checkbox',
            } ],
            select: true,
            order: [[ 1, 'asc' ]]
        };

        // Corrige la primera columna que sale para marcar
        if(typeof configCustom != 'undefined' && 
            typeof configCustom.select != 'undefined' &&            
            typeof configCustom.columnDefs == 'undefined' &&
            configCustom.select == false )
        {           
            configAjax.columnDefs = [{
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }];            
        }
        
        configAjax = Object.assign(configAjax, configIni);
        configAjax = Object.assign(configAjax, configCustom);
        
        this.table = $(this.element).DataTable( configAjax );
        this.accumulated();
        // this.table.rows( { selected: true } ).data();
    };

    this.serverSideMultiSelect = function(type, structure, data, url, columns, search){
        var self = this;

        if( columns[0].data==null )
            columns[0].data = 'data_input';

        var configAjax = {
            "processing": true,
            "pageLength": structure.cantRow,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                url: url, //Config.protocol+"//"+Config.domain+Config.folderServer+"/lib/lib_control/Intermediario.php",
                type: type, //"POST",
                data: function ( d ) {
                    // d.otherData = 0; // este dato se envia cuando se cambia la paguinacion 
                    // d.otherData1 = '1'; // La variable d es un objeto con todas las columnas
                },
                dataFilter: function(data){

                    var dataList = [];
                    var dataServer = jQuery.parseJSON( data );                        
                    var jsonDataTable = {};
                    
                    if(typeof structure != undefined && structure != null && structure != '') {
                        dataList = eval('dataServer.'+structure.data);                                                 
                    } else {
                        dataList = dataServer;
                    }

                    var addDataRow = "";
                    for (var i = 0; i < dataList.length; i++) {
                        addDataRow = self.addDataRow(dataList[i]);
                        dataList[i].data_input = addDataRow;
                    }

                    var total = eval('dataServer.'+structure.total);

                    jsonDataTable.data = dataList;
                    jsonDataTable.recordsTotal    = total;
                    jsonDataTable.recordsFiltered = total;
                    
                    return JSON.stringify( jsonDataTable ); // return JSON string
                }
            },
            "columns": columns,
            "columnDefs": [ {
                "targets": 0,
                orderable: false,
                className: 'select-checkbox',
            } ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            order: [[ 1, 'asc' ]]
        };

        // Corrige la primera columna que sale para marcar
        if(typeof configCustom != 'undefined' && 
            typeof configCustom.select != 'undefined' &&            
            typeof configCustom.columnDefs == 'undefined' &&
            configCustom.select == false )
        {           
            configAjax.columnDefs = [{
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }];            
        }
        
        configAjax = Object.assign(configAjax, configIni);
        configAjax = Object.assign(configAjax, configCustom);
        
        this.table = $(this.element).DataTable( configAjax );
        this.accumulated();
        // this.table.rows( { selected: true } ).data();
    };

    
    
    


}