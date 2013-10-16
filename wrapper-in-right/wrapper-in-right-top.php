		<?php
			require_once('class/lunar.php');
			$l=new lunar();
			$result = $l->Cal(date("Y"),date("m"),date("d"));
		?>

 	<div class="rightblock rightblock-top">
		<div class="rightblock-title">HELLO WORD!</div>
		<ul>
			<li class="rightblock-item"><a href="/tools/time.html" class="tiankonguse_now_time">时间:</a></li>
			<li class="rightblock-item"><a href="/tools/date.html" class="tiankonguse_now_date">日期:</a></li>
			<li class="rightblock-item"><a href="/tools/week.html" class="tiankonguse_now_week">星期:<?php echo $result["week"]; ?></a></li>
			<li class="rightblock-item"><a href="/tools/lunar.html" class="tiankonguse_now_lunar">农历:<?php echo $result["month"].$result["day"]; ?></a></li>
			<li class="rightblock-item"><iframe width="195" height="20" scrolling="no" frameborder="0" id="iframeWeather" src="http://m.weather.com.cn/m/pn7/weather.htm" async='true'></iframe></li>
		</ul>
	</div>	