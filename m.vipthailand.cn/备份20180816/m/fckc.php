<?
include("../config/conn.php");
include("../config/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
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

<? 
while1("*","fcw_fckc where zt=0 order by lastsj desc");while($row1=mysql_fetch_array($res1)){
$a=preg_split("/��/",$row1[tit]);
if(count($a)>1){
$t1=$a[0];
$t2="��".$a[1];
}else{$t1=$row1[tit];$t2="";}
?>
<div class="fckclist box" onclick="gourl('fckcview<?=$row1[id]?>.html')">
<div class="main">
 <div class="d1"><img src="../upload/news/<?=$row1[bh]?>/xgt.jpg" /></div>
 <div class="d2"><strong><span><?=$t1?></span><?=$t2?></strong><br><?=$row1[tit1]?></div>
</div>
</div>
<? }?>

<div class="fckc1 box">
<div class="main">

 <div class="d1">��ܰС��ʿ</div>
 <div class="d2">ע���ɹ</div>
 <div class="d3">
 �ռ��ش��ȴ�������̫�������������Ǻ�ǿ�ҵģ�Ӧ�������������ֱ�䣬����ʱ��һ��Ҫע���ɹ���÷�ɹ��Ʒ����ɹ˪����ɡ��̫��ñ��̫������������ˮ�������ķ���Ь���ɽЬ��ǧ��Ҫ���߸�Ь��
 </div>
 <div class="d2">���ÿ����������ֽ�</div>
 <div class="d3">
 ���ô�̫���ֽ�̩������������ˢ����ȡ��ܷ��㡣
 </div>
 <div class="d2">���㳣��ҩ</div>
 <div class="d3">
 ������κ�����ˮ���������ֶ��ӣ�����;ƣ�͡����ٴ�һ�������ҩ���磬��ðҩ��ֹкҩ����θҩ�ȡ�
 </div>
 <div class="d2">���αر�֤��</div>
 <div class="d3">
 ���֤�����ա�ǩ֤���ر�Ʒ��һ�����ܶ�ʧ����ö�����ݸ������Է���ʧ����ʱ���ϡ���
 </div>
 
 <div class="d4"><? adwhile("MT04")?></div>
 
</div>
</div>

<? include("template/bottom.php");?>
</div>
</body>
</html>