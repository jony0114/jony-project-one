<?
include("../config/conn.php");
include("../config/function.php");
$ses=" where admin=2 and zt=0 and areaid>0 and ifxj=0";
$px="order by xsxh asc";
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title>项目</title>
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
pagef($ses,10,"fcw_xq",$px);while($row=mysql_fetch_array($res)){
$tp="../upload/".returnuserid($row[uid])."/f/".$row[bh]."/home.jpg";
?>
<div class="xmlist box" onclick="gourl('xmview<?=$row[id]?>.html')">
<div class="main">
 <div class="d1"><img src="<?=$tp?>" /><span><?=$row[xq]?></span></div>
 <div class="d2"><strong>￥<?=$row[zj]?></strong><br>总价</div><span class="s1"></span>
 <div class="d2"><strong><?=$row[sfbl]?></strong><br>首付比例</div><span class="s1"></span>
 <div class="d2"><strong><?=$row[njzj]?></strong><br>年均租金</div><span class="s1"></span>
 <div class="d2"><strong><?=$row[njzj]?></strong><br>测试内容</div>
</div>
</div>
<? }?>

<div class="npa">
<?
$nowurl="tzlblist";
$nowwd="";
require("template/page.html");
?>
</div>

<? include("template/bottom.php");?>
</div>
</body>
</html>