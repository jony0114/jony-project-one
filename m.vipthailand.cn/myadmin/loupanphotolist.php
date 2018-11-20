<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$bh=$_GET[bh];
$timestamp = time();
$tptyarr=preg_split("/,/",tptyarr_d);
$tpnumarr=preg_split("/,/",tpnumarr_d);
$tpnum=$_GET[tpnum];
if(!in_array($tpnum,$tpnumarr)){$tpnum=0;}
$ses=" where tyid=".$tpnumarr[$tpnum];
if(!empty($bh)){$ses=$ses." and xqbh='".$bh."'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}

if($_GET[control]=="fm"){
 updatetable("fcw_xqphoto","iffm=0 where xqbh='".$bh."' and tyid=".$tpnumarr[$tpnum]);
 updatetable("fcw_xqphoto","iffm=1 where xqbh='".$bh."' and id=".$_GET[id]);
}
?>
<html>
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
 <script language="javascript">document.getElementById("rtit4").className="a1";</script>

 <!--B-->
 <div class="rmenucap">
 <?
 for($i=2;$i<3;$i++){
 ?>
 <a <? if($tpnumarr[$tpnum]==$tpnumarr[$i]){echo "class='a1'";}?> href="loupanphotolist.php?bh=<?=$bh?>&tpnum=<?=$i?>"><?=$tptyarr[$i]?>(<?=returncount("fcw_xqphoto where uid='".$uid."' and xqbh='".$bh."' and zt<>99 and tyid=".$tpnumarr[$i])?>)</a>
 <? }?>
 </div>
 
 <!--效果图/详情B-->
 <div class="rkuang">
 <ul class="rcap"><li class="l1"></li><li class="l2">上传图片</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1"></li>
 <li class="l2">
 <iframe style="float:left;" src="tpupload.php?admin=3&bh=<?=$bh?>&tpnum=<?=$tpnum?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 </li>
 </ul>
 </div>
 <!--效果图/详情E-->

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onClick="checkDEL(23,'fcw_xqphoto')" class="a1">变更审核</a>
 <a href="javascript:void(0)" onClick="checkDEL(22,'fcw_xqphoto')" class="a2">删除</a>
 </li>
 </ul>

 <ul class="xqphotocap">
 <li class="l1"><input name="C2" type="checkbox" onClick="xuan()" /></li>
 <li class="l2">图片信息</li>
 <li class="l3">分类</li>
 <li class="l4">关注</li>
 <li class="l5">时间</li>
 <li class="l6">操作</li>
 </ul>
 <?
 pagef($ses,20,"fcw_xqphoto","order by id asc");while($row=mysql_fetch_array($res)){
 $aurl="../upload/".$userid."/f/".$row[xqbh]."/".$row[bh].".jpg";
 ?>
 <ul class="xqphotolist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">
 <a href="<?=$aurl?>" target="_blank"><img border="0" class="tp" src="<?=returntppd("../upload/".$userid."/f/".$row[xqbh]."/".$row[bh]."-1.jpg","img/none60x60.gif")?>" width="60" height="60" align="left" /></a><a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1" target="_blank"><?=$row["tit"]?></a><br><?=returnztv($row[zt],$row[ztsm])?>
 </li>
 <li class="l3"><?=$tptyarr[$tpnum]?></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6">
 <a href="<?=$aurl?>" target="_blank">预览</a><span></span>
 <? if(1==$row[iffm]){echo "<a href='javascript:void(0);' class='red'>封面</a>";}else{?>
 <a href="xqphotolist.php?control=fm&id=<?=$row[id]?>&tpnum=<?=$tpnum?>&bh=<?=$bh?>">设为封面</a>
 <? }?>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="loupanphotolist.php";
 $nowwd="bh=".$bh."&tpnum=".$tpnum;
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>