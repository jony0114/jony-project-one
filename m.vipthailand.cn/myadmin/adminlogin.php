<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
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

<? if(!strstr($adminqx,",0,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=5;include("menu_quan.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="adminlogin.php">����Ա��־</a>
 </div>

 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(76,'yjcode_loginlog')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="qjlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">��¼ID</li>
 <li class="l3">����</li>
 <li class="l4">��¼ʱ��</li>
 <li class="l5">��¼IP</li>
 </ul>
 <?
 pagef(" where admin=2",20,"fcw_loginlog","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="qjlist2">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><?=$row[id]?></li>
 <li class="l3">��¼</li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l5"><a href="http://www.baidu.com/s?wd=<?=$row[uip]?>" target="_blank"><?=$row[uip]?></a></li>
 </ul>
 <? }?>
 <?
 $nowurl="adminlogin.php";
 $nowwd="";
 include("page.php");
 ?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>