<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $company=sqlzhuru($_POST[tcompany]);
 $uadd=sqlzhuru($_POST[tuadd]);
 $nc=sqlzhuru($_POST[tnc]);
 if(empty($company) || empty($uadd) || empty($nc)){Audit_alert("�����·����Դ��","user3.php");}
 $pwd=sqlzhuru($_POST[tpwd]);if(!empty($pwd)){$ses="pwd='".sha1($pwd)."',";}
 updatetable("fcw_user",$ses."
			 nc='".$nc."',
			 email='".sqlzhuru($_POST[temail])."',
			 ifemail=".$_GET[ife].",
			 mot='".sqlzhuru($_POST[tmot])."',
			 ifmot=".$_GET[ifm].",
			 utel='".sqlzhuru($_POST[tutel])."',
			 qq='".sqlzhuru($_POST[tqq])."',
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 uadd='".$uadd."',
			 company='".$company."',
			 txt='".sqlzhuru($_POST[content])."',
			 djl=".sqlzhuru($_POST[tdjl]).",
			 indexpm=".sqlzhuru($_POST[tindexpm]).",
			 sxnum=".sqlzhuru($_POST[tsxnum]).",
			 txt='".sqlzhuru($_POST[content])."',
			 seokey='".sqlzhuru($_POST[tseokey])."',
			 seoms='".sqlzhuru($_POST[tseoms])."',
			 qx='".$_GET[qx]."',
			 zb='".sqlzhuru($_POST[tzb])."',
			 zbdj=".sqlzhuru($_POST[tzbdj]).",
			 userdj=".sqlzhuru($_POST[tuserdj]).",
			 userdjdq='".sqlzhuru($_POST[tuserdjdq])."' where id=".$id);
 uploadtpnodata(1,"upload/".$id."/","shop.jpg","allpic",200,100,0,0,"no");
 php_toheader("user3.php?t=suc&id=".$id);

}
//�������
while0("*","fcw_user where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("userlist.php");}
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

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

<script language="javascript">
function tj(){
 if((document.f1.tnc.value).replace("/\s/","")==""){alert("��������ϵ��");document.f1.tnc.focus();return false;}
 if((document.f1.tuadd.value).replace("/\s/","")==""){alert("�����빫˾��ַ");document.f1.tuadd.focus();return false;}
 if((document.f1.tcompany.value).replace("/\s/","")==""){alert("�����빫˾����");document.f1.tcompany.focus();return false;}
 c=document.getElementsByName("C1");str=",";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+",";}}
 c=document.getElementsByName("Cr2");if(c[0].checked){ife=1;}else{ife=0;}
 c=document.getElementsByName("Cr3");if(c[0].checked){ifm=1;}else{ifm=0;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="user3.php?control=update&id=<?=$id?>&qx="+str+"&ife="+ife+"&ifm="+ifm;
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
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","user3.php?id=".$id);}?>
 <? include("rightcap5.php");?>
 <script language="javascript">document.getElementById("rtit1").className="a1";</script>
 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">��Ա�ʺţ�</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
 </li>
 <li class="l1">��Ա���룺</li>
 <li class="l2"><input type="text" size="20" class="inp" name="tpwd" /><span class="fd">���ձ�ʾ���޸�</span></li>
 <li class="l1"><span class="red">*</span> ��ϵ�ˣ�</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[nc]?>" class="inp" name="tnc" /></li>
 <li class="l1">�����ַ��</li>
 <li class="l2">
 <input type="text" size="20" value="<?=$row[email]?>" class="inp" name="temail" />
 <label style="margin-left:10px;"><input name="Cr2" type="checkbox" value="1"<? if(1==$row[ifemail]){?> checked="checked"<? }?>/> ������</label>
 </li>
 <li class="l1">�ֻ����룺</li>
 <li class="l2">
 <input type="text" size="20" value="<?=$row[mot]?>" class="inp" name="tmot" />
 <label style="margin-left:10px;"><input name="Cr3" type="checkbox" value="1"<? if(1==$row[ifmot]){?> checked="checked"<? }?>/> ���ֻ�</label>
 </li>
 <li class="l1">��ϵ�绰��</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[utel]?>" class="inp" name="tutel" /></li>
 <li class="l1">QQ���룺</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[qq]?>" class="inp" name="tqq" /></li>
 <li class="l1">��������</li>
 <li class="l2">
 <div class="areaqy1">
 <select name="area1" id="area1" onchange="areacha()" class="inp">
 <option value="0">������</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[py]." - ".$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="0" />
 <iframe name="fareas" id="fareas" height="50" width="150" border="0" frameborder="0" src="areas.php?nid=<?=$row[areaids]?>&id=<?=$row[areaid]?>"></iframe>
 <? if($row[areaid]==""){?>
 <script language="javascript">areacha();</script>
 <? }?>
 </div>
 </li>
 <li class="l1"><span class="red">*</span> ��˾��ַ��</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[uadd]?>" class="inp" name="tuadd" /></li>
 <li class="l1"><span class="red">*</span> ��˾���ƣ�</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[company]?>" class="inp" name="tcompany" /></li>
 <li class="l1">��˾����ͼ��</li>
 <li class="l2"><input type="file" class="inp1" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../upload/<?=$id?>/shop.jpg?t=<?=rnd_num(100)?>" width="100" height="54" /></li>
 <li class="l1">��ͼ���꣺</li>
 <li class="l2">
 <input type="text" value="<?=$row[zb]?>" class="inp" name="tzb" /> 
 <span class="fd">[<a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">�����ȡ</a>]</span>
 </li>
 <li class="l1">�������ŵȼ���</li>
 <li class="l2"><input type="text" value="<?=returnjgdw($row[zbdj],"",15)?>" class="inp" name="tzbdj" /></li>
 <li class="l10">��˾��飺</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 <li class="l1">���̹ؼ��ʣ�</li>
 <li class="l2"><input  name="tseokey" value="<?=$row[seokey]?>" size="60" type="text" class="inp" /></li>
 <li class="l4">����������</li>
 <li class="l5"><textarea name="tseoms"><?=$row[seoms]?></textarea></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</label>
 <label><input name="C1" type="checkbox" value="6"<? if(strstr($row[qx],",6,")){?> checked="checked"<? }?>/> ���̹���</label> 
 <label><input name="C1" type="checkbox" value="10"<? if(strstr($row[qx],",10,")){?> checked="checked"<? }?>/> ���Ĺ��� </label>
 </li>
 <li class="l1">�ƹ�����</li>
 <li class="l2"><input class="inp" name="tindexpm" value="<?=returnjgdw($row[indexpm],"",0)?>" size="5" type="text"/><span class="fd">0��ʾ��ͨ����֮����С��������</span></li>
 <li class="l1">����ʣ�</li>
 <li class="l2"><input class="inp" name="tdjl" value="<?=returnjgdw($row[djl],"",0)?>" size="5" type="text"/></li>
 <li class="l1">ʣ��ˢ������</li>
 <li class="l2"><input class="inp" name="tsxnum" value="<?=returnjgdw($row[sxnum],"",0)?>" size="5" type="text"/></li>
 <li class="l1">��Ա�ȼ���</li>
 <li class="l2">
 <select name="tuserdj" class="inp">
 <? while1("*","fcw_userdj order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[userdj]==$row1[id]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">�ȼ����ڣ�</li>
 <li class="l2"><input class="inp" name="tuserdjdq" value="<?=returnjgdw($row[userdjdq],"",$sj)?>" size="20" type="text"/><span class="fd">��ȷ��ʽ��<?=$sj?></span></li>
 <li class="l1">������</li>
 <li class="l2"><input class="inp redony" readonly="readonly" value="<?=$row[money1]?>" size="5" type="text"/><span class="fd">[<a href="usermoney.php?id=<?=$row[id]?>">�ı���</a>]</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
//ʵ�����༭��
var ue = UE.getEditor('editor');
</script>
</body>
</html>