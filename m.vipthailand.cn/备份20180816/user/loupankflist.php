<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
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
<title>�û�������� - <?=webname?></title>
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ¥�̹���</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",9,");?>
 <? include("loupantop.php");?>
 <? include("rcap6.php");?>
 <script language="javascript">
 document.getElementById("rcap7").className="l1 l2";
 </script>
 <ul class="typecap">
 <li class="l1">�����Ż���� </li>
 <li class="l6">��ע</li>
 <li class="l4">�������</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(9,'fcw_kanfang')" class="a2">ɾ��</a>
 <a href="loupankflx.php?bh=<?=$bh?>" class="a1">����������</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_kanfang","order by sj desc");
 while($row=mysql_fetch_array($res)){
 $aurl="loupankf.php?action=update&bh=".$bh."&mybh=".$row[bh];
 $tp=returnnotp(returntp("bh='".$row[bh]."'"),"-1");
 ?>
 <ul class="listcap">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">�����£�<?=$row[sj]?></li>
 </ul>
 <ul class="typelist" onmouseover="this.className='typelist typelist11';" onmouseout="this.className='typelist';">
 <li class="l0"></li>
 <li class="l1">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../".$tp,"img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=$row["tit"]?></a><br><?=returnztv($row[zt],$row[ztsm])?>
 </li>
 <li class="l6"><?=$row[djl]?></li>
 <li class="l4">
 <strong><a href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$row[bh]?>"><? $bm1=returncount("fcw_kanfanguser where kfbh='".$row[bh]."'");echo $bm1;?></a></strong><br>
 <a class="blue" href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$row[bh]?>&zt=1">��֪ͨ<? $bm2=returncount("fcw_kanfanguser where kfbh='".$row[bh]."' and zt=1");echo $bm2;?></a>,
 <a class="red" href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$row[bh]?>&zt=0">δ֪ͨ<?=$bm1-$bm2?></a>
 </li>
 <li class="l5">
 <a href="<?=$aurl?>">�޸�</a><br>
 <a href="../loupan/tuanview<?=$row[id]?>.html" target="_blank">Ԥ��</a>
 </li>
 </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="loupankflist.php";
 $nowwd="bh=".$bh;
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>