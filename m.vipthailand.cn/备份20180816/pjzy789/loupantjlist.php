<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
$ses=" where zt<>99";
if(!empty($bh)){$ses=$ses." and xqbh='".$bh."'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
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

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0402,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_loupan.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","loupantjlist.php?bh=".$bh);}?>

 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit10").className="a1";</script>

 <!--B-->
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:checkDEL(66,'fcw_tejia')" class="a1">������</a>
 <a href="javascript:checkDEL(65,'fcw_tejia')" class="a2">ɾ��</a>
 <? if(!empty($bh)){?><a href="loupantjlx.php?bh=<?=$bh?>" class="a2">������Դ</a><? }?>
 </li>
 </ul>
 <ul class="xqphotocap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">�ؼ۷�Դ��Ϣ</li>
 <li class="l3">���״̬</li>
 <li class="l4">���</li>
 <li class="l5">����</li>
 <li class="l6">����</li>
 </ul>
 <?
 pagef($ses,20,"fcw_tejia","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="loupantj.php?action=update&bh=".$row[xqbh]."&mybh=".$row[bh];
 $userid=returnuserid($row[uid]);
 ?>
 <ul class="xqphotolist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../".returntp("bh='".$row[bh]."'"),"img/none60x60.gif")?>" width="60" height="60" align="left" /></a><a href="<?=$aurl?>" class="a1"><?=$row["fh"]?></a> <br>ԭ�ۣ�<?=$row[yj]?>Ԫ/ƽ�� ԭ�ܼۣ�<strong><?=$row[zj]?></strong>��Ԫ<br>�ؼۣ�<?=$row[tj]?>Ԫ/ƽ�� �ؼ��ܼۣ�<strong><?=$row[zj1]?></strong>��Ԫ
 </li>
 <li class="l3"><strong class="feng"><?=returnztv($row[zt])?></strong></li>
 <li class="l4">��Ȩ:<?=$row[mj]?>�O<br>����:<?=$row[mj1]?>�O</li>
 <li class="l5"><?=$row[hx1]?>��<?=$row[hx2]?>��<?=$row[hx3]?>��<?=$row[hx4]?>��<?=$row[hx5]?>��̨</li>
 <li class="l6"><a href="<?=$aurl?>" class="a1">�޸�</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="loupantjlist.php";
 $nowwd="bh=".$bh;
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>