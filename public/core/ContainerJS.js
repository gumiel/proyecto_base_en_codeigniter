function ContainerJS(elemento){
	this.ele = $(elemento);
	
	this.init = function(){ 
		var obj = this;		
		for (var property in obj)
		{
			if (typeof obj[property] == 'function')
		    {		      
		      if (property.substr(0,1)=='_')
		      {
		      	eval("this."+property+"();");
		      }
		    }

		}
	};
	
	this.methodsInitUsed = function()
	{
		var obj = this;
		var msg = "";
		for (var property in obj)
		{
			if (typeof obj[property] == 'function')
			{
			  var inicio = obj[property].toString().indexOf('function');
			  var fin = obj[property].toString().indexOf(')')+1;
			  var propertyValue=obj[property].toString().substring(inicio,fin);
			  msg +=(typeof obj[property])+' '+property+' : '+propertyValue+' ;\n';
			}
		}		
	};

	this.registerId = function(value, name){
		console.log("asdasd");
		var nameAttribute = (typeof name != 'undefined')? name: value;
		this[nameAttribute] = this.ele.find('#'+value);		
	};

	this.registerClass = function(value, name){		
		var nameAttribute = (typeof name != 'undefined')? name: value;
		this[nameAttribute] = this.ele.find('.'+value);		
	};

	this.registerElement = function(value, name){			
		if(typeof name != 'undefined'){
			this[name] = this.ele.find(value);		
		}		
	};

	this.registerTable = function(table, name){
		if(typeof table == 'object' && typeof name != 'undefined'){
			this[name] = table;		
		}
	};
}
