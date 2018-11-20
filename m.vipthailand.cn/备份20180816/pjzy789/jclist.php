<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where zt<>99";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
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
<link href="css/jia.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="jclist.php?st1="+document.getElementById("st1").value+"&zt="+document.getElementById("zt").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu7").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0802,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_jia.php");?>

<div class="right">

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">建材列表</a>
 </div> 

 <!--B-->
 <ul class="psel">
 <li class="l1">关键词：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <select id="zt">
 <option value="">==不限==</option>
 <option value="0"<? if("0"==$_GET[zt]){?> selected="selected"<? }?>>通过审核</option>
 <option value="1"<? if("1"==$_GET[zt]){?> selected="selected"<? }?>>正在审核</option>
 <option value="2"<? if("2"==$_GET[zt]){?> selected="selected"<? }?>>审核被拒</option>
 </select>
 </li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(14,'fcw_jia_jc')" class="a2">橱窗推荐</a>
 <a href="javascript:void(0)" onclick="checkDEL(15,'fcw_jia_jc')" class="a2">取消推荐</a>
 <a href="javascript:void(0)" onclick="checkDEL(57,'fcw_jia_jc')" class="a2">变更审核</a>
 <a href="javascript:void(0)" onclick="checkDEL(58,'fcw_jia_jc')" class="a2">上架/下架</a>
 <a href="jclist.php?zt=1" class="a2">需要审核</a>
 <a href="javascript:void(0)" onclick="checkDEL(59,'fcw_jia_jc')" class="a1">删除</a>
 </li>
 </ul>
 <ul class="jiaprocap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">宝贝信息</li>
 <li class="l3">价格</li>
 <li class="l4">关注</li>
 <li class="l5">更新</li>
 <li class="l6">操作</li>
 </ul>
 <?
 pagef($ses,20,"fcw_jia_jc","order by lastsj desc");
 while($row=mysql_fetch_array($res)){
 if(0==$row[ifxj]){$xjv="<span class='blue'>上架</span>";}else{$xjv="<span class='red'>已下架</span>";}
 $aurl="jc.php?bh=".$row[bh];
 ?>
 <ul class="jiapro">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../".returntp("bh='".$row[bh]."'","-1"),"img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=returntitdian($row["tit"],78)?></a><br>
 <?=returnjcmyty(1,$row[mytype1id])." ".returnjcmyty(2,$row[mytype2id])?><br>
 <?=$xjv." | ".returnztv($row[zt],$row[ztsm])?>
 </li>
 <li class="l3"><strong class="feng"><?=returnjgdw($row[money1],"元","来电咨询")?></strong></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><a href="<?=$aurl?>" class="a1">修改</a><span></span><a href="../jc/pview<?=$row[id]?>.html" target="_blank" class="a1">预览</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="jclist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>