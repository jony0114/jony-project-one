<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST["yjcode"])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $wxpay=sqlzhuru($_POST[wxpay0]).",".sqlzhuru($_POST[wxpay1]).",".sqlzhuru($_POST[wxpay2]).",".sqlzhuru($_POST[wxpay3]);
 updatetable("fcw_control","
			  partner='".sqlzhuru($_POST[zf1])."',
			  security_code='".sqlzhuru($_POST[zf2])."',
			  seller_email='".sqlzhuru($_POST[zf3])."',
			  zftype=".sqlzhuru($_POST[d1]).",
			  tenpay1='".sqlzhuru($_POST[tenpay1])."',
			  tenpay2='".sqlzhuru($_POST[tenpay2])."',
			  wxpay='".$wxpay."'
			  ");

 $output="<? class WxPayConfig{const APPID = '".sqlzhuru($_POST[wxpay0])."';const MCHID = '".sqlzhuru($_POST[wxpay1])."';const KEY = '".sqlzhuru($_POST[wxpay2])."';const APPSECRET = '".sqlzhuru($_POST[wxpay3])."';const SSLCERT_PATH = '../cert/apiclient_cert.pem';const SSLKEY_PATH = '../cert/apiclient_key.pem';const CURL_PROXY_HOST = '0.0.0.0';const CURL_PROXY_PORT = 0;const REPORT_LEVENL = 1;}?>";
 $fp= fopen("../user/wxpay/lib/WxPay.Config.php","w");
 fwrite($fp,$output);
 fclose($fp);

 php_toheader("inf3.php?t=suc");
}

while0("*","fcw_control");$row=mysql_fetch_array($res);
$wxpay=array("","","","");
if(!empty($row[wxpay]) && $row[wxpay]!=",,,"){$wxpay=preg_split("/,/",$row[wxpay]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
f1.action="inf3.php";
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? include("rightcap1.php");?>
 <script language="javascript">document.getElementById("rtit4").className="a1";</script>
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","inf3.php");}?>
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="yjcode" value="control" />
 <ul class="rcap"><li class="l1"></li><li class="l2">֧��������</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">ѡ��֧����ʽ��</li>
 <li class="l2">
 <select name="d1" class="inp">
 <option value="0" <? if($row[zftype]==0 || $row[zftype]==NULL){?> selected="selected"<? }?>>֧������ʱ����</option>
 </select>
 </li>
 <li class="l1">partner��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[partner];}?>
 <input  name="zf1" value="<?=$sv?>" size="20" type="text" class="inp" /> 
 <span class="fd">������֧������partner</span>
 </li>
 <li class="l1">security_code��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[security_code];}?>
 <input  name="zf2" value="<?=$sv?>" size="60" type="text" class="inp" /> 
 <span class="fd">������֧������security_code</span>
 </li>
 <li class="l1">seller_email��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[seller_email];}?>
 <input  name="zf3" value="<?=$sv?>" size="20" type="text" class="inp" /> 
 <span class="fd">������֧������seller_email</span>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">΢��֧��</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">APPID��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$wxpay[0];}?>
 <input  name="wxpay0" value="<?=$sv?>" size="20" type="text" class="inp" /> 
 <span class="fd"><a href="http://www.yj99.cn/faq/view82.html" class="red" target="_blank">[����]</a></span>
 </li>
 <li class="l1">MCHID��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$wxpay[1];}?>
 <input  name="wxpay1" value="<?=$sv?>" size="20" type="text" class="inp" /> 
 </li>
 <li class="l1">KEY��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$wxpay[2];}?>
 <input  name="wxpay2" value="<?=$sv?>" size="60" type="text" class="inp" /> 
 </li>
 <li class="l1">APPSECRET��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$wxpay[3];}?>
 <input  name="wxpay3" value="<?=$sv?>" size="60" type="text" class="inp" /> 
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">�Ƹ�ͨ����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">�̻���ţ�</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[tenpay1];}?>
 <input  name="tenpay1" value="<?=$sv?>" size="20" type="text" class="inp" /> 
 <span class="fd">������Ƹ�ͨ���̻���</span>
 </li>
 <li class="l1">��Կ��</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="��������,Ȩ�޲���";}else{$sv=$row[tenpay2];}?>
 <input  name="tenpay2" value="<?=$sv?>" size="60" type="text" class="inp" /> 
 <span class="fd">������Ƹ�ͨ���̻���Կ</span>
 </li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--End-->
 
</div>
</div>

<?php include("bottom.php");?>
</body>
</html>