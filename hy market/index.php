<?php 
require_once 'include.php';
$cates=getAllcate();
if(!($cates && is_array($cates))){
	alertMes("不好意思，网站维护中!!!");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
</head>
<body>
<div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="#" class="welcome">welcome to hy market!</a>
			</div>
			<div class="rightArea">
				<?php if($_SESSION['loginFlag']):?>
				<span>欢迎您</span><?php echo $_SESSION['username'];?>
				<a href="doAction.php?act=userOut">[退出]</a>
				<?php else:?>
				<a href="login.php">[登录]</a><a href="reg.php">[免费注册]</a>
				<?php endif;?>
			</div>
		</div>
	</div>
	<div class="logoBar">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="hy market"></a>
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
				<div class="shopClass_show">
					<dl class="shopClass_item">
						<dt><a href="#" class="b">女装</a> <a href="#" class="b">男装</a> <a href="#" class="aLink">春装</a></dt>
						<dd><a href="#">林弯弯</a> <a href="#">lee</a> <a href="#">g-star</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">席梦思</a> <a href="#" class="b">红木椅</a> <a href="#" class="aLink">沙发</a></dt>
						<dd><a href="#">空调</a> <a href="#">冰箱</a> <a href="#">洗衣机</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">零食</a> <a href="#" class="b">方便面</a> <a href="#" class="aLink">蔬果</a></dt>
						<dd><a href="#">干货</a> <a href="#">肉类</a> <a href="#">甜品</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">苹果</a> <a href="#" class="b">三星</a> <a href="#" class="aLink">华为</a></dt>
						<dd><a href="#">索尼</a> <a href="#">小米</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">大众</a> <a href="#" class="b">商务车</a> <a href="#" class="aLink">奔驰</a></dt>
						<dd><a href="#">奥迪</a> <a href="#">保时捷</a> <a href="#">兰博基尼</a></dd>
					</dl>
				</div>
			</div>
			<ul class="nav fl">
				<li><a href="#" class="active">电器城</a></li>
				<li><a href="#">特价</a></li>
				<li><a href="#">团购</a></li>
				<li><a href="#">聚划算</a></li>
				<li><a href="#">二手特卖</a></li>
				<li><a href="#">旅行必备</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="banner comWidth clearfix">
	<div class="banner_bar banner_big">
		<ul class="imgBox">
			<li><a href="#"><img src="images/banner/banner_01.jpg" alt="banner"></a></li>
			<li><a href="#"><img src="images/banner/banner_02.jpg" alt="banner"></a></li>
		</ul>
		<div class="imgNum">
			<a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
		</div>
	</div>
</div>
<?php foreach($cates as $cate):?>
<div class="shopTit comWidth">
	<span class="icon"></span><h3><?php echo $cate['cName'];?></h3>
	<a href="#" class="more">更多&gt;&gt;</a>
</div>
<div class="shopList comWidth clearfix">
	<div class="leftArea">
		<div class="banner_bar banner_sm">
			<ul class="imgBox">
				<li><a href="#"><img src="images/banner/<?php echo $cate['id'].'.jpg';?>" alt="banner"></a></li>
				<li><a href="#"><img src="images/banner/banner_sm_02.jpg" alt="banner"></a></li>
			</ul>
			<div class="imgNum">
				<a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
			</div>
		</div>
	</div>
	<div class="rightArea">
		<div class="shopList_top clearfix">
		<?php 
			$pros=getProsByCid($cate['id']);
			if($pros &&is_array($pros)):
			foreach($pros as $pro):
			$proImg=getProImgById($pro['id']);
		?>
			<div class="shop_item">
				<div class="shop_img">
					<a href="proDetails.php?id=<?php echo $pro['id'];?>" target="_blank"><img height="200" width="187" src="image_220/<?php echo $proImg['albumPath'];?>" alt=""></a>
				</div>
				<h6><?php echo $pro['pName'];?></h6>
				<p><?php echo $pro['mPrice'];?>元</p>
			</div>
			<?php 
			endforeach;
			endif;
			?>	
		</div>
		<div class="shopList_sm clearfix">
		<?php 
			$prosSmall=getSmallProsByCid($cate['id']);
			if($prosSmall &&is_array($prosSmall)):
			foreach($prosSmall as $proSmall):
			$proSmallImg=getProImgById($proSmall['id']);
		?>
			<div class="shopItem_sm">
				<div class="shopItem_smImg">
					<a href="proDetails.php?id=<?php echo $proSmall['id'];?>" target="_blank"><img width="95" height="95" src="image_220/<?php echo $proSmallImg['albumPath'];?>" alt=""></a>
				</div>
				<div class="shopItem_text">
					<p><?php echo $proSmall['pName'];?></p>
					<h3><?php echo $proSmall['mPrice'];?>元</h3>
				</div>
			</div>
			<?php 
			endforeach;
			endif;
			?>
		</div>
	</div>
</div>
<?php endforeach;?>
<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">关于hy market</a><i>|</i><a href="#">新手指南</a><i>|</i> <a href="#">营销中心</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：123456789</p>
	<p>曹皓宇版权所有</p>
</div>
</body>
</html>
