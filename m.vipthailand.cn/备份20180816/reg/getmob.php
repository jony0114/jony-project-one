<?
include("../config/conn.php");
include("../config/function.php");

if(sqlzhuru($_POST[jvs])=="getmob"){
 zwzr();
 while0("id,uid,mot,ifmot,getpwd","fcw_user where mot='".sqlzhuru($_POST[t2])."' and getpwd='".sqlzhuru($_POST[t3])."' and uid='".sqlzhuru($_POST[t1])."'");
 if(!$row=mysql_fetch_array($res)){Audit_alert("验证码输入有误，返回重试","getmob.php");}
 php_toheader(weburl."reg/repwd.php?id=".$row[id]."&chk=".sha1($row[id].weburl)."&tmp=".$_POST[t3]);

}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>找回密码 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript">
var sz;
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}


function updatePage() {
  if (xmlHttp.readyState == 4) {
    var response = xmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	response=response.replace(/\s+/g,"");
	if(response=="True"){
		alert("帐号与手机号不匹配，请重试");
		$("kuang1").style.display="";$("kuang2").style.display="none";return false;
	}else{
		sz=setInterval("sjzou()",1000);return false;
	}
  }
}

function yzonc(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("请输入帐号");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace("/\s/","")==""){alert("请输入手机号码");document.f1.t2.focus();return false;}
 $("sjzouv").innerHTML=120;
 $("kuang1").style.display="none";
 $("kuang2").style.display="";
 $("fs1").style.display="";
 $("fs2").style.display="none";
 var url = "mobchk.php?mob="+document.f1.t2.value+"&uid="+document.f1.t1.value;
 xmlHttp.open("post", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}

function sjzou(){
 s=parseInt($("sjzouv").innerHTML);
 if(s<=0){
  clearInterval(sz);
  $("kuang1").style.display="none"; 
  $("kuang2").style.display=""; 
  $("sjzouv").innerHTML=120;
 $("fs1").style.display="none";
 $("fs2").style.display="";
  return false;
 }else{$("sjzouv").innerHTML=s-1;}
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
 <div class="dqwz fontyh">
 <ul class="u1"><li class="l1">当前位置：<a href="<?=weburl?>">首页</a> - 找回密码</li></ul>
 </div>
 
 <div class="getpassword">
  <ul class="u1">
  <li class="l1">通过手机找回密码</li>
  <li class="l2"><a href="getmm.php" class="feng">选择其他方式找回</a></li>
  </ul>
 </div>
 
 <div class="getpwdmain">
  <form name="f1" method="post" onSubmit="return getmobtj()">
  
  <ul class="u1">
  <li class="l1">您的帐号：</li>
  <li class="l2"><input name="t1" class="inp" type="text" style="width:184px;" /></li>
  <li class="l3">邮箱格式</li>
  <li class="l1">手机号码：</li>
  <li class="l2"><input name="t2" class="inp" type="text" style="width:184px;" /></li>
  <li class="l3"><span id="ts1">输入与帐号绑定的手机号码</span></li>
  </ul>
  
  <ul class="u1" id="kuang1">
  <li class="l6 fontyh"><a href="#" onClick="yzonc()">获取验证码</a></li>
  </ul>
  
  <ul class="u1" id="kuang2">
  <li class="l1"></li>
  <li class="l21"><span id="fs1" style="display:none;">发送中……(<span id="sjzouv" class="red">120</span>秒)&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="#" id="fs2" style="display:none;" onClick="javascript:yzonc();" class="feng">重新发送</a></li>
  </ul>
  
  <ul class="u1">
  <li class="l1">验证码：</li>
  <li class="l2"><input name="t3" class="inp" type="text" style="width:84px;" /></li>
  <li class="l3"><span id="ts1">请输入手机接收到的验证码</span></li>
  <li class="l1"></li>
  <li class="l2"><? tjbtnr("下一步")?></li>
  <li class="l3"></li>
  </ul>
  
  <input type="hidden" value="getmob" name="jvs" />
  </form>
 </div>
 
</div>

<? include("../template/bottom.html");?>
</body>
</html>