<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
$userid=returnuserid($_SESSION[FCWuser]);
$bh=$_GET[bh];
$kfbh=$_GET[kfbh];
while0("*","fcw_kanfang where xqbh='".$bh."' and bh='".$kfbh."' and uid='".$_SESSION[FCWuser]."'");
if(!$row=mysql_fetch_array($res)){Audit_alert("·������","loupanlist.php");}

//������ʼ
if($_GET[control]=="add"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 intotable("fcw_kanfanguser","uid,kfbh,xqbh,mot,uname,sj,zt","'".$_SESSION[FCWuser]."','".$kfbh."','".$bh."','".sqlzhuru($_POST[tmot])."','".sqlzhuru($_POST[tuname])."','".$sj."',".sqlzhuru($_POST[tzt])."");
 php_toheader("loupankfuser.php?t=suc&bh=".$bh."&kfbh=".$kfbh);

}elseif($_GET[control]=="update"){
 zwzr();
 $id=$_GET[id];
 updatetable("fcw_kanfanguser","
			 mot='".sqlzhuru($_POST[tmot])."',
			 uname='".sqlzhuru($_POST[tuname])."',
			 zt=".sqlzhuru($_POST[tzt])." where id=".$id." and uid='".$_SESSION[FCWuser]."'");
 php_toheader("loupankfuser.php?action=update&t=suc&bh=".$bh."&kfbh=".$kfbh."&id=".$id);
 
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
 document.getElementById("rcap7").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","loupankfuser.php?action=".$_GET[action]."&bh=".$bh."&kfbh=".$kfbh."&id=".$_GET[id])?>
 <? include("loupankfcap.php");?>
 <? if($_GET[action]==""){?>
 <script language="javascript">
 function tj(){
 if((document.f1.tuname.value).replace(/\s/,"")==""){alert("��������ϵ��");document.f1.tuname.focus();return false;}
 if((document.f1.tmot.value).replace(/\s/,"")==""){alert("�������ֻ�����");document.f1.tmot.focus();return false;}
 tjwait();
 f1.action="loupankfuser.php?bh=<?=$bh?>&control=add&kfbh=<?=$kfbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ��ϵ�ˣ�</li>
 <li class="l2"><input type="text" size="20" class="inp" name="tuname" /> </li>
 <li class="l1"><span class="red">*</span> �ֻ����룺</li>
 <li class="l2"><input type="text" size="20" class="inp" name="tmot" /></li>
 <li class="l1">�Ƿ���֪ͨ��</li>
 <li class="l2">
 <select name="tzt">
 <option value="0">δ֪ͨ</option>
 <option value="1">�Ѿ�֪ͨ</option>
 </select>
 </li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","loupankfuserlist.php?bh=".$bh."&kfbh=".$kfbh)?></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_kanfanguser where xqbh='".$bh."' and kfbh='".$kfbh."' and id=".$_GET[id]." and uid='".$_SESSION[FCWuser]."'");
 if(!$row=mysql_fetch_array($res)){php_toheader("loupankfuserlist.php?bh=".$bh."&kfbh=".$kfbh);};
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.tuname.value).replace(/\s/,"")==""){alert("��������ϵ��");document.f1.tuname.focus();return false;}
 if((document.f1.tmot.value).replace(/\s/,"")==""){alert("�������ֻ�����");document.f1.tmot.focus();return false;}
 tjwait();
 f1.action="loupankfuser.php?bh=<?=$bh?>&control=update&kfbh=<?=$kfbh?>&id=<?=$row[id]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ��ϵ�ˣ�</li>
 <li class="l2"><input type="text" size="20" class="inp" value="<?=$row[uname]?>" name="tuname" /> </li>
 <li class="l1"><span class="red">*</span> �ֻ����룺</li>
 <li class="l2"><input type="text" size="20" class="inp" value="<?=$row[mot]?>" name="tmot" /></li>
 <li class="l1">�Ƿ���֪ͨ��</li>
 <li class="l2">
 <select name="tzt">
 <option value="0">δ֪ͨ</option>
 <option value="1"<? if(1==$row[zt]){?> selected="selected"<? }?>>�Ѿ�֪ͨ</option>
 </select>
 </li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","loupankfuserlist.php?bh=".$bh."&kfbh=".$kfbh)?></li>
 </ul>
 </form>
 
 <? }?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>