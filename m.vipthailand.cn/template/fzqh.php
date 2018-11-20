 <a href="<?=weburl?>" class="a1"><img border="0" src="<?=weburl?>img/logo.png"  /></a>
 <? if(panduan("*","fcw_fz")==1){?>
 <div class="r">
 <span class="s1"><?=webarea?></span>
 <div class="d1" onmouseover="fzqhover()" onmouseout="fzqhout()">
 <a href="javascript:void(0)" class="a2">[ÇÐ»»³ÇÊÐ]</a>
 <div id="fzqh" style="display:none;">
 <? while1("*","fcw_fz order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=$row1[furl]?>" class="a3" target="_self"><?=$row1[name1]?></a>
 <? }?>
 </div>
 </div>
 </div>
 <? }?>