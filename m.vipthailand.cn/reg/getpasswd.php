<?
include("../config/conn.php");
include("../config/function.php");

if(sqlzhuru($_POST[jvs])=="getpwd"){
 zwzr();
 $uid=sqlzhuru($_POST[t0]);
 $m=sqlzhuru($_POST[t1]);
 if(strtolower($_SESSION["NYZSES"])!=strtolower(sqlzhuru($_POST[t2]))){Audit_alert("��֤������","getpasswd.php");}
 while0("id,uid,email","fcw_user where email='".$m."' and uid='".$uid."'");if(!$row=mysql_fetch_array($res)){Audit_alert("�ʺ������䲻ƥ�䣡","getpasswd.php");}

 //SMSMAIL���
 if($rowcontrol[mailname]!="" && $rowcontrol[mailpwd]!="" && $rowcontrol[mailsmtp]!=""){
  $rnd=MakePass(6);
  updatetable("fcw_user","getpwd='".$rnd."' where id=".$row[id]);
  $str=weburl."reg/repwd.php?id=".$row[id]."&chk=".sha1($row[id].weburl)."&tmp=".$rnd;
  $txt="�𾴵��û����ã�<br><br>����".webname."(".weburl.")���������������ʼ���(������������˲������벻�������ʼ�)<br><br>�����������ӽ����������裨������ܵ�����븴�Ƶ���ַ���򿪣�<br><br><a href=\"".$str."\">".$str."</a><br><hr><br><br>������������μ����������룡<br><br>��л��ʹ��".webname."!";
  require("../config/mailphp/sendmail.php");
  yjsendmail("�һ����롾".webname."��",$m,$txt);
  php_toheader("getpasswd.php?t=suc&m=".$m);
 }else{Audit_alert("��վû����������Ͷ�ݹ��ܣ�����ϵ�ͷ�����","getpasswd.php");}
 //SMSMAIL���
 
 exit;
}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�һ����� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
 <div class="dqwz fontyh">
 <ul class="u1"><li class="l1">��ǰλ�ã�<a href="<?=weburl?>">��ҳ</a> - �һ�����</li></ul>
 </div>
 
 <div class="getpassword">
  <ul class="u1">
  <li class="l1">ͨ�������һ�����</li>
  <li class="l2"><a href="getmm.php" class="feng">ѡ��������ʽ�һ�</a></li>
  </ul>
 </div>
 
 <div class="getpwdmain">
  <? if($_GET[t]=="suc"){?><div class="sucts">���ã�������������<?=$_GET[m]?>����һ���һ�������ʼ������¼����鿴</div><? }?>
  <form name="f1" method="post" onSubmit="return getpwdtj()">
  
  <ul class="u1">
  <li class="l1">��¼�ʺţ�</li>
  <li class="l2"><input name="t0" class="inp" type="text" style="width:204px;" /></li>
  <li class="l3">
  <span id="ts1">�������¼�ʺ�</span>
  </li>
  </ul>
  
  <ul class="u1">
  <li class="l1">Email���䣺</li>
  <li class="l2"><input name="t1" class="inp" type="text" style="width:204px;" /></li>
  <li class="l3">
  <span id="ts1">����������</span>
  </li>
  </ul>
    
  <ul class="u1">
  <li class="l1">��֤�룺</li>
  <li class="l4"><input name="t2" class="inp" type="text" style="width:94px;" /></li>
  <li class="l5"><img src="../config/yzSes.php" /></li>
  <li class="l3">
  <span id="ts6">��֤�벻���ִ�Сд</span>
  </li>
  </ul>
  
  <ul class="u1">
  <li class="l1"></li>
  <li class="l2"><? tjbtnr("��һ��");?></li>
  <li class="l3"></li>
  </ul>
  
  <input type="hidden" value="getpwd" name="jvs" />
  </form>
 </div>
 
</div>

<? include("../template/bottom.html");?>
</body>
</html>