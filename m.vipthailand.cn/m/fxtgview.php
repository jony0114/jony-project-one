<?
include("../config/conn.php");
include("../config/function.php");
$id=$_GET[id];
while0("*","fcw_fxtg where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("fxtglist.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title><?=$row[tit]?> - <?=webname?></title>
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

<div class="newscap box"><div class="d1"><?=$row[tit]?></div></div>

<div class="newstxt box">
<div class="main"><?=$row[txt]?></div>
</div>

<div class="newscap2 box" onclick="gourl('fxtglist.html')">
<div class="main">
 <div class="d1"><img src="img/b.png" height="25" /></div>
 <div class="d2">发现泰国</div>
 <div class="d3">阅读更多精彩内容</div>
</div>
</div>

<? include("template/bottom.php");?>
</div>
</body>
</html>