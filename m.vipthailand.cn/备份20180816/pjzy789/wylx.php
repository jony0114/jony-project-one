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
 if(panduan("*","fcw_wylx where name1='".sqlzhuru($_POST[t1])."' or name2='".sqlzhuru($_POST[t1])."'")==1){Audit_alert("����ҵ�����Ѵ��ڣ�","wylx.php");}
 intotable("fcw_wylx","name1,name2,xh,sj,ifuse,ifsys,xs","'".sqlzhuru($_POST[t1])."','".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[t2]).",'".$sj."','".sqlzhuru($_POST[R1])."',0,'".$_GET[xs]."'");$id=mysql_insert_id();
 uploadtpnodata(1,"upload/wylx/",$id.".jpg","allpic",100,100);
 php_toheader("wylx.php?t=suc");
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","fcw_wylx where (name1='".sqlzhuru($_POST[t1])."' or name2='".sqlzhuru($_POST[t1])."') and id<>".$_GET[id])==1){Audit_alert("����ҵ�����Ѵ��ڣ�","wylx.php?action=update&id=".$_GET[id]);}
 updatetable("fcw_wylx","name2='".sqlzhuru($_POST[t1])."',sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",ifuse='".sqlzhuru($_POST[R1])."',xs='".$_GET[xs]."' where id=".$_GET[id]);
 uploadtpnodata(1,"upload/wylx/",$_GET[id].".jpg","allpic",100,100);
 php_toheader("wylx.php?t=suc&action=update&id=".$_GET[id]);

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
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","wylx.php?action=".$_GET[action]."&id=".$_GET[id]);}?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��ҵ����</a>
 <a href="wylxlist.php">�����б�</a>
 </div> 

 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 c=document.getElementsByName("C1");
 str=",";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+",";}
 }
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="wylx.php?control=add&xs="+str;
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">��ҵ���ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("fcw_wylx","")?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l1">����С�飺</li>
 <li class="l2">
 <label><input name="C1" type="checkbox" value="chushou" /> ����</label>
 <label><input name="C1" type="checkbox" value="chuzu" /> ����</label>
 <label><input name="C1" type="checkbox" value="qiugou" /> ��</label>
 <label><input name="C1" type="checkbox" value="qiuzu" /> ����</label>
 <label><input name="C1" type="checkbox" value="loupan" /> ¥��</label>
 <label><input name="C1" type="checkbox" value="zhuanrang" /> ת��</label>
 </li>
 <li class="l1">�Ƿ����ã�</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="on" checked="checked" />  ����</label> 
 <label><input name="R1" type="radio" value="off" /> <span class="red">����</span></label>
 </li>
 <li class="l1">����ͼ�꣺</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15"></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_wylx where id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("wylxlist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 c=document.getElementsByName("C1");
 str=",";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+",";}
 }
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="wylx.php?control=update&id=<?=$row[id]?>&xs="+str;
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[name1]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">ԭʼ���ƣ�</li>
 <li class="l2"><input type="text" value="<?=$row[name1]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">չʾ���ƣ�</li>
 <li class="l2"><input type="text" value="<?=$row[name2]?>" class="inp" name="t1" /></li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l1">����С�飺</li>
 <li class="l2">
 <label><input name="C1" type="checkbox" value="chushou"<? if(strstr($row[xs],"chushou")){?> checked="checked"<? }?> /> ����</label>
 <label><input name="C1" type="checkbox" value="chuzu"<? if(strstr($row[xs],"chuzu")){?> checked="checked"<? }?> /> ����</label>
 <label><input name="C1" type="checkbox" value="qiugou"<? if(strstr($row[xs],"qiugou")){?> checked="checked"<? }?> /> ��</label>
 <label><input name="C1" type="checkbox" value="qiuzu"<? if(strstr($row[xs],"qiuzu")){?> checked="checked"<? }?> /> ����</label>
 <label><input name="C1" type="checkbox" value="loupan"<? if(strstr($row[xs],"loupan")){?> checked="checked"<? }?> /> ¥��</label>
 <label><input name="C1" type="checkbox" value="zhuanrang"<? if(strstr($row[xs],"zhuanrang")){?> checked="checked"<? }?> /> ת��</label>
 </li>
 <li class="l1">�Ƿ����ã�</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="on"<? if($row[ifuse]=="on"){?> checked="checked"<? }?> /> ����</label>
 <label><input name="R1" type="radio" value="off"<? if($row[ifuse]=="off"){?> checked="checked"<? }?> /> <span class="red">����</span></label>
 </li>
 <li class="l1">����ͼ�꣺</li>
 <li class="l2"><input type="file" name="inp1" class="inp1" id="inp1" size="25"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../upload/wylx/<?=$row[id]?>.jpg?r=<?=rnd_num(100)?>" width="54" height="54" /></li>
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