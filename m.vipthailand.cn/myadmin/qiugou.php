<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","fcw_fang where bh='".$bh."' and type1='��'");
if(!$row=mysql_fetch_array($res)){php_toheader("qiugoulist.php");}
$muid=$row[uid];

//B
if($_GET[control]=="update" && $_POST[jvs]=="qiugou"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];

 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $money2=$_POST[tmoney2];if(!is_numeric($money2)){$money2=0;}
 $mj=$_POST[tmj];if(!is_numeric($mj)){$mj=0;}
 $mj1=$_POST[tmj1];if(!is_numeric($mj1)){$mj1=0;}
 $zdxh=$_POST[tzdxh];if(!is_numeric($zdxh)){$zdxh=0;}

 if(!empty($_POST[tzddq])){$ses=$ses."zddq='".$_POST[tzddq]."',";}
 updatetable("fcw_fang",
			 $ses."uip='".$uip."',
			 lxr='".sqlzhuru($_POST[tlxr])."',
			 mot='".sqlzhuru($_POST[tmot])."',
			 mj=".$mj.",mj1=".$mj1.",
			 money1=".$money1.",money2=".$money2.",
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 zt=".sqlzhuru($_POST[Rzt]).",
			 mytj=".sqlzhuru($_POST[Rmytj]).",
			 zdxh=".$zdxh." where uid='".$muid."' and bh='".$bh."'");
 php_toheader("qiugou.php?t=suc&bh=".$bh);

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
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("�������󹺱��⣡");document.f1.ttit.focus();return false;}
 if((document.f1.tmot.value).replace(/\s/,"")==""){alert("��������ϵ�绰��");document.f1.tmot.focus();return false;}
 if((document.f1.tlxr.value).replace(/\s/,"")==""){alert("��������ϵ�ˣ�");document.f1.tlxr.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="qiugou.php?control=update&bh=<?=$row[bh]?>";
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
 <? $leftid=3;include("menu_fang.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","qiugou.php?bh=".$_GET[bh]);}?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">����Ϣ</a>
 <a href="qiugoulist.php">�����б�</a>
 </div> 

 <!--begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="qiugou" name="jvs" />
 <ul class="uk">
 <li class="l1">�����ͣ�</li>
 <li class="l21"><strong><?=returnwylx(4,$row[wylx])?></strong>  &nbsp;&nbsp;&nbsp;[<a href="qiugoulx.php?action=update&id=<?=$row[id]?>">�޸�����</a>]</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ���⣺</li>
 <li class="l2"><input type="text" class="inp" name="ttit" size="80" value="<?=$row[tit]?>" /></li>
 <li class="l1">����Ҫ��</li>
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
 <li class="l1">����Ԥ�㣺</li>
 <li class="l2">
 <input name="tmoney1" value="<?=returnzdv($row[money1])?>" class="inp" style="width:46px;" type="text" /><span class="fd" style="margin-right:10px;">��</span> 
 <input name="tmoney2" value="<?=returnzdv($row[money2])?>" class="inp" style="width:46px;" type="text" /><span class="fd">������</span> 
 <span class="fd hui">(С��ʾ����ϣ����̸���޾���Ԥ�㣬������)</span>
 </li>
 <li class="l1">���Ҫ��</li>
 <li class="l2">
 <input name="tmj" value="<?=returnzdv($row[mj])?>" class="inp" style="width:46px;" type="text" /><span class="fd" style="margin-right:10px;">��</span> 
 <input name="tmj1" value="<?=returnzdv($row[mj1])?>" class="inp" style="width:46px;" type="text" /><span class="fd">ƽ������</span>
 <span class="fd hui">(С��ʾ�����������ر�Ҫ�󣬿�����)</span>
 </li>
 <li class="l10">��ϸ������</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
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
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��ϵ���룺</li>
 <li class="l2"><input name="tmot" value="<?=$row[mot]?>" style="width:160px;" class="inp" type="text" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �� ϵ �ˣ�</li>
 <li class="l2"><input name="tlxr" value="<?=$row[lxr]?>" style="width:160px;" class="inp" type="text" /></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">����Ա����</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">������Ա��</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
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
 </ul>
 <ul class="uk">
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
//ʵ�����༭��
var ue = UE.getEditor('editor');
</script>
</body>
</html>