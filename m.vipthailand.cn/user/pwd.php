<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

//��������ʼ
if($_POST[jvs]=="password"){
 zwzr();
 $pwd=sha1(sqlzhuru($_POST[t1]));
 $pwd1=sha1(sqlzhuru($_POST[t2]));
 $pwd2=sqlzhuru($_POST[t2]);
 $uid=$_SESSION[FCWuser];
 if(panduan("*","fcw_user where uid='".$uid."' and pwd='".$pwd."'")==0){Audit_alert("ԭ������֤ʧ�ܣ��������ԣ�","pwd.php");}
 updatetable("fcw_user","pwd='".$pwd1."' where uid='".$uid."'");
 include("../template/uc/pwd.php");
 php_toheader("pwd.php?t=suc");
}
//����������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("�����������");document.f1.t1.focus();return false;}	
 if((document.f1.t2.value).replace(/\s/,"")==""){alert("������������");document.f1.t2.focus();return false;}	
 if(document.f1.t2.value!=document.f1.t3.value){alert("��������������벻һ��");document.f1.t3.focus();return false;}	
 tjwait();
 f1.action="pwd.php";
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �޸ĵ�¼����</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap3").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","pwd.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="password" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �������룺</li>
 <li class="l2"><input type="password" class="inp" name="t1" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �����룺</li>
 <li class="l2"><input type="password" class="inp" name="t2" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ȷ�����룺</li>
 <li class="l2"><input type="password" class="inp" name="t3" /></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("�����޸�")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>