<?
include("../config/conn.php");
include("../config/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>房产考察</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div class="yjcode">
<? include("template/top.php");?>

<? 
while1("*","fcw_fckc where zt=0 order by lastsj desc");while($row1=mysql_fetch_array($res1)){
$a=preg_split("/·/",$row1[tit]);
if(count($a)>1){
$t1=$a[0];
$t2="·".$a[1];
}else{$t1=$row1[tit];$t2="";}
?>
<div class="fckclist box" onclick="gourl('fckcview<?=$row1[id]?>.html')">
<div class="main">
 <div class="d1"><img src="../upload/news/<?=$row1[bh]?>/xgt.jpg" /></div>
 <div class="d2"><strong><span><?=$t1?></span><?=$t2?></strong><br><?=$row1[tit1]?></div>
</div>
</div>
<? }?>

<div class="fckc1 box">
<div class="main">

 <div class="d1">温馨小贴士</div>
 <div class="d2">注意防晒</div>
 <div class="d3">
 普吉地处热带地区，太阳紫外线照射是很强烈的，应尽量避免阳光的直射，户外活动时，一定要注意防晒带好防晒用品，防晒霜、雨伞、太阳帽、太阳镜，背包、水杯、轻便的防滑鞋或登山鞋，千万不要穿高跟鞋。
 </div>
 <div class="d2">信用卡和少量的现金</div>
 <div class="d3">
 不用带太多现金，泰国几乎都可以刷卡和取款，很方便。
 </div>
 <div class="d2">备点常用药</div>
 <div class="d3">
 外出旅游很容易水土不服或闹肚子，易旅途疲劳。可少带一点儿常用药，如，感冒药、止泻药、肠胃药等。
 </div>
 <div class="d2">出游必备证件</div>
 <div class="d3">
 身份证、护照、签证、必备品，一定不能丢失，最好多带几份副本，以防遗失正本时用上。。
 </div>
 
 <div class="d4"><? adwhile("MT04")?></div>
 
</div>
</div>

<? include("template/bottom.php");?>
</div>
</body>
</html>