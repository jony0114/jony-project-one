 <ul class="u1">
 <li class="l1">��ѡ������</li>
 <li class="l2">
 <? if(returnsx("a")!=-1){?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="ȡ��" href="<?=rentser('a','','o','');?>"><?=returnarea(1,returnsx("a"));?></a></span>
 <? }?>
 
 <? if(returnsx("o")!=-1){?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="ȡ��" href="<?=rentser('o','','','');?>"><?=returnarea(2,returnsx("o"));?></a></span>
 <? }?>
 
 <? if(returnsx("b")!=-1){ if(returnsx("c")!=999999 && returnsx("b")!=0){$tjv=returnsx("b")."-".returnsx("c")."";}elseif(returnsx("c")==999999){$tjv=returnsx("b")."����";}elseif(returnsx("b")==0){$tjv=returnsx("c")."����";}?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="ȡ��" href="<?=rentser('b','','c','');?>"><?=$tjv?></a></span>
 <? }?>
 
 <? if(returnsx("s")!=-1){?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="ȡ��" href="<?=rentser('s','','','');?>">�ؼ��ʣ�<?=$key?></a></span>
 <? }?>
 
 <? if(returnsx("y")!=-1){$zt=returnsx("y");?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="ȡ��" href="<?=rentser('y','','','');?>"><? if($zt==0){$nstr="����";}elseif($zt==1){$nstr="����";}elseif($zt==2){$nstr="����";}?><?=$nstr?></a></span>
 <? }?>

 <? if(returnsx("f")!=-1){?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="ȡ��" href="<?=rentser('f','','','');?>"><?=returnwylx(1,returnsx("f"));?></a></span>
 <? }?>
 
 <? if(returnsx("t")!=-1){?>
 <span class="s1" onmouseover="this.className='s2';" onmouseout="this.className='s1';"><a title="ȡ��" href="<?=rentser('t','','','');?>">��ɫ��<?=returnwyts(1,returnsx("t"))?></a></span>
 <? }?>

 </li>
 </ul>
