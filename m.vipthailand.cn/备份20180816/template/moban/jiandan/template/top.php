<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<? include("../../../../template/tops.html");?>

<!--顶部开始-->
<div class="topbfb">
 <div class="yjcode">
 
 <div class="logo"><? include("../../../../template/fzqh.php");?></div>
 <div class="mtmap">
 <a href="<?=weburl?>mt/" class="a1" target="_blank">手机找房</a>
 <a href="<?=weburl?>map/index.php?xs=loupan" target="_blank" class="a2">地图找房</a>
 </div>

 
 <div class="menu">
  <ul class="u1">
  <li class="l2"><a href="<?=weburl?>" class="a1">首页</a></li>
  
  <li class="l3" onmouseover="smenuover(2)" onmouseout="smenuout(2)">
   <a href="<?=weburl?>loupan/" class="a1">新楼盘</a>
   <div class="smenu" id="smenu2" style="display:none;">
   <a href="<?=weburl?>lphuxing/huxinglist.html" class="a2">户型找房</a>
   <a href="<?=weburl?>lpjg/" class="a2">价格走势</a>
   <a href="<?=weburl?>lpnews/newslist.html" class="a2">楼盘优惠</a>
   <a href="<?=weburl?>lpphoto/photolist.html" class="a2">图解楼盘</a>
   <a href="<?=weburl?>lpvideo/videolist.html" class="a2">精彩视频</a>
   <a href="<?=weburl?>lpjob/joblist.html" class="a2">楼盘招聘</a>
   </div>
  </li>
  
  <li class="l3"><a href="<?=weburl?>lptuan/tuanlist.html" class="red a1">买房团<span class="s1"><img border="0" src="<?=weburl?>img/icon7.gif" /></span></a></li>
  
  <li class="l3" onmouseover="smenuover(1)" onmouseout="smenuout(1)">
   <a href="<?=weburl?>second/" class="a1">二手房</a>
   <div class="smenu" id="smenu1" style="display:none;">
   <a href="<?=weburl?>second/" class="a2">房源列表</a>
   <a href="<?=weburl?>xq/" class="a2">小区找房</a>
   <a href="<?=weburl?>jjr/jjrlist.html" class="a2">找经纪人</a>
   <a href="<?=weburl?>zj/zjlist.html" class="a2">中介公司</a>
   <a href="<?=weburl?>qiugou/" class="a2">求购信息</a>
   </div>
  </li>
  
  <li class="l2" onmouseover="smenuover(3)" onmouseout="smenuout(3)">
   <a href="<?=weburl?>rent/" class="a1">租房</a>
   <div class="smenu" id="smenu3" style="display:none;">
   <a href="<?=weburl?>rent/" class="a2">房源列表</a>
   <a href="<?=weburl?>xq/" class="a2">小区找房</a>
   <a href="<?=weburl?>jjr/jjrlist.html" class="a2">找经纪人</a>
   <a href="<?=weburl?>zj/zjlist.html" class="a2">中介公司</a>
   <a href="<?=weburl?>qiuzu/" class="a2">求租信息</a>
   </div>
  </li>

  <? if(1==$rowcontrol[ifjia]){?>
  <li class="l3" onmouseover="smenuover(4)" onmouseout="smenuout(4)">
  <a href="<?=weburl?>jc/" class="a1">家装馆</a>
   <div class="smenu" id="smenu4" style="display:none;">
   <a href="<?=weburl?>zx/xzxlist.html" class="a2">学装修</a>
   <a href="<?=weburl?>zx/" class="a2">装修公司</a>
   <a href="<?=weburl?>designer/caselist.html" class="a2">看案例</a>
   <a href="<?=weburl?>zx/zbview.html" class="a2">发招标</a>
   <a href="<?=weburl?>designer/" class="a2">设计师</a>
   <a href="<?=weburl?>jc/" class="a2">选建材</a>
   </div>
  </li>
  <? }?>

  <li class="l4"><a href="<?=weburl?>map/index.php?xs=loupan" class="a1">地图找房</a></li>

  <li class="l2"><a href="<?=weburl?>news/" class="a1">资讯</a></li>
  
  <li class="l3" onmouseover="smenuover(5)" onmouseout="smenuout(5)">
   <a href="<?=weburl?>tool/dkjsq/" class="a1">房贷工具</a>
   <div class="smenu" id="smenu5" style="display:none;">
   <a href="<?=weburl?>dai/" class="a2">金融贷款</a>
   <a href="<?=weburl?>tool/dkjsq/" class="a2">贷款计算器</a>
   <a href="<?=weburl?>tool/dkjsq/index.php?t=gjj" class="a2">公积金贷款</a>
   <a href="<?=weburl?>tool/tqhdjsq/" class="a2">提前还贷</a>
   <a href="<?=weburl?>tool/gfnlpg/" class="a2">购房能力</a>
   </div>
  </li>
  
  </ul>
  
 </div>
 
 </div>
</div>
<!--顶部结束-->