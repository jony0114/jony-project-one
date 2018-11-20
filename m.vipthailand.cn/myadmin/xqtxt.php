<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];

//函数开始
if($_GET[control]=="update" && $_POST[jvs]=="xq"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0501,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 updatetable("fcw_xq","
			 txt='".sqlzhuru($_POST[content])."',
			 zb='".sqlzhuru($_POST[content1])."',
			 jtzk='".sqlzhuru($_POST[content2])."',
			 wkey='".sqlzhuru($_POST[twkey])."',
			 wdes='".sqlzhuru($_POST[twdes])."'
			 where bh='".$bh."'
			 ");
 php_toheader("xqtxt.php?t=suc&bh=".$bh);

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
layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
f1.action="xqtxt.php?bh=<?=$bh?>&control=update";
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0502,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_loupan.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","xqtxt.php?bh=".$bh);}?>

 <? include("rightcap3.php");?>
 <script language="javascript">document.getElementById("rtit2").className="a1";</script>
 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="xq" name="jvs" />
 <ul class="uk">
 <li class="l10">小区详细介绍：</li>
 <li class="l11"><textarea id="content" name="content" style="width:100%;height:455px;visibility:hidden;"><?=$row[txt]?></textarea></li>
 </ul>
 <ul class="uk">
 <li class="l10">小区周边配套：</li>
 <li class="l11"><textarea id="content1" name="content1" style="width:100%;height:455px;visibility:hidden;"><?=$row[zb]?></textarea></li>
 </ul>
 <ul class="uk">
 <li class="l10">交通出行：</li>
 <li class="l11"><textarea id="content2" name="content2" style="width:100%;height:455px;visibility:hidden;"><?=$row[jtzk]?></textarea></li>
 </ul>
 <ul class="uk">
 <li class="l1">SEO关键词：</li>
 <li class="l2"><input type="text" value="<?=$row[wkey]?>" class="inp" style="width:692px;" name="twkey" onfocus="inpf(this)" onblur="inpb(this)" /></li>
 <li class="l4">SEO描述：</li>
 <li class="l5"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>