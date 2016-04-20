<?php 
require_once 'include.php';
$id=$_REQUEST['id'];
$proInfo=getProById($id);
$proImgs=getProImgsById($id);
if(!($proImgs &&is_array($proImgs))){
	alertMes("商品图片错误", "index.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>商品介绍</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<link type="text/css" rel="stylesheet" media="all" href="styles/jquery.jqzoom.css"/>
<script src="scripts/jquery-1.6.js" type="text/javascript"></script>
<script src="scripts/jquery.jqzoom-core.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false,
			title:false,
			zoomWidth:410,
			zoomHeight:410
        });
	
});
</script>
</head>

<body class="grey">
<div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="index.php" class="welcome">welcome to hy market!</a>
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
	<a href="#"><?php echo $proInfo['cName'];?></a>
	<span>&nbsp;&gt;&nbsp;</span>
	<em><?php echo $proInfo['pSn'];?></em>
</div>
<div class="description_info comWidth">
	<div class="description clearfix">
		<div class="leftArea">
			<div class="description_imgs">
				<div class="big">
					<a href="image_800/<?php echo  $proImgs[0]['albumPath'];?>" class="jqzoom" rel='gal1'  title="triumph" >
           			 <img width="309" height="340" src="image_350/<?php  echo $proImgs[0]['albumPath'];?>"  title="triumph">
	        		</a>
				</div>
				<ul class="des_smimg clearfix" id="thumblist" >
					<?php foreach($proImgs as $key=>$proImg):?>
					<li><a class="<?php echo $key==0?"zoomThumbActive":"";?> active" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: 'image_350/<?php echo $proImg['albumPath'];?>',largeimage: 'image_800/<?php echo $proImg['albumPath'];?>'}"><img src="image_50/<?php echo $proImg['albumPath'];?>" alt=""></a></li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
		<div class="rightArea">
			<div class="des_content">
				<h3 class="des_content_tit"><?php echo $proInfo['pName'];?></h3>
				<div class="dl clearfix">
					<div class="dt">价格</div>
					<div class="dd clearfix"><span class="des_money"><em>￥</em><?php echo $proInfo['mPrice'];?></span></div>
				</div>
				<div class="dl clearfix">
					<div class="dt">优惠</div>
					<div class="dd clearfix"><span class="hg"><i class="hg_icon">满换购</i><em>购ipad加价优惠够配件或USB充电插座</em></span></div>
				</div>
				<div class="des_position">
					<div class="dl clearfix">
						<div class="dt">送到</div>
						<div class="dd clearfix">
							<div class="select">
								<h3>上海大学宝山校区</h3><span></span>
							</div>
							<span class="theGoods">有货，可当日出货</span>
						</div>
					</div>
					<div class="dl clearfix">
						<div class="dt colorSelect">选择颜色</div>
						<div class="dd clearfix">
							<div class="des_item des_item_acitve">
								黄色
							</div>
							<div class="des_item">
								白色
							</div>
							<div class="des_item">
								黑色
							</div>
						</div>
					</div>
					<div class="dl clearfix">
						<div class="dt des_select_more">选择版本</div>
						<div class="dd clearfix ">
							<div class="des_item des_item_sm des_item_acitve">
								8GB
							</div>
							<div class="des_item des_item_sm">
								16GB
							</div>
							<div class="des_item des_item_sm">
								64GB
							</div>
							<div class="des_item des_item_sm">
								128GB
							</div>
						</div>
					</div>
					<div class="dl">
						<div class="dt des_num">数量</div>
						<div class="dd clearfix">
							<div class="des_number">
								<div class="reduction">-</div>
								<div class="des_input">
									<input type="text">
								</div>
								<div class="plus">+</div>
							</div>
							<span class="xg">限购<em>9</em>件</span>
						</div>
					</div>
				</div>
				<div class="des_select">
					已选择 <span>"黄色|16GB"</span>
				</div>
				<div class="shop_buy">
					<a href="addToShopCar.php?id=<?php echo $id;?>" class="shopping_btn"></a>
					<span class="line"></span>
					<a href="#" class="buy_btn"></a>
				</div>
				<div class="notes">
					注意：此商品可提供普通发票，不提供增值税发票。
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hr_15"></div>
<div class="des_info comWidth clearfix">
	<div class="leftArea">
		<div class="recommend">
			<h3 class="tit">同价位</h3>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/shopImg/1.jpg" alt=""></a>
					</div>
					<p><a href="#">童装春装</a></p>
					<p class="money">￥68</p>
				</div>
			</div>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/shopImg/2.jpg" alt=""></a>
					</div>
					<p><a href="#">女装九分裤直筒裤</a></p>
					<p class="money">￥115</p>
				</div>
			</div>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/shopImg/3.jpg" alt=""></a>
					</div>
					<p><a href="#">韩版帅气童装卫衣</a></p>
					<p class="money">￥122</p>
				</div>
			</div>
		</div>
		<div class="hr_15"></div>
		<div class="recommend">
			<h3 class="tit">同价位</h3>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/shopImg/4.jpg" alt=""></a>
					</div>
					<p><a href="#">席梦思柔软居家必备</a></p>
					<p class="money">￥278</p>
				</div>
			</div>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/shopImg/5.jpg" alt=""></a>
					</div>
					<p><a href="#">女装春装可爱风格</a></p>
					<p class="money">￥98</p>
				</div>
			</div>
			<div class="item">
				<div class="item_cont">
					<div class="img_item">
						<a href="#"><img src="images/shopImg/6.jpg" alt=""></a>
					</div>
					<p><a href="#">五香麻辣沙爹牛肉干四包包邮</a></p>
					<p class="money">￥46</p>
				</div>
			</div>
		</div>
	</div>
	<div class="rightArea">
		<div class="des_infoContent">
			<ul class="des_tit">
				<li class="active"><span>产品介绍</span></li>
				<li><span>产品评价(12312)</span></li>
			</ul>
			<div class="ad">
				<a href="#"><img src="images/shopImg/pad1.jpg"></a>
			</div>
			<div class="info_text">
				<div class="info_tit">
					<h3>强烈推荐</h3><h4>货比三家，还选</h4>
				</div>
				<p>现在就是买mini的好时候！换代清仓直降，但苹果品质不变！A5双核，内置Lightning闪电接口，正反可插，方便人性。小身材，炫丽的7.9英寸显示屏，7.2mm的厚度，薄如铅笔。女生包包随身携带更时尚！facetime视频通话，与密友24小时畅聊不断线。微信倾力打造，你的智能助理。苹果的牌子就不用我说了，1111补仓，存货不多哦！</p>
				<div class="hr_45"></div>
				<div class="info_tit">
					<h3>强烈推荐</h3><h4>货比三家，还选</h4>
				</div>
				<p>现在就是买mini的好时候！换代清仓直降，但苹果品质不变！A5双核，内置Lightning闪电接口，正反可插，方便人性。小身材，炫丽的7.9英寸显示屏，7.2mm的厚度，薄如铅笔。女生包包随身携带更时尚！facetime视频通话，与密友24小时畅聊不断线。微信倾力打造，你的智能助理。苹果的牌子就不用我说了，1111补仓，存货不多哦！</p>
				<div class="hr_45"></div>
				<img src="images/shopImg/pad2.jpg" class="center">
				<div class="hr_45"></div>
			</div>
		</div>
		<div class="hr_15"></div>
		<div class="des_infoContent">
			<h3 class="shopDes_tit">商品评价</h3>
			<div class="score_box clearfix">
				<div class="score">
					<span>4.7</span><em>分</em>
				</div>
				<div class="score_speed">
					<ul class="score_speed_text">
						<li class="speed_01">非常不满意</li>
						<li class="speed_02">不满意</li>
						<li class="speed_03">一般</li>
						<li class="speed_04">满意</li>
						<li>非常满意</li>
					</ul>
					<div class="score_num">
						4.7<i></i>
					</div>
					<p>共7689位网友参与评分</p>
				</div>
			</div>
			<div class="review_tab">
				<ul class="review fl">
					<li><a href="#" class="active">全部</a></li>
					<li><a href="#">满意（3121）</a></li>
					<li><a href="#">一般（321）</a></li>
					<li><a href="#">不满意（1121）</a></li>
				</ul>
				<div class="review_sort fr">
					<a href="#" class="review_time">时间排序</a><a href="#" class="review_reco">推荐排序</a>
				</div>
			</div>
			<div class="review_listBox">
				<div class="review_list clearfix">
					<div class="review_userHead fl">
						<div class="review_user">
							<img src="images/userHead/user1.jpg" alt="">
							<p>32*****89</p>
							<p>会员</p>
						</div>
					</div>
					<div class="review_cont">
						<div class="review_t clearfix">
							<div class="starsBox fl"><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span></div>
							<span class="stars_text fl">5分 满意</span>
						</div>
						<p>挺不错的一次购物。</p>
						<p><a href="#" class="ding">顶(5)</a><a href="#" class="cai">踩(1)</a></p>
					</div>
				</div>
				<div class="review_list clearfix">
					<div class="review_userHead fl">
						<div class="review_user">
							<img src="images/userHead/user2.jpg" alt="">
							<p>42*****90</p>
							<p>白金会员</p>
						</div>
					</div>
					<div class="review_cont">
						<div class="review_t clearfix">
							<div class="starsBox fl"><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span></div>
							<span class="stars_text fl">5分 满意</span>
						</div>
						<p>好评，发货很快！</p>
						<p><a href="#" class="ding">顶(1)</a><a href="#" class="cai">踩(0)</a></p>
					</div>
				</div>
				<div class="review_list clearfix">
					<div class="review_userHead fl">
						<div class="review_user">
							<img src="images/userHead/user3.jpg" alt="">
							<p>15*****48</p>
							<p>会员</p>
						</div>
					</div>
					<div class="review_cont">
						<div class="review_t clearfix">
							<div class="starsBox fl"><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span><span class="stars"></span></div>
							<span class="stars_text fl">5分 满意</span>
						</div>
						<p>质量很好，很满意！</p>
						<p><a href="#" class="ding">顶(3)</a><a href="#" class="cai">踩(0)</a></p>
					</div>
				</div>
				<div class="hr_25"></div>
			</div>
		</div>
	</div>
</div>
<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">关于hy market</a><i>|</i><a href="#">新手指南</a><i>|</i> <a href="#">营销中心</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：123456789</p>
	<p>曹皓宇版权所有</p>
</div>
</body>
</html>
