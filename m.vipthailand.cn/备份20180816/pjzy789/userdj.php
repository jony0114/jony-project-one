<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");

//������ʼ
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_userdj where name1='".sqlzhuru($_POST[t1])."'")==1){Audit_alert("�õȼ������Ѵ��ڣ�","userdj.php");}
 intotable("fcw_userdj","name1,money1,fysx,fyfb,sj,xh","'".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[tmoney1]).",".sqlzhuru($_POST[tfysx]).",".sqlzhuru($_POST[tfyfb]).",'".$sj."',".sqlzhuru($_POST[t2])."");
 php_toheader("userdj.php?t=suc");
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_userdj where name1='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1){Audit_alert("�õȼ��Ѵ��ڣ�","userdj.php?action=update&id=".$_GET[id]);}
 updatetable("fcw_userdj","name1='".sqlzhuru($_POST[t1])."',money1=".sqlzhuru($_POST[tmoney1]).",fysx=".sqlzhuru($_POST[tfysx]).",fyfb=".sqlzhuru($_POST[tfyfb]).",sj='".$sj."',xh=".sqlzhuru($_POST[t2])." where id=".$_GET[id]);
 php_toheader("userdj.php?t=suc&action=update&id=".$_GET[id]);

}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�����̨</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
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
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","userdj.php?action=".$_GET[action]."&id=".$_GET[id]);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��Ա�ȼ�</a>
 <a href="userdjlist.php">�����б�</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.tfysx.value).replace(/\s/,"")=="" || isNaN(document.f1.tfysx.value)){alert("��������Ч��Դˢ������");document.f1.tfysx.focus();return false;}
 if((document.f1.tfyfb.value).replace(/\s/,"")=="" || isNaN(document.f1.tfyfb.value)){alert("��������Ч��Դ��������");document.f1.tfyfb.focus();return false;}
 if((document.f1.tmoney1.value).replace(/\s/,"")=="" || isNaN(document.f1.tmoney1.value)){alert("��������ѣ�");document.f1.tmoney1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="userdj.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">�ȼ����ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">��ѣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney1" size="10" /><span class="fd">Ԫ/��</span></li>
 <li class="l1">��Դˢ�£�</li>
 <li class="l2"><input type="text" class="inp" name="tfysx" size="10" /><span class="fd">ÿ�շ�Դˢ����</span></li>
 <li class="l1">��Դ������</li>
 <li class="l2"><input type="text" class="inp" name="tfyfb" size="10" /><span class="fd">ÿ�շ�Դ������</span></li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" size="10" value="<?=returnxh("fcw_userdj","")?>" /><span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_userdj where id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("ditielist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 if((document.f1.tmoney1.value).replace(/\s/,"")=="" || isNaN(document.f1.tmoney1.value)){alert("��������ѣ�");document.f1.tmoney1.focus();return false;}
 if((document.f1.tfysx.value).replace(/\s/,"")=="" || isNaN(document.f1.tfysx.value)){alert("��������Ч��Դˢ������");document.f1.tfysx.focus();return false;}
 if((document.f1.tfyfb.value).replace(/\s/,"")=="" || isNaN(document.f1.tfyfb.value)){alert("��������Ч��Դ��������");document.f1.tfyfb.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="userdj.php?control=update&id=<?=$row[id]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">�ȼ����ƣ�</li>
 <li class="l2"><input type="text" value="<?=$row[name1]?>" class="inp" name="t1" /></li>
 <li class="l1">��ѣ�</li>
 <li class="l2"><input type="text" value="<?=$row[money1]?>" class="inp" name="tmoney1" size="10" /><span class="fd">Ԫ/��</span></li>
 <li class="l1">��Դˢ�£�</li>
 <li class="l2"><input type="text" class="inp" name="tfysx" size="10" value="<?=$row[fysx]?>" /><span class="fd">ÿ�շ�Դˢ����</span></li>
 <li class="l1">��Դ������</li>
 <li class="l2"><input type="text" class="inp" name="tfyfb" size="10" value="<?=$row[fyfb]?>" /><span class="fd">ÿ�շ�Դ������</span></li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" size="10" value="<?=$row[xh]?>" /><span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 <? }?>
 </div>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>