<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if(1==$rowcontrol[regqq]){Audit_alert("本站未开启QQ登录","./");}
$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

if($_GET[action]=="del"){
updatetable("fcw_user","ifqq=0,openid='' where uid='".$_SESSION[FCWuser]."'");	
php_toheader("qq.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>QQ绑定/解绑 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > QQ绑定/解绑</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap6").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功!","qq.php")?>
 
 <? if(0==$rowuser[ifqq]){?>
 <ul class="qqtxt">
 <li class="l1">
 <a href="../config/qq/oauth/index.php"><img border="0" src="../img/qq_login.png" /></a><br>
 点击按钮，立即绑定QQ帐号
 </li>
 <li class="l2">
 使用QQ帐号登录本站，您可以……<br>
 用QQ帐号轻松登录<br>
 无须记住本站的帐号和密码，随时使用QQ帐号密码轻松登录
 </li>
 </ul>
 <? }elseif(1==$rowuser[ifqq]){?>
 <ul class="qqtxt">
 <li class="l3">
 <strong>您已将本站帐号与QQ号码绑定</strong><br>
 解除已绑定帐号？<br>
 <input type="button" class="btn1" onclick="gourl('qq.php?action=del')" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="确认解除" />
 </li>
 </ul>
 <? }?>


</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>