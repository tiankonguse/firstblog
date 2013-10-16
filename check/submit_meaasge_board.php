<?php include_once("../plug_in/databaseHelp.php"); ?>
<?php include_once("../class/mySQLClass.php"); ?>
<?php header('conten-type:text/html;charset=utf-8'); ?>
<?php session_start(); ?>

<?php
	$mysql = new MySQL();
	$mysql->Connect();
	
	if(!$mysql->state
	   &&isset($_POST['main-title-input']) 
	   &&isset($_POST['main-content-html'])){
	
		$name = writeToDatabase($_POST['main-title-input']);
		$content = writeToDatabase($_POST['main-content-html']);
		
		$tk_datetime = date("Y-m-d H:i:s");
		$tk_key = $name.time(void);
		$sql = "INSERT INTO tk_message_board (tk_message_board_key,tk_message_board_name,tk_message_board_datetime,tk_message_board_message) VALUES (  '".$tk_key."','".$name."','".$tk_datetime."','".$content."')";
		$mysql->Insert($sql);
		$mysql->Close();
	}
?>
<form id="form_tmp" method="post" target="_top" action="form_tmp.php" >
	<input type="text" name="input_tmp" id="input_tmp">
</form>
<script language="JavaScript" type="text/javascript">
	document.getElementById("input_tmp").value="../messageboard.php";
	document.getElementById("form_tmp").submit();
</script>