<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];
$mybh=$_GET[mybh];

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $ifjc=sqlzhuru($_POST[tifjc]);if(!is_numeric($ifjc)){$ifjc=0;}
 $wdes=sqlzhuru($_POST[twdes]);if(empty($wdes)){$wdes=sqlzhuru($_POST[ttit]);}
 updatetable("fcw_xqnews","
			 sj='".sqlzhuru($_POST[tsj])."',
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 ifjc=".$ifjc.",
			 titys='".sqlzhuru($_POST[ttitys])."',
			 wdes='".$wdes."',
			 zt=".$_POST[Rzt].",
			 bj='".sqlzhuru($_POST[tbj])."',
			 ly='".sqlzhuru($_POST[tly])."',
			 lyurl='".sqlzhuru($_POST[tlyurl])."' where bh='".$mybh."' and xqbh='".$bh."'");
 uploadtp($mybh,"¥�̶�̬",$_POST[tuid]);
 php_toheader("loupannews.php?t=suc&mybh=".$mybh."&bh=".$bh);

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
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0402,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_loupan.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���[<a href='loupannewslx.php?bh=".$bh."'>��������¶�̬</a>]","loupannews.php?bh=".$bh."&mybh=".$mybh);}?>

 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit5").className="a1";</script>
 <!--B-->
 <div class="rkuang">
 <?
 while0("*","fcw_xqnews where bh='".$_GET[mybh]."' and xqbh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("loupannewslist.php?bh=".$bh);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="loupannews.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 function wdesin(){
 tw=document.f1.twdes.value;
 a=tw.length;
 if(a>150){document.f1.twdes.value=tw.substring(0,150);wdesin();}
 document.getElementById("wdesnum").innerHTML=a;
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">�༭��</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[bj]?>" class="inp" name="tbj" /> </li>
 <li class="l1">��Դ��</li>
 <li class="l2">
 <input type="text" size="20" value="<?=$row[ly]?>" class="inp" name="tly" /> 
 <span class="fd" style="margin-left:10px;">��Դ��ַ��</span><input type="text" size="60" value="<?=$row[lyurl]?>" class="inp" name="tlyurl" />
 </li>
 <li class="l1">�Ƿ�Ӵ֣�</li>
 <li class="l2">
 <select name="tifjc" class="inp">
 <option value="0">��</option>
 <option value="1"<? if(1==$row[ifjc]){?> selected="selected"<? }?>>��</option>
 </select>
 </li>
 <li class="l1">������ɫ��</li>
 <li class="l2">
 <select name="ttitys" class="inp">
 <?
 $ysarr=array("#333","#ff6600","#9C02F8","#ff0000","#2C64B1","#07BF2E","#36ADC2");
 for($i=0;$i<count($ysarr);$i++){
 ?>
 <option style="background-color:<?=$ysarr[$i]?>;" value="<?=$ysarr[$i]?>"<? if($ysarr[$i]==$row[titys]){?> selected="selected"<? }?>><?=$ysarr[$i]?></option>
 <? }?>
 </select>
 </li>
 </ul>
 
 <ul class="uk">
 <li class="l4">ժҪ������</li>
 <li class="l5 hui"><textarea onkeyup="wdesin()" onmouseup="wdesin()" name="twdes"><?=$row[wdes]?></textarea> ������<span id="wdesnum">0</span>�֣��������150��</li>
 <li class="l10">��ϸ������</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">������Ա��</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /></li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l2"><input class="inp" name="tsj" value="<?=$row[sj]?>" size="20" type="text"/><span>��ȷ��ʱ���ʽ�磺2012-12-12 12:12:12</span></li>
 <li class="l1">���״̬��</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>����չʾ</strong></label>
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>�������</strong></label>
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /> <strong>��˲�ͨ��</strong></label>
 </li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
wdesin();
//ʵ�����༭��
var ue = UE.getEditor('editor');
</script>
</body>
</html>