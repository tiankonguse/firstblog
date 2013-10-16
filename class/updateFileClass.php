<?php
	
	class updateFile{
		var $blogFile;
		var $file;
		
		function updateFile(){

			$this->blogFile = new MySQL();
			
			$this->file= new MySQL();
			
			$this->blogFile->Connect();
			
			$this->file->Connect();
		}
		
		function begin(){
			$this->updateDataKey();
			$this->updateAllData();
		}
		
		function updateDataKey(){
			//更新file的日期
			$this->blogFile->Query("select * from tk_file_blog");
			
			while($blogFileKey = $this->blogFile->Fetch()){
				
				$this->file->Query("select * from tk_file where tk_file_date = '".writeToDatabase($blogFileKey['tk_file_blog_file'])."'");

				//如果不存在这个日期，则先创建这个日期
				if(!$this->file->rowCount){
					$this->file->Insert("insert into tk_file (tk_file_date,tk_file_number) VALUES ( '".writeToDatabase($blogFileKey['tk_file_blog_file'])."', 0 )");
				}
				
			}
		}
		
		function updateAllData(){
			//更新file日期的blog的数量
			$this->file->Query("select * from tk_file");
			
			while($fileKey = $this->file->Fetch()){
				$this->updateOneData($fileKey['tk_file_date']);
			}
		}
		
		function updateOneData(&$tk_file_date){
			$this->blogFile->Query("select count(*) num from tk_file_blog where tk_file_blog_file = '".writeToDatabase($tk_file_date)."'");
			
			$blogFileKey = $this->blogFile->Fetch();
			
			$this->file->Update("UPDATE tk_file set tk_file_number = '".$blogFileKey['num']."' WHERE tk_file_date = '".writeToDatabase($tk_file_date)."'");
			
			echo $blogFileKey['num']."<br/>";
		}
		
		function end(){
			$this->blogFile->Close();
			
			$this->file->Close();
		}
		
	}
	

?>




