<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(3!=$_SESSION[FCWuserID]){Audit_alert("�����·����Դ��","./");}
$ses=" where zt<>99 and uid='".$_SESSION[FCWuser]."'";
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �����б�</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",10,");?>
 <? include("rcap13.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","jclist.php")?>
 <ul class="typecap">
 <li class="l1">������Ϣ</li>
 <li class="l2">�ۼ�</li>
 <li class="l3">��ע</li>
 <li class="l4">�ƹ�״̬</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(1,'fcw_jia_jc')" class="a1">�����Ƽ�</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(2,'fcw_jia_jc')" class="a1">ȡ���Ƽ�</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(20,'fcw_jia_jc')" class="a2">ɾ��</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(3,'fcw_jia_jc')" class="a1">�ϼ�/�¼�</a>
 </li>
 <li class="l3"></li>
 </ul>
 <?
 pagef($ses,20,"fcw_jia_jc","order by lastsj desc");
 while($row=mysql_fetch_array($res)){
 if(0==$row[ifxj]){$xjv="<span class='blue'>�ϼ�</span>";}else{$xjv="<span class='red'>���¼�</span>";}
 $aurl="jc.php?bh=".$row[bh];
 ?>
 <ul class="listcap">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">�����£�<?=$row[sj]?></li>
 </ul>
 <ul class="typelist" onmouseover="this.className='typelist typelist11';" onmouseout="this.className='typelist';">
 <li class="l0"><? if(1==$row[mytj]){?>��<br>��<br>��<? }?></li>
 <li class="l1">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../".returntp("bh='".$row[bh]."'","-1"),"img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=returntitdian($row["tit"],78)?></a><br>
 <?=returnjcmyty(1,$row[mytype1id])." ".returnjcmyty(2,$row[mytype2id])?><br>
 <?=$xjv." | ".returnztv($row[zt],$row[ztsm])?>
 </li>
 <li class="l2"><strong class="feng"><?=returnjgdw($row[money1],"Ԫ","������ѯ")?></strong></li>
 <li class="l3"><?=$row[djl]?></li>
 <li class="l4 hui"></li>
 <li class="l5">
 <a href="<?=$aurl?>">�޸�</a><br>
 <a href="../jc/pview<?=$row[id]?>.html" target="_blank">Ԥ��</a>
 </li>
 </ul>
 <? }?>
 <div class="npa">
 <?
 $nowurl="jclist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>