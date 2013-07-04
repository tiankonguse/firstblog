
<?php
	session_start();
	if(!isset($_SESSION['tk_username']) || $_SESSION['tk_username'] == ""){	
		echo "<script language=\"javascript\" type=\"text/javascript\">";
		echo "location.href=\"/\"";
		echo "</script>";
	}else{
?>

<!DOCTYPE HTML>
<html>

<head>

<?php require_once("inc/header.inc.php"); ?>
<?php include_once("plug_in/highlight.php"); ?>
<?php include_once("plug_in/databaseHelp.php"); ?>
<?php include_once("class/mySQLClass.php"); ?>


<title>write blog</title>
<link rel="stylesheet" type="text/css" href="css/writecontent.css" />

</head>

	
<body> 

<div id="wrapper-out" class="wrapper-out" >


	<?php  include_once("wrapper-top.php"); ?>


	<div id="wrapper-in" class="wrapper-in" >
		
		<div id="wrapper-in-content" class="wrapper-in-content" >
			<iframe id="wrapper-content"  class="wrapper-content-ifram" scrolling="no" allowtransparency="yes" frameborder="no" src="plug_in/blog-edite/blog-edite.php<?php if(isset($_GET['blogid']) && $_GET['blogid'] != ""){ echo "?blogid=".$_GET['blogid']; } ?>"> </iframe>
		</div>
		
		<?php  include_once("wrapper-in-right.php"); ?>
	</div>
	
	<?php  include_once("wrapper-footer.php"); ?>
</div>
<script language="javascript">
    
    var $ifram_wrapper_content = jQuery("#wrapper-content");

    function updateHeight(){
       $ifram_wrapper_content.css("height", $ifram_wrapper_content.contents().find("body").height()+80);
    }
    
	jQuery(document).ready(function(){
        setInterval("updateHeight()",1000);
	});
  
</script>
</body>
</html>

<?php } ?>