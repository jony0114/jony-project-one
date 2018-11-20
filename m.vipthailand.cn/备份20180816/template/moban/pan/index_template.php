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
<link href="homeimg/jquery.flexslider.css" rel="stylesheet" type="text/css" >
<script language="javascript" src="js/basic.js?vt=<?=time()?>"></script>
<script type ="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/index.js?vt=<?=time()?>"></script>
<script type="text/javascript" src="homeimg/jquery.flexslider-min.js"></script>
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
<span id="leftnone" style="display:none">0</span>
<script language="javascript">leftmenuover();</script>
<div  class="yjcode">

<!--主B-->
 <div class="qih">
  <div class="qh">
  <div class="container" id="idTransformView">
  <ul class="slider" id="idSlider">
  <?
  $i=1;
  while1("*","fcw_ad where adbh='pan_01' order by xh asc");while($row1=mysql_fetch_array($res1)){
  ?>
  <li><a href="<?=$row1[aurl]?>"><img src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="743" height="226" border="0" /></a></li>
  <? $i++;}?>
  </ul>
  <span style="display:none" id="qhai"><?=$i-1?></span>
  <ul class="num" id="idNum">
  <? for($j=1;$j<$i;$j++){?><li><?=$j?></li><? }?>
  </ul>
  </div>  
  </div>
  
  <ul class="u1">
  <li class="l1" id="indexrq1"></li>
  <li class="l2" id="indexrq2"></li>
  <li class="l3">
  <? while1("*","fcw_ad where adbh='pan_05' order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){?>
  <a href="<?=$row1[aurl]?>" class="acy"><img border=0 src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="170" height="130" /><br><?=$row1[tit]?></a>
  <? }?>
  </li>
  </ul>
  <script language="javascript">
    $.post("js/indexsj.php",{},function(result){
     a=result.split("xcf");
	 document.getElementById("indexrq1").innerHTML=a[0];
	 b=new Array("日","一","二","三","四","五","六");
	 document.getElementById("indexrq2").innerHTML="星期"+b[a[1]];
    });
  </script>
 </div>
 <div class="qhp">
  <? $i=1;$ts="xcf楼盘";while1("*","fcw_wyts where lpwy like '%".$ts."%' order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
  <ul class="u<?=$i?>">
  <li class="l1"><?=$row1[name1]?></li>
  <li class="l2">
  <? $wyts="xcf".$row1[id]."xcf";while0("*","fcw_xq where admin=2 and wytsid like '%".$wyts."%' and zt=0 and ifxj=0 order by sj desc limit 3");while($row=mysql_fetch_array($res)){?>
  <a href="loupan/view<?=$row[id]?>.html"><?=$row[xq]?></a><br>
  <? }?>
  </li>
  </ul>
  <? $i++;}?>
 </div>
<!--主E-->

<!--品牌商家B-->
<div class="ippsj">
<ul class="u1"><li class="l1">品牌商家</li></ul>
<ul class="u2">
<? while0("*","fcw_ad where adbh='ADI23' order by xh asc");while($row=mysql_fetch_array($res)){?>
<li><a href="<?=$row[aurl]?>" target="_blank"><img alt="<?=$row[tit]?>" border=0 src="ad/<?=$row[bh]?>.<?=$row[jpggif]?>" width="160" height="100"><br><?=$row[tit]?></a></li>
<? }?>
</ul>
</div>
<!--品牌商家E-->

<? adwhile("ADI08");?>
<!--焦点楼盘B-->
<div class="lp">
 <ul class="u1">
 <li class="l0 l1" id="lpcap0" onMouseOver="lpcapover(0)">热门楼盘</li>
 <? $i=1;$ts="xcf楼盘";while1("*","fcw_wyts where lpwy like '%".$ts."%' order by xh asc limit 3");while($row1=mysql_fetch_array($res1)){?>
 <li class="l0" id="lpcap<?=$i?>" onMouseOver="lpcapover(<?=$i?>)"><?=$row1[name1]?></li>
 <? $i++;}?>
 </ul>
 
 <div class="lpmain" id="lpmain0">
 <? 
 $i=1;
 while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 5");while($row=mysql_fetch_array($res)){
 $au="loupan/view".$row[id].".html";
 ?>
 <ul class="u2<? if($i==1){?> u21<? }?>">
 <li class="l1">
 <span><a href="<?=$au?>" class="a2"><?=$row[xq]?></a></span>
 <a href="<?=$au?>" class="a1"><img border="0" class="imgsuo" src="<?=weburl?>upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home-1.jpg" width="220" height="150" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong> 元/㎡</li>
 <li class="l3"><?=returnarea(1,$row[areaid])?></li>
 <li class="l4" title="<?=$row[tjly]?>"><?=returntitdian($row[tjly],36)?></li>
 </ul>
 <? $i++;}?>
 </div>

 <? $j=1;$ts="xcf楼盘";while1("*","fcw_wyts where lpwy like '%".$ts."%' order by xh asc limit 3");while($row1=mysql_fetch_array($res1)){?>
 <div class="lpmain" id="lpmain<?=$j?>" style="display:none;">
 <? 
 $i=1;
 $wyts="xcf".$row1[id]."xcf";
 while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 and wytsid like '%".$wyts."%' order by iftj asc limit 5");while($row=mysql_fetch_array($res)){
 $au="loupan/view".$row[id].".html";
 ?>
 <ul class="u2<? if($i==1){?> u21<? }?>">
 <li class="l1">
 <span><a href="<?=$au?>" class="a2"><?=$row[xq]?></a></span>
 <a href="<?=$au?>" class="a1"><img border="0" class="imgsuo" src="<?=weburl?>upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home-1.jpg" width="220" height="150" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong> 元/㎡</li>
 <li class="l3"><?=returnarea(1,$row[areaid])?></li>
 <li class="l4" title="<?=$row[tjly]?>"><?=returntitdian($row[tjly],36)?></li>
 </ul>
 <? $i++;}?>
 </div>
 <? $j++;}?>
 
</div>
<!--焦点楼盘E-->

<? adwhile("ADI10");?>
<!--特惠B-->
<div class="tuang">
 <ul class="ucap">
 <li class="l1">团购</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 10");while($row1=mysql_fetch_array($res1)){?>
 <a href="loupan/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a> /  
 <? }?>
 </li>
 </ul>
 <div class="dleft">
  <ul class="u1">
  <li class="l1 l11" id="tuancap1" onMouseOver="tuanover(1)">热盘推荐</li>
  <li class="l1" id="tuancap2" onMouseOver="tuanover(2)">最新楼盘</li>
  </ul>
  <ul class="u2" id="tuanm1">
  <? while1("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 8");while($row1=mysql_fetch_array($res1)){?>
  <li class="l1"><a href="loupan/view<?=$row1[id]?>.html"><?=$row1[xq]?></a></li>
  <li class="l2"><?=returnjgdw($row1[money1],"元/平","待定")?></li>
  <? }?>
  </ul>
  <ul class="u3" id="tuanm2" style="display:none;">
  <? $i=1;while1("*","fcw_xq where admin=2 and zt=0 order by sj desc limit 8");while($row1=mysql_fetch_array($res1)){?>
  <li class="l1<? if($i % 2==0){?> lh<? }?>"><a href="loupan/view<?=$row1[id]?>.html"><?=$row1[xq]?></a></li>
  <li class="l2<? if($i % 2==0){?> lh<? }?>">[<?=returnarea(1,$row1[areaid])?>]</li>
  <? $i++;}?>
  </ul>
 </div>
 <div class="dcenter">
  <?
  while1("*","fcw_kanfang where zt=0 order by sj desc limit 5");if($row1=mysql_fetch_array($res1)){
  $tpv="upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh].".jpg"
  ?>
  <ul class="u2">
  <li class="l1">
  <span><?=$row1[tit]?></span><a href="loupan/tuanview<?=$row1[id]?>.html"><img border="0" class="imgsuo2" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="415" height="235" /></a>
  </li>
  </ul>
  <? }?>
  <? 
  while($row1=mysql_fetch_array($res1)){
  $tpv="upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh].".jpg"
  ?>
  <ul class="u1">
  <li class="l1">
  <span><?=returnxq($row1[xqbh],"bh")?></span><a href="loupan/tuanview<?=$row1[id]?>.html"><img border="0" class="imgsuo3" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="165" /></a>
  </li>
  </ul>
  <? }?>
 </div>
 <div class="dright">
  <ul class="u1">
  <li class="l1">优惠导购</li>
  <li class="l2"><a href="lpnews/newslist.html">更多</a></li>
  <? 
  while1("*","fcw_xqnews where zt=0 order by sj desc limit 8");while($row1=mysql_fetch_array($res1)){
  while2("*","fcw_xq where bh='".$row1[xqbh]."'");$row2=mysql_fetch_array($res2);
  ?>
  <li class="l3"><a href="loupan/newsview<?=$row1[id]?>.html" title="<?=$row1[tit]?>"><?=strgb2312("[".$row2[xq]."]".$row1[tit],0,40)?></a></li>
  <? }?>
  </ul>
 </div>
 
</div>
<!--特惠E-->

<!--新房B-->
<div class="loupan">
 <ul class="ucap">
 <li class="l1">新房</li>
 <li class="l2"><a href="map/index.php?xs=loupan">地图找房</a></li>
 <li class="l3 l31" id="dlpcap0" onMouseOver="dcenterover(0)">推荐楼盘</li>
 <? $i=1;while1("*","fcw_area where admin=1 order by xh asc limit 6");while($row1=mysql_fetch_array($res1)){?>
 <li class="l3" id="dlpcap<?=$i?>" onMouseOver="dcenterover(<?=$i?>)"><?=$row1[name1]?></li>
 <? $i++;}?>
 <li class="l4"></li>
 </ul>
 <div class="dleft">
 <form name="bf1" method="post" onSubmit="return ibm()">
 <ul class="u1">
 <li class="l1">看房团招募</li>
 <li class="l2">满50人即可免费成团，先到先得！</li>
 <li class="l3"><input type="text" class="fontyh" name="bmname" autocomplete="off" disableautocomplete placeholder="您的姓名" /></li>
 <li class="l3"><input type="text" class="fontyh" name="bmmot" autocomplete="off" disableautocomplete placeholder="您的手机号" /></li>
 <li class="l3"><input type="text" class="fontyh" name="bmlp" id="bmlp" autocomplete="off" disableautocomplete placeholder="输入关键字 选择意向楼盘" /><div id="searchHtml" style="display:none;"></div></li>
 <li class="l4"><input type="submit" class="fontyh" value="求组团"></li>
 </ul>
 </form>
 <script language="javascript">
 $('#bmlp').bind('input propertychange', function() {
  searchCHA();
 });
 </script>
 <!--滚动开始-->
 <div class="gdmain" id="Marquee1">
 <? 
 while1("*","fcw_kanfanguser order by sj desc limit 30");while($row1=mysql_fetch_array($res1)){
 $mot=substr($row1[mot],0,3)."*****".substr($row1[mot],8,3);
 ?>
 <div class="gd"><?=$row1[uname]?>&nbsp;&nbsp;<?=$mot?> 报名看房 <?=returnxq($row1[xqbh],"bh")?> </div>
 <? }?>
 <script>
 var Mar1 = document.getElementById("Marquee1");
 var child_div1=Mar1.getElementsByTagName("div")
 var picH1 = 39;//移动高度
 var scrollstep1=3;//移动步幅,越大越快
 var scrolltime1=40;//移动频度(毫秒)越大越慢
 var stoptime1=2000;//间断时间(毫秒)
 var tmpH1 = 0;
 Mar1.innerHTML += Mar1.innerHTML;
 function start1(){
	if(tmpH1 < picH1){
		tmpH1 += scrollstep1;
		if(tmpH1 > picH1 )tmpH1 = picH1 ;
		Mar1.scrollTop = tmpH1;
		setTimeout(start1,scrolltime1);
	}else{
		tmpH1 = 0;
		Mar1.appendChild(child_div1[0]);
		Mar1.scrollTop = 0;
		setTimeout(start1,stoptime1);
	}
 }
 setTimeout(start1,stoptime1);
 </script>
 </div>
 <!--滚动结束-->
 </div>
 <div class="dcenter" id="dcenter0">
 <? while2("*","fcw_xq where admin=2 and zt=0 and iftj>0 and ifxj=0 order by iftj asc limit 6");while($row2=mysql_fetch_array($res2)){?>
 <ul class="u2">
 <li class="l1">
 <a href="loupan/view<?=$row2[id]?>.html"><img border="0" class="imgsuo1" src="<?=weburl?>upload/<?=returnuserid($row2[uid])?>/f/<?=$row2[bh]?>/home-1.jpg" width="200" height="150" /></a>
 <span><a href="loupan/view<?=$row2[id]?>.html" class="a2"><?=$row2[xq]?></a><a href="loupan/view<?=$row2[id]?>.html" class="a3">[<?=returnarea(1,$row2[areaid])?>]</a></span>
 </li>
 <li class="l2"><strong><?=$row2[money1]?></strong> 元/㎡</li>
 <li class="l3"><a href="loupan/view<?=$row2[id]?>.html">团购</a></li>
 </ul>
 <? }?>
 </div>
 <? $i=1;while1("*","fcw_area where admin=1 order by xh asc limit 6");while($row1=mysql_fetch_array($res1)){?>
 <div class="dcenter" id="dcenter<?=$i?>" style="display:none;">
 <? while2("*","fcw_xq where admin=2 and zt=0 and areaid=".$row1[id]." and ifxj=0 order by xsxh desc limit 6");while($row2=mysql_fetch_array($res2)){?>
 <ul class="u2">
 <li class="l1">
 <a href="loupan/view<?=$row2[id]?>.html"><img border="0" class="imgsuo1" src="<?=weburl?>upload/<?=returnuserid($row2[uid])?>/f/<?=$row2[bh]?>/home-1.jpg" width="200" height="150" /></a>
 <span><a href="loupan/view<?=$row2[id]?>.html" class="a2"><?=$row2[xq]?></a><a href="loupan/view<?=$row2[id]?>.html" class="a3">[<?=returnarea(1,$row2[areaid])?>]</a></span>
 </li>
 <li class="l2"><strong><?=$row2[money1]?></strong> 元/㎡</li>
 <li class="l3"><a href="loupan/view<?=$row2[id]?>.html">团购</a></li>
 </ul>
 <? }?>
 </div>
 <? $i++;}?>
 <div class="dright">
 <ul class="u1"><li class="l1">楼盘问答</li><li class="l2"><a href="feedback/feedbacklist.html">更多</a></li></ul>
 <!--滚动开始-->
 <div class="gdmain" id="Marquee">
  <?
  while1("*","fcw_loupanmsg where zt=0 order by sj desc limit 30");while($row1=mysql_fetch_array($res1)){
  while2("*","fcw_xq where bh='".$row1[xqbh]."'");$row2=mysql_fetch_array($res2);
  ?>
  <div class="gd">
  <table align="left" width="272">
  <tr>
  <td width="60"><img src="<?=weburl?>img/to.jpg" class="wdts" /></td>
  <td valign="middle" width="212" style="line-height:22px;">
  <span class="s1">咨询</span>&nbsp;<a href="loupan/view<?=$row2[id]?>.html" class="feng acy">【<?=$row2[xq]?>】</a><?=returntitdian($row1[txt1],45)?>
  </td>
  </tr>
  </table>
  <table align="left" width="272">
  <tr>
  <td width="60"><img src="<?=weburl?>img/to2.jpg" class="wdts" /></td>
  <td valign="middle" width="212" style="line-height:22px;"><span class="s2">回复</span>&nbsp;<span class="green"><?=returntitdian($row1[txt2],55)?></span></td>
  </tr>
  </table>
  </div>
  <?
  }
  ?>
 <script>
 var Mar = document.getElementById("Marquee");
 var child_div=Mar.getElementsByTagName("div")
 var picH = 130;//移动高度
 var scrollstep=3;//移动步幅,越大越快
 var scrolltime=20;//移动频度(毫秒)越大越慢
 var stoptime=3000;//间断时间(毫秒)
 var tmpH = 0;
 Mar.innerHTML += Mar.innerHTML;
 function start(){
	if(tmpH < picH){
		tmpH += scrollstep;
		if(tmpH > picH )tmpH = picH ;
		Mar.scrollTop = tmpH;
		setTimeout(start,scrolltime);
	}else{
		tmpH = 0;
		Mar.appendChild(child_div[0]);
		Mar.scrollTop = 0;
		setTimeout(start,stoptime);
	}
 }
 setTimeout(start,stoptime);
 </script>
 </div>
 <!--滚动结束-->
 </div>
 
</div>
<!--新房E-->

<? adwhile("ADI14");?>
<!--二手房B-->
<div class="esf">
 <ul class="ucap">
 <li class="l1">二手房</li>
 <li class="l2 l21" id="esf1" onMouseOver="esfover(1)">二手房出售</li>
 <li class="l2" id="esf2" onMouseOver="esfover(2)">二手房出租</li>
 <li class="l2" id="esf3" onMouseOver="esfover(3)">写字楼出售</li>
 <li class="l2" id="esf4" onMouseOver="esfover(4)">写字楼出租</li>
 <li class="l2" id="esf5" onMouseOver="esfover(5)">商铺出售</li>
 <li class="l2" id="esf6" onMouseOver="esfover(6)">商铺出租</li>
 <li class="l3"></li>
 </ul>
 
 <div class="d1">
 <ul class="u1">
 <li class="l1">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 10");while($row1=mysql_fetch_array($res1)){?>
 <a href="second/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a> | 
 <? }?>
 </li>
 <li class="l1">
 <a href="second/search_d1v_e1v.html">一居室</a> | 
 <a href="second/search_d2v_e2v.html">二居室</a> | 
 <a href="second/search_d3v_e3v.html">三居室</a> | 
 <a href="second/search_d4v_e4v.html">四居室</a> | 
 <a href="second/">更多</a>
 </li>
 <li class="l1">
 <? 
 $i=0;$a=preg_split("/,/",$rowcontrol[ESFSELMv]);$ai=count($a);if($ai>5){$ai=5;}for($j=0;$j<=$ai;$j++){
 if(0==$i){$str=$a[0]."万以下";$m1=0;$m2=$a[0];}
 elseif(count($a)==$i){$str=$a[count($a)-1]."万以上";$m1=$a[count($a)-1];$m2=99999;}
 else{$str=$a[$j-1]."-".$a[$j]."万";$m1=$a[$j-1];$m2=$a[$j];}
 ?>
 <a href="second/search_b<?=$m1?>v_c<?=$m2?>v.html"><?=$str?></a> | 
 <? $i++;}?>
 </li>
 <li class="l2"><a href="second/">更多搜索</a></li>
 </ul>
 <ul class="u2">
 <? while0("id,uid,usertype,nc,company,lastsj,sfzrz","fcw_user where usertype=2 and sfzrz=1 order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){?>
 <li class="l1">
 <a href="jjr/view<?=$row[id]?>.html"><img class="tp" src="<?="upload/".$row[id]."/user.jpg"?>" onerror="this.src='user/img/nonetx.gif'" style="margin:0 10px 0 0;" width="70" height="70" border="0" align="left" /></a>
 <a href="jjr/view<?=$row[id]?>.html" class="a1"><?=$row[nc]?></a><br><?=returnzjgs($row[id])?><br>
 出售<strong class="red"><?=returncount("fcw_fang where type1='出售' and ifxj=0 and zt=0 and ifok=0 and uid='".$row[uid]."'")?></strong>套 | 
 出租<strong class="red"><?=returncount("fcw_fang where type1='出租' and ifxj=0 and zt=0 and ifok=0 and uid='".$row[uid]."'")?></strong>套
 </li>
 <? }?>
 <li class="l2"><a href="jjr/jjrlist.html">更多经纪人</a></li>
 </ul>
 </div>
 
 <div class="d2" id="esfmain1">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='出售' and (wylx='公寓' or wylx='住宅') order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="second/view<?=$row[id]?>.html"><img border="0" class="imgsuo1" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="150" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong>万 <?=$row[mj]?>㎡ <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><?=$row[hx1]?>室<?=$row[hx2]?>厅&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>层 <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>
 
 <div class="d2" id="esfmain2" style="display:none;">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='出租' and (wylx='公寓' or wylx='住宅') order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="rent/view<?=$row[id]?>.html"><img border="0" class="imgsuo" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="150" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong><?=$row[jgdw]?> <?=$row[mj]?>㎡ <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><?=$row[hx1]?>室<?=$row[hx2]?>厅&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>层 <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>
 
 <div class="d2" id="esfmain3" style="display:none;">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='出售' and wylx='写字楼' order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="second/view<?=$row[id]?>.html"><img border="0" class="imgsuo" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="150" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong>万 <?=$row[mj]?>㎡ <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><? while1("id,name1","fcw_xzllx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?>&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>层 <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>
 
 <div class="d2" id="esfmain4" style="display:none;">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='出租' and wylx='写字楼' order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="rent/view<?=$row[id]?>.html"><img border="0" class="imgsuo" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="150" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong><?=$row[jgdw]?> <?=$row[mj]?>㎡ <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><? while1("id,name1","fcw_xzllx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?>&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>层 <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>
 
 <div class="d2" id="esfmain5" style="display:none;">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='出售' and wylx='商铺' order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="second/view<?=$row[id]?>.html"><img border="0" class="imgsuo" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="150" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong>万 <?=$row[mj]?>㎡ <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><? while1("id,name1","fcw_splx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?>&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>层 <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>
 
 <div class="d2" id="esfmain6" style="display:none;">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='出租' and wylx='商铺' order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="rent/view<?=$row[id]?>.html"><img border="0" class="imgsuo" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="150" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong><?=$row[jgdw]?> <?=$row[mj]?>㎡ <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><? while1("id,name1","fcw_splx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?>&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>层 <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>

 <div class="d3">
  <div class="ks">
  <a href="reg/" class="a1 acy" target="_blank">用户登录</a>
  <a href="reg/reg.php" class="a2 acy" target="_blank">注册用户</a>
  <a href="user/mianzhuce.php?control=chushou" class="a3 acy" target="_blank">发布出售</a>
  <a href="user/mianzhuce.php?control=chuzu" class="a4 acy" target="_blank">发布出租</a>
  <a href="tool/dkjsq/" class="a6 acy" target="_blank">房贷计算</a>
  <a href="tool/dkjsq/index.php?t=gjj" class="a7 acy" target="_blank">公积金贷款</a>
  <a href="tool/gfnlpg/" class="a5 acy" target="_blank">购房能力</a>
  <a href="tool/tqhdjsq/" class="a8 acy" target="_blank">提前还款</a>
  </div>
  <div class="ad"><? adread("pan_02",280,475)?></div>
 </div>
 
 </div>
<!--二手房E-->

<? adwhile("ADI12");?>
<!--资讯B-->
<div class="inews">
 <ul class="u1">
 <li class="l1">房产资讯</li>
 <li class="l2">
 <? while1("*","fcw_newstype where admin=1 order by xh asc limit 7");while($row1=mysql_fetch_array($res1)){?>
 <a href="news/newslist_j<?=$row1[id]?>v.html" class="acy"><?=$row1[name1]?></a> / 
 <? }?>
 </li>
 </ul>
 <div class="dmain">
 
  <div class="d1">
   <div class="flexslider">
   <ul class="slides">
   <? while1("*","fcw_ad where adbh='pan_04' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <li><a href="<?=$row1[aurl]?>"><img src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="475" height="226" border="0" /></a></li>
   <? }?>
   </ul>
   </div>
  </div>
  
  <div class="d2">
  <? while1("*","fcw_news where zt=0 order by lastsj desc limit 16");if($row1=mysql_fetch_array($res1)){?>
  <a href="news/txtlist_i<?=$row1[id]?>v.html" class="a1" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,40)?></a>
  <? }?>
  <? for($i=1;$i<=6;$i++){if($row1=mysql_fetch_array($res1)){?>
  <a href="news/txtlist_i<?=$row1[id]?>v.html" class="a2 acyn" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,40)?></a>
  <? }}?>
  </div>
  <div class="d3">
  <ul class="du1">
  <li class="l1">楼市动态</li>
  <li class="l2"><a href="news/" class="acyn">更多</a></li>
  <? while($row1=mysql_fetch_array($res1)){?>
  <li class="l3"><a href="news/txtlist_i<?=$row1[id]?>v.html" title="<?=$row1[tit]?>" class="acyn"><?=strgb2312($row1[tit],0,37)?></a></li>
  <? }?>
  </ul>
  </div>
 </div>
 <div class="dad"><? adwhile("pan_03",2)?></div> 
</div>
<!--资讯E-->

<!--小区B-->
<div class="ixq">
 <ul class="ucap">
 <li class="l1" id="xqcap1" onMouseOver="xqover(1)">新房楼盘大全</li>
 <li class="l1" id="xqcap2" onMouseOver="xqover(2)">二手房小区大全</li>
 <li class="l1" id="xqcap3" onMouseOver="xqover(3)">写字楼大全</li>
 <li class="l1" id="xqcap4" onMouseOver="xqover(4)">商铺大全</li>
 <li class="l2"></li>
 </ul>
 
 <div class="xqmain" id="xqmain1" style="display:none;">
 <ul class="u1">
 <? while1("*","fcw_xq where admin=2 and zt=0 and ifxj=0 order by xsxh asc limit 28");while($row1=mysql_fetch_array($res1)){?>
 <li class="l1"><a href="loupan/view<?=$row1[id]?>.html" class="acy"><?=$row1[xq]?></a></li>
 <? }?>
 <li class="l2">
 新房热门区域：
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="loupan/search_j<?=$row1[id]?>v.html" class="acy"><?=$row1[name1]?></a>&nbsp;&nbsp;
 <? }?>
 </li>
 </ul>
 </div>
 
 <div class="xqmain" id="xqmain2" style="display:none;">
 <ul class="u1">
 <? while1("*","fcw_xq where admin=1 and zt=0 and ifxj=0 order by xsxh asc limit 28");while($row1=mysql_fetch_array($res1)){?>
 <li class="l1"><a href="xq/view<?=$row1[id]?>.html" class="acy"><?=$row1[xq]?></a></li>
 <? }?>
 <li class="l2">
 小区热门区域：
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="xq/search_j<?=$row1[id]?>v.html" class="acy"><?=$row1[name1]?></a>&nbsp;&nbsp;
 <? }?>
 </li>
 </ul>
 </div>
 
 <div class="xqmain" id="xqmain3" style="display:none;">
 <ul class="u1">
 <? $wylx="xcf写字楼xcf";while1("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and wylx like '%".$wylx."%' order by xsxh asc limit 28");while($row1=mysql_fetch_array($res1)){?>
 <li class="l1"><a href="loupan/view<?=$row1[id]?>.html" class="acy"><?=$row1[xq]?></a></li>
 <? }?>
 <li class="l2">
 新房热门区域：
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="loupan/search_j<?=$row1[id]?>v.html" class="acy"><?=$row1[name1]?></a>&nbsp;&nbsp;
 <? }?>
 </li>
 </ul>
 </div>
 
 <div class="xqmain" id="xqmain4" style="display:none;">
 <ul class="u1">
 <? $wylx="xcf商铺xcf";while1("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and wylx like '%".$wylx."%' order by xsxh asc limit 28");while($row1=mysql_fetch_array($res1)){?>
 <li class="l1"><a href="loupan/view<?=$row1[id]?>.html" class="acy"><?=$row1[xq]?></a></li>
 <? }?>
 <li class="l2">
 新房热门区域：
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="loupan/search_j<?=$row1[id]?>v.html" class="acy"><?=$row1[name1]?></a>&nbsp;&nbsp;
 <? }?>
 </li>
 </ul>
 </div>
 
</div>
<!--小区E-->

<!--友情链接B-->
<div class="link">
 <ul class="u1">
 <li class="l1">友情链接</li>
 <li class="l2">联系客服QQ申请交换 | <a href="<?=weburl?>" class="acy"><?=webname?></a></li>
 <? while0("*","fcw_ad where adbh='ADI07' and type1='文字' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <li class="l3"><a href="<?=$row[aurl]?>" class="acy"><?=$row[tit]?></a></li>
 <? }?>
 </ul>
</div>
<!--友情链接E-->

</div>

<? include("../../../template/bottom.html");?>
<script language="javascript">
if(document.getElementById("rightcontact")){
document.getElementById("rightcontact").className="contact fontyh disyes";
document.getElementById("righttel").className="tel fontyh disno";
}
</script>

<script language="javascript">
xqover(1);
iqhstart();
$(function(){
	
	$(".dlfixediv a").click(function(){
		$(".dlfixediv").fadeOut(400);
		
	});
	$(".dlfixediv").floatadv();

	$w1 = $('.imgsuo').width();
	$h1 = $('.imgsuo').height();
	$w2 = $w1 + 10;
	$h2 = $h1 + 10;
	$('.imgsuo').hover(function(){
		 $(this).stop().animate({height:$h2,width:$w2,left:"-5px",top:"-5px"},500);
	},function(){
		 $(this).stop().animate({height:$h1,width:$w1,left:"0px",top:"0px"},500);
	});
	
	$w11 = $('.imgsuo1').width();
	$h11 = $('.imgsuo1').height();
	$w21 = $w11 + 10;
	$h21 = $h11 + 10;
	$('.imgsuo1').hover(function(){
		 $(this).stop().animate({height:$h21,width:$w21,left:"-5px",top:"-5px"},500);
	},function(){
		 $(this).stop().animate({height:$h11,width:$w11,left:"0px",top:"0px"},500);
	});
	
	$w12 = $('.imgsuo2').width();
	$h12 = $('.imgsuo2').height();
	$w22 = $w12 + 10;
	$h22 = $h12 + 10;
	$('.imgsuo2').hover(function(){
		 $(this).stop().animate({height:$h22,width:$w22,left:"-5px",top:"-5px"},500);
	},function(){
		 $(this).stop().animate({height:$h12,width:$w12,left:"0px",top:"0px"},500);
	});
	
	$w13 = $('.imgsuo3').width();
	$h13 = $('.imgsuo3').height();
	$w23 = $w13 + 10;
	$h23 = $h13 + 10;
	$('.imgsuo3').hover(function(){
		 $(this).stop().animate({height:$h23,width:$w23,left:"-5px",top:"-5px"},500);
	},function(){
		 $(this).stop().animate({height:$h13,width:$w13,left:"0px",top:"0px"},500);
	});

 $('.flexslider').flexslider({
 controlNav: false
 });
 $('.flexslider2').cxScroll({
 direction: "top",
 step:5 
 });


});

jQuery.fn.floatadv = function(loaded) {
	var obj = this;
	body_height = parseInt($(window).height());
	block_height = parseInt(obj.height());
	
	top_position = parseInt((body_height/2) - (block_height/2) + $(window).scrollTop());
	if (body_height<block_height) { top_position = 0 + $(window).scrollTop(); };
	
	if(!loaded) {
		obj.css({'position': 'absolute'});
		obj.css({ 'top': top_position });
		$(window).bind('resize', function() { 
			obj.floatadv(!loaded);
		});
		$(window).bind('scroll', function() { 
			obj.floatadv(!loaded);
		});
	} else {
		obj.stop();
		obj.css({'position': 'absolute'});
		obj.animate({ 'top': top_position }, 400, 'linear');
	}
}

</script>
</body>
</html>