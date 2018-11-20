 <ul class="u1">
 <li class="l1">已选条件：</li>
 <li class="l2">
 <? if(returnsx("a")!=-1){?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="取消" href="<?=rentser('a','','o','');?>"><?=returnarea(1,returnsx("a"));?></a></span>
 <? }?>
 
 <? if(returnsx("o")!=-1){?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="取消" href="<?=rentser('o','','','');?>"><?=returnarea(2,returnsx("o"));?></a></span>
 <? }?>
 
 <? if(returnsx("b")!=-1){ if(returnsx("c")!=999999 && returnsx("b")!=0){$tjv=returnsx("b")."-".returnsx("c")."";}elseif(returnsx("c")==999999){$tjv=returnsx("b")."以上";}elseif(returnsx("b")==0){$tjv=returnsx("c")."以下";}?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="取消" href="<?=rentser('b','','c','');?>"><?=$tjv?></a></span>
 <? }?>
 
 <? if(returnsx("s")!=-1){?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="取消" href="<?=rentser('s','','','');?>">关键词：<?=$key?></a></span>
 <? }?>
 
 <? if(returnsx("y")!=-1){$zt=returnsx("y");?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="取消" href="<?=rentser('y','','','');?>"><? if($zt==0){$nstr="在售";}elseif($zt==1){$nstr="待售";}elseif($zt==2){$nstr="售完";}?><?=$nstr?></a></span>
 <? }?>

 <? if(returnsx("f")!=-1){?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="取消" href="<?=rentser('f','','','');?>"><?=returnwylx(1,returnsx("f"));?></a></span>
 <? }?>
 
 <? if(returnsx("t")!=-1){?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="取消" href="<?=rentser('t','','','');?>">特色：<?=returnwyts(1,returnsx("t"))?></a></span>
 <? }?>

 </li>
 </ul>
