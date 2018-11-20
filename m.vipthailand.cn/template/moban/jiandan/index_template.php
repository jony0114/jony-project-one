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
<title><?=$rowcontrol[webtit]?></title>
<link href="css/basic.css?vt=<?=time()?>" rel="stylesheet" type="text/css" />
<link href="css/index.css?vt=<?=time()?>" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js?vt=<?=time()?>"></script>
<script type ="text/javascript" src="js/jquery1.42.min.js"></script>
<script language="javascript" src="js/index.js?vt=<?=time()?>"></script>
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

<? include("../../../template/top.html");?>

<div class="yjcode">

<? adwhile("jiandan_I2")?>

<!--出租搜索开始-->
<div id="chuzu" class="indexsearch">
<form name="serf1" method="post" onSubmit="return tj1()">
<ul class="u1">
<li class="l1" onMouseOver="isearover('chuzumenu');this.className='l1 l11';" onMouseOut="isearout('chuzumenu');this.className='l1';">
<a href="javascript:void(0);" target="_self">我要租房</a>
<div class="x" id="chuzumenu" style="display:none;">
<a href="javascript:void(0);" target="_self" onClick="selonc('chushou')">我要买房</a>
<a href="javascript:void(0);" target="_self" onClick="selonc('loupan')">新房搜索</a>
</div>
</li>
<li class="l2"><input name="fstxt1" id="fstxt1" type="text" /></li>
<li class="l3"><input type="image" src="homeimg/search.gif" width="115" height="40" /></li>
<li class="l4">
特色：
<? $nty="xcf公寓xcf";while1("*","fcw_wyts where czwy like '%".$nty."%' order by xh asc limit 10");while($row1=mysql_fetch_array($res1)){?>
<a href="rent/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
<? }?>
</li>
</ul>
</form>
<ul class="u2">
<li class="l1">从区域开始找</li>
<li class="l2">
<? while1("*","fcw_area where admin=1 order by xh asc limit 8");while($row1=mysql_fetch_array($res1)){?>
<a href="rent/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
<? }?>
<a href="rent/">更多>></a>
</li>
</ul>
<ul class="u4">
<li class="l1">从租金开始找</li>
<li class="l2">
<? 
$i=0;$a=preg_split("/,/",$rowcontrol[ZFSELMv]);for($j=0;$j<=5;$j++){
if(0==$i){$str=$a[0]."元以下";$m1=0;$m2=$a[0];}
elseif(count($a)==$i){$str=$a[count($a)-1]."元以上";$m1=$a[count($a)-1];$m2=99999;}
else{$str=$a[$j-1]."-".$a[$j]."元";$m1=$a[$j-1];$m2=$a[$j];}
?>
<a href="rent/search_b<?=$m1?>v_c<?=$m2?>v.html"><?=$str?></a>
<? $i++;}?>
</li>
</ul>
<ul class="u3">
<li class="l1">从户型开始找</li>
<li class="l2">
<?
$arr=array(1,2,3,4,5,6);
for($i=0;$i<count($arr);$i++){
if($i==count($arr)-1){$m1=$arr[$i];$m2=99;$str=$arr[$i]."室以上";}
else{$m1=$arr[$i];$m2=$arr[$i];$str=$m1."居室";}
?>
<a href="rent/search_d<?=$m1?>v_e<?=$m2?>v.html"><?=$str?></a>
<? }?>
</li>
</ul>
</div>
<!--出租搜索结束-->

<!--出售搜索开始-->
<div id="chushou" class="indexsearch" style="display:none;">
<form name="serf2" method="post" onSubmit="return tj2()">
<ul class="u1">
<li class="l1" onMouseOver="isearover('chushoumenu');this.className='l1 l11';" onMouseOut="isearout('chushoumenu');this.className='l1';">
<a href="javascript:void(0);" target="_self">我要买房</a>
<div class="x" id="chushoumenu" style="display:none;">
<a href="javascript:void(0);" target="_self" onClick="selonc('loupan')">新房搜索</a>
<a href="javascript:void(0);" target="_self" onClick="selonc('chuzu')">我要租房</a>
</div>
</li>
<li class="l2"><input name="fstxt2" id="fstxt2" type="text" /></li>
<li class="l3"><input type="image" src="homeimg/search.gif" width="115" height="40" /></li>
<li class="l4">
特色：
<? $nty="xcf公寓xcf";while1("*","fcw_wyts where cswy like '%".$nty."%' order by xh asc limit 10");while($row1=mysql_fetch_array($res1)){?>
<a href="second/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
<? }?>
</li>
</ul>
</form>
<ul class="u2">
<li class="l1">从区域开始找</li>
<li class="l2">
<? while1("*","fcw_area where admin=1 order by xh asc limit 8");while($row1=mysql_fetch_array($res1)){?>
<a href="second/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
<? }?>
<a href="second/">更多>></a>
</li>
</ul>
<ul class="u4">
<li class="l1">从售价开始找</li>
<li class="l2">
<? 
$i=0;$a=preg_split("/,/",$rowcontrol[ESFSELMv]);for($j=0;$j<=5;$j++){
if(0==$i){$str=$a[0]."万以下";$m1=0;$m2=$a[0];}
elseif(count($a)==$i){$str=$a[count($a)-1]."万以上";$m1=$a[count($a)-1];$m2=99999;}
else{$str=$a[$j-1]."-".$a[$j]."万";$m1=$a[$j-1];$m2=$a[$j];}
?>
<a href="second/search_b<?=$m1?>v_c<?=$m2?>v.html"><?=$str?></a>
<? $i++;}?>
</li>
</ul>
<ul class="u3">
<li class="l1">从户型开始找</li>
<li class="l2">
<?
$arr=array(1,2,3,4,5,6);
for($i=0;$i<count($arr);$i++){
if($i==count($arr)-1){$m1=$arr[$i];$m2=99;$str=$arr[$i]."室以上";}
else{$m1=$arr[$i];$m2=$arr[$i];$str=$m1."居室";}
?>
<a href="second/search_d<?=$m1?>v_e<?=$m2?>v.html"><?=$str?></a>
<? }?>
</li>
</ul>
</div>
<!--出售搜索结束-->

<!--楼盘搜索开始-->
<div id="loupan" class="indexsearch" style="display:none;">
<form name="serf19" method="post" onSubmit="return tj19()">
<ul class="u1">
<li class="l1" onMouseOver="isearover('loupanmenu');this.className='l1 l11';" onMouseOut="isearout('loupanmenu');this.className='l1';">
<a href="javascript:void(0);" target="_self">楼盘搜索</a>
<div class="x" id="loupanmenu" style="display:none;">
<a href="javascript:void(0);" target="_self" onClick="selonc('chushou')">我要买房</a>
<a href="javascript:void(0);" target="_self" onClick="selonc('chuzu')">我要租房</a>
</div>
</li>
<li class="l2"><input name="fstxt19" id="fstxt19" type="text" /></li>
<li class="l3"><input type="image" src="homeimg/search.gif" width="115" height="40" /></li>
<li class="l4">
特色：
<? $nty="xcf楼盘xcf";while1("*","fcw_wyts where lpwy like '%".$nty."%' order by xh asc limit 10");while($row1=mysql_fetch_array($res1)){?>
<a href="loupan/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
<? }?>
</li>
</ul>
</form>
<ul class="u2">
<li class="l1">从区域开始找</li>
<li class="l2">
<? while1("*","fcw_area where admin=1 order by xh asc limit 8");while($row1=mysql_fetch_array($res1)){?>
<a href="loupan/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
<? }?>
<a href="loupan/">更多>></a>
</li>
</ul>
<ul class="u4">
<li class="l1">从单价开始找</li>
<li class="l2">
<? 
$i=0;$a=preg_split("/,/",$rowcontrol[LPSELMv]);for($j=0;$j<=5;$j++){
if(0==$i){$str=$a[0]."元以下";$m1=0;$m2=$a[0];}
elseif(count($a)==$i){$str=$a[count($a)-1]."元以上";$m1=$a[count($a)-1];$m2=999999;}
else{$str=$a[$j-1]."-".$a[$j]."元";$m1=$a[$j-1];$m2=$a[$j];}
?>
<a href="loupan/search_b<?=$m1?>v_c<?=$m2?>v.html"><?=$str?></a>
<? $i++;}?>
</li>
</ul>
<ul class="u3">
<li class="l1">从物业类型开始找</li>
<li class="l2">
<?
$xsv=",loupan,";
while1("id,name2,xh,ifuse","fcw_wylx where ifuse='on' and xs like '%".$xsv."%' order by xh asc limit 6");while($row1=mysql_fetch_array($res1)){
?>
<a href="loupan/search_f<?=$row1[id]?>v.html"><?=$row1[name2]?></a>
<? }?>
</li>
</ul>
</div>
<!--楼盘搜索结束-->
 
<div class="quic">
<a href="user/chushoulx.php">发布出售</a><br>
<a href="user/chuzulx.php">发布出租</a>
</div>

<!--资讯调用开始-->
<div class="inews">
<!--头条B-->
<? 
while1("*","fcw_news where indextop=1 and zt=0 order by lastsj desc limit 1");if($row1=mysql_fetch_array($res1)){
$datev = explode("-" ,dateYMD($row1[sj]));
?>
<div class="indextop">
<ul class="u1">
<li class="l1">
<span class="s1"><?=$datev[0]?>-<?=$datev[1]?></span><span class="s2"><?=$datev[2]?></span>
</li>
<li class="l2">
<a href="news/txtlist_i<?=$row1[id]?>v.html" title="<?=$row1[tit]?>" class="a1 fontyh" target="_blank"><?=strgb2312($row1[tit],0,43)?></a> <img src="../img/icon8.gif" /> <? if(1==$row1[iftp]){?><img src="../img/icon9.gif" /><? }?><br>
<?=returntitdian($row1[wdes],90)?> <a href="news/txtlist_i<?=$row1[id]?>v.html" class="a2" target="_blank">[详细]</a>
</li>
</ul>
</div>
<? }?>
<!--头条E-->
<ul class="u3">
<? while0("*","fcw_news where zt=0 order by lastsj desc limit 18");while($row=mysql_fetch_array($res)){?>
<li>【<?=returnnewstype(1,$row[type1id])?>】<a href="news/txtlist_i<?=$row[id]?>v.html" title="<?=$row[tit]?>" target="_blank"><?=returntitcss(strgb2312($row[tit],0,42),$row[ifjc],$row[titys])?></a></li>
<? }?>
</ul>
</div>
<!--资讯调用结束-->

<!--方块广告B-->
<div class="fkad">
<? while0("*","fcw_ad where adbh='jiandan_I3' order by xh asc limit 10");while($row=mysql_fetch_array($res)){?>
<a href="<?=$row[aurl]?>" target="_blank"><img border=0 src="<?=weburl?>ad/<?=$row[bh]?>.<?=$row[jpggif]?>" width=113 height=60></a>
<? }?>
</div>
<!--方块广告E-->

<!--推荐楼盘开始-->
<? adwhile("ADI08");?>
<div class="lpmain">
<ul class="u1">
<li class="l1"><img src="homeimg/lpcap.gif" /></li>
<li class="l2">
<? while1("*","fcw_area where admin=1 order by xh asc limit 12");while($row1=mysql_fetch_array($res1)){?>
<a href="loupan/search_a<?=$row1[id]?>v.html" target="_blank"><?=$row1[name1]?></a> | 
<? }?>
<a href="loupan/" target="_blank">更多>></a>
</li>
</ul>

<? 
$i=1;
while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 5");while($row=mysql_fetch_array($res)){
$au="loupan/view".$row[id].".html";
?>
<ul class="u2<? if($i==1){?> u21<? }?>">
<li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="../upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home.jpg" width="220" height="145" /></a></li>
<li class="l2"><a href="<?=$au?>" target="_blank"><?=$row[xq]?></a> [<?=returnarea(1,$row[areaid])?>]</li>
<li class="l3">均价：<strong class="red"><?=$row[money1]?></strong>元/㎡</li>
<? while2("*","fcw_kanfang where xqbh='".$row[bh]."' and zt=0 order by sj desc limit 1");if($row2=mysql_fetch_array($res2)){$u="loupan/tuanview".$row2[id].".html";?>
<li class="l4"><a href="<?=$u?>" title="<?=$row2[tit]?>" target="_blank"><?=strgb2312($row2[tit],0,40)?></a></li>
<li class="l5"><input type="button" onClick="gourl('<?=$u?>')" value="报名" class="fontyh" /></li>
<? }?>
</ul>
<? $i++;}?>
</div>
<!--推荐楼盘结束-->


 <!--团购B-->
 <? adwhile("ADI10");?>
 <ul class="indexcap">
 <li class="l1 fontyh">买房团</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <a href="lptuan/tuanlist_a<?=$row1[id]?>v.html"><?=$row1[name1]?>团购</a> | 
 <? }?> <a href="lptuan/tuanlist.html">更多</a>
 </li>
 </ul>
 <div class="lptuan">
 <?
 $i=1;
 while0("*","fcw_kanfang where zt=0 and iftj>0 order by iftj asc limit 3");while($row=mysql_fetch_array($res)){
 $au="loupan/tuanview".$row[id].".html";
 ?>
 <ul class="u1<? if($i==1){echo " u10";}?>" onMouseOver="this.className='u1 u11<? if($i==1){echo " u10";}?>';" onMouseOut="this.className='u1<? if($i==1){echo " u10";}?>';">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="upload/<?=returnuserid($row[uid])?>/f/<?=$row[xqbh]?>/<?=$row[bh]?>.jpg" width="383" height="270" /></a></li>
 <li class="l2 fontyh"><a href="<?=$au?>" target="_blank">【<?=returnxq($row[xqbh],"bh")?>】<?=strgb2312($row[tit],0,60)?></a></li>
 <li class="l3">已有<strong class="red"><?=returncount("fcw_kanfanguser where xqbh='".$row[xqbh]."' and kfbh='".$row[bh]."'")?></strong>人参加团购</li>
 <li class="l4">
 <? if(0==$row[bmzt]){?>
 <input type="button" class="inp1" onClick="javascript:gourl('<?=$au?>');" value="立即参团" />
 <? 
 }else{
 if(1==$row[bmzt]){$bmv="正在组团";}
 elseif(2==$row[bmzt]){$bmv="正在看房";}
 elseif(3==$row[bmzt]){$bmv="活动已结束";}
 ?>
 <input type="button" class="inp2" onClick="javascript:gourl('<?=$au?>');" value="<?=$bmv?>" />
 <? }?>
 </li>
 </ul>
 <? $i++;}?>
 </div>
 <!--团购E-->

 <!--分销B-->
 <? adwhile("ADI11");?>
 <ul class="indexcap">
 <li class="l1 fontyh">全民营销</li>
 <li class="l2"><a href="loupan/fxlist.html">更多</a></li>
 </ul>
 <!--列表B-->
 <div class="fxilist">

 <div class="lmain">
 <? $i=1;while0("*","fcw_xq where iffx=1 order by sj desc limit 5");while($row=mysql_fetch_array($res)){?>
 <ul class="u2<? if($i==5){echo " u20";}?>" onMouseOver="this.className='u2 u21<? if($i==5){echo " u20";}?>';" onMouseOut="this.className='u2<? if($i==5){echo " u20";}?>';">
 <li class="l1"><a href="loupan/fxview<?=$row[id]?>.html"><img border="0" src="upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home-1.jpg" width="220" height="160" /></a></li>
 <li class="l2"><a href="loupan/fxview<?=$row[id]?>.html"><?=$row[xq]?></a></li>
 <li class="l3"><span>赚取<br>佣金</span></li>
 <li class="l4"><strong><?=$row[fxmoney]?></strong>起</li>
 <li class="l5">楼盘均价<br><?=returnjgdw($row[money1],"元","暂未公布")?></li>
 <li class="l6"><a href="user/loupanfxkhlx.php?xqbh=<?=$row[bh]?>" class="a1">推荐客户</a><a href="loupan/fxview<?=$row[id]?>.html" class="a2">查看详情</a></li>
 </ul>
 <? $i++;}?>
 </div>

 </div>
 <!--列表E-->
 <!--分销E-->

<!--推荐房源开始-->
<? if(panduan("*","fcw_fang where (type1='出售' or type1='出租') and ifok=0 and ifxj=0 and zt=0 and iftj>0")==1){?>
<div class="gdad">
<div id="demo" style="overflow:hidden;width:1150px;float:left;"> 
<table border=0 cellspacing=0 cellpadding=0> 
<tr> 
<td id="demo1"> 
 <table  style=" margin-top:0"> 
 <tr>
 <?
 while0("*","fcw_fang where (type1='出售' or type1='出租') and ifok=0 and ifxj=0 and zt=0 and iftj>0 order by iftj asc limit 30");while($row=mysql_fetch_array($res)){
 if($row[type1]=="出售"){$m=$row[money1]."万";$lj="second/view".$row[id].".html";}
 elseif($row[type1]=="出租"){$m=$row[money1].$row[jgdw];$lj="rent/view".$row[id].".html";}
 $tpv=returntp("bh='".$row[bh]."' and type1='".$row[type1]."'","-1");
 ?>
 <td align="center" valign="top"><a href="<?=$lj?>"><img style="margin:0 5px 8px 5px;border:#CFD0D2 solid 1px;padding:1px;" width="120" height="90" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" ></a> <br><a title="<?=$row[tit]?>" href="<?=$lj?>" target="_blank"><?=strgb2312($row[tit],0,35)?></a><br><strong><?=$m?></strong>
 </td> 
 <? }?>
 </tr> 
 </table>  
</td> 
<td id="demo2"></td> 
</tr> 
</table> 
</div>
<script language="javascript"> 
var speed=30;
demo2.innerHTML=document.getElementById("demo1").innerHTML 
function   Marquee(){ 
if(demo2.offsetWidth-demo.scrollLeft <=0) 
demo.scrollLeft-=demo1.offsetWidth 
else{ 
demo.scrollLeft++ 
} 
} 
var   MyMar=setInterval("Marquee()",speed) 
demo.onmouseover=function()   {clearInterval(MyMar)} 
demo.onmouseout=function()   {MyMar=setInterval("Marquee()",speed)} 
</script>
</div>
<? }?>
<!--推荐房源结束-->

<!--金牌经纪人B-->
<div class="tju">
<ul class="u0">
<li class="l1">金牌经纪人</li>
<li class="l2"></li>
</ul>
<ul class="u1">
<? while0("*","fcw_ad where adbh='jia_tj' order by xh asc");while($row=mysql_fetch_array($res)){?>
<li class="l1"><a href="<?=$row[aurl]?>" title="<?=$row[tit]?>" target="_blank"><img src="ad/<?=$row[bh]?>.<?=$row[jpggif]?>" width="110" height="135" border="0" /><br><?=strgb2312($row[tit],0,18)?></a></li>
<? }?>
</ul>
</div>
<!--金牌经纪人E-->

<? adwhile("ADI14");?>
<!--物业类型分类开始-->
<div class="wylxcap">
<a href="javascript:void(0);" class="a1" onMouseOver="wylxover(0)" id="wylxa0">最新发布</a>
<? 
$wylxarr=array();
$i=1;
while1("*","fcw_wylx where ifuse='on' order by xh asc limit 9");while($row1=mysql_fetch_array($res1)){
?>
<a href="javascript:void(0);" class="a0" onMouseOver="wylxover(<?=$i?>)" id="wylxa<?=$i?>"><?=$row1[name2]?></a>
<? 
$wylxarr[$i]=$row1[name1];
$i++;
}
?>
</div>
<!--物业类型分类结束-->

<!--物业类型循环开始-->
<div id="wylxdiv0">
<!--置顶B-->
<?
while1("*","fcw_fang where (type1='出售' or type1='出租') and ifok=0 and ifxj=0 and zt=0 and zdxh>0 order by zdxh asc");
while($row1=mysql_fetch_array($res1)){
if($row1[type1]=="出租"){
$jg=returnjgdw($row1[money1],$row1[jgdw],"来电咨询");
$xtb="zu.gif";
$lj="rent/view";
}elseif($row1[type1]=="出售"){
$jg=returnjgdw($row1[money1],"万","来电咨询");
$xtb="shou.gif";
$lj="second/view";
}
if(strtotime($row1[zddq])<=strtotime($sj)){updatetable("fcw_fang","zdxh=0 where id=".$row1[id]);}
?>
<ul class="fanglist fanglist2">
<li class="l2"><img src="homeimg/<?=$xtb?>" /></li>
<li class="l3"><a href="<?=$lj?><?=$row1[id]?>.html" title="<?=$row1[tit]?>" target="_blank"><?=strgb2312($row1[tit],0,73)?></a> <span class="red">[推广]</span></li>
<li class="l1"><?=$jg?></li>
<li class="l4"><?=$row1[mj]?>平米</li>
<li class="l5"><?=dateYMD($row1[sj])?></li>
</li>
</ul>
<? }?>
<!--置顶E-->
 
<?
while0("*","fcw_fang where (type1='出售' or type1='出租') and ifok=0 and ifxj=0 and zt=0 order by sj desc limit 30");
while($row=mysql_fetch_array($res)){
if($row[type1]=="出租"){
$jg=returnjgdw($row[money1],$row[jgdw],"来电咨询");
$xtb="zu.gif";
$lj="rent/view";
}elseif($row[type1]=="出售"){
$jg=returnjgdw($row[money1],"万","来电咨询");
$xtb="shou.gif";
$lj="second/view";
}
?>
<ul class="fanglist" onMouseOver="this.className='fanglist fanglist1';" onMouseOut="this.className='fanglist';">
<li class="l2"><img src="homeimg/<?=$xtb?>" /></li>
<li class="l3"><a href="<?=$lj?><?=$row[id]?>.html" title="<?=$row[tit]?>" target="_blank"><?=strgb2312($row[tit],0,73)?></a></li>
<li class="l1"><?=$jg?></li>
<li class="l4"><?=$row[mj]?>平米</li>
<li class="l5"><?=dateYMD($row[sj])?></li>
</li>
</ul>
<? }?>
 
</div>

<? for($j=1;$j<count($wylxarr);$j++){?>
<div id="wylxdiv<?=$j?>" style="display:none;">

<!--置顶B-->
<?
while1("*","fcw_fang where wylx='".$wylxarr[$j]."' and (type1='出售' or type1='出租') and ifok=0 and ifxj=0 and zt=0 and zdxh>0 order by zdxh asc");
while($row1=mysql_fetch_array($res1)){
if($row1[type1]=="出租"){
$jg=returnjgdw($row1[money1],$row1[jgdw],"来电咨询");
$xtb="zu.gif";
$lj="rent/view";
}elseif($row1[type1]=="出售"){
$jg=returnjgdw($row1[money1],"万","来电咨询");
$xtb="shou.gif";
$lj="second/view";
}
if(strtotime($row1[zddq])<=strtotime($sj)){updatetable("fcw_fang","zdxh=0 where id=".$row1[id]);}
?>
<ul class="fanglist fanglist2">
<li class="l2"><img src="homeimg/<?=$xtb?>" /></li>
<li class="l3"><a href="<?=$lj?><?=$row1[id]?>.html" title="<?=$row1[tit]?>" target="_blank"><?=strgb2312($row1[tit],0,73)?></a> <span class="red">[推广]</span></li>
<li class="l1"><?=$jg?></li>
<li class="l4"><?=$row1[mj]?>平米</li>
<li class="l5"><?=dateYMD($row1[sj])?></li>
</li>
</ul>
<? }?>
<!--置顶E-->
 
<?
while0("*","fcw_fang where wylx='".$wylxarr[$j]."' and (type1='出售' or type1='出租') and ifok=0 and ifxj=0 and zt=0 order by sj desc limit 30");
while($row=mysql_fetch_array($res)){
if($row[type1]=="出租"){
$jg=returnjgdw($row[money1],$row[jgdw],"来电咨询");
$xtb="zu.gif";
$lj="rent/view";
}elseif($row[type1]=="出售"){
$jg=returnjgdw($row[money1],"万","来电咨询");
$xtb="shou.gif";
$lj="second/view";
}
?>
<ul class="fanglist" onMouseOver="this.className='fanglist fanglist1';" onMouseOut="this.className='fanglist';">
<li class="l2"><img src="homeimg/<?=$xtb?>" /></li>
<li class="l3"><a href="<?=$lj?><?=$row[id]?>.html" title="<?=$row[tit]?>" target="_blank"><?=strgb2312($row[tit],0,73)?></a></li>
<li class="l1"><?=$jg?></li>
<li class="l4"><?=$row[mj]?>平米</li>
<li class="l5"><?=dateYMD($row[sj])?></li>
</li>
</ul>
<? }?>
 
</div>
<? }?>
<span id="wylxall" style="display:none"><?=$j-1?></span>
<!--物业类型循环结束-->
 
<? adwhile("jiandan_I4");?>
 
<!--友情B-->
<div class="bolink">
<ul class="u1">
<li class="l1 fontyh"><?=webname?>合作伙伴</li>
<li class="l2">
<? while0("*","fcw_ad where adbh='ADI06' order by xh asc");while($row=mysql_fetch_array($res)){?>
<a href="<?=$row[aurl]?>" target="_blank"><img alt="<?=$row[tit]?>" border=0 src="ad/<?=$row[bh]?>.<?=$row[jpggif]?>" width="100" height="35"></a>
<? }?>
</li>
</ul>
<ul class="u1">
<li class="l1 fontyh"><?=webname?>友情链接</li>
<li class="l3">
<? while0("*","fcw_ad where adbh='ADI07' and type1='文字' order by xh asc");while($row=mysql_fetch_array($res)){?>
<a href="<?=$row[aurl]?>" target="_blank"><?=$row[tit]?></a>
<? }?>
</li>
</ul>
</div>
<!--友情E-->

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