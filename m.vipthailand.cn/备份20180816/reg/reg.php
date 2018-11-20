<?
include("../config/conn.php");
include("../config/function.php");

//修改该文件，要同步修改下reg/reg.php、wxlogin.php、reg/qqreturnlast.php以及手机端的reg/reg.php

if($_SESSION["FCWuser"]!=""){php_toheader("../user/");}

//写入数据库开始
if($_GET[action]=="add"){
 zwzr();
 $ifmot=0;
 //需要短信验证B
 if(1==$rowcontrol[regmob]){
 $mot=$_SESSION["REGMOT"];
 $motyz=sqlzhuru($_POST[t7]);
 $ifmot=1;
 if($motyz!=$_SESSION["REGMOTYZ"] || empty($motyz)){Audit_alert("短信验证码不正确，返回重试！","reg.php");}
 $_SESSION["REGMOT"]="";
 $_SESSION["REGMOTYZ"]="";
 }
 //需要短信验证E
 if(strtolower($_SESSION["authnum_session"])!=strtolower(sqlzhuru($_POST["t5"]))){Audit_alert("验证码不正确，返回修改验证码！","reg.php");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $ut=intval($_POST[d1]);
 $uid=sqlzhuru($_POST[t1]);
 $nc=sqlzhuru($_POST[t1]);
 $pwd=sqlzhuru($_POST[t2]);
 $email=sqlzhuru($_POST[t4]);
 include("../template/uc/reg.php");
 include("reg_tem.php");
 include("../template/uc/reg1.php");
 php_toheader("../user/index.php");
 
}
//写入数据库结束

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>注册会员 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<? include("../template/top.html");?>
<div class="bfb bfbreg">
<div class="yjcode">

 <div class="reg">
  
  <div class="regleft">
  <form name="f1" method="post" onSubmit="return tj()">
  <ul class="u1">
  <li class="l1"><span>*</span> 注册性质：</li>
  <li class="l2">
  <select name="d1" onChange="tychk()" class="inp1 fontyh">
  <option value="">请选择</option>
  <option value="1"><?=returnuty(1)?></option>
  <option value="2"><?=returnuty(2)?></option>
  <option value="4"><?=returnuty(4)?></option>
  <option value="5"><?=returnuty(5)?></option>
  <? if(1==$rowcontrol[ifjia]){?>
  <option value="7"><?=returnuty(7)?></option>
  <option value="6"><?=returnuty(6)?></option>
  <option value="3"><?=returnuty(3)?></option>
  <? }?>
  </select>
  <span class="s1" id="imgts0"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts0">请选择您的注册类型</span>
  </li>
  <li class="l1"><span>*</span> 注册帐号：</li>
  <li class="l2">
  <input type="text" class="inp1" name="t1" autocomplete="off" disableautocomplete onBlur="userCheck()">
  <span class="s1" id="imgts1"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts1">长度为2～20个字符,支持汉字、数字、字母、下划线</span>
  </li>
  <li class="l1"><span>*</span> 登录密码：</li>
  <li class="l2">
  <input type="password" class="inp1" name="t2" autocomplete="off" disableautocomplete onBlur="pwd1chk()">
  <span class="s1" id="imgts2"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts2">6-20个字母、数字、下划线的组合</span>
  </li>
  <li class="l1"><span>*</span> 确认密码：</li>
  <li class="l2">
  <input type="password" class="inp1" name="t3" autocomplete="off" disableautocomplete onBlur="pwd2chk()">
  <span class="s1" id="imgts3"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts3">确保密码输入正确</span>
  </li>
  <li class="l1"><span>*</span> 常用邮箱：</li>
  <li class="l2">
  <input type="text" class="inp1" name="t4" autocomplete="off" disableautocomplete onBlur="yxCheck()">
  <span class="s1" id="imgts4"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts4">请输入您的常用邮箱</span>
  </li>
  <li class="l1"><span>*</span> 验证码：</li>
  <li class="l2">
  <input type="text" class="inp2" name="t5" autocomplete="off" disableautocomplete onBlur="yzmCheck()"> 
  <img src="../config/getYZM.php" onClick="this.src='../config/getYZM.php?'+Math.random();" class="img1" />
  <span class="s1" id="imgts5"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts5">请输入验证码</span>
  </li>
  
  <? if(1==$rowcontrol[regmob]){?>
  <li class="l1"><span>*</span> 手机号码：</li>
  <li class="l2">
  <input type="text" class="inp1" name="t6" autocomplete="off" disableautocomplete onBlur="motCheck()">
  <span class="s1" id="imgts6"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts6">请输入您的手机号码</span>
  </li>
  <li class="l1"><span>*</span> 手机验证码：</li>
  <li class="l2">
  <input type="text" class="inp2" name="t7" autocomplete="off" disableautocomplete onBlur="motyzmCheck()"> 
  <a href="javascript:void(0);" id="fs1" class="a1" onClick="yzonc()">获取短信验证码</a>
  <a href="javascript:void(0);" id="fs2" class="a1" style="display:none;">发送中……(<span id="sjzouv" class="red">120</span>秒)</span></a>
  <span class="s1" id="imgts7"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts7">输入收到的手机验证码</span>
  </li>
  <? }?>

  <li class="l3"><input type="submit" class="fontyh" value="提交注册"></li>
  </ul>
  </form>
  </div>
  
  <div class="regright">
  <ul class="u1">
  <li class="l1">已有本站账号，请直接登录</li>
  <li class="l2"><a href="./">登 录</a></li>
  <li class="l3">您还可以用其他方式直接登录：</li>
  <li class="l4">
  <a href="<?=weburl?>config/qq/oauth/index.php" target="_blank" class="a1">QQ登录</a>
  <? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
  <a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect" target="_blank" class="a2">微信登录</a>
  <? }?>
  </li>
  </ul>
  </div>
  
 </div>

</div>
</div>
<? include("../template/bottom.html");?>
<script language="javascript">
//注册开始 
var iftyok=0;
var ifuidok=0;
var ifpwd1ok=0;
var ifpwd2ok=0;
var ifyxok=0;
var ifyzmok=0;
var ifmotok=0;
var ifmotyzmok=0;

function tychk(){
d1v=document.f1.d1.value;
 if(d1v==""){objhtml("ts0","<font color=red>请选择您的注册类型</font>");objhtml("imgts0","<img src='../img/err.png' />");}
 else{objhtml("ts0","");objhtml("imgts0","<img src='../img/ok.png' />");iftyok=1;}
}

function userCheck(){
ifuidok=0;
document.getElementById("imgts1").innerHTML="";
t1v =document.f1.t1.value;
if(t1v.length<2 || t1v.length>20){objhtml("ts1","<span class='red'>长度为2～20个字符,支持汉字、数字或字母</span>");objhtml("imgts1","<img src='../img/err.png' />");return false;}	
objhtml("ts1","用户名正在检测……");

$.post("userCheck.php",{uid:escape(t1v)},function(result){
 if(result=="True"){objhtml("ts1","<font color=red>很遗憾，该帐号已存在</font>");objhtml("imgts1","<img src='../img/err.png' />");}
 else if(result=="False"){objhtml("ts1","");objhtml("imgts1","<img src='../img/ok.png' />");ifuidok=1;}
 else if(result=="err"){objhtml("ts1","<span class='red'>长度为2～20个字符,支持汉字、数字、字母</span>");objhtml("imgts1","<img src='../img/err.png' />");}
});

}

function pwd1chk(){
ifpwd1ok=0;
t2v =document.f1.t2.value;
if(t2v.length<6 || t2v.length>20){
objhtml("ts2","<span class='red'>6-20个字母、数字、下划线的组合</span>");objhtml("imgts2","<img src='../img/err.png' />");return false;
}else{
objhtml("ts2","");objhtml("imgts2","<img src='../img/ok.png' />");ifpwd1ok=1;return false;
}
}
function pwd2chk(){
ifpwd2ok=0;
t3v =document.f1.t3.value;
t2v =document.f1.t2.value;
if(0==ifpwd1ok || t2v!=t3v){objhtml("ts3","<span class='red'>确保密码输入正确</span>");objhtml("imgts3","<img src='../img/err.png' />");return false;}
else{objhtml("ts3","");objhtml("imgts3","<img src='../img/ok.png' />");ifpwd2ok=1;return false;}
}

function updatePageyx() {
  if (xmlHttpyx.readyState == 4) {
    response = xmlHttpyx.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="True"){objhtml("ts4","<font color=red>很遗憾，该邮箱已被用户使用</font>");objhtml("imgts4","<img src='../img/err.png' />");}
   else if(response=="False"){objhtml("ts4","");objhtml("imgts4","<img src='../img/ok.png' />");ifyxok=1;}
  }
}

function yxCheck(){
ifyxok=0;
t4v =document.f1.t4.value;
if(t4v.replace(/\s/,"")=="" || !isEmail(t4v)){objhtml("ts4","<span class='red'>请输入您的常用邮箱</span>");objhtml("imgts4","<img src='../img/err.png' />");return false;}	
objhtml("ts4","邮箱正在检测……");

$.post("yxCheck.php",{yx:t4v},function(result){
 if(result=="True"){objhtml("ts4","<font color=red>很遗憾，该邮箱已被用户使用</font>");objhtml("imgts4","<img src='../img/err.png' />");}
 else if(result=="False"){objhtml("ts4","");objhtml("imgts4","<img src='../img/ok.png' />");ifyxok=1;}
});

}

function yzmCheck(){
ifyzmok=0;
t5v =document.f1.t5.value;
if(t5v.replace(/\s/,"")==""){objhtml("ts5","<span class='red'>请输入左侧图形验证码</span>");objhtml("imgts5","<img src='../img/err.png' />");return false;}	
objhtml("ts5","正在验证...");

$.post("yzmCheck.php",{yzm:t5v},function(result){
 if(result=="True"){objhtml("ts5","<font color=red>验证码输入有误</font>");objhtml("imgts5","<img src='../img/err.png' />");}
 else if(result=="False"){objhtml("ts5","");objhtml("imgts5","<img src='../img/ok.png' />");ifyzmok=1;}
});

}

function motCheck(){
ifmotok=0;
t6v=document.f1.t6.value;
var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
if(t6v.length==0 || t6v.length!=11 || !myreg.test(t6v)){objhtml("ts6","<span class='red'>手机号码格式有误</span>");objhtml("imgts6","<img src='../img/err.png' />");return false;}
objhtml("ts6","手机号码正在检测……");

$.post("motCheck.php",{mot:t6v},function(result){
 if(result=="True"){objhtml("ts6","<font color=red>很遗憾，该号码已被其他用户绑定使用</font>");objhtml("imgts6","<img src='../img/err.png' />");}
 else if(result=="False"){objhtml("ts6","");objhtml("imgts6","<img src='../img/ok.png' />");ifmotok=1;}
});

}

function motyzmCheck(){
ifmotyzmok=0;
t7v=document.f1.t7.value;
if(t7v.replace(/\s/,"")==""){objhtml("ts7","<span class='red'>请输入验证码</span>");objhtml("imgts7","<img src='../img/err.png' />");return false;}	
objhtml("ts7","正在验证...");

$.get("motyzmCheck.php",{yzm:t7v},function(result){
 if(result=="True"){objhtml("ts7","<font color=red>短信验证码有误</font>");objhtml("imgts7","<img src='../img/err.png' />");}
 else if(result=="False"){objhtml("ts7","");objhtml("imgts7","<img src='../img/ok.png' />");ifmotyzmok=1;}
});

}

var sz;
function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
 clearInterval(sz);
 objhtml("sjzouv","120");
 objdis("fs1","");
 objdis("fs2","none");
 return false;
 }else{
 objhtml("sjzouv",s-1);
 }
}
function yzonc(){
 if(0==ifyzmok){yzmCheck();return false;}
 if(0==ifmotok){motCheck();return false;}
 objdis("fs1","none");
 objdis("fs2","");
 sz=setInterval("sjzou()",1000);
 $.get("mobreg.php",{mot:document.f1.t6.value,txyzm:document.f1.t5.value},function(result){
 if(result=="err1"){motCheck();return false;}
 else if(result=="err2"){yzmCheck();}
 });
 return false;
}

function tj(){
if(0==iftyok){tychk();return false;}
if(0==ifuidok){userCheck();return false;}
if(0==ifpwd1ok){pwd1chk();return false;}
if(0==ifpwd2ok){pwd2chk();return false;}
if(0==ifyxok){yxCheck();return false;}
if(0==ifyzmok){yzmCheck();return false;}
<? if(1==$rowcontrol[regmob]){?>
if(0==ifmotok){motCheck();return false;}
if(0==ifmotyzmok){motyzmCheck();return false;}
<? }?>
layer.msg('数据处理中', {icon: 16  ,time: 0,shade :0.25});
f1.action="reg.php?action=add";
}

function objdis(x,y){
document.getElementById(x).style.display=y;
}

function objhtml(x,y){
document.getElementById(x).innerHTML=y;
}


//注册结束
</script>
</body>
</html>