<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("权限受限！","./");}
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
if($rowcontrol[fklook]=="on"){$zt=0;}else{$zt=1;}

//函数开始
if($_GET[control]=="update" && $_POST[jvs]=="loupan"){
 zwzr();
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 updatetable("fcw_xq","
			 txt='".sqlzhuru($_POST[content])."',
			 zb='".sqlzhuru($_POST[content1])."',
			 jtzk='".sqlzhuru($_POST[content2])."',
			 wkey='".sqlzhuru($_POST[twkey])."',
			 wdes='".sqlzhuru($_POST[twdes])."',
			 zt=".$zt."
			 where uid='".$_SESSION[FCWuser]."' and bh='".$bh."'
			 ");
 php_toheader("loupantxt.php?t=suc&bh=".$bh);

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

<script type="text/javascript" charset="utf-8" src="../ckeditor/kindeditor.js"></script>
<script type="text/javascript">
KE.show({
id : 'content',
resizeMode : 1,
cssPath : '../ckeditor/examples/index.css',
items : [
'source','fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
'removeformat', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
'insertunorderedlist']
});

KE.show({
id : 'content1',
resizeMode : 1,
cssPath : '../ckeditor/examples/index.css',
items : [
'source','fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
'removeformat', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
'insertunorderedlist']
});

KE.show({
id : 'content2',
resizeMode : 1,
cssPath : '../ckeditor/examples/index.css',
items : [
'source','fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
'removeformat', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
'insertunorderedlist']
});

function tj(){
tjwait();
f1.action="loupantxt.php?bh=<?=$bh?>&control=update";
}
</script>
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
 document.getElementById("rcap2").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功!","loupantxt.php?bh=".$bh)?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l7">楼盘详细介绍：</li>
 <li class="l8"><textarea id="content" name="content" style="width:100%;height:435px;visibility:hidden;"><?=$row[txt]?></textarea></li>
 </ul>
 <ul class="uk">
 <li class="l7">楼盘周边配套：</li>
 <li class="l8"><textarea id="content1" name="content1" style="width:100%;height:435px;visibility:hidden;"><?=$row[zb]?></textarea></li>
 </ul>
 <ul class="uk">
 <li class="l7">交通出行：</li>
 <li class="l8"><textarea id="content2" name="content2" style="width:100%;height:435px;visibility:hidden;"><?=$row[jtzk]?></textarea></li>
 </ul>
 <ul class="uk">
 <li class="l1">SEO关键词：</li>
 <li class="l2"><input type="text" value="<?=$row[wkey]?>" class="inp" size="70" name="twkey" /></li>
 <li class="l9">SEO描述：</li>
 <li class="l10"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步","chushoulist.php")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>