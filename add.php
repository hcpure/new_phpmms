<?php
/**
*作者:张三,邮箱:zhangsan@zhang.com
*/
include 'commo.php';
include 'checklogin.php';
if($_POST['send']){
	$searchSql="select * from member 
				where username='".$_POST['username']."'";
	$searchResult=$pdo->query($searchSql);
	$oneUser=$searchResult->fetchAll(PDO::FETCH_OBJ);
	//var_dump($oneUser[0]);
	//exit();	//终止代码执行
	if($oneUser[0]){	//如果用户名已存在,请重试!
		echo "<script>
				alert ('用户名已经存在,请重试');
				history.go(-1);
				</script>";
		return false;
	}
	$sql="insert into member(
		username,
		pwd,
		email,
		regTime
	)value(
		'".$_POST['username']."',
		'".md5($_POST['pwd'])."',
		'".$_POST['email']."',
		'".date('Y-m-d H:i:s')."'
)";
		echo $sql;
		$result=$pdo->exec($sql);
		if($result){
			//echo "ok";
			echo "<script>alert('数据添加成功');location.href='getAll.php'</script>";
		}else{
			echo "failed";
		}
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
	用户名<input type="text" name="username"><br>
	密码<input type="password" name="pwd"><br>
	邮箱<input type="text" name="email" class="email"><br>
	<input type="submit" name="send" value="submit" class="addBtn">
</form>
<script>
	//根据选择器名选择元素
	var addBtn=document.querySelector(".addBtn");
	var email=document.querySelector(".email");
	//console.log(addBtn);
	addBtn.addEventListener("click",function(evt){
		if(!validate_email(email.value)){
			alert("邮箱格式不正确!");
			}
		//阻止默认动作
			evt.preventDefault();
			
		})
</script>