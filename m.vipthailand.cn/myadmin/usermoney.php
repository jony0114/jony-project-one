<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","fcw_user where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("userlist.php");}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 PointIntoM(sqlzhuru($_POST[tuid]),sqlzhuru($_POST[t2]),sqlzhuru($_POST[t1]));
 PointUpdateM(sqlzhuru($_POST[tuid]),sqlzhuru($_POST[t1])); 
 php_toheader("usermoney.php?t=suc&id=".$id);

}
//�������
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
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("��������Ч�Ľ�Ǯ����!");document.f1.t1.select();return false;}
 if(isNaN(document.f1.t1.value)){alert("��������Ч�Ľ�Ǯ����!");document.f1.t1.select();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="usermoney.php?control=update&id=<?=$row[id]?>";
 }
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu2").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_user.php");?>

<div class="right">
 <? include("rightcap5.php");?>
 <script language="javascript">document.getElementById("rtit3").className="a1";</script>
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","usermoney.php?id=".$id);}?>
 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">��Ա�ʺţ�</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /></li>
 <li class="l1">������</li>
 <li class="l2"><input class="inp redony" readonly="readonly" value="<?=$row[money1]?>" size="5" type="text"/></li>
 <li class="l1">��Ǯ������</li>
 <li class="l2"><input name="t1" class="inp" size="5" type="text" /><span class="fd">������ʾ���ӣ�������ʾ���٣��磺100��+100��ʾ����100��Ǯ��-100��ʾ��ȥ100��Ǯ</span></li>
 <li class="l1">˵����</li>
 <li class="l2"><input name="t2" class="inp" size="50" type="text" /></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>