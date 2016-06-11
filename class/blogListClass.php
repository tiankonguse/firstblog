<?php
/*
 * 博客列表需要显示为多页 为了便于管理，自己封装起来了。 
 * 1.支持多页管理 
 * 2.支持主页显示 
 * 3.支持博客列表 
 * 4.支持博客日期列表 
 * 5.支持分类列表 
 * 6.支持标签列表 
 * 要实现这些，有两个选择 
 *  （1）。分别写那几个函数，然后有个标示符来标示是那个列表 
 *  （2）。sql函数在调用者手中写 
 * 这里还是写函数实现吧。
 */
define ( "BLOG_LIST_TYPE_NORMAL", 1 ); // 主页和博客列表
define ( "BLOG_LIST_TYPE_FILE", 4 ); // file列表
class BlogList {
	var $mysql;
	
	// blog的总数量
	var $blogNumber = 0;
	
	// blog的总页数
	var $pageNumber = 0;
	
	// 一页blog显示的blog数量
	var $countOfOnePage;
	
	// 现在的blog在所有的blog中的位置，从1开始
	var $nowBlogPos = 0;
	
	// 现在blog在第几页,从第0页开始
	var $nowPage;
	var $file = "";
	var $type;
	/*
	 * 1:普通博客列表，也就是框架
	 */
	function __construct($type = 1, $nowPage = 0, $countOfOnePage = 10, $file = " ") {
		$this->type = ( int ) ($type);
		$this->file = $file;
		$this->nowPage = ( int ) ($nowPage) - 1;
		$countOfOnePage = ( int ) ($countOfOnePage);
		$this->countOfOnePage = $countOfOnePage <= 0 ? 10 : $countOfOnePage;
		
		$this->startMySQL ();
	}
	function startMySQL() {
		$this->mysql = new MySQL ();
		$this->mysql->Connect ();
		$this->setBlogNumber ();
		$this->setNowPage ();
	}
	function setBlogNumber() {
		if ($this->type == BLOG_LIST_TYPE_NORMAL) {
			
			$this->mysql->Query ( "select count(*) num from tk_blog" );
		} else if ($this->type == BLOG_LIST_TYPE_FILE) {
			
			$this->mysql->Query ( "select count(*) num from tk_file_blog where tk_file_blog_file = '" . writeToDatabase ( $this->file ) . "'" );
		}
		
		if ($row = $this->mysql->Fetch ()) {
			$this->blogNumber = $row ['num'];
		}
		
		$this->pageNumber = ( int ) (($this->blogNumber + $this->countOfOnePage - 1) / $this->countOfOnePage);
		
		$this->nowPage = (($this->nowPage % $this->pageNumber) + $this->pageNumber) % $this->pageNumber;
	}
	function setNowPage() {
		$this->nowBlogPos = $this->nowPage * $this->countOfOnePage;
		
		if ($this->type == BLOG_LIST_TYPE_NORMAL) {
			
			$this->mysql->Query ( "select tk_blog_key from tk_blog ORDER BY tk_blog_datetime DESC LIMIT " . $this->nowBlogPos . " , " . $this->countOfOnePage . " " );
		} else if ($this->type == BLOG_LIST_TYPE_FILE) {
			$this->mysql->Query ( "select tk_file_blog_blog tk_blog_key from tk_file_blog where tk_file_blog_file = '" . writeToDatabase ( $this->file ) . "' ORDER BY tk_file_blog_blog DESC LIMIT " . $this->nowBlogPos . " , " . $this->countOfOnePage . " " );
		}
	}
	function Fetch() {
		return $this->mysql->Fetch ();
	}
	function state() {
		return $this->mysql->state;
	}
	function getNowPage() {
		return $this->nowPage + 1;
	}
}

?>
 
 
 
 
