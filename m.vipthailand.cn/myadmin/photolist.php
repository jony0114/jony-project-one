<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where zt<>99";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/jia.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="photolist.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu7").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0802,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_jia.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="photolist.php">��װЧ��ͼ</a>
 </div>

 <!--B-->
 <ul class="psel">
 <li class="l1">���⣺</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(48,'fcw_jia_photo')" class="a1">ɾ��</a>
 <a href="javascript:void(0)" onclick="checkDEL(46,'fcw_jia_photo')" class="a2">������</a>
 <a href="javascript:void(0)" onclick="checkDEL(47,'fcw_jia_photo')" class="a2">�ϼ�/�¼�</a>
 <a href="photolist.php?zt=1" class="a2">��Ҫ���</a>
 </li>
 </ul>
 <ul class="photolistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;Ч��ͼ��Ϣ</li>
 <li class="l3">Ԥ�����</li>
 <li class="l4">���</li>
 <li class="l5">��ע��</li>
 <li class="l6">����</li>
 </ul>
 <?
 pagef($ses,20,"fcw_jia_photo","order by lastsj desc");
 while($row=mysql_fetch_array($res)){
 if(0==$row[ifxj]){$xjv="<span class='blue'>�ϼ�</span>";}else{$xjv="<span class='red'>���¼�</span>";}
 $aurl="photo.php?bh=".$row[bh];
 ?>
 <ul class="photolist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../".returntp("bh='".$row[bh]."'","-1"),"img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><?=returntitdian($row["tit"],78)?></a>(<?=returncount("fcw_tp where bh='".$row[bh]."'")?>��)<br>
 <?=returnjiapty(1,$row[type1id])?><br>
 <?=$xjv." | ".returnztv($row[zt])?>
 <? if(!empty($row[vrurl])){?>| <span class="green">ȫ��</span><? }?>
 </li>
 <li class="l3"><strong class="feng"><?=returnjgdw($row[money1],"��")?></strong></li>
 <li class="l4"><?=returnjgdw($row[mj],"ƽ��","δ֪")?></li>
 <li class="l5"><strong><?=$row[djl]?></strong></li>
 <li class="l6">
 <a href="<?=$aurl?>">�޸�</a><span></span>
 <a href="../designer/photoview<?=$row[id]?>.html" target="_blank">Ԥ��</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="photolist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>