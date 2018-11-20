<?
include("../config/conn.php");
include("../config/function.php");

if($_GET["chk"]!=sha1($_GET[id].weburl)){php_toheader("../");}
$id=$_GET[id];
$tmp=$_GET[tmp];
if(!ereg("^[_a-zA-Z0-9.@]*$",$tmp) || empty($tmp)){Audit_alert("非法来源！","../");}
while0("id,uid,usertype,getpwd","fcw_user where id=".$id." and getpwd='".$tmp."'");if(!$row=mysql_fetch_array($res)){Audit_alert("路径错误！","getpasswd.php");}
$uid=$row[uid];

if(sqlzhuru($_POST[jvs])=="repwd"){
 zwzr();
 $pwd=sha1(sqlzhuru($_POST[t1]));
 $y=time().rnd_num(100);
 updatetable("fcw_user","pwd='".$pwd."',getpwd='' where id=".$id." and getpwd='".$tmp."'");
 $_SESSION[FCWuser]=$uid;
 $_SESSION[FCWuserID]=$row[usertype];
 php_toheader("../user/");
}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>重设密码 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
 <div class="dqwz fontyh">
 <ul class="u1"><li class="l1">当前位置：<a href="<?=weburl?>">首页</a> - 重设密码</li></ul>
 </div>
 
 <div class="getpassword">
  <ul class="u1">
  <li class="l1">重设密码</li>
  <li class="l2"></li>
  </ul>
 </div>
 
 <div class="getpwdmain">
  <form name="f1" method="post" onSubmit="return repwdtj(<?=$_GET[id]?>,'<?=$_GET[chk]?>','<?=$_GET[tmp]?>')">
  
  <ul class="u1">
  <li class="l1">帐号：</li>
  <li class="l2"><input value="<?=$uid?>" readonly="readonly" class="inp" type="text" style="width:184px;" /></li>
  <li class="l3"></li>
  </ul>
  
  <ul class="u1">
  <li class="l1">输入新密码：</li>
  <li class="l2"><input name="t1" class="inp" type="password" style="width:184px;" /></li>
  <li class="l3"></li>
  </ul>
  
  <ul class="u1">
  <li class="l1">重复新密码：</li>
  <li class="l2"><input name="t2" class="inp" type="password" style="width:184px;" /></li>
  <li class="l3"></li>
  </ul>
  
  <ul class="u1">
  <li class="l1"></li>
  <li class="l2"><? tjbtnr("提交保存");?></li>
  <li class="l3"></li>
  </ul>
  
  <input type="hidden" value="repwd" name="jvs" />
  </form>
 </div>
 
</div>

<? include("../template/bottom.html");?>
</body>
</html>