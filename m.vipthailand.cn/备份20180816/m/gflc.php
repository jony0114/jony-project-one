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
<title>��������</title>
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

<div class="hftp box"><div class="d1"><img src="img/gflc.gif" /></div></div>

<div class="gflc box">
<div class="main">
 <div class="d1">��������</div>
 <?
 $str=str_replace("<p>","",returnonecontrol(6));
 $a=preg_split("/<\/p>/",$str);
 for($i=0;$i<=count($a);$i++){
 if(!empty($a[$i]) && $a[$i]!="<br/>"){
 if($i % 2==0){$z=2;}else{$z=3;}
 ?>
 <div class="d<?=$z?>"><?=$a[$i]?></div>
 <div class="d<?=$z?>1"><img src="img/lc<?=$z-1?>.png" /></div>
 <? }}?>
</div>
</div>

<div class="gflc1 box">
<div class="main">

 <div class="d1">�����׶�</div>
 <div class="d2"><?=returnonecontrol(7)?></div>

 <div class="d1">���н׶�</div>
 <div class="d2"><?=returnonecontrol(8)?></div>

 <div class="d1">���۽׶�</div>
 <div class="d2"><?=returnonecontrol(9)?></div>
 
</div>
</div>

<div class="gflc2 box">
<div class="d1">* �������˽�̩�������������ˣ�VIP THAILANDΪͶ�������ṩ̩����������Ҫ�˽�Ĺ���֪ʶ ��������������ʱ�������ǵ�רҵ���۹��ʡ�</div>
</div>

<? include("template/bottom.php");?>
</div>
</body>
</html>