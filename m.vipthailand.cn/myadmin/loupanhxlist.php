<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
$ses=" where zt<>99";
if(!empty($bh)){$ses=$ses." and xqbh='".$bh."'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/loupan.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0402,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_loupan.php");?>

<div class="right">

 <? if(!empty($bh)){?>
 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit3").className="a1";</script>
 <? }?>
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","loupanhxlist.php?bh=".$bh);}?>
 
 <!--B-->
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(21,'fcw_huxing')" class="a1">删除</a>
 <a href="javascript:void(0)" onclick="checkDEL(20,'fcw_huxing')" class="a2">变更审核</a>
 <? if(!empty($bh)){?><a href="loupanhxlx.php?bh=<?=$bh?>" class="a2">新增户型</a><? }?>
 </li>
 </ul>
 <ul class="xqphotocap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">户型信息</li>
 <li class="l3">状态</li>
 <li class="l4">排序</li>
 <li class="l5">关注</li>
 <li class="l6">操作</li>
 </ul>
 <?
 pagef($ses,20,"fcw_huxing","order by xh asc");while($row=mysql_fetch_array($res)){
 $aurl="loupanhx.php?bh=".$row[xqbh]."&mybh=".$row[bh];
 $tp="../upload/".$userid."/f/".$row[xqbh]."/".$row[bh].".jpg";
 ?>
 <ul class="xqphotolist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd($tp,"img/none60x60.gif")?>" width="60" height="60" align="left" /></a><a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=$row["tit"]?></a>
 </li>
 <li class="l3"><?=returnztv($row[zt],$row[ztsm])?></li>
 <li class="l4"><?=$row[xh]?></li>
 <li class="l5"><?=$row[djl]?></li>
 <li class="l6"><a href="<?=$aurl?>" class="a1">修改</a><span></span><a href="../loupan/huxingview<?=$row[id]?>.html" target="_blank" class="a1">预览</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="loupanhxlist.php";
 $nowwd="bh=".$bh;
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>