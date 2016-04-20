<?php 
function reg(){
	$arr['username']=$_POST['username'];
	$arr['password']=md5($_POST['password']);
	$arr['email']=$_POST['email'];
	$arr['sex']=$_POST['sex'];
	$arr['regTime']=time();
	$uploadFile=uploadFile();
	if($uploadFile&&is_array($uploadFile)){
		$arr['face']=$uploadFile[0]['name'];
	}else{
		return "注册失败";
	}
	if(insert("user", $arr)){
		$mes="注册成功!<br/>3秒钟后跳转到登陆页面!<meta http-equiv='refresh' content='3;url=login.php'/>";
	}else{
		$filename="uploads/".$uploadFile[0]['name'];
		if(file_exists($filename)){
			unlink($filename);
		}
		$mes="注册失败!<br/><a href='reg.php'>重新注册</a>|<a href='index.php'>查看首页</a>";
	}
	return $mes;
}
function login(){
	$username=$_POST['username'];
	$username=mysql_escape_string($username);
	$password=md5($_POST['password']);
	$sql="select * from user where username='{$username}' and password='{$password}'";
	$row=fetchOne($sql);
	if($row){
		$_SESSION['loginFlag']=$row['id'];
		$_SESSION['username']=$row['username'];
		$mes="登陆成功！<br/>3秒钟后跳转到首页<meta http-equiv='refresh' content='3;url=index.php'/>";
	}else{
		$mes="登陆失败！<a href='login.php'>重新登陆</a>";
	}
	return $mes;
}

function userOut(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	session_destroy();
	header("location:index.php");
}


