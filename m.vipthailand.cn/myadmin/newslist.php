<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$ses=" where zt<>99";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
if($_GET[ty1id]!=""){$ses=$ses." and type1id= ".$_GET[ty1id]."";}
if($_GET[ty2id]!=""){$ses=$ses." and type2id= ".$_GET[ty2id]."";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/news.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
d=document.getElementById("d1").value;
dv=d.split("xcf");
ty2id="";ty1id="";
if(dv[0]!=0){ty1id=dv[0];}
if(dv[1]!=0){ty2id=dv[1];}
location.href="newslist.php?st1="+document.getElementById("st1").value+"&zt="+document.getElementById("zt").value+"&ty1id="+ty1id+"&ty2id="+ty2id;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu3").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0202,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_news.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="newslist.php">资讯列表</a>
 </div>

 <!--B-->
 <ul class="psel">
 <li class="l1">关键词：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">分组：</li>
 <li class="l2">
 <select id="d1">
 <option value="0xcf0">不限</option>
 <? while1("*","fcw_newstype where admin=1");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>xcf0"<? if($row1[id]==$_GET[ty1id] && $_GET[ty2id]==""){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[name1]?></option>
 <? while2("*","fcw_newstype where admin=2 and name1='".$row1[name1]."'");while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>xcf<?=$row2[id]?>"<? if($row1[id]==$_GET[ty1id] && $row2[id]==$_GET[ty2id]){?> selected="selected"<? }?>> - <?=$row2[name2]?></option>
 <? }?>
 <? }?>
 </select>
 </li>
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
 <a href="javascript:void(0)" onclick="checkDEL(36,'fcw_news')" class="a2">变更审核</a>
 <a href="javascript:void(0)" onclick="checkDEL(37,'fcw_news')" class="a2">删除</a>
 <a href="newslx.php" class="a1">发布资讯</a>
 </li>
 </ul>
 <ul class="newslistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;资讯信息</li>
 <li class="l3">审核</li>
 <li class="l4">关注</li>
 <li class="l5">最后更新</li>
 <li class="l6">操作</li>
 </ul>
 <?
 pagef($ses,20,"fcw_news","order by lastsj desc");while($row=mysql_fetch_array($res)){
 $aurl="news.php?action=update&bh=".$row[bh];
 ?>
 <ul class="newslist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2"><a href="<?=$aurl?>"><?=returntitdian($row["tit"],78)?></a> <? if(!empty($row[iftj])){?><span class="red">[推荐]</span><? }?></li>
 <li class="l3"><?=returnztv($row[zt])?></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l5"><?=$row[lastsj]?></li>
 <li class="l6">
 <a href="<?=$aurl?>">修改</a><span></span>
 <a href="../m/txtlist_i<?=$row[id]?>v.html" target="_blank">预览</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="newslist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>