<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$bh=$_GET[bh];
$kfbh=$_GET[kfbh];

if(!empty($kfbh)){
 while0("*","fcw_kanfang where xqbh='".$bh."' and bh='".$kfbh."'");
 if(!$row=mysql_fetch_array($res)){Audit_alert("·������","loupanlist.php");}
}

//������ʼ
if($_GET[control]=="add"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 intotable("fcw_kanfanguser","uid,kfbh,xqbh,mot,uname,sj,zt","'".$row[uid]."','".$kfbh."','".$bh."','".sqlzhuru($_POST[tmot])."','".sqlzhuru($_POST[tuname])."','".$sj."',".sqlzhuru($_POST[tzt])."");
 php_toheader("loupankfuser.php?t=suc&bh=".$bh."&kfbh=".$kfbh);

}elseif($_GET[control]=="update"){
 zwzr();
 $id=$_GET[id];
 updatetable("fcw_kanfanguser","
			 mot='".sqlzhuru($_POST[tmot])."',
			 uname='".sqlzhuru($_POST[tuname])."',
			 zt=".sqlzhuru($_POST[tzt])." where id=".$id."");
 php_toheader("loupankfuser.php?action=update&t=suc&bh=".$bh."&kfbh=".$kfbh."&id=".$id);
 
}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/loupan.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0402,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_loupan.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","loupankfuser.php?action=".$_GET[action]."&bh=".$bh."&kfbh=".$kfbh."&id=".$_GET[id]);}?>

 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit7").className="a1";</script>
 <!--B-->
 <? if(!empty($kfbh)){include("loupankfcap.php");}?>
 <div class="rkuang">
 <? if($_GET[action]==""){?>
 <script language="javascript">
 function tj(){
 if((document.f1.tuname.value).replace(/\s/,"")==""){alert("��������ϵ��");document.f1.tuname.focus();return false;}
 if((document.f1.tmot.value).replace(/\s/,"")==""){alert("�������ֻ�����");document.f1.tmot.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="loupankfuser.php?bh=<?=$bh?>&control=add&kfbh=<?=$kfbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ��ϵ�ˣ�</li>
 <li class="l2"><input type="text" size="20" class="inp" name="tuname" /> </li>
 <li class="l1"><span class="red">*</span> �ֻ����룺</li>
 <li class="l2">
 <input type="text" size="20" class="inp" name="tmot" />
 </li>
 <li class="l1">�Ƿ���֪ͨ��</li>
 <li class="l2">
 <select name="tzt" class="inp">
 <option value="0">δ֪ͨ</option>
 <option value="1">�Ѿ�֪ͨ</option>
 </select>
 </li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_kanfanguser where xqbh='".$bh."' and kfbh='".$kfbh."' and id=".$_GET[id]);
 if(!$row=mysql_fetch_array($res)){php_toheader("loupankfuserlist.php?bh=".$bh."&kfbh=".$kfbh);};
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.tuname.value).replace(/\s/,"")==""){alert("��������ϵ��");document.f1.tuname.focus();return false;}
 if((document.f1.tmot.value).replace(/\s/,"")==""){alert("�������ֻ�����");document.f1.tmot.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
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
 <select name="tzt" class="inp">
 <option value="0">δ֪ͨ</option>
 <option value="1"<? if(1==$row[zt]){?> selected="selected"<? }?>>�Ѿ�֪ͨ</option>
 </select>
 </li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 <li class="l1"></li>
 <li class="l21">��<a href="loupankfuserlist.php">��鿴���п��������û�</a>��</li>
 </ul>
 </form>
 <? }?>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>