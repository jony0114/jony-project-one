<?
include("../config/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>404���� - <?=webname?></title>
<style type="text/css">
body{font-size:12px;margin:0;text-align:center;background:url(<?=weburl?>img/404body.gif) center top repeat-x;}
p{margin:2pt 0 0 0;}
*{margin:0 auto;padding:0;}

.yjcode{width:990px;color:#333;}
.yjcode a{text-decoration:none;}
.yjcode a:hover{text-decoration:underline;}
.yjcode ul{margin:0;list-style-type:none;}

.yjcode .bottom{border-top:#A3C4DB solid 1px;float:left;margin:8px 0 0 0;width:990px;text-align:center;}
.yjcode .bottom ul li{padding:10px 0 0 0;color:#888888;}
.yjcode .bottom ul .l1{width:990px;line-height:25px}
.yjcode .bottom ul .l1 span{color:#FF0000;}
.yjcode .bottom ul .l1 .b1{margin:8px 8px;}
.yjcode .bottom ul li a{color:#006DD2;}

.yjcode .tpts{float:left;width:990px;margin:0px 0 0 0;}

.yjcode .wzts{font-size:14px;float:left;width:767px;padding:20px 0 0 223px;line-height:30px;text-align:left;}
.yjcode .wzts a{color:#007AB7;}
.yjcode h2{float:left;width:990px;font-size:130px;color:#E4EBF8;text-align:left;}
</style>
</head>
<body>
<div class="yjcode">
<h2><em>404 Error</em></h2>

<div class="tpts"><img src="<?=weburl?>img/404.gif"/></div>
<div class="wzts">
1��������ĵ�ַ�����ڻ��ļ��Ѿ���ɾ�� <br>2��(��)��ҳ�����ڿ�������<br>
<a href="<?=weburl?>">������ҳ</a> | <a href="javascript:history.go(-1);">������һҳ</a> 
</div>

</div>
</body>
</html>