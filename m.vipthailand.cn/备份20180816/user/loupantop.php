<?
$tp=returntppd("../upload/".$userid."/f/".$bh."/home.jpg","img/none100x100.gif");
while0("*","fcw_xq where bh='".$_GET[bh]."' and uid='".$_SESSION[FCWuser]."' and admin=2");if(!$row=mysql_fetch_array($res)){php_toheader("loupanlist.php");}
$xq=$row[xq];
$areaid=$row[areaid];
$areaids=$row[areaids];
$lpzt=$row[zt];
$lpdjl=$row[djl];
$lpmoney1=$row[money1];
$sltel=$row[sltel];
$lpid=$row[id];
$areaid=$row[areaid];
$areaids=$row[areaids];
?>
 <div class="rlpglo">
 <ul class="u1">
 <li class="l1"><a href="../loupan/view<?=$lpid?>.html" target="_blank"><img border="0" class="tp" src="<?=$tp?>" width="120" height="80" /></a></li>
 <li class="l2"><strong><?=$xq?></strong> [<?=returnarea(1,$areaid)." ".returnarea(2,$areaids)?>]</li>
 <li class="l3">�ο����ۣ�<?=returnjgdw($lpmoney1,"Ԫ/ƽ��","����")?> ��ѯ���ߣ�<?=$sltel?></li>
 <li class="l4">�ѱ���ע<?=$lpdjl?>�Σ�¥�����״̬��<strong><?=returnztv($lpzt)?></strong></li>
 </ul>
 </div>