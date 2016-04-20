<?php 
require_once 'include.php';
if(!$_SESSION['loginFlag'])
{
    alertMes("对不起，请先登录！","login.php");
}
$uId=$_SESSION['loginFlag'];
$rows=getProByuId($uId);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>订单处理</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
</head>
<body>
<div class="headerBar">
    <div class="topBar">
        <div class="comWidth">
            <div class="leftArea">
                <a href="index.php" class="welcome">welcome to hy market!</a>
            </div>
            <div class="rightArea">
                <span>欢迎您</span><?php echo $_SESSION['username'];?>
                <a href="doAction.php?act=userOut">[退出]</a>
            </div>
        </div>
    </div>
    <div class="logoBar">
        <div class="comWidth">
            <div class="logo fl">
                <a href="index.php"><img src="images/logo.jpg" alt="hy market"></a>
            </div>
            <div class="search_box fl">
                <input type="text" class="search_text fl">
                <input type="button" value="搜 索" class="search_btn fr">
            </div>
            <div class="shopCar fr">
                <span class="shopText fl"><a href="shopCar.php">购物车</a></span>
                <span class="shopNum fl">0</span>
            </div>
        </div>
    </div>
    <div class="navBox">
        <div class="comWidth clearfix">
            <div class="shopClass fl">
                <h3>全部商品分类<i class="shopClass_icon"></i></h3>
            </div>
            <ul class="nav fl">
                <li><a href="#" class="active">数码城</a></li>
                <li><a href="#">天黑黑</a></li>
                <li><a href="#">团购</a></li>
                <li><a href="#">发现</a></li>
                <li><a href="#">二手特卖</a></li>
                <li><a href="#">名品会</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="userPosition comWidth">
    <strong><a href="index.php">首页</a></strong>
    <span>&nbsp;&gt;&nbsp;</span>
    <a href="shopCar.php">订单处理</a>
</div>
<form action="doAction.php?act=pay" method="post" name="shopcar">
<table class="table" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th width="10%">商品货号</th>
            <th width="20%">商品名称</th>
            <th width="35%">商品图片</th>
            <th>商品价格</th>
            <th width="5%">商品数量</th>
   			<th width="5%">商品总价</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($rows as $row):?>
        <tr>
            <td><?php echo $row['pSn']; ?></td>
            <td><?php echo $row['pName']; ?></td>
			<td>
    			<?php 
    			$proImgs=getAllImgByProId($row['id']);
    			foreach($proImgs as $img):
    			?>
    			<img width="100" height="100" src="admin/uploads/<?php echo $img['albumPath'];?>" alt=""/> &nbsp;&nbsp;
    			<?php endforeach;?>
             </td>
             <td><?php echo $row['mPrice']; ?>RMB</td>
             <td><?php echo $_POST["count".$row['id']]; ?></td>
             <td>
	             <?php 
	             	$total+=$_POST["count".$row['id']]*$row['mPrice'];
	            	echo number_format($_POST["count".$row['id']]*$row['mPrice'],2);
	             ?>RMB
         	 </td>
        </tr>
       <?php  endforeach;?>
    </tbody>
</table>
    <div class="button">
    	<div class="total">
    		<td>合计<?php echo number_format($total,2);?>RMB</td>
    	</div>
        <td><input type="image" name="submit_order" src="images/icon/pay.jpg" onClick="document.shopcar.submit()"></td>   
    </div>
</form>
<div class="hr_25"></div>
<div class="footer">
    <p><a href="#">关于hy market</a><i>|</i><a href="#">新手指南</a><i>|</i> <a href="#">营销中心</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：123456789</p>
    <p>曹皓宇版权所有</p>
</div>
</body>
</html>
