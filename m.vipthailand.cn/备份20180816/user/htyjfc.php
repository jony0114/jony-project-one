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
  area: ['322px', '410px'],
  shadeClose: true,
  title:["佣金分成管理","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['htyjfclx.php?bh=<?=$bh?>', 'no'] 
});
}
function upd1(x){
layer.open({
  type: 2,
  area: ['322px', '410px'],
  shadeClose: true,
  title:["佣金分成管理","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['htyjfctxt.php?bh=<?=$bh?>&mybh='+x, 'no'] 
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
fcwcheckDEL(28,'fcw_htyjfc');
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 合同佣金分成</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <? include("rcap15.php");?>
 <? include("htmenu.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 document.getElementById("rmenu3").className="a1";
 </script>

 <?
 $shou=0;
 $zhi=0;
 while1("*","fcw_htcaiwu where htbh='".$bh."' and zt=0 order by sj desc");while($row1=mysql_fetch_array($res1)){
 $shou=$shou+$row1[money1ok];
 $zhi=$zhi+$row1[money2ok];
 }
 ?>

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="fcwcheckDEL(28,'fcw_htyjfc')" class="a1">删除</a>
 <a href="javascript:;" onclick="add1()" class="a2">添加佣金分成</a>
 </li>
 <li class="l3"><span class="s1">本合同总佣金：<strong class="red"><?=$shou-$zhi?></strong>元</span></li>
 </ul>

 <ul class="htyjfccap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">日期</li>
 <li class="l3">部门</li>
 <li class="l4">员工</li>
 <li class="l5">分成比例</li>
 <li class="l6">应收业绩</li>
 <li class="l7">实收业绩</li>
 <li class="l8">分成说明</li>
 <li class="l9">管理</li>
 </ul>
 <? 
 while1("*","fcw_htyjfc where htbh='".$bh."' and zt=0 order by sj desc");while($row1=mysql_fetch_array($res1)){
 ?>
 <ul class="htyjfclist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row1[id]?>" value="<?=$row1[id]?>" /></li>
 <li class="l2"><?=dateYMD($row1[sj])?></li>
 <li class="l3"><?=$row1[yggs]?></li>
 <li class="l4"><?=$row1[yg]?></li>
 <li class="l5"><?=$row1[fcbl]?>%</li>
 <li class="l6"><?=$row1[money1]?></li>
 <li class="l7"><?=$row1[money1ok]?></li>
 <li class="l8"><?=returntitdian($row1[txt],16)?></li>
 <li class="l9" onmouseover="glover(<?=$row1[id]?>)" onmouseout="glout(<?=$row1[id]?>)">
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