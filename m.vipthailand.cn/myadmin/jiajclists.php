<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ty1id=$_GET[ty1id];
$ty1name=returnjcty(1,$ty1id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理后台</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/quanju.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=3;include("menu_quan.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="jiajctypelist.php">家居建材分组</a>
 </div>
 
 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="jiajctype2.php?ty1id=<?=$ty1id?>" class="a1">新增子类</a>
 <a href="javascript:void(0)" onclick="checkDEL(55,'fcw_jia_jctype')" class="a2">删除</a>
 </li>
 </ul>
 <ul class="qjlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">分类列表</li>
 <li class="l3">序号</li>
 <li class="l4">编辑时间</li>
 <li class="l5">操作</li>
 </ul>
 <?
 while1("*","fcw_jia_jctype where admin=2 and type1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="jiajctype2.php?ty1id=".$ty1id."&action=update&id=".$row1[id];
 ?>
 <ul class="qjlist1">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row1[id]?>xcf0" /></li>
 <li class="l2"><a href="<?=$nu?>"><?=$row1[type2]?></a></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5"><a href="jiajctype3.php?ty1id=<?=$ty1id?>&ty2id=<?=$row1[id]?>">添加孙类别</a><span></span><a href="<?=$nu?>">编辑</a></li>
 </ul>
 <?
 while2("*","fcw_jia_jctype where admin=3 and type1='".$row1[type1]."' and type2='".$row1[type2]."' order by xh asc");while($row2=mysql_fetch_array($res2)){
 $nu="jiajctype3.php?action=update&id=".$row2[id]."&ty1id=".$ty1id."&ty2id=".$row1[id]; 
 ?>
 <ul class="qjlist2">
 <li class="l1"><input name="C1" type="checkbox" value="0xcf<?=$row2[id]?>" /></li>
 <li class="l2">- <a href="<?=$nu?>"><?=$row2[type3]?></a></li>
 <li class="l3"><?=$row2[xh]?></li>
 <li class="l4"><?=$row2[sj]?></li>
 <li class="l5"><a href="<?=$nu?>">编辑</a></li>
 </ul>
 <? }}?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>