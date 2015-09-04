<?php include_once("wait.php"); ?>

<div id="wrapper-in-right" class="wrapper-in-right">
	
 <?php include_once("wrapper-in-right/wrapper-in-right-public.php"); ?>

 
 <?php include_once("wrapper-in-right/wrapper-in-right-baidu-search.php"); ?>
 
 <?php include_once("wrapper-in-right/wrapper-in-right-googleplus.php"); ?>
	
<?php if(isset($_SESSION['tk_username']) && $_SESSION['tk_username'] != ""){ ?>	
	<?php include_once("wrapper-in-right/wrapper-in-right-manger.php"); ?>
<?php }else{ ?>
	<?php include_once("wrapper-in-right/wrapper-in-right-base.php"); ?>
<?php } ?>
	
<?php include_once("wrapper-in-right/wrapper-in-right-heigh.php"); ?>
	
<?php include_once("wrapper-in-right/wrapper-in-right-file.php"); ?>

<?php include_once("wrapper-in-right/wrapper-in-right-alexa.php"); ?>

<?php include_once("wrapper-in-right/wrapper-in-right-alexa-toolbar.php"); ?>

	
</div>
