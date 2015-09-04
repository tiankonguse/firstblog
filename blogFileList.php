<!DOCTYPE HTML>
<?php
session_start(); 
require("./inc/common.php");
?>
<html lang="zh-cn">
<head>
    <?php include_once("./inc/header.inc.php"); ?>
    <?php include_once("plug_in/databaseHelp.php"); ?>
    <?php include_once("class/mySQLClass.php"); ?>
    <?php include_once("class/blogClass.php"); ?>
    <?php include_once("class/blogListClass.php"); ?>
    <title>tiankonguse~blogFileList</title>
</head>
<?php
$const_maxNum = 10;
$href = "blogFileList.php";
$page = "file";
$file = "";
$nowPage = 1;
?>
<body>


    <div id="wrapper-out" class="wrapper-out">

    <?php include_once("wrapper-top.php"); ?>

    <div id="wrapper-in" class="wrapper-in">
            <div id="wrapper-in-content" class="wrapper-in-content">
<?php

if (isset ( $_GET ['file'] ) && $_GET ['file'] != "") {
    $file = $_GET ['file'];
    if(preg_match('/^\d{4}-\d{1,2}$/',$file)){
        sscanf ( $file, "%4s-%s", $file_year, $file_month );
    }else{
        $file_year = $file_month = 0;
    }
    $file_year = intval($file_year);
    $file_month = intval($file_month);

    echo $file_year . "年" . $file_month . "月的记录列表：";

    if (isset ( $_GET ['nowPage'] ) && $_GET ['nowPage'] != "") {
        // 这里需要验证$_GET['nowPage']是否合法
        $nowPage = intval($_GET ['nowPage']);
    }

    if($file_year > 0 && $file_month > 0){
        $blogList = new BlogList ( BLOG_LIST_TYPE_FILE, $nowPage, $const_maxNum, $file );
        if ($blogList->state ()) {
            echo "已停止开发这个功能<br/>";
        } else {
            while ( $row = $blogList->Fetch () ) {
                $blog = new Blog ( $row ['tk_blog_key'] );
                if ($blog->getKey () != "") {
                    include ("wrapper-content.php");
                }
            }
            include_once ("pageManger.php");
        }
    }else{
        echo "已停止开发这个功能<br/>";
    }
} else {
    echo "已停止开发这个功能<br/>";
}
?>
        </div>
        <?php include_once("wrapper-in-right.php"); ?>

    </div>

    <?php include_once("wrapper-footer.php"); ?>
</div>

</body>
</html>
