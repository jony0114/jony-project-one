<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<!--顶部开始-->
<div class="topbfb">
 <div class="yjcode">
 <? include("../../../../template/tops.html");?>
 <div class="logo"><? include("../../../../template/fzqh.php");?></div>
 <div class="lrad"><? adread("menhu_ADI07",665,70)?></div>
 <div class="menu">
  <ul class="u1 m1"><li class="l1"><a href="<?=weburl?>">首<br>页</a></li></ul>
  <ul class="u1 m6">
  <li class="l1"><a href="<?=weburl?>news/" target="_blank">资<br>讯</a></li>
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
  <li class="l1"><a href="<?=weburl?>loupan/" target="_blank">新<br>房</a></li>
  <li class="l2"><a href="<?=weburl?>loupan/" target="_blank">楼盘</a></li>
  <li class="l2"><a href="<?=weburl?>xq/" target="_blank">小区</a></li>
  <li class="l2"><a href="<?=weburl?>lphuxing/huxinglist.html" target="_blank">户型</a></li>
  <li class="l2"><a href="<?=weburl?>lpnews/newslist.html" target="_blank">优惠</a></li>
  <li class="l2"><a href="<?=weburl?>lpjob/joblist.html" target="_blank">招聘</a></li>
  <li class="l2"><a href="<?=weburl?>lpvideo/videolist.html" target="_blank">视频</a></li>
  <li class="l2"><a href="<?=weburl?>lptuan/tuanlist.html" target="_blank">团购</a></li>
  <li class="l2"><a href="<?=weburl?>lpphoto/photolist.html" target="_blank">相册</a></li>
  <li class="l2"><a href="<?=weburl?>feedback/feedbacklist.html" target="_blank">咨询</a></li>
  <li class="l2"><a href="<?=weburl?>map/index.php?xs=loupan" target="_blank">地图</a></li>
  </ul>
  <ul class="u1 m3">
  <li class="l1"><a href="<?=weburl?>second/" target="_blank">二<br>手</a></li>
  <li class="l2"><a href="<?=weburl?>second/" target="_blank">出售</a></li>
  <li class="l2"><a href="<?=weburl?>qiugou/" target="_blank">求购</a></li>
  <li class="l2"><a href="<?=weburl?>zj/zjlist.html" target="_blank">中介</a></li>
  <li class="l2"><a href="<?=weburl?>jjr/jjrlist.html" target="_blank">经纪</a></li>
  <li class="l2"><a href="<?=weburl?>rent/" target="_blank">出租</a></li>
  <li class="l2"><a href="<?=weburl?>qiuzu/" target="_blank">求租</a></li>
  <li class="l2"><a href="<?=weburl?>map/index.php?xs=second" target="_blank">地图</a></li>
  <li class="l2"><a href="<?=weburl?>user/fb.php" target="_blank">发布</a></li>
  </ul>
  <ul class="u1 m1"><li class="l1"><a href="<?=weburl?>mt" target="_blank">手<br>机</a></li></ul>
  <? if(1==$rowcontrol[ifjia]){?>
  <ul class="u1 m34">
  <li class="l1"><a href="<?=weburl?>jc/" target="_blank">家<br>装</a></li>
  <li class="l2"><a href="<?=weburl?>zx/xzxlist.html" target="_blank">学装修</a></li>
  <li class="l2"><a href="<?=weburl?>designer/caselist.html" target="_blank">看案例</a></li>
  <li class="l2"><a href="<?=weburl?>zx/zbview.html" target="_blank">找装修</a></li>
  <li class="l2"><a href="<?=weburl?>zx/" target="_blank">找公司</a></li>
  <li class="l2"><a href="<?=weburl?>designer/" target="_blank">设计师</a></li>
  <li class="l2"><a href="<?=weburl?>jc/" target="_blank">选建材</a></li>
  </ul>
  <? }else{?>
  <div class="mad"><? adread("menhu_ADI08",178,40)?></div>
  <? }?>
 </div> 
 
 </div>
</div>
<!--顶部结束-->