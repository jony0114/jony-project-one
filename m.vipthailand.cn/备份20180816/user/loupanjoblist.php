<?
include("../config/conn.php");
include("../config/function.php");
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
 document.getElementById("rcap9").className="l1 l2";
 </script>
 <ul class="typecap">
 <li class="l1">��Ƹ��Ϣ</li>
 <li class="l4">��ע</li>
 <li class="l6">����ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(16,'fcw_loupanjob')" class="a2">ɾ��</a>
 <a href="loupanjoblx.php?bh=<?=$bh?>" class="a1">������Ƹ</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_loupanjob","order by sj desc");
 while($row=mysql_fetch_array($res)){
 $aurl="loupanjob.php?bh=".$bh."&mybh=".$row[bh];
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l1">
 <a href="<?=$aurl?>" class="a1"><?="<strong>".$row["tit"]."</strong> ����:".$row[dy]." ����:".$row[zprs]?></a><br>
 <?=returnztv($row[zt])?>
 </li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l6"><?=$row[sj]?></li>
 <li class="l5"><a href="<?=$aurl?>">�޸�</a> | Ԥ��</li>
 </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="loupanjoblist.php";
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