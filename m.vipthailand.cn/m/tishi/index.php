<?
include("../../config/conn.php");
include("../../config/function.php");
$a=intval($_GET[admin]);
if($a==2){
$str="帐号密码有误，返回重试";
$errdis="errts";
$bkurl="../reg/";

}elseif($a==3){
$str="会员性质有误，请核对身份";
$errdis="errts";
$bkurl="../user/chushoulx.php";

}elseif($a==4){
$str="恭喜您，房源发布成功";
$errdis="okts";
$bkurl="../user/chushoulist.php";

}elseif($a==5){
$str="会员性质有误，请核对身份";
$errdis="errts";
$bkurl="../user/chuzulx.php";

}elseif($a==6){
$str="恭喜您，房源发布成功";
$errdis="okts";
$bkurl="../user/chuzulist.php";

}elseif($a==7){
$str="会员性质有误，请核对身份";
$errdis="errts";
$bkurl="../user/qiugoulx.php";

}elseif($a==8){
$str="恭喜您，求购信息发布成功";
$errdis="okts";
$bkurl="../user/qiugoulist.php";

}elseif($a==9){
$str="会员性质有误，请核对身份";
$errdis="errts";
$bkurl="../user/qiuzulx.php";

}elseif($a==10){
$str="恭喜您，求租信息发布成功";
$errdis="okts";
$bkurl="../user/qiuzulist.php";

}elseif($a==11){
$str="密码修改成功，请牢记您的新密码";
$errdis="okts";
$bkurl="../user/";

}elseif($a==12){
$str="验证码不正确";
$errdis="errts";
$bkurl="../reg/index1.php";

}elseif($a==13){
$str="报名成功，我们会尽快与您联系";
$errdis="okts";
$bkurl="../loupan/view".$_GET[nid].".html";

}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<meta http-equiv="refresh" content="5;url=<?=$bkurl?>">  
<title>操作提示 - 手机版<?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{background-color:#EBEBEB;}
</style>
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<!--内页头部B-->
<div class="ntop">操作提示</div>
<!--内页头部E-->

<div class="<?=$errdis?> box"><div class="dts"><strong><?=$str?></strong><br><a href="<?=$bkurl?>">5秒后系统会自动跳转，也可点击此处直接跳转</a></div></div>

<? include("../template/bottom.php");?>
</body>
</html>