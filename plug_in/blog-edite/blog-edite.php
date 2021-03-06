<!DOCTYPE HTML>

<?php include_once("../../plug_in/databaseHelp.php"); ?>
<?php include_once("../../class/mySQLClass.php"); ?>
<?php include_once("../../class/blogClass.php"); ?>
<?php session_start(); ?>

<html>

<head>
<title>tiankonguse~edite</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/blog-edit.css" charset="UTF-8"/>
<script src="js/jquery-1.9.1.min.js"></script>
</head>

<body class="body-bg" >
	<div id="lay-position" class="lay-position " >
		<div class="page-base" id="page-base">



            <form id="content-form" class="content-form" method="post" target="_top" action="../../check/submit_content.php">

                <input name="main-id-input" id="main-id-input" type="hidden" value="" />

                <div id="editor-core-container" class="editor-core-container">

                    <!-- 编辑器工具条容器 -->
                    <div id="editor-core-toolbar" class="editor-core-toolbar">

                        <div id="editor-core-toolbar-wrap" class="editor-core-toolbar-wrap">

                            <!-- 编辑器.工具条  -->
                            <div id="toolbar-container" class="toolbar-container">

                                <div id="toolbar-base" class="toolbar-base">

                                    <!--     工具条1:发表，保存，撤销，重做      -->
                                    <div id="toolbar-group1" class="toolbar">

                                        <!--     工具条:发 表      -->
                                        <div id="toolbar-submit" class="toolbar-submit toolbar-common"
                                            title="发表">
                                            <b>发 表</b>
                                        </div>

                                        <!--     工具条:保存草稿      -->
                                        <div id="toolbar-save" class="toolbar-save toolbar-common"
                                            title="保存"></div>

                                        <!--     工具条:撤销      -->
                                        <div id="toolbar-undo" class="toolbar-undo toolbar-common"
                                            title="撤销"></div>

                                        <!--     工具条:重做      -->
                                        <div id="toolbar-redo" class="toolbar-redo toolbar-common"
                                            title="重做"></div>

                                    </div>

                                    <!--     工具条2  字体  大小 加粗 斜体 下划线  颜色  发光 -->
                                    <div id="toolbar-group2" class="toolbar">

                                        <!--     工具条:字体      -->
                                        <div id="toolbar-fontname"
                                            class="toolbar-fontname toolbar-list toolbar-common" title="字体">
                                            <div id="toolbar-fontname-list-current"
                                                class="toolbar-list-current">
                                                <b>Arial</b>
                                            </div>
                                            <div class="toolbar-list-downicon"></div>
                                        </div>

                                        <!-- 工具条:大小 -->
                                        <div id="toolbar-fontsize"
                                            class="toolbar-fontsize toolbar-list toolbar-common" title="大小">
                                            <div id="toolbar-fontsize-list-current"
                                                class="toolbar-list-current">
                                                <b>5</b>
                                            </div>
                                            <div class="toolbar-list-downicon"></div>
                                        </div>


                                        <!-- 工具条:字的属性 加粗      -->
                                        <div id="toolbar-bold" class="toolbar-bold toolbar-common"
                                            title="加粗(ctrl+b)"></div>


                                        <!-- 工具条:字的属性 斜体     -->
                                        <div id="toolbar-italic" class="toolbar-italic toolbar-common"
                                            title="斜体(ctrl+i)"></div>

                                        <!--  工具条:字的属性 下划线     -->
                                        <div id="toolbar-underline"
                                            class="toolbar-underline toolbar-common" title="下划线(ctrl+u)"></div>


                                        <!--  工具条:字的属性 颜色     -->
                                        <div id="toolbar-color" class="toolbar-color toolbar-common"
                                            title="文本颜色"></div>

                                        <!--工具条:字的属性 发光     -->
                                        <div id="toolbar-glowfont"
                                            class="toolbar-glowfont toolbar-common" title="发光字体"></div>
                                    </div>

                                    <!--     工具条3  对齐方式  列表 缩进  -->
                                    <div id="toolbar-group3" class="toolbar">

                                        <!--   工具条:对齐方式 左对齐     -->
                                        <div id="toolbar-justifyleft"
                                            class="toolbar-justifyleft toolbar-common"
                                            title="左对齐(ctrl+alt+l)"></div>


                                        <!--  工具条:对齐方式 居中对齐     -->
                                        <div id="toolbar-justifycenter"
                                            class="toolbar-justifycenter toolbar-common"
                                            title="居中对齐(ctrl+alt+c)"></div>


                                        <!-- 工具条:对齐方式 右对齐     -->
                                        <div id="toolbar-justifyright"
                                            class="toolbar-justifyright toolbar-common"
                                            title="右对齐(ctrl+alt+r)"></div>

                                        <!--  工具条:对齐方式 默认对齐     -->
                                        <div id="toolbar-justifyfull"
                                            class="toolbar-justifyfull toolbar-common" title="默认对齐"></div>

                                        <!--  工具条:列表  有序列表     -->
                                        <div id="toolbar-listol" class="toolbar-listol toolbar-common"
                                            title="有序列表"></div>

                                        <!--  工具条:列表  无序列表     -->
                                        <div id="toolbar-listul" class="toolbar-listul toolbar-common"
                                            title="无序列表"></div>

                                        <!--  工具条:缩进  向左缩进    -->
                                        <div id="toolbar-tableft" class="toolbar-tableft toolbar-common"
                                            title="向左缩进"></div>

                                        <!-- 工具条:缩进  向右缩进     -->
                                        <div id="toolbar-tabright"
                                            class="toolbar-tabright toolbar-common" title="向右缩进"></div>

                                    </div>

                                    <!--     工具条4      -->
                                    <div id="toolbar-group4" class="toolbar">

                                        <!--     工具条:链接       -->
                                        <div id="toolbar-link" class="toolbar-link toolbar-common"
                                            title="设置链接"></div>

                                        <!--     工具条:图片       -->
                                        <div id="toolbar-image" class="toolbar-image toolbar-common"
                                            title="插入图片"></div>

                                        <!--     工具条:表情       -->
                                        <div id="toolbar-emotion" class="toolbar-emotion toolbar-common"
                                            title="插入表情"></div>

                                        <!--     工具条: 高级工具条       -->
                                        <div id="toolbar-switcher"
                                            class="toolbar-switcher toolbar-common" title="高级功能">
                                            <b>高级功能</b>
                                        </div>

                                    </div>

                                    <div class="toolbar-clear"></div>
                                </div>

                                <div id="toolbar-extra" class="toolbar-extra">

                                    <!--     工具条5      -->
                                    <div id="toolbar-group5" class="toolbar">
                                        <!--     工具条:清除格式       -->
                                        <div id="toolbar-removeformat"
                                            class="toolbar-removeformat toolbar-common" title="清除格式"></div>

                                        <!--     工具条:切换到HTML代码       -->
                                        <div id="toolbar-html" class="toolbar-html toolbar-common"
                                            title="切换到HTML代码编辑模式"></div>

                                        <!--     工具条:全屏       -->
                                        <div id="toolbar-fullscreen"
                                            class="toolbar-fullscreen toolbar-common" title="进入全屏模式">
                                        </div>

                                    </div>

                                    <!--     工具条6      -->
                                    <div id="toolbar-group6" class="toolbar">

                                        <!--     工具条:截屏       -->
                                        <div id="toolbar-screen" class="toolbar-screen toolbar-common"
                                            title="截屏"></div>

                                        <!--     工具条:视频       -->
                                        <div id="toolbar-video" class="toolbar-video toolbar-common"
                                            title="插入视频"></div>

                                        <!--     工具条:Flash动画       -->
                                        <div id="toolbar-flash" class="toolbar-flash toolbar-common"
                                            title="插入Flash动画"></div>

                                        <!--  工具条:音乐 -->
                                        <div id="toolbar-music" class="toolbar-music toolbar-common"
                                            title="插入音乐"></div>

                                        <!--  工具条:音乐 -->
                                        <div id="toolbar-test" class="toolbar-test toolbar-common"
                                            title="test">test</div>

                                        <!--  工具条:code -->
                                        <div id="toolbar-code" class="toolbar-code toolbar-common"
                                            title="code">code</div>
                                        <div id="toolbar-code-out" class="toolbar-code-out">
                                            <div id="toolbar-code-in" class="toolbar-code-in">
                                                <div class="toolbar-code-in-body">
                                                    <textarea id="toolbar-code-in-code"
                                                        class="toolbar-code-in-code"></textarea>
                                                </div>
                                                <div class="toolbar-code-in-bottom">
                                                    <select id="toolbar-code-in-lang">
                                                        <option value="cpp">C++</option>
                                                        <option value="php">PHP</option>
                                                        <option value="xml">HTML, XML</option>
                                                        <option value="css">CSS</option>
                                                        <option value="javascript">JavaScript</option>
                                                        <option value="java">Java</option>
                                                        <option value="sql">SQL</option>
                                                        <option value="vbscript">VBscript</option>
                                                    </select>
                                                    <input type="text" class="toolbar-code-in-bottom-input"
                                                        id="toolbar-code-in-bottom-input-ok" value="ok" /> 
                                                    <input type="text" class="toolbar-code-in-bottom-input"
                                                        id="toolbar-code-in-bottom-cancel" value="cancel" />
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- 文章主体 -->
                    <div id="editor-core-main" class="editor-core-main">
                        <div class="editor-core-main-inner">

                            <!-- 标题 -->
                            <div id="main-title-warp" class="main-title-warp">
                                <div id="main-title-inline" class="main-title-inline">
                                    <input type="text" maxlength="128" id="main-title-input"
                                        name="main-title-input" placeholder="一切点击都无效！！"
                                        class="main-title-input">
                                </div>
                            </div>


                            <!-- 编辑器.内容区域 -->
                            <div id="main-content-warp" class="main-content-warp">

                                <iframe id="main-content-iframe" class="main-content-iframe"
                                    src="blog-edite-blankpage.php" scrolling="no" allowtransparency="yes"
                                    frameborder="no"></iframe>
                                <textarea spellcheck="false" scrolling="no"
                                    class="main-content-html" id="main-content-html"
                                    name="main-content-html"></textarea>

                            </div>
                            
                            <!-- 编辑器.分类 category-->
                            <div class="main-category-warp">
                                
                                    <label>分类：</label>
                                    
                                    <?php
                                        //tk_category_key
                                        //tk_category_name
                                        //tk_category
                                        $mysqltmp = new MySQL();

                                        $mysqltmp->Connect();
                                        $mysqltmp->Query("select * from tk_category");

                                        if($mysqltmp->getRowCount()){
                                            echo "<select id=\"blogCateSelect\">";
                                            while($row = $mysqltmp->Fetch()){
                                                echo "<option value=\"".$row["tk_category_key"]."\">".$row["tk_category_name"]."</option>";
                                            }
                                            echo "</select>";
                                        }else{
                                            echo "暂无分类";
                                        }

                                        $mysqltmp->Close();	
                                    ?>
                                    <div  id="addCategory" class="addCategory">添加分类</div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </form>
            
            <div id="toolbar-color-board" class="toolbar-color-board" ondragover="allowDrop(event)">

                <div id="toolbar-color-board-main" class="toolbar-color-board-main">
                    <canvas id="toolbar-color-board-canvas-main"
                        class="toolbar-color-board-canvas-main"></canvas>
                </div>

                <div id="toolbar-color-board-left" class="toolbar-color-board-left">
                    <div id="toolbar-color-board-left-drag"
                        class="toolbar-color-board-left-drag" draggable="true"></div>
                    <canvas id="toolbar-color-board-canvas-left"
                        class="toolbar-color-board-canvas-left" width="40" height="255"></canvas>
                </div>
                <div class="toolbar-clear"></div>
                <div id="toolbar-color-board-buttom">s</div>
                <div id="toolbar-color-board-view">s</div>
            </div>

            <script type="text/javascript">

        /*
            function allowDrop(ev) {
                ev.preventDefault();
                if (ev.clientY - 20 <= 0) {
                $("myerror").innerHTML = "<br/>x:" + (0) + ",y:0";
                $("toolbar-color-board-left-drag").style.top = "3px";

                } else if (ev.clientY - 20 >= 255) {
                $("myerror").innerHTML = "<br/>x:" + (0) + ",y:255";
                $("toolbar-color-board-left-drag").style.top = "258px";
                } else {

                $("myerror").innerHTML = "<br/>x:" + (0) + ",y:"
                    + (ev.clientY - 20);
                $("toolbar-color-board-left-drag").style.top = (ev.clientY - 18)
                    + "px";
                }

            }

            function getRGBA(r, g, b, a) {
                return "rgba(" + r + "," + g + ", " + b + ", " + a + ")";
            }

            function getColorVal(r0, y) {
                return r0 * y / 255;
            }

            function draw_canvas_main(r0, g0, b0, a0) {
                var r1 = 0XFF, g1 = 0XFF, b1 = 0XFF, a1 = 1.0;
                var r2 = 0XFF, g2 = 0X00, b2 = 0X00, a2 = 1.0;
                var c = $("toolbar-color-board-canvas-main");

                var cxt = c.getContext("2d");

                for ( var i = 0; i < 255; i++) {

                var grd = cxt.createLinearGradient(0, i, 255, i);

                r1 = g1 = b1 = getColorVal(0xFF, 255 - i);
                r2 = getColorVal(r0, 255 - i);
                g2 = getColorVal(g0, 255 - i);
                b2 = getColorVal(b0, 255 - i);

                grd.addColorStop(0, getRGBA(r1, g1, b1, a1));
                grd.addColorStop(1, getRGBA(r2, g2, b2, a2));

                cxt.fillStyle = grd;
                cxt.fillRect(0, i, 255, i);
                }

            }

            function draw_canvas_left() {
                var colorArray = new Array("rgba(255,0,0,1.0)",
                    "rgba(255,255,0,1.0)", "rgba(0,255,0,1.0)",
                    "rgba(0,255,255,1.0)", "rgba(0,0,255,1.0)",
                    "rgba(255,0,255,1.0)", "rgba(255,0,0,1.0)");

                for ( var i = 0, i42 = 0; i < colorArray.length - 1; i++, i42 += 42) {

                var c = $("toolbar-color-board-canvas-left");
                var ctx = c.getContext("2d");
                var my_canvas_left = ctx.createLinearGradient(0, i42, 0,
                    i42 + 42);
                my_canvas_left.addColorStop(0, colorArray[i]);
                my_canvas_left.addColorStop(1, colorArray[i + 1]);
                ctx.fillStyle = my_canvas_left;
                ctx.fillRect(0, i42, 40, i42 + 42);
                }

            }
            //draw_canvas_main(0XFF, 0X00, 0X00, 1.0);
            //draw_canvas_left();
            */
            </script>

            <div class="toolbar-list toolbar-fontname-list" id="toolbar-fontname-list">
                <div title="-1" class="toolbar-list-item">选择字体</div>

                <div title="宋体" class="toolbar-list-item" style="font-family: Simson">
                    宋体</div>

                <div title="黑体" class="toolbar-list-item" style="font-family: Simhei">
                    黑体</div>

                <div title="仿宋,仿宋_GB2312" class="toolbar-list-item"
                    style="font-family: 仿宋, 仿宋_GB2312">仿宋</div>

                <div title="楷体,楷体_GB2312" class="toolbar-list-item"
                    style="font-family: 楷体, 楷体_GB2312">楷体</div>

                <div title="隶书" class="toolbar-list-item" style="font-family: 隶书">
                    隶书</div>

                <div title="微软雅黑" class="toolbar-list-item"
                    style="font-family: Microsoft Yahei">微软雅黑</div>


                <div title="幼圆" class="toolbar-list-item" style="font-family: 幼圆">
                    幼圆</div>

                <div title="Arial" class="toolbar-list-item"
                    style="font-family: Arial">Arial</div>

                <div title="Calibri" class="toolbar-list-item"
                    style="font-family: Calibri">Calibri</div>

                <div title="Tahoma" class="toolbar-list-item"
                    style="font-family: Tahoma">Tahoma</div>

                <div title="Helvetica" class="toolbar-list-item"
                    style="font-family: Helvetica">Helvetica</div>

                <div title="Verdana" class="toolbar-list-item"
                    style="font-family: Verdana">Verdana</div>

            </div>

            <div class="toolbar-list toolbar-fontsize-list" id="toolbar-fontsize-list">

                <div title="-1" class="toolbar-list-item">选择字号</div>

                <div title="1" class="toolbar-list-item" style="font-size: xx-small">
                    1</div>

                <div title="2" class="toolbar-list-item" style="font-size: x-small">
                    2</div>

                <div title="3" class="toolbar-list-item" style="font-size: small">
                    3</div>

                <div title="4" class="toolbar-list-item" style="font-size: medium">
                    4</div>

                <div title="5" class="toolbar-list-item" style="font-size: large">
                    5</div>

                <div title="6" class="toolbar-list-item" style="font-size: x-large">
                    6</div>

                <div title="7" class="toolbar-list-item" style="font-size: xx-large">
                    7</div>

            </div>

        </div>
	</div>

</body>


<script type="text/javascript" src="js/blog-editfunc.js" charset="UTF-8"></script>

<script language="javascript">

(function(window,jQuery,TK){
    "use strict"
     
    TK.blog = null;
    
<?php
	if(isset($_GET['blogid']) && $_GET['blogid'] != ""){
		$blog = new Blog($_GET['blogid']);
		$mysqltmp = new MySQL();
		$mysqltmp->Connect();
		echo "TK.blog = ".json_encode(array (
            'blogid'=>$blog->getKey(),
            'blogtitle'=>$blog->getTitle(),
            'blogcontent'=>$blog->getContent(),
            'blogpassword'=>$blog->getPassword(),
            'blogcategory'=>$blog->getCategory())).";\n";
		$mysqltmp->Close();		
	}

?>

	TK.setBlog = function(){
        //this.beginLoad();
        jQuery("#main-id-input").val(TK.blog["blogid"]);
        jQuery("#main-title-input").val(TK.blog["blogtitle"]);
        TK.setContent(TK.blog["blogcontent"]);
    }
    if(TK.blog != null){
       TK.addReadyListener(TK.getIfram(),TK.setBlog);
    }
    
    TK.addReadyListener(TK.getIfram(),TK.beginLoad);
    
})(window,jQuery,TK);
</script>
</html>
