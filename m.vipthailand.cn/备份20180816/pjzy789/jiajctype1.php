<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");

//������ʼ
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_jia_jctype where admin=1 and type1='".sqlzhuru($_POST[t1])."'")==1){Audit_alert("�÷����Ѵ��ڣ�","jiajctype1.php");}
 intotable("fcw_jia_jctype","admin,type1,xh,sj","1,'".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[t2]).",'".$sj."'");$id=mysql_insert_id();
 uploadtpnodata(1,"upload/typeimg/","jc".$id.".png","allpic",35,35);
 php_toheader("jiajctype1.php?t=suc");
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_jia_jctype where admin=1 and type1='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1)
 {Audit_alert("�÷����Ѵ��ڣ�","jiajctype1.php?action=update&id=".$_GET[id]);}
 updatetable("fcw_jia_jctype","type1='".sqlzhuru($_POST[t1])."' where type1='".sqlzhuru($_POST[oldty1])."'");
 updatetable("fcw_jia_jctype","sj='".$sj."',xh=".sqlzhuru($_POST[t2])." where id=".$_GET[id]);
 uploadtpnodata(1,"upload/typeimg/","jc".$_GET[id].".png","allpic",35,35);
 php_toheader("jiajctype1.php?t=suc&action=update&id=".$_GET[id]);

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
 <? $leftid=3;include("menu_quan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","jiajctype1.php?action=".$_GET[action]."&id=".$_GET[id]);}?>

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">�Ҿӽ��ķ���</a>
 <a href="jiajctypelist.php">�����б�</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="jiajctype1.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("fcw_jia_jctype"," and admin=1")?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l1">����ͼ�꣺</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="15"><span class="fd">png��ʽ,��ѳߴ磺35*35</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_jia_jctype where admin=1 and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("jiajctypelist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="jiajctype1.php?control=update&id=<?=$row[id]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[type1]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">�������ƣ�</li>
 <li class="l2"><input type="text" value="<?=$row[type1]?>" class="inp" name="t1" /></li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l1">����ͼ�꣺</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="25"><span class="fd">png��ʽ,��ѳߴ磺35*35</span></li>
 <li class="l8"></li>
 <li class="l9"><img src="../upload/typeimg/jc<?=$row[id]?>.png?r=<?=rnd_num(100)?>" width="54" height="54" /></li>
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