<?php 

function addAlbum($arr){
	insert("album", $arr);
}

/**
 * 根据商品id得到商品图片
 */
function getProImgById($id){
	$sql="select albumPath from album where pid={$id} limit 1";
	$row=fetchOne($sql);
	return $row;
}

/**
 * 根据商品id得到所有图片
 */
function getProImgsById($id){
	$sql="select albumPath from album where pid={$id} ";
	$rows=fetchAll($sql);
	return $rows;
}
/**
 * 文字水印的效果
 */
function doWaterText($id){
	$rows=getProImgsById($id);
	foreach($rows as $row){
		$filename="../image_800/".$row['albumPath'];
		waterText($filename);
	}
	$mes="操作成功";
	return $mes;
}

/**
 *图片水印
 */
function doWaterPic($id){
	$rows=getProImgsById($id);
	foreach($rows as $row){
		$filename="../image_800/".$row['albumPath'];
		waterPic($filename);
	}
	$mes="操作成功";
	return $mes;
}




