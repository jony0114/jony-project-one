<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("权限受限！","./");}
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);

$ses=" where uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."' and zt<>99";
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 楼盘管理</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",9,");?>
 <? include("loupantop.php");?>
 <? include("rcap6.php");?>
 <script language="javascript">
 document.getElementById("rcap5").className="l1 l2";
 </script>
 <ul class="typecap">
 <li class="l1">标题</li>
 <li class="l4">关注</li>
 <li class="l6">更新时间</li>
 <li class="l5">操作</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> 全选</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(6,'fcw_xqnews')" class="a2">删除</a>
 <a href="loupannewslx.php?bh=<?=$bh?>" class="a1">发布动态</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_xqnews","order by sj desc");
 while($row=mysql_fetch_array($res)){
 $aurl="loupannews.php?action=update&bh=".$bh."&mybh=".$row[bh];
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l1">
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=returntitcss(returntitdian($row["tit"],78),$row[ifjc],$row[titys])?></a><br>
 <?=returnztv($row[zt])?>
 </li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l6"><?=$row[sj]?></li>
 <li class="l5"><a href="<?=$aurl?>">修改</a> | 预览</li>
 </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="loupannewslist.php";
 $nowwd="zt=".$_GET[zt]."&bh=".$bh;
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>