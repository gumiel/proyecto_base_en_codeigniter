/**
 * Variables de configuracion
 */
var Config = {
	folderServer  : "/kerp/pxp/lib/rest",
	folder  : "/movil",
	// domain : document.domain,
	domain : '192.168.56.2',
	protocol : window.location.protocol,
	baseUrl : function(){
		return this.protocol + "//" + this.domain + this.folderServer;
	},
	siteUrl : function(){
		return this.protocol + "//" + this.domain + this.folderServer + this.folder;
	}
};
