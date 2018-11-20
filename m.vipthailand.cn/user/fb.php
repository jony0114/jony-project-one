<?
include("../config/conn.php");
include("../config/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>发布信息 - <?=webname?></title>
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
 <li class="l1">您的位置：<a href="../" class="acy">首页</a> > <strong class="red">发布信息</strong></li>
 </ul>
 
 <div class="fball">
  <ul class="u1">
  <li class="l1"><a href="fb.php" class="feng">免费发布信息</a><br>50%的房源 通过本站发布 在一周内成交</li>
  <li class="l2"><a href="../weituo/" class="blue">委托发布</a><br>如果没时间带客户看房，建议采用该种方式</li>
  </ul>
  <ul class="u2">
  <li class="l1"><a class="a1" href="mianzhuce.php?control=chushou">发布出售</a></li>
  <li class="l2"><a class="a2" href="mianzhuce.php?control=chuzu">发布出租</a></li>
  <li class="l3"><a class="a3" href="mianzhuce.php?control=qiugou">发布求购</a></li>
  <li class="l4"><a class="a4" href="mianzhuce.php?control=qiuzu">发布求租</a></li>
  </ul>
 </div>
 
</div>

<? include("../template/bottom.html");?>
</body>
</html>