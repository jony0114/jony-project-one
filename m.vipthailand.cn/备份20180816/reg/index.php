<?
include("../config/conn.php");
include("../config/function.php");
if($_SESSION["FCWuser"]!="" && $_SESSION["FCWuserPWD"]!=""){php_toheader("../user/");}

//登录验证开始
if($_GET[action]=="login" && sqlzhuru($_POST[jvs])=="yjcode"){
 zwzr();
 $uid=sqlzhuru($_POST[t1]);$pwd=sqlzhuru($_POST[t2]);
 include("../template/uc/login.php");
 include("login_tem.php");
 if($_SESSION["sessurl"]!=""){php_toheader($_SESSION["sessurl"]);}else{php_toheader("../user/");}

}elseif($_GET[action]=="mot" && sqlzhuru($_POST[jvs])=="mot"){
 zwzr();
 while0("*","fcw_user where mot='".sqlzhuru($_POST[tmot])."' and getpwd='".sqlzhuru($_POST[tyzm])."' and ifmot=1");
 if(!$row=mysql_fetch_array($res)){Audit_alert("验证码不正确，返回重试","./");}
 $_SESSION[FCWuser]=$row[uid];
 $_SESSION[FCWuserID]=$row[usertype];
 $_SESSION["FCWuserPWD"]=$row[pwd];
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $g=time().rnd_num(100);
 updatetable("fcw_user","lastsj='".$sj."',getpwd='".$g."' where id=".$row[id]);
 intotable("fcw_loginlog","admin,uid,sj,uip","1,'".$row[uid]."','".$sj."','".$uip."'");
 if($_SESSION["sessurl"]!=""){php_toheader($_SESSION["sessurl"]);}else{php_toheader("../user/");}

}
//登录验证结束

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>会员登录 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script src="http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>
</head>
<body>

<? include("../template/top.html");?>

<div class="bfb bfb1">
 <div class="yjcode">
  <div class="login">
  <ul class="ucap<? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){?> ucap1<? }?>">
  <li class="l1" id="dlcap1" onMouseOver="dlover(1)">普通登录</li>
  <? if($rowcontrol[wxlogin]!="" && $rowcontrol[wxlogin]!=","){?><li class="l0" id="dlcap3" onMouseOver="dlover(3)">微信登录</li><? }?>
  <li class="l0" id="dlcap2" onMouseOver="dlover(2)">短信登录</li>
  </ul>
  
  <div id="dldiv1">
  <form name="f1" method="post" onSubmit="return logintj()">
  <ul class="u1">
  <li class="l2">用户名：</li>
  <li class="l3"><input class="txtinp" type="text" name="t1" /></li>
  <li class="l2">密  码：</li>
  <li class="l3"><input type="password" class="txtinp" name="t2" /></li>
  <li class="l4"><input class="fontyh" type="submit" value="登 录" /></li>
  <li class="l5"><a href="getmm.php">找回密码</a></li>
  <li class="l6">还没有<?=webname?>帐号？</li>
  <li class="l7"><a href="reg.php">免费注册</a></li>
  </ul>
  <input type="hidden" value="yjcode" name="jvs" />
  </form>
  </div>
  
  <div id="dldiv3" style="display:none;">
   <div id="wxlogin"></div>
  <? $wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);?>
  <script language="javascript">
  var obj = new WxLogin({
  id:"wxlogin", 
  appid: "<?=$wxlogin[0]?>", 
  scope: "snsapi_login", 
  redirect_uri: "<?=weburl?>reg/wxlogin.php",
  state: "",
  style: "",
  href: ""
  });
  </script>
  </div>
  
  <div id="dldiv2" style="display:none;">
  <form name="f2" method="post" onSubmit="return mottj()">
  <ul class="u1">
  <li class="l2">手机号码：</li>
  <li class="l3"><input type="text" class="txtinp" id="tmot" onBlur="motCheck()" name="tmot" /></li>
  <li class="l8" id="motyz" style="display:none;"></li>
  <li class="l2">验证码：</li>
  <li class="l3"><input type="text" class="txtinp" name="tyzm" /></li>
  <li class="l9" id="fsid1" style="display:none;"><a href="javascript:void(0);" onClick="javascript:yzonc();">发送验证码</a></li>
  <li class="l10" id="fsid2" style="display:none;"><a href="javascript:void(0);">发送中……(<span id="sjzouv" class="red">120</span>秒后重发)</a></li>
  <li class="l4"><input class="fontyh" type="submit" value="登 录" /></li>
  <li class="l5"><a href="getmm.php">找回密码</a></li>
  <li class="l6">还没有<?=webname?>帐号？</li>
  <li class="l7"><a href="reg.php">免费注册</a></li>
  </ul>
  <input type="hidden" value="mot" name="jvs" />
  </form>
  </div>
  
  </div>
 </div>
 
</div>

<? include("../template/bottom.html");?>

</body>
</html>