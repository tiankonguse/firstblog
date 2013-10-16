 "use strict";

(function (window){
	
	if (!window.TK) {
		window.TK = {};
	}
	
	//script insert into the end of head.
	if(!TK.addScript){
		TK.addScript = function(options){

		    var script = document.createElement('script'); 
		    script.type = 'text/javascript'; 
		    script.async = true;
		    script.src = options.url;
		    
		    jQuery("head")[0].appendChild(script);
		    
		    if(options.load){
		        script.onload = script.onreadystatechange = options.load;
		    }

		    return script;
		 };
	}

	 
	//css insert into the front of head.
	if(!TK.addCss){
		TK.addCss = function(url){
			var link = document.createElement('link'); 
			link.setAttribute("rel", "stylesheet");
			link.setAttribute("type", "text/css");
			link.setAttribute("href", url);
		    link.async = true;
			jQuery("head link#icon").after(link);
		}
	}
	
	
})(window);
