<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

$sj=date("Y-m-d H:i:s");
$ses=" where type1='出售' and zt<>99";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[sd1]!=""){$ses=$ses." and wylx='".$_GET[sd1]."'";}
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
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
location.href="chushoulist.php?st1="+document.getElementById("st1").value+"&sd1="+document.getElementById("sd1").value;	
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
 <? $leftid=1;include("menu_fang.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="chushoulist.php">出售管理</a>
 </div>

 <!--B-->
 <ul class="psel">
 <li class="l1">信息标题：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">物业类型：</li>
 <li class="l2">
 <select id="sd1">
 <option value="">==不限==</option>
 <? $xs="chushou";while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[name1]?>"<? if(strstr($_GET[sd1],$row1[name1])!=""){?> selected="selected"<? }?>><?=$row1[name2]?></option>
 <? }?>
 </select>
 </li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(78,'fcw_fang')" class="a2">更新选中</a>
 <a href="javascript:void(0)" onclick="checkDEL(79,'fcw_fang')" class="a2">更新全部</a>
 <a href="javascript:void(0)" onclick="checkDEL(14,'fcw_fang')" class="a2">橱窗推荐</a>
 <a href="javascript:void(0)" onclick="checkDEL(15,'fcw_fang')" class="a2">取消橱窗推荐</a>
 <a href="javascript:void(0)" onclick="checkDEL(18,'fcw_fang')" class="a2">变更审核</a>
 <a href="javascript:void(0)" onclick="checkDEL(17,'fcw_fang')" class="a2">删除</a>
 <a href="javascript:void(0)" onclick="checkDEL(16,'fcw_fang')" class="a2">上架/下架</a>
 <a href="chushoulist.php?zt=1" class="a2">需要审核</a>
 </li>
 </ul>
 <ul class="fanglistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">房源信息</li>
 <li class="l3">售价</li>
 <li class="l4">关注度</li>
 <li class="l5">推广状态</li>
 <li class="l6">操作</li>
 </ul>
 <?
 pagef($ses,20,"fcw_fang","order by sj desc");
 while($row=mysql_fetch_array($res)){
 if(0==$row[ifxj]){$xjv="<span class='blue'>上架</span>";}else{$xjv="<span class='red'>已下架</span>";}
 $aurl="chushou.php?bh=".$row[bh];
 $tp=returntppd("../".returntp("bh='".$row[bh]."' order by iffm desc","-1"),"img/none60x60.gif");
 ?>
 <ul class="fanglist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=$tp?>" width="60" height="60" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1">[<?=$row[wylx]?>] <?=returntitdian($row["tit"],78)?></a><br>
 <?=$xjv." | ".returnztv($row[zt],$row[ztsm])?>
 <? if(1==$row[mytj]){?> | <span class="feng">橱窗推荐</span><? }?>
 </li>
 <li class="l3"><strong class="feng"><?=returnjgdw($row[money1],"万")?></strong></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l5"><strong><? if($row[zddq]>$sj){echo " 置顶 ";} if($row[jsdq]>$sj){echo " 急售 ";}?></strong></li>
 <li class="l6">
 <a href="<?=$aurl?>" class="a1">修改</a><span></span>
 <a href="../second/view<?=$row[id]?>.html" target="_blank" class="a1">预览</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="chushoulist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1]."&sd1=".$_GET[sd1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>