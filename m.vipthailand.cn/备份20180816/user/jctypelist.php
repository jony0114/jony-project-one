<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(3!=$_SESSION[FCWuserID]){Audit_alert("�����·����Դ��","inf3.php");}

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
<script language="javascript" src="js/index.js"></script></head>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��������</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",10,");?>
 <? include("rcap13.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","jctypelist.php")?>
 <ul class="typecap">
 <li class="l1">����</li>
 <li class="l4">������</li>
 <li class="l6">�༭ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(19,'fcw_jia_myjctype')" class="a2">ɾ��</a>
 <a href="jctype1.php" class="a1">��������</a>
 </li>
 </ul>
 <?
 while0("*","fcw_jia_myjctype where admin=1 and uid='".$_SESSION[FCWuser]."' order by xh asc");while($row=mysql_fetch_array($res)){
 $aurl="jctype1.php?action=update&id=".$row[id];
 ?>
 <ul class="typelist3 typelist32">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>xcf0" /></li>
 <li class="l1"><a href="<?=$aurl?>"><strong><?=$row[type1]?></strong></a></li>
 <li class="l4"><?=returncount("fcw_jia_jc where mytype1id=".$row[id]." and uid='".$_SESSION[FCWuser]."'")?></li>
 <li class="l6"><?=$row[sj]?></li>
 <li class="l5"><a href="<?=$aurl?>">�޸�</a> | <a href="jctype2.php?ty1id=<?=$row[id]?>">����</a></li>
 </ul>
 <?
 while1("*","fcw_jia_myjctype where admin=2 and type1='".$row[type1]."' and uid='".$_SESSION[FCWuser]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
 $aurl="jctype2.php?action=update&ty1id=".$row[id]."&myid=".$row1[id];
 ?>
 <ul class="typelist3" onmouseover="this.className='typelist3 typelist31';" onmouseout="this.className='typelist3';">
 <li class="l0"><input name="C1" type="checkbox" value="xcf<?=$row1[id]?>" /></li>
 <li class="l1">&nbsp;&nbsp;&nbsp;<a href="<?=$aurl?>"><?=$row1[type2]?></a></li>
 <li class="l4"><?=returncount("fcw_jia_jc where mytype1id=".$row[id]." and mytype2id=".$row1[id]." and uid='".$_SESSION[FCWuser]."'")?></li>
 <li class="l6"><?=$row1[sj]?></li>
 <li class="l5"><a href="<?=$aurl?>">�޸�</a></li>
 </ul>
 <?
  }
 }
 ?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>