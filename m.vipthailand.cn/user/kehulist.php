<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sj=date("Y-m-d H:i:s");
$userid=returnuserid($_SESSION[FCWuser]);
$ses=" where (userid=".$userid." or zjuserid=".$userid.") and zt=0";
if($_GET[st1]!=""){$ses=$ses." and (kh like '%".$_GET[st1]."%' or mot='".$_GET[st1]."' or bh='".$_GET[st1]."')";}
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
location.href="kehulist.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 我的客户信息</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:;" onclick="fcwcheckDEL(24,'yjcode_kehu')" class="a1">删除</a>
 <a href="kehulx.php" class="a2">添加客户</a>
 </li>
 <li class="l3">
  <input type="button" onclick="ser()" value="查询" class="btn" />
  <input type="text" id="st1" value="<?=$_GET[st1]?>" class="inp1" />
  <span class="s1">客户信息：</span>
 </li>
 </ul>

 <ul class="kehulistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">客源编号</li>
 <li class="l3">交易</li>
 <li class="l4">委托日</li>
 <li class="l5">客户</li>
 <li class="l6">位置</li>
 <li class="l7">楼层</li>
 <li class="l8">房型</li>
 <li class="l9">面积</li>
 <li class="l10">价格</li>
 <li class="l11">用途</li>
 <li class="l12">员工</li>
 <li class="l13">公私</li>
 <li class="l14">最后跟进</li>
 </ul>

 <?
 pagef($ses,30,"fcw_kehu","order by id desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="kehulist">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2"><a href="kehu.php?bh=<?=$row[bh]?>"><?=$row[bh]?></a></li>
 <li class="l3"><?=$row[jy]?></li>
 <li class="l4"><?=substr(dateYMD($row[wtsj]),2)?></li>
 <li class="l5"><?=$row[kh]?></li>
 <li class="l6"><?=returntitdian($row[fadd],30)?></li>
 <li class="l7"><?=$row[lc]?></li>
 <li class="l8"><font title="<?=$row[hx1]?>房<?=$row[hx2]?>厅<?=$row[hx3]?>卫<?=$row[hx4]?>阳台"><?=$row[hx1]?>/<?=$row[hx2]?>/<?=$row[hx3]?>/<?=$row[hx4]?></font></li>
 <li class="l9"><?=$row[mj1]."-".$row[mj2]?></li>
 <li class="l10"><?=$row[money1]."-".$row[money2]?></li>
 <li class="l11"><?=returnwylx(4,$row[yt])?></li>
 <li class="l12"><?=returnuname(returnuser($row[userid]))?></li>
 <li class="l13"><? if($row[admin]==1){echo "<span class='green'>私客</span>";}else{echo "<span class='feng'>公客</span>";}?></li>
 <li class="l14"><? while1("*","fcw_kehugj where khbh='".$row[bh]."' and zt=0 order by sj desc");if($row1=mysql_fetch_array($res1)){echo dateYMD($row1[sj]);}?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="kclist.php";
 $nowwd="&st1=".$_GET[st1];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>