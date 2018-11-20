<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
while0("*","fcw_hetong where (userid=".$userid." or zjuserid=".$userid.") and bh='".$bh."'");
if(!$row=mysql_fetch_array($res)){php_toheader("hetonglist.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/oa.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function add1(){
layer.open({
  type: 2,
  area: ['322px', '450px'],
  shadeClose: true,
  title:["财务收付管理","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['htcaiwulx.php?bh=<?=$bh?>', 'no'] 
});
}
function upd1(x){
layer.open({
  type: 2,
  area: ['322px', '450px'],
  shadeClose: true,
  title:["财务收付管理","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['htcaiwutxt.php?bh=<?=$bh?>&mybh='+x, 'no'] 
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
fcwcheckDEL(26,'fcw_kehugj');
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 财务收付</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <? include("rcap15.php");?>
 <? include("htmenu.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 document.getElementById("rmenu2").className="a1";
 </script>

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="fcwcheckDEL(27,'fcw_htcaiwu')" class="a1">删除</a>
 <a href="javascript:;" onclick="add1()" class="a2">添加财务收付</a>
 </li>
 </ul>

 <ul class="htcaiwucap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">日期</li>
 <li class="l3">款类</li>
 <li class="l4">收方</li>
 <li class="l5">应收</li>
 <li class="l6">实收</li>
 <li class="l7">付方</li>
 <li class="l8">应付</li>
 <li class="l9">实付</li>
 <li class="l10">摘要</li>
 <li class="l11">管理</li>
 </ul>
 <? 
 $shou=0;
 $zhi=0;
 while1("*","fcw_htcaiwu where htbh='".$bh."' and zt=0 order by sj desc");while($row1=mysql_fetch_array($res1)){
 $shou=$shou+$row1[money1ok];
 $zhi=$zhi+$row1[money2ok];
 ?>
 <ul class="htcaiwulist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row1[id]?>" value="<?=$row1[id]?>" /></li>
 <li class="l2"><?=dateYMD($row1[sj])?></li>
 <li class="l3"><?=$row1[type1]?></li>
 <li class="l4"><?=returnjgdw($row1[sf],"","-")?></li>
 <li class="l5"><?=returnjgdw($row1[money1],"","-")?></li>
 <li class="l6"><?=returnjgdw($row1[money1ok],"","-")?></li>
 <li class="l7"><?=returnjgdw($row1[ff],"","-")?></li>
 <li class="l8"><?=returnjgdw($row1[money2],"","-")?></li>
 <li class="l9"><?=returnjgdw($row1[money2ok],"","-")?></li>
 <li class="l10"><?=returntitdian($row1[txt],16)?></li>
 <li class="l11" onmouseover="glover(<?=$row1[id]?>)" onmouseout="glout(<?=$row1[id]?>)">
  <span class="s1">管理</span>
  <div class="gl" style="display:none;" id="gl<?=$row1[id]?>">
  <a href="javascript:void(0);" onclick="upd1('<?=$row1[mybh]?>')">修改信息</a>
  <a href="javascript:void(0);" onclick="del(<?=$row1[id]?>)">删除信息</a>
  </div>
 </li>
 </ul>
 <? }?>
 <ul class="uk uk0">
 <li class="l1">财务收付统计：</li>
 <li class="l21">
 总实收 【<span class="green"><?=$shou?></span>元】，
 总实付 【<span class="red"><?=$zhi?></span>元】，
 总结余 【<span class="blue"><?=$shou-$zhi?></span>元】
 </li>
 </ul>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>