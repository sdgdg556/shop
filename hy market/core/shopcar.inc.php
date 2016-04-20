<?php
/**
 *购物车商品是否存在
 */
function getInfoByuId($uId){
	$sql="select pId from shopcar where uId={$uId}";
	$rows=fetchAll($sql);
	return $rows;
}
/**
 *得到购物车商品信息
 */
function getProByuId($uId){
	$sql="select p.id,p.pName,p.pSn,p.mPrice from products as p join shopcar s on p.id=s.pId where s.uId={$uId}";
	$rows=fetchAll($sql);
	return $rows;
}
/**
 *删除购物车商品信息
 */
function delShopcarPro($id){
	$where="pId=$id";
	$res=delete("shopcar",$where);
	if ($res) {
		alertMes("删除成功！","shopCar.php");
	}else{
		alertMes("删除失败！","shopCar.php");
	}
}
/**
 *订单支付
 */
function pay($id){
	
}