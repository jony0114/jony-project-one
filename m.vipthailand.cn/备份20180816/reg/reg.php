<?
include("../config/conn.php");
include("../config/function.php");

//�޸ĸ��ļ���Ҫͬ���޸���reg/reg.php��wxlogin.php��reg/qqreturnlast.php�Լ��ֻ��˵�reg/reg.php

if($_SESSION["FCWuser"]!=""){php_toheader("../user/");}

//д�����ݿ⿪ʼ
if($_GET[action]=="add"){
 zwzr();
 $ifmot=0;
 //��Ҫ������֤B
 if(1==$rowcontrol[regmob]){
 $mot=$_SESSION["REGMOT"];
 $motyz=sqlzhuru($_POST[t7]);
 $ifmot=1;
 if($motyz!=$_SESSION["REGMOTYZ"] || empty($motyz)){Audit_alert("������֤�벻��ȷ���������ԣ�","reg.php");}
 $_SESSION["REGMOT"]="";
 $_SESSION["REGMOTYZ"]="";
 }
 //��Ҫ������֤E
 if(strtolower($_SESSION["authnum_session"])!=strtolower(sqlzhuru($_POST["t5"]))){Audit_alert("��֤�벻��ȷ�������޸���֤�룡","reg.php");}
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
//д�����ݿ����

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ע���Ա - <?=webname?></title>
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
  <li class="l1"><span>*</span> ע�����ʣ�</li>
  <li class="l2">
  <select name="d1" onChange="tychk()" class="inp1 fontyh">
  <option value="">��ѡ��</option>
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
  <span class="s2" id="ts0">��ѡ������ע������</span>
  </li>
  <li class="l1"><span>*</span> ע���ʺţ�</li>
  <li class="l2">
  <input type="text" class="inp1" name="t1" autocomplete="off" disableautocomplete onBlur="userCheck()">
  <span class="s1" id="imgts1"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts1">����Ϊ2��20���ַ�,֧�ֺ��֡����֡���ĸ���»���</span>
  </li>
  <li class="l1"><span>*</span> ��¼���룺</li>
  <li class="l2">
  <input type="password" class="inp1" name="t2" autocomplete="off" disableautocomplete onBlur="pwd1chk()">
  <span class="s1" id="imgts2"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts2">6-20����ĸ�����֡��»��ߵ����</span>
  </li>
  <li class="l1"><span>*</span> ȷ�����룺</li>
  <li class="l2">
  <input type="password" class="inp1" name="t3" autocomplete="off" disableautocomplete onBlur="pwd2chk()">
  <span class="s1" id="imgts3"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts3">ȷ������������ȷ</span>
  </li>
  <li class="l1"><span>*</span> �������䣺</li>
  <li class="l2">
  <input type="text" class="inp1" name="t4" autocomplete="off" disableautocomplete onBlur="yxCheck()">
  <span class="s1" id="imgts4"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts4">���������ĳ�������</span>
  </li>
  <li class="l1"><span>*</span> ��֤�룺</li>
  <li class="l2">
  <input type="text" class="inp2" name="t5" autocomplete="off" disableautocomplete onBlur="yzmCheck()"> 
  <img src="../config/getYZM.php" onClick="this.src='../config/getYZM.php?'+Math.random();" class="img1" />
  <span class="s1" id="imgts5"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts5">��������֤��</span>
  </li>
  
  <? if(1==$rowcontrol[regmob]){?>
  <li class="l1"><span>*</span> �ֻ����룺</li>
  <li class="l2">
  <input type="text" class="inp1" name="t6" autocomplete="off" disableautocomplete onBlur="motCheck()">
  <span class="s1" id="imgts6"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts6">�����������ֻ�����</span>
  </li>
  <li class="l1"><span>*</span> �ֻ���֤�룺</li>
  <li class="l2">
  <input type="text" class="inp2" name="t7" autocomplete="off" disableautocomplete onBlur="motyzmCheck()"> 
  <a href="javascript:void(0);" id="fs1" class="a1" onClick="yzonc()">��ȡ������֤��</a>
  <a href="javascript:void(0);" id="fs2" class="a1" style="display:none;">�����С���(<span id="sjzouv" class="red">120</span>��)</span></a>
  <span class="s1" id="imgts7"><img src="../img/gang.png" /></span>
  <span class="s2" id="ts7">�����յ����ֻ���֤��</span>
  </li>
  <? }?>

  <li class="l3"><input type="submit" class="fontyh" value="�ύע��"></li>
  </ul>
  </form>
  </div>
  
  <div class="regright">
  <ul class="u1">
  <li class="l1">���б�վ�˺ţ���ֱ�ӵ�¼</li>
  <li class="l2"><a href="./">�� ¼</a></li>
  <li class="l3">����������������ʽֱ�ӵ�¼��</li>
  <li class="l4">
  <a href="<?=weburl?>config/qq/oauth/index.php" target="_blank" class="a1">QQ��¼</a>
  <? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
  <a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect" target="_blank" class="a2">΢�ŵ�¼</a>
  <? }?>
  </li>
  </ul>
  </div>
  
 </div>

</div>
</div>
<? include("../template/bottom.html");?>
<script language="javascript">
//ע�Ὺʼ 
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
 if(d1v==""){objhtml("ts0","<font color=red>��ѡ������ע������</font>");objhtml("imgts0","<img src='../img/err.png' />");}
 else{objhtml("ts0","");objhtml("imgts0","<img src='../img/ok.png' />");iftyok=1;}
}

function userCheck(){
ifuidok=0;
document.getElementById("imgts1").innerHTML="";
t1v =document.f1.t1.value;
if(t1v.length<2 || t1v.length>20){objhtml("ts1","<span class='red'>����Ϊ2��20���ַ�,֧�ֺ��֡����ֻ���ĸ</span>");objhtml("imgts1","<img src='../img/err.png' />");return false;}	
objhtml("ts1","�û������ڼ�⡭��");

$.post("userCheck.php",{uid:escape(t1v)},function(result){
 if(result=="True"){objhtml("ts1","<font color=red>���ź������ʺ��Ѵ���</font>");objhtml("imgts1","<img src='../img/err.png' />");}
 else if(result=="False"){objhtml("ts1","");objhtml("imgts1","<img src='../img/ok.png' />");ifuidok=1;}
 else if(result=="err"){objhtml("ts1","<span class='red'>����Ϊ2��20���ַ�,֧�ֺ��֡����֡���ĸ</span>");objhtml("imgts1","<img src='../img/err.png' />");}
});

}

function pwd1chk(){
ifpwd1ok=0;
t2v =document.f1.t2.value;
if(t2v.length<6 || t2v.length>20){
objhtml("ts2","<span class='red'>6-20����ĸ�����֡��»��ߵ����</span>");objhtml("imgts2","<img src='../img/err.png' />");return false;
}else{
objhtml("ts2","");objhtml("imgts2","<img src='../img/ok.png' />");ifpwd1ok=1;return false;
}
}
function pwd2chk(){
ifpwd2ok=0;
t3v =document.f1.t3.value;
t2v =document.f1.t2.value;
if(0==ifpwd1ok || t2v!=t3v){objhtml("ts3","<span class='red'>ȷ������������ȷ</span>");objhtml("imgts3","<img src='../img/err.png' />");return false;}
else{objhtml("ts3","");objhtml("imgts3","<img src='../img/ok.png' />");ifpwd2ok=1;return false;}
}

function updatePageyx() {
  if (xmlHttpyx.readyState == 4) {
    response = xmlHttpyx.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="True"){objhtml("ts4","<font color=red>���ź����������ѱ��û�ʹ��</font>");objhtml("imgts4","<img src='../img/err.png' />");}
   else if(response=="False"){objhtml("ts4","");objhtml("imgts4","<img src='../img/ok.png' />");ifyxok=1;}
  }
}

function yxCheck(){
ifyxok=0;
t4v =document.f1.t4.value;
if(t4v.replace(/\s/,"")=="" || !isEmail(t4v)){objhtml("ts4","<span class='red'>���������ĳ�������</span>");objhtml("imgts4","<img src='../img/err.png' />");return false;}	
objhtml("ts4","�������ڼ�⡭��");

$.post("yxCheck.php",{yx:t4v},function(result){
 if(result=="True"){objhtml("ts4","<font color=red>���ź����������ѱ��û�ʹ��</font>");objhtml("imgts4","<img src='../img/err.png' />");}
 else if(result=="False"){objhtml("ts4","");objhtml("imgts4","<img src='../img/ok.png' />");ifyxok=1;}
});

}

function yzmCheck(){
ifyzmok=0;
t5v =document.f1.t5.value;
if(t5v.replace(/\s/,"")==""){objhtml("ts5","<span class='red'>���������ͼ����֤��</span>");objhtml("imgts5","<img src='../img/err.png' />");return false;}	
objhtml("ts5","������֤...");

$.post("yzmCheck.php",{yzm:t5v},function(result){
 if(result=="True"){objhtml("ts5","<font color=red>��֤����������</font>");objhtml("imgts5","<img src='../img/err.png' />");}
 else if(result=="False"){objhtml("ts5","");objhtml("imgts5","<img src='../img/ok.png' />");ifyzmok=1;}
});

}

function motCheck(){
ifmotok=0;
t6v=document.f1.t6.value;
var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
if(t6v.length==0 || t6v.length!=11 || !myreg.test(t6v)){objhtml("ts6","<span class='red'>�ֻ������ʽ����</span>");objhtml("imgts6","<img src='../img/err.png' />");return false;}
objhtml("ts6","�ֻ��������ڼ�⡭��");

$.post("motCheck.php",{mot:t6v},function(result){
 if(result=="True"){objhtml("ts6","<font color=red>���ź����ú����ѱ������û���ʹ��</font>");objhtml("imgts6","<img src='../img/err.png' />");}
 else if(result=="False"){objhtml("ts6","");objhtml("imgts6","<img src='../img/ok.png' />");ifmotok=1;}
});

}

function motyzmCheck(){
ifmotyzmok=0;
t7v=document.f1.t7.value;
if(t7v.replace(/\s/,"")==""){objhtml("ts7","<span class='red'>��������֤��</span>");objhtml("imgts7","<img src='../img/err.png' />");return false;}	
objhtml("ts7","������֤...");

$.get("motyzmCheck.php",{yzm:t7v},function(result){
 if(result=="True"){objhtml("ts7","<font color=red>������֤������</font>");objhtml("imgts7","<img src='../img/err.png' />");}
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
layer.msg('���ݴ�����', {icon: 16  ,time: 0,shade :0.25});
f1.action="reg.php?action=add";
}

function objdis(x,y){
document.getElementById(x).style.display=y;
}

function objhtml(x,y){
document.getElementById(x).innerHTML=y;
}


//ע�����
</script>
</body>
</html>