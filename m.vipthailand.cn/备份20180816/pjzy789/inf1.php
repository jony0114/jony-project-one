<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST[yjcode])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_control")==0){intotable("code_control","webnamev","'����ʧ��'");}
 $regmob=sqlzhuru($_POST[Rregmob]);
 updatetable("fcw_control","
			  userfb='".sqlzhuru($_POST[R1])."',
			  userfy='".sqlzhuru($_POST[R2])."',
			  jjrfb='".sqlzhuru($_POST[R3])."',
			  jjrfy='".sqlzhuru($_POST[R4])."',
			  zjfb='".sqlzhuru($_POST[Rzjfb])."',
			  zjfy='".sqlzhuru($_POST[Rzjfy])."',
			  jcfb='".sqlzhuru($_POST[Rjcfb])."',
			  jcfy='".sqlzhuru($_POST[Rjcfy])."',
			  jiafb='".sqlzhuru($_POST[R5])."',
			  jialook='".sqlzhuru($_POST[R6])."',
			  fkfb='".sqlzhuru($_POST[R7])."',
			  fklook='".addslashes($_POST[R8])."',
			  ifqq='".sqlzhuru($_POST[R11])."',
			  ifjia=".sqlzhuru($_POST[Rifjia]).",
			  regmob=".$regmob.",
			  fangmot=".sqlzhuru($_POST[Rfangmot]).",
			  ifwap=".$_POST[Rifwap].",
			  ifuc=".$_POST[Rifuc]."
			  ");
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../img/anzhuo.apk");
 php_toheader("inf1.php?t=suc");
}

while0("*","fcw_control");$row=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
f1.action="inf1.php";
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? include("rightcap1.php");?>
 <script language="javascript">document.getElementById("rtit2").className="a1";</script>
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","inf1.php");}?>
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" name="yjcode" value="control" />
 <ul class="rcap"><li class="l1"></li><li class="l2">�����û�</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">��Ϣ����Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="off" <? if($row[userfb]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="R1" type="radio" value="on" <? if($row[userfb]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 <li class="l1">��ϢչʾȨ�ޣ�</li>
 <li class="l2">
 <label><input name="R2" type="radio" value="off" <? if($row[userfy]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="R2" type="radio" value="on" <? if($row[userfy]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">������</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">��Ϣ����Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="R3" type="radio" value="off" <? if($row[jjrfb]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="R3" type="radio" value="on" <? if($row[jjrfb]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 <li class="l1">��ϢչʾȨ�ޣ�</li>
 <li class="l2">
 <label><input name="R4" type="radio" value="off" <? if($row[jjrfy]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="R4" type="radio" value="on" <? if($row[jjrfy]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">�н鹫˾</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">��Ϣ����Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="Rzjfb" type="radio" value="off" <? if($row[zjfb]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="Rzjfb" type="radio" value="on" <? if($row[zjfb]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 <li class="l1">��ϢչʾȨ�ޣ�</li>
 <li class="l2">
 <label><input name="Rzjfy" type="radio" value="off" <? if($row[zjfy]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="Rzjfy" type="radio" value="on" <? if($row[zjfy]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">������˾</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">��Ϣ����Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="R7" type="radio" value="off" <? if($row[fkfb]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="R7" type="radio" value="on" <? if($row[fkfb]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 <li class="l1">��ϢչʾȨ�ޣ�</li>
 <li class="l2">
 <label><input name="R8" type="radio" value="off" <? if($row[fklook]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="R8" type="radio" value="on" <? if($row[fklook]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">���/װ��</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">��Ϣ����Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="R5" type="radio" value="off" <? if($row[jiafb]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="R5" type="radio" value="on" <? if($row[jiafb]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 <li class="l1">��ϢչʾȨ�ޣ�</li>
 <li class="l2">
 <label><input name="R6" type="radio" value="off" <? if($row[jialook]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="R6" type="radio" value="on" <? if($row[jialook]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">���Ĺ�˾</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">��Ϣ����Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="Rjcfb" type="radio" value="off" <? if($row[jcfb]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="Rjcfb" type="radio" value="on" <? if($row[jcfb]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 <li class="l1">��ϢչʾȨ�ޣ�</li>
 <li class="l2">
 <label><input name="Rjcfy" type="radio" value="off" <? if($row[jcfy]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="Rjcfy" type="radio" value="on" <? if($row[jcfy]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">��������</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">�Ҳ�ͷ���</li>
 <li class="l2">
 <label><input name="R11" type="radio" value="on" <? if($row[ifqq]=="on"){?> checked="checked"<? }?> /> ����</label>
 <label><input name="R11" type="radio" value="off" <? if($row[ifqq]=="off"){?> checked="checked"<? }?> /> �ر�</label>
 </li>
 <li class="l1">��Դ��ϵ��ʽ��</li>
 <li class="l2">
 <label><input name="Rfangmot" type="radio" value="0" <? if(empty($row[fangmot])){?> checked="checked"<? }?> /> Ĭ��</label>
 <label><input name="Rfangmot" type="radio" value="1" <? if($row[fangmot]==1){?> checked="checked"<? }?> /> ����(��ʾ��վ�����)</label>
 </li>
 <li class="l1">�ֻ��棺</li>
 <li class="l2">
 <label><input name="Rifwap" type="radio" value="0" <? if(empty($row[ifwap])){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Rifwap" type="radio" value="1" <? if(1==$row[ifwap]){?> checked="checked"<? }?> /> �ر�</label>
 </li>
 <li class="l1">��׿APP��</li>
 <li class="l2"><input class="inp1" type="file" name="inp1" id="inp1" size="15" accept=".apk"></li>
 <? if(is_file("../img/anzhuo.apk")){?>
 <li class="l8"></li>
 <li class="l9"><a href="../img/anzhuo.apk" target="_blank"><img border="0" src="img/anzhuo.png" width="54" height="54" /></a></li>
 <? }?>
 <li class="l1">��װ�ݣ�</li>
 <li class="l2">
 <label><input name="Rifjia" type="radio" value="1" <? if(1==$row[ifjia]){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Rifjia" type="radio" value="0" <? if(0==$row[ifjia]){?> checked="checked"<? }?> /> �ر�</label>
 </li>
 <li class="l1">ע�������֤��</li>
 <li class="l2">
 <label><input name="Rregmob" type="radio" value="1" <? if(1==$row[regmob]){?> checked="checked"<? }?> /> ����</label> 
 <label><input name="Rregmob" type="radio" value="0" <? if(0==$row[regmob]){?> checked="checked"<? }?> /> �ر�</label>
 </li>
 <li class="l1">�Ƿ���UC��</li>
 <li class="l2">
 <label><input name="Rifuc" type="radio" value="0" <? if(empty($row[ifuc])){?> checked="checked"<? }?> /> ������</label>
 <label><input name="Rifuc" type="radio" value="1" <? if($row[ifuc]==1){?> checked="checked"<? }?> /> ����</label>
 <span class="fd">(<a href="http://www.yj99.cn/faq/view41.html" target="_blank" class="red">�鿴�̳�</a>)</span>
 </li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--End-->
 
</div>
</div>

<?php include("bottom.php");?>

</body>
</html>