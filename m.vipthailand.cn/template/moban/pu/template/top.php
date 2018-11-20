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
  <div class="d1"><a href="<?=weburl?>map/index.php?xs=rent" target="_blank">地图找房</a></div>
  <form name="topf" method="post" onSubmit="return topser()">
  <ul class="u1">
  <li class="l1" onmouseenter="topover()" onmouseleave="topout()">
  <span id="topnwd">商铺</span><span class="jian"><img src="<?=weburl?>homeimg/jian1.png" /></span>
  <div id="topdiv" style="display:none;">
  <a href="javascript:void(0);" onClick="topaover(5,'rent','_f13v','search','商铺')">商铺</a>
  <a href="javascript:void(0);" onClick="topaover(4,'rent','_f12v','search','写字楼')">写字楼</a>
  <a href="javascript:void(0);" onClick="topaover(3,'rent','','search','租房')">租房</a>
  <a href="javascript:void(0);" onClick="topaover(1,'loupan','','search','新楼盘')">新楼盘</a>
  <a href="javascript:void(0);" onClick="topaover(2,'second','','search','二手房')">二手房</a>
  <a href="javascript:void(0);" onClick="topaover(6,'news','','newslist','资讯')">资讯</a>
  </div>
  </li>
  <li class="l2"><input type="text" name="topsert" /></li>
  <li class="l3"><input type="image" src="<?=weburl?>homeimg/topser.gif" /></li>
  <li class="l4"><a href="<?=weburl?>user/fb.php">免费发布信息</a></li>
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
  <!--菜单B-->
  <div class="d2">
   <div class="menu">
   <a href="<?=weburl?>" class="as">首页</a>
   </div>
   <div class="menu">
   <a href="<?=weburl?>rent/search_f13v_j1v.html" class="a1">商铺转让</a>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>rent/search_f13v.html" class="a1"><span>商铺租售</span></a>
    <div class="menulist">
    <a href="<?=weburl?>rent/search_f13v.html">商铺出租</a>
    <a href="<?=weburl?>second/search_f13v.html">商铺出售</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>rent/search_f12v.html" class="a1"><span>写字楼</span></a>
    <div class="menulist">
    <a href="<?=weburl?>rent/search_f12v.html">写字楼出租</a>
    <a href="<?=weburl?>second/search_f12v.html">写字楼出售</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>rent/search_f14v.html" class="a1"><span>厂房仓库</span></a>
    <div class="menulist">
    <a href="<?=weburl?>rent/search_f14v.html">厂房出租</a>
    <a href="<?=weburl?>second/search_f14v.html">厂房出售</a>
    <a href="<?=weburl?>rent/search_f25v.html">仓库出租</a>
    <a href="<?=weburl?>second/search_f25v.html">仓库出售</a>
    </div>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>qiuzu/" class="a1"><span>求租求购</span></a>
    <div class="menulist">
    <a href="<?=weburl?>qiuzu/">求租信息</a>
    <a href="<?=weburl?>qiugou/">求购信息</a>
    </div>
   </div>
   <div class="menu">
   <a href="<?=weburl?>news/" class="a1">新闻资讯</a>
   </div>
   <div class="menu" onMouseOver="this.className='menu menu1';" onMouseOut="this.className='menu';">
    <a href="<?=weburl?>loupan/" class="a1"><span>更多栏目</span></a>
    <div class="menulist">
    <a href="<?=weburl?>loupan/">新房中心</a>
    <a href="<?=weburl?>second/">二手房</a>
    <a href="<?=weburl?>rent/">租房</a>
    <a href="<?=weburl?>jjr/jjrlist.html/">经纪人</a>
    <a href="<?=weburl?>zj/zjlist.html">中介公司</a>
    <? if(1==$rowcontrol[ifjia]){?>
    <a href="<?=weburl?>jc/">家装馆</a>
    <? }?>
    </div>
   </div>

  </div>
  <!--菜单E-->
 </div>
</div>
</div>
<!--头2E-->