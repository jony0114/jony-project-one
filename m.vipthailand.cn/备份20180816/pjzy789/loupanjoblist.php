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
 <script language="javascript">document.getElementById("rtit9").className="a1";</script>

 <!--B-->
 <ul class="ksedi">
 <li class="l2">
 <a href="loupanjoblx.php?bh=<?=$bh?>" class="a1">发布招聘</a>
 <a href="javascript:void(0)" onclick="checkDEL(41,'fcw_loupanjob')" class="a2">变更审核</a>
 <a href="javascript:void(0)" onclick="checkDEL(42,'fcw_loupanjob')" class="a2">删除</a>
 </li>
 </ul>
 <ul class="lplcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">招聘信息</li>
 <li class="l3">审核</li>
 <li class="l4">关注</li>
 <li class="l5">时间</li>
 <li class="l6">操作</li>
 </ul>
 <?
 pagef($ses,20,"fcw_loupanjob","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="loupanjob.php?bh=".$bh."&mybh=".$row[bh];
 $userid=returnuserid($row[uid]);
 ?>
 <ul class="lpl">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><a href="<?=$aurl?>"><?="<strong>".$row["tit"]."</strong> 待遇:".$row[dy]." 人数:".$row[zprs]?></a></li>
 <li class="l3"><?=returnztv($row[zt])?></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><a href="<?=$aurl?>">修改</a><span></span><a href="#" target="_blank">预览</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="loupanjoblist.php";
 $nowwd="bh=".$bh;
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>