<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$cz=$_GET[cz];
$bh=$_GET[bh];
$id=$_GET[id];
if($cz=="chushou"){
 $wz="��Դ���۱༭";
 $yl="second";
}elseif($cz=="chuzu"){
 $wz="��Դ����༭";
 $yl="rent";
}elseif($cz=="qiugou"){
 $wz="��Դ�󹺱༭";
 $yl="qiugou";
}elseif($cz=="qiuzu"){
 $wz="��Դ����༭";
 $yl="qiuzu";
}
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > <?=$wz?></li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include($cz."cap.php");?>
 <script language="javascript">
 document.getElementById("step3").className="l1 l11";
 </script>
 <div class="czts">
 <strong class="feng">��ϲ�����༭�ɹ���</strong><br>
 <a href="<?=$cz?>list.php">�����б�</a> | <a href="<?=$cz?>lx.php">��������Ϣ</a> | <a href="<?=$cz?>.php?bh=<?=$bh?>">���ر༭</a> | <a href="../<?=$yl?>/view<?=$id?>.html" target="_blank">Ԥ���շ�������Ϣ</a>
 </div>
</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>