<? if($page_count>1){?>
<div class="page box">
 <div class="d1"><a href="">��ҳ</a></div>
 <div class="d1"><a href="<?=$nowurl?>?<?=$nowwd?>&page=<?=$page-1?>">��ҳ</a></div>
 <div class="d1"><a href="<?=$nowurl?>?<?=$nowwd?>&page=<?=$page+1?>">��ҳ</a></div>
 <div class="d1"><a href="<?=$nowurl?>?<?=$nowwd?>&page=<?=$page_count?>">ĩҳ</a></div>
 <div class="d2"><?=$page?>/<?=$page_count?>,��<?=$count?>��</div>
</div>
<div class="pageB"></div>
<? }?>
