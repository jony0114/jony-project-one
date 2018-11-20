<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","fcw_weituozhao where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("weituozhaolist.php");}

if($_GET[control]=="nex"){
 while1("*","fcw_weituozhao where sj<'".$row[sj]."' and zt=0 order by sj desc");if(!$row1=mysql_fetch_array($res1)){Audit_alert("已经是最后一篇","weituozhaolist.php");}
 php_toheader("weituozhao.php?id=".$row1[id]);
}
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
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu4").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=6;include("menu_fang.php");?>

<div class="right">

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">委托找房</a>
 <a href="weituozhaolist.php">返回列表</a>
 </div> 

 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" action="weituozhao.php?id=<?=$id?>&control=nex">
 <ul class="uk">
 <li class="l1">手机号码：</li>
 <li class="l2"><input class="inp" value="<?=$row[mot]?>" size="20" type="text"/></li>
 <li class="l1">联 系 人：</li>
 <li class="l2"><input class="inp" value="<?=$row[lxr]?>" size="20" type="text"/></li>
 <li class="l1">委托类型：</li>
 <li class="l2"><input class="inp" value="<?=$row[type1]?>" size="20" type="text"/></li>
 <li class="l1">发布时间：</li>
 <li class="l2"><input class="inp" value="<?=$row[sj]?>" size="20" type="text"/></li>
 <li class="l1">希望区域：</li>
 <li class="l2"><input class="inp" value="<?=returnarea(1,$row[areaid])?>" size="20" type="text"/></li>
 <li class="l1">运营行业：</li>
 <li class="l2"><input class="inp" value="<?=returnsplx($row[hylx])?>" size="20" type="text"/></li>
 <li class="l10">委托需求：</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 <li class="l3"><input type="submit" value="查看下一条" class="btn1" /></li>
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
</script>

</body>
</html>