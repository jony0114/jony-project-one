 <ul class="u1">
 <li class="l1">区域：</li>
 <li class="l2">
 <a href="<?=rentser('a','','o','');?>" <? if(check_in("_av",$getstr) || !check_in("_a",$getstr)){?> class="nx"<? }?>>不限</a>
 <?
 while1("id,name1,admin,xh","fcw_area where admin=1 order by xh asc");
 while($row1=mysql_fetch_array($res1)){
 ?>
 <a href="<?=rentser('a',$row1[id],'o','');?>" <? if(check_in("_a".$row1[id]."v",$getstr)){?> class="nx"<? }?>><?=$row1[name1]?></a>
 <?
 }
 ?>
 <? if(returnsx("a")!=-1){?>
 <div class="tj2">
 <a href="<?=rentser('o','','','');?>" <? if(check_in("_ov",$getstr) || !check_in("_o",$getstr)){?> class="nx"<? }?>>不限</a>
 <?
 $name1=returnarea(1,returnsx("a"));
 while2("id,name1,name2,admin,xh","fcw_area where admin=2 and name1='".$name1."' order by xh asc");
 while($row2=mysql_fetch_array($res2)){
 ?>
 <a href="<?=rentser('o',$row2[id],'','');?>" <? if(check_in("_o".$row2[id]."v",$getstr)){?> class="nx"<? }?>><?=$row2[name2]?></a>
 <?
 }
 ?>
 </div>
 <? }?>
 </li>
 </ul>
 
 <ul class="u1">
 <li class="l1">均价：</li>
 <li class="l2">
 <div class="fd">
 <a href="<?=rentser('b','','c','');?>" <? if(check_in("_bv",$getstr) || check_in("_cv",$getstr) || !check_in("_b",$getstr) || !check_in("_c",$getstr)){?> class="nx"<? }?>>不限</a>
  <? 
  $i=0;$a=preg_split("/,/",$rowcontrol[LPSELMv]);for($j=0;$j<=count($a);$j++){
  if(0==$i){$str=$a[0]."元以下";$m1=0;$m2=$a[0];}
  elseif(count($a)==$i){$str=$a[count($a)-1]."元以上";$m1=$a[count($a)-1];$m2=999999;}
  else{$str=$a[$j-1]."-".$a[$j];$m1=$a[$j-1];$m2=$a[$j];}
  ?>
  <a href="<?=rentser('b',$m1,'c',$m2);?>" <? if(check_in("_b".$m1."v",$getstr) && check_in("_c".$m2."v",$getstr)){?> class="nx"<? }?>><?=$str?></a>
  <? $i++;}?>
 </div>
 </li>
 </ul>
 <ul class="u1">
 <li class="l1">类型：</li>
 <li class="l2">
 <a href="<?=rentser('f','','','');?>" <? if(check_in("_fv",$getstr) || !check_in("_f",$getstr)){?> class="nx"<? }?>>不限</a>
 <?
 $xsv=",loupan,";
 while1("id,name2,xh,ifuse","fcw_wylx where ifuse='on' and xs like '%".$xsv."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <a href="<?=rentser('f',$row1[id],'','');?>" <? if(check_in("_f".$row1[id]."v",$getstr)){?> class="nx"<? }?>><?=$row1[name2]?></a>
 <? }?>
 </li>
 </ul>

 <ul class="u1">
 <li class="l1">特色：</li>
 <li class="l2">
 <a href="<?=rentser('t','','','');?>" <? if(returnsx("t")==-1){?> class="nx"<? }?>>不限</a>
 <? $nty="xcf楼盘xcf";while1("*","fcw_wyts where lpwy like '%".$nty."%' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=rentser('t',$row1[id],'','');?>" <? if(check_in("_t".$row1[id]."v",$getstr)){?> class="nx"<? }?>><?=$row1[name1]?></a>
 <? }?>
 </li>
 </ul>
