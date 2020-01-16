var CallRest = {
	config: {
		url: '',
		type: '',
		dataType: 'json',
		xhrFields: { withCredentials:true },
		data: {},
		async: true,
		beforeSend: function(request) {
			request.setRequestHeader("callRest", "json");
		},
	},
	post: function(url, data, callback){

		this.config.url = Config.rest_base_url+url;
		this.config.data = data;
		this.config.type = 'POST';
		
		$.ajax(this.config)
		.done(function(result) {
			return callback(result);
		})
		.fail(function(jqXHR, textStatus, errorThrown) {
			
			if(textStatus=="error")
			{		
				switch(jqXHR.status){
					case 406:  Notificacions.errors("ERROR 406");
					case 404:  Notificacions.errors("ERROR 404");
				}
			}
		});	
	},
	postReturn: function(url, data){
		var res;
		this.config.url = Config.rest_base_url+url;
		this.config.data = data;
		this.config.type = 'POST';
		this.config.async = false;
		
		$.ajax(this.config)
		.done(function(result) {
			res = result;
		})
		.fail(function(jqXHR, textStatus, errorThrown) {
			
			if(textStatus=="error")
			{		
				switch(jqXHR.status){
					case 406:  Notificacions.errors("ERROR 406");
					case 404:  Notificacions.errors("ERROR 404");
				}
			}
			res = null;
		});	
		return res;
	},
	get : function(url, data, callback){
		
		this.config.url = url;
		this.config.data = data;
		this.config.type = 'GET';
		
		$.ajax(this.config)
		.done(function(result) {
			return callback(result);
		})
		.fail(function(jqXHR, textStatus, errorThrown) {
			console.log(99999);
			if(textStatus=="error")
			{		
				switch(jqXHR.status){
					case 406:  Notificacions.errors("ERROR 406");
					case 404:  Notificacions.errors("ERROR 404");
				}
			}
		});	
	}  
	
	
};