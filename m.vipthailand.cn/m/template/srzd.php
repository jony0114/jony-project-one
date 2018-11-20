  <li class="l1">地址：<span class="hui"><?=returnarea(1,$row[areaid]).returnarea(2,$row[areaids]).$row[fadd]?></span></li>
  <li class="l2">面积：<span class="hui"><?=$row[mj]?>㎡</span></li>
  <li class="l2">类型：<span class="hui"><?=$row[wylx]?></span></li>
  
  <? if(check_in($row[wylx],"公寓,写字楼")){?>
  <li class="l2">楼层：<span class="hui"><? if($row[lc1]!=0){echo $row[lc1]."层";} if($row[lc2]!=0){echo "共(".$row[lc2]."层)";}?></span></li>
  <? }?>
  
  <? if(check_in($row[wylx],"公寓,别墅")){?>
  <li class="l2">户型：<span class="hui"><? 
  if($row[hx1]!=0){echo $row[hx1]."室";}
  if($row[hx2]!=0){echo $row[hx2]."厅";}
  if($row[hx3]!=0){echo $row[hx3]."卫";}
  if($row[hx4]!=0){echo $row[hx4]."厨";}
  if($row[hx5]!=0){echo $row[hx5]."阳台";}
  ?></span>
  </li>
  <? }?>
  
  <? if(check_in($row[wylx],"公寓,别墅,写字楼,商铺,厂房,平房,旅馆/酒店")){?>
  <? if($row[fl]!=0){?><li class="l2">建造年代：<span class="hui"><?=$row[jznd]."年";?></span></li><? }?>
  <? if($row[zxqkid]!=0){?><li class="l2">装修：<span class="hui"><?=returnzxqk($row[zxqkid])?></span></li><? }?>
  <? if($row[cxid]!=0){?><li class="l2">朝向：<span class="hui"><?=returnfwcx($row[cxid])?></span></li><? }?>
  <? }?>
  
  <? if(check_in($row[wylx],"别墅")){?>
  <? if($row[lxid]!=0){?>
  <li class="l2">别墅类型：<span class="hui"><? while1("id,name1","fcw_bslx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?></span></li>
  <? }?>
  <? if($row[lc1]!=0){?><li class="l2">地上层数：<span class="hui"><?=$row[lc1]?>层</span></li><? }?>
  <? if($row[mj1]!=0){?><li class="l2">花园面积：<span class="hui"><?=$row[mj1]?>平米</span></li><? }?>
  <? if($row[mj2]!=0){?><li class="l2">地下室面积：<span class="hui"><?=$row[mj2]?>平米</span></li><? }?>
  <? }?>
  
  <? if($row[wylx]=="写字楼"){?>
  <li class="l2">类型：<span class="hui">
  <? if($row[lxid]!=0){?><? while1("id,name1","fcw_xzllx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?><? }?> 
  <? if($row[jbid]!=0){?><? while1("id,name1","fcw_xzljb where id=".$row[jbid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?> <? }?> 
  </span>
  </li>
  <? }?>
  
  <? if($row[wylx]=="商铺"){?>
  <li class="l2">类型：<span class="hui">
  <? if($row[lxid]!=0){?><? while1("id,name1","fcw_splx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?><? }?> 
  <? if($row[jbid]!=0){?><? while1("id,name1","fcw_pmlx where id=".$row[jbid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?> <? }?> 
  </span>
  </li>
  <? }?>

  <? if($row[wylx]=="厂房"){?>
  <li class="l2">层数：<span class="hui"><? if($row[lc1]!=0){echo "第".$row[lc1]."层";} if($row[lc2]!=0){echo "到第".$row[lc2]."层)";}?></span></li>
  <? }?>