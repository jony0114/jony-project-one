<?php
set_time_limit(0);
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where admin=1 and zt<>99";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[st1]!=""){$ses=$ses." and xq like '%".$_GET[st1]."%'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/loupan.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="xqlist.php?st1="+document.getElementById("st1").value+"&zt="+document.getElementById("zt").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0502,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_loupan.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="xqlist.php">С������</a>
 </div>
 <!--B-->
 <ul class="psel">
 <li class="l1">�ؼ��ʣ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <select id="zt">
 <option value="">==����==</option>
 <option value="0"<? if("0"==$_GET[zt]){?> selected="selected"<? }?>>ͨ�����</option>
 <option value="1"<? if("1"==$_GET[zt]){?> selected="selected"<? }?>>�������</option>
 <option value="2"<? if("2"==$_GET[zt]){?> selected="selected"<? }?>>��˱���</option>
 </select>
 </li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(34,'fcw_xq')" class="a1">ɾ��</a>
 <a href="javascript:void(0)" onclick="checkDEL(19,'fcw_xq')" class="a2">������</a>
 <a href="javascript:void(0)" onclick="checkDEL(35,'fcw_xq')" class="a2">תΪ¥��</a>
 </li>
 </ul>
 <ul class="loupanlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">¥����Ϣ</li>
 <li class="l3">����</li>
 <li class="l4">��ע��</li>
 <li class="l5">���״̬</li>
 <li class="l6">����</li>
 </ul>
 <?
 pagef($ses,20,"fcw_xq","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="xqinf.php?bh=".$row[bh];
 $userid=returnuserid($row[uid]);
 ?>
 <ul class="loupanlist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../upload/".$userid."/f/".$row[bh]."/home.jpg","img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
 <a href="<?=$aurl?>" class="a1"><?=$row["xq"]?></a>
 <br>
 <?=returnarea(1,$row[areaid])." ".returnarea(2,$row[areaids])." ".$row[xqadd]?>
 </li>
 <li class="l3"><strong class="feng"><?=returnjgdw($row[money1],"Ԫ","����")?></strong></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l5"><?=returnztv($row[zt],$row[ztsm])?></li>
 <li class="l6">
 <a href="<?=$aurl?>" class="a1">�޸�</a><span></span>
 <a href="../xq/view<?=$row[id]?>.html" target="_blank" class="a1">Ԥ��</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="xqlist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>