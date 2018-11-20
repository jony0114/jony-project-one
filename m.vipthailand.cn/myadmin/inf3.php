<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST["yjcode"])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
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
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
f1.action="inf3.php";
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? include("rightcap1.php");?>
 <script language="javascript">document.getElementById("rtit4").className="a1";</script>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","inf3.php");}?>
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="yjcode" value="control" />
 <ul class="rcap"><li class="l1"></li><li class="l2">支付宝设置</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">选择支付方式：</li>
 <li class="l2">
 <select name="d1" class="inp">
 <option value="0" <? if($row[zftype]==0 || $row[zftype]==NULL){?> selected="selected"<? }?>>支付宝即时到帐</option>
 </select>
 </li>
 <li class="l1">partner：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[partner];}?>
 <input  name="zf1" value="<?=$sv?>" size="20" type="text" class="inp" /> 
 <span class="fd">请输入支付宝的partner</span>
 </li>
 <li class="l1">security_code：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[security_code];}?>
 <input  name="zf2" value="<?=$sv?>" size="60" type="text" class="inp" /> 
 <span class="fd">请输入支付宝的security_code</span>
 </li>
 <li class="l1">seller_email：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[seller_email];}?>
 <input  name="zf3" value="<?=$sv?>" size="20" type="text" class="inp" /> 
 <span class="fd">请输入支付宝的seller_email</span>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">微信支付</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">APPID：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$wxpay[0];}?>
 <input  name="wxpay0" value="<?=$sv?>" size="20" type="text" class="inp" /> 
 <span class="fd"><a href="http://www.yj99.cn/faq/view82.html" class="red" target="_blank">[申请]</a></span>
 </li>
 <li class="l1">MCHID：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$wxpay[1];}?>
 <input  name="wxpay1" value="<?=$sv?>" size="20" type="text" class="inp" /> 
 </li>
 <li class="l1">KEY：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$wxpay[2];}?>
 <input  name="wxpay2" value="<?=$sv?>" size="60" type="text" class="inp" /> 
 </li>
 <li class="l1">APPSECRET：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$wxpay[3];}?>
 <input  name="wxpay3" value="<?=$sv?>" size="60" type="text" class="inp" /> 
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">财付通设置</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">商户编号：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[tenpay1];}?>
 <input  name="tenpay1" value="<?=$sv?>" size="20" type="text" class="inp" /> 
 <span class="fd">请输入财付通的商户号</span>
 </li>
 <li class="l1">密钥：</li>
 <li class="l2">
 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){$sv="机密数据,权限不够";}else{$sv=$row[tenpay2];}?>
 <input  name="tenpay2" value="<?=$sv?>" size="60" type="text" class="inp" /> 
 <span class="fd">请输入财付通的商户密钥</span>
 </li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--End-->
 
</div>
</div>

<?php include("bottom.php");?>
</body>
</html>