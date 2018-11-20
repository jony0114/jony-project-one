<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sj=date("Y-m-d H:i:s");
$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$userdj=returnuserdj($rowuser[id]);
$userid=returnuserid($_SESSION[FCWuser]);
if(empty($userdj)){Audit_alert("本站未启用会员等级系统，请联系客服！","./");}

if($_GET[control]=="xf"){ //续费
 while1("*","fcw_userdj where id=".$userdj);if($row1=mysql_fetch_array($res1)){
 if($rowuser[money1]<$row1[money1]){Audit_alert("余额不足，请先充值！","userdj.php");}
 $money1=$row1["money1"]*(-1);
 PointIntoM($_SESSION[FCWuser],$row1[name1]."年费支出(续费)",$money1);
 PointUpdateM($_SESSION[FCWuser],$money1); 
 if(empty($rowuser[userdjdq])){$dq=$sj;}else{
  $sjv=$rowuser[userdjdq];
  if($rowuser[userdjdq]<$sj){$sjv=$sj;}
  $dq=date('Y-m-d H:i:s',strtotime ("+1 year",strtotime($sjv)));
 }
 deletetable("fcw_userdjsx where userid=".$userid);
 updatetable("fcw_user","userdjdq='".$dq."' where id=".$rowuser[id]);
 }
 php_toheader("userdj.php?t=suc");
 
}elseif($_GET[control]=="ts"){ //提升等级
 while2("*","fcw_userdj where id=".$userdj);$row2=mysql_fetch_array($res2);
 if(empty($rowuser[userdjdq]) || $rowuser[userdjdq]<$sj){$dq=date('Y-m-d H:i:s',strtotime ("+1 year",strtotime($sj)));}else{$dq=$rowuser[userdjdq];}
 while1("*","fcw_userdj where id<>".$userdj." and id=".$_GET[id]);if($row1=mysql_fetch_array($res1)){
 $djcj=$row1[money1]-$row2[money1];$sjc=DateDiff($dq,$sj,"d");$cj=intval($sjc/365*$djcj);
 if($rowuser[money1]<$cj){Audit_alert("余额不足，请先充值！","userdj.php");}
 $money1=$cj*(-1);
 PointIntoM($_SESSION[FCWuser],"会员等级提升",$money1);
 PointUpdateM($_SESSION[FCWuser],$money1); 
 updatetable("fcw_user","userdj=".$_GET[id].",userdjdq='".$dq."' where id=".$rowuser[id]);
 deletetable("fcw_userdjsx where userid=".$userid);
 }
 php_toheader("userdj.php?t=suc");

}

$djlock=1;
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
function tj(x,y){
 if(confirm("确定提交吗？")){}else{return false;}
 location.href="userdj.php?id="+y+"&control="+x;
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 会员等级</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <ul class="wz">
 <li class="l1 l2"><a href="userdj.php">会员等级</a></li>
 </ul>
 
 <? systs("恭喜您，操作成功!","userdj.php")?>
 <ul class="uk">
 <li class="l1">您的等级：</li>
 <li class="l21"><strong class="green"><? $nowdj=returnuserdj($luserid);echo returndjname($nowdj)?></strong> (到期：<?=returnjgdw($rowuser[userdjdq],"","永久不到期")?>)</li>
 <li class="l1">您的余额：</li>
 <li class="l21"><?=$rowuser[money1]?>元  [<a href="pay.php" class="red"><strong>充值</strong></a>]</li>
 </ul>

 <ul class="djcap">
 <li class="l1">会员等级</li>
 <li class="l2">尊享服务</li>
 <li class="l3">年费 </li>
 <li class="l4">操作</li>
 </ul>
 <? 
 while2("*","fcw_userdj where id=".$userdj);$row2=mysql_fetch_array($res2);
 if(empty($rowuser[userdjdq]) || $rowuser[userdjdq]<$sj){$dq=date('Y-m-d H:i:s',strtotime ("+1 year",strtotime($sj)));}else{$dq=$rowuser[userdjdq];}
 while1("*","fcw_userdj order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <ul class="djlist">
 <li class="l1"><?=$row1[name1]?></li>
 <li class="l2">每日赠送房源刷新量<strong><?=$row1[fysx]?></strong>次，每日赠送房源发布量<strong><?=$row1[fyfb]?></strong>条</li>
 <li class="l3"><?=$row1[money1]?>元/年 </li>
 <li class="l4">
 <? if($nowdj<$row1[id]){?>
 <a href="javascript:void(0);" onclick="tj('ts',<?=$row1[id]?>)" class="a0">提升等级</a>
 <span class="s1">
 补差价:<? $djcj=$row1[money1]-$row2[money1];$sjc=DateDiff($dq,$sj,"d");$cj=intval($sjc/365*$djcj);echo $cj;?>元
 </span>
 <? }elseif($nowdj==$row1[id]){?>
 <a href="javascript:void(0);" onclick="tj('xf',<?=$row1[id]?>)" class="a1">续费</a>
 <? }?>
 </li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>