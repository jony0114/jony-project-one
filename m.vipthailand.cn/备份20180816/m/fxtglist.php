<?
include("../config/conn.php");
include("../config/function.php");
$getstr=$_GET[str];
$ty1id=returnsx("j");
$ses=" where zt=0";
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
if($ty1id!=-1){$ses=$ses." and admin=".$ty1id."";}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>发现泰国</title>
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

<div class="tzzncap box">
<div class="d1">
 <a href="fxtglist_j1v.html" id="fxtgcap1"<? if(1==$ty1id){?> class="a1"<? }?>>旅游线路</a>
 <a href="fxtglist_j2v.html" onclick="fxtgonc(2)" id="fxtgcap2"<? if(2==$ty1id){?> class="a1"<? }?>>吃喝玩乐</a>
 <a href="fxtglist_j3v.html" onclick="fxtgonc(3)" id="fxtgcap3"<? if(3==$ty1id){?> class="a1"<? }?>>泰国文化</a>
</div>
</div>

<? 
$i=1;pagef($ses,10,"fcw_fxtg","order by lastsj desc");while($row=mysql_fetch_array($res)){
$tit=returntitdian($row[tit],64);
?>
<div class="shouye4 box" onclick="gourl('fxtgview<?=$row[id]?>.html')">
<div class="main">
 <div class="d1"><img src="../upload/news/<?=$row[bh]?>/xgt.jpg" /></div>
 <div class="d2"><?=$row[tit]?></div>
 <div class="d3"><?=$row[tit1]?></div>
</div>
</div>
<? }?>

<div class="npa">
<?
$nowurl="fxtglist";
$nowwd="";
require("template/page.html");
?>
</div>

<? include("template/bottom.php");?>
</div>
</body>
</html>