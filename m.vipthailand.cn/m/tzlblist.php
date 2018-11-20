<?
include("../config/conn.php");
include("../config/function.php");
$ses=" where zt=0";
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>投资礼包</title>
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

<div class="hftp box"><div class="d1"><img src="img/tzlb.jpg" /></div></div>

<div class="tzlb box">
<div class="main">
 <div class="d1">投资礼包</div>
 <? 
 pagef($ses,10,"fcw_tzlb","order by lastsj desc");while($row=mysql_fetch_array($res)){
 ?>
 <a href="../upload/news/<?=$row[bh]?>/xz.<?=$row[hz]?>" target="_blank">
 <ul class="u1">
 <li class="l1"><img class="img1" src="../upload/news/<?=$row[bh]?>/xgt.jpg" /><span><img src="img/doan.png" /></span></li>
 <li class="l2"><?=$row[tit]?></li>
 <li class="l3"><?=$row[tit1]?></li>
 <li class="l4">格式：<?=$row[gs]?>   语言：<?=$row[yy]?></li>
 </ul>
 </a>
 <? }?>
</div>
</div>

<div class="npa">
<?
$nowurl="tzlblist";
$nowwd="";
require("template/page.html");
?>
</div>

<div class="wdmenu box">
<div class="d1" onclick="gourl('tzznlist_j57v.html')">房产政策</div>
<div class="d2" onclick="gourl('tzznlist_j56v.html')">最新动态</div>
</div>

<? include("template/bottom.php");?>
</div>
</body>
</html>