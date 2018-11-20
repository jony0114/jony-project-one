<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理后台</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/quanju.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function del(x){
document.getElementById("chk"+x).checked=true;
checkDEL(61,'fcw_fz')
}

</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=5;include("menu_quan.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="wyptlist.php">分站</a>
 </div>

 <div class="rights">
 <strong>提示：</strong><br>
 <span class="red">友价房产系统的每个分站搭建后是独立的一套程序(每个分站都是独立安装的)，数据间互不关联，做到完全的独立管理，便于加盟商的合作。用二级域名可以无限制安装，而且同步升级的。<br>【<a href="http://www.yj99.cn/faq/view10.html" target="_blank">了解更多分站介绍</a>】</span>
 </div>

 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="fz.php" class="a1">新增分站</a>
 <a href="javascript:void(0)" onclick="checkDEL(61,'fcw_fz')" class="a2">删除</a>
 </li>
 </ul>
 <ul class="qjlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">物业分站列表</li>
 <li class="l3">序号</li>
 <li class="l4">编辑时间</li>
 <li class="l5">操作</li>
 </ul>
 <?
 while1("*","fcw_fz order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="fz.php?action=update&id=".$row1[id];
 ?>
 <ul class="qjlist2">
 <li class="l1"><input name="C1" id="chk<?=$row1[id]?>" type="checkbox" value="<?=$row1[id]?>" /></li>
 <li class="l2"><a href="<?=$nu?>"><?=$row1[name1]?></a></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[sj]?></li>
 <li class="l5">
 <a href="javascript:void(0);" onclick="del(<?=$row1[id]?>)">删除</a><span></span>
 <a class="edi" href="<?=$nu?>">修改信息</a>
 </li>
 </ul>
 <? }?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>