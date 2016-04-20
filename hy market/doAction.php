<?php 
require_once 'include.php';
$act=$_REQUEST['act'];
if($act==="reg"){
	$mes=reg();
}elseif($act==="login"){
	$mes=login();
}elseif($act==="userOut"){
	userOut();
}elseif ($act=="delShopcarPro") {
	$id=$_GET['id'];
	delShopcarPro($id);
}elseif ($act=="pay") {
	pay($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php 
	if($mes){
		echo $mes;
	}
?>
</body>
</html>