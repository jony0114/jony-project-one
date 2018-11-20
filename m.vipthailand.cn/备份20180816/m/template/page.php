<? if($page_count>1){?>
<div class="page box">
 <div class="d1"><a href="">首页</a></div>
 <div class="d1"><a href="<?=$nowurl?>?<?=$nowwd?>&page=<?=$page-1?>">上页</a></div>
 <div class="d1"><a href="<?=$nowurl?>?<?=$nowwd?>&page=<?=$page+1?>">下页</a></div>
 <div class="d1"><a href="<?=$nowurl?>?<?=$nowwd?>&page=<?=$page_count?>">末页</a></div>
 <div class="d2"><?=$page?>/<?=$page_count?>,共<?=$count?>条</div>
</div>
<div class="pageB"></div>
<? }?>
