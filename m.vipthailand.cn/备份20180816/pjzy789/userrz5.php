<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$id=$_GET[id];

//������ʼ
if(sqlzhuru($_POST[jvs])=="sf"){
 zwzr();
 $sfz=sqlzhuru($_POST[tsfz]);
 if(strlen(stripos($sfz,"/"))>0 || strlen(stripos($sfz,";"))>0){Audit_alert("���֤�����ʽ����","userrz5.php?id=".$id);}
 updatetable("fcw_user","
			 uname='".sqlzhuru($_POST[tuname])."',
			 sfz='".$sfz."',
			 sfzrz=".sqlzhuru($_POST[R1]).",
			 sfzrzsm='".sqlzhuru($_POST[tsfzrzsm])."' 
			 where id=".$id);
 uploadtpnodata(1,"upload/".$id."/",strgb2312($sfz,0,15)."-1.jpg","allpic",510,300);
 uploadtpnodata(2,"upload/".$id."/",strgb2312($sfz,0,15)."-2.jpg","allpic",510,300);
 php_toheader("userrz5.php?t=suc&id=".$id); 

}elseif(sqlzhuru($_POST[jvs])=="yy"){
 $yyzz=sqlzhuru($_POST[tyyzz]);
 if(strlen(stripos($yyzz,"/"))>0 || strlen(stripos($yyzz,";"))>0){Audit_alert("Ӫҵִ�պ����ʽ����","userrz5.php?id=".$id);}
 updatetable("fcw_user","
			 company='".sqlzhuru($_POST[tcompany])."',
			 yyzz='".$yyzz."',
			 yyzzrz=".sqlzhuru($_POST[R2]).",
			 yyzzrzsm='".sqlzhuru($_POST[tyyzzrzsm])."' 
			 where id=".$id);
 uploadtpnodata(3,"upload/".$id."/",strgb2312($yyzz,0,15).".jpg","allpic",510,300);
 php_toheader("userrz5.php?t=suc&id=".$id); 

}
//�������
while0("*","fcw_user where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("userlist.php");}
$sfz1="../upload/".$id."/".strgb2312($row[sfz],0,15)."-1.jpg";
$sfz2="../upload/".$id."/".strgb2312($row[sfz],0,15)."-2.jpg";
$yyzz1="../upload/".$id."/".strgb2312($row[yyzz],0,15).".jpg";
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
function tjsf(){
 if((document.fsf.tuname.value).replace("/\s/","")==""){alert("��������ʵ����");document.fsf.tuname.focus();return false;}
 if((document.fsf.tsfz.value).replace("/\s/","")==""){alert("���������֤����");document.fsf.tsfz.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 fsf.action="userrz5.php?id=<?=$id?>";
}
function tjyy(){
 if((document.fyy.tcompany.value).replace("/\s/","")==""){alert("�����빫˾����");document.fyy.tcompany.focus();return false;}
 if((document.fyy.tyyzz.value).replace("/\s/","")==""){alert("������Ӫҵִ�պ���");document.fyy.tyyzz.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 fyy.action="userrz5.php?id=<?=$id?>";
}
function sfzrzonc(x){
if(2==x){document.getElementById("sfzrzsmv").style.display="";}else{document.getElementById("sfzrzsmv").style.display="none";}
}
function yyzzrzonc(x){
if(2==x){document.getElementById("yyzzrzsmv").style.display="";}else{document.getElementById("yyzzrzsmv").style.display="none";}
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
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","userrz5.php?id=".$id);}?>
 <? include("rightcap5.php");?>
 <script language="javascript">document.getElementById("rtit2").className="a1";</script>
 <!--B-->
 <div class="rkuang">
 <form name="fsf" method="post" onsubmit="return tjsf()" enctype="multipart/form-data">
 <input type="hidden" value="sf" name="jvs" />
 <ul class="uk">
 <li class="l1">��֤״̬��</li>
 <li class="l21">
 <? 
 if(0==$row[sfzrz]){echo "&nbsp;<strong class='blue'>���֤���ύ����Ҫ�����֤</strong>";}
 elseif(1==$row[sfzrz]){echo "&nbsp;<strong class='green'>�Ѿ�ͨ��ʵ����֤</strong>";}
 elseif(2==$row[sfzrz]){echo "&nbsp;<strong class='red'>��֤���ܣ�ԭ��".$row[sfzrzsm]."</strong>";}
 elseif(3==$row[sfzrz]){echo "&nbsp;<strong>δ�ύ��֤����</strong>";}
 ?>
 </li>
 <li class="l1">��Ա�ʺţ�</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
 </li>
 <li class="l1">���֤��ˣ�</li>
 <li class="l2">
 <label><input name="R1" type="radio" onclick="sfzrzonc(0)" value="0"<? if(0==$row[sfzrz]){?> checked="checked"<? }?> /> �ȴ����</label>
 <label><input name="R1" type="radio" onclick="sfzrzonc(0)" value="1"<? if(1==$row[sfzrz]){?> checked="checked"<? }?> /> ͨ����֤</label>
 <label><input name="R1" type="radio" onclick="sfzrzonc(2)" value="2"<? if(2==$row[sfzrz]){?> checked="checked"<? }?> /> ��֤��ͨ��</label>
 <label><input name="R1" type="radio" onclick="sfzrzonc(0)" value="3"<? if(3==$row[sfzrz]){?> checked="checked"<? }?> /> δ�ύ��֤</label>
 </li>
 </ul>
 <ul class="uk" id="sfzrzsmv" style="display:none;">
 <li class="l1">����ԭ��</li>
 <li class="l2"><input type="text" class="inp" name="tsfzrzsm" size="90" value="<?=$row[sfzrzsm]?>" /></li>
 </ul>
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��ʵ������</li>
 <li class="l2"><input type="text" class="inp" name="tuname" value="<?=$row[uname]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ���֤�ţ�</li>
 <li class="l2"><input type="text" class="inp" name="tsfz" value="<?=$row[sfz]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ���֤���棺</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="25"></li>
 <? if(is_file($sfz1)){?>
 <li class="l8"></li>
 <li class="l9"><a href="<?=$sfz1?>" target="_blank"><img border="0" src="<?=$sfz1?>" width="100" height="50" /></a></li>
 <? }?>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ���֤���棺</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" class="inp1" size="25"></li>
 <? if(is_file($sfz2)){?>
 <li class="l8"></li>
 <li class="l9"><a href="<?=$sfz2?>" target="_blank"><img border="0" src="<?=$sfz2?>" width="100" height="50" /></a></li>
 <? }?>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>

 <form name="fyy" method="post" onsubmit="return tjyy()" enctype="multipart/form-data">
 <input type="hidden" value="yy" name="jvs" />
 <ul class="uk">
 <li class="l1">Ӫҵִ����֤��</li>
 <li class="l21">
 <? 
 if(0==$row[yyzzrz]){echo "&nbsp;<strong class='blue'>Ӫҵִ�����ύ����Ҫ�����֤</strong>";}
 elseif(1==$row[yyzzrz]){echo "&nbsp;<strong class='green'>�Ѿ�ͨ��Ӫҵִ����֤</strong>";}
 elseif(2==$row[yyzzrz]){echo "&nbsp;<strong class='red'>��֤���ܣ�ԭ��".$row[sfzrzsm]."</strong>";}
 elseif(3==$row[yyzzrz]){echo "&nbsp;<strong>δ�ύ��֤����</strong>";}
 ?>
 </li>
 <li class="l1">Ӫҵִ����ˣ�</li>
 <li class="l2">
 <label><input name="R2" type="radio" onclick="yyzzrzonc(0)" value="0"<? if(0==$row[yyzzrz]){?> checked="checked"<? }?> /> �ȴ����</label>
 <label><input name="R2" type="radio" onclick="yyzzrzonc(0)" value="1"<? if(1==$row[yyzzrz]){?> checked="checked"<? }?> /> ͨ����֤</label>
 <label><input name="R2" type="radio" onclick="yyzzrzonc(2)" value="2"<? if(2==$row[yyzzrz]){?> checked="checked"<? }?> /> ��֤��ͨ��</label>
 <label><input name="R2" type="radio" onclick="yyzzrzonc(0)" value="3"<? if(3==$row[yyzzrz]){?> checked="checked"<? }?> /> δ�ύ��֤</label>
 </li>
 </ul>
 <ul class="uk" id="yyzzrzsmv" style="display:none;">
 <li class="l1">����ԭ��</li>
 <li class="l2"><input type="text" class="inp" name="tyyzzrzsm" size="90" value="<?=$row[yyzzrzsm]?>" /></li>
 </ul>
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��˾���ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="tcompany" value="<?=$row[company]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> Ӫҵִ�պ��룺</li>
 <li class="l2"><input type="text" class="inp" name="tyyzz" value="<?=$row[yyzz]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> Ӫҵִ�գ�</li>
 <li class="l2"><input type="file" name="inp3" id="inp3" class="inp1" size="25"></li>
 <? if(is_file($yyzz1)){?>
 <li class="l8"></li>
 <li class="l9"><a href="<?=$yyzz1?>" target="_blank"><img border="0" src="<?=$yyzz1?>" width="100" height="50" /></a></li>
 <? }?>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 <script language="javascript">
 sfzrzonc(<?=$row[sfzrz]?>);
 yyzzrzonc(<?=$row[yyzzrz]?>);
 </script>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>