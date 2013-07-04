<?php session_start(); ?>
<?php include_once("../plug_in/databaseHelp.php"); ?>
<?php include_once("../class/mySQLClass.php"); ?>
<?php header('conten-type:text/html;charset=utf-8'); ?>

<?php

	$mysql = new MySQL();
	$mysql->Connect();
	
	if($mysql->state
	  ||!isset($_POST['register-username']) 
	  ||!isset($_POST['register-password'])
	  ||!isset($_POST['register-mark-key'])
	  ||!isset($_POST['register-email']) ){
?>
		<script language="JavaScript" type="text/javascript">
			window.location.href="../login.php";
		</script>
<?php
	}
	
	if(0){
		
	
		$UserName = writeToDatabase($_POST['register-username']);
		$PassWord = writeToDatabase($_POST['register-password']);
		$UserEmail = writeToDatabase($_POST['register-email']);

		$mysql->Query("select * from tk_user where tk_user_name = '".$UserName."'");
		
		if($row = $mysql->Fetch()){
			echo "用户名".$UserName."已经存在";
		}else{
			$mysql->Query("select * from tk_user where tk_user_email = '".$UserEmail."'");
			if($row = $mysql->Fetch()){
				echo "邮箱".$UserEmail."已经注册";
			}else{
				//开始注册，首先在user_info里登记信息
				$sql = "INSERT INTO tk_user_info (tk_user_info_email,tk_user_info_registered) VALUES ( '".$UserEmail."','".date("Y-m-d H:i:s")."')";
				$mysql->Insert($sql);
				$sql = "INSERT INTO tk_user (tk_user_name,tk_user_password,tk_user_email) VALUES ( '".$UserName."','".$PassWord."','".$UserEmail."')";
				$mysql->Insert($sql);

				$_SESSION['tk_username']=$UserName;	
			}		
		}
		$mysql->Close();
	}else{
		echo "邀请码不正确";	
	}
?>
