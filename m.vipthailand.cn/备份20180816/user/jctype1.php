<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(3!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
$sj=date("Y-m-d H:i:s");
//������ʼ
if($_GET[control]=="add"){
 zwzr();
 if(panduan("*","fcw_jia_myjctype where admin=1 and type1='".sqlzhuru($_POST[t1])."' and uid='".$_SESSION[FCWuser]."'")==1){Audit_alert("�÷����Ѵ��ڣ�","jctype1.php");}
 intotable("fcw_jia_myjctype","uid,admin,type1,xh,sj","'".$_SESSION[FCWuser]."',1,'".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[t2]).",'".$sj."'");
 php_toheader("jctype1.php?t=suc");
 
}elseif($_GET[control]=="update"){
 zwzr();
 if(panduan("*","fcw_jia_myjctype where admin=1 and type1='".sqlzhuru($_POST[t1])."' and uid='".$_SESSION[FCWuser]."' and id<>".$_GET[id])==1){Audit_alert("�÷����Ѵ��ڣ�","jctype1.php?action=update&id=".$_GET[id]);}
 updatetable("fcw_jia_myjctype","type1='".sqlzhuru($_POST[t1])."' where uid='".$_SESSION[FCWuser]."' and type1='".sqlzhuru($_POST[oldty1])."'");
 updatetable("fcw_jia_myjctype","sj='".$sj."',xh=".sqlzhuru($_POST[t2])." where uid='".$_SESSION[FCWuser]."' and id=".$_GET[id]);
 php_toheader("jctype1.php?t=suc&action=update&id=".$_GET[id]);

}
//�������
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
<script language="javascript" src="js/index.js"></script></head>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��������</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",10,");?>
 <? include("rcap13.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","jctype1.php?id=".$_GET[id]."&action=".$_GET[action])?>
 
 <? if($_GET[action]==""){?>
 <form name="f1" method="post" onsubmit="return tj()">
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="jctype1.php?control=add";
 }
 </script>
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �������ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" size="20" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ������ţ�</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("fcw_jia_myjctype"," and admin=1 and uid='".$_SESSION[FCWuser]."'")?>" size="5" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","jctypelist.php")?></li>
 </ul>
 </form>
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_jia_myjctype where uid='".$_SESSION[FCWuser]."' and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("jctypelist.php");}
 ?>
 <form name="f1" method="post" onsubmit="return tj()">
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="jctype1.php?control=update&id=<?=$_GET[id]?>";
 }
 </script>
 <input type="hidden" value="<?=$row[type1]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �������ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" value="<?=$row[type1]?>" size="20" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ������ţ�</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" size="5" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","jctypelist.php")?></li>
 </ul>
 </form>
 <? }?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>