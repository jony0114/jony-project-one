<?
include("../../config/conn.php");
include("../../config/function.php");
$a=intval($_GET[admin]);
if($a==2){
$str="�ʺ��������󣬷�������";
$errdis="errts";
$bkurl="../reg/";

}elseif($a==3){
$str="��Ա����������˶����";
$errdis="errts";
$bkurl="../user/chushoulx.php";

}elseif($a==4){
$str="��ϲ������Դ�����ɹ�";
$errdis="okts";
$bkurl="../user/chushoulist.php";

}elseif($a==5){
$str="��Ա����������˶����";
$errdis="errts";
$bkurl="../user/chuzulx.php";

}elseif($a==6){
$str="��ϲ������Դ�����ɹ�";
$errdis="okts";
$bkurl="../user/chuzulist.php";

}elseif($a==7){
$str="��Ա����������˶����";
$errdis="errts";
$bkurl="../user/qiugoulx.php";

}elseif($a==8){
$str="��ϲ��������Ϣ�����ɹ�";
$errdis="okts";
$bkurl="../user/qiugoulist.php";

}elseif($a==9){
$str="��Ա����������˶����";
$errdis="errts";
$bkurl="../user/qiuzulx.php";

}elseif($a==10){
$str="��ϲ����������Ϣ�����ɹ�";
$errdis="okts";
$bkurl="../user/qiuzulist.php";

}elseif($a==11){
$str="�����޸ĳɹ������μ�����������";
$errdis="okts";
$bkurl="../user/";

}elseif($a==12){
$str="��֤�벻��ȷ";
$errdis="errts";
$bkurl="../reg/index1.php";

}elseif($a==13){
$str="�����ɹ������ǻᾡ��������ϵ";
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
<title>������ʾ - �ֻ���<?=webname?></title>
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
<!--��ҳͷ��B-->
<div class="ntop">������ʾ</div>
<!--��ҳͷ��E-->

<div class="<?=$errdis?> box"><div class="dts"><strong><?=$str?></strong><br><a href="<?=$bkurl?>">5���ϵͳ���Զ���ת��Ҳ�ɵ���˴�ֱ����ת</a></div></div>

<? include("../template/bottom.php");?>
</body>
</html>