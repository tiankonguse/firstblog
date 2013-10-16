
 <?php 
	$mysql = new MySQL();
	$mysql->Connect();
	$const_maxFileNum = 5;
	$mysql->Query("select * from tk_file ORDER BY tk_file_date DESC LIMIT 0, ".writeToDatabase($const_maxFileNum));
 ?>
 <div class="rightblock">
	<div class="rightblock-title">FILE</div>
	<ul>
<?php while($row = $mysql->Fetch()){ ?>
		<li class="rightblock-item">
			<a href="blogFileList.php?file=<?php echo $row['tk_file_date']; ?>">
			<?php 
				sscanf($row['tk_file_date'],"%4s-%s",$tk_file_year,$tk_filemonth);
				echo ($tk_file_year."年".$tk_filemonth."月"."(".$row['tk_file_number'].")"); 
			?>
			</a>
		</li>
<?php } ?>
		<li class="rightblock-item"><a href="blogFileList.php"> 查看更多</a></li>
	</ul>
</div>	
<?php $mysql->Close(); ?>
