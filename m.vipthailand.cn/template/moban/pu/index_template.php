<?
include("../../../config/conn.php");
include("../../../config/function.php");
$sj=date("Y-m-d H:i:s");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$rowcontrol[webkey]?>">
<meta name="description" content="<?=$rowcontrol[webdes]?>">
<link rel="shortcut icon" href="img/favicon.ico" />
<title><?=$rowcontrol[webtit]?></title>
<link href="css/basic.css?vt=<?=time()?>" rel="stylesheet" type="text/css" />
<link href="css/index.css?vt=<?=time()?>" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js?vt=<?=time()?>"></script>
<script type ="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/index.js?vt=<?=time()?>"></script>
<script type="text/javascript" src="js/layer.js"></script>
<? if(empty($rowcontrol[ifwap])){?>
<script language="javascript">
if(is_mobile()) {document.location.href= '<?=weburl?>m/';}
</script>
<? }?>
</head>
<body>
<? 
$i=1;
while1("*","fcw_ad where adbh='ADI01' order by xh asc");while($row1=mysql_fetch_array($res1)){
$tp="ad/".$row1[bh].".".$row1[jpggif];
$image_size= getimagesize("../../../".$tp); 
?>
<div class="topbanner_hj" style="background:url(<?=$tp?>) no-repeat center 0;height:<?=$image_size[1]?>px;<? if($i>1){?>margin-top:10px;<? }?>"><a href="<?=$row1[aurl]?>" target="_blank"></a></div>
<? $i++;}?>

<!--拉屏B-->
<? while1("*","fcw_ad where adbh='ADI00' order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){?>
<div class="yjcode">
<script language="javascript">
function TopAd(){
 var strTopAd="";
 var topSmallBanner="<div><a href=\"<?=$row1[aurl]?>\" target=_blank><img src=\"<?=weburl?>ad/<?=$row1[bh]?>-99.<?=$row1[jpggif]?>\" /></a></div>";
 strTopAd="<div id=adimage style=\"width:1200px\">"+
          "<div id=adBig><a href=\"<?=$row1[aurl]?>\" " + 
          "target=_blank><img title=<?=$row1[tit]?> "+
          "src=\"<?=weburl?>ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>\" " +
          "border=0></A></div>"+
          "<div id=adSmall style=\"display: none\">";
 strTopAd+=topSmallBanner;  
 strTopAd+="</div></div>";
 strTopAd+="<div style=\"height:7px; clear:both;overflow:hidden\"></div>";
 return strTopAd;
}

document.write(TopAd());
$(function(){
 setTimeout("showImage();",5000);
});
function showImage(){
 $("#adBig").slideUp(1000,function(){$("#adSmall").slideDown(1000);});
}
</script>
</div>
<? }?>
<!--拉屏E-->

<!--对联B-->
<? while1("*","fcw_ad where adbh='ADDL' order by xh asc");if($row1=mysql_fetch_array($res1)){?>
<div class="dlfixediv leftadv">
	<a href="<?=$row1[aurl]?>"><img src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="100" height="280" /></a>
	<a class="close" href="javascript:void(0);">关闭广告</a>
</div>
<? }?>
<? if($row1=mysql_fetch_array($res1)){?>
<div class="dlfixediv rightadv">
	<a href="<?=$row1[aurl]?>"><img src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="100" height="280" /></a>
	<a class="close" href="javascript:void(0);">关闭广告</a>
</div>
<? }?>
<!--对联E-->


<? include("../../../template/top.html");?>

<div class="bfb bfbindex">
<div class="yjcode">
 
 <!--切换B-->
 <div class="qieh">
  <div class="d1">
  <a href="javascript:void(0);" onClick="qhaonc(1)" id="qha1">商铺转让</a>
  <a href="javascript:void(0);" onClick="qhaonc(2)" id="qha2">商铺租售</a>
  <a href="javascript:void(0);" onClick="qhaonc(3)" id="qha3">写字楼</a>
  <a href="javascript:void(0);" onClick="qhaonc(4)" id="qha4">厂房仓库</a>
  </div>
  
  <ul class="u1" id="qhu1">
  <li class="l1">
  <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="rent/search_f13v_j1v_a<?=$row1[id]?>v.html" target="_blank"><?=$row1[name1]?></a>
  <? }?>
  </li>
  <li class="l2">
  <? while1("*","fcw_sphy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="rent/search_f13v_j1v_i<?=$row1[id]?>v.html" target="_blank"><?=$row1[name1]?></a>
  <? }?>
  </li>
  </ul>
  
  <ul class="u1" id="qhu2" style="display:none;">
  <li class="l1">
  <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="rent/search_f13v_a<?=$row1[id]?>v.html" target="_blank"><?=$row1[name1]?></a>
  <? }?>
  </li>
  <li class="l2">
  <a href="rent/search_f13v.html" target="_blank">商铺出租</a>
  <a href="second/search_f13v.html" target="_blank">商铺出售</a>
  </li>
  </ul>
  
  <ul class="u1" id="qhu3" style="display:none;">
  <li class="l1">
  <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="rent/search_f12v_a<?=$row1[id]?>v.html" target="_blank"><?=$row1[name1]?></a>
  <? }?>
  </li>
  <li class="l2">
  <a href="rent/search_f12v.html" target="_blank">写字楼出租</a>
  <a href="second/search_f12v.html" target="_blank">写字楼出售</a>
  </li>
  </ul>
  
  <ul class="u1" id="qhu4" style="display:none;">
  <li class="l1">
  <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="rent/search_f14v_a<?=$row1[id]?>v.html" target="_blank"><?=$row1[name1]?></a>
  <? }?>
  </li>
  <li class="l2">
  <a href="rent/search_f14v.html" target="_blank">厂房出租</a>
  <a href="second/search_f14v.html" target="_blank">厂房出售</a>
  <a href="rent/search_f25v.html" target="_blank">仓库出租</a>
  <a href="second/search_f25v.html" target="_blank">仓库出售</a>
  </li>
  </ul>
  
 </div>
 <!--切换E-->
 
 <!--找B-->
 <div class="zhao">
  <div class="d1">
  <a href="javascript:void(0);" class="a1" id="zhaoa1" onClick="zhaoonc(1)">我要转店</a>
  <a href="javascript:void(0);" id="zhaoa2" onClick="zhaoonc(2)">我要找店</a>
  </div>
  
  <div class="d2" id="zhao1">
  <form name="f1" method="post" onSubmit="return tjla1()" autocomplete="off">
   <input type="hidden" value="la1" name="yjcode" />
   <ul class="u1">
   <li class="l1">区域</li>
   <li class="l2" onmouseleave="laout(1)">
   <input type="text" onClick="laonc(1)" class="inp1" id="lat1" readonly name="t1" />
   <div class="la" id="la1" style="display:none;">
   <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <a href="javascript:void(0);" onClick="latonc(1,'<?=$row1[name1]?>')"><?=$row1[name1]?></a>
   <? }?>
   </div>
   </li>
   </ul>
   <ul class="u2">
   <li class="l1">经营</li>
   <li class="l2" onmouseleave="laout(2)">
   <input type="text" onClick="laonc(2)" class="inp1" id="lat2" readonly name="t2" />
   <div class="la" id="la2" style="display:none;">
   <? while1("*","fcw_sphy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <a href="javascript:void(0);" onClick="latonc(2,'<?=$row1[name1]?>')"><?=$row1[name1]?></a>
   <? }?>
   </div>
   </li>
   </ul>
   <ul class="u1">
   <li class="l1">面积</li>
   <li class="l2"><input type="text" name="t3" /></li>
   <li class="l3">平米</li>
   </ul>
   <ul class="u2">
   <li class="l1">手机</li>
   <li class="l2"><input type="text" name="t4" /></li>
   </ul>
   <ul class="u1">
   <li class="l1">租金</li>
   <li class="l2"><input type="text" name="t5" /></li>
   <li class="l3">元/月</li>
   </ul>
   <ul class="u2">
   <li class="l1">姓名</li>
   <li class="l2"><input type="text" name="t6" /></li>
   </ul>
   <div class="fb"><input type="submit" value="快速发布" /></div>
  </form>
  </div>
  
  <div class="d2" id="zhao2" style="display:none;">
  <form name="f2" method="post" onSubmit="return tjla2()" autocomplete="off">
   <input type="hidden" value="la2" name="yjcode" />
   <ul class="u1">
   <li class="l1">区域</li>
   <li class="l2" onmouseleave="laout(3)">
   <input type="text" onClick="laonc(3)" class="inp1" id="lat3" readonly name="t1" />
   <div class="la" id="la3" style="display:none;">
   <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <a href="javascript:void(0);" onClick="latonc(3,'<?=$row1[name1]?>')"><?=$row1[name1]?></a>
   <? }?>
   </div>
   </li>
   </ul>
   <ul class="u2">
   <li class="l1">经营</li>
   <li class="l2" onmouseleave="laout(4)">
   <input type="text" onClick="laonc(4)" class="inp1" id="lat4" readonly name="t2" />
   <div class="la" id="la4" style="display:none;">
   <? while1("*","fcw_sphy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <a href="javascript:void(0);" onClick="latonc(4,'<?=$row1[name1]?>')"><?=$row1[name1]?></a>
   <? }?>
   </div>
   </li>
   </ul>
   <ul class="u1">
   <li class="l1">面积</li>
   <li class="l2"><input type="text" name="t3" /></li>
   <li class="l3">平米</li>
   </ul>
   <ul class="u2">
   <li class="l1">手机</li>
   <li class="l2"><input type="text" name="t4" /></li>
   </ul>
   <ul class="u1">
   <li class="l1">租金</li>
   <li class="l2"><input type="text" name="t5" /></li>
   <li class="l3">元/月</li>
   </ul>
   <ul class="u2">
   <li class="l1">姓名</li>
   <li class="l2"><input type="text" name="t6" /></li>
   </ul>
   <div class="fb"><input type="submit" value="快速发布" /></div>
  </form>
  </div>
 
 </div>
 <!--找E-->
 
 <? adwhile("pu_03")?>
 
 <!--行业B-->
 <div class="hy">
  <div class="d1">按照行业找店铺</div>
  <div class="d2">
  <a href="javascript:void(0);" id="hya0" onClick="hyaonc(0)">行业不限</a><span></span>
  <? $i=1;while1("*","fcw_sphy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" id="hya<?=$i?>" onClick="hyaonc(<?=$i?>)"><?=$row1[name1]?></a><span></span>
  <? $i++;}?>
  </div> 
  <div class="hyleft">
  <div class="hym" id="hym0" style="display:none;">
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and type1='出租' and wylx='商铺' order by sj desc limit 12");while($row2=mysql_fetch_array($res2)){
  $tpv=returntp("bh='".$row2[bh]."' order by iffm desc limit 1","-1");
  $au="rent/view".$row2[id].".html";
  ?>
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="150" /></a></li>
  <li class="l2"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],25)?></a></li>
  <li class="l3"><span><?=$row2[money1]?></span><?=$row2[jgdw]?>&nbsp;&nbsp;&nbsp;<span><?=$row2[mj]?></span>平米</li>
  </ul>
  <? }?>
  </div>
  <? $i=1;while1("*","fcw_sphy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <div class="hym" id="hym<?=$i?>" style="display:none;">
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and type1='出租' and wylx='商铺' and hylx=".$row1[id]." order by sj desc limit 12");while($row2=mysql_fetch_array($res2)){
  $tpv=returntp("bh='".$row2[bh]."' order by iffm desc limit 1","-1");
  $au="rent/view".$row2[id].".html";
  ?>
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="150" /></a></li>
  <li class="l2"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],25)?></a></li>
  <li class="l3"><span><?=$row2[money1]?></span><?=$row2[jgdw]?>&nbsp;&nbsp;&nbsp;<span><?=$row2[mj]?></span>平米</li>
  </ul>
  <? }?>
  </div>
  <? $i++;}?>
  <span id="allhy" style="display:none;"><?=$i?></span>
  </div>
  <div class="hyright">
  <? adwhile("pu_01",3)?>
  </div>
  
 </div>
 <!--行业E-->
 
 <!--区域找铺B-->
 <div class="qyzp">
  <div class="d1">按照区域找铺</div>
  <div class="d2">
  <? $i=1;while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" id="qya<?=$i?>" onClick="qyaonc(<?=$i?>)"><?=$row1[name1]?></a><span></span>
  <? $i++;}?>
  </div> 
  <? $i=1;while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <div id="qym<?=$i?>">
  <? 
  $j=1;
  while2("*","fcw_fang where zt=0 and ifxj=0 and type1='出租' and wylx='商铺' and areaid=".$row1[id]." order by sj desc limit 12");while($row2=mysql_fetch_array($res2)){
  $au="rent/view".$row2[id].".html";
  ?>
  <ul class="u1<? if($j % 3==0){?> u0<? }?>">
  <li class="l1"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],40)?></a></li>
  <li class="l2"><span><?=$row2[money1]?></span><?=$row2[jgdw]?></li>
  </ul>
  <? $j++;}?>
  <div class="qymore"><a href="rent/search_a<?=$row1[id]?>v_f13v.html" target="_blank">更多<?=$row1[name1]?>转让信息>></a></div>
  </div>
  <? $i++;}?>
  <span id="allqy" style="display:none;"><?=$i?></span>
 </div>
 <!--区域找铺E-->
 
 <!--商铺出租B-->
 <div class="spcz">
  <div class="d1">商铺出租</div>
  <? 
  $i=1;
  while2("*","fcw_fang where zt=0 and ifxj=0 and type1='出租' and wylx='商铺' order by sj desc limit 4");while($row2=mysql_fetch_array($res2)){
  $tpv=returntp("bh='".$row2[bh]."' order by iffm desc limit 1","-1");
  $au="rent/view".$row2[id].".html";
  ?>
  <ul class="u1<? if($i==1){?> u0<? }?>">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="171" height="128" /></a></li>
  <li class="l2"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],20)?></a></li>
  <li class="l3"><?=$row2[mot]?></li>
  </ul>
  <? $i++;}?>
 </div>
 <!--商铺出租E-->
 
 <!--写字楼售B-->
 <div class="xzl">
  <ul class="u1"><li class="l1">写字楼租售</li><li class="l2"></li></ul>
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and wylx='写字楼' order by sj desc limit 8");while($row2=mysql_fetch_array($res2)){
  if($row2[type1]=="出售"){$u="second";}
  elseif($row2[type1]=="出租"){$u="rent";}
  $au=$u."/view".$row2[id].".html";
  ?>
  <ul class="u2"><li class="l1"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],40)?></a></li><li class="l2"><span><?=$row2[mj]?></span>平米</li></ul>
  <? }?> 
 </div>
 <!--写字楼E-->
 
 <!--商铺出售B-->
 <div class="spcz">
  <div class="d1">商铺出售</div>
  <? 
  $i=1;
  while2("*","fcw_fang where zt=0 and ifxj=0 and type1='出售' and wylx='商铺' order by sj desc limit 4");while($row2=mysql_fetch_array($res2)){
  $tpv=returntp("bh='".$row2[bh]."' order by iffm desc limit 1","-1");
  $au="second/view".$row2[id].".html";
  ?>
  <ul class="u1<? if($i==1){?> u0<? }?>">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="171" height="128" /></a></li>
  <li class="l2"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],20)?></a></li>
  <li class="l3"><?=$row2[mot]?></li>
  </ul>
  <? $i++;}?>
 </div>
 <!--商铺出售E-->
 
 <div class="pu02"><? adread("pu_02",428,85)?></div>
 
 <!--求租求购B-->
 <div class="qzqg">
  <ul class="u1"><li class="l1">求租求购</li><li class="l2"></li></ul>
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and (type1='求租' or type1='求购') order by sj desc limit 4");while($row2=mysql_fetch_array($res2)){
  if($row2[type1]=="求租"){$u="qiuzu";}
  elseif($row2[type1]=="求购"){$u="qiugou";}
  $au=$u."/view".$row2[id].".html";
  ?>
  <ul class="u2"><li class="l1"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],40)?></a></li><li class="l2"><span><?=$row2[mot]?></span></li></ul>
  <? }?> 
 </div>
 <!--求租求购E-->
 
</div>
</div>

<div class="yjcode">
 <? adwhile("ADI12");?>
 <!--仓库租售B-->
 <div class="ckcf">
  <ul class="u1"><li class="l1">仓库租售</li><li class="l2"></li></ul>
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and (type1='出租' or type1='出售') and wylx='仓库' order by sj desc limit 10");while($row2=mysql_fetch_array($res2)){
  if($row2[type1]=="出售"){$u="second";}
  elseif($row2[type1]=="出租"){$u="rent";}
  $au=$u."/view".$row2[id].".html";
  ?>
  <ul class="u2"><li class="l1"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],40)?></a></li><li class="l2"><span><?=$row2[mj]?></span>平米</li></ul>
  <? }?> 
 </div>
 <!--仓库租售E-->
 <!--厂房租售B-->
 <div class="ckcf">
  <ul class="u1"><li class="l1">厂房租售</li><li class="l2"></li></ul>
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and (type1='出租' or type1='出售') and wylx='厂房' order by sj desc limit 10");while($row2=mysql_fetch_array($res2)){
  if($row2[type1]=="出售"){$u="second";}
  elseif($row2[type1]=="出租"){$u="rent";}
  $au=$u."/view".$row2[id].".html";
  ?>
  <ul class="u2"><li class="l1"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],40)?></a></li><li class="l2"><span><?=$row2[mj]?></span>平米</li></ul>
  <? }?> 
 </div>
 <!--厂房租售E-->
 <!--资讯B-->
 <div class="inews">
  <ul class="u1"><li class="l1">新闻资讯</li><li class="l2"></li></ul>
  <?
  while1("*","fcw_news where zt=0 and iftp=1 order by lastsj desc limit 1");if($row1=mysql_fetch_array($res1)){
  ?>
  <ul class="u2">
  <li class="l1"><a href="news/txtlist_i<?=$row1[id]?>v.html" target="_blank"><img border="0" src="<?=returntp("bh='".$row1[bh]."' order by xh asc","-1")?>" /></a></li>
  <li class="l2">
  <a href="news/txtlist_i<?=$row1[id]?>v.html" target="_blank"><?=$row1[tit]?></a>
  <span class="s1"><?=returntitdian($row1[wdes],80)?></span>
  <span class="s2"><?=dateYMD($row1[sj])?></span>
  </li>
  </ul>
  <?
  }
  ?>
  <? while1("*","fcw_news where zt=0 order by lastsj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
  <ul class="u3">
  <li class="l1"><a href="news/txtlist_i<?=$row1[id]?>v.html" target="_blank" class="a1" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,40)?></a></li>
  <li class="l2"><?=dateYMD($row1[sj])?></li>
  </ul>
  <? }?>
 </div>
 <!--资讯E-->
</div>

<script language="javascript">
qhaonc(1);
hyaonc(0);
qyaonc(1);
</script>

<div class="bfb bfbbottom">
<div class="yjcode">
 <ul class="u1">
 <li class="l1">热门区域：</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=weburl?>rent/search_j<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
 <? }?>
 </li>
 </ul>
 <ul class="u1">
 <li class="l1">友情链接：(链接联系邮箱：<?=$rowcontrol[adminmail]?>)</li>
 <li class="l2">
 <? while0("*","fcw_ad where adbh='ADI07' and type1='文字' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>"><?=$row[tit]?></a>
 <? }?>
 </li>
 </ul>
</div>
</div>
<? include("../../../template/bottom.html");?>
<script language="javascript">
if(document.getElementById("rightcontact")){
document.getElementById("rightcontact").className="contact fontyh disyes";
document.getElementById("righttel").className="tel fontyh disno";
}
</script>

</body>
</html>