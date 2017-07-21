<?php
/**
*作者:张三,邮箱:zhangsan@zhang.com
*/
session_start();	//开启session
error_reporting(E_ALL^E_NOTICE^E_STRICT);		//错误处理
date_default_timezone_set("PRC");	//设置时区

//链接MySQL数据库
//host主机名
try{		//尝试执行指定的代码,如果出错catch抛出错误
	$pdo=new PDO("mysql:host=localhost;dbname=web13","root","");
}catch(PDOException $e){
	//echo $e->getMessage();
	//PDOException  内置类
	//$e=new PDOException()
	echo  "连接MySQL服务器错误," .$e->getMessage();
	/* echo "<pre>";
	 var_dump($e);
	 echo "</pre>"; */
}
//设置操作数据库的字符集
$pdo->query("set names utf8");
?>