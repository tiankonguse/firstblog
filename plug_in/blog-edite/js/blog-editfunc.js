"use strict"

if(typeof(TK) == "undefined"){
	var TK = {};
}

var TK = TK || {};

(function(win,jQuery,TK){
    
    /*
     *这里只允许获得id对象
     */
    TK.$ = function(id) {
        return document.getElementById(id);
    };
    
    TK.addReadyListener = function(ifram,listener){
        jQuery(ifram).ready(listener);
    };



    /*
     * 切换到HTML代码
     */ 
 /*
    $("toolbar-html").onmousedown = function(newevent) {

	getIframBody();

	if ($("main-content-html").style.display != "block") {

	    $("main-content-html").style.display = "block";
	    $("main-content-html").value = iframBody.innerHTML;
	    $("main-content-iframe").style.display = "none";

	} else {
	    $("main-content-iframe").style.display = "block";
	    iframBody.innerHTML = $("main-content-html").value;
	    $("main-content-html").style.display = "none";

	}

    };
    
    
    
*/
    
    /*
     *默认只有一个内部框架，所以储存起来
     * 得到当前的 iframe,document,body
     * 现在这个版本 iframe 储存的是jQuery获得的对象。
     */
    
    TK.iframObj = null;

    TK.getIfram = function(iframName) {

        if (TK.iframObj) {
            return TK.iframObj;
        }

        iframName = iframName || "main-content-iframe";
          
        TK.iframObj = jQuery("#"+iframName);
         
        return TK.iframObj;
    };

    TK.iframBody = null;

    TK.getIframBody = function(iframName) {
    
        if (TK.iframBody) {
            return TK.iframBody;
        }
    
        return (TK.iframBody = TK.getIfram(iframName).contents().find("body"));
    };    
    
    TK.setContent = function(content){
        TK.getIframBody().html(content);
    }
    
/*


TK.getIfram = function(iframName) {

    if (iframObj) {
	return iframObj;
    }

    iframName = iframName || "main-content-iframe";

    iframObj = frames[iframName] || $(iframName);

    return iframObj;
};

TK.iframDocument = null;

TK.getIframDocument = function(iframName) {

    var f = getIfram(iframName);

    iframDocument = f.document || f.contentDocument;

    return iframDocument;
};

TK.iframBody = null;

TK.getIframBody = function(iframName) {

    var f = getIframDocument(iframName);

    iframBody = f.body || f.getElementsByTagName("body")[0];

    return iframBody;
};
*/



    
    
    /*
     * setEditable 使iframe可以编辑 默认是不可编辑的
     * 
     */

    TK.setEditable = function() {
        //this.getIframDocument().designMode = "on";
        TK.getIfram().contents().designMode = "on";
    };
    
    TK.beginLoad = function() {
        TK.setEditable();
    };
    
    
    //toolbar-submit
    //var box;
    
	// jQuery(document.document).ready(function(){
		// jQuery.addScript({
			// url : "/js/jquery.blackbox.min.js"
			// ,load : function(){
                // box = new BlackBox();
			// }
		// });
	// });
    
    // var prompt_preview = function () {
        // box.prompt("请输入类别", function (data) {
            // if (data) {
                // box.alert("你刚刚输入了" + data)
            // } else {
                // box.alert("你放弃了输入类别")
            // }
        // }, {
            // title: '添加分类',
            // value: '确定'
        // })
    // }
    
    // jQuery("#addCategory").click(prompt_preview);
    
    
    
})(window,jQuery,TK);

/*
TK.$ = function(id) {
    return document.getElementById(id);
};
*/
/*
 * 
 * ev 监听所有事件 由于有的浏览器不支持直接使用event，所以需要判断
 * 
 */
/*
TK.ev = null;
*/

/*
TK.getEv = function(newEvent) {
    ev = newEvent || win.event || event;
    return ev;
};


*/
/*
 * 
 * 得到事件元素 一般得到的是叶子节点
 * 
 */
/*
TK.eventElement = null;

TK.getEventElement = function(newEvent) {
    getEv(newEvent);
    eventElement = ev.srcElement || ev.target;
    return eventElement;
}

/*
 * 
 * browserName 浏览器的名字 browserVersion 浏览器版本 暂时不是现在这个功能
 * 
 */
/*
TK.browserName = null;
TK.browserVersion = 0;
//
// /**
// * IsIE： 非ie浏览器时值为undefined. 相当于false
// */
// TK.IsIE = document.all;
//
// /**
// *
// * IEVer 如果是ie浏览器，获得ie浏览器的版本号
// *
// */
// TK.IEVer = null;
//
// TK.getIEVer = function() {
// var iVerNo = 0;
// var sVer = navigator.userAgent;
// if (sVer.indexOf("MSIE") > -1) {
// var sVerNo = sVer.split(";")[1];
// sVerNo = sVerNo.replace("MSIE", "");
// iVerNo = parseFloat(sVerNo);
// }
// IEVer = iVerNo;
// };

/*
 * 
 * 隐藏当前活动的menu
 * 
 */
 /*
TK.activeMenu = null;

TK.hide = function(obj) {
    obj.style.display = "none";
};

TK.hideMenu = function() {
    if (activeMenu != null) {
		hide(activeMenu);
		activeMenu = null;
    }
};


/*
 * setEditable 使frame可以编辑 默认是不可编辑的
 * 
 */
 /*
TK.setEditable = function() {
    getIframDocument().designMode = "on";
}

/*
 * 
 * 当点击frame时,若menu是打开状态，则关闭
 * 
 */
 /*
TK.onFrameClick = function() {
    getIframDocument().onclick = function(newevent) {
	hideMenu();
    }
}

/*
 * 
 * 点击提交按钮后用于判断是否可以提交
 * 
 * 
 */
/*
TK.formSubmit = function() {

    if ($("main-title-input").value == "") {
	alert("标题不能为空");
	return false;
    }

    if ($("main-title-input").value.length > 80) {
	alert("标题太长");
	return false;
    }

    $("main-content-html").value = getIframBody().innerHTML;

    return true;
};

/*
 * 
 * 工具条1: 发表，保存，撤销，重做
 * 
 */
 /*
TK.onMouseDownToolbarGroup1 = function() {
    $("toolbar-submit").onmousedown = function(newevent) {
	if (formSubmit()) {
	    $("content-form").submit();
	}
    };
};

/*
 * 
 * 工具条2 字体 大小 加粗 斜体 下划线 颜色 发光
 * 
 */
  /*
TK.onMouseDownToolbarGroup2 = function() {

    /*
     * 字体
     */ /*
    $("toolbar-fontname").onmousedown = function(newevent) {
	displayElement("toolbar-fontname", "");
    };

    $("toolbar-fontname-list").onmousedown = function(newevent) {
		getEventElement(newevent);
		if (eventElement.title != "-1") {
			format('fontname', eventElement.style.fontFamily);
			$("toolbar-fontname-list-current").innerHTML = eventElement.innerHTML;
			hide($("toolbar-fontname-list"));
		}
    };

    /*
     * 大小
     */ /*
    $("toolbar-fontsize").onmousedown = function(newevent) {
	displayElement("toolbar-fontsize", "");
    };

    $("toolbar-fontsize-list").onmousedown = function(newevent) {
		getEventElement(newevent);
		if (eventElement.title != "-1") {
			format('fontSize', eventElement.innerHTML + "pt");
			$("toolbar-fontsize-list-current").innerHTML = eventElement.innerHTML;
			hide($("toolbar-fontsize-list"));
		}
    };

    // 加粗
    $("toolbar-bold").onmousedown = function(newevent) {
	format('Bold');
    };

    // 斜体
    $("toolbar-italic").onmousedown = function(newevent) {
	format('Italic');
    };

    // 下划线
    $("toolbar-underline").onmousedown = function(newevent) {
	format('Underline');
    };

    // 颜色
    $("toolbar-color").onmousedown = function(newevent) {
	var colorValue = showColorBorad();
	if (colorValue != null && colorValue) {
	    format("foreColor", colorValue);
	}
    };
    /*
     * 点击左侧颜色
     */ /*
    $("toolbar-color-board-canvas-left").onmousedown = function(newevent) {
	//	
	// $("toolbar-color-board-left-drag").style.top = (event.offsetY + 3)
	// + "px";
	//
	// $("myerror").innerHTML = "<br/>x:" + event.offsetX + ",y:"
	// + event.offsetY;
    };
    // 发光

};

/*
 * 
 * 工具条3 对齐方式 列表 缩进
 * 
 */ /*
TK.onMouseDownToolbarGroup3 = function() {

    /*
     * 对齐方式
     */ /*
    $("toolbar-justifyleft").onmousedown = function(newevent) {
	format('justifyleft');
    };

    $("toolbar-justifycenter").onmousedown = function(newevent) {
	format('justifycenter');
    };

    $("toolbar-justifyright").onmousedown = function(newevent) {
	format('justifyright');
    };

    $("toolbar-justifyfull").onmousedown = function(newevent) {
	format('justifyfull');
    };

    /*
     * 列表
     */ /*
    $("toolbar-listol").onmousedown = function(newevent) {
	format('Insertorderedlist');
    };

    $("toolbar-listul").onmousedown = function(newevent) {
	format('Insertunorderedlist');
    };

    /*
     * 缩进
     */ /*
    $("toolbar-tableft").onmousedown = function(newevent) {
	format('Outdent','');
    };

    $("toolbar-tabright").onmousedown = function(newevent) {
	format('Indent','');
    };

};

/*
 * 工具条:链接 工具条:图片 工具条:表情 工具条: 高级工具条
 * 
 */
 /*
TK.onMouseDownToolbarGroup4 = function() {
    /*
     * 插入链接
     */ /*
    $("toolbar-link").onmousedown = function(newevent) {
	var URL = prompt("Enter link location :", "http://");
	if ((URL != null) && (URL != "http://")) {
	    format("CreateLink", URL);
	}
    };
    /*
     * 插入图片
     */ /*
    $("toolbar-image").onmousedown = function(newevent) {
	var sPhoto = prompt("请输入图片位置:", "http://");
	if ((sPhoto != null) && (sPhoto != "http://")) {
	    format("InsertImage", sPhoto);
	}
    };

    /*
     * 高级功能
     */ /*
    $("toolbar-switcher").onmousedown = function(newevent) {

	if ($("toolbar-extra").style.display != "block") {
	    $("toolbar-extra").style.display = "block";
	} else {
	    $("toolbar-extra").style.display = "none";
	}
    };

};

/*
 * 工具条:清除格式 工具条:切换到HTML代码 工具条:全屏
 */ /*
TK.onMouseDownToolbarGroup5 = function() {
    /*
     * 切换到HTML代码
     */ /*
    $("toolbar-html").onmousedown = function(newevent) {

	getIframBody();

	if ($("main-content-html").style.display != "block") {

	    $("main-content-html").style.display = "block";
	    $("main-content-html").value = iframBody.innerHTML;
	    $("main-content-iframe").style.display = "none";

	} else {
	    $("main-content-iframe").style.display = "block";
	    iframBody.innerHTML = $("main-content-html").value;
	    $("main-content-html").style.display = "none";

	}

    };


};
/*
 * 工具条:test,code
 */ /*
TK.onMouseDownToolbarGroup6 = function() {
    /*
     * 插入test
     */ /*
    $("toolbar-test").onmousedown = function(newevent) {
	format("InsertHTML", '<h1>h1</h1>');
    }
    /*
     * 插入code
     */ /*
    $("toolbar-code").onmousedown = function(newevent) {
	showCodeView();
    }
    $("toolbar-code-in-bottom-input-ok").onmousedown = function(newevent) {
	var codeText = formatToHtml($("toolbar-code-in-code").value);
	var codeLang = $("toolbar-code-in-lang").value;
	codeText = "<pre ><code class='" + codeLang + "'>" + codeText + "</code></pre>";
	//codeText = "<br/><pre class=\"brush: " + codeLang + "\">" + codeText + "</pre><br/>";
	
	hideCodeView();
	
	format("InsertHTML", codeText);
    
	}
    $("toolbar-code-in-bottom-cancel").onmousedown = function(newevent) {
		hideCodeView();
    }
    
    
};

/*
 *formatToHtml函数主要功能是把html的字符转化为html实体字符，也就是转化为内部编码格式。
 *
 */
 /*
TK.htmlCharacter = /[&<>]/g;

TK.htmlEntities = { "&" : "&amp;","<" : "&lt;",">" : "&gt;"};

TK.formatToHtml = function(str){
	str = str.replace(htmlCharacter, function(c) { return htmlEntities[c]; });
	return str;
}



TK.showCodeView = function(){
    $("toolbar-code-out").style.display = "block";
};
TK.hideCodeView = function(){
    $("toolbar-code-in-code").value = "";
    $("toolbar-code-out").style.display = "none";
};

/*
 * 
 * loadOver判断页面是否加载完毕
 * 
 */
 /*
TK.loadOver = false;

TK.onload = function() {

    loadOver = true;
    setEditable();
    // getIEVer();
    onFrameClick();
    onMouseDownToolbarGroup1();
    onMouseDownToolbarGroup2();
    onMouseDownToolbarGroup3();
    onMouseDownToolbarGroup4();
    onMouseDownToolbarGroup5();
    onMouseDownToolbarGroup6();

    /*
     * 这个定时器主要用于调整框架，当框架没有得到焦点时应该不会变大或变小吧
     * 
     */ /*
    setInterval("StartCheckIfram()", 1000);

}

// TK.ieFunction = function() {
// $("toolbar-fontname-list").onmousemove = function() {
// try {
// event.srcElement.style.backgroundColor = "rgba(141, 145, 126, 0.30)";
// } catch (e) {
// event.srcElement.style.backgroundColor = "rgb(141, 145, 126)";
// }
// };
//
// $("toolbar-fontname-list").onmouseout = function() {
// try {
// event.srcElement.style.backgroundColor = "rgba(235, 236, 230, 0.30)";
// } catch (e) {
// event.srcElement.style.backgroundColor = "rgb(235, 236, 230)";
// }
// };
//
// $("toolbar-fontsize-list").onmousemove = function() {
// try {
// event.srcElement.style.backgroundColor = "rgba(141, 145, 126, 0.30)";
// } catch (e) {
// event.srcElement.style.backgroundColor = "rgb(141, 145, 126)";
// }
// };
//
// $("toolbar-fontsize-list").onmouseout = function() {
// try {
// event.srcElement.style.backgroundColor = "rgba(235, 236, 230, 0.30)";
// } catch (e) {
// event.srcElement.style.backgroundColor = "rgb(235, 236, 230)";
// }
// };
//
// try {
// $("toolbar-fontsize-list").style.backgroundColor = "rgba(235, 236, 230,
// 0.30)";
// $("toolbar-fontname-list").style.backgroundColor = "rgba(235, 236, 230,
// 0.30)";
// } catch (e) {
// $("toolbar-fontsize-list").style.backgroundColor = "rgb(235, 236, 230)";
// $("toolbar-fontname-list").style.backgroundColor = "rgb(235, 236, 230)";
// }
//
// };

TK.getLastChild = function(e) {
    var num = e.children.length;
    if(num > 0 && e.children) {
		e = e.children[num - 1];
		num = e.children.length;
    }
    return e;
};

TK.iframCkeck = function(iframName) {

    getIframBody(iframName);
    var num = iframBody.children.length;
	
    if (num > 0) {
		var NewHeight = getY(getLastChild(iframBody)) + 60;		
		NewHeight = NewHeight > iframBody.scrollHeight ? NewHeight : iframBody.scrollHeight;
		if (NewHeight > 843) {
			$(iframName).style.height = NewHeight + "px";
		}
    }
}

TK.StartCheckIfram = function() {
    iframCkeck("main-content-iframe");
};

TK.onerror = function(msg, url, line) {
	$("myerror").innerHTML = $("myerror").innerHTML + "<br/>onerror:" + msg 
	+ "<br/> url:" + url + "<br/> line:" + line + "<br>";
};

TK.format = function(type, para) {

    hideMenu();
    //
    // var alertmsg = "";
    //
    // if (!IsIE) {
    // switch (type) {
    // case "Cut":
    // alertmsg = "你的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成";
    // break;
    // case "Copy":
    // alertmsg = "你的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成";
    // break;
    // case "Paste":
    // alertmsg = "你的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成";
    // break;
    // }
    //
    // if (alertmsg != "") {
    // alert(alertmsg);
    // return;
    // }
    // }

    var f = getIfram();

    f.focus();

    getIframDocument().execCommand(type, false, para);

    // if (!para) {
    // if (IsIE) {
    // iframDoc.execCommand(type);
    // } else {
    // iframDoc.execCommand(type, false, false);
    // }
    // } else {
    // iframDoc.execCommand(type, true, para);
    // }

    f.focus();

}

TK.getX = function(e) {
    var x = e.offsetLeft;
    while (e = e.offsetParent) {
	x += e.offsetLeft;
    }
    return x;
}

TK.getY = function(e) {
    var y = e.offsetTop + e.offsetHeight;
    while (e = e.offsetParent) {
		y += e.offsetTop;
    }
    return y;
}

TK.displayElement = function(name, displayValue) {

    hideMenu();

    var elementname = name + "-list";

    if (typeof elementname == "string") {
	activeMenu = $(elementname);
    }

    if (activeMenu == null) {
	return;
    }

    name = $(name);
    // $("myerror").innerHTML += "<br/>elementname:"+elementname
    // +"->activeMenu:"+activeMenu ;

    if (name != null) {
	var x = getX(name);
	var y = getY(name);
	// $("myerror").innerHTML +=
	// "<br/>activeMenu"+activeMenu+"x:"+x+",y:"+y;
	activeMenu.style.display = "block";
	activeMenu.style.left = x + "px";
	activeMenu.style.top = (y + 25) + "px";
    }
}
TK.showColorBorad = function() {
    var colorValue = null;

    return colorValue;
};
*/

