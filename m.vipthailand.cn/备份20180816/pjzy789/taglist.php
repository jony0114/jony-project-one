<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where zt<>99";
if($_GET[admin]!=""){$admin=$_GET[admin];$ses=$ses." and admin=".$admin;}
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[st1]!=""){$ses=$ses." and name1 like '%".$_GET[st1]."%'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�����̨</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript">
function ser(){
location.href="taglist.php?st1="+$("st1").value+"&zt="+$("zt").value+"&admin="+$("d1").value;	
}
</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu5").className="l51";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_ad.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz"><li class="l1">��ǰλ�ã�<a href="./" class="a2">��̨��ҳ</a> - ��ǩ - <strong><?=returntagv($admin)?></strong></li><li class="l2"></li></ul>
 
 <!--begin-->
 <div class="listkuan">
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
 <li class="l1">��ǩ���ʣ�</li>
 <li class="l2">
 <select id="d1">
 <option value="">==����==</option>
 <? for($i=1;$i<=2;$i++){?>
 <option value="<?=$i?>"<? if($i==$admin){?> selected="selected"<? }?>><?=returntagv($i)?></option>
 <? }?>
 </select>
 </li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;��Ѷ��Ϣ</li>
 <li class="l15">���</li>
 <li class="l3">��ע</li>
 <li class="l4">������</li>
 <li class="l7">����</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="taglx.php?admin=<?=$admin?>" class="a1">������ǩ</a>
 <a href="javascript:void(0)" onclick="checkDEL(63,'fcw_tag')" class="a1">������</a>
 <a href="javascript:void(0)" onclick="checkDEL(62,'fcw_tag')" class="a2">ɾ��</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_tag","order by djl desc");while($row=mysql_fetch_array($res)){
 $nu="tag.php?id=".$row[id];
 ?>
 <ul class="typelist1" onmouseover="this.className='typelist1 typelist11';" onmouseout="this.className='typelist1';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2" onclick="gourl('<?=$nu?>')">&nbsp;[<?=returntagv($row[admin])?>] <?=returntitcss($row[name1],$row[ifjc],$row[titys])?></li>
 <li class="l15"><?=returnztv($row[zt])?></li>
 <li class="l3"><?=$row[djl]?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l7"><a href="<?=$nu?>">�༭</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="taglist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1]."&admin=".$admin;
 include("page.html");
 ?>
 </div>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>