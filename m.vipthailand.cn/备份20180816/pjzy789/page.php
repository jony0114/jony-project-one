 <ul class="upage">
 <li class="l1"><a href="javascript:void(0);" onclick="pagegoto('<?=$nowurl?>','<?=$nowwd?>')">ȷ��</a></li>
 <li class="l5">��<?=$page_count?>ҳ��<?=$count?>������</li>
 <li class="l3"><a href="<?=$nowurl?>?page=<?=$page_count?>&<?=$nowwd?>"></a></li>
 <li class="l4"><? if($page<$page_count){?><a href="<?=$nowurl?>?page=<?=$page+1?>&<?=$nowwd?>"></a><? }else{?><a href="<?=$nowurl?>?page=<?=$page_count?>&<?=$nowwd?>"></a><? }?></li>
 <li class="l6"><span>��</span><input name="" id="pagetext" value="<?=$page?>" type="text" /><span>ҳ</span></li>
 <li class="l7"><? if($page>1){?><a href="<?=$nowurl?>?page=<?=$page-1?>&<?=$nowwd?>"></a><? }else{?><a href="<?=$nowurl?>?<?=$nowwd?>"></a><? }?></li>
 <li class="l8"><a href="<?=$nowurl?>?<?=$nowwd?>"></a></li>
 </ul>