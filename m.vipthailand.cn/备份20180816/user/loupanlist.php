<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if(5!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
$userid=returnuserid($_SESSION[FCWuser]);

$ses=" where uid='".$_SESSION[FCWuser]."' and admin=2 and zt<>99";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[sd1]!=""){$ses=$ses." and wylx='".$_GET[sd1]."'";}
if($_GET[st1]!=""){$ses=$ses." and xq like '%".$_GET[st1]."%'";}
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
location.href="loupanlist.php?st1="+document.getElementById("st1").value+"&sd1="+document.getElementById("sd1").value;	
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ¥���б�</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",9,");?>
 <!--selB-->
 <ul class="psel">
 <li class="l1">¥�����ƣ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">��ҵ���ͣ�</li>
 <li class="l2">
 <select id="sd1">
 <option value="">==����==</option>
 <? $xs="loupan";while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[name1]?>"<? if(strstr($_GET[sd1],$row1[name1])!=""){?> selected="selected"<? }?>><?=$row1[name2]?></option>
 <? }?>
 </select>
 </li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <!---selE-->

 <? include("rcap7.php");?>
 <script language="javascript">
 document.getElementById("rcap<?=$_GET[zt]?>").className="l1 l2";
 </script>
 <ul class="typecap">
 <li class="l1">¥����Ϣ</li>
 <li class="l2">����</li>
 <li class="l3">��ע</li>
 <li class="l4">���״̬</li>
 <li class="l5">����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(14,'fcw_xq')" class="a2">ɾ��</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(3,'fcw_xq')" class="a1">�ϼ�/�¼�</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_xq","order by sj desc");
 while($row=mysql_fetch_array($res)){
 if(1==$row[ifxj]){$xjv="<span class='red'>��<br>��<br>��</span>";}
 $aurl="loupaninf.php?bh=".$row[bh];
 ?>
 <ul class="listcap">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">�����£�<?=$row[sj]?></li>
 </ul>
  <ul class="typelist" onmouseover="this.className='typelist typelist11';" onmouseout="this.className='typelist';">
  <li class="l0"><?=$xjv?></li>
  <li class="l1">
  <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../upload/".$userid."/f/".$row[bh]."/home.jpg","img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
  <a href="<?=$aurl?>" class="a1"><?=$row["xq"]?></a>
  <? if(1==$row[iffx]){?> | <span class="red">����</span><? }?>
  <br>
  <?=returnarea(1,$row[areaid])." ".returnarea(2,$row[areaids])." ".$row[xqadd]?><br><?=$row[sltel]?>
  </li>
  <li class="l2"><strong class="feng"><?=returnjgdw($row[money1],"Ԫ","����")?></strong></li>
  <li class="l3"><?=$row[djl]?></li>
  <li class="l4"><?=returnztv($row[zt],$row[ztsm])?></li>
  <li class="l5">
  <a href="<?=$aurl?>">�޸�</a><br>
  <a href="../loupan/view<?=$row[id]?>.html" target="_blank">Ԥ��</a>
  </li>
  </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="loupanlist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1]."&sd1=".$_GET[sd1];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>