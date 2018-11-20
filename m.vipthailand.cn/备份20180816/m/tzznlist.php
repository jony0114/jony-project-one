<?
include("../config/conn.php");
include("../config/function.php");
$getstr=$_GET[str];
$ty1id=returnsx("j");
$ses=" where zt=0 and (type1id=55 or type1id=56 or type1id=57)";
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
if($ty1id!=-1){$ses=$ses." and type1id=".$ty1id."";$ty1name=returnnewstype(1,$ty1id);}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>投资指南</title>
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

<? if($page==1){?>
<!--图片B-->
<div class="addWrap">
 <div class="swipe" id="mySwipe">
   <div class="swipe-wrap">
   <?
   $iv=0;
   while1("*","fcw_ad where adbh='MT03' order by xh asc");while($row1=mysql_fetch_array($res1)){
   $tp="../ad/".$row1[bh].".".$row1[jpggif];
   ?>
   <div>
    <a href="<?=$row1[aurl]?>"><img class="img-responsive" src="<?=$tp?>" /></a>
    <div class="addWraptit"><?=$row1[tit]?></div>
   </div>
   <? $iv++;}?>
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
<? }?>

<div class="tzzncap box">
<div class="d1">
 <? $i=1;while1("*","fcw_newstype where admin=1 order by xh asc limit 3");while($row1=mysql_fetch_array($res1)){?>
 <a href="tzznlist_j<?=$row1[id]?>v.html" id="tzzncap<?=$i?>"<? if(($ty1id==-1 && $i==1) || $ty1id==$row1[id]){?> class="a1"<? }?>><?=$row1[name1]?></a>
 <? $i++;}?>
</div>
</div>

<? 
$i=1;pagef($ses,10,"fcw_news","order by lastsj desc");while($row=mysql_fetch_array($res)){
$tit=returntitdian($row[tit],64);
$tpv="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
?>
<div class="newslist box" onClick="gourl('txtlist_i<?=$row[id]?>v.html');">
<div class="d1"><img src="<?=returntppd($tpv,"../../img/none180x180.gif")?>" /></div>
<div class="d2">
 <a href="javascript:void(0);"><?=$tit?></a>
 <span class="s1"><?=dateYMDHM($row[lastsj])?></span>
</div>
</div>
<? }?>

<div class="npa">
<?
$nowurl="tzznlist";
$nowwd="";
require("template/page.html");
?>
</div>

<? include("template/bottom.php");?>
</div>
</body>
</html>