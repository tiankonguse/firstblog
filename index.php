<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
	<?php require_once("inc/header.inc.php"); ?>
	<title>tiankonguse'record</title>
	<link href="css/main.css" rel="stylesheet">

	<?php include_once("plug_in/highlight.php"); ?>
	<?php include_once("plug_in/databaseHelp.php"); ?>
	<?php include_once("class/mySQLClass.php"); ?>
	<?php include_once("class/blogClass.php"); ?>
	<?php include_once("class/blogListClass.php"); ?>
	<title>tiankonguse~home</title>
</head>
<?php
	$const_maxNum = 10;
	$href = "blog.php";
	$page = "index";
	$file = "";
?>

<body > 

<div id="mytest" class="mytest" >

</div>

<div id="wrapper-out" class="wrapper-out" >

	<?php include_once("wrapper-top.php"); ?>
	
	<div id="wrapper-in" class="wrapper-in" >
		<div id="wrapper-in-content" class="wrapper-in-content" >
<?php

		$blogList = new BlogList(BLOG_LIST_TYPE_NORMAL, 1, $const_maxNum);
		
		if($blogList->state()){
			echo "如果出现此页面，请联系网站管理人员！<br/>";
			echo "联系邮箱shen10000shen@gmail.com";
		}else{
			while($row = $blogList->Fetch()){
				$blog = new Blog($row['tk_blog_key']);
				if($blog->getKey() != ""){
					include("wrapper-content.php");
				}
			}
			echo "<p> <a href=\"blog.php\" class=\"more-link\">更多blog</a></p>";

		}
?>
		</div>
		<?php include_once("wrapper-in-right.php"); ?>
		<div class="clear"></div>
	</div>
	
	<?php include_once("wrapper-footer.php"); ?>
	<div class="clear"></div>
</div>

</body>
</html>
