<?php
session_start ();
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php require_once("inc/header.inc.php"); ?>

	<title>登陆</title>

<link rel="stylesheet" type="text/css" href="css/login.css">

<script src="js/login.js"></script>
<script type="text/javascript">
	function loadEnd() {
		<?php if(isset($_GET['action']) && $_GET['action'] == "register"){ ?>
			 OnClickInputRegister();
		<?php }else{ ?>
			OnClickInputLogin();
		<?php } ?>
	}
</script>
</head>
<body>

	<marquee scrollamount="2" id="marquee-top" class="marquee-top">
		<div onmouseover="javascript:this.parentNode.stop();"
			onmouseout="javascript:this.parentNode.start();"
			style="cursor: pointer;">欢迎来到天空的世界</div>
	</marquee>

	<div class="divMain">

		<div class="Header">欢迎来到天空博客!</div>

		<div id="divinput" class="divinput">

			<ul class="inputmenu">
				<li class="menuli" onclick="setCurrent(0)">登陆</li>
				<li class="menuli" onclick="setCurrent(1)">注册</li>
				<li class="menuli" onclick="OnClickInputVisitor()">逛逛</li>
			</ul>


			<div class="divinput-hr"></div>

			<div id="myerror-message" class="myerror-message"></div>

			<form id="login-form" class="login-form" method="post"
				action="check/login_check.php">
				<div class="form-input">
					<div class="form-input-name">用户名:</div>
					<input id="login-username" name="login-username"
						class="form-input-text" type="text" />
				</div>
				<div class="form-input">
					<div class="form-input-name">密 码:</div>
					<input id="login-password" name="login-password"
						class="form-input-text" type="password" />
				</div>

				<div class="form-input">
					<input type="submit" class="form-input-button"
						id="form-input-button-submit" value="提交" /> <input type="reset"
						class="form-input-button" value="重置" />
				</div>
			</form>

			<form id="register-form" class="register-form" method="post"
				action="./check/register_check.php">
				<div class="form-input">
					<div class="form-input-name">用户名:</div>
					<input id="register-username" class="form-input-text"
						name="register-username" type="text" />
				</div>
				<div class="form-input">
					<div class="form-input-name">密 码:</div>
					<input id="register-password1" class="form-input-text"
						name="register-password" type="password" />
				</div>
				<div class="form-input">
					<div class="form-input-name">密码确认:</div>
					<input id="register-password2" class="form-input-text"
						type="password" />
				</div>
				<div class="form-input">
					<div class="form-input-name">邮箱:</div>
					<input id="register-email" class="form-input-text"
						name="register-email" type="text" />
				</div>
				<div class="form-input">
					<div class="form-input-name">邀请码:</div>
					<input id="register-mark-key" class="form-input-text"
						name="register-mark-key" type="text" />
				</div>

				<div class="form-input">
					<input type="submit" class="form-input-button" value="提交" /> <input
						type="reset" class="form-input-button" value="重置" />
				</div>
			</form>


		</div>

	</div>

	<div>
		<script type="text/javascript">
	
	window.onerror=function(msg,url,line){
		var errorMsg = msg+"<br/> url "+url+" <br/> line:"+line + "<br/>";
		document.write(errorMsg);
	};

</script>
	</div>

</body>



<script type="text/javascript">
<?php
/*
 * $_SESSION['tk_username'] 2：用户名或密码错误
 */
if (isset ( $_SESSION ['tk_username'] ) && $_SESSION ['tk_username'] == "") {
	?>
			document.getElementById("myerror-message").style.display="block";
			document.getElementById("myerror-message").innerHTML="用户名或密码错误";
<?php
	unset ( $_SESSION ['tk_username'] );
}
?>	
</script>



</html>
