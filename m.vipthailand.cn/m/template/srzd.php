  <li class="l1">��ַ��<span class="hui"><?=returnarea(1,$row[areaid]).returnarea(2,$row[areaids]).$row[fadd]?></span></li>
  <li class="l2">�����<span class="hui"><?=$row[mj]?>�O</span></li>
  <li class="l2">���ͣ�<span class="hui"><?=$row[wylx]?></span></li>
  
  <? if(check_in($row[wylx],"��Ԣ,д��¥")){?>
  <li class="l2">¥�㣺<span class="hui"><? if($row[lc1]!=0){echo $row[lc1]."��";} if($row[lc2]!=0){echo "��(".$row[lc2]."��)";}?></span></li>
  <? }?>
  
  <? if(check_in($row[wylx],"��Ԣ,����")){?>
  <li class="l2">���ͣ�<span class="hui"><? 
  if($row[hx1]!=0){echo $row[hx1]."��";}
  if($row[hx2]!=0){echo $row[hx2]."��";}
  if($row[hx3]!=0){echo $row[hx3]."��";}
  if($row[hx4]!=0){echo $row[hx4]."��";}
  if($row[hx5]!=0){echo $row[hx5]."��̨";}
  ?></span>
  </li>
  <? }?>
  
  <? if(check_in($row[wylx],"��Ԣ,����,д��¥,����,����,ƽ��,�ù�/�Ƶ�")){?>
  <? if($row[fl]!=0){?><li class="l2">���������<span class="hui"><?=$row[jznd]."��";?></span></li><? }?>
  <? if($row[zxqkid]!=0){?><li class="l2">װ�ޣ�<span class="hui"><?=returnzxqk($row[zxqkid])?></span></li><? }?>
  <? if($row[cxid]!=0){?><li class="l2">����<span class="hui"><?=returnfwcx($row[cxid])?></span></li><? }?>
  <? }?>
  
  <? if(check_in($row[wylx],"����")){?>
  <? if($row[lxid]!=0){?>
  <li class="l2">�������ͣ�<span class="hui"><? while1("id,name1","fcw_bslx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?></span></li>
  <? }?>
  <? if($row[lc1]!=0){?><li class="l2">���ϲ�����<span class="hui"><?=$row[lc1]?>��</span></li><? }?>
  <? if($row[mj1]!=0){?><li class="l2">��԰�����<span class="hui"><?=$row[mj1]?>ƽ��</span></li><? }?>
  <? if($row[mj2]!=0){?><li class="l2">�����������<span class="hui"><?=$row[mj2]?>ƽ��</span></li><? }?>
  <? }?>
  
  <? if($row[wylx]=="д��¥"){?>
  <li class="l2">���ͣ�<span class="hui">
  <? if($row[lxid]!=0){?><? while1("id,name1","fcw_xzllx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?><? }?> 
  <? if($row[jbid]!=0){?><? while1("id,name1","fcw_xzljb where id=".$row[jbid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?> <? }?> 
  </span>
  </li>
  <? }?>
  
  <? if($row[wylx]=="����"){?>
  <li class="l2">���ͣ�<span class="hui">
  <? if($row[lxid]!=0){?><? while1("id,name1","fcw_splx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?><? }?> 
  <? if($row[jbid]!=0){?><? while1("id,name1","fcw_pmlx where id=".$row[jbid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?> <? }?> 
  </span>
  </li>
  <? }?>

  <? if($row[wylx]=="����"){?>
  <li class="l2">������<span class="hui"><? if($row[lc1]!=0){echo "��".$row[lc1]."��";} if($row[lc2]!=0){echo "����".$row[lc2]."��)";}?></span></li>
  <? }?>