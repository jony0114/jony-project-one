 <?
 while1("*","fcw_kanfang where bh='".$kfbh."' and xqbh='".$bh."' and uid='".$_SESSION[FCWuser]."'");
 if(!$row1=mysql_fetch_array($res1)){php_toheader("loupankflist.php?bh=".$bh);}
 $aurl="loupankf.php?action=update&bh=".$bh."&mybh=".$row1[bh];
 ?>
 <ul class="listcap" style="margin-top:10px;">
 <li class="l1"></li>
 <li class="l2"><strong>看房团信息</strong></li>
 </ul>
 <ul class="typelist">
 <li class="l0"></li>
 <li class="l1">
 <a href="<?=$aurl?>"><img border="0" class="tp" src="<?=returntppd("../".returntp("bh='".$row1[bh]."'"),"img/none60x60.gif")?>" width="60" height="60" align="left" /></a>
 <a title="<?=$row1["tit"]?>" href="<?=$aurl?>" class="a1"><?=$row1["tit"]?></a><br><?=returnztv($row1[zt],$row1[ztsm])?>
 </li>
 <li class="l6"><?=$row1[djl]?></li>
 <li class="l4">
 <strong><a href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$row1[bh]?>">
 <? $bm1=returncount("fcw_kanfanguser where kfbh='".$row1[bh]."'");echo $bm1;?></a></strong><br>
 <a class="blue" href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$row1[bh]?>&zt=1">已通知<? $bm2=returncount("fcw_kanfanguser where kfbh='".$row1[bh]."' and zt=1");echo $bm2;?></a>,
 <a class="red" href="loupankfuserlist.php?bh=<?=$bh?>&kfbh=<?=$row1[bh]?>&zt=0">未通知<?=$bm1-$bm2?></a>
 </li>
 <li class="l5">
 <a href="<?=$aurl?>">修改</a><br>
 <a href="#" target="_blank">预览</a>
 </li>
 </ul>