<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","fcw_jia_photo where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("photolist.php");}
$timestamp=time();
while1("*","fcw_admin where adminuid='".$_SESSION[FCWADMINSES]."'");$row1=mysql_fetch_array($res1);$adminpwd=$row1[adminpwd];
//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $mj=$_POST[tmj];if(!is_numeric($mj)){$mj=0;}
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 updatetable("fcw_jia_photo","tit='".sqlzhuru($_POST[ttit])."',vrurl='".sqlzhuru($_POST[tvrurl])."',txt='".sqlzhuru($_POST[content])."',zt=".sqlzhuru($_POST[Rzt]).",mj=".$mj.",money1=".$money1." where bh='".$bh."'");
 uploadtp($bh,"װ��Ч��ͼ",$row[uid]);
 php_toheader("photo.php?t=suc&bh=".$bh);
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

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu7").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0802,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_jia.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","photo.php?bh=".$_GET[bh]);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">��װЧ��ͼ</a>
 <a href="photolist.php">�����б�</a>
 </div> 
 <!--begin-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="photo.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1">���ࣺ</li>
 <li class="l21">
 <strong class="blue"><?=returnjiapty(1,$row[type1id])?></strong> [<a href="photolx.php?bh=<?=$row[bh]?>&action=update">�޸ķ���</a>]
 </li>
 </ul>
 <ul class="uk1 uk0">
 <li class="l1">��ǩ��</li>
 <li class="l21">
 <?
 $a=preg_split("/,/",$row[typesx]);
 for($i=0;$i<=count($a);$i++){
 if(!empty($a[$i])){
 ?>
 <?=returnjiapty(3,$a[$i])?> 
 <?
 }
 }
 ?>
 </li>
 </ul>
 <ul class="uk uk0">
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">VR���ӣ�</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[vrurl]?>" class="inp" name="tvrurl" /> </li>
 <li class="l1">�����</li>
 <li class="l2">
 <input type="text" size="5" value="<?=$row[mj]?>" class="inp" name="tmj" />
 <span class="fd"> ƽ��(С��ʾ�����ջ���0��ʾ�����)</span> 
 </li>
 <li class="l1">Ԥ�㣺</li>
 <li class="l2">
 <input type="text" size="5" value="<?=$row[money1]?>" class="inp" name="tmoney1" />
 <span class="fd"> ��(С��ʾ�����ջ���0��ʾ�����)</span> 
 </li>
 </ul>

 <!--Ч��ͼ/����B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">Ч��ͼ/����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">Ч��ͼ��</li>
 <li class="l2">
 <iframe style="float:left;" src="tpupload.php?admin=5&bh=<?=$bh?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 </li>
 </ul>
 <div class="xgtp">
  <div id="xgtp1" style="display:none;">���ڴ���</div>
  <div id="xgtp2"></div>
 </div>
 <!--Ч��ͼ/����E-->

 <ul class="uk">
 <li class="l10">���飺</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">������Ա��</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
 </li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>����չʾ</strong></label>
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>�������</strong></label>
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /> <strong>��˲�ͨ��</strong></label>
 </li>
 </ul>
 <ul class="uk">
 <li class="l3"><input type="submit" value="��һ��" class="btn1" /></li>
 </ul>
 </form> 
 </div>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
//ʵ�����༭��
var ue = UE.getEditor('editor');

function xgtread(x){
 $.get("fangtp.php",{bh:x},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("fangtpdel.php",{id:x},function(result){
  xgtread("<?=$bh?>");
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread("<?=$bh?>");

</script>
</body>
</html>