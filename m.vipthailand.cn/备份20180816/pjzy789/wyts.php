<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");

//������ʼ
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_wyts where name1='".sqlzhuru($_POST[t1])."'")==1){Audit_alert("����ɫ�����Ѵ��ڣ�","wyts.php");}
 intotable("fcw_wyts","name1,sj,xh,cswy,czwy,lpwy","'".sqlzhuru($_POST[t1])."','".$sj."',".sqlzhuru($_POST[t2]).",'".$_GET[cs]."','".$_GET[cz]."','".$_GET[lp]."'");
 php_toheader("wyts.php?t=suc");
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_wyts where name1='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1){Audit_alert("����ɫ�����Ѵ��ڣ�","wyts.php?action=update&id=".$_GET[id]);}
 updatetable("fcw_wyts","name1='".sqlzhuru($_POST[t1])."',sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",cswy='".$_GET[cs]."',czwy='".$_GET[cz]."',lpwy='".$_GET[lp]."' where id=".$_GET[id]);
 php_toheader("wyts.php?t=suc&action=update&id=".$_GET[id]);

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
 <? $leftid=2;include("menu_quan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","wyts.php?action=".$_GET[action]."&id=".$_GET[id]);}?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��ҵ��ɫ</a>
 <a href="wytslist.php">�����б�</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 c=document.getElementsByName("C1");
 str="xcf";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+"xcf";}
 }
 c11=document.getElementsByName("C11");
 str1="xcf";
 for(i=0;i<c11.length;i++){
 if(c11[i].checked){str1=str1+c11[i].value+"xcf";}
 }
 c12=document.getElementsByName("C12");
 str2="xcf";
 for(i=0;i<c12.length;i++){
 if(c12[i].checked){str2=str2+c12[i].value+"xcf";}
 }
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="wyts.php?control=add&cs="+str+"&cz="+str1+"&lp="+str2;
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">��ɫ���ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 </ul>
 
 <ul class="uk1 uk0">
 <li class="l1">������Ŀ��</li>
 <li class="l2">
 <label><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</label>
 <?
 $xs="chushou";
 while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <label><input name="C1" type="checkbox" value="<?=$row1[name1]?>" /> <?=$row1[name2]?></label>
 <?
 }
 ?>
 </li>
 </ul>
 
 <ul class="uk1 uk0">
 <li class="l1">������Ŀ��</li>
 <li class="l2">
 <label><input name="C21" type="checkbox" onclick="xuan1()" /> ȫѡ</label>
 <?
 $xs="chuzu";
 while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <label><input name="C11" type="checkbox" value="<?=$row1[name1]?>" /> <?=$row1[name2]?></label>
 <?
 }
 ?>
 </li>
 </ul>
 
 <ul class="uk1 uk0">
 <li class="l1">¥����Ŀ��</li>
 <li class="l2">
 <label><input name="C12" type="checkbox" value="¥��" /> ¥��</label>
 </li>
 </ul>
 
 <ul class="uk uk0">
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("fcw_wyts","")?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_wyts where id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("wytslist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 c=document.getElementsByName("C1");
 str="xcf";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+"xcf";}
 }
 c11=document.getElementsByName("C11");
 str1="xcf";
 for(i=0;i<c11.length;i++){
 if(c11[i].checked){str1=str1+c11[i].value+"xcf";}
 }
 c12=document.getElementsByName("C12");
 str2="xcf";
 for(i=0;i<c12.length;i++){
 if(c12[i].checked){str2=str2+c12[i].value+"xcf";}
 }
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="wyts.php?control=update&id=<?=$row[id]?>&cs="+str+"&cz="+str1+"&lp="+str2;
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">��ɫ���ƣ�</li>
 <li class="l2"><input type="text" class="inp" value="<?=$row[name1]?>" name="t1" /></li>
 </ul>
 
 <ul class="uk1 uk0">
 <li class="l1">������Ŀ��</li>
 <li class="l2">
 <label><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</label>
 <?
 $xs="chushou";
 while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <label><input name="C1" type="checkbox" value="<?=$row1[name1]?>"<? if(strstr($row[cswy],"xcf".$row1[name1]."xcf")){?> checked="checked"<? }?> /> <?=$row1[name2]?></label>
 <?
 }
 ?>
 </li>
 </ul>
 
 <ul class="uk1 uk0">
 <li class="l1">������Ŀ��</li>
 <li class="l2">
 <label><input name="C21" type="checkbox" onclick="xuan1()" /> ȫѡ</label>
 <?
 $xs="chuzu";
 while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <label><input name="C11" type="checkbox" value="<?=$row1[name1]?>"<? if(strstr($row[czwy],"xcf".$row1[name1]."xcf")){?> checked="checked"<? }?> /> <?=$row1[name2]?></label>
 <?
 }
 ?>
 </li>
 </ul>
 
 <ul class="uk1 uk0">
 <li class="l1">¥����Ŀ��</li>
 <li class="l2">
 <label><input name="C12" type="checkbox" value="¥��"<? if(strstr($row[lpwy],"xcf¥��xcf")){?> checked="checked"<? }?> /> ¥��</label>
 </li>
 </ul>
 
 <ul class="uk uk0">
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
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