<?
if(!empty($bh)){
while0("*","fcw_xq where bh='".$bh."' and admin=1");if(!$row=mysql_fetch_array($res)){php_toheader("xqlist.php");}
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
?>
 <div class="rlpglo">
 <ul class="u1">
 <li class="l1"><a href="../xq/view<?=$lpid?>.html" target="_blank"><img border="0" class="tp" src="<?=$tp?>" width="120" height="80" /></a></li>
 <li class="l2"><strong><?=$xq?></strong> [<?=returnarea(1,$areaid)." ".returnarea(2,$areaids)?>]</li>
 <li class="l3">
 �ο����ۣ�<?=returnjgdw($lpmoney1,"Ԫ/ƽ��","����")?> 
 ���۷�Դ��<?=returncount("fcw_fang where zt=0 and xq='".$xq."' and type1='����'")?>�ף�
 ���ⷿԴ��<?=returncount("fcw_fang where zt=0 and xq='".$xq."' and type1='����'")?>��
 </li>
 <li class="l4">�ѱ���ע<?=$lpdjl?>�Σ�С�����״̬��<strong><?=returnztv($lpzt)?></strong></li>
 </ul>
 </div>
 
 <div class="bqu1">
 <a href="xqinf.php?bh=<?=$bh?>" id="rtit1">��������</a>
 <a href="xqtxt.php?bh=<?=$bh?>" id="rtit2">��ϸ����</a>
 <a href="xqphotolist.php?bh=<?=$bh?>" id="rtit4">С�����</a>
 </div>
<? }?>