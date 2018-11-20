<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$ses=" where zt=0";
$st1=$_GET[st1];
if($st1!=""){$ses=$ses." and (mot like '%".$st1."%')";}

$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/fang.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="weituozhaolist.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu4").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=6;include("menu_fang.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="weituozhaolist.php">找房委托</a>
 </div>

 <!--B-->
 <ul class="psel">
 <li class="l1">关键词：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(74,'noRefresh.php')" class="a1">删除</a>
 </li>
 </ul>
 <ul class="wtcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">委托信息</li>
 <li class="l3">类型</li>
 <li class="l4">希望区域</li>
 <li class="l5">电话</li>
 <li class="l6">发布时间</li>
 </ul>
 <?
 pagef($ses,20,"fcw_weituozhao","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="wtlist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><a href="weituozhao.php?id=<?=$row[id]?>"><?=strgb2312($row[txt],0,30)?></a></li>
 <li class="l3"><?=$row[type1]?></li>
 <li class="l4"><?=returnarea(1,$row[areaid])?></li>
 <li class="l5"><?=$row[mot]?></li>
 <li class="l6"><?=$row[sj]?></li>
 </ul>
 <? }?>
 <?
 $nowurl="weituozhaolist.php";
 $nowwd="st1=".$_GET[st1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>