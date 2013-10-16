
 
 <div id="wrapper-footer" class="wrapper-footer" >
	Copyright ©2013 tiankonguse
	 <p>
	e-mail:i@tiankonguse.com <a href="freeuse.php">免责声明</a>
	</p>
	
	<div class="clear"></div>
 </div>

<script type="text/javascript">	
	$(document).ready(function(){
		var d=new Date();
		$('.tiankonguse_now_date').html("日期:" + d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate());
	});
</script>


<script type="text/javascript">
	function tools_startTime(){
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		// add a zero in front of numbers<10
		if(m<10){
			m = "0" + m;
		}
		
		if(s<10){
			s = "0" + s;
		}
		
		$('.tiankonguse_now_time').html("时间:" + h + ":" + m + ":" + s);
		
		setTimeout('tools_startTime()',500);
	}
	
	$(document).ready(tools_startTime);
</script>
<script src="js/scrolltopcontrol.js"></script>



