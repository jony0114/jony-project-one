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
location.href="zxlist.php?st1="+$("st1").value+"&zt="+$("zt").value;	
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
 <? $leftid=3;include("menu_jia.php");?>

<div class="right">

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">װ��֪ʶ</a>
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
 <a href="zxlx.php" class="a1">������Ϣ</a>
 <a href="javascript:void(0)" onclick="checkDEL(51,'fcw_jia_zx')" class="a2">������</a>
 <a href="javascript:void(0)" onclick="checkDEL(52,'fcw_jia_zx')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="jialcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">��װ֪ʶ��Ϣ</li>
 <li class="l3">���</li>
 <li class="l4">��ע</li>
 <li class="l5">������</li>
 <li class="l6">����</li>
 </ul>
 <?
 pagef($ses,20,"fcw_jia_zx","order by lastsj desc");while($row=mysql_fetch_array($res)){
 $aurl="zx.php?action=update&bh=".$row[bh];
 ?>
 <ul class="jial">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2"><a href="<?=$aurl?>"><?=$row["tit"]?></a></li>
 <li class="l3"><?=returnztv($row[zt])?></li>
 <li class="l4"><?=$row[djl]?></li>
 <li class="l5"><?=$row[lastsj]?></li>
 <li class="l6"><a href="<?=$aurl?>">�޸�</a><span></span><a href="#" target="_blank">Ԥ��</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="zxlist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>