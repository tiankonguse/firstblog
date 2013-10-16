<?php session_start(); ?>
<?php header('conten-type:text/html;charset=utf-8'); ?>
<?php include_once("../plug_in/databaseHelp.php"); ?>
<?php include_once("../class/mySQLClass.php"); ?>

 <?php
	$mysql = new MySQL();
	$mysql->Connect();
	if(!$mysql->state && isset($_SESSION['tk_username']) && isset($_GET['blogid'])){
		$blogid = writeToDatabase($_GET['blogid']);
		$sql = "delete from tk_blog where tk_blog_key = '".$blogid."'";
		$mysql->Delete($sql);
		//echo $mysql->getError()."<br/>";
		$mysql->Close();
	}
?>
	<script language="JavaScript" type="text/javascript">
		window.location.href="/";
	</script>
