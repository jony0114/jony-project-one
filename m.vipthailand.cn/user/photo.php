<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();
$bh=$_GET[bh];
while0("*","fcw_jia_photo where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$bh."'");
if(!$row=mysql_fetch_array($res)){php_toheader("photolist.php");}
//������ʼ
if($_GET[control]=="update"){
 zwzr();
 if($rowcontrol[jialook]=="on"){$zt=0;}else{$zt=1;}
 $mj=$_POST[tmj];if(!is_numeric($mj)){$mj=0;}
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 updatetable("fcw_jia_photo","tit='".sqlzhuru($_POST[ttit])."',vrurl='".sqlzhuru($_POST[tvrurl])."',txt='".sqlzhuru($_POST[content])."',zt=".$zt.",mj=".$mj.",money1=".$money1." where bh='".$bh."' and uid='".$row[uid]."'");
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
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>

<link href="../config/ueditor_mini/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">
<script src="../config/ueditor_mini/jquery-1.10.2.min.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor_mini/umeditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor_mini/umeditor.min.js"></script>
<script type="text/javascript" src="../config/ueditor_mini/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > װ��Ч��ͼ</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",1,");?>
 
 <? include("rcap10.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","photo.php?bh=".$bh)?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
 tjwait();
 f1.action="photo.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><strong>����</strong>��</li>
 <li class="l21">
 <strong class="blue"><?=returnjiapty(1,$row[type1id])?></strong> [<a href="photolx.php?bh=<?=$row[bh]?>&action=update">�޸ķ���</a>]
 </li>
 </ul>
 <ul class="uk1">
 <li class="l1"><strong>��ǩ</strong>��</li>
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
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">VRЧ����</li>
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
 <ul class="uk uk0">
 <li class="l1">Ч��ͼ��</li>
 <li class="l2">
 <iframe style="float:left;" src="tpupload.php?admin=3&bh=<?=$bh?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 <span class="fd">&nbsp;&nbsp;������ϴ�16��Ч��ͼ</span>
 </li>
 </ul>
 <div class="xgtp">
  <div id="xgtp1" style="display:none;">���ڴ���</div>
  <div id="xgtp2"></div>
 </div>
 <!--Ч��ͼ/����E-->
 

 <ul class="uk">
 <li class="l7">���飺</li>
 <li class="l8"><script name="content" id="editor" type="text/plain" style="width:100%;height:380px;"><?=$row[txt]?></script></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","photolist.php")?></li>
 </ul>
 </form>
</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
<script type="text/javascript">
//ʵ�����༭��
var ue = UM.getEditor('editor');

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