<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];

while0("*","fcw_loupanfxkh where bh='".$bh."' and (uid1='".$_SESSION[FCWuser]."' or uid2='".$_SESSION[FCWuser]."' or uid3='".$_SESSION[FCWuser]."')");if(!$row=mysql_fetch_array($res)){Audit_alert("无权限进行此操作！","loupanfxkhlist.php");}
if($row[uid1]==$_SESSION[FCWuser]){$khsf=1;} //1表示录入者
if($row[uid2]==$_SESSION[FCWuser]){$khsf=2;} //2表示跟单经纪人
if($row[uid3]==$_SESSION[FCWuser]){$khsf=3;} //3表示跟单经理
while1("*","fcw_xq where bh='".$row[xqbh]."'");$row1=mysql_fetch_array($res1);

if($_GET[control]=="update" && $khsf==3 && $row[jd]==2){
 if(0==$row[ifmoney]){
  if(1==$row1[fxty]){
   $yj1=$row[money1]*$row1[fxmoney3];
   $yj2=$row[money1]*$row1[fxmoney2];
   $yj3=$row[money1]*$row1[fxmoney1];
  }else{
   $yj1=$row1[fxmoney3];
   $yj2=$row1[fxmoney2];
   $yj3=$row1[fxmoney1];
  }
 PointIntoM($row[uid1],"楼盘分销成单,获得录入人佣金",$yj1);PointUpdateM($row[uid1],$yj1); 
 PointIntoM($row[uid2],"楼盘分销成单,获得跟单经理人佣金",$yj2);PointUpdateM($row[uid2],$yj2); 
 PointIntoM($row[uid3],"楼盘分销成单,获得项目经理佣金",$yj3);PointUpdateM($row[uid3],$yj3); 
 updatetable("fcw_loupanfxkh","yj1=".$yj1.",yj2=".$yj2.",yj3=".$yj3.",ifmoney=1 where bh='".$bh."' and uid3='".$_SESSION[FCWuser]."'");
 }
php_toheader("loupanfxkhyj.php?t=suc&bh=".$bh); 
}
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
<script language="javascript">
function yjtj(){
 if(confirm("确定要发放佣金吗？一经发放，不可修改")){location.href="loupanfxkhyj.php?bh=<?=$bh?>&control=update";}else{return false;}
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > <a href="loupanfxkhlist.php">楼盘分销客户管理</a> > 佣金发送</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap12.php");?>
 <script language="javascript">
 $("rcap3").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功!","loupanfxkhyj.php?bh=".$bh)?>
 
 <div class="lpfxyj">
  <ul class="u1">
  <li class="l1"><?=$row1[xq]?></li>
  <li class="l2"><a href="../loupan/view<?=$row1[id]?>.html" target="_blank"><img width="170" height="113" src="../upload/<?=returnuserid($row1[uid])?>/f/<?=$row1[bh]?>/home.jpg" /></a></li><li class="l3">所在区域：<?=returnarea(1,$row1[areaid]).returnarea(2,$row1[areaids])?></li>
  <li class="l4">楼盘均价：<?=returnjgdw($row1[money1],"元/平米","暂未公布")?></li>
  </ul>
  <ul class="u2">
  <li class="l1">
  恭喜您，成单了，成单金额为：<?=$row[money1]?>元 ^_^<br>
  根据该项目的佣金规则，发放的佣金情况如下：
  </li>
  
  <? if(0==$row[ifmoney]){?>
  <li class="l1">
  <strong> 
  1、录入人(<?=returnuname($row[uid1])?>)佣金：<? if(1==$row1[fxty]){echo $row[money1]*$row1[fxmoney3];}else{echo $row1[fxmoney3];}?>元<br>
  2、跟单经纪人(<?=returnuname($row[uid2])?>)佣金：<? if(1==$row1[fxty]){echo $row[money1]*$row1[fxmoney2];}else{echo $row1[fxmoney2];}?>元<br>
  3、项目经理(<?=returnuname($row[uid3])?>)佣金：<? if(1==$row1[fxty]){echo $row[money1]*$row1[fxmoney1];}else{echo $row1[fxmoney1];}?>元<br>
  </strong>
  </li>
  <? if($khsf==3){?><li class="l2"><a href="javascript:void(0);" onclick="yjtj()" class="ffbtn">核对无误,发放</a></li><? }?>
  
  <? }else{?>
  <li class="l1">
  <strong> 
  1、录入人(<?=returnuname($row[uid1])?>)佣金：<?=$row[yj1]?>元<br>
  2、跟单经纪人(<?=returnuname($row[uid2])?>)佣金：<?=$row[yj2]?>元<br>
  3、项目经理(<?=returnuname($row[uid3])?>)佣金：<?=$row[yj3]?>元<br>
  </strong>
  </li>
  <? }?>
  
  </ul>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>