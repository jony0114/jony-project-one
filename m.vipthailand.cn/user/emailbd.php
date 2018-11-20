<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if($_GET[control]=="bd"){
 zwzr();
 if(panduan("uid,email,ifemail","fcw_user where email='".$_GET[email]."' and ifemail=1")==1){Audit_alert("绑定失败，该号码已经被绑定过","emailbd.php");}
 if(empty($_GET[yz])){Audit_alert("验证码有误！","emailbd.php");}
 if(panduan("uid,email,ifemail,bdemail","fcw_user where email='".$_GET[email]."' and bdemail='".$_GET[yz]."' and uid='".$_SESSION[FCWuser]."'")==0){
 Audit_alert("验证码输入有误，请重新绑定","emailbd.php");
 }
 updatetable("fcw_user","email='".$_GET[email]."',ifemail=1,bdemail='' where uid='".$_SESSION[FCWuser]."'");
 php_toheader("emailbd.php"); 

}elseif($_GET[control]=="delbd"){
 if(panduan("uid,email,ifemail,bdemail","fcw_user where bdemail='".$_GET[yz]."' and uid='".$_SESSION[FCWuser]."'")==0){
 Audit_alert("验证码输入有误，请重新提交","emailbd.php");
 }
 updatetable("fcw_user","email='',ifemail=0,bdemail='' where uid='".$_SESSION[FCWuser]."'");
 php_toheader("emailbd.php?t=suc"); 

}


$sqluser="select ifemail,email from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
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
//绑定开始
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
		alert("该邮箱已经被绑定，请更换");
		document.getElementById("uk1").style.display="";document.getElementById("uk2").style.display="none";return false;
	}else{
		sz=setInterval("sjzou()",1000);return false;
	}
  }
}

function yzonc(){
 if((document.getElementById("t1").value).replace("/\s/","")==""){alert("请输入邮件地址");document.getElementById("t1").focus();return false;}
 document.getElementById("sjzouv").innerHTML=120;
 document.getElementById("uk1").style.display="none";
 document.getElementById("uk2").style.display="";
 document.getElementById("fsid1").style.display=""; 
 document.getElementById("fsid2").style.display="none"; 
 var url = "emailchk.php?email="+document.getElementById("t1").value;
 xmlHttp.open("post", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}

function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
  clearInterval(sz);
  document.getElementById("fsid1").style.display="none"; 
  document.getElementById("fsid2").style.display=""; 
  return false;
 }else{document.getElementById("sjzouv").innerHTML=s-1;}
}

function bd(){
 if((document.getElementById("t2").value).replace("/\s/","")==""){alert("请输入验证码");document.getElementById("t2").focus();return false;}
 location.href="emailbd.php?control=bd&yz="+document.getElementById("t2").value+"&email="+document.getElementById("t1").value;
}

//解绑开始
var delsz;
var delxmlHttp = false;
try {
  delxmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    delxmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    delxmlHttp = false;
  }
}
if (!delxmlHttp && typeof XMLHttpRequest != 'undefined') {
  delxmlHttp = new XMLHttpRequest();
}


function delupdatePage() {
  if (delxmlHttp.readyState == 4) {
    response = delxmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	response=response.replace(/\s+/g,"");
	delsz=setInterval("delsjzou()",1000);
  }
}

function delbd(){
 if(!confirm("确定要解除该邮箱的绑定吗？")){return false;}
 document.getElementById("delsjzouv").innerHTML=120;
 document.getElementById("uk3").style.display="none";
 document.getElementById("uk4").style.display="";
 document.getElementById("fsid3").style.display=""; 
 document.getElementById("fsid4").style.display="none"; 
 var url = "emailchkdel.php";
 delxmlHttp.open("post", url, true);
 delxmlHttp.onreadystatechange = delupdatePage;
 delxmlHttp.send(null);
}

function delsjzou(){
 s=parseInt(document.getElementById("delsjzouv").innerHTML);
 if(s<=0){
  clearInterval(delsz);
  document.getElementById("fsid3").style.display="none"; 
  document.getElementById("fsid4").style.display=""; 
  return false;
 }else{document.getElementById("delsjzouv").innerHTML=s-1;}
}

function deltj(){
 if((document.getElementById("t4").value).replace("/\s/","")==""){alert("请输入验证码");document.getElementById("t4").focus();return false;}
 location.href="emailbd.php?control=delbd&yz="+document.getElementById("t4").value;
}

</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 邮箱绑定</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap5").className="l1 l2";
 </script>


 <? if(1==$rowuser[ifemail]){?>
 <ul class="uk" id="uk3">
 <li class="l1">已绑定邮箱：</li>
 <li class="l21"><?=$rowuser["email"]?></li>
 <li class="l3"></li>
 <li class="l4"><input type="button" class="btn1" onclick="delbd()" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="解除邮箱绑定" /></li>
 </ul>

 <ul class="uk" id="uk4" style="display:none;">
 <li class="l1"></li>
 <li class="l21 blue">如果您的原邮箱地址已经丢失，请联系网站客服处理。</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 验证码：</li>
 <li class="l2"><input type="text" class="inp" id="t4"  /></li>
 <li class="l1"></li>
 <li class="l21" id="fsid3">请查看<?=$rowuser[email]?>邮箱内容,发送中……(<span id="delsjzouv" class="red">120</span>秒后重发)</li>
 <li class="l21" id="fsid4" style="display:none;">[<a href="#" onclick="javascript:delbd();">重新发送</a>]</li>
 <li class="l3"></li>
 <li class="l4"><input type="button" class="btn1" onclick="deltj()" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="下一步" /></li>
 </ul>
 
 
 <? }else{?>
 <ul class="uk" id="uk1">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 邮箱号码：</li>
 <li class="l2"><input type="text" class="inp" name="t1" id="t1"  /></li>
 <li class="l3"></li>
 <li class="l4"><input type="button" class="btn1" onclick="yzonc()" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="下一步" /></li>
 </ul>
 <ul class="uk" id="uk2" style="display:none;">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 验证码：</li>
 <li class="l2"><input type="text" class="inp" name="t2" id="t2"  /></li>
 <li class="l1"></li>
 <li class="l21" id="fsid1">发送中……(<span id="sjzouv" class="red">120</span>秒后重发)</li>
 <li class="l21" id="fsid2" style="display:none;">[<a href="#" onclick="javascript:yzonc();">重新发送</a>]</li>
 <li class="l3"></li>
 <li class="l4"><input type="button" class="btn1" onclick="bd()" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="绑定邮箱" /></li>
 </ul>
 
 <? }?>
 
 <ul class="uk">
 <li class="l1">友情提示：</li>
 <li class="l21 red">由于每个邮箱系统安全设置不同，邮件有可能被过滤到垃圾箱里，如果没收到邮件，请通过邮箱垃圾箱找找看。</li>
 </ul>


</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>