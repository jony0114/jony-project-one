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
 $ifjc=$_POST[tifjc];if(!is_numeric($ifjc)){$ifjc=0;}
 $u="";
 $userid=returnuserid($_POST[tuid]);
 if(1==intval($_POST[d1])){$u=$_POST[t2];}else{$u=inp_tp_upload(1,"../upload/".$userid."/f/".$bh."/",$mybh);}
 if($u!=""){$ses=",url='".$u."'";}
 if(1==intval($_POST[d2])){updatetable("fcw_xqvideo","iftj=0 where xqbh='".$bh."'");}
 if(1==sqlzhuru($_POST[Rindextj])){updatetable("fcw_xqvideo","indextj=0 where indextj=1");}
 updatetable("fcw_xqvideo","tit='".sqlzhuru($_POST[ttit])."'".$ses.",iftj=".$_POST[d2].",admin=".$_POST[d1].",ifjc=".$ifjc.",titys='".sqlzhuru($_POST[ttitys])."',zt=".$_POST[Rzt].",indextj=".sqlzhuru($_POST[Rindextj])." where bh='".$mybh."' and xqbh='".$bh."'");
 uploadtpnodata(2,"upload/".$userid."/f/".$bh."/",$mybh.".jpg","allpic",140,84,0,0,"no");
 php_toheader("loupanvideo.php?t=suc&action=update&mybh=".$mybh."&bh=".$bh);

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
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���[<a href='loupanvideolx.php?bh=".$bh."'>�����������Ƶ</a>]","loupanvideo.php?bh=".$bh."&mybh=".$mybh);}?>
 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit6").className="a1";</script>

 <!--B-->
 <div class="rkuang">
 <? while0("*","fcw_xqvideo where bh='".$_GET[mybh]."' and xqbh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("loupanvideolist.php?bh=".$bh);}?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="loupanvideo.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 
 function infcha(){
 d=parseInt(document.f1.d1.value);
 document.getElementById("infout").style.display="none";
 document.getElementById("infmy").style.display="none";
 if(d==1){document.getElementById("infout").style.display="";}
 else if(d==2){document.getElementById("infmy").style.display="";}
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">��Ƶ��ͼ��</li>
 <li class="l2"><input type="file" name="inp2" class="inp1" id="inp2" size="25"><span class="fd">��ѳߴ磺140*84</span></li>
 <li class="l8"></li>
 <li class="l9"><img src="<?="../upload/".$userid."/f/".$row[xqbh]."/".$row[bh].".jpg"?>" width="108" height="65" /></li>
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
 <li class="l1">�Ƽ���</li>
 <li class="l2">
 <select name="d2" class="inp">
 <option value="1">�Ƽ������ڸ�¥����ҳ�ܿ���</option>
 <option value="0"<? if(0==$row[iftj]){?> selected="selected"<? }?>>���Ƽ�</option>
 </select>
 </li>
 <li class="l1">��·��</li>
 <li class="l2">
 <select name="d1" onchange="infcha()" class="inp">
 <option value="1">�ⲿ��Ƶ��ַ</option>
 <option value="2"<? if(2==$row[admin]){?> selected="selected"<? }?>>�Լ��ϴ�</option>
 </select>
 </li>
 </ul>
 
 <ul class="uk uk0" id="infout" style="display:none;">
 <li class="l1">��Ƶ·����</li>
 <li class="l2"><input value="<?=$row[url]?>" name="t2" class="inp" style="width:500px;" type="text"/></li>
 <li class="l1">�ر�˵����</li>
 <li class="l21 red"><strong>������swf��flv��׺����Ƶ�ļ���ַ</strong></li>
 </ul>
 
 <? $du="../upload/".$userid."/f/".$bh."/".$row[url];?>
 <ul class="uk uk0" id="infmy" style="display:none;">
 <li class="l1">�Լ��ϴ���</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="15" accept=".swf,.flv"> </li>
 <li class="l1">��Ƶ·����</li>
 <li class="l2"><input value="<?=$du?>" readonly="readonly" class="inp redony" size="40" type="text"/><span class="fd">[<a href="<?=$du?>" target="_blank">����</a>]</span></li>
 <li class="l1">�ر�˵����</li>
 <li class="l21 red"><strong>���ϴ�swf��flv��׺����Ƶ�ļ�</strong></li>
 </ul>

 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">������Ա��</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /></li>
 <li class="l1">��ҳ�Ƽ���</li>
 <li class="l2">
 <label><input name="Rindextj" type="radio" value="0" <? if(empty($row[indextj])){?>checked="checked"<? }?> /> <strong>��ͨ</strong></label>
 <label><input name="Rindextj" type="radio" value="1" <? if(1==$row[indextj]){?>checked="checked"<? }?> /> <strong>��ҳ�Ƽ�</strong></label>
 </li>
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
<script language="javascript">
infcha();
</script>
</body>
</html>