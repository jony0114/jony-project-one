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
checkDEL(11,'fcw_wylx')
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
 <? $leftid=2;include("menu_quan.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="wylxlist.php">物业类型</a>
 </div>

 <div class="rights">
 &nbsp;<strong>提示：</strong><br>
 &nbsp;1、原始名称前带<span class="red">[*]</span>的为系统自带物业类型，不可删除，只可改名、禁用<br>
 &nbsp;2、新增的物业类型，在用户录入资料时，只保留一些通用的属性(如价格、面积等)
 </div>

 <!--begin-->
 <ul class="ksedi">
 <li class="l2">
 <a href="wylx.php" class="a1">新增类型</a>
 <a href="javascript:void(0)" onclick="checkDEL(11,'fcw_wylx')" class="a2">删除</a>
 </li>
 </ul>
 <ul class="wylxlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">类型原始名称</li>
 <li class="l3">展示名称</li>
 <li class="l4">序号</li>
 <li class="l5">是否启用</li>
 <li class="l6">操作</li>
 </ul>
 <?
 while1("*","fcw_wylx order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="wylx.php?action=update&id=".$row1[id];
 if($row1[ifuse]=="on"){$qy="<span class='blue'>启用</span>";}
 elseif($row1[ifuse]=="off"){$qy="<span class='red'>已禁用</span>";}
 $ifs="";if(1==$row1[ifsys]){$ifs="<span class='red'>*</span> ";}
 ?>
 <ul class="wylxlist">
 <li class="l1"><? if(0==$row1[ifsys]){?><input name="C1" type="checkbox" value="<?=$row1[id]?>" /><? }?></li>
 <li class="l2" onclick="gourl('<?=$nu?>')"><?=$ifs.$row1[name1]?></li>
 <li class="l3" onclick="gourl('<?=$nu?>')"><?=$row1[name2]?></li>
 <li class="l4"><?=$row1[xh]?></li>
 <li class="l5"><?=$qy?></li>
 <li class="l6"><a href="<?=$nu?>">编辑</a></li>
 </ul>
 <? }?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>