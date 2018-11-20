<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$ses=" where zt<>99";
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
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu3").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0202,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=4;include("menu_news.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="fxtglist.php">发现泰国列表</a>
 </div>

 <!--B-->
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL('36c','fcw_fxtg')" class="a2">变更审核</a>
 <a href="javascript:void(0)" onclick="checkDEL('37c','fcw_fxtg')" class="a2">删除</a>
 <a href="fxtglx.php" class="a1">发布发现泰国</a>
 </li>
 </ul>
 <ul class="newslistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;标题</li>
 <li class="l3">审核</li>
 <li class="l4">关注</li>
 <li class="l5">最后更新</li>
 <li class="l6">操作</li>
 </ul>
 <?
 pagef($ses,20,"fcw_fxtg","order by lastsj desc");while($row=mysql_fetch_array($res)){
 $aurl="fxtg.php?action=update&bh=".$row[bh];
 ?>
 <ul class="newslist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2"><a href="<?=$aurl?>"><?=returntitdian($row["tit"],70)?></a></li>
 <li class="l3"><?=returnztv($row[zt])?></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l5"><?=$row[lastsj]?></li>
 <li class="l6">
 <a href="<?=$aurl?>">修改</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="fxtglist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>