<?php
require_once 'include.php';
if(!$_SESSION['loginFlag'])
{
	alertMes("对不起，请先登录！","login.php");
}
$arr['uId']=$_SESSION['loginFlag'];
$arr['pId']=$_REQUEST['id'];
$rows=getInfoByuId($arr['uId']);
foreach ($rows as $row) {
	if ($row['pId']==$arr['pId']) {
		echo "<script>alert('该商品已经被放入购物车！');history.back();</script>";
 		exit;
	}
}
insert("shopcar",$arr);
echo "<script>window.location.href='shopCar.php';</script>";
