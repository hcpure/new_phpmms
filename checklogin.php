<?php
/**
*作者:张三,邮箱:zhangsan@zhang.com
*/
//验证管理员是否登录,未登录,跳转到登录界面
if(!$_SESSION['admin']){
	header("location:login.php");
}else{
	if(is_string($_SESSION['admin'])){
		//$_SESSION['admin'] 字符串
		echo $_SESSION['admin']."登录,";
	}else if(is_object($_SESSION['admin'])){
		//$_SESSION['admin']  对象
		echo $_SESSION['admin']->username."登录,";
	}
	echo "<a href='getAll.php?action=logout'>注销</a>";
}
//点击注销
if($_GET['action']=='logout'){
	//销毁session值
	unset($_SESSION['admin']);
	//销毁cookie值
	unset($_COOKIE['username']);
	header("location:login.php");
}
?>