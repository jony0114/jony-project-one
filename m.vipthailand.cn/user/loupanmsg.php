<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
$userid=returnuserid($_SESSION[FCWuser]);
$bh=$_GET[bh];
$id=$_GET[id];
if(!is_numeric($id)){php_toheader("loupanmsglist.php?bh=".$bh);}
//������ʼ
if($_GET[control]=="update"){
 zwzr();
 updatetable("fcw_loupanmsg","txt1='".sqlzhuru($_POST[ttxt1])."',txt2='".sqlzhuru($_POST[ttxt2])."',zt='".sqlzhuru($_POST[tzt])."',uname='".sqlzhuru($_POST[tuname])."',mot='".sqlzhuru($_POST[tmot])."' where id=".$id." and uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
 php_toheader("loupanmsg.php?t=suc&action=update&id=".$id."&bh=".$bh);

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
 document.getElementById("rcap5").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","loupanmsg.php?action=".$_GET[action]."&bh=".$bh."&id=".$id)?>
 
 <? 
 while0("*","fcw_loupanmsg where id=".$id." and xqbh='".$bh."' and uid='".$_SESSION[FCWuser]."'");
 if(!$row=mysql_fetch_array($res)){php_toheader("loupanmsglist.php?bh=".$bh);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttxt1.value).replace(/\s/,"")==""){alert("������������Ϣ��");return false;}
 tjwait();
 f1.action="loupanmsg.php?bh=<?=$bh?>&control=update&id=<?=$id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1">�� ϵ �ˣ�</li>
 <li class="l2">
 <input type="text" class="inp" name="tuname" size="20" value="<?=$row[uname]?>" /> 
 </li>
 <li class="l1">�ֻ����룺</li>
 <li class="l2">
 <input type="text" class="inp" name="tmot" size="20" value="<?=$row[mot]?>" /> 
 </li>
 <li class="l9 blue">���ԣ�</li>
 <li class="l10"><textarea name="ttxt1"><?=$row[txt1]?></textarea></li>
 <li class="l9 red">�ظ���</li>
 <li class="l10"><textarea name="ttxt2"><?=$row[txt2]?></textarea></li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <select name="tzt">
 <option value="0">����չʾ</option>
 <option value="1"<? if(1==$row[zt]){?> selected="selected"<? }?>>���������</option>
 </select>
 </li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","loupanmsglist.php?bh=".$bh)?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>