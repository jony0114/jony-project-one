<?php
include("../config/conn.php");
include("../config/function.php");
if($_SESSION["FCWADMINSES"]!="" && $_SESSION["FCWPWDSES"]!=""){php_toheader("default.php");}
//������ʼ
if($_GET[a]=="login"){
 if(strtolower($_SESSION["NYZSES"])!=strtolower(sqlzhuru($_POST[t3]))){Audit_alert("��֤������","index.php");}
 zwzr();
 while0("*","fcw_admin where adminuid='".sqlzhuru($_POST[t1])."' and adminpwd='".sha1(sqlzhuru($_POST[t2]))."'");if($row=mysql_fetch_array($res)){
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("fcw_loginlog","admin,uid,sj,uip","2,'".$row[adminuid]."','".$sj."','".$uip."'");
 $_SESSION["FCWADMINSES"]=sqlzhuru($_POST[t1]);
 $_SESSION["FCWPWDSES"]=$row[adminpwd];
 php_toheader("default.php");
 }else{
 Audit_alert("�����֤���󣬷������ԣ�","index.php");
 }
}
//��������
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����Աϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function login(){
if((document.f1.t1.value).replace(/\s/,"")==""){alert("�������¼�ʺ�!");document.f1.t1.focus();return false;}	
if((document.f1.t2.value).replace(/\s/,"")==""){alert("�������¼����!");document.f1.t2.focus();return false;}	
if((document.f1.t3.value).replace(/\s/,"")==""){alert("��������֤�� !");document.f1.t3.focus();return false;}	
f1.action="index.php?a=login";
}
</script>
</head>
<body>
<div class="main">
 <div class="lmain">
  <form name="f1" method="post" onsubmit="return login()">
  <ul class="u1">
  <li class="l1">�������ĵ�¼��Ϣ</li>
  <li class="l2">��¼�ʺţ�</li>
  <li class="l3"><input class="inp1" type="text" onblur="this.className='inp1';" onfocus="this.className='inp1 inp2';" name="t1" /></li>
  <li class="l2">�������룺</li>
  <li class="l3"><input class="inp1" type="password" onblur="this.className='inp1';" onfocus="this.className='inp1 inp2';" name="t2" /></li>
  <li class="l2">�� ֤ �룺</li>
  <li class="l31">
  <input class="inp1" type="text" onblur="this.className='inp1';" onfocus="this.className='inp1 inp2';" name="t3" />
  <img src="../config/yzSes.php" onclick="this.src='../config/yzSes.php'" />
  </li>
  <li class="l5"><input type="image" src="img/loginbtn.gif" width="101" height="32" /></li>
  <li class="l4"></li>
  </ul>
  </form>
  <ul class="u2">
  <li class="l1"><img src="img/close.gif" width="19" height="19" style="cursor:pointer;" onclick="javascript:window.close();" /></li>
  <li class="l2"><a href="../" target="_blank"><?=webname?></a><br><?=$rowcontrol[webtongji]?></li>
  <li class="l3"></li>
  </ul>
 </div>
</div>
</body>
</html>