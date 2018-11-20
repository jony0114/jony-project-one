<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<? include("../../../../template/tops.html");?>
<!--头1B-->
<div class="bfb bfbtop1">
<div class="yjcode">

 <div class="top1">
  <div class="logo"><a href="<?=weburl?>"><img border="0" src="<?=weburl?>img/logo.png"  /></a></div>
  <div class="d1"><a href="<?=weburl?>map/index.php?xs=loupan">地图找房</a></div>
  <form name="topf" method="post" onSubmit="return topser()">
  <ul class="u1">
  <li class="l1" onmouseenter="topover()" onmouseleave="topout()">
  <span id="topnwd">新房</span><span class="jian"><img src="<?=weburl?>homeimg/jian1.png" /></span>
  <div id="topdiv" style="display:none;">
  <a href="javascript:void(0);" onClick="topaover(1,'loupan','','search','新楼盘')">新楼盘</a>
  <a href="javascript:void(0);" onClick="topaover(2,'second','','search','二手房')">二手房</a>
  <a href="javascript:void(0);" onClick="topaover(3,'rent','','search','租房')">租房</a>
  <a href="javascript:void(0);" onClick="topaover(4,'second','_f12v','search','写字楼')">写字楼</a>
  <a href="javascript:void(0);" onClick="topaover(5,'second','_f13v','search','商铺')">商铺</a>
  <a href="javascript:void(0);" onClick="topaover(6,'news','','newslist','资讯')">资讯</a>
  </div>
  </li>
  <li class="l2"><input type="text" name="topsert" /></li>
  <li class="l3"><input type="image" src="<?=weburl?>homeimg/ser.gif" /></li>
  <li class="l4"><a href="<?=weburl?>user/fb.php"><img border=0 src="<?=weburl?>homeimg/fb.gif" /></a></li>
  </ul>
  </form>
 </div>
 
</div>
</div>
<!--头1E-->

<!--头2B-->
<div class="bfb bfbtop2">
<div class="yjcode">
 <div class="top2">
  <!--下拉B-->
  <div class="d1" onmouseover="leftmenuover()" onmouseout="leftmenuout()">
   <span class="scap"></span>
   <div id="xlmenu" style="display:none;">
   
     <div class="xl xl1">
      <span class="xlcap">区域</span>
      <div class="xlmain" onMouseOver="this.className='xlmain xlmain1';" onMouseOut="this.className='xlmain';">
      <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
      <span class="sa"><a href="<?=weburl?>loupan/search_j<?=$row1[id]?>v.html" class="acy"><?=$row1[name1]?></a></span>
      <? }?>
      </div>
     </div>
   
     <div class="xl xl2">
      <span class="xlcap">价格</span>
      <div class="xlmain" onMouseOver="this.className='xlmain xlmain1';" onMouseOut="this.className='xlmain';">
      <? 
      $i=0;$a=preg_split("/,/",$rowcontrol[LPSELMv]);for($j=0;$j<=count($a);$j++){
      if(0==$i){$str=$a[0]."以下";$m1=0;$m2=$a[0];}
      elseif(count($a)==$i){$str=$a[count($a)-1]."以上";$m1=$a[count($a)-1];$m2=999999;}
      else{$str=$a[$j-1]."-".$a[$j];$m1=$a[$j-1];$m2=$a[$j];}
      ?>
      <span class="sa1"><a href="<?=weburl?>loupan/search_b<?=$m1?>v_c<?=$m2?>v.html" class="acy"><?=$str?></a></span>
      <? $i++;}?>
      </div>
     </div>
   
     <div class="xl xl3">
      <span class="xlcap">类别</span>
      <div class="xlmain" onMouseOver="this.className='xlmain xlmain1';" onMouseOut="this.className='xlmain';">
      <?
      $xsv=",loupan,";
      while1("id,name2,xh,ifuse","fcw_wylx where ifuse='on' and xs like '%".$xsv."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
      ?>
      <span class="sa"><a href="<?=weburl?>loupan/search_f<?=$row1[id]?>v.html" class="acy"><?=$row1[name2]?></a></span>
      <? }?>
      </div>
     </div>
   
     <div class="xl xl4">
      <span class="xlcap">特色</span>
      <div class="xlmain" onMouseOver="this.className='xlmain xlmain1';" onMouseOut="this.className='xlmain';">
      <? $i=1;$ts="xcf楼盘";while1("*","fcw_wyts where lpwy like '%".$ts."%' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
      <span class="sa"><a href="<?=weburl?>loupan/search_t<?=$row1[id]?>v.html" class="acy"><?=$row1[name1]?></a></span>
      <? }?>
      </div>
     </div>
     
   </div>
  </div>
  <!--下拉E-->
  <!--菜单B-->
  <div class="d2">
   <div class="menu">
   <a href="<?=weburl?>" class="a1">首页</a>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>loupan/" class="a1"><span>新房</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>lphuxing/huxinglist.html">户型找房</a>
    <a href="<?=weburl?>lpjg/">价格走势</a>
    <a href="<?=weburl?>lpnews/newslist.html">楼盘优惠</a>
    <a href="<?=weburl?>lpphoto/photolist.html">图解楼盘</a>
    <a href="<?=weburl?>lpvideo/videolist.html">精彩视频</a>
    <a href="<?=weburl?>lpjob/joblist.html">楼盘招聘</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>second/" class="a1"><span>二手房</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>second/">我要买房</a>
    <a href="<?=weburl?>qiugou/">求购信息</a>
    <a href="<?=weburl?>xq/">小区找房</a>
    <a href="<?=weburl?>jjr/jjrlist.html">找经纪人</a>
    <a href="<?=weburl?>zj/zjlist.html">中介公司</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>rent/" class="a1"><span>出租房</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>rent/">我要租房</a>
    <a href="<?=weburl?>qiuzu/">求租信息</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>second/search_f13v.html" class="a1"><span>商铺</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>second/search_f13v.html">商铺出售</a>
    <a href="<?=weburl?>rent/search_f13v.html">商铺出租</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>second/search_f12v.html" class="a1"><span>写字楼</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>second/search_f12v.html">写字楼出售</a>
    <a href="<?=weburl?>rent/search_f12v.html">写字楼出租</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>news/" class="a1"><span>资讯</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <? while1("*","fcw_newstype where admin=1 order by xh asc limit 7");while($row1=mysql_fetch_array($res1)){?>
    <a href="<?=weburl?>news/newslist_j<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
    <? }?>
    </div>
   </div>
   <? if(1==$rowcontrol[ifjia]){?>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>jc/" class="a1"><span>家装馆</span><img src="<?=weburl?>homeimg/jian1.png" /></a>
    <div class="menulist">
    <a href="<?=weburl?>zx/xzxlist.html">学装修</a>
    <a href="<?=weburl?>zx/">装修公司</a>
    <a href="<?=weburl?>designer/caselist.html">看案例</a>
    <a href="<?=weburl?>zx/zbview.html">发招标</a>
    <a href="<?=weburl?>designer/">设计师</a>
    <a href="<?=weburl?>jc/">选建材</a>
    </div>
   </div>
   <? }?>

   <div class="menu">
    <a href="<?=weburl?>mt/" class="a1">手机找房</a>
   </div>

  </div>
  <!--菜单E-->
 </div>
</div>
</div>
<!--头2E-->