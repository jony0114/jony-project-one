<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","fcw_fang where bh='".$bh."' and type1='����'");
if(!$row=mysql_fetch_array($res)){php_toheader("chuzulist.php");}
$wylx=$row[wylx];
$muid=$row[uid];
$timestamp=time();
while1("*","fcw_admin where adminuid='".$_SESSION[FCWADMINSES]."'");$row1=mysql_fetch_array($res1);$adminpwd=$row1[adminpwd];

$sqluser="select * from fcw_user where uid='".$row[uid]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}

//B
if($_GET[control]=="update" && $_POST[jvs]=="chuzu"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("Ȩ�޲���","default.php");}
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
 $jbid=$_POST[tjbid];if(!is_numeric($jbid)){$jbid=0;}
 $zdxh=$_POST[tzdxh];if(!is_numeric($zdxh)){$zdxh=0;}
 $xq=sqlzhuru($_POST[txq]);

 if(!empty($_POST[tzddq])){$ses=$ses."zddq='".$_POST[tzddq]."',";}
 while1("id,admin,xq,zt,xqzb,xqzb1,xqzb2","fcw_xq where admin=1 and zt=0 and xq='".$xq."' order by id asc");if($row1=mysql_fetch_array($res1)){
 $ses=$ses."xqzb='".$row1[xqzb]."',xqzb1='".$row1[xqzb1]."',xqzb2='".$row1[xqzb2]."',";
 }
 updatetable("fcw_fang",
			 $ses."fangbh='".sqlzhuru($_POST[tfangbh])."',
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
			 fadd='".sqlzhuru($_POST[tfadd])."',
			 lxid=".$lxid.",jbid=".$jbid.",
			 ifxj=".sqlzhuru($_POST[Rifxj]).",
			 zt=".sqlzhuru($_POST[Rzt]).",
			 czfs=".sqlzhuru($_POST[Rczfs]).",
			 fkfs='".sqlzhuru($_POST[tfkfs])."',
			 mytj=".sqlzhuru($_POST[Rmytj]).",
			 iftj=".sqlzhuru($_POST[tiftj]).",
			 zdxh=".$zdxh.",
			 video='".sqlzhuru($_POST[tvideo])."',
			 jiejing='".sqlzhuru($_POST[tjiejing])."',
			 hylx=".intval($_POST[thylx]).",
			 hylx2=".intval($_POST[thylx2]).",
			 vrurl='".sqlzhuru($_POST[tvrurl])."',
			 ld1='".sqlzhuru($_POST[tld1])."',
			 ld2='".sqlzhuru($_POST[tld2])."',
			 ld3='".sqlzhuru($_POST[tld3])."'
             where uid='".$muid."' and bh='".$bh."'");
 php_toheader("chuzu.php?t=suc&bh=".$bh);

}
//E

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�����̨</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

<script language="javascript">
function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("�����������⣡");document.f1.ttit.focus();return false;}
 if((document.f1.tmj.value).replace(/\s/,"")=="" || isNaN(document.f1.tmj.value)){alert("�����������");document.f1.tmj.focus();return false;}
 if((document.f1.tfadd.value).replace(/\s/,"")==""){alert("�������ַ��");document.f1.tfadd.focus();return false;}
 if((document.f1.tmot.value).replace(/\s/,"")==""){alert("��������ϵ�绰��");document.f1.tmot.focus();return false;}
 if((document.f1.tlxr.value).replace(/\s/,"")==""){alert("��������ϵ�ˣ�");document.f1.tlxr.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
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
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="chuzu.php?control=update&bh=<?=$row[bh]?>&pt="+str+"&ts="+str1+"&ditie="+ditieID+"&gongjiao="+gongjiaoID;
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu4").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_fang.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","chuzu.php?bh=".$_GET[bh]);}?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">������Ϣ</a>
 <a href="chuzulist.php">�����б�</a>
 </div> 

 <!--begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="chuzu" name="jvs" />
 <ul class="uk">
 <li class="l1">�������ͣ�</li>
 <li class="l21"><strong><?=returnwylx(4,$row[wylx])?></strong>  &nbsp;&nbsp;&nbsp;[<a href="chuzulx.php?action=update&id=<?=$row[id]?>">�޸�����</a>]</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ���⣺</li>
 <li class="l2"><input type="text" class="inp" name="ttit" size="80" value="<?=$row[tit]?>" /></li>
 <li class="l1">�Զ����ţ�</li>
 <li class="l2"><input type="text" class="inp" name="tfangbh" size="10" value="<?=$row[fangbh]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �����</li>
 <li class="l2">
 <input type="text" class="inp" name="tmj" size="5" value="<?=$row[mj]?>" /> 
 <span class="fd"><? if(check_in($wylx,"����")){echo "Ķ";}else{echo "ƽ��";}?></span>
 </li>
 <li class="l1">���</li>
 <li class="l2">
 <input type="text" class="inp" name="tmoney1" size="5" value="<?=returnzdv($row[money1])?>" />
 <select name="tjgdw" class="inp" style="margin-left:10px;">
 <option value="Ԫ/��" <? if($row[jgdw]=="Ԫ/��"){?> selected="selected"<? }?>>Ԫ/��</option>
 <option value="Ԫ/��" <? if($row[jgdw]=="Ԫ/��"){?> selected="selected"<? }?>>Ԫ/��</option>
 <option value="Ԫ/����" <? if($row[jgdw]=="Ԫ/����"){?> selected="selected"<? }?>>Ԫ/����</option>
 <option value="Ԫ/��" <? if($row[jgdw]=="Ԫ/��"){?> selected="selected"<? }?>>Ԫ/��</option>
 <option value="Ԫ/��" <? if($row[jgdw]=="Ԫ/��"){?> selected="selected"<? }?>>Ԫ/��</option>
 </select>
 <select name="tfkfs" class="inp" style="margin-left:10px;">
 <option value="��3Ѻ1"<? if($row[fkfs]=="��3Ѻ1"){?> selected="selected"<? }?>>��3Ѻ1</option>
 <option value="��1Ѻ1"<? if($row[fkfs]=="��1Ѻ1"){?> selected="selected"<? }?>>��1Ѻ1</option>
 <option value="��2Ѻ1"<? if($row[fkfs]=="��2Ѻ1"){?> selected="selected"<? }?>>��2Ѻ1</option>
 <option value="��1Ѻ2"<? if($row[fkfs]=="��1Ѻ2"){?> selected="selected"<? }?>>��1Ѻ2</option>
 <option value="�긶��Ѻ"<? if($row[fkfs]=="�긶��Ѻ"){?> selected="selected"<? }?>>�긶��Ѻ</option>
 <option value="���긶��Ѻ"<? if($row[fkfs]=="���긶��Ѻ"){?> selected="selected"<? }?>>���긶��Ѻ</option>
 <option value="����"<? if($row[fkfs]=="����"){?> selected="selected"<? }?>>����</option>
 </select>
 <span class="fd hui">(С��ʾ�������ʾ����)</span>
 </li>

 <? if(check_in($wylx,"����")){?>
 <li class="l1">ת�÷ѣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney3" size="5" value="<?=returnzdv($row[money3])?>" /><span class="fd">��(С��ʾ�������ʾ��ת�÷�)</span></li>
 <? }?>
  
 <li class="l1">���ⷽʽ��</li>
 <li class="l2">
 <label><input name="Rczfs" type="radio" value="1" <? if(1==$row[czfs]){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Rczfs" type="radio" value="2" <? if(2==$row[czfs]){?> checked="checked"<? }?> /> ����</label>
 </li>

 <li class="l1">����С����</li>
 <li class="l2">
 <input name="txq" style="width:305px;" value="<?=$row[xq]?>" class="inp inpfd" type="text" autocomplete="off" disableautocomplete  id="searcht1" />
 <div id="searchHtml" style="display:none;" onmouseleave="this.style.display='none';"></div>
 </li>
  
 <? if(check_in($wylx,"����,ƽ��")){?>
 <li class="l1">������</li>
 <li class="l2"><input name="tlc1" value="<?=returnzdv($row[lc1])?>" style="width:26px;" class="inp" type="text" /><span class="fd">��</span><span class="fd hui">(С��ʾ���粻��������Բ�����д����)</span></li>
 <? }?>

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

 <? if(check_in($wylx,"סլ,��Ԣ,д��¥,����,�ù�/�Ƶ�")){?>
 <li class="l1">¥�㣺</li>
 <li class="l2">
 <span class="fd" style="margin-left:0;margin-right:10px;">��</span><input name="tlc1" value="<?=returnzdv($row[lc1])?>" class="inp" style="width:26px;" type="text" /> 
 <span class="fd" style="margin-right:10px;">�㣬��</span><input name="tlc2" value="<?=returnzdv($row[lc2])?>" class="inp" style="width:26px;" type="text" /><span class="fd">��</span>
 <span class="fd hui">(С��ʾ���粻����ܹ����㣬���Բ�����д¥������)</span>
 </li>
 <? }?>
 
 <? if(check_in($wylx,"����")){?>
 <li class="l1">����¥�㣺</li>
 <li class="l2">
 <span class="fd" style="margin-left:0;margin-right:10px;">��</span><input name="tlc1" value="<?=returnzdv($row[lc1])?>" class="inp" style="width:26px;" type="text" /> 
 <span class="fd" style="margin-right:10px;">�㣬��</span><input name="tlc2" value="<?=returnzdv($row[lc2])?>" class="inp" style="width:26px;" type="text" /><span class="fd">��</span>
 <span class="fd hui">(С��ʾ���粻���¥�㣬���Բ�����д¥��)</span>
 </li>
 <? }?>
 
 <li class="l1">��������</li>
 <li class="l2">
 <div class="areaqy1">
 <select name="area1" id="area1" onchange="areacha()" class="inp">
 <option value="0">������</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[py]." - ".$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="0" />
 <iframe name="fareas" id="fareas" height="50" width="150" border="0" frameborder="0" src="areas.php?nid=<?=$row[areaids]?>&id=<?=$row[areaid]?>"></iframe>
 <? if($row[areaid]==""){?>
 <script language="javascript">areacha();</script>
 <? }?>
 </div>
 </li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ����λ�ã�</li>
 <li class="l2"><input type="text" class="inp" name="tfadd" id="tfadd" size="60" value="<?=$row[fadd]?>" /></li>
 </ul>

 <!--Ч��ͼ/����B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">Ч��ͼ/����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">Ч��ͼ��</li>
 <li class="l2">
 <iframe style="float:left;" src="tpupload.php?admin=1&bh=<?=$bh?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 <span class="fd">������ϴ�16��Ч��ͼ</span>
 </li>
 </ul>
 <div class="xgtp">
  <div id="xgtp1" style="display:none;">���ڴ���</div>
  <div id="xgtp2"></div>
 </div>
 <!--Ч��ͼ/����E-->

 <? if(panduan("admin","fcw_gongjiao where admin=1")==1){?>
 <ul class="uk1 uk0">
 <li class="l1">������·��</li>
 <li class="l2">
 <? while1("*","fcw_gongjiao where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <label><input name="Cgongjiao" type="checkbox" value="<?=$row1[id]?>"<? if(strstr($row[gongjiaoid],",".$row1[id].",")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <? }?>
 </li>
 </ul>
 <? }?>
 
 <? if(panduan("admin","fcw_ditie where admin=1")==1){?>
 <ul class="uk1 uk0">
 <li class="l1">������·��</li>
 <li class="l2">
 <? while1("*","fcw_ditie where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <label><input name="Cditie" type="checkbox" value="<?=$row1[id]?>"<? if(strstr($row[ditieid],",".$row1[id].",")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <? }?>
 </li>
 </ul>
 <? }?>
 
 <ul class="uk uk0">
 <? if(check_in($wylx,"סլ,��Ԣ,����")){?>
 <li class="l1">���ͽṹ��</li>
 <li class="l2">
 <input name="thx1" value="<?=returnzdv($row[hx1])?>" class="inp" style="width:26px;" type="text" /><span class="fd" style="margin-right:10px;">��</span>
 <input name="thx2" value="<?=returnzdv($row[hx2])?>" class="inp" style="width:26px;" type="text" /><span class="fd" style="margin-right:10px;">��</span> 
 <input name="thx3" value="<?=returnzdv($row[hx3])?>" class="inp" style="width:26px;" type="text" /><span class="fd" style="margin-right:10px;">��</span> 
 <input name="thx4" value="<?=returnzdv($row[hx4])?>" class="inp" style="width:26px;" type="text" /><span class="fd" style="margin-right:10px;">��</span>
 <input name="thx5" value="<?=returnzdv($row[hx5])?>" class="inp" style="width:26px;" type="text" /><span class="fd">��̨</span>
 <span class="fd hui">(С��ʾ������������û�У����Բ���д)</span>
 </li>
 <? }?>

 <? if(check_in($wylx,"д��¥")){?>
 <li class="l1">����/����</li>
 <li class="l2">
 <select name="tlxid" class="inp" style="margin-right:10px;">
 <option value="0" <? if(0==$row[lxid]){?> selected="selected"<? }?>>ѡ������</option>
 <? while1("*","fcw_xzllx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tjbid" class="inp">
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
 <select name="thylx" id="thylx" class="inp" onchange="hylxcha()">
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
 <select name="tlxid" style="margin:0 10px 0 0;" class="inp">
 <option value="0" <? if(0==$row[lxid]){?> selected="selected"<? }?>>ѡ������</option>
 <? while1("*","fcw_splx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tjbid" class="inp">
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
 <select name="tlxid" class="inp">
 <option value="0" <? if(0==$row[lxid]){?> selected="selected"<? }?>>ѡ������</option>
 <? while1("*","fcw_bslx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">��԰�����</li>
 <li class="l2"><input name="tmj1" value="<?=returnzdv($row[mj1])?>" style="width:60px;" class="inp" type="text" />
 <span class="fd">ƽ��</span><span class="fd hui">(С��ʾ���粻�����û�У����Բ�����д��԰���)</span></li>
 <li class="l1">�����������</li>
 <li class="l2"><input name="tmj2" value="<?=returnzdv($row[mj2])?>" style="width:60px;" class="inp" type="text" />
 <span class="fd">ƽ��</span><span class="fd hui">(С��ʾ���粻�����û�У����Բ�����д���������)</span></li>
 <? }?>

 <? if(check_in($wylx,"סլ,��Ԣ,����,д��¥,����")){?>
 <li class="l1">��ҵ�ѣ�</li>
 <li class="l2"><input name="tmoney2" value="<?=returnzdv($row[money2])?>" style="width:120px;" class="inp" type="text" /> 
 <span class="fd hui">(С��ʾ���粻�����û����ҵ�ѣ���������)</span></li>
 <? }?>

 <? if(check_in($wylx,"סլ,��Ԣ,����,ƽ��,д��¥,����,����,�ù�/�Ƶ�")){?>
 <li class="l1">���������</li>
 <li class="l2">
 <select name="tzxqkid" class="inp">
 <option value="0">װ�����</option>
 <? while1("*","fcw_zxqk order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[zxqkid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tcxid" class="inp" style="margin-left:10px;">
 <option value="0" selected="selected">����</option>
 <? while1("*","fcw_fwcx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[cxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tjznd" class="inp" style="margin-left:10px;">
 <option value="0">�������</option>
 <? for($i=date("Y",time());$i>=1949;$i--){?>
 <option value="<?=$i?>" <? if($row[jznd]==$i){?> selected="selected"<? }?>><?=$i?>��</option>
 <? }?>
 </select>
 </li>
 <? }?>
 </ul>
 
 <?
 $xs="xcf".$row[wylx]."xcf";
 if(panduan("*","fcw_wyts where cswy like '%".$xs."%' order by xh asc")==1){
 ?>
 <ul class="uk1 uk0">
 <li class="l1">��ҵ��ɫ��</li>
 <li class="l2">
 <label><input name="C21" type="checkbox" onclick="xuan1()" /> ȫѡ</label>
 <?
 while1("*","fcw_wyts where cswy like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
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
 if(panduan("*","fcw_peitao where cswy like '%".$xs."%' order by xh asc")==1){
 ?>
 <ul class="uk1 uk0">
 <li class="l1">������ʩ��</li>
 <li class="l2">
 <label><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</label>
 <? while1("*","fcw_peitao where czwy like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <label><input name="C1" type="checkbox" value="<?=$row1[name1]?>"<? if(strstr($row[pz],"xcf".$row1[name1]."xcf")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <? }?>
 </li>
 </ul>
 <? }?>
 
 <ul class="uk">
 <li class="l4">�־����룺</li>
 <li class="l5"><textarea name="tjiejing"><?=$row[jiejing]?></textarea></li>
 <li class="l1">��Ƶ��ַ��</li>
 <li class="l2">
 <input type="text" class="inp" name="tvideo" size="60" value="<?=$row[video]?>" />
 <span class="fd">֧����Ѷ��Ƶ���ſ���Ƶ�����Ʋ��ŵ�ַ����</span>
 </li>
 <li class="l1">VR��Ƶ���ӣ�</li>
 <li class="l2"><input type="text" class="inp" name="tvrurl" size="80" value="<?=$row[vrurl]?>" /></li>
 <li class="l10">��ϸ������</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:390px;"><?=$row[txt]?></script></li>
 <li class="l1">�ϼ�/�¼ܣ�</li>
 <li class="l2">
 <label><input name="Rifxj" type="radio" value="0" <? if(0==$row[ifxj]){?>checked="checked"<? }?> /> �ϼ�</label>
 <label><input name="Rifxj" type="radio" value="1" <? if(1==$row[ifxj]){?>checked="checked"<? }?> /> �¼�</label>
 </li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �����Ƽ���</li>
 <li class="l2">
 <label><input name="Rmytj" type="radio" value="1"<? if(1==$row[mytj]){?> checked="checked"<? }?> /> �Ƽ�</label>
 <label><input name="Rmytj" type="radio" value="0"<? if(0==$row[mytj]){?> checked="checked"<? }?> /> ��ͨչʾ</label>
 </li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��ϵ�ˣ�</li>
 <li class="l2"><input name="tlxr" value="<?=returnjgdw($row[lxr],"",$rowuser[nc])?>" style="width:160px;" class="inp" type="text" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��ϵ���룺</li>
 <li class="l2"><input name="tmot" value="<?=returnjgdw($row[mot],"",$rowuser[mot])?>" style="width:160px;" class="inp" type="text" /></li>
 <? if($row[fbty]==2){?>
 <li class="l1">����������</li>
 <li class="l2"><input name="tfdname" value="<?=$row[fdname]?>" style="width:160px;" class="inp" type="text" /></li>
 <li class="l1">�������룺</li>
 <li class="l2"><input name="tfdmot" value="<?=$row[fdmot]?>" style="width:160px;" class="inp" type="text" /><span class="fd">(������Ϣ�����Լ��鿴����������ʾ)</span></li>
 <? }?>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">������Ա��</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
 </li>
 <li class="l1">�Ƽ���ţ�</li>
 <li class="l2">
 <input type="text" value="<?=returnjgdw($row[iftj],"",0)?>" class="inp" size="5" name="tiftj" />
 <span class="fd">0��ʾ���Ƽ�����֮����С�����Ƽ�</span>
 </li>
 <li class="l1">�ö���ţ�</li>
 <li class="l2">
 <input name="tzdxh" style="width:35px;" value="<?=$row[zdxh]?>" class="inp" type="text" />
 <span class="fd" style="margin-right:10px;">����ʱ��:</span><input name="tzddq" style="width:180px;" value="<?=$row[zddq]?>" class="inp" type="text" />
 <span class="fd">������,��ȷ�ĸ�ʽ�� 2014-12-12 12:12:12</span>
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
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
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

//ʵ�����༭��
var ue = UE.getEditor('editor');
</script>
</body>
</html>