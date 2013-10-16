<!DOCTYPE HTML>

<?php session_start(); ?>

<html>

<head>
	<?php include_once("head-meta.php"); ?>
	<?php include_once("plug_in/highlight.php"); ?>
	<?php include_once("plug_in/databaseHelp.php"); ?>
	<?php include_once("class/mySQLClass.php"); ?>
	<?php include_once("class/blogClass.php"); ?>
	<?php include_once("class/blogListClass.php"); ?>
	<title>tiankonguse~blog</title>
	
</head>
<?php
	$const_maxNum = 10;
	$href = "blog.php";
	$page = "blog";
	$file = "";
?>
<body> 


<div id="wrapper-out" class="wrapper-out" >

	<?php include_once("wrapper-top.php"); ?>
	
	<div id="wrapper-in" class="wrapper-in" >
		<div id="wrapper-in-content" class="wrapper-in-content" >
<?php

		if(isset($_GET['blogid']) && $_GET['blogid'] != ""){
			$blog = new Blog($_GET['blogid']);
			if($blog->getKey() != ""){
?>
<script type="text/javascript">
	$("title").html("<?php echo $blog->getTitle(); ?>");
</script>

<?php
				include("wrapper-content.php");
			}
		}else{
			$page = "allblog";
			$nowPage = 1;
			
			if(isset($_GET['nowPage']) && $_GET['nowPage'] != ""){
				//这里需要验证$_GET['nowPage']是否合法
				$nowPage = $_GET['nowPage']; 				
			}
			
			$blogList = new BlogList(BLOG_LIST_TYPE_NORMAL, $nowPage, $const_maxNum);
			
			//echo $blogList->getNowPage();
			
			if($blogList->state()){
				echo "发生意外情况，请稍后在访问<br/>";
			}else{
				while($row = $blogList->Fetch()){
					$blog = new Blog($row['tk_blog_key']);
					if($blog->getKey() != ""){
						include("./wrapper-content.php");
					}
				}
				include_once("./pageManger.php");	
			}
		}
?>
		</div>
		<?php include_once("./wrapper-in-right.php"); ?>
		
	</div>

	<?php include_once("./wrapper-footer.php"); ?>
</div>

</body>
</html>
