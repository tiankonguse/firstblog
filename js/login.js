window.$ = function(elv) {
    return document.getElementById(elv);
}

window.onload = function() {

    loadEnd();

    $("login-form").onsubmit = function() {

	if (($("login-username").value == "")
		|| (!($("login-username").value)
			.match('^[A-Za-z0-9\u4e00-\u9fa5]+$'))
		|| $("login-username").value.length <= 5) {
	    alert("用户名不正确");
	    return false;
	}

	if (($("login-password").value).length <= 5) {
	    alert("密码不正确");
	    return false;
	}
    }

    $("register-form").onsubmit = function() {

	if ($("register-mark-key").value == null
		|| ($("register-mark-key").value).length != 6
		|| $("register-mark-key").value == ""
		|| (!($("register-mark-key").value).match('^[0-9]+$'))) {
	    alert("邀请码不正确");
	    return false;
	}
	
	if (($("register-username").value == "")
		|| (!($("register-username").value)
			.match('^[A-Za-z0-9\u4e00-\u9fa5]+$'))
		|| $("register-username").value.length <= 5) {
	    alert("用户名不合法");
	    return false;
	}

	if ($("register-password1").value != $("register-password2").value) {
	    alert("两次输入的密码不一样");
	    return false;
	}

	if (($("register-password1").value).length <= 5) {
	    alert("密码安全级别太低");
	    return false;
	}

	if ($("register-email").value == null
		|| ($("register-email").value).length == 0
		|| $("register-email").value == ""
		|| (!($("register-email").value).match('^[A-Za-z0-9._]+@(?:[A-Za-z0-9_]+[.])+[A-Za-z]{2,6}$'))
		) {
	    alert("邮箱有问题，请输入其它邮箱");
	    return false;
	}

    }

}

/*
 * 
 * 当点击登录时，显示登录的表单
 * 
 */
function OnClickInputLogin() {
    
    $("login-form").style.display = "block";
    $("register-form").style.display = "none";

    var tmp = $("divinput").children[0];

    tmp.children[0].style.backgroundColor = "#DDDDDD";
    tmp.children[1].style.backgroundColor = "#EEEEEE";
}
/*
 * 
 * 当点击注册时，显示注册的表单
 * 
 */
function OnClickInputRegister() {
    $("login-form").style.display = "none";
    $("register-form").style.display = "block";

    var tmp = $("divinput").children[0];
    tmp.children[0].style.backgroundColor = "#EEEEEE";
    tmp.children[1].style.backgroundColor = "#DDDDDD";

}

/*
 * 
 * 当点击逛逛时，跳到主页
 * 
 */
function OnClickInputVisitor() {
    window.location.href = "./";

}

function setCurrent(i) {
    if (i == 0) {
	OnClickInputLogin();
    } else {
	OnClickInputRegister();
    }
}
