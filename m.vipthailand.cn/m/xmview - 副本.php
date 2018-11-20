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

<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/idangerous.swiper.min.js"></script>
<link rel="stylesheet" href="css/idangerous.swiper.css">
<style type="text/css">
.device {
  width: 100%;
  position: relative;
}
.swiper-container {
  width: 100%;
  color: #fff;
  height:100px;
  text-align: center;
}
.swiper-container img{width:100%;border-radius:4px;}
.swiper-container1 {
  width: 100%;
  color: #fff;
  text-align: center;
}
.swiper-container1 img{width:100%;border-radius:4px;margin-bottom:8px;}
.swiper-slide {
  opacity: 0.4;
  -webkit-transition: 300ms;
  -moz-transition: 300ms;
  -ms-transition: 300ms;
  -o-transition: 300ms;
  transition: 300ms;
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  -ms-transform: scale(0);
  -o-transform: scale(0);color:#333;
  transform: scale(0);
}
.swiper-slide-visible {
  opacity: 0.5;
  -webkit-transform: scale(0.8);
  -moz-transform: scale(0.8);
  -ms-transform: scale(0.8);
  -o-transform: scale(0.8);
  transform: scale(0.8);
}
.swiper-slide-active {
  top: 0;
  opacity: 1;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.pagination {
  position: absolute;
  z-index: 20;
  left: 0px;
  width: 100%;
  text-align: center;
  bottom: 5px;
}
.swiper-pagination-switch {
  display: inline-block;
  width: 10px;
  height: 10px;
  border-radius: 8px;
  background: #aaa;
  margin-right: 8px;
  cursor: pointer;
  -webkit-transition: 300ms;
  -moz-transition: 300ms;
  -ms-transition: 300ms;
  -o-transition: 300ms;
  transition: 300ms;
  opacity: 0;
  position: relative;
  top: -50px;
}
.swiper-visible-switch {
  opacity: 1;
  top: 0;
  background: #aaa;
}
.swiper-active-switch {
  background: #fff;
}
</style>
</head>
<body>
<div class="yjcode">
<? include("template/top.php");?>

<div class="xmv1 box">
<div class="d1"><img src="<?="../upload/".returnuserid($rowloupan[uid])."/f/".$rowloupan[bh]."/home.jpg";?>" /></div>
</div>
<div class="xmv2 box">
<div class="main">
 <div class="d2"><strong>￥<?=$rowloupan[zj]?></strong><br>总价</div><span class="s1"></span>
 <div class="d2"><strong><?=$rowloupan[sfbl]?></strong><br>首付比例</div><span class="s1"></span>
 <div class="d2"><strong><?=$rowloupan[njzj]?></strong><br>年均租金</div>
</div>
</div>
<div class="xmv3 box">
<? 
$a=preg_split("/xcf/",$rowloupan[wytsid]);
$a1=count($a);if($a1>4){$a1=4;}
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
 <div class="d1">名称：<?=$rowloupan[xq]?></div>
 <div class="d1">占地面积：<?=$rowloupan[zdmj]?>㎡</div>
 <div class="d1">地址：<?=$rowloupan[xqadd]?></div>
 <div class="d1">建筑面积：<?=$rowloupan[jzmj]?>㎡</div>
 <div class="d2">总共建筑：9栋（8栋酒店公寓、1栋豪华酒店大堂）</div>
 <div class="d1">绿化率：<?=$rowloupan[lhl]?></div>
 <div class="d1">容积率：<?=$rowloupan[rjl]?></div>
 <div class="d1">项目房型：</div>
 <div class="d1">总套数：<?=$rowloupan[zhs]?>套</div>
 </div>
</div>
</div>
<div class="readmore box" id="main2more" onclick="readmore('main2','')"><div class="d1">阅读全文<br><img src="img/jianmore.png" width="16" /></div></div>

<div class="xmv4 box"><div class="d1">周边配套</div></div>
<div class="xmv6 box"><div class="d1"><iframe marginwidth="1" marginheight="1" width="100%" height="300px" border="0" frameborder="0" src="../template/bdmap.php?zb=<?=$rowloupan[xqzb]?>&zbdj=<?=$rowloupan[zbdj]?>&txt1=<?=$rowloupan[xq]?>"></iframe></div></div>

<div class="xmv4 box"><div class="d1">项目样板房</div></div>
<div class="xmv8 box">
<div class="main">

  <div class="device">
    <div class="swiper-container">
      <div class="swiper-wrapper">
<? while1("*","fcw_xqphoto where zt=0 and xqbh='".$rowloupan[bh]."' order by sj desc limit 20");while($row1=mysql_fetch_array($res1)){?>
        <div class="swiper-slide">
<img src="../upload/<?=returnuserid($rowloupan[uid])?>/f/<?=$rowloupan[bh]?>/<?=$row1[bh]?>.jpg" />
        </div>
        <? }?>
      </div>
    </div>
    <div class="pagination" style="display:none;"></div>
  </div>
  <script>
  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    paginationClickable: true,
    centeredSlides: true,
    slidesPerView: 3,
    watchActiveIndex: true
  })
  </script>

</div>
</div>

<div class="xmv4 box"><div class="d1">项目户型图</div></div>
<!--户型B-->
<div class="xmv8 box">
<div class="main">

  <div class="device1">
    <div class="swiper-container1">
      <div class="swiper-wrapper">
      <? while1("*","fcw_huxing where zt=0 and xqbh='".$rowloupan[bh]."' order by sj desc limit 20");while($row1=mysql_fetch_array($res1)){?>
        <div class="swiper-slide">
<img src="../upload/<?=returnuserid($rowloupan[uid])?>/f/<?=$rowloupan[bh]?>/<?=$row1[bh]?>.jpg" /><strong><?=$row1[tit]?></strong>
        </div>
        <? }?>
      </div>
    </div>
    <div class="pagination1" style="display:none;"></div>
  </div>
  <script>
  var mySwiper = new Swiper('.swiper-container1',{
    pagination: '.pagination1',
    paginationClickable: true,
    centeredSlides: true,
    slidesPerView: 3,
    watchActiveIndex: true
  })
  </script>


</div>
</div>
<!--户型E-->

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