 <!DOCTYPE HTML>
<?php session_start(); ?>
<html>

<head>
	<?php include_once("head-meta.php"); ?>
	<?php include_once("./plug_in/highlight.php"); ?>
	<?php include_once("./plug_in/databaseHelp.php"); ?>
	<?php include_once("./class/mySQLClass.php"); ?>
	<title>tiankonguse~tools</title>
	<link rel="stylesheet" type="text/css" href="/css/tools.css" />

</head>
<body > 

<div id="wrapper-out" class="wrapper-out" >

	<?php include_once("./wrapper-top.php"); ?>
	
	<div id="wrapper-in" class="wrapper-in" >
		<div id="wrapper-in-content" class="wrapper-in-content" >
			<div id="cse" style="margin-right:20px;margin-left:20px;">Loading</div>
		</div>
		<?php include_once("./wrapper-in-right.php"); ?>
		<div class="clear"></div>
	</div>

	<?php include_once("./wrapper-footer.php"); ?>
	
</div>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
  google.load('search', '1', {language : 'zh-CN', style : google.loader.themes.V2_DEFAULT});
  google.setOnLoadCallback(function() {
    var customSearchOptions = {};
    var orderByOptions = {};
    orderByOptions['keys'] = [{label: 'Relevance', key: ''},{label: 'Date', key: 'date'}];
    customSearchOptions['enableOrderBy'] = true;
    customSearchOptions['orderByOptions'] = orderByOptions;
    var imageSearchOptions = {};
    imageSearchOptions['layout'] = google.search.ImageSearch.LAYOUT_POPUP;
    customSearchOptions['enableImageSearch'] = true;
    customSearchOptions['imageSearchOptions'] = imageSearchOptions;
    var googleAnalyticsOptions = {};
    googleAnalyticsOptions['queryParameter'] = 'tiankonguse';
    googleAnalyticsOptions['categoryParameter'] = '';
    customSearchOptions['googleAnalyticsOptions'] = googleAnalyticsOptions;  var customSearchControl = new google.search.CustomSearchControl(
      '005922434730988241560:5el5gmpko8a', customSearchOptions);
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    var options = new google.search.DrawOptions();
    options.setAutoComplete(true);
    customSearchControl.draw('cse', options);
  }, true);
</script>
<script type="text/javascript">

</script>
</body>
</html>
