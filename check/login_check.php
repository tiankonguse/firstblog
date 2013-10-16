<?php session_start(); ?>
<?php include_once("../plug_in/databaseHelp.php"); ?>
<?php include_once("../class/mySQLClass.php"); ?>
<?php header('conten-type:text/html;charset=utf-8'); ?>
	
 <?php

	$mysql = new MySQL();
	$mysql->Connect();
	
	if($mysql->state
	  ||!isset($_POST['login-username']) 
	  ||!isset($_POST['login-password'])){
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='../'";
		echo "</script>";
	}else{
		$UserName = writeToDatabase($_POST['login-username']);
		$PassWord = writeToDatabase($_POST['login-password']);
		
		if (!preg_match('/^[.A-Za-z0-9_@]{5,20}$/',$UserName)) {
			echo "<script language='javascript' type='text/javascript'>";
			echo "window.location.href='../'";
			echo "</script>";
		} else{
			$sql = "select * from tk_user where tk_user_name = '".$UserName."' and tk_user_password = '".$PassWord."'";
			
			$mysql->Query($sql);
			
			if(!$mysql->state && $mysql->Fetch()){
				$_SESSION['tk_username']=$UserName;
			}else{
				$_SESSION['tk_username']="";
			}
			
			$mysql->Close();

			if($_SESSION['tk_username'] == ""){
					echo "<script language='javascript' type='text/javascript'>";
					echo "window.location.href='../login.php'";
					echo "</script>";
			}else{
					echo "<script language='javascript' type='text/javascript'>";
					echo "window.location.href='../'";
					echo "</script>";
			}
		
			
		}
		
	}
	

?>		
	
	

