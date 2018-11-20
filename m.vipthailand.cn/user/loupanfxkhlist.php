<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$ses=" where (uid1='".$_SESSION[FCWuser]."' or uid2='".$_SESSION[FCWuser]."' or uid3='".$_SESSION[FCWuser]."') and zt<>99";
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
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 楼盘分销客户管理</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap12.php");?>
 <script language="javascript">
 $("rcap1").className="l1 l2";
 </script>
 <div class="rts red">重要提示：已经成单的客户信息无法删除，如要删除，请联系跟单经纪人或项目经理，将该客户的进度设为非成单状态</div>
 <ul class="typecap">
 <li class="l1">标题</li>
 <li class="l4">楼盘</li>
 <li class="l6">录入时间</li>
 <li class="l5">佣金发放</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> 全选</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(18,'fcw_loupanfxkh')" class="a2">删除</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"fcw_loupanfxkh","order by sj desc");
 while($row=mysql_fetch_array($res)){
 $aurl="loupanfxkh.php?mybh=".$row[bh]."&xqbh=".$row[xqbh];
 if($row[uid1]==$_SESSION[FCWuser]){$khsf=1;} //1表示录入者
 if($row[uid2]==$_SESSION[FCWuser]){$khsf=2;} //2表示跟单经纪人
 if($row[uid3]==$_SESSION[FCWuser]){$khsf=3;} //3表示跟单经理
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l1">
 <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1"><strong><?=$row[name1]?></strong> (电话:<?=$row[mot]?>)</a><br>
 <?=returnfxjd($row[jd])?>,录入：<?=returnnc($row[uid1])?>，跟单：<?=returnnc($row[uid2])?>，项目经理：<?=returnnc($row[uid3])?>
 </li>
 <li class="l4"><?=returnxq($row[xqbh],"bh")?></li>
 <li class="l6"><?=$row[sj]?></li>
 <li class="l5">
 <? if(2==$row[jd] && $khsf==3 && 0==$row[ifmoney]){?><a href="loupanfxkhyj.php?bh=<?=$row[bh]?>" class="red"><strong>发放佣金</strong></a><? }?>
 <? if(1==$row[ifmoney]){?><a href="loupanfxkhyj.php?bh=<?=$row[bh]?>" class="blue">佣金已发放</a><? }?>
 </li>
 </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="loupanfxkhlist.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>