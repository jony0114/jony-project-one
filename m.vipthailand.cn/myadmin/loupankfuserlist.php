<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$bh=$_GET[bh];
$kfbh=$_GET[kfbh];
$zt=$_GET[zt];

$ses=" where id>0";
if($bh!=""){$ses=$ses." and xqbh='".$bh."'";}
if($kfbh!=""){$ses=$ses." and kfbh='".$kfbh."'";}
if($zt!=""){$ses=$ses." and zt=".$zt;}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($page);}
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
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0402,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_loupan.php");?>

<div class="right">
 <? if(!empty($bh)){include("rightcap2.php");}?>
 <script language="javascript">document.getElementById("rtit7").className="a1";</script>

 <!--B-->
 <? if(!empty($bh) && !empty($kfbh)){include("loupankfcap.php");}?>
 <ul class="ksedi">
 <li class="l2">
 <? if(!empty($bh) && !empty($kfbh)){?><a href="loupankfuser.php?bh=<?=$bh?>&kfbh=<?=$kfbh?>" class="a1">����������</a><? }?>
 <a href="javascript:void(0)" onclick="checkDEL(30,'fcw_kanfanguser')" class="a2">���֪ͨ</a>
 <a href="javascript:void(0)" onclick="checkDEL(31,'fcw_kanfanguser')" class="a2">ɾ��</a>
 <a href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$kfbh?>&zt=1" class="a2">�Ѿ�֪ͨ</a>
 <a href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$kfbh?>&zt=0" class="a2">û��֪ͨ</a>
 </li>
 </ul>
 <ul class="lplcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l3">�����û����</li>
 <li class="l2">��ϵ��ʽ</li>
 <li class="l4">�Ƿ��Ѿ�֪ͨ</li>
 <li class="l5">����ʱ��</li>
 <li class="l6">����</li>
 </ul>
 <?
 pagef($ses,20,"fcw_kanfanguser","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="loupankfuser.php?action=update&bh=".$row[xqbh]."&kfbh=".$row[kfbh]."&id=".$row[id];
 if(0==$row[zt]){$tz="<span class='red'>δ֪ͨ</span>";}else{$tz="<span class='blue'>�Ѿ�֪ͨ</span>";}
 $userid=returnuserid($row[uid]);
 ?>
 <ul class="lpl">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l3"><?=$row[uname]?></li>
 <li class="l2"><a href="<?=$aurl?>">�ֻ�:<?=$row[mot]?> (<?=returnxq($row[xqbh],"bh")?>)</a></li>
 <li class="l4"><?=$tz?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><a href="<?=$aurl?>">�޸�</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="loupankfuserlist.php";
 $nowwd="bh=".$bh."&kfbh=".$kfbh."&zt=".$zt;
 require("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>