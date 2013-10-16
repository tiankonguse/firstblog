<?php
/*
 *自己封装的mysql类
 *这样方便管理php与mysql数据库的联系
 */

 //关闭magic_quotes_sybase  
 
ini_set('date.timezone','Asia/Shanghai');
date_default_timezone_set('Asia/Shanghai'); 
 
class MySQL{
	var $host = "localhost"; 
    var $userName = "tiankong_tksite";    
    var $passWord = "4nMuNnZX";
    var $database ="tiankong_tksite";
    /* state 代表状态
     * 0   正常
     * 1   连接数据库失败
     * 2   选择数据库失败
     * 3   查询失败 记录为空时算查询失败
     * 4   插入失败
     * 5   更新失败
     * 6   删除失败
	 * 7   将指针指向的某一行数据不存在
	 * 8   得到下一行的数据
	 * 9   关闭数据库
	 * 10 建表失败
     */
    var $state ;    
    
	/* 连接标识 */
    var $Resource_id;
    
	/* SELECT,SHOW,EXPLAIN ,DESCRIBE语句执行成功时返回的资源标识符 */
    var $result;
    
	
	/* 若为查询操作，返回行数 */
    var $rowCount = -1;

	
     function MySQL () {
        $this->state = 0;
    }
	
	/* 连接数据库操作  成功连接符 失败 false*/
    function Connect () {
        return ($this->ResourceId = mysql_connect($this->host, $this->userName, $this->passWord)) ? ($this->SelectDB() ? $this->ResourceId : 0) : !($this->state = 1);
    }

    
    

	/* 关闭数据库操作  成功true 失败 false*/
    function Close () {
        if(mysql_close($this->ResourceId)){
            $this->ResourceId = 0;
            return true;
        }else{
            $this->state = 9;
            return false;
        }
    }

    
	/* 选择数据库操作  成功ture 失败 false*/
    function SelectDB () {
		mysql_query("set names utf8");
        return mysql_select_db($this->database, $this->ResourceId) or !($this->state = 2);
    }

	
	/* 查询操作 成功记录集 失败 false*/
    function Query ($sql) {
		$this->result = mysql_query($sql, $this->ResourceId);
		if($this->result){
			$this->rowCount =  mysql_num_rows($this->result);
			return $this->result;
		}else{
			$this->state = 3;
			return false;
		}  
    }
    
	function getRowCount(){
		return $this->rowCount;
	}
	
	/* 选择某一行的数据 从第0行开始 成功ture 失败 false*/
    function FetchToRow ($row) {
        return mysql_data_seek($this->result, $row)  or !($this->state = 7); 
    }
	
	/* 得到下一行的数据 当前行的数据，失败 false*/
    function Fetch () {
		return mysql_fetch_array($this->result);
    }	

	
	/* 插入操作 成功ture 失败 false*/
    function Insert ($sql) {
        return mysql_query($sql, $this->ResourceId) or !($this->state = 4);
    }
    
	/* 更新操作 成功ture 失败 false*/
    function Update ($sql) {
        return mysql_query($sql, $this->ResourceId) or !($this->state = 5);
    }
    
	/* 删除操作 成功ture 失败 false*/
    function Delete ($sql) {
        return mysql_query($sql, $this->ResourceId) or !($this->state = 6);
    }
	
	function getError(){
		return mysql_error();
	}

	
	
}

?>
 
 
 
 