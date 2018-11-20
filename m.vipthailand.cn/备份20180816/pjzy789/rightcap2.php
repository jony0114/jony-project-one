<?
while0("*","fcw_xq where bh='".$bh."' and admin=2");if(!$row=mysql_fetch_array($res)){php_toheader("loupanlist.php");}
$userid=returnuserid($row[uid]);
$tp=returntppd("../upload/".$userid."/f/".$bh."/home.jpg","img/none100x100.gif");
$xq=$row[xq];
$areaid=$row[areaid];
$areaids=$row[areaids];
$lpzt=$row[zt];
$lpdjl=$row[djl];
$lpmoney1=$row[money1];
$sltel=$row[sltel];
$lpid=$row[id];
$uid=$row[uid];
$areaid=$row[areaid];
$areaids=$row[areaids];
?>
 <div class="rlpglo">
 <ul class="u1">
 <li class="l1"><a href="../m/xmview<?=$lpid?>.html" target="_blank"><img border="0" class="tp" src="<?=$tp?>" width="120" height="80" /></a></li>
 <li class="l2"><strong><?=$xq?></strong> [<?=returnarea(1,$areaid)." ".returnarea(2,$areaids)?>]</li>
 <li class="l3">参考均价：<?=returnjgdw($lpmoney1,"元/平米","暂无")?> 咨询热线：<?=$sltel?></li>
 <li class="l4">已被关注<?=$lpdjl?>次，楼盘审核状态：<strong><?=returnztv($lpzt)?></strong></li>
 </ul>
 </div>
 
 <div class="bqu1">
 <a href="loupaninf.php?bh=<?=$bh?>" id="rtit1">基本资料</a>
 <a href="loupantxt.php?bh=<?=$bh?>" id="rtit2">详细介绍</a>
 <a href="loupanhxlist.php?bh=<?=$bh?>" id="rtit3">楼盘户型</a>
 <a href="loupanphotolist.php?bh=<?=$bh?>&tpnum=2" id="rtit4">楼盘相册</a>
 </div>
