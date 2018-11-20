<?
include("../config/conn.php");
include("../config/function.php");
$getstr=$_GET[str];
$id=returnsx("i");
while0("*","fcw_news where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader(weburl."404.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<meta name="keywords" content="<?=$row[wkey]?>">
<meta name="description" content="<?=$row[wdes]?>">
<title><?=$row[tit]?> - <?=webname?></title>
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

<div class="newscap box"><div class="d1"><?=$row[tit]?></div></div>

<div class="newscap1 box"><div class="d1">来源：<?=$row[ly]?> <?=dateYMD($row[lastsj])?></div></div>

<div class="newstxt box">
<div class="main"><?=$row[txt]?></div>
</div>

<? while1("*","fcw_ad where adbh='MT05' order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){?>
<div class="newsad2 box">
<div class="main"><a href="<?=$row1[aurl]?>"><img src="../ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>" /></a></div>
</div>
<? }?>

<div class="newsad1 box" style="display:none;">
<div class="main">
 <div class="d1"><img src="img/a.png" /></div>
 <div class="d2">泰国投资置业一站式服务</div>
 <div class="d3">查看官方微博</div>
</div>
</div>

<div class="newscap2 box" onclick="gourl('tzznlist_j<?=$row[type1id]?>v.html')">
<div class="main">
 <div class="d1"><img src="img/b.png" height="25" /></div>
 <div class="d2"><?=returnnewstype(1,$row[type1id])?></div>
 <div class="d3">阅读更多精彩内容</div>
</div>
</div>

<div class="newscap3 box">
<div class="d1">相关推荐</div>
</div>

<? 
while1("*","fcw_news where zt=0 and type1id=".$row[type1id]." and iftj=1 order by lastsj desc limit 5");while($row1=mysql_fetch_array($res1)){
$tit=returntitdian($row1[tit],64);
$tpv="../".returntp("bh='".$row1[bh]."' order by xh asc","-1");
?>
<div class="newslist box" onClick="gourl('txtlist_i<?=$row[id]?>v.html');">
<div class="d1"><img src="<?=returntppd($tpv,"../../img/none180x180.gif")?>" /></div>
<div class="d2">
 <a href="javascript:void(0);"><?=$tit?></a>
 <span class="s1">来源：<?=$row1[ly]?> <?=dateYMDHM($row[lastsj])?></span>
</div>
</div>
<? }?>

<? include("template/bottom.php");?>
</div>
</body>
</html>