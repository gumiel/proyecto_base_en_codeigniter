var correctorIframe = function(id){

    this.contador = 0;
    this.height = 0;
    this.heightAnterior = 0;
    this.id='';

    var self = this;
    
    var constructor = function (){
        self.id=id;
            
        if(document.getElementById (self.id)!=null)
        {
            // self.setIframeHeight(self.id);
            if( self.heightAnterior == self.height )
            {
                setInterval(function(){
                    self.setIframeHeight(self.id);
                },1000);
            }
        }
    };

    

    this.setIframeHeight = function (id) {
        
        var ifrm = document.getElementById(id);
        var doc = ifrm.contentDocument? ifrm.contentDocument: 
            ifrm.contentWindow.document;
        ifrm.style.visibility = 'hidden';
        ifrm.style.height = "10px"; // reset to minimal height ...
        // IE opt. for bing/msn needs a bit added or scrollbar appears
        var getDocHeight = this.getDocHeight( doc );
        this.height = getDocHeight;
        
        ifrm.style.height = getDocHeight + 40 + "px";
        ifrm.style.visibility = 'visible';
    };

    this.getDocHeight = function (doc) {
        doc = doc || document;
        // stackoverflow.com/questions/1145850/
        var body = doc.body, html = doc.documentElement;
        var height = Math.max( body.scrollHeight, body.offsetHeight, 
            html.clientHeight, html.scrollHeight, html.offsetHeight );    
        return height;
    };

    constructor();

};