<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �ʽ��¼</li>
</ul>
<? include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>

 <ul class="typecap">
 <li class="l1">˵��</li>
 <li class="l4">���</li>
 <li class="l4">��֧</li>
 <li class="l4">ʱ��</li>
 </ul>
   
 <?
 $ses=" where uid='".$_SESSION[FCWuser]."'";
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"fcw_moneyrecord","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1">&nbsp;&nbsp;&nbsp;<?=$row[tit]?></li>
 <li class="l0"></li>
 <li class="l4"><?=$row[moneynum]?></li>
 <li class="l4"><? if($row[moneynum]>0){?><span class="blue">����</span><? }else{?><span class="red">֧��</span><? }?></li>
 <li class="l4"><?=$row[sj]?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="paylog.php";
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