<?php
/**
*作者:张三,邮箱:zhangsan@zhang.com
*/
include 'commo.php';
include 'checklogin.php';
//如果id为真
if($_GET['id']){
	$sql="delete from member where id=".$_GET['id'];
	$result=$pdo->exec($sql);
	//如果删除成功,直接跳转到首页
	if($result){
		header("location:getAll.php");
	}else{
		echo "<script>alert('删除失败');location.href='getAll.php'</script>";
	}
}else{
	//跳转
	header("location:getAll.php");
}
?>