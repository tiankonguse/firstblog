

<?php include_once("../class/mySQLClass.php"); ?>
<?php include_once("../class/blogClass.php"); ?>
<?php include_once("../plug_in/databaseHelp.php"); ?>
<?php session_start(); ?>


<?php

	if(isset($_SESSION['tk_username'])
	   && $_SESSION['tk_username'] != ""
	   && isset($_POST['main-title-input']) 
	   && isset($_POST['main-content-html'])){
		
		$id = $_POST['main-id-input'];
		
		$blog = new Blog($id);

		$blog->setTitle($_POST['main-title-input']);

		$blog->setContent($_POST['main-content-html']);
		
		//echo "lll--".$id."---lll";
		
		if($id == ""){
			//echo "-one-";
			$blog->setUser($_SESSION['tk_username']);
			$blog->create();
		}else{
			//echo "-two-";
			$blog->update();
		}
	}
	echo "<script language=\"javascript\" type=\"text/javascript\">";
	echo "window.parent.location.href=\"../\"";
	echo "</script>";
?>
