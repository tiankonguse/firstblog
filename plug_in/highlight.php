
<script>
//shBrushXml
jQuery(document).ready(function(){
    var codeArray = [];

    var codeMap = {"xml":"shBrushXml"
                  ,"cpp":"shBrushCpp"
                  ,"php":"shBrushPhp"
                  ,"css":"shBrushCss"
                  ,"javascript":"shBrushJScript"
                  ,"java":"shBrushJava"
                  ,"sql":"shBrushSql"
                  ,"vbscript":"shBrushVb"};
    var loadLength = 0;
    var maxLength = 0;

    var pre_url = "plug_in/syntaxhighlighter_3.0.83";
 
    if(jQuery("pre").length>0){
        TK.addScript({
            url:"plug_in/syntaxhighlighter_3.0.83/scripts/shCore.js"
            ,load:function(){
                TK.addCss(pre_url + "/styles/shCore.css");
                TK.addCss(pre_url + "/styles/shThemeDefault.css");
                loadPre();
            }
        });
    }
    
    function loadSyntaxHighlighter(){
        loadLength++;
        if(loadLength < maxLength)return ;
        console.log("load |"+loadLength+"|"+maxLength+"|");
        SyntaxHighlighter.all();
    }
    
    function loadPre(){
        console.log("begin load pre");
		jQuery('pre').each(function(){
			var that = jQuery(this);
			var code =  that.find('code');
			var codeLang = code.attr('class');
			var codeText = code.html();
			
			that.html(codeText);
			
            if(codeLang){
                
                if(!that.hasClass("brush: "+codeLang)){
                    that.addClass("brush: "+codeLang);
                }

                if(!codeArray[codeLang]){
                    
                    codeArray[codeLang] = true;
                    maxLength++;
                    TK.addScript({
                        url:pre_url + "/scripts/"+codeMap[codeLang]+".js"
                        ,load:function(){
                            
                            loadSyntaxHighlighter();
                        }
                    });
                };
            }
		});
    }

});
</script>