<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
while0("*","fcw_fang where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$bh."'");
if(!$row=mysql_fetch_array($res)){php_toheader("./");}
if($row[type1]=="出售"){$tyurl="chushou";}
elseif($row[type1]=="出租"){$tyurl="chuzu";}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/fang.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function add1(){
layer.open({
  type: 2,
  area: ['622px', '270px'],
  shadeClose: true,
  title:["房源跟进记录","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['fanggjlx.php?bh=<?=$bh?>', 'no'] 
});
}
function upd1(x){
layer.open({
  type: 2,
  area: ['622px', '270px'],
  shadeClose: true,
  title:["房源跟进记录","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['fanggjtxt.php?bh=<?=$bh?>&mybh='+x, 'no'] 
});
}
function glover(x){
 document.getElementById("gl"+x).style.display="";
}
function glout(x){
 document.getElementById("gl"+x).style.display="none";
}
function del(x){
document.getElementById("chk"+x).checked=true;
fcwcheckDEL(29,'fcw_fanggj');
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 房源跟进记录</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <div class="rmenucap">
 <a href="<?=$tyurl?>.php?bh=<?=$bh?>">房源信息</a>
 <a href="fanggj.php?bh=<?=$bh?>" class="a1">跟进记录</a>
 </div>

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="fcwcheckDEL(29,'fcw_fanggj')" class="a1">删除</a>
 <a href="javascript:;" onclick="add1()" class="a2">添加跟进信息</a>
 </li>
 </ul>

 <ul class="fanggjcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">跟进信息</li>
 <li class="l3">员工</li>
 <li class="l4">时间</li>
 <li class="l5">操作</li>
 </ul>
 <? while1("*","fcw_fanggj where fangbh='".$bh."' and zt=0 order by sj desc");while($row1=mysql_fetch_array($res1)){?>
 <ul class="fanggjlist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row1[id]?>" value="<?=$row1[id]?>" /></li>
 <li class="l2" onclick="upd1('<?=$row1[mybh]?>')"><?=$row1[txt]?></li>
 <li class="l3"><?=returnuname(returnuser($row1[fbuserid]))?></li>
 <li class="l4"><?=dateYMD($row1[sj])?></li>
 <li class="l5" onmouseover="glover(<?=$row1[id]?>)" onmouseout="glout(<?=$row1[id]?>)">
  <span class="s1">管理</span>
  <div class="gl" style="display:none;" id="gl<?=$row1[id]?>">
  <a href="javascript:void(0);" onclick="upd1('<?=$row1[mybh]?>')">修改信息</a>
  <a href="javascript:void(0);" onclick="del(<?=$row1[id]?>)">删除信息</a>
  </div>
 </li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>