<?
//�޸ĸ��ļ�Ҫͬ���޸�fcwmanage/qiugou.php�Լ��ֻ���
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
sesCheck();
$bh=$_GET[bh];
while0("*","fcw_fang where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$bh."' and type1='��'");
if(!$row=mysql_fetch_array($res)){php_toheader("qiugoulist.php");}
$wylx=$row[wylx];
$muid=$row[uid];
$id=$row[id];

if(1==$_SESSION[FCWuserID]){
 if($rowcontrol[userfy]=="on"){$zt=0;}else{$zt=1;}
}elseif($_SESSION[FCWuserID]==2 || $_SESSION[FCWuserID]==4){
 if($rowcontrol[jjrfy]=="on"){$zt=0;}else{$zt=1;}
}

//B
if($_GET[control]=="update" && $_POST[jvs]=="qiugou"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];

 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $money2=$_POST[tmoney2];if(!is_numeric($money2)){$money2=0;}
 $mj=$_POST[tmj];if(!is_numeric($mj)){$mj=0;}
 $mj1=$_POST[tmj1];if(!is_numeric($mj1)){$mj1=0;}

 updatetable("fcw_fang",
			 "uip='".$uip."',
			 lxr='".sqlzhuru($_POST[tlxr])."',
			 mot='".sqlzhuru($_POST[tmot])."',
			 mj=".$mj.",mj1=".$mj1.",
			 money1=".$money1.",money2=".$money2.",
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 zt=".$zt." where uid='".$muid."' and bh='".$bh."'");
 php_toheader("fangsuc.php?bh=".$bh."&cz=qiugou&id=".$id);

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
<script type="text/javascript" charset="utf-8" src="../ckeditor/kindeditor.js"></script>
<script type="text/javascript">
KE.show({
id : 'content',
resizeMode : 1,
cssPath : '../ckeditor/examples/index.css',
items : [
'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
'removeformat', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
'insertunorderedlist']
});

function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("�������󹺱��⣡");document.f1.ttit.focus();return false;}
 if((document.f1.tmot.value).replace(/\s/,"")==""){alert("��������ϵ�绰��");document.f1.tmot.focus();return false;}
 if((document.f1.tlxr.value).replace(/\s/,"")==""){alert("��������ϵ�ˣ�");document.f1.tlxr.focus();return false;}
 tjwait();
 f1.action="qiugou.php?control=update&bh=<?=$row[bh]?>";
}
</script>

</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��������Ϣ</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",4,");?>
 <? include("qiugoucap.php");?>
 <script language="javascript">
 document.getElementById("step2").className="l1 l11";
 </script>
 <? systs("��ϲ���������ɹ�!","qiugou.php?bh=".$bh)?>
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
 <select name="area1" id="area1" class="inp1" onchange="areacha()">
 <option value="0">������</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[py]." - ".$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="0" />
 <iframe name="fareas" id="fareas" height="30" width="150" border="0" frameborder="0" src="../config/areas.php?nid=<?=$row[areaids]?>&id=<?=$row[areaid]?>"></iframe>
 <? if($row[areaid]==""){?>
 <script language="javascript">areacha();</script>
 <? }?>
 </div>
 </li>
 <li class="l1">����Ԥ�㣺</li>
 <li class="l2">
 <input name="tmoney1" value="<?=returnzdv($row[money1])?>" class="inp" style="width:46px;" type="text" /><span class="fd fd1">��</span> 
 <input name="tmoney2" value="<?=returnzdv($row[money2])?>" class="inp" style="width:46px;" type="text" /><span class="fd fd1">������</span> 
 <span class="fd fd1 hui">(С��ʾ����ϣ����̸���޾���Ԥ�㣬������)</span>
 </li>
 <li class="l1">���Ҫ��</li>
 <li class="l2">
 <input name="tmj" value="<?=returnzdv($row[mj])?>" class="inp" style="width:46px;" type="text" /><span class="fd fd1">��</span> 
 <input name="tmj1" value="<?=returnzdv($row[mj1])?>" class="inp" style="width:46px;" type="text" /><span class="fd fd1">ƽ������</span> 
 <span class="fd fd1 hui">(С��ʾ�����������ر�Ҫ�󣬿�����)</span>
 </li>
 </ul>
 
 <ul class="uk">
 <li class="l7">��ϸҪ��</li>
 <li class="l8"><textarea id="content" name="content" style="width:100%;height:435px;visibility:hidden;"><?=$row[txt]?></textarea></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��ϵ���룺</li>
 <li class="l2"><input name="tmot" value="<?=$row[mot]?>" style="width:160px;" class="inp" type="text" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �� ϵ �ˣ�</li>
 <li class="l2"><input name="tlxr" value="<?=$row[lxr]?>" style="width:160px;" class="inp" type="text" /></li>
 </ul>
 <ul class="uk">
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("��һ��","qiugoulist.php")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>