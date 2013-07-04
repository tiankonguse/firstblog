<?php
	$url_tmp="../";
	if(isset($_POST['input_tmp'])){
		$url_tmp = $_POST['input_tmp'];
	}
?>

<script language="JavaScript" type="text/javascript">
	
	function go(){
		window.location.href= <?php echo "\"".$url_tmp."\""; ?>;
	}
	
	window.onload = function() {
		setTimeout('go()',500);
	}
	
</script>