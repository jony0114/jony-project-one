<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);

$ses=" where uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'";
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
 document.getElementById("rcap3").className="l1 l2";
 </script>
 <ul class="typecap">
 <li class="l1">������Ϣ</li>
 <li class="l2">�ۼ�</li>
 <li class="l3">���</li>
 <li class="l4">��ע</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(5,'fcw_huxing')" class="a2">ɾ��</a>
 <a href="loupanhxlx.php?bh=<?=$bh?>" class="a1">��������</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_huxing","order by sj desc");
 while($row=mysql_fetch_array($res)){
 $aurl="loupanhx.php?action=update&bh=".$bh."&mybh=".$row[bh];
 $tp="../upload/".$userid."/f/".$row[xqbh]."/".$row[bh].".jpg";
 ?>
 <ul class="listcap">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">�����£�<?=$row[sj]?></li>
 </ul>
  <ul class="typelist" onmouseover="this.className='typelist typelist11';" onmouseout="this.className='typelist';">
  <li class="l0"></li>
  <li class="l1">
  <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd($tp,"img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
  <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=$row["tit"]?></a> ����<?=returnfwcx($row[cx])?><br><?=returnztv($row[zt],$row[ztsm])?>
  </li>
  <li class="l2"><strong class="feng"><?=returnjgdw($row[money1],"��","����")?></strong></li>
  <li class="l3"><?=returnjgdw($row[mj],"ƽ��","����")?></li>
  <li class="l4"><?=$row[djl]?></li>
  <li class="l5">
  <a href="<?=$aurl?>">�޸�</a><br>
  <a href="../loupan/huxingview<?=$row[id]?>.html" target="_blank">Ԥ��</a>
  </li>
  </ul>
 <?
 }
 ?>

 <div class="npa">
 <?
 $nowurl="loupanhxlist.php";
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