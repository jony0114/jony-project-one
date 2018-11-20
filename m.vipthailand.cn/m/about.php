<?
include("../config/conn.php");
include("../config/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title>关于我们</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div class="yjcode">
<? include("template/top.php");?>

<div class="hftp box"><div class="d1"><? adwhile("MT02",1)?></div></div>

<div class="ncap box"><div class="d1">公司简介</div></div>
<div class="ntxt box">
<div class="d1"><div id="main1" class="main1"><?=returnonecontrol(1)?></div></div>
</div>
<div class="readmore box" id="main1more" onclick="readmore('main1','')"><div class="d1">阅读全文<br><img src="img/jianmore.png" width="16" /></div></div>

<div class="ncap ncap1 box"><div class="d1">发展历程</div></div>
<div class="ntxt1 box"><div class="d1"><?=returnonecontrol(2)?></div></div>

<div class="ncap ncap1 box"><div class="d1">公司愿景</div></div>
<div class="ntxt box">
<div class="d1">
<?=returnonecontrol(3)?>
</div>
</div>

<div class="ncap ncap1 box"><div class="d1">Mercury Hotel品牌发展</div></div>
<div class="ntxt box">
<div class="d1">
<div id="main2" class="main2">
<?=returnonecontrol(4)?>
</div>
</div>
</div>
<div class="readmore box" id="main2more" onclick="readmore('main2','')"><div class="d1">阅读全文<br><img src="img/jianmore.png" width="16" /></div></div>

<div class="dmenu box">
<div class="d1" onclick="gourl('tzznlist_j56v.html')">最新动态</div>
<div class="d2" onclick="lxwmopen()">联系我们</div>
</div>

<? include("template/bottom.php");?>
</div>
</body>
</html>