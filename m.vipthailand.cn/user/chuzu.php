<?
//�޸ĸ��ļ���Ҫͬ���޸�fcwmanage/chuzu.php�Լ��ֻ����
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
while0("*","fcw_fang where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$bh."' and type1='����'");
if(!$row=mysql_fetch_array($res)){php_toheader("chuzulist.php");}
$wylx=$row[wylx];
$muid=$row[uid];
$id=$row[id];
$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

if(1==$_SESSION[FCWuserID]){
 if($rowcontrol[userfy]=="on"){$zt=0;}else{$zt=1;}
}elseif($_SESSION[FCWuserID]==2 || $_SESSION[FCWuserID]==4){
 if($rowcontrol[jjrfy]=="on"){$zt=0;}else{$zt=1;}
}

//B
if($_GET[control]=="update" && $_POST[jvs]=="chuzu"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $lc1=$_POST[tlc1];if(!is_numeric($lc1)){$lc1=0;}
 $lc2=$_POST[tlc2];if(!is_numeric($lc2)){$lc2=0;}
 $hx1=$_POST[thx1];if(!is_numeric($hx1)){$hx1=0;}
 $hx2=$_POST[thx2];if(!is_numeric($hx2)){$hx2=0;}
 $hx3=$_POST[thx3];if(!is_numeric($hx3)){$hx3=0;}
 $hx4=$_POST[thx4];if(!is_numeric($hx4)){$hx4=0;}
 $hx5=$_POST[thx5];if(!is_numeric($hx5)){$hx5=0;}
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $money2=$_POST[tmoney2];if(!is_numeric($money2)){$money2=0;}
 $money3=$_POST[tmoney3];if(!is_numeric($money3)){$money3=0;}
 $mj1=$_POST[tmj1];if(!is_numeric($mj1)){$mj1=0;}
 $mj2=$_POST[tmj2];if(!is_numeric($mj2)){$mj2=0;}
 $zxqkid=$_POST[tzxqkid];if(!is_numeric($zxqkid)){$zxqkid=0;}
 $zxqkid=$_POST[tzxqkid];if(!is_numeric($zxqkid)){$zxqkid=0;}
 $cxid=$_POST[tcxid];if(!is_numeric($cxid)){$cxid=0;}
 $jznd=$_POST[tjznd];if(!is_numeric($jznd)){$jznd=0;}
 $lxid=$_POST[tlxid];if(!is_numeric($lxid)){$lxid=0;}
 $hylx=$_POST[thylx];if(!is_numeric($hylx)){$hylx=0;}
 $jbid=$_POST[tjbid];if(!is_numeric($jbid)){$jbid=0;}
 $xq=sqlzhuru($_POST[txq]);
 $fadd=returnjgdw(sqlzhuru($_POST[tfadd]),"",$xq);
 while1("id,admin,xq,zt,xqzb,xqzb1,xqzb2","fcw_xq where admin=1 and zt=0 and xq='".$xq."' order by id asc");if($row1=mysql_fetch_array($res1)){
 $ses=",xqzb='".$row1[xqzb]."',xqzb1='".$row1[xqzb1]."',xqzb2='".$row1[xqzb2]."'";
 }

 updatetable("fcw_fang",
			 "fangbh='".sqlzhuru($_POST[tfangbh])."',
			 uip='".$uip."',
			 lxr='".sqlzhuru($_POST[tlxr])."',
			 mot='".sqlzhuru($_POST[tmot])."',
			 fdname='".sqlzhuru($_POST[tfdname])."',
			 fdmot='".sqlzhuru($_POST[tfdmot])."',
			 wytsid='".$_GET[ts]."',
			 mj=".sqlzhuru($_POST[tmj]).",mj1=".$mj1.",mj2=".$mj2.",
			 money1=".$money1.",money2=".$money2.",money3=".$money3.",
			 xq='".$xq."',
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 hx1=".$hx1.",hx2=".$hx2.",hx3=".$hx3.",hx4=".$hx4.",hx5=".$hx5.",
			 lc1=".$lc1.",lc2=".$lc2.",
			 jgdw='".sqlzhuru($_POST[tjgdw])."',
			 zxqkid=".$zxqkid.",cxid=".$cxid.",jznd=".$jznd.",
			 pz='".$_GET[pt]."',
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 ditieid='".$_GET[ditie]."',
			 gongjiaoid='".$_GET[gongjiao]."',
			 fadd='".$fadd."',
			 lxid=".$lxid.",jbid=".$jbid.",
			 zt=".$zt.",
			 czfs=".sqlzhuru($_POST[Rczfs]).",
			 fkfs='".sqlzhuru($_POST[tfkfs])."',
			 video='".sqlzhuru($_POST[tvideo])."',
			 hylx=".intval($_POST[thylx]).",
			 hylx2=".intval($_POST[thylx2]).",
			 vrurl='".sqlzhuru($_POST[tvrurl])."',
			 ld1='".sqlzhuru($_POST[tld1])."',
			 ld2='".sqlzhuru($_POST[tld2])."',
			 ld3='".sqlzhuru($_POST[tld3])."'".$ses." where uid='".$muid."' and bh='".$bh."'");
 php_toheader("fangsuc.php?bh=".$bh."&cz=chuzu&id=".$id);

}
//E

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
function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("�����������⣡");document.f1.ttit.focus();return false;}
 if((document.f1.tmj.value).replace(/\s/,"")=="" || isNaN(document.f1.tmj.value)){alert("�����������");document.f1.tmj.focus();return false;}
 if((document.f1.txq.value).replace(/\s/,"")==""){alert("������С�����ƣ�");document.f1.txq.focus();return false;}
 if((document.f1.tmot.value).replace(/\s/,"")==""){alert("��������ϵ�绰��");document.f1.tmot.focus();return false;}
 if((document.f1.tlxr.value).replace(/\s/,"")==""){alert("��������ϵ�ˣ�");document.f1.tlxr.focus();return false;}
 c=document.getElementsByName("Cgongjiao");str=",";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+",";}}gongjiaoID=str;
 c=document.getElementsByName("Cditie");str=",";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+",";}}ditieID=str;
 c=document.getElementsByName("C1");
 str="xcf";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+"xcf";}
 }
 c11=document.getElementsByName("C11");
 str1="xcf";
 for(i=0;i<c11.length;i++){
 if(c11[i].checked){str1=str1+c11[i].value+"xcf";}
 }
 tjwait();
 f1.action="chuzu.php?control=update&bh=<?=$row[bh]?>&pt="+str+"&ts="+str1+"&ditie="+ditieID+"&gongjiao="+gongjiaoID;
}
</script>

<link href="../config/ueditor_mini/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">
<script src="../config/ueditor_mini/jquery-1.10.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="../config/ueditor_mini/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../config/ueditor_mini/umeditor.min.js"></script>

</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ����������Ϣ</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",2,");?>
 <? include("chuzucap.php");?>
 <script language="javascript">
 document.getElementById("step2").className="l1 l11";
 </script>

 <div class="rmenucap">
 <a href="chuzu.php?bh=<?=$bh?>" class="a1">��Դ��Ϣ</a>
 <a href="fanggj.php?bh=<?=$bh?>">������¼</a>
 </div>

 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="chuzu" name="jvs" />
 
 <!--����B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">������Ŀ</li><li class="l3"></li></ul>
 <ul class="uk uk0">
 <li class="l1">�������ͣ�</li>
 <li class="l21"><strong><?=returnwylx(4,$row[wylx])?></strong>  &nbsp;&nbsp;&nbsp;[<a href="chuzulx.php?action=update&id=<?=$row[id]?>">�޸�����</a>]</li>
 <li class="l1"><span class="red">*</span> ���ⷽʽ��</li>
 <li class="l2">
 <label><input name="Rczfs" type="radio" value="1" <? if(1==$row[czfs]){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Rczfs" type="radio" value="2" <? if(2==$row[czfs]){?> checked="checked"<? }?> /> ����</label>
 </li>
 <li class="l1"><span class="red">*</span> ���⣺</li>
 <li class="l2"><input type="text" class="inp" name="ttit" size="80" value="<?=$row[tit]?>" /></li>
 <li class="l1"><span class="red">*</span> �����</li>
 <li class="l2"><input type="text" class="inp" name="tmj" size="5" value="<?=$row[mj]?>" /> <? if(check_in($wylx,"����")){echo "Ķ";}else{echo "ƽ��";}?></li>
 <li class="l1"><span class="red">*</span> С��/�ضΣ�</li>
 <li class="l2">
 <input name="txq" style="width:305px;" value="<?=$row[xq]?>" class="inp" type="text" autocomplete="off" disableautocomplete  id="searcht1" />
 <div id="searchHtml" style="display:none;" onmouseleave="this.style.display='none';"></div>
 </li>

 <? if(check_in($wylx,"סլ,��Ԣ")){?>
 <li class="l1">���ţ�</li>
 <li class="l2">
 <div id="ldread">
 <input name="tld1" value="<?=$row[ld1]?>" style="width:60px;" class="inp" type="text" /><span class="fd" style="margin-right:10px;">��¥</span>
 <input name="tld2" value="<?=$row[ld2]?>" style="width:60px;" class="inp" type="text" /><span class="fd" style="margin-right:10px;">��Ԫ</span>
 </div>
 <input name="tld3" value="<?=$row[ld3]?>" style="width:60px;" class="inp" type="text" /><span class="fd">��</span>
 </li>
 <? }?>

 <li class="l1"><span class="red">*</span> ��������</li>
 <li class="l2">
 <select name="area1" id="area1" class="inp1" onchange="areacha()">
 <option value="0">δѡ��</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[py]." - ".$row1[name1]?></option>
 <? }?>
 </select>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="0" />
 <iframe name="fareas" id="fareas" height="33" width="150" border="0" frameborder="0" src="../config/areas.php?nid=<?=$row[areaids]?>&id=<?=$row[areaid]?>"></iframe>
 <? if($row[areaid]==""){?>
 <script language="javascript">areacha();</script>
 <? }?>
 </div>
 </li>
 <li class="l1">���</li>
 <li class="l2">
 <input type="text" class="inp" name="tmoney1" size="5" value="<?=returnzdv($row[money1])?>" />
 <select name="tjgdw" class="inp1">
 <option value="Ԫ/��" <? if($row[jgdw]=="Ԫ/��"){?> selected="selected"<? }?>>Ԫ/��</option>
 <option value="Ԫ/��" <? if($row[jgdw]=="Ԫ/��"){?> selected="selected"<? }?>>Ԫ/��</option>
 <option value="Ԫ/����" <? if($row[jgdw]=="Ԫ/����"){?> selected="selected"<? }?>>Ԫ/����</option>
 <option value="Ԫ/��" <? if($row[jgdw]=="Ԫ/��"){?> selected="selected"<? }?>>Ԫ/��</option>
 <option value="Ԫ/��" <? if($row[jgdw]=="Ԫ/��"){?> selected="selected"<? }?>>Ԫ/��</option>
 </select>
 <select name="tfkfs" class="inp1">
 <option value="��3Ѻ1"<? if($row[fkfs]=="��3Ѻ1"){?> selected="selected"<? }?>>��3Ѻ1</option>
 <option value="��1Ѻ1"<? if($row[fkfs]=="��1Ѻ1"){?> selected="selected"<? }?>>��1Ѻ1</option>
 <option value="��2Ѻ1"<? if($row[fkfs]=="��2Ѻ1"){?> selected="selected"<? }?>>��2Ѻ1</option>
 <option value="��1Ѻ2"<? if($row[fkfs]=="��1Ѻ2"){?> selected="selected"<? }?>>��1Ѻ2</option>
 <option value="�긶��Ѻ"<? if($row[fkfs]=="�긶��Ѻ"){?> selected="selected"<? }?>>�긶��Ѻ</option>
 <option value="���긶��Ѻ"<? if($row[fkfs]=="���긶��Ѻ"){?> selected="selected"<? }?>>���긶��Ѻ</option>
 <option value="����"<? if($row[fkfs]=="����"){?> selected="selected"<? }?>>����</option>
 </select>
 <span class="fd">(С��ʾ�������ʾ����)</span>
 </li>

 <? if(check_in($wylx,"����")){?>
 <li class="l1">ת�÷ѣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney3" size="5" value="<?=returnzdv($row[money3])?>" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="fd"> ��(С��ʾ�������ʾ��ת�÷�)</span></li>
 <? }?>

 <? if(check_in($wylx,"����,ƽ��")){?>
 <li class="l1">������</li>
 <li class="l2"><input name="tlc1" value="<?=returnzdv($row[lc1])?>" style="width:26px;" class="inp" type="text" /><span class="fd">�� (С��ʾ���粻��������Բ�����д����)</span></li>
 <? }?>

 <? if(check_in($wylx,"סլ,��Ԣ,д��¥,����,�ù�/�Ƶ�")){?>
 <li class="l1">¥�㣺</li>
 <li class="l2">
 <span class="fd">��</span><input name="tlc1" value="<?=returnzdv($row[lc1])?>" class="inp" style="width:26px;margin-left:7px;" type="text" /><span class="fd">�㣬��</span> 
 <input name="tlc2" value="<?=returnzdv($row[lc2])?>" class="inp" style="width:26px;margin-left:7px;" type="text" /><span class="fd">��</span> 
 <span class="fd">(С��ʾ���粻����ܹ����㣬���Բ�����д¥������)</span>
 </li>
 <? }?>

 <? if(check_in($wylx,"����")){?>
 <li class="l1">����¥�㣺</li>
 <li class="l2">
 <span class="fd">��</span><input name="tlc1" value="<?=returnzdv($row[lc1])?>" class="inp" style="width:26px;margin-left:7px;" type="text" /><span class="fd">�㣬����</span> 
 <input name="tlc2" value="<?=returnzdv($row[lc2])?>" class="inp" style="width:26px;margin-left:7px;" type="text" /><span class="fd">��</span> 
 <span class="fd">(С��ʾ���粻���¥�㣬���Բ�����д¥����)</span>
 </li>
 <? }?>

 <? if(check_in($wylx,"סլ,��Ԣ,����")){?>
 <li class="l1">���ͽṹ��</li>
 <li class="l2">
 <input name="thx1" value="<?=returnzdv($row[hx1])?>" class="inp" style="width:26px;" type="text" /> <span class="fd">��</span> 
 <input name="thx2" value="<?=returnzdv($row[hx2])?>" class="inp" style="width:26px;margin-left:7px;" type="text" /> <span class="fd">��</span> 
 <input name="thx3" value="<?=returnzdv($row[hx3])?>" class="inp" style="width:26px;margin-left:7px;" type="text" /> <span class="fd">��</span> 
 <input name="thx4" value="<?=returnzdv($row[hx4])?>" class="inp" style="width:26px;margin-left:7px;" type="text" /> <span class="fd">��</span> 
 <input name="thx5" value="<?=returnzdv($row[hx5])?>" class="inp" style="width:26px;margin-left:7px;" type="text" /> <span class="fd">��̨</span> 
 <span class="fd">(С��ʾ������������û�У����Բ���д)</span>
 </li>
 <? }?>

 <li class="l1"><span class="red">*</span> ��ϵ�ˣ�</li>
 <li class="l2"><input name="tlxr" value="<?=returnjgdw($row[lxr],"",$rowuser[nc])?>" style="width:160px;" class="inp" type="text" /></li>
 <li class="l1"><span class="red">*</span> ��ϵ���룺</li>
 <li class="l2"><input name="tmot" value="<?=returnjgdw($row[mot],"",$rowuser[mot])?>" style="width:160px;" class="inp" type="text" /></li>

 </ul>
 <!--����E-->

 <!--Ч��ͼ/����B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">Ч��ͼ/����</li><li class="l3"></li></ul>
 <ul class="uk uk0">
 <li class="l1">Ч��ͼ��</li>
 <li class="l2">
 <iframe style="float:left;" src="tpupload.php?admin=1&bh=<?=$bh?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 <span class="fd">&nbsp;&nbsp;������ϴ�16��Ч��ͼ</span>
 </li>
 </ul>
 <div class="xgtp">
  <div id="xgtp1" style="display:none;">���ڴ���</div>
  <div id="xgtp2"></div>
 </div>
 
 <ul class="uk uk0">
 <li class="l7">��Դ���飺</li>
 <li class="l8"><script id="editor" name="content" type="text/plain" style="width:840px;height:390px;"><?=$row[txt]?></script></li>
 </ul>
 <!--Ч��ͼ/����E-->

 <!--ѡ��B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">ѡ����Ϣ</li><li class="l3"></li></ul>
 <div class="rts" style="cursor:pointer;" onclick="xtinfonc()">�����<span id="xtzs">����</span>�� ѡ��ֿ��Բ���д��������ѡ����Ϣ���������ķ�Դ���챻���⣬�������Ҳ���������������ƺá�</div>
 <div id="xuantian">
 <ul class="uk">
 <? if(check_in($wylx,"д��¥")){?>
 <li class="l1">����/����</li>
 <li class="l2">
 <select name="tlxid" class="inp1">
 <option value="0" <? if(0==$row[lxid]){?> selected="selected"<? }?>>ѡ������</option>
 <? while1("*","fcw_xzllx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tjbid" class="inp1">
 <option value="0" <? if(0==$row[jbid]){?> selected="selected"<? }?>>ѡ�񼶱�</option>
 <? while1("*","fcw_xzljb order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <? }?>
 <? if(check_in($wylx,"����")){?>
 <li class="l1">��ҵ���ͣ�</li>
 <li class="l2">
 <select name="thylx" id="thylx" class="inp1" onchange="hylxcha()">
 <option value="0">ѡ����ҵ</option>
 <? while1("*","fcw_sphy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[hylx]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <div class="areaqy2">
 <input type="hidden" id="thylx2" name="thylx2" value="0" />
 <iframe name="fhylx2" id="fhylx2" height="33" width="150" border="0" frameborder="0" src="../config/hylx2.php?nid=<?=$row[hylx2]?>&id=<?=$row[hylx]?>"></iframe>
 <? if(empty($row[hylx])){?>
 <script language="javascript">hylxcha();</script>
 <? }?>
 </div>
 </li>
 <li class="l1">�������ͣ�</li>
 <li class="l2">
 <select name="tlxid" class="inp1">
 <option value="0" <? if(0==$row[lxid]){?> selected="selected"<? }?>>ѡ������</option>
 <? while1("*","fcw_splx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tjbid" class="inp1">
 <option value="0" <? if(0==$row[jbid]){?> selected="selected"<? }?>>ѡ����������</option>
 <? while1("*","fcw_pmlx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[jbid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <? }?>
 <? if(check_in($wylx,"����")){?>
 <li class="l1">�������ͣ�</li>
 <li class="l2">
 <select name="tlxid" class="inp1">
 <option value="0" <? if(0==$row[lxid]){?> selected="selected"<? }?>>ѡ������</option>
 <? while1("*","fcw_bslx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">��԰�����</li>
 <li class="l2"><input name="tmj1" value="<?=returnzdv($row[mj1])?>" style="width:60px;" class="inp" type="text" />
 <span class="fd"> ƽ��(С��ʾ���粻�����û�У����Բ�����д��԰���)</span></li>
 <li class="l1">�����������</li>
 <li class="l2"><input name="tmj2" value="<?=returnzdv($row[mj2])?>" style="width:60px;" class="inp" type="text" />
 <span class="fd"> ƽ��(С��ʾ���粻�����û�У����Բ�����д���������)</span></li>
 <? }?>
 <? if(check_in($wylx,"סլ,��Ԣ,����,ƽ��,д��¥,����,����,�ù�/�Ƶ�")){?>
 <li class="l1">���������</li>
 <li class="l2">
 <select name="tzxqkid" class="inp1">
 <option value="0">װ�����</option>
 <? while1("*","fcw_zxqk order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[zxqkid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tcxid" class="inp1">
 <option value="0" selected="selected">����</option>
 <? while1("*","fcw_fwcx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[cxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tjznd" class="inp1">
 <option value="0">�������</option>
 <? for($i=date("Y",time());$i>=1949;$i--){?>
 <option value="<?=$i?>" <? if($row[fl]==$i){?> selected="selected"<? }?>><?=$i?>��</option>
 <? }?>
 </select>
 </li>
 <? }?>
 <li class="l1">����λ�ã�</li>
 <li class="l2"><input type="text" class="inp" name="tfadd" size="60" value="<?=$row[fadd]?>" /></li>
 <? if(check_in($wylx,"סլ,��Ԣ,����,д��¥,����")){?>
 <li class="l1">��ҵ�ѣ�</li>
 <li class="l2"><input name="tmoney2" id="tmoney2" value="<?=returnzdv($row[money2])?>" style="width:120px;" class="inp" type="text" />
 <span class="fd">(С��ʾ���粻�����û����ҵ�ѣ���������)</span></li>
 <? }?>
 </ul>
 <? if(panduan("admin","fcw_gongjiao where admin=1")==1){?>
 <ul class="uk1 uk10">
 <li class="l1">������·��</li>
 <li class="l2">
 <? while1("*","fcw_gongjiao where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <label><input name="Cgongjiao" type="checkbox" value="<?=$row1[id]?>"<? if(strstr($row[gongjiaoid],",".$row1[id].",")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <? }?>
 </li>
 </ul>
 <? }?>
 <? if(panduan("admin","fcw_ditie where admin=1")==1){?>
 <ul class="uk1 uk10">
 <li class="l1">������·��</li>
 <li class="l2">
 <? while1("*","fcw_ditie where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <label><input name="Cditie" type="checkbox" value="<?=$row1[id]?>"<? if(strstr($row[ditieid],",".$row1[id].",")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <? }?>
 </li>
 </ul>
 <? }?>
 <?
 $xs="xcf".$row[wylx]."xcf";
 if(panduan("*","fcw_wyts where czwy like '%".$xs."%' order by xh asc")==1){
 ?>
 <ul class="uk1 uk10">
 <li class="l1">��ҵ��ɫ��</li>
 <li class="l2">
 <label><input name="C21" type="checkbox" onclick="xuan1()" /> ȫѡ</label>
 <?
 while1("*","fcw_wyts where czwy like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <label><input name="C11" type="checkbox" value="<?=$row1[id]?>"<? if(strstr($row[wytsid],"xcf".$row1[id]."xcf")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <?
 }
 ?>
 </li>
 </ul>
 <? }?>
 <?
 $xs="xcf".$row[wylx]."xcf";
 if(panduan("*","fcw_peitao where czwy like '%".$xs."%' order by xh asc")==1){
 ?>
 <ul class="uk1 uk10">
 <li class="l1">������ʩ��</li>
 <li class="l2">
 <label><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</label>
 <?
 while1("*","fcw_peitao where czwy like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <label><input name="C1" type="checkbox" value="<?=$row1[name1]?>"<? if(strstr($row[pz],"xcf".$row1[name1]."xcf")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <?
 }
 ?>
 </li>
 </ul>
 <? }?>
 <ul class="uk uk0">
 <li class="l1">��Ƶ��ַ��</li>
 <li class="l2">
 <input type="text" class="inp" name="tvideo" size="50" value="<?=$row[video]?>" onfocus="inpf(this)" onblur="inpb(this)" />
 <span class="fd red">֧����Ѷ��Ƶ���ſ���Ƶ�����Ʋ��ŵ�ַ����</span>
 </li>
 <li class="l1">VR��Ƶ���ӣ�</li>
 <li class="l2"><input type="text" class="inp" name="tvrurl" size="80" value="<?=$row[vrurl]?>" /></li>
 <li class="l1">�Զ����ţ�</li>
 <li class="l2"><input type="text" class="inp" name="tfangbh" size="10" value="<?=$row[fangbh]?>" /></li>
 <? if($row[fbty]==2){?>
 <li class="l1">����������</li>
 <li class="l2"><input name="tfdname" value="<?=$row[fdname]?>" style="width:160px;" class="inp" type="text" /></li>
 <li class="l1">�������룺</li>
 <li class="l2"><input name="tfdmot" value="<?=$row[fdmot]?>" style="width:160px;" class="inp" type="text" /><span class="fd">(������Ϣ�����Լ��鿴����������ʾ)</span></li>
 <? }?>
 </ul>
 </div>
 <!--ѡ��E-->
 
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","chuzulist.php")?></li>
 </ul>
 
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
<script type="text/javascript">
//ʵ�����༭��
function searchCHA(){
 t1v=document.f1.txq.value;
 document.getElementById("searchHtml").innerHTML="";
 document.getElementById("searchHtml").style.display="none";
 if(t1v!=""){
    $.post("xqsearch.php",{keyv:t1v},function(result){
     $("#searchHtml").html(result);
	 if(result!=""){
	 document.getElementById("searchHtml").style.display="";
	 }
    });
 }
}
$('#searcht1').bind('input propertychange', function() {
 searchCHA();
});

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

function xtinfonc(){
if(document.getElementById("xtzs").innerHTML=="չ��"){document.getElementById("xuantian").style.display="";document.getElementById("xtzs").innerHTML="����";}
else{document.getElementById("xuantian").style.display="none";document.getElementById("xtzs").innerHTML="չ��";}
}

var ue = UM.getEditor('editor');
</script>
</body>
</html>