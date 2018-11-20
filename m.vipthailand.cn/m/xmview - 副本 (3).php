<?
include("../config/conn.php");
include("../config/function.php");
$id=$_GET[id];
$sqlloupan="select * from fcw_xq where zt=0 and ifxj=0 and id=".$id;mysql_query("SET NAMES 'GBK'");$resloupan=mysql_query($sqlloupan);
if(!$rowloupan=mysql_fetch_array($resloupan)){php_toheader("./");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title><?=$rowloupan[xq]?>楼盘介绍_<?=$rowloupan[xq]?>价格_<?=returnarea(1,$row[areaid]).returnarea(2,$row[areaids])?>-<?=webname?></title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="index.js"></script>

<link rel="stylesheet" href="css/swiper.min1.css">
<script src="js/swiper.min1.js"></script>
<style>
.pc-banner {
	width: 100%;
	float: left;
}

.swiper-container {
	width: 100%;
}

.swiper-slide {
	-webkit-transition: transform 1.0s;
	-moz-transition: transform 1.0s;
	-ms-transition: transform 1.0s;
	-o-transition: transform 1.0s;
	-webkit-transform: scale(0.7);
	transform: scale(0.7);
}

.swiper-slide-active,.swiper-slide-duplicate-active {
	-webkit-transform: scale(1);
	transform: scale(1);
}

.none-effect {
	-webkit-transition: none;
	-moz-transition: none;
	-ms-transition: none;
	-o-transition: none;
}

.swiper-slide a {
	background: #fff;
	padding:10px;
	display: block;
	border-radius:8px;
}


.swiper-slide-active a:after {
	background: none;
}

.swiper-slide img {
	width: 100%;
	border-radius: 8px;
	display: block;
}
.swiper-slide  strong{float:left;width:100%;font-size:14px;clear:both;font-weight:100;text-align:center;margin:10px 0 0 0;}


.swiper-container1 .swiper-slide img {
}

</style>

</head>
<body>
<div class="yjcode">
<? include("template/top.php");?>

<!--图片B-->
<div class="addWrap" style="margin:0;">
 <div class="swipe" id="mySwipe">
   <div class="swipe-wrap">
   <?
   $iv=0;
   $tarr=array("","2","3","4","5");
   for($i=0;$i<count($tarr);$i++){
   $tp="../upload/".returnuserid($rowloupan[uid])."/f/".$rowloupan[bh]."/home".$tarr[$i].".jpg";
   if(is_file($tp)){
   ?>
   <div>
    <a href="javascript:void(0);"><img class="img-responsive" src="<?=$tp?>" /></a>
   </div>
   <? $iv++;}}?>
   </div>
  </div>
  <ul id="position"><? for($j=0;$j<$iv;$j++){?><li class="<? if(0==$j){?>cur<? }?>"></li><? }?></ul>
</div>
<script src="js/swipe.js"></script> 
<script type="text/javascript">
var bullets = document.getElementById('position').getElementsByTagName('li');
var banner = Swipe(document.getElementById('mySwipe'), {
auto: 2000,
continuous: true,
disableScroll:false,
callback: function(pos) {
var i = bullets.length;
while (i--) {
bullets[i].className = ' ';
}
bullets[pos].className = 'cur';
}});
</script>
<!--图片E-->


<div class="xmv2 box">
<div class="main">
 <div class="d2"><strong>￥<?=$rowloupan[zj]?></strong><br>总价</div><span class="s1"></span>
 <div class="d2"><strong><?=$rowloupan[sfbl]?></strong><br>首付比例</div><span class="s1"></span>
 <div class="d2"><strong><?=$rowloupan[njzj]?></strong><br>年均租金</div><span class="s1"></span>
 <div class="d2"><strong><?=$rowloupan[njzj]?></strong><br>测试内容</div>
</div>
</div>
<div class="xmv3 box">
<? 
$a=preg_split("/xcf/",$rowloupan[wytsid]);
$a1=count($a);if($a1>3){$a1=3;}
for($i=0;$i<=$a1;$i++){
if(!empty($a[$i])){
?>
<div class="d1"><img src="img/g.png" /><span><?=returnwyts(1,$a[$i])?></span></div>
<? }}?>
</div>

<div class="xmv4 xmv40 box"><div class="d1">项目信息</div></div>
<div class="xmv5 box">
<div class="main">
 <div id="main2" class="main2">
 <?
 $xmxx=preg_split("/\n/",$rowloupan[xmxx]);
 for($i=0;$i<count($xmxx);$i++){
 if(!empty($xmxx[$i])){
 ?>
 <div class="d1"><?=$xmxx[$i]?></div>
 <? }}?>
 </div>
</div>
</div>
<div class="readmore box" id="main2more" onclick="readmore('main2','')"><div class="d1">阅读全文<br><img src="img/jianmore.png" width="16" /></div></div>

<div class="xmv4 box"><div class="d1">周边配套</div></div>
<div class="xmv6 box"><div class="d1"><iframe marginwidth="1" marginheight="1" width="100%" height="300px" border="0" frameborder="0" src="../template/bdmap.php?zb=<?=$rowloupan[xqzb]?>&zbdj=<?=$rowloupan[zbdj]?>&txt1=<?=$rowloupan[xq]?>"></iframe></div></div>

<div class="xmv4 box"><div class="d1">项目样板房</div></div>
<div class="xmv8 box">
<div class="main">

<section class="pc-banner">
	<div class="swiper-container">
        <div class="swiper-wrapper">
<? 
$i=1;while1("*","fcw_xqphoto where zt=0 and xqbh='".$rowloupan[bh]."' order by sj desc limit 20");while($row1=mysql_fetch_array($res1)){
$tp="../upload/".returnuserid($rowloupan[uid])."/f/".$rowloupan[bh]."/".$row1[bh].".jpg";
?>
            <div class="swiper-slide<? if($i==1){?> swiper-slide-center none-effect<? }?>"><a href=""><img src="<?=$tp?>" ></a></div>
       <? $i++;}?>
        </div>
    </div>
</section>


</div>
</div>

<div class="xmv4 box"><div class="d1">项目户型图</div></div>
<!--户型B-->
<div class="xmv8 box">
<div class="main">

<section class="pc-banner">
	<div class="swiper-container swiper-container1">
        <div class="swiper-wrapper">
      <? 
	  $i=1;while1("*","fcw_huxing where zt=0 and xqbh='".$rowloupan[bh]."' order by xh asc limit 20");while($row1=mysql_fetch_array($res1)){
	  $tp="../upload/".returnuserid($rowloupan[uid])."/f/".$rowloupan[bh]."/".$row1[bh].".jpg";
	  ?>
            <div class="swiper-slide<? if($i==1){?> swiper-slide-center none-effect<? }?>"><a href=""><img src="<?=$tp?>" ><strong><?=$row1[tit]?></strong></a></div>
       <? $i++;}?>
        </div>
    </div>
</section>

</div>
</div>
<!--户型E-->
<script>
window.onload = function() {
var swiper = new Swiper('.swiper-container',{
	autoplay:3000,
	speed:1000,
	autoplayDisableOnInteraction : false,
	loop:true,
	centeredSlides : true,
	slidesPerView:2,
	paginationClickable:true,
	onInit:function(swiper){
		//swiper.slides[2].className="swiper-slide swiper-slide-active";//第一次打开不要动画
		},
	breakpoints: { 
			"100%": {
				slidesPerView: 1,
			 }
		}
	});
	
var swiper1 = new Swiper('.swiper-container1',{
	autoplay:3000,
	speed:1000,
	autoplayDisableOnInteraction : false,
	loop:true,
	centeredSlides : true,
	slidesPerView:2,
	paginationClickable:true,
	onInit:function(swiper1){
		//swiper.slides[2].className="swiper-slide swiper-slide-active";//第一次打开不要动画
		},
	breakpoints: { 
			"100%": {
				slidesPerView: 1,
			 }
		}
	});
	
}
</script>

<div class="xmv7 box">
<div class="d1 d11" id="lptxtcap1" onclick="lptxtonc(1)">图文介绍</div>
<div class="d1" id="lptxtcap2" onclick="lptxtonc(2)">购房须知</div>
</div>

<div id="lptxt1">
 <div class="newstxt box">
 <div class="main"><div id="main1" class="main1"><?=$rowloupan[txt]?></div></div>
 </div>
 <div class="readmore box" id="main1more" onclick="readmore('main1','')"><div class="d1">阅读全文<br><img src="img/jianmore.png" width="16" /></div></div>
</div>

<div id="lptxt2" style="display:none;">
 <div class="newstxt box">
 <div class="main"><?=$rowloupan[zb]?></div>
 </div>
</div>

<? include("template/bottom.php");?>
</div>
</body>
</html>