<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if(6!=$_SESSION[FCWuserID]){Audit_alert("�����·����Դ��","./");}
$ses=" where zjuid='".$_SESSION[FCWuser]."'";
if($_GET[st1]!=""){$ses=$ses." and (uname like '%".$_GET[st1]."%' or nc like '%".$_GET[st1]."%' or mot like '%".$_GET[st1]."%')";}
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
<script language="javascript">
function ser(){
location.href="userlist6.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �Ŷӳ�Ա</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",7,");?>
 <!--selB-->
 <ul class="psel">
 <li class="l1">��Ա������</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <!---selE-->

 <? include("rcap11.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>
 <div class="rts red">��Ҫ��ʾ��ɾ����Ա����ͬ��ɾ��������������Ϣ���Ҳ��ɻָ���������</div>
 <ul class="typecap">
 <li class="l1">��Ա��Ϣ</li>
 <li class="l4">װ��Ч��ͼ</li>
 <li class="l6">�Ǽ�ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(15,'fcw_user')" class="a2">ɾ��</a>
 <a href="user6.php" class="a1">��ӳ�Ա</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_user","order by sj desc");
 while($row=mysql_fetch_array($res)){
 $aurl="user6.php?action=update&id=".$row[id];
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l1">
 <a  href="<?=$aurl?>" class="a1"><strong><?=$row[uid]?></strong></a><br>
 ������<?=$row[nc]?> �绰��<?=$row[utel]?>
 </li>
 <li class="l4">
 <?=returncount("fcw_jia_photo where uid='".$row[uid]."' and zt<>99")?>ƪ<br>
 <?=returncount("fcw_tp where uid='".$row[uid]."' and type1='װ��Ч��ͼ'")?>ͼ
 </li>
 <li class="l6"><?=$row[sj]?></li>
 <li class="l5"><a href="<?=$aurl?>">�޸�</a></li>
 </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="userlist6.php";
 $nowwd="st1=".$_GET[st1];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>