<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
$bh=$_GET[bh];
$kfbh=$_GET[kfbh];
$userid=returnuserid($_SESSION[FCWuser]);

$ses=" where uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."' and kfbh='".$_GET[kfbh]."'";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
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
 $("rcap7").className="l1 l2";
 </script>
 
 <? include("loupankfcap.php");?>
 
 <ul class="typecap">
 <li class="l1">�����û����</li>
 <li class="l4">�Ƿ���֪ͨ</li>
 <li class="l6">����ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(11,'fcw_kanfanguser')" class="a2">ɾ��</a>
 <a href="loupankfuser.php?bh=<?=$bh?>&kfbh=<?=$kfbh?>" class="a1">����������</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(10,'fcw_kanfanguser')" class="a1">��/δ֪ͨ</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_kanfanguser","order by sj desc");
 while($row=mysql_fetch_array($res)){
 $aurl="loupankfuser.php?action=update&bh=".$bh."&kfbh=".$kfbh."&id=".$row[id];
 if(0==$row[zt]){$tz="<span class='red'>δ֪ͨ</span>";}else{$tz="<span class='blue'>�Ѿ�֪ͨ</span>";}
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l1">
 <a href="<?=$aurl?>"><strong><?=$row[uname]?></strong></a><br>
 �ֻ�:<?=$row[mot]?>
 </li>
 <li class="l4"><?=$tz?></li>
 <li class="l6"><?=$row[sj]?></li>
 <li class="l5"><a href="<?=$aurl?>">�޸�</a></li>
 </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="loupankfuserlist.php";
 $nowwd="bh=".$bh."&kfbh=".$kfbh."&zt=".$_GET[zt];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>