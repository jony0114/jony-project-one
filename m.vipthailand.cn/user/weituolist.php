<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$ses=" where zt=0";
if($_GET[ty]=="cs"){$ses=$ses." and type1='����'";}
elseif($_GET[ty]=="cz"){$ses=$ses." and type1='����'";}

$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."' and (usertype=1 or usertype=2)";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){Audit_alert("�����н�򾭼��˲ű���Ȩ�鿴ί����Ϣ��","./");}
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Դί�в鿴</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0"></li>
 <li class="l1<? if($_GET[ty]==""){?> l2<? }?>" id="rcap1"><a href="weituolist.php">����ί��</a></li>
 <li class="l1<? if($_GET[ty]=="cs"){?> l2<? }?>" id="rcap2"><a href="weituolist.php?ty=cs">����ί��</a></li>
 <li class="l1<? if($_GET[ty]=="cz"){?> l2<? }?>" id="rcap3"><a href="weituolist.php?ty=cz">����ί��</a></li>
 </ul>
 
 <? if(1==$rowuser[ifmot] && 1==$rowuser[ifemail]){?>
 
 <div class="rts red">��Ҫ��ʾ�������ͻ����ί��Э���ˣ������ѿͻ�ɾ����ί����Ϣ</div>
 <ul class="weituocap">
 <li class="l1">������Ϣ</li>
 <li class="l2">����</li>
 <li class="l3">��ҵ</li>
 <li class="l4">ί��ʱ��</li>
 </ul>
 <? pagef($ses,20,"fcw_weituo","order by sj desc");while($row=mysql_fetch_array($res)){?>
 <ul class="weituolist" onmouseover="this.className='weituolist weituolist1';" onmouseout="this.className='weituolist';">
 <li class="l1">
 <strong><?=$row[lxr]?></strong> (�绰:<?=$row[mot]?>)<br>
 <?=$row[add1]?>,�۸�:<?=$row[money1].$row[jgdw]?>,<?=$row[mj]?>ƽ��
 </li>
 <li class="l2"><?=$row[type1]?></li>
 <li class="l3"><?=returnwylx(4,$row[wylx])?></li>
 <li class="l4"><?=$row[sj]?></li>
 </ul>
 <? }?>
 
 <div class="npa">
 <?
 $nowurl="weituolist.php";
 $nowwd="ty=".$_GET[ty];
 require("page.html");
 ?>
 </div>
 
 <? }else{?>
 <div class="rts red">��Ȩ��ʾ������ͨ��<a href="mobbd.php">�ֻ���֤</a>��<a href="emailbd.php">�����</a>������֤���ɲ鿴ί�з�Դ��Ϣ</div>

 <? }?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>