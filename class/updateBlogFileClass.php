<?php

class updateBlogFile{
	var $blog ;
	var $blogFile;
	var $file;

    function updateBlogFile () {
		$this->blog = new MySQL();
		
		$this->blogFile = new MySQL();
		
		$this->file= new MySQL();
		
		$this->blog->Connect();
		
		$this->blogFile->Connect();
		
		$this->file->Connect();
    }	
	
	function begin(){
		$this->blog->Query("select tk_blog_datetime, tk_blog_key  from tk_blog");
		while($blogKey = $this->blog->Fetch()){
			$this->updateBlog($blogKey);
		}
	}
	
	function updateBlog(&$blogKey){
		$this->blogFile->Query("select * from tk_file_blog where tk_file_blog_blog = '".writeToDatabase($blogKey['tk_blog_key'])."'");
		
		if(!$this->blogFile->rowCount){
			sscanf( ($blogKey['tk_blog_datetime']),"%7s",$tk_file_date);
		
			$this->addData($tk_file_date);
			
			//在映射表中加入新日期。
			$this->blogFile->Insert("insert into tk_file_blog (tk_file_blog_file, tk_file_blog_blog) VALUES ( '".writeToDatabase($tk_file_date)."','".writeToDatabase($blogKey['tk_blog_key'])."')");
			
			$this->file->Update("UPDATE tk_file set tk_file_number = tk_file_number + 1 WHERE tk_file_date = '".writeToDatabase($tk_file_date)."'");
			
			echo $blogKey['tk_blog_key']." ADD <br/>";
			
		}else{
			echo $blogKey['tk_blog_key']." OK <br/>";
		}

	}
	
	function addData(&$tk_file_date){
		//查询是否已经存在这个日期
		$this->file->Query("select * from tk_file where tk_file_date = '".writeToDatabase($tk_file_date)."'");

		//若是新日期，则先创建新日期。
		if(!$this->file->rowCount){
			$this->file->Insert("insert into tk_file (tk_file_date,tk_file_number) VALUES ( '".writeToDatabase($tk_file_date)."',0)");
		}
	}
	
	function end(){
		$this->blog->Close();
		
		$this->blogFile->Close();
		
		$this->file->Close();
	}
}

?>




