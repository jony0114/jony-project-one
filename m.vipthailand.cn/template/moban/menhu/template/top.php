<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<!--������ʼ-->
<div class="topbfb">
 <div class="yjcode">
 <? include("../../../../template/tops.html");?>
 <div class="logo"><? include("../../../../template/fzqh.php");?></div>
 <div class="lrad"><? adread("menhu_ADI07",665,70)?></div>
 <div class="menu">
  <ul class="u1 m1"><li class="l1"><a href="<?=weburl?>">��<br>ҳ</a></li></ul>
  <ul class="u1 m6">
  <li class="l1"><a href="<?=weburl?>news/" target="_blank">��<br>Ѷ</a></li>
  <?
  while1("*","fcw_newstype where admin=1 order by xh asc limit 1");$row1=mysql_fetch_array($res1);
  while0("*","fcw_newstype where admin=2 and name1='".$row1[name1]."' order by xh asc limit 10");while($row=mysql_fetch_array($res)){
  $u=weburl."news/newslist_j".$row1[id]."v_k".$row[id]."v.html";
  ?>
  <li class="l3"><a href="<?=$u?>" target="_blank"><?=$row[name2]?></a></li>
  <?
  }
  ?>
  </ul>
  <ul class="u1 m2">
  <li class="l1"><a href="<?=weburl?>loupan/" target="_blank">��<br>��</a></li>
  <li class="l2"><a href="<?=weburl?>loupan/" target="_blank">¥��</a></li>
  <li class="l2"><a href="<?=weburl?>xq/" target="_blank">С��</a></li>
  <li class="l2"><a href="<?=weburl?>lphuxing/huxinglist.html" target="_blank">����</a></li>
  <li class="l2"><a href="<?=weburl?>lpnews/newslist.html" target="_blank">�Ż�</a></li>
  <li class="l2"><a href="<?=weburl?>lpjob/joblist.html" target="_blank">��Ƹ</a></li>
  <li class="l2"><a href="<?=weburl?>lpvideo/videolist.html" target="_blank">��Ƶ</a></li>
  <li class="l2"><a href="<?=weburl?>lptuan/tuanlist.html" target="_blank">�Ź�</a></li>
  <li class="l2"><a href="<?=weburl?>lpphoto/photolist.html" target="_blank">���</a></li>
  <li class="l2"><a href="<?=weburl?>feedback/feedbacklist.html" target="_blank">��ѯ</a></li>
  <li class="l2"><a href="<?=weburl?>map/index.php?xs=loupan" target="_blank">��ͼ</a></li>
  </ul>
  <ul class="u1 m3">
  <li class="l1"><a href="<?=weburl?>second/" target="_blank">��<br>��</a></li>
  <li class="l2"><a href="<?=weburl?>second/" target="_blank">����</a></li>
  <li class="l2"><a href="<?=weburl?>qiugou/" target="_blank">��</a></li>
  <li class="l2"><a href="<?=weburl?>zj/zjlist.html" target="_blank">�н�</a></li>
  <li class="l2"><a href="<?=weburl?>jjr/jjrlist.html" target="_blank">����</a></li>
  <li class="l2"><a href="<?=weburl?>rent/" target="_blank">����</a></li>
  <li class="l2"><a href="<?=weburl?>qiuzu/" target="_blank">����</a></li>
  <li class="l2"><a href="<?=weburl?>map/index.php?xs=second" target="_blank">��ͼ</a></li>
  <li class="l2"><a href="<?=weburl?>user/fb.php" target="_blank">����</a></li>
  </ul>
  <ul class="u1 m1"><li class="l1"><a href="<?=weburl?>mt" target="_blank">��<br>��</a></li></ul>
  <? if(1==$rowcontrol[ifjia]){?>
  <ul class="u1 m34">
  <li class="l1"><a href="<?=weburl?>jc/" target="_blank">��<br>װ</a></li>
  <li class="l2"><a href="<?=weburl?>zx/xzxlist.html" target="_blank">ѧװ��</a></li>
  <li class="l2"><a href="<?=weburl?>designer/caselist.html" target="_blank">������</a></li>
  <li class="l2"><a href="<?=weburl?>zx/zbview.html" target="_blank">��װ��</a></li>
  <li class="l2"><a href="<?=weburl?>zx/" target="_blank">�ҹ�˾</a></li>
  <li class="l2"><a href="<?=weburl?>designer/" target="_blank">���ʦ</a></li>
  <li class="l2"><a href="<?=weburl?>jc/" target="_blank">ѡ����</a></li>
  </ul>
  <? }else{?>
  <div class="mad"><? adread("menhu_ADI08",178,40)?></div>
  <? }?>
 </div> 
 
 </div>
</div>
<!--��������-->