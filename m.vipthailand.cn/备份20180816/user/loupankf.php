<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
$userid=returnuserid($_SESSION[FCWuser]);
$bh=$_GET[bh];
if($rowcontrol[fklook]=="on"){$zt=0;}else{$zt=1;}
$mybh=$_GET[mybh];

//������ʼ
if($_GET[control]=="update"){
 zwzr();
 updatetable("fcw_kanfang","
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 bmzt='".sqlzhuru($_POST[tbmzt])."',
			 zt=".$zt.",
			 hg='".sqlzhuru($_POST[content1])."' where bh='".$mybh."' and uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
 uploadtpone(1,"upload/".$userid."/f/".$bh."/",$mybh,$mybh,'������',$_SESSION[FCWuser],450,250,225,125,0,0,"no");
 php_toheader("loupankf.php?t=suc&action=update&mybh=".$mybh."&bh=".$bh);

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

<script language="javascript">
function bmztonc(){
document.getElementById("hg").style.display="none";
bm=parseInt(document.f1.tbmzt.value);
if(2==bm || 3==bm){document.getElementById("hg").style.display="";}
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ¥�̹���</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",9,");?>
 <? include("loupantop.php");?>
 <? include("rcap6.php");?>
 <script language="javascript">
 document.getElementById("rcap7").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","loupankf.php?action=".$_GET[action]."&bh=".$bh."&mybh=".$_GET[mybh])?>
 
 <? 
 while0("*","fcw_kanfang where bh='".$_GET[mybh]."' and xqbh='".$bh."' and uid='".$_SESSION[FCWuser]."'");
 if(!$row=mysql_fetch_array($res)){php_toheader("loupankflist.php?bh=".$bh);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("����������");document.f1.ttit.focus();return false;}
 tjwait();
 f1.action="loupankf.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ����⣺</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">�����ͼ��</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25"> ��ѳߴ磺450��*250��</li>
 <li class="l5"></li>
 <li class="l6"><img src="<?=returntppd("../upload/".$userid."/f/".$bh."/".$row[bh]."-1.jpg","img/none100x100.gif")?>" width="100" height="100" /></li>
 <li class="l1">�״̬��</li>
 <li class="l2">
 <select name="tbmzt" onchange="bmztonc()">
 <option value="0">���ڱ���</option>
 <option value="1"<? if(1==$row[bmzt]){?> selected="selected"<? }?>>ֹͣ������������</option>
 <option value="2"<? if(2==$row[bmzt]){?> selected="selected"<? }?>>���ڿ���</option>
 <option value="3"<? if(3==$row[bmzt]){?> selected="selected"<? }?>>����Բ������</option>
 </select>
 </li>
 <li class="l7">�Ż����飺</li>
 <li class="l8"><script name="content" id="editor" type="text/plain" style="width:100%;height:380px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="uk" id="hg">
 <li class="l7">�ֳ����ʻعˣ�</li>
 <li class="l8"><script name="content1" id="editor1" type="text/plain" style="width:100%;height:380px;"><?=$row[hg]?></script></li>
 </ul>
 
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","loupankflist.php?bh=".$bh)?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
<script type="text/javascript">
//ʵ�����༭��
var ue = UM.getEditor('editor');
var ue1 = UM.getEditor('editor1');
bmztonc();
</script>
</body>
</html>