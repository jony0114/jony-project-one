<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("权限受限！","./");}
$userid=returnuserid($_SESSION[FCWuser]);
$bh=$_GET[bh];
if($rowcontrol[fklook]=="on"){$zt=0;}else{$zt=1;}
$mybh=$_GET[mybh];

//函数开始
if($_GET[control]=="update"){
 zwzr();
 $ifjc=$_POST[tifjc];if(!is_numeric($ifjc)){$ifjc=0;}
 $wdes=sqlzhuru($_POST[twdes]);if(empty($wdes)){$wdes=sqlzhuru($_POST[ttit]);}
 updatetable("fcw_xqnews","tit='".sqlzhuru($_POST[ttit])."',txt='".sqlzhuru($_POST[content])."',ifjc=".$ifjc.",titys='".sqlzhuru($_POST[ttitys])."',wdes='".$wdes."',zt=".$zt.",bj='".sqlzhuru($_POST[tbj])."',ly='".sqlzhuru($_POST[tly])."',lyurl='".sqlzhuru($_POST[tlyurl])."' where bh='".$mybh."' and uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
 uploadtp($mybh,"楼盘动态",$_SESSION[FCWuser]);
 php_toheader("loupannews.php?t=suc&action=update&mybh=".$mybh."&bh=".$bh);

}
//函数结果

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>

<link href="../config/ueditor_mini/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">
<script src="../config/ueditor_mini/jquery-1.10.2.min.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor_mini/umeditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor_mini/umeditor.min.js"></script>
<script type="text/javascript" src="../config/ueditor_mini/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 楼盘管理</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",9,");?>
 <? include("loupantop.php");?>
 <? include("rcap6.php");?>
 <script language="javascript">
 document.getElementById("rcap5").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功!","loupannews.php?action=".$_GET[action]."&bh=".$bh."&mybh=".$_GET[mybh])?>
 
 <? 
 while0("*","fcw_xqnews where bh='".$_GET[mybh]."' and xqbh='".$bh."' and uid='".$_SESSION[FCWuser]."'");
 if(!$row=mysql_fetch_array($res)){php_toheader("loupannewslist.php?bh=".$bh);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
 tjwait();
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
 <li class="l1"><span class="red">*</span> 标题：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">编辑：</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[bj]?>" class="inp" name="tbj" /> </li>
 <li class="l1">来源：</li>
 <li class="l2">
 <input type="text" size="20" value="<?=$row[ly]?>" class="inp" name="tly" /> 
 <span class="fd">来源网址：</span><input type="text" size="60" value="<?=$row[lyurl]?>" class="inp" name="tlyurl" />
 </li>
 <li class="l1">是否加粗：</li>
 <li class="l2">
 <select name="tifjc">
 <option value="0">否</option>
 <option value="1"<? if(1==$row[ifjc]){?> selected="selected"<? }?>>是</option>
 </select>
 </li>
 <li class="l1">标题颜色：</li>
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
 </ul>
 
 <ul class="uk1">
 <li class="l1">效果图：</li>
 <li class="l2">
 <ul class="tpupload">
 <li class="tl4">
 <? 
 while1("id,bh,tp,type1,xh","fcw_tp where bh='".$mybh."' and uid='".$_SESSION[FCWuser]."' order by xh asc");
 for($i=1;$i<=1;$i++){
 $tpv="";$tpid="";
 if($row1=mysql_fetch_array($res1)){$tp=preg_split("/\./",$row1[tp]);$tp1=preg_split("/\//",$tp[0]);$tpv=$tp1[5];$tpid=$row1[id];}
 ?>
 <span class="tpf" onmouseover="tphover(<?=$i?>)" onmouseout="tphout(<?=$i?>)"><iframe src="lpnewsupload.php?tpbh=<?=$tpv?>&tpid=<?=$tpid?>&bh=<?=$mybh?>&ty=楼盘动态" width="74" scrolling="no" height="91" id="tpf<?=$i?>" frameborder="0"></iframe></span>
 <? }?>
 </li>
 </ul>
 </li>
 </ul>
 
 <ul class="uk">
 <li class="l9">摘要描述：</li>
 <li class="l10 hui"><textarea onkeyup="wdesin()" onmouseup="wdesin()" name="twdes"><?=$row[wdes]?></textarea> 已输入<span id="wdesnum">0</span>字，最多允许150字</li>
 <li class="l7">详情：</li>
 <li class="l8"><script name="content" id="editor" type="text/plain" style="width:100%;height:380px;"><?=$row[txt]?></script></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步","loupannewslist.php?bh=".$bh)?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
<script type="text/javascript">
wdesin();
//实例化编辑器
var ue = UM.getEditor('editor');
</script>
</body>
</html>