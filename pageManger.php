<div class="wrapper-in-page">



<a href="<?php echo $href."?nowPage=1&file=".$file; ?>">首页</a>
<a href="<?php echo $href."?nowPage=".($blogList->getNowPage() == 1 ? $blogList->pageNumber : $blogList->getNowPage() - 1)."&file=".$file; ?>">上一页 </a>


<?php
	function printPage($i, $nowPage, $href ,$file, $show){
		if($i == $nowPage){
			echo " <a href=\"".$href."?nowPage=".$i."&file=".$file."\" class='wrapper-in-nowPage'> ".$show." </a> ";
		}else{
			echo " <a href=\"".$href."?nowPage=".$i."&file=".$file."\" > ".$show." </a> ";
		}
	}

	if($blogList->pageNumber <= 9){
		for($i = 1; $i <= $blogList->pageNumber; ++$i){
			printPage($i, $blogList->getNowPage(), $href, $file, $i);
		}
	}else{
		for($i = 1; $i <= $blogList->pageNumber; ++$i){
			if($i <= 3 || $i + 2 >= $blogList->pageNumber){
				printPage($i, $blogList->getNowPage(), $href, $file, $i);
			}else if($i == $blogList->getNowPage() || $i == $blogList->getNowPage() - 1 || $i == $blogList->getNowPage() + 1){
				printPage($i, $blogList->getNowPage(), $href, $file, $i);
			}else{
				if($i < $blogList->getNowPage()){
					$doti = (int)(($blogList->getNowPage() -2 + $i)/2);
					printPage($doti, $blogList->getNowPage(), $href, $file, "...");
					$i = $blogList->getNowPage() - 2;
				}else{
					$doti = (int)(($blogList->pageNumber -3 + $i)/2);
					printPage($doti, $blogList->getNowPage(), $href, $file, "...");
					$i = $blogList->pageNumber - 3;
				}
			}
		}
	}
?>


<a href="<?php echo $href."?nowPage=".($blogList->getNowPage() == $blogList->pageNumber ? 1 : $blogList->getNowPage() + 1)."&file=".$file; ?>">下一页 </a>
<a href="<?php echo $href."?nowPage=".$blogList->pageNumber."&file=".$file; ?>">尾页</a>

</div>

