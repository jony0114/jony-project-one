<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where zt=0";
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�����̨</title>
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

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="shangquanlist.php">��Ȧ����</a>
 </div>
 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="shangquanlx.php" class="a1">������Ȧ</a>
 <a href="javascript:void(0)" onclick="checkDEL(73,'fcw_shangquan')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="qjlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">��Ȧ����</li>
 <li class="l3">��ע��</li>
 <li class="l4">����ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <?
 pagef($ses,20,"fcw_shangquan","order by sj desc");while($row=mysql_fetch_array($res)){
 $nu="shangquan.php?bh=".$row[bh];
 ?>
 <ul class="qjlist2">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2" onclick="gourl('<?=$nu?>')"><strong><?=$row[tit]?></strong> (<?=returnarea(1,$row[areaid])?>)</li>
 <li class="l3"><?=$row[djl]?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l5"><a href="<?=$nu?>">�༭</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="shangquanlist.php";
 $nowwd="";
 include("page.php");
 ?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>