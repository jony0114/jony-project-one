<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$ses=" where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and zt<>99";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
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
location.href="photolist.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > װ��Ч��ͼ</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",1,");?>
 <!--selB-->
 <ul class="psel">
 <li class="l1">���⣺</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <!---selE-->

 <? include("rcap10.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>
 <ul class="typecap">
 <li class="l1">Ч��ͼ��Ϣ</li>
 <li class="l2">���</li>
 <li class="l3">��ע</li>
 <li class="l4">���״̬</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(17,'fcw_jia_photo')" class="a2">ɾ��</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(3,'fcw_jia_photo')" class="a1">�ϼ�/�¼�</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_jia_photo","order by lastsj desc");
 while($row=mysql_fetch_array($res)){
 if(0==$row[ifxj]){$xjv="<span class='blue'>�ϼ�</span>";}else{$xjv="<span class='red'>���¼�</span>";}
 $aurl="photo.php?bh=".$row[bh];
 ?>
 <ul class="listcap">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">�����£�<?=$row[lastsj]?></li>
 </ul>
  <ul class="typelist" onmouseover="this.className='typelist typelist11';" onmouseout="this.className='typelist';">
  <li class="l0"></li>
  <li class="l1">
  <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../".returntp("bh='".$row[bh]."' order by iffm desc","-1"),"img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
  <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=returntitdian($row["tit"],78)?></a>(<?=returncount("fcw_tp where bh='".$row[bh]."'")?>��)<br>
  <?=returnjiapty(1,$row[type1id])?><br><?=$xjv?><? if(!empty($row[vrurl])){?>| <span class="green">ȫ��</span><? }?>
  </li>
  <li class="l2"><strong class="feng"><?=returnjgdw($row[mj],"�O","δ֪")?></strong></li>
  <li class="l3"><?=$row[djl]?></li>
  <li class="l4 red"><?=returnztv($row[zt])?></li>
  <li class="l5">
  <a href="<?=$aurl?>">�޸�</a><br>
  <a href="../designer/photoview<?=$row[id]?>.html" target="_blank">Ԥ��</a>
  </li>
  </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="photolist.php";
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