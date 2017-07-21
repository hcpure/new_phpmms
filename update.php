<?php
/**
*作者:张三,邮箱:zhangsan@zhang.com
*/
include 'commo.php';
//如果没有id传递,跳转到首页
if($_GET['id']){
	$sql="select * from member where id=".$_GET['id'];
	//echo $sql;
	$result=$pdo->query($sql);
	//从结果集中获取所有的数据;
	//$data是对象组成的数组;
	$data=$result->fetchAll(PDO::FETCH_OBJ);
	//var_dump($data[0]);
	if($data[0]==null){
		echo "数据不存在";
	}
	//如果点击了提交按钮
	if($_POST['send']){
		//var_dump($_POST);
		/*如果没有修改.$pwd的值就是原来的密码,如果修改, $pwd的值就是加密后的值  */
		
			if($_POST['pwd2']==$_POST['pwd']){
				$pwd=$_POST['pwd'];
			}else {
				$pwd=md5($_POST['pwd']);
			}
		
		$sql="update member set 
			username='".$_POST['username']."',
			pwd='".$pwd."',
			email='".$_POST['email']."'
			where id=".$_GET['id'];
		//echo $sql;
		$result=$pdo->exec($sql);
		if($result){
			echo "<script>alert('修改成功');location.href='getAll.php'</script>";
		}else if($result==0){
			echo "没有修改";
		}else{
			echo "修改失败";
		}
	}
}else{
	header("location:getAll.php");
}
?>
<style>
	.reg{
		border:1px solid #ddd;
		position:absolute;
		padding:15px;
		left:0;
		right:0;
		top:0;
		bottom:0;
		margin:auto;
		width:205px;
		height:180px;
		box-shadow:0 0 3px #ddd;
	}
	.reg input{
		margin-top:5px;
		width:95%;
	}
</style>
<form action="" method="post" class="reg">
		<!--用来保存原来的密码  -->
	<input type="hidden" name="pwd2" value=<?php echo $data[0]->pwd;?>>
	用户名:<input type="text" name="username" value=<?php echo $data[0]->username;?>><br>
	
	密码:<input type="password" name="pwd" value=<?php echo $data[0]->pwd;?>><br>
	邮箱:<input type="text" name="email" value=<?php echo $data[0]->email;?>><br>
	<input type="submit" name="send" value="submit">
</form>