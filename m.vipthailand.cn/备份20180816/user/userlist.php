<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if(4!=$_SESSION[FCWuserID]){Audit_alert("错误的路径来源！","./");}
$ses=" where zjuid='".$_SESSION[FCWuser]."'";
if($_GET[st1]!=""){$ses=$ses." and (uname like '%".$_GET[st1]."%' or nc like '%".$_GET[st1]."%' or mot like '%".$_GET[st1]."%')";}
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
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="userlist.php?st1="+document.getElementById("st1").value;	
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 中介团队成员</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",7,");?>
 <!--selB-->
 <ul class="psel">
 <li class="l1">成员搜索：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <!---selE-->

 <ul class="wz">
 <li class="l0"></li>
 <li class="l1 l2"><a href="userlist.php">成员列表</a></li>
 </ul>
 <div class="rts red">重要提示：删除成员，会同步删除其名下所有信息，且不可恢复，请慎重</div>
 <ul class="typecap">
 <li class="l1">成员信息</li>
 <li class="l4">房源</li>
 <li class="l6">登记时间</li>
 <li class="l5">操作</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> 全选</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(15,'fcw_user')" class="a2">删除</a>
 <a href="user.php" class="a1">添加成员</a>
 </li>
 </ul>
 <?
 $sj=date("Y-m-d H:i:s");
 $sj1=dateYMD($sj)." 00:00:00";
 $sj2=dateYMD($sj)." 23:59:59";
 pagef($ses,20,"fcw_user","order by sj desc");
 while($row=mysql_fetch_array($res)){
 $aurl="user.php?action=update&id=".$row[id];
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l1">
 <a  href="<?=$aurl?>" class="a1"><strong><?=$row[uid]?></strong></a><br>
 <?=$row[nc]?>（<?=$row[mot]?>） 今日预约刷新(<span class="feng"><?=returncount("fcw_cflist where userid=".$row[id]." and sj>='".$sj1."' and sj<='".$sj2."'")?></span>) 今日发布(<span class="green"><?=returncount("fcw_fang where uid='".$row[uid]."' and fbsj>='".$sj1."' and fbsj<='".$sj2."' and (zt=0 or zt=1)")?></span>) 总预约刷新(<span class="feng"><?=returncount("fcw_cflist where userid=".$row[id]."")?></span>) 总发布(<span class="green"><?=returncount("fcw_fang where uid='".$row[uid]."' and (zt=0 or zt=1)")?></span>)
 </li>
 <li class="l4">
 售：<?=returncount("fcw_fang where uid='".$row[uid]."' and zt=0 and type1='出售'")?><br>
 租：<?=returncount("fcw_fang where uid='".$row[uid]."' and zt=0 and type1='出租'")?>
 </li>
 <li class="l6"><?=$row[sj]?></li>
 <li class="l5"><a href="<?=$aurl?>">修改</a> | <a href="user_ses.php?id=<?=$row[id]?>">后台</a></li>
 </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="userlist.php";
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