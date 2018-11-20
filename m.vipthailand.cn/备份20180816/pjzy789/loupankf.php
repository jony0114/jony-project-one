<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];
$mybh=$_GET[mybh];

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("权限不够","default.php");}
 zwzr();
 updatetable("fcw_kanfang","
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 hg='".sqlzhuru($_POST[content1])."',
			 bmzt=".sqlzhuru($_POST[tbmzt]).",
			 zt=".$_POST[Rzt].",
			 iftj=".sqlzhuru($_POST[tiftj])." where bh='".$mybh."' and xqbh='".$bh."'");
 $userid=returnuserid($_POST[tuid]);
 uploadtpone(1,"upload/".$userid."/f/".$bh."/",$mybh,$mybh,'看房团',$_POST[tuid],450,250,225,125,0,0,"no");
 php_toheader("loupankf.php?t=suc&action=update&mybh=".$mybh."&bh=".$bh);

}
//函数结果

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

<script language="javascript">
function bmztonc(){
document.getElementById("hg").style.display="none";
bm=parseInt(document.f1.tbmzt.value);
if(2==bm || 3==bm){document.getElementById("hg").style.display="";}
}
</script>

</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0402,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_loupan.php");?>

<div class="right">
 
 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit7").className="a1";</script>

 <!--B-->
 <div class="rkuang">
 <?
 while0("*","fcw_kanfang where bh='".$_GET[mybh]."' and xqbh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("loupankflist.php?bh=".$bh);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="loupankf.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 标题：</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">活动宣传图：</li>
 <li class="l2"><input type="file" class="inp1" name="inp1" id="inp1" size="25"><span class="fd">最佳尺寸：450*250</span></li>
 <li class="l8"></li>
 <li class="l9"><img src="<?=returntppd("../upload/".$userid."/f/".$bh."/".$row[bh]."-1.jpg","img/none100x100.gif")?>" width="65" height="65" /></li>
 <li class="l1">活动状态：</li>
 <li class="l2">
 <select name="tbmzt" onchange="bmztonc()" class="inp">
 <option value="0">正在报名</option>
 <option value="1"<? if(1==$row[bmzt]){?> selected="selected"<? }?>>停止报名正在组团</option>
 <option value="2"<? if(2==$row[bmzt]){?> selected="selected"<? }?>>正在看房</option>
 <option value="3"<? if(3==$row[bmzt]){?> selected="selected"<? }?>>看房圆满结束</option>
 </select>
 </li>
 <li class="l10">优惠详情：</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 
 <ul class="uk" id="hg">
 <li class="l10">现场精彩回顾：</li>
 <li class="l11"><script id="editor1" name="content1" type="text/plain" style="width:858px;height:330px;"><?=$row[hg]?></script></li>
</ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">发布会员：</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
 </li>
 <li class="l1">推荐序号：</li>
 <li class="l2">
 <input type="text" value="<?=returnjgdw($row[iftj],"",0)?>" class="inp" size="5" name="tiftj" />
 <span class="fd">0表示不推荐，反之按从小到大推荐</span>
 </li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>正常展示</strong></label>
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>正在审核</strong></label>
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /> <strong>审核不通过</strong></label>
 </li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
//实例化编辑器
var ue = UE.getEditor('editor');
var ue1 = UE.getEditor('editor1');
bmztonc();
</script>
</body>
</html>