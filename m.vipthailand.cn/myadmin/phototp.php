<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","fcw_jia_photo where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("./");}

if($_GET[control]=="update"){
 updatetable("fcw_tp","xh=".$_GET[xh]." where id=".$_GET[id]);
 php_toheader("phototp.php?t=suc&bh=".$bh);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理后台</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript">
function xhonc(x){
location.href="phototp.php?id="+x+"&bh=<?=$bh?>&control=update&xh="+document.getElementById("xh"+x).value;
}
</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu6").className="l61";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_jia.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz"><li class="l1">当前位置：<a href="./" class="a2">后台首页</a> - <strong>装修效果图片管理</strong></li><li class="l2"></li></ul>
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功","phototp.php?bh=".$bh);}?>
 <!--B-->
 <div class="listkuan">
 <ul class="fangtpcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;图片</li>
 <li class="l3">排序</li>
 <li class="l4">最后更新</li>
 <li class="l5">操作</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(70,'fcw_tp')" class="a2">删除</a>
 </li>
 </ul>
 <? while1("*","fcw_tp where bh='".$bh."' order by xh asc");while($row1=mysql_fetch_array($res1)){$tp="../".str_replace(".","-1.",$row1[tp]);?>
 <ul class="fangtplist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row1[id]?>" /></li>
 <li class="l2"><a href="../<?=$row1[tp]?>" target="_blank"><img border="0" class="imgtp" src="<?=$tp?>" width="52" height="52" align="left" /></a></li>
 <li class="l3"><input type="text" value="<?=$row1[xh]?>" id="xh<?=$row1[id]?>" style="width:30px;margin:0 0 8px 0;text-align:center;" /><br><a href="javascript:void(0);" class="blue" onclick="xhonc(<?=$row1[id]?>)">【保存】</a></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5"><a href="../<?=$row1[tp]?>" target="_blank">查看图片</a></li>
 </ul>
 <? }?>
 </div>
 <!--E-->
 
</div>

<?php include("bottom.html");?>
</body>
</html>