<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$bh=$_GET[bh];
$ses=" where xqbh='".$bh."' and zt<>99";
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
 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit7").className="a1";</script>

 <!--B-->
 <ul class="ksedi">
 <li class="l2">
 <a href="loupankflx.php?bh=<?=$bh?>" class="a1">发布看房团</a>
 <a href="javascript:void(0)" onclick="checkDEL(28,'fcw_kanfang')" class="a2">变更审核</a>
 <a href="javascript:void(0)" onclick="checkDEL(29,'fcw_kanfang')" class="a2">删除</a>
 </li>
 </ul>
 <ul class="lpkfcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">看房团活动主题</li>
 <li class="l3">关注</li>
 <li class="l4">报名情况</li>
 <li class="l5">发布会员</li>
 <li class="l6">操作</li>
 </ul>
 <?
 pagef($ses,20,"fcw_kanfang","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="loupankf.php?action=update&bh=".$bh."&mybh=".$row[bh];
 $userid=returnuserid($row[uid]);
 ?>
 <ul class="lpkflist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../".returntp("bh='".$row[bh]."'"),"img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=$row["tit"]?></a><br>
 <?=returnztv($row[zt],$row[ztsm])?><? if($row[iftj]>0){echo "<span class='blue'> | 推荐位".$row[iftj]."</span>";}?>
 </li>
 <li class="l3"><?=$row[djl]?></li>
 <li class="l4">
 <strong><a href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$row[bh]?>"><? $bm1=returncount("fcw_kanfanguser where kfbh='".$row[bh]."'");echo $bm1;?></a></strong><br>
 <a class="blue" href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$row[bh]?>&zt=1">已通知<? $bm2=returncount("fcw_kanfanguser where kfbh='".$row[bh]."' and zt=1");echo $bm2;?></a>,
 <a class="red" href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$row[bh]?>&zt=0">未通知<?=$bm1-$bm2?></a>
 </li>
 <li class="l5"><?=$row[uid]?></li>
 <li class="l6"><a href="<?=$aurl?>" class="a1">修改</a><span></span><a href="../loupan/tuanview<?=$row[id]?>.html" target="_blank" class="a1">预览</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="loupankflist.php";
 $nowwd="bh=".$bh;
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>