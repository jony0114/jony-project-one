<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/ad.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu6").className="a1";
</script>
<div class="yjcode">
 <? $leftid=1;include("menu_ad.php");?>

<div class="right">

 <? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>无权限</div>";exit;}?>
 
 <? include("rightcap4.php");?>
 <script language="javascript">document.getElementById("rtit1").className="a1";</script>

 <!--begin-->
 <ul class="adtypecap">
 <li class="l1">广告定位编号</li>
 <li class="l2">说明</li>
 <li class="l3">管理</li>
 </ul>
 
 <?
 $adbh=array("ADDL","ADI00","ADI01","ADQH","ADI02","ADI05","ADI06","ADI07","ADI08","ADI09","ADI10","ADI11","ADI12","ADI13","ADI14","ADI15","ADI16","ADI17","defaultI01","defaultI02","defaultI03","defaultI04","ADKF");
 $adtit=array("对联广告","首页拉屏广告","首页顶部广告","首页切换广告","首页切换右侧广告","顶部中间文字","首页底部合作伙伴","首页友情链接","首页楼盘上方横幅","首页特价房上方横幅","首页买房团上方横幅","首页全民营销上方横幅","首页资讯上方横幅","首页户型上方横幅","首页二手房上方横幅","首页租房上方横幅","首页装修上方横幅","首页新房左侧广块广告","首页家装区切换","首页家装切换下方方块广告","首页家装切换右侧广告","首页底部广告","右侧自定义客服");
 $adsize=array("100*?","1200*?","1200*?","930*313","240*313","","100*35","","1200*?","1200*?","1200*?","1200*?","1200*?","1200*?","1200*?","1200*?","1200*?","233*140","720*280","239*100","208*387","1200*?","");
 $admust=array("pic","pic","","pic","","font","pic","font","","","","","","","","","","pic","pic","","","","code");
 
 for($i=0;$i<count($adbh);$i++){
 $adurl="adlist.php?bh=".$adbh[$i]."&sm=".urlencode($adtit[$i]."-".$adsize[$i])."&must=".$admust[$i];
 ?>
 <ul class="adtypelist">
 <li class="l1" onclick="gourl('<?=$adurl?>')"><?=$adbh[$i]?></li>
 <li class="l2"><?=$adtit[$i]." ".$adsize[$i]?></li>
 <li class="l3">
 <a href="<?=$adurl?>">列表</a><span></span>
 <a href="ad.php?bh=<?=$adbh[$i]?>&sm=<?=urlencode($adtit[$i]."-".$adsize[$i])?>&must=<?=$admust[$i]?>">新增</a>
 </li>
 </ul>
 <?
 }
 ?>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>