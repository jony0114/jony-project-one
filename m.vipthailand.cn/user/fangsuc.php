<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$cz=$_GET[cz];
$bh=$_GET[bh];
$id=$_GET[id];
if($cz=="chushou"){
 $wz="房源出售编辑";
 $yl="second";
}elseif($cz=="chuzu"){
 $wz="房源出租编辑";
 $yl="rent";
}elseif($cz=="qiugou"){
 $wz="房源求购编辑";
 $yl="qiugou";
}elseif($cz=="qiuzu"){
 $wz="房源求租编辑";
 $yl="qiuzu";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > <?=$wz?></li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include($cz."cap.php");?>
 <script language="javascript">
 document.getElementById("step3").className="l1 l11";
 </script>
 <div class="czts">
 <strong class="feng">恭喜您，编辑成功！</strong><br>
 <a href="<?=$cz?>list.php">返回列表</a> | <a href="<?=$cz?>lx.php">发布新信息</a> | <a href="<?=$cz?>.php?bh=<?=$bh?>">返回编辑</a> | <a href="../<?=$yl?>/view<?=$id?>.html" target="_blank">预览刚发布的信息</a>
 </div>
</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>