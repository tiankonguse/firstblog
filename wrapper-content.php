<?php
sscanf ( $blog->getDatetime (), "%d-%d-%d %d:%d:%d", $year, $month, $day, $hour, $min, $sec );
$month_en = strftime ( "%b", mktime ( $hour, $min, $sec, $month, $day, $year ) );
?>

<div class="wrapper-content" itemprop="blogPost" itemscope="itemscope"
	itemtype="http://schema.org/BlogPosting">
	<meta content="<?php echo $blog->getKey(); ?>" itemprop="blogId">
	<meta content="<?php echo $blog->getKey(); ?>" itemprop="postId">
	<div class="wrapper-content-info-top">
		<div class="wrapper-content-date">
			<div class="wrapper-content-month"><?php echo  ($month_en); ?></div>
			<div class="wrapper-content-day"><?php echo  ($day); ?></div>
		</div>
		<div class="content-titles">

			<a href="blog.php?blogid=<?php echo  $blog->getKey(); ?>"
				rel="bookmark" title="title" class="content-title" itemprop="name">
				<h1><?php echo  $blog->getTitle(); ?></h1>
			</a>

		</div>
	</div>
	<div style="clear: both; height: 0px;"></div>
	<div class="wrapper-content-info-bottom">
		<ul class="content-info-bottom">
			<li class="content-info-bottom-item" itemprop="author"
				itemscope="itemscope" itemtype="http://schema.org/Person">
				<meta content="/" itemprop="url"> <img src="img/icon-all.gif"
				alt="icon-all" style="margin-bottom: -3px;"> <a href="/"
				rel="author" title="author profile" itemprop="name"><?php echo  $blog->getUser(); ?> </a>

			</li>
			<li class="content-info-bottom-item">|<img src="img/icon-flord.gif"
				alt="icon-flord" style="margin-bottom: -3px;"> <a href="#" title="#"
				rel="category tag">category</a>
			</li>
			<li class="content-info-bottom-item">
				<meta content="hblog.php?blogid=<?php echo  $blog->getKey(); ?>"
					itemprop="url"> |<img src="img/icon-time.gif" alt="icon-time"
				style="margin-bottom: -3px;"> <abbr itemprop="datePublished"><?php  echo  $blog->getDatetime(); ?></abbr>

			</li>
			<li class="content-info-bottom-item">|<img src="img/icon-comment.gif"
				alt="icon-comment" style="margin-bottom: -3px;"> <a href="#"
				title="#">0 Comments »</a>
			</li>
<?php   if(strcmp($page,"blog") == 0 && isset($_SESSION['tk_username']) && $_SESSION['tk_username'] != ""){	 ?>
			<li class="content-info-bottom-item">|<a
				href="writeContent/<?php echo  $blog->getKey(); ?>.html"
				title="alter">修改</a>
			</li>
			<li class="content-info-bottom-item">|<a
				href="check/delete/<?php echo  $blog->getKey(); ?>.html"
				title="delete">删除</a>
			</li>		
<?php	    } ?>
		</ul>
	</div>
	<div style="clear: both; height: 0px;"></div>
<?php if(strcmp($page,"index") == 0 || strcmp($page,"blog") == 0){ ?>
	<div class="post" itemprop="description articleBody">
		<div class="post-inner" style="height:auto; min-height:200px;<?php if(strcmp($page,"index") == 0){echo "max-height:300px;overflow: hidden;";} ?>" >
			<?php echo $blog->getContent(); ?>
		</div>
		
		<?php //index只显示一半，所以需要添加一个查看更多 ?>
		<?php if(strcmp($page,"index") == 0){ ?>
		<p>
			<a href="blog.php?blogid=<?php echo  $blog->getKey(); ?>"
				class="more-link">查看更多 »</a>
		</p>	
		<?php } ?>
		
	</div>
<?php } ?>
	<div class="post-footer">
		Tags: <a href="#" rel="tag"></a>
	</div>
</div>
<div class="wrapper-content-clear"></div>
