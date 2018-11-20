<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$bh=$_GET[bh];
$ses=" where zt<>99";
if($bh!=""){$ses=$ses." and xqbh='".$bh."'";}
if($_GET[hf]=="xy"){$ses=$ses." and txt2=''";}
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

 <? if(!empty($bh)){include("rightcap2.php");}?>
 <script language="javascript">document.getElementById("rtit8").className="a1";</script>

 <!--B-->
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(33,'fcw_loupanmsg')" class="a1">删除</a>
 <a href="javascript:void(0)" onclick="checkDEL(32,'fcw_loupanmsg')" class="a2">变更审核</a>
 <? if(!empty($bh)){?><a href="loupanmsglx.php?bh=<?=$bh?>" class="a2">发布留言</a><? }?>
 <a href="loupanmsglist.php?bh=<?=$bh?>&hf=xy" class="a2">等待回复</a>
 <a href="loupanmsglist.php?bh=<?=$bh?>" class="a2">全部</a>
 </li>
 </ul>
 <ul class="lpmsgcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">网友咨询留言信息</li>
 <li class="l3">审核</li>
 <li class="l4">时间</li>
 <li class="l5">操作</li>
 </ul>
 <?
 pagef($ses,20,"fcw_loupanmsg","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="loupanmsg.php?action=update&bh=".$row[xqbh]."&id=".$row[id];
 $userid=returnuserid($row[uid]);
 ?>
 <ul class="lpmsglist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><span class="blue">留言：<?=returntitdian($row["txt1"],78)?></span><br>&nbsp;<span class="red">回复：<?=returntitdian($row["txt2"],78)?></span></li>
 <li class="l3"><?=returnztv($row[zt])?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l5"><a href="<?=$aurl?>">详情</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="loupanmsglist.php";
 $nowwd="bh=".$bh."&hf=".$_GET[hf];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>