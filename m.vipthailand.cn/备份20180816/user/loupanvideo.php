<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("Ȩ�����ޣ�","./");}
$userid=returnuserid($_SESSION[FCWuser]);
$bh=$_GET[bh];
if($rowcontrol[fklook]=="on"){$zt=0;}else{$zt=1;}
$mybh=$_GET[mybh];

//������ʼ
if($_GET[control]=="update"){
 zwzr();
 $ifjc=$_POST[tifjc];if(!is_numeric($ifjc)){$ifjc=0;}
 $u="";
 if(1==intval($_POST[d1])){$u=$_POST[t2];}else{$u=inp_tp_upload(1,"../upload/".$userid."/f/".$bh."/",$mybh);}
 if($u!=""){$ses=",url='".$u."'";}
 if(1==intval($_POST[d2])){updatetable("fcw_xqvideo","iftj=0 where xqbh='".$bh."' and uid='".$_SESSION[FCWuser]."'");}
 updatetable("fcw_xqvideo","tit='".sqlzhuru($_POST[ttit])."'".$ses.",iftj=".$_POST[d2].",admin=".$_POST[d1].",ifjc=".$ifjc.",titys='".sqlzhuru($_POST[ttitys])."',zt=".$zt." where bh='".$mybh."' and uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
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
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script type="text/javascript">
function infcha(){
d=parseInt(document.f1.d1.value);
document.getElementById("infout").style.display="none";
document.getElementById("infmy").style.display="none";
if(d==1){document.getElementById("infout").style.display="";}
else if(d==2){document.getElementById("infmy").style.display="";}
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
 document.getElementById("rcap6").className="l1 l2";
 </script>
 <? systs("��ϲ���������ɹ�!","loupanvideo.php?action=".$_GET[action]."&bh=".$bh."&mybh=".$_GET[mybh])?>
 
 <? 
 while0("*","fcw_xqvideo where bh='".$_GET[mybh]."' and xqbh='".$bh."' and uid='".$_SESSION[FCWuser]."'");
 if(!$row=mysql_fetch_array($res)){php_toheader("loupanvideolist.php?bh=".$bh);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
 tjwait();
 f1.action="loupanvideo.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">��Ƶ��ͼ��</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" size="25"> ��ѳߴ磺140*84</li>
 <li class="l5"></li>
 <li class="l6"><img src="<?="../upload/".$userid."/f/".$row[xqbh]."/".$row[bh].".jpg"?>" width="140" height="84" /></li>
 <li class="l1">�Ƿ�Ӵ֣�</li>
 <li class="l2">
 <select name="tifjc">
 <option value="0">��</option>
 <option value="1"<? if(1==$row[ifjc]){?> selected="selected"<? }?>>��</option>
 </select>
 </li>
 <li class="l1">������ɫ��</li>
 <li class="l2">
 <select name="ttitys">
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
 <select name="d2">
 <option value="1">�Ƽ������ڸ�¥����ҳ�ܿ���</option>
 <option value="0"<? if(0==$row[iftj]){?> selected="selected"<? }?>>���Ƽ�</option>
 </select>
 </li>
 <li class="l1">��·��</li>
 <li class="l2">
 <select name="d1" onchange="infcha()">
 <option value="1">�ⲿ��Ƶ��ַ</option>
 <option value="2"<? if(2==$row[admin]){?> selected="selected"<? }?>>�Լ��ϴ�</option>
 </select>
 </li>
 </ul>
 
 <ul class="uk" id="infout" style="display:none;">
 <li class="l1">��Ƶ·����</li>
 <li class="l2"><input value="<?=$row[url]?>" name="t2" class="inp" style="width:500px;" type="text"/></li>
 <li class="l1">�ر�˵����</li>
 <li class="l21 red"><strong>������swf��flv��׺����Ƶ�ļ���ַ</strong></li>
 </ul>
 
 <? $du="../upload/".$userid."/f/".$bh."/".$row[url];?>
 <ul class="uk" id="infmy" style="display:none;">
 <li class="l1">�Լ��ϴ���</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="15" accept=".flv,.swf"> </li>
 <li class="l1">��Ƶ·����</li>
 <li class="l2"><input value="<?=$du?>" readonly="readonly" class="inp redony" size="40" type="text"/> [<a href="<?=$du?>" target="_blank">����</a>]</li>
 <li class="l1">�ر�˵����</li>
 <li class="l21 red"><strong>��ѡ��swf��flv��׺����Ƶ�ļ�</strong></li>
 </ul>

 
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","loupanvideolist.php?bh=".$bh)?></li>
 </ul>
 
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
<script language="javascript">
infcha();
</script>
</body>
</html>