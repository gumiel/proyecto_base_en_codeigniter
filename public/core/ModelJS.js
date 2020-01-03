
function ModelJS(model)
{
	var modelJs = model;
	var nuevo;

	///////////////////////////////
	// Este es un metodo privado //
	///////////////////////////////
	this.removeNull = function(obj)
	{
		alert("privado");
		if( typeof obj != 'undefined')
		{
			obj = modelJs;
		}
		
		for(var atr in obj)
		{	
			if(typeof obj[atr]=='object' && obj[atr]!= null )
			{							
				obj[atr] = this.removeNull(obj[atr]);
			} else
			{					
				// if(obj[atr] == 'null' || obj[atr] == null)
				if(obj[atr] == null)
				{								
					obj[atr] = '';
				}	
			}
		}
		return obj;
	};

	

	
}

///////////////////////////////
// Este es un metodo publico //
///////////////////////////////
ModelJS.removeNull = function(obj){
	for(const atr in obj)
	{	
		if(typeof obj[atr]=='object' && obj[atr]!=null )
		{							
			obj[atr] = ModelJS.removeNull(obj[atr]);
		} else{	
			// if(obj[atr] == 'null' || obj[atr] == null)
			if(obj[atr] == null)
			{			
				obj[atr] = '';
			}	
		}
	}
	return obj;
};

