<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sj=date("Y-m-d H:i:s");
$userid=returnuserid($_SESSION[FCWuser]);
$ses=" where (userid=".$userid." or zjuserid=".$userid.") and zt=0";
if($_GET[st1]!=""){$ses=$ses." and (yzxm like '%".$_GET[st1]."%' or khxm like '%".$_GET[st1]."%')";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
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
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="hetonglist.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 合同管理</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="fcwcheckDEL(25,'yjcode_hetong')" class="a1">删除</a>
 <a href="hetonglx.php" class="a2">添加合同</a>
 </li>
 <li class="l3">
  <input type="button" onclick="ser()" value="查询" class="btn" />
  <input type="text" id="st1" value="<?=$_GET[st1]?>" class="inp1" />
  <span class="s1">合同信息：</span>
 </li>
 </ul>

 <ul class="hetongcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">合同编号</li>
 <li class="l3">交易</li>
 <li class="l4">签约日</li>
 <li class="l5">金额</li>
 <li class="l6">位置</li>
 <li class="l7">业主姓名</li>
 <li class="l8">业主手机</li>
 <li class="l9">客户姓名</li>
 <li class="l10">客户手机</li>
 </ul>

 <?
 pagef($ses,30,"fcw_hetong","order by id desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="hetonglist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2"><a href="hetong.php?bh=<?=$row[bh]?>"><?=$row[htbh]?></a></li>
 <li class="l3"><?=$row[jy]?></li>
 <li class="l4"><?=substr(dateYMD($row[qyr]),2)?></li>
 <li class="l5"><?=$row[money1]?></li>
 <li class="l6"><?=returntitdian($row[fadd],30)?></li>
 <li class="l7"><?=$row[yzxm]?></li>
 <li class="l8"><?=$row[yzmot]?></li>
 <li class="l9"><?=$row[khxm]?></li>
 <li class="l10"><?=$row[khmot]?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="hetonglist.php";
 $nowwd="st1=".$_GET[st1];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>