<?php
/*
 *
 *直接提交有单引号的表单会有msyql的单引号报错，
 *其实，这也是常用的sql注入手段。
 *不过现在几乎所有的网站都对这个进行了处理。
 *我的网站现在也进行处理这件事了。
 *自己编写一个函数处理这样的字符串。
 *
 */


 /*
  *写入数据库的数据，对字符串进行格式化，
  *单引号变为转义字符，即加上斜杠
  *当从数据库读取出来后，是没有转义的。所以如果要输出便可直接输出。
  *若要赋值给php或javascrip，那就要再次执行这个函数进行转义了。
  */
function writeToDatabase($str){
	$newstr = $str;
	if(!get_magic_quotes_gpc()){
		//$str=addslashes($str);mysql_real_escape_string
		$newstr=mysql_real_escape_string($str);
	}
	return $newstr;
}

function writeToScript($str){
	return mysql_real_escape_string($str);    
}


 /*，
  *转义字符变为相应的字符，即去掉斜杠。一般不用这个函数。
  */
function _readFromDatabase($str){
	if(!get_magic_quotes_gpc()){
		$str=stripslashes($str);
	}
	return $str;
}


?>