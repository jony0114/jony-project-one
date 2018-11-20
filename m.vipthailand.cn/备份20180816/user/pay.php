<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$ifpays=0;

if(sqlzhuru($_POST[jvs])=="pay" && sqlzhuru($_POST[R1])=="alipay"){
zwzr();
$sj=date("Y-m-d H:i:s");
$userid=returnuserid($_SESSION[FCWuser]);
$bh=time()."pay".$userid;
$uip=$_SERVER["REMOTE_ADDR"];
$allname=webname."预存款充值";
$dingbh=time()."|".$userid;	
$dmoney=sqlzhuru($_POST[t1]);
intotable("fcw_dingdang","bh,ddbh,uid,sj,uip,money1,ddzt,alipayzt,bz,ifok","'".$bh."','".$dingbh."','".$_SESSION[FCWuser]."','".$sj."','".$uip."',".$dmoney.",'等待买家付款','','',0");


require_once("alipay.config.php");
$payment_type = "1";
$notify_url = weburl."user/notify_url.php"; //服务器异步通知页面路径
if($_GET[ifwap]=="yes"){$ifm="m/";}
$return_url = weburl.$ifm."user/paylog.php";//页面跳转同步通知页面路径
$seller_email = $rowcontrol[seller_email];//卖家支付宝帐户
$out_trade_no = $dingbh;//商户订单号
$subject = webname."预存款充值";//订单名称
$body =  webname."预存款充值";
$show_url = weburl;//商品展示地址

include("alipay.php");

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function xz(x){
document.getElementById(x).checked=true;	
}
function tj(){
t1v=document.f1.t1.value;
if(t1v.replace(/\s/,"")=="" || isNaN(t1v)){alert("请输入充值金额");document.f1.t1.focus();return false;}
r=document.getElementsByName("R1");
rv="";
for(i=0;i<r.length;i++){
if(r[i].checked==true){rv=r[i].value;}
}
if(rv=="alipay"){f1.action="pay.php";}
else if(rv=="tenpay"){f1.action="tenpay/index.php";}
else if(rv=="wxpay"){
bgwxonc(1);
wxpay_f.location="wxpay/index.php?m="+t1v;
return false;
}
else{f1.action="tenpay/index.php";}
}
function bgwxonc(x){
 if(x==1){
 document.getElementById("wxpay_t").style.display="";
 document.getElementById("bghui").style.display="block";
 }else if(x==0){
 document.getElementById("wxpay_t").style.display="none";
 document.getElementById("bghui").style.display="none";
 }
}
</script>
</head>
<body>
<div id="bghui" style="width:100%;height:100%;position:absolute;top:0px;filter:alpha(Opacity=60);-moz-opacity:0.6;opacity: 0.6;background-color:#777;z-index:199;left:0px;display:none;"></div>

<? include("../template/top.html");?>

<div class="yjcode">

<div id="wxpay_t" style="display:none;">
<iframe name="wxpay_f" id="wxpay_f" marginwidth="1" marginheight="1" frameborder="0" height="100%" width="100%" border="0" src=""></iframe>
</div>

<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 快速充值</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>

 <form name="f1" method="post" onsubmit="return tj()" target="_blank">
 <input type="hidden" value="pay" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>充值金额：</li>
 <li class="l2"><input name="t1" value="<?=$_GET[m]?>" style="width:105px;" class="inp" type="text" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("立即充值")?></li>
 </ul>

 <ul class="pay1">
 <li class="l1">选择支付方式：</li>
 <? if(!empty($rowcontrol[partner]) && !empty($rowcontrol[security_code]) && !empty($rowcontrol[seller_email])){?>
 <li class="l2">
 <input name="R1" id="alipay" type="radio" value="alipay"<? if($ifpays==0){?> checked="checked"<? $ifpays=1;}?> /><img onclick="xz('alipay')" src="img/pay/alipay.gif" width="180" height="60" />
 </li>
 <? }?>

 <? if(!empty($rowcontrol[wxpay]) && $rowcontrol[wxpay]!=",,,"){?>
 <li class="l2">
 <input name="R1" id="wxpay" type="radio" value="wxpay"<? if($ifpays==0){?> checked="checked"<? $ifpays=1;}?> /><img src="img/pay/wxpay.gif" onClick="xz('wxpay')" />
 </li>
 <? }?>

 <? if(!empty($rowcontrol[tenpay1]) && !empty($rowcontrol[tenpay2])){?>
 <li class="l2">
 <input name="R1" id="tenpay" type="radio" value="tenpay"<? if($ifpays==0){?> checked="checked"<? $ifpays=1;}?> /><img src="img/pay/tenpay.gif" onclick="xz('tenpay')" width="180" height="60" />
 </li>
 <? }?>

 </ul>
  
 <? if(!empty($rowcontrol[tenpay1]) && !empty($rowcontrol[tenpay2])){?>
 <ul class="pay2">
 <li class="l1">网上银行：</li>
 <li class="l2"><input type='radio' name='R1' id="netbank1002" value='1002' /> <img onclick="xz('netbank1002')" src="img/pay/p1.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1005" value='1005' /> <img onclick="xz('netbank1005')" src="img/pay/p4.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1001" value='1001' /> <img onclick="xz('netbank1001')" src="img/pay/p2.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1003" value='1003' /> <img onclick="xz('netbank1003')" src="img/pay/p3.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1052" value='1052' /> <img onclick="xz('netbank1052')" src="img/pay/p5.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1028" value='1028' /> <img onclick="xz('netbank1028')" src="img/pay/p6.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1004" value='1004' /> <img onclick="xz('netbank1004')" src="img/pay/p7.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1027" value='1027' /> <img onclick="xz('netbank1027')" src="img/pay/p8.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1022" value='1022' /> <img onclick="xz('netbank1022')" src="img/pay/p9.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1006" value='1006' /> <img onclick="xz('netbank1006')" src="img/pay/p10.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1021" value='1021' /> <img onclick="xz('netbank1021')" src="img/pay/p11.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1009" value='1009' /> <img onclick="xz('netbank1009')" src="img/pay/p12.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1010" value='1010' /> <img onclick="xz('netbank1010')" src="img/pay/p13.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1008" value='1008' /> <img onclick="xz('netbank1008')" src="img/pay/p14.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1020" value='1020' /> <img onclick="xz('netbank1020')" src="img/pay/p15.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1032" value='1032' /> <img onclick="xz('netbank1032')" src="img/pay/p16.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1054" value='1054' /> <img onclick="xz('netbank1054')" src="img/pay/p17.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1056" value='1056' /> <img onclick="xz('netbank1056')" src="img/pay/p18.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1082" value='1082' /> <img onclick="xz('netbank1082')" src="img/pay/p19.gif" /></li>
 <li class="l2"><input type='radio' name='R1' id="netbank1076" value='1076' /> <img onclick="xz('netbank1076')" src="img/pay/p20.gif" /></li>
 </ul>
 <? }?>
  
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>