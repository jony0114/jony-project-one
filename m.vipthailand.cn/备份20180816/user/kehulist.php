<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sj=date("Y-m-d H:i:s");
$userid=returnuserid($_SESSION[FCWuser]);
$ses=" where (userid=".$userid." or zjuserid=".$userid.") and zt=0";
if($_GET[st1]!=""){$ses=$ses." and (kh like '%".$_GET[st1]."%' or mot='".$_GET[st1]."' or bh='".$_GET[st1]."')";}
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
<link href="css/oa.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="kehulist.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �ҵĿͻ���Ϣ</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="fcwcheckDEL(24,'yjcode_kehu')" class="a1">ɾ��</a>
 <a href="kehulx.php" class="a2">��ӿͻ�</a>
 </li>
 <li class="l3">
  <input type="button" onclick="ser()" value="��ѯ" class="btn" />
  <input type="text" id="st1" value="<?=$_GET[st1]?>" class="inp1" />
  <span class="s1">�ͻ���Ϣ��</span>
 </li>
 </ul>

 <ul class="kehulistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">��Դ���</li>
 <li class="l3">����</li>
 <li class="l4">ί����</li>
 <li class="l5">�ͻ�</li>
 <li class="l6">λ��</li>
 <li class="l7">¥��</li>
 <li class="l8">����</li>
 <li class="l9">���</li>
 <li class="l10">�۸�</li>
 <li class="l11">��;</li>
 <li class="l12">Ա��</li>
 <li class="l13">��˽</li>
 <li class="l14">������</li>
 </ul>

 <?
 pagef($ses,30,"fcw_kehu","order by id desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="kehulist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2"><a href="kehu.php?bh=<?=$row[bh]?>"><?=$row[bh]?></a></li>
 <li class="l3"><?=$row[jy]?></li>
 <li class="l4"><?=substr(dateYMD($row[wtsj]),2)?></li>
 <li class="l5"><?=$row[kh]?></li>
 <li class="l6"><?=returntitdian($row[fadd],30)?></li>
 <li class="l7"><?=$row[lc]?></li>
 <li class="l8"><font title="<?=$row[hx1]?>��<?=$row[hx2]?>��<?=$row[hx3]?>��<?=$row[hx4]?>��̨"><?=$row[hx1]?>/<?=$row[hx2]?>/<?=$row[hx3]?>/<?=$row[hx4]?></font></li>
 <li class="l9"><?=$row[mj1]."-".$row[mj2]?></li>
 <li class="l10"><?=$row[money1]."-".$row[money2]?></li>
 <li class="l11"><?=returnwylx(4,$row[yt])?></li>
 <li class="l12"><?=returnuname(returnuser($row[userid]))?></li>
 <li class="l13"><? if($row[admin]==1){echo "<span class='green'>˽��</span>";}else{echo "<span class='feng'>����</span>";}?></li>
 <li class="l14"><? while1("*","fcw_kehugj where khbh='".$row[bh]."' and zt=0 order by sj desc");if($row1=mysql_fetch_array($res1)){echo dateYMD($row1[sj]);}?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="kclist.php";
 $nowwd="&st1=".$_GET[st1];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>