<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$ses=" where uid='".$_SESSION[FCWuser]."'";
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �ҵ�ԤԼ�ͻ�����</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <ul class="typecap">
 <li class="l1">ԤԼ��Դ</li>
 <li class="l4">��ϵ�绰</li>
 <li class="l6">ԤԼʱ��</li>
 <li class="l5">��Դ����</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(21,'fcw_yuyue')" class="a2">ɾ��</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_yuyue","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("id,bh,type1","fcw_fang where bh='".$row[fangbh]."' and type1='".$row[ty]."'");if($row1=mysql_fetch_array($res1)){
  if($row1[type1]=="����"){$au="../second/view".$row1[id].".html";}elseif($row1[type1]=="����"){$au="../rent/view".$row1[id].".html";}
 }
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l1"><a href="<?=$au?>" target="_blank"><?=$row[txt]?></a></li>
 <li class="l4"><strong class="blue"><?=$row[mot]?></strong></li>
 <li class="l6"><?=$row[sj]?></li>
 <li class="l5"><?=$row[ty]?></li>
 </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="yuyuelist.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>