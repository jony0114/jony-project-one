<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
//������ʼ
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_newstype where admin=2 and name1='".sqlzhuru($_POST[t0])."' and name2='".sqlzhuru($_POST[t1])."'")==1){Audit_alert("����Ѷ�����Ѵ��ڣ�","newstype1.php?ty1id=".$_GET[ty1id]);}
 intotable("fcw_newstype","name1,name2,sj,xh,admin,xswz,xstype","'".sqlzhuru($_POST[t0])."','".sqlzhuru($_POST[t1])."','".$sj."',".sqlzhuru($_POST[t2]).",2,'".$_GET[xs]."','".sqlzhuru($_POST[R1])."'");
 php_toheader("newstype1.php?t=suc&ty1id=".$_GET[ty1id]);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_newstype where admin=2 and name1='".sqlzhuru($_POST[t0])."' and name2='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1){Audit_alert("����Ѷ�����Ѵ��ڣ�","newstype1.php?action=update&id=".$_GET[id]."&ty1id=".$_GET[ty1id]);}
 updatetable("fcw_newstype","name2='".sqlzhuru($_POST[t1])."',sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",xstype='".sqlzhuru($_POST[R1])."',xswz='".$_GET[xs]."' where id=".$_GET[id]);
 php_toheader("newstype1.php?t=suc&action=update&id=".$_GET[id]."&ty1id=".$_GET[ty1id]);

}
//�������

while0("*","fcw_newstype where id=".$_GET[ty1id]);$row=mysql_fetch_array($res);

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
 <? $leftid=4;include("menu_quan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","newstype1.php?action=".$_GET[action]."&ty1id=".$_GET[ty1id]."&id=".$_GET[id]);}?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��Ѷ����</a>
 <a href="newstypelist.php">�����б�</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("��������Ѷ�������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 c=document.getElementsByName("C1");
 str="xcf";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+"xcf";}
 }
 layer.msg('������֤', {icon: 16  ,time: 0,shade :0.25});
 f1.action="newstype1.php?control=add&ty1id=<?=$_GET[ty1id]?>&xs="+str;
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">����ࣺ</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$row[name1]?>" name="t0" readonly="readonly" /></li>
 <li class="l1">С���ࣺ</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("fcw_newstype"," and admin=2 and name1='".$row[name1]."'")?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l1">��ʾ��ʽ��</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="font" checked="checked" /> �����б�</label>
 <label><input name="R1" type="radio" value="pic" /> ͼƬ�б�</label>
 </li>
 </li>
 <li class="l1">��ʾλ�ã�</li>
 <li class="l2">
 <label><input name="C1" type="checkbox" value="��ҳ" /> ��ҳ</label>
 <label><input name="C1" type="checkbox" value="С��" /> С��</label>
 <label><input name="C1" type="checkbox" value="����" /> ����</label>
 <label><input name="C1" type="checkbox" value="����" /> ����</label>
 <label><input name="C1" type="checkbox" value="����" /> ����</label>
 <label><input name="C1" type="checkbox" value="��" /> ��</label>
 <label><input name="C1" type="checkbox" value="������" /> ������</label>
 <label><input name="C1" type="checkbox" value="�н�" /> �н�</label>
 <label><input name="C1" type="checkbox" value="�Ҿ�" /> �Ҿ�</label>
 </li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while1("*","fcw_newstype where id=".$_GET[id]);if(!$row1=mysql_fetch_array($res1)){php_toheader("newstypelist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("��������Ѷ�������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 c=document.getElementsByName("C1");
 str="xcf";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+"xcf";}
 }
 layer.msg('������֤', {icon: 16  ,time: 0,shade :0.25});
 f1.action="newstype1.php?control=update&id=<?=$row1[id]?>&ty1id=<?=$_GET[ty1id]?>&xs="+str;
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="<?=$row[name1]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">�����ƣ�</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$row[name1]?>" name="t0" readonly="readonly" /></li>
 <li class="l1">С���ࣺ</li>
 <li class="l2"><input type="text" value="<?=$row1[name2]?>" class="inp" name="t1" /></li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row1[xh]?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l1">��ʾ��ʽ��</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="font" <? if($row1[xstype]=="font"){?> checked="checked"<? }?> /> �����б�</label>
 <label><input name="R1" type="radio" value="pic" <? if($row1[xstype]=="pic"){?> checked="checked"<? }?> /> ͼƬ�б�</label>
 </li>
 <li class="l1">��ʾλ�ã�</li>
 <li class="l2">
 <label><input name="C1" type="checkbox" value="��ҳ" <? if(check_in("xcf��ҳ",$row1[xswz])){?>checked="checked"<? }?> /> ��ҳ</label>
 <label><input name="C1" type="checkbox" value="С��" <? if(check_in("xcfС��",$row1[xswz])){?>checked="checked"<? }?> /> С��</label>
 <label><input name="C1" type="checkbox" value="����" <? if(check_in("xcf����",$row1[xswz])){?>checked="checked"<? }?> /> ����</label>
 <label><input name="C1" type="checkbox" value="����" <? if(check_in("xcf����",$row1[xswz])){?>checked="checked"<? }?> /> ����</label>
 <label><input name="C1" type="checkbox" value="����" <? if(check_in("xcf����",$row1[xswz])){?>checked="checked"<? }?> /> ����</label>
 <label><input name="C1" type="checkbox" value="��" <? if(check_in("xcf��",$row1[xswz])){?>checked="checked"<? }?> /> ��</label>
 <label><input name="C1" type="checkbox" value="������" <? if(check_in("xcf������",$row1[xswz])){?>checked="checked"<? }?> /> ������</label>
 <label><input name="C1" type="checkbox" value="�н�" <? if(check_in("xcf�н�",$row1[xswz])){?>checked="checked"<? }?> /> �н�</label>
 <label><input name="C1" type="checkbox" value="�Ҿ�" <? if(check_in("xcf�Ҿ�",$row1[xswz])){?>checked="checked"<? }?> /> �Ҿ�</label>
 </li>
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