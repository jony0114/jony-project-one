<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$ses=" where id>0";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[st1]!=""){$ses=$ses." and uid like '%".$_GET[st1]."%'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/user.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="txlist.php?st1="+document.getElementById("st1").value+"&zt="+document.getElementById("zt").value;	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu2").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=3;include("menu_user.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="txlist.php">���ֹ���</a>
 </div>

 <div class="rights">
 <strong>��ʾ��</strong><br>
 <span class="red">�ȴ���������������޷�ɾ������Ҫɾ�������Ƚ�����״̬��Ϊ�ǵȴ�����</span>
 </div>
 <!--B-->
 <ul class="psel">
 <li class="l1">��Ա�ʺţ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <select id="zt">
 <option value="">==����==</option>
 <option value="1"<? if(1==$_GET[zt]){?> selected="selected"<? }?>>���ֳɹ�</option>
 <option value="2"<? if(2==$_GET[zt]){?> selected="selected"<? }?>>�û���������</option>
 <option value="3"<? if(3==$_GET[zt]){?> selected="selected"<? }?>>����ʧ��</option>
 <option value="4"<? if(4==$_GET[zt]){?> selected="selected"<? }?>>�ȴ�����</option>
 </select>
 </li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:void(0)" onclick="checkDEL(53,'fcw_tixian')" class="a2">ɾ��</a>
 </li>
 </ul>
 <ul class="txlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">������Ϣ</li>
 <li class="l3">��������</li>
 <li class="l4">���ֽ��</li>
 <li class="l5">����ʱ��</li>
 <li class="l6">����</li>
 </ul>
 <?
 pagef($ses,20,"fcw_tixian","order by sj desc");while($row=mysql_fetch_array($res)){
 $au="tx.php?id=".$row[id];
 ?>
 <ul class="txlist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2" onclick="gourl('<?=$au?>')">&nbsp;<?=$row[uid]?> | <?=returntxzt($row[zt],$row[sm])?></li>
 <li class="l3"><?=$row[txyh]?></li>
 <li class="l4"><?=$row[money1]?></li>
 <li class="l5"><?=$row[sj]?></li>
 <li class="l6"><a href="<?=$au?>">�༭</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="txlist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>

<?php include("bottom.php");?>
</body>
</html>