<!DOCTYPE HTML>
<?php session_start(); ?>
<html>

<head>
	<?php include_once("head-meta.php"); ?>
	<?php include_once("plug_in/databaseHelp.php"); ?>
	<?php include_once("class/mySQLClass.php"); ?>
	<title>tiankonguse~bookmark</title>
	<meta name="keywords" content="tiankonguse,bookmark,baidu,acm,acmer,google,soso" />
</head>
<body > 

<div id="wrapper-out" class="wrapper-out" >

	<?php include_once("wrapper-top.php"); ?>

	<div id="wrapper-in" class="wrapper-in" >
		<div id="wrapper-in-content" class="wrapper-in-content" >
			<div class="wrapper-in-bookmark">
				<div class="wrapper-in-bookmark-title">
					搜索引擎
				</div>

				<div class="wrapper-in-bookmark-site">
					<div class="wrapper-in-bookmark-site-item">
						<a href="http://www.baidu.com/" target="_blank" hidefocus>
							<div class="wrapper-in-bookmark-site-img">
								<img src="img/logo/baidu.gif" width="70" height="30">
							</div>
							<div class="wrapper-in-bookmark-site-url">
								百度
							</div>
						</a>
						
					</div>
					<div class="wrapper-in-bookmark-site-item">
						<a href="http://www.sogou.com/" target="_blank" hidefocus>
							<div class="wrapper-in-bookmark-site-img">
								<img src="img//logo/sougou.gif" width="70" height="30">
							</div>
							<div class="wrapper-in-bookmark-site-url">
								搜狗
							</div>
						</a>
						
					</div>
					<div class="wrapper-in-bookmark-site-item">
						<a href="https://www.google.com.hk/" target="_blank" hidefocus>
							<div class="wrapper-in-bookmark-site-img">
								<img src="img//logo/google.png" width="70" height="30">
							</div>
							<div class="wrapper-in-bookmark-site-url">
								谷歌
							</div>
						</a>
						
					</div>
					<div class="wrapper-in-bookmark-site-item">
						<a href="http://www.yahoo.cn/" target="_blank" hidefocus>
							<div class="wrapper-in-bookmark-site-img">
								<img src="img//logo/yahoo.gif" width="70" height="30">
							</div>
							<div class="wrapper-in-bookmark-site-url">
								雅虎
							</div>
						</a>
						
					</div>
					<div class="wrapper-in-bookmark-site-item">
						<a href="http://www.soso.com/" target="_blank" hidefocus>
							<div class="wrapper-in-bookmark-site-img">
								<img src="img//logo/soso.png" width="70" height="30">
							</div>
							<div class="wrapper-in-bookmark-site-url">
								搜搜
							</div>
						</a>
					</div>				

					<div class="wrapper-in-bookmark-site-item">
						<a href="http://www.youdao.com/" target="_blank" hidefocus>
							<div class="wrapper-in-bookmark-site-img">
								<img src="img/logo/youdao.png" width="70" height="30">
							</div>
							<div class="wrapper-in-bookmark-site-url">
								有道
							</div>
						</a>
					</div>				

					</div>
				
			</div>
		</div>
		<?php include_once("wrapper-in-right.php"); ?>
		<div class="clear"></div>
	</div>

	<?php include_once("wrapper-footer.php"); ?>
	
</div>


</body>
</html>
