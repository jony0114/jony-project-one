<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=time()."ad".rnd_num(100);
$sj=date("Y-m-d H:i:s");
$ad=preg_split("/-/",$_GET[sm]);

if($_GET[control]=="add"){  //��ʾ����
  if(!strstr($adminqx,",0,") && !strstr($adminqx,",0601,")){Audit_alert("Ȩ�޲�����","default.php");}
  zwzr();
  $nxh=returnxh("fcw_ad"," and adbh='".sqlzhuru($_POST[ts1])."' and type1='".sqlzhuru($_POST[R1])."'");
  if(sqlzhuru($_POST[R1])=="ͼƬ"){$tp=inp_tp_upload(1,"../ad/",$bh);$tp99=inp_tp_upload(99,"../ad/",$bh."-99");}elseif(sqlzhuru($_POST[R1])=="����"){$tp=inp_tp_upload(2,"../ad/",$bh);}
  if($tp!=""){$b=preg_split("/\./",$tp);$tptype=$b[1];}else{$tptype="";}
  if(sqlzhuru($_POST[R1])=="ͼƬ"){$aurl=sqlzhuru($_POST[t1]);}elseif(sqlzhuru($_POST[R1])=="����"){$aurl=sqlzhuru($_POST[t3]);}
  intotable("fcw_ad","bh,type1,jpggif,tit,adbh,txt,sj,aurl,xh,aw,ah","'".$bh."','".sqlzhuru($_POST[R1])."','".$tptype."','".sqlzhuru($_POST[at1])."','".sqlzhuru($_POST[ts1])."','".sqlzhuru($_POST[s1])."','".$sj."','".$aurl."',".$nxh.",".sqlzhuru($_POST[t2]).",".sqlzhuru($_POST[t4])."");
  php_toheader("ad.php?t=suc&bh=".sqlzhuru($_POST[ts1])."&sm=".urlencode(sqlzhuru($_POST[ts2]))."&must=".$_GET[must]);

}elseif($_GET[control]=="update"){  //��ʾ�޸�
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0601,")){Audit_alert("Ȩ�޲�����","default.php");}
 zwzr();
 if(sqlzhuru($_POST[R1])=="ͼƬ"){$tp=inp_tp_upload(1,"../ad/",$_GET[bh]);$tp99=inp_tp_upload(99,"../ad/",$_GET[bh]."-99");}elseif(sqlzhuru($_POST[R1])=="����"){$tp=inp_tp_upload(2,"../ad/",$_GET[bh]);}
 if($tp!=""){$b=preg_split("/\./",$tp);$tptype=$b[1];}else{$tptype=sqlzhuru($_POST[tptype]);}
 if(sqlzhuru($_POST[R1])=="ͼƬ"){$aurl=sqlzhuru($_POST[t1]);}elseif(sqlzhuru($_POST[R1])=="����"){$aurl=sqlzhuru($_POST[t3]);}
 updatetable("fcw_ad","type1='".sqlzhuru($_POST[R1])."',jpggif='".$tptype."',tit='".sqlzhuru($_POST[at1])."',txt='".sqlzhuru($_POST[s1])."',sj='".$sj."',aurl='".$aurl."',aw=".sqlzhuru($_POST[t2]).",ah=".sqlzhuru($_POST[t4]).",xh=".sqlzhuru($_POST[txh])." where bh='".$_GET[bh]."'");
 php_toheader("ad.php?action=update&t=suc&bh=".$_GET[bh]."&sm=".urlencode(sqlzhuru($_POST[ts2]))."&must=".$_GET[must]);

}elseif($_GET[control]=="delf"){  //��ʾɾ����ͼ
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0601,")){Audit_alert("Ȩ�޲�����","default.php");}
 while1("id,jpggif","fcw_ad where id=".$_GET[id]);$row1=mysql_fetch_array($res1);
 delFile("../ad/".$_GET[bh]."-99.".$row1[jpggif]);
 php_toheader("ad.php?action=update&t=suc&bh=".$_GET[bh]."&sm=".urlencode($_GET[sm])."&must=".$_GET[must]);

}

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
<script language="javascript">
function lxsel(x){
	document.getElementById("adtp").style.display="none";
	document.getElementById("adcode").style.display="none";
	document.getElementById("adfont").style.display="none";
	document.getElementById("adflash").style.display="none";
	switch(x){
		case "ͼƬ":
	document.getElementById("adtp").style.display="";
		break;
		case "����":
	document.getElementById("adcode").style.display="";
		break;
		case "����":
	document.getElementById("adfont").style.display="";
		break;
		case "����":
	document.getElementById("adflash").style.display="";
		break;
		}
	}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu6").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_ad.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","ad.php?action=".$_GET[action]."&bh=".$_GET[bh]."&sm=".urlencode($_GET[sm])."&must=".$_GET[must]);}?>

 <div class="bqu1">
 <a class="a1" href="javascript:void(0);">������</a>
 <a href="adlist.php?bh=<?=$row[adbh]?>&sm=<?=urlencode($_GET[sm])?>&must=<?=$_GET[must]?>">�����б�</a>
 </div>

 <div class="rkuang">
 <? 
 if($_GET[action]==""){
 if($_GET[must]=="pic" || $_GET[must]==""){$tpck=" checked=\"checked\"";}
 elseif($_GET[must]=="code"){$codeck=" checked=\"checked\"";}
 elseif($_GET[must]=="font"){$fontck=" checked=\"checked\"";}
 elseif($_GET[must]=="flash"){$flashtck=" checked=\"checked\"";}
 ?>
 
 <!--begin-->
 <script language="javascript">
 function tj(){
	r=document.getElementsByName("R1");
	if(r.length>=4){
	if(r[3].checked==true){
		if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч�Ķ������");document.f1.t2.focus();return false;}
		if((document.f1.t4.value).replace(/\s/,"")=="" || isNaN(document.f1.t4.value)){alert("��������Ч�Ķ����߶�");document.f1.t4.focus();return false;}
	}
	}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="ad.php?control=add&must=<?=$_GET[must]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">����ţ�</li>
 <li class="l2"><input size="7" value="<?=$_GET[bh]?>" class="inp redony" name="ts1" readonly="readonly" type="text"/></li>
 <li class="l1">���˵����</li>
 <li class="l2"><input size="30" value="<?=$_GET[sm]?>" class="inp redony" name="ts2" readonly="readonly" type="text"/></li>
 <li class="l1">����ѡ��</li>
 <li class="l2">
 <? if($_GET[must]=="pic" || $_GET[must]==""){?><label><input<?=$tpck?> name="R1" onclick="lxsel('ͼƬ')" type="radio" value="ͼƬ" /> ͼƬ</label><? }?>
 <? if($_GET[must]=="code" || $_GET[must]==""){?><label><input<?=$codeck?> name="R1" type="radio" value="����" onclick="lxsel('����')" /> ����</label><? }?>
 <? if($_GET[must]=="font" || $_GET[must]==""){?><label><input<?=$fontck?> name="R1" type="radio" value="����" onclick="lxsel('����')" /> ����</label><? }?>
 <? if($_GET[must]=="flash" || $_GET[must]==""){?><label><input<?=$flashck?> name="R1" type="radio" value="����" onclick="lxsel('����')" /> ����</label><? }?>
 </li>
 <li class="l1">�����⣺</li>
 <li class="l2"><input name="at1" value="<?=$ad[0]?>" size="40" class="inp" type="text" /></li>
 </ul>

 <ul class="uk uk0" id="adtp"<? if($_GET[must]!="" && $_GET[must]!="pic"){?> style="display:none;"<? }?>>
 <li class="l1">���ӵ�ַ��</li>
 <li class="l2"><input name="t1" value="http://" size="40" class="inp" type="text" /></li>
 <li class="l1"><strong class="red">�����ͼ��</strong></li>
 <li class="l2"><input class="inp1" type="file" name="inp1" id="inp1" size="15"><span class="fd">��ѳߴ磺<?=$ad[1]?></span></li>
 <li class="l1">��渨ͼ��</li>
 <li class="l2"><input class="inp1" type="file" name="inp99" id="inp99" size="15"><span class="fd">����ʵ���������</span></li>
 <li class="l1"></li>
 <li class="l21 red">��ܰ��ʾ��ͼƬ��ʽ֧��jpg��gif��png���֣���������࣬����ת���ʽ</li>
 </ul>

 <ul class="uk uk0" id="adcode"<? if($_GET[must]!="code"){?> style="display:none;"<? }?>>
 <li class="l4">���룺</li>
 <li class="l5"><textarea name="s1"></textarea></li>
 </ul>

 <ul class="uk uk0" id="adfont"<? if($_GET[must]!="font"){?> style="display:none;"<? }?>>
 <li class="l1">���ӵ�ַ��</li>
 <li class="l2"><input name="t3" value="http://" size="40" class="inp" type="text" /></li>
 </ul>

 <ul class="uk uk0" id="adflash"<? if($_GET[must]!="flash"){?> style="display:none;"<? }?>>
 <li class="l1">ѡ�񶯻���</li>
 <li class="l2"><input class="inp1" type="file" name="inp2" id="inp2" size="15"> </li>
 <li class="l1">�� �����ã�</li>
 <li class="l2"><input name="t2" size="10" value="0" class="inp" type="text" /><span class="fd" style="margin-right:10px;">��</span><input name="t4" value="0" size="10" class="inp" type="text" /><span class="fd">��</span></li>
 </ul>

 <ul class="uk">
 <li class="l3"><input type="submit" value="�������" class="btn1" /></li>
 </ul>
 </form>
 <!--end-->
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_ad where bh='".$_GET[bh]."'");$row=mysql_fetch_array($res);
 $tpdis="none";$codedis="none";$flashdis="none";$fontdis="none";
 ?>
 
 <!--begin-->
 <script language="javascript">
 function tj(){
	r=document.getElementsByName("R1");
	if(r.length>=4){
	if(r[3].checked==true){
		if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч�Ķ������");document.f1.t2.focus();return false;}
		if((document.f1.t4.value).replace(/\s/,"")=="" || isNaN(document.f1.t4.value)){alert("��������Ч�Ķ����߶�");document.f1.t4.focus();return false;}
	}
	}
    layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
	f1.action="ad.php?control=update&must=<?=$_GET[must]?>&bh=<?=$row[bh]?>&sm=<?=urlencode($_GET[sm])?>";
 }
 function delf(){
 if(confirm("ȷ��Ҫɾ���ø�ͼ��")){location.href="ad.php?control=delf&sm=<?=urlencode($_GET[sm])?>&bh=<?=$row[bh]?>&must=<?=$_GET[must]?>&id=<?=$row[id]?>";}else{ return false;}	
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">����ţ�</li>
 <li class="l2"><input size="7" value="<?=$row[adbh]?>" class="inp redony" name="ts1" readonly="readonly" type="text"/></li>
 <li class="l1">���˵����</li>
 <li class="l2"><input size="30" value="<?=$_GET[sm]?>" class="inp redony" name="ts2" readonly="readonly" type="text"/></li>
 <li class="l1">�����ţ�</li>
 <li class="l2"><input name="txh" value="<?=$row[xh]?>" size="5" class="inp" type="text" /></li>
 <li class="l1">����ѡ��</li>
 <li class="l2">
 <? if($_GET[must]=="pic" || $_GET[must]==""){?>
 <label><input name="R1"<? if($row[type1]=="ͼƬ"){?> checked="checked"<? }?> onclick="lxsel('ͼƬ')" type="radio" value="ͼƬ" /> ͼƬ</label>
 <? }?>
 <? if($_GET[must]=="code" || $_GET[must]==""){?>
 <label><input name="R1"<? if($row[type1]=="����"){?> checked="checked"<? }?> type="radio" value="����" onclick="lxsel('����')" /> ����</label>
 <? }?>
 <? if($_GET[must]=="font" || $_GET[must]==""){?>
 <label><input name="R1"<? if($row[type1]=="����"){?> checked="checked"<? }?> type="radio" value="����" onclick="lxsel('����')" /> ����</label> 
 <? }?>
 <? if($_GET[must]=="flash" || $_GET[must]==""){?>
 <label><input name="R1"<? if($row[type1]=="����"){?> checked="checked"<? }?> type="radio" value="����" onclick="lxsel('����')" /> ����</label>
 <? }?>
 </li>
 <li class="l1">�����⣺</li>
 <li class="l2"><input name="at1" value="<?=$row[tit]?>" size="40" class="inp" type="text" /></li>
 </ul>

 <ul class="uk uk0" id="adtp" style="display:none;">
 <li class="l1">���ӵ�ַ��</li>
 <li class="l2"><input name="t1" value="<?=$row[aurl]?>" size="40" class="inp" type="text" /></li>
 <li class="l1"><strong class="red">�����ͼ��</strong></li>
 <li class="l2"><input class="inp1" type="file" name="inp1" id="inp1" size="15"><span class="fd">��ѳߴ磺<?=$ad[1]?></span></li>
 <li class="l8"></li>
 <li class="l9"><img src="../ad/<?=$row[bh]?>.<?=$row[jpggif]?>?t=<?=rnd_num(100)?>" width="200" height="54" /></li>
 <li class="l1">��渨ͼ��</li>
 <li class="l2"><input class="inp1" type="file" name="inp99" id="inp99" size="15"><span class="fd">����ʵ���������</span></li>
 <li class="l8"></li>
 <li class="l9"><img src="../ad/<?=$row[bh]?>-99.<?=$row[jpggif]?>?t=<?=rnd_num(100)?>" width="200" height="54" /> [<a class="red" href="javascript:delf()">ɾ����ͼ</a>]</li>
 <li class="l1"></li>
 <li class="l21 red">��ܰ��ʾ��ͼƬ��ʽ֧��jpg��gif��png���֣���������࣬����ת���ʽ</li>
 </ul>

 <ul class="uk uk0" id="adcode" style="display:none;">
 <li class="l4">���룺</li>
 <li class="l5"><textarea name="s1"><?=$row[txt]?></textarea></li>
 </ul>
 
 <ul class="uk uk0" id="adfont" style="display:none;">
 <li class="l1">���ӵ�ַ��</li>
 <li class="l2"><input name="t3" value="<?=$row[aurl]?>" size="40" class="inp" type="text" /></li>
 </ul>

 <ul class="uk uk0" id="adflash" style="display:none;">
 <li class="l1">ѡ�񶯻���</li>
 <li class="l2"><input class="inp1" type="file" name="inp2" id="inp2" size="15"> </li>
 <li class="l8"></li>
 <li class="l9"><embed src="../ad/<?=$row[bh]?>.swf" quality=high width=200 height=54 wmode=transparent type='application/x-shockwave-flash'></embed></li>
 <li class="l1">�� �����ã�</li>
 <li class="l2"><input name="t2" size="10" value="<?=$row[ah]?>" class="inp" type="text" /><span class="fd" style="margin-right:10px;">��</span><input name="t4" value="<?=$row[aw]?>" size="10" class="inp" type="text" /><span class="fd">��</span></li>
 </ul>

 <ul class="uk">
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 <input type="hidden" value="<?=$row[jpggif]?>" name="tptype" />
 </form>
 <script language="javascript">
 lxsel('<?=$row[type1]?>');
 </script>
 <!--end-->
 
 <? }?>
 </div>
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>