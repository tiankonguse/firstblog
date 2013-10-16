<!DOCTYPE HTML>
<?php session_start(); ?>
<html>

<head>
<?php include_once("./head-meta.php");  ?>
<title>tiankonguse~blog</title>
<script language="javascript" SRC="./js/CHECKFRAM.js"></script>
<script language="javascript" SRC="./js/messageboard.js"></script>
<script charset="utf-8" src="/plug_in/kindeditor-4.1.5/kindeditor-min.js" async="true" charset="utf-8"></script>
<script charset="utf-8" src="/plug_in/kindeditor-4.1.5/lang/zh_CN.js" async="true" charset="utf-8"></script>
<script charset="utf-8" src="/plug_in/kindeditor-4.1.5/qqstyle.js" async="true" charset="utf-8"></script>
<?php include_once("./plug_in/databaseHelp.php"); ?>
<?php include_once("./class/mySQLClass.php");  ?>

</head>
<?php
	$const_maxNum = 10;

?>
<body> 

<div id="mytest" class="mytest" >

</div>

<div id="wrapper-out" class="wrapper-out" >

	<?php include_once("wrapper-top.php"); ?>
	
	<div id="wrapper-in" class="wrapper-in" >
		
		<div id="wrapper-in-content" class="wrapper-in-content" >
			
				
<?php
	
	
	$mysql = new MySQL();
	$mysql->Connect();
	
	if($mysql->state){
		echo "not connect";
	}else{
		
		
		$sql = "select * from tk_message_board ORDER BY tk_message_board_datetime DESC";
		$mysql->Query($sql);
		

		
		if($mysql->state){
			echo "暂时没有留言<br/>";
		}else{

			$maxnum = $mysql->rowCount > $const_maxNum ? $const_maxNum : $mysql->rowCount;
			
			while(($row = $mysql->Fetch()) && $maxnum > 0){

				sscanf($row['tk_message_board_datetime'],"%d-%d-%d %d:%d:%d",$year,$month,$day,$hour,$min,$sec);
				$month_en =  strftime("%b", mktime($hour,$min,$sec,$month,$day,$year));
?>

			<div class="wrapper-content">
				<div class="wrapper-content-date">
					<div class="wrapper-content-month"><?php echo $month_en; ?></div>
					<div class="wrapper-content-day"><?php echo $day; ?></div>
				</div>
				<div class="content-info">
					<div class="content-titles">
						<?php echo $row['tk_message_board_name']; ?>
					</div>	
					<div><img src="/images/icon-time.gif" alt="icon-time" style="margin-bottom:-3px;"> 
						<?php  echo $row['tk_message_board_datetime']; ?>
					</div>
				</div>
				<div style="clear: both; height:0px; "></div>
				<div class="post">
					<div class="post-inner" style="min-height:100px;height:auto; ">
						<?php echo $row['tk_message_board_message']; ?>
					</div>
				</div>
			</div>
			<div class="wrapper-content-clear"></div>

<?php				
				$maxnum = $maxnum -1;	
				
			}
				
		}
		$mysql->Close();
	}	
?>
		<div class="board-input">
		
		<textarea id="contentqq" name="content" style="width:700px;height:200px;visibility:hidden;"></textarea>

		</div>

		</div>
		
		<?php include_once("./wrapper-in-right.php"); ?>
	</div>

	<?php include_once("./wrapper-footer.php"); ?>
</div>

</body>
</html>
