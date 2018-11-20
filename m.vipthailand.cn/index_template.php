<?
include("config/conn.php");
include("config/function.php");
include("config/loupandef.php");
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
<link href="homeimg/jquery.flexslider.css" rel="stylesheet" type="text/css" >
<link rel="shortcut icon" href="img/favicon.ico" />
<script language="javascript" src="js/basic.js?vt=<?=time()?>"></script>
<script language="javascript" src="js/index.js?vt=<?=time()?>"></script>
<script type ="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="homeimg/jquery.flexslider-min.js"></script>
<? if(empty($rowcontrol[ifwap])){?>
<script language="javascript">
if(is_mobile()) {document.location.href= '<?=weburl?>m/';}
</script>
<? }?>
<base target="_blank">
</head>
<body>

<? 
while1("*","fcw_ad where adbh='ADI01' order by xh asc");while($row1=mysql_fetch_array($res1)){
$tp="ad/".$row1[bh].".".$row1[jpggif];
$image_size= getimagesize($tp);
?>
<div class="topbanner_hj" style="background:url(<?=$tp?>) no-repeat center 0;height:<?=$image_size[1]?>px;"><a href="<?=$row1[aurl]?>" target="_blank"></a></div>
<? }?>

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

<? include("template/top.html");?>
<script language="javascript">
document.getElementById("topa1").className="a1";
</script>

<!--对联广告判断开始-->
<?
while1("*","fcw_ad where adbh='ADDL' order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){
?>
<script language="JavaScript" src="js/dlad.js"></script>
<script language="javascript">
 var theFloaters= new floaters();
 //右面
 theFloaters.addItem('followDiv1','document.body.clientWidth-106',80,'<?=adwhile("ADDL",1)?><span class="dlclo" onclick="dlonc()">关闭</span>');
 //左面
 theFloaters.addItem('followDiv2',6,80,'<?=adwhile("ADDL",1)?><span class="dlclo" onclick="dlonc()">关闭</span>');
 theFloaters.play();
</script>
<?
}
?>
<!--对联广告判断结束-->


<div class="yjcode">

 <!--切换B-->
 
 <div class="imenu">
  
  <div class="sleft">
   <form name="f1" method="post" onSubmit="return tj()">
   <!--楼盘B-->
   <div class="sd" onMouseOver="sdover(19)" onMouseOut="sdout(19)">
   <a href="loupan/" id="la19" class="a1 fontyh">新楼盘</a>
    <div class="smain smain1" id="smain19" style="display:none;">
     <span class="xx"></span>
     <span class="s1">共<strong class="feng"><?=returncount("fcw_xq where admin=2 and zt=0")?></strong>套<?=webarea?>新楼盘 供您选择</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt19" name="fstxt19" /></li>
     <li class="l2 fontyh"><input type="submit" value="找新楼盘" /></li>
     <li class="l3"><a href="map/index.php?xs=loupan" class="red" target="_blank">地图找房</a></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">区域筛选</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="loupan/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u2 u20">
     <li class="l1 l12">价格筛选</li>
     <? 
     $i=0;$a=preg_split("/,/",$rowcontrol[LPSELMv]);for($j=0;$j<=count($a);$j++){
     if(0==$i){$str=$a[0]."元以下";$money1=0;$money2=$a[0];}
     elseif(count($a)==$i){$str=$a[count($a)-1]."元以上";$money1=$a[count($a)-1];$money2=999999;}
     else{$str=$a[$j-1]."-".$a[$j];$money1=$a[$j-1];$money2=$a[$j];}
	 ?>
     <li class="l2 l21"><a href="loupan/search_b<?=$money1?>v_c<?=$money2?>v.html"><?=$str?></a></li>
	 <? $i++;}?>     
     </ul>
     <ul class="u2 u21">
     <li class="l1 l13">热门楼盘</li>
     <? while1("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 12");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="loupan/view<?=$row1[id]?>.html"><?=strgb2312($row1[xq],0,12)?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--楼盘E-->
   <!--二手房B-->
   <div class="sd" onMouseOver="sdover(2)" onMouseOut="sdout(2)">
   <a href="second/" id="la2" class="a1 fontyh">二手房</a>
    <div class="smain smain2" id="smain2" style="display:none;">
     <span class="xx"></span>
     <span class="s1">共<strong class="feng"><?=returncount("fcw_fang where zt=0 and type1='出售' and ifxj=0")?></strong>套<?=webarea?>二手房 供您选择</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt2" name="fstxt2" /></li>
     <li class="l2 fontyh"><input type="submit" value="找二手房" /></li>
     <li class="l3"><a href="map/index.php?xs=second" class="red" target="_blank">地图找房</a></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">区域筛选</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u2 u20">
     <li class="l1 l12">价格筛选</li>
     <? 
     $i=0;$a=preg_split("/,/",$rowcontrol[ESFSELMv]);for($j=0;$j<=count($a);$j++){
     if(0==$i){$str=$a[0]."万以下";$money1=0;$money2=$a[0];}
     elseif(count($a)==$i){$str=$a[count($a)-1]."万以上";$money1=$a[count($a)-1];$money2=999999;}
     else{$str=$a[$j-1]."-".$a[$j]."万";$money1=$a[$j-1];$money2=$a[$j];}
	 ?>
     <li class="l2 l21"><a href="second/search_b<?=$money1?>v_c<?=$money2?>v.html"><?=$str?></a></li>
	 <? $i++;}?>     
     </ul>
     <ul class="u2 u21">
     <li class="l1 l13">热搜标签</li>
     <? $nty="公寓";while1("*","fcw_wyts where cswy like '%".$nty."%' limit 12");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--二手房E-->
   <!--租房B-->
   <div class="sd" onMouseOver="sdover(1)" onMouseOut="sdout(1)">
   <a href="rent/" id="la1" class="a1 fontyh">租房</a>
    <div class="smain smain3" id="smain1" style="display:none;">
     <span class="xx"></span>
     <span class="s1">共<strong class="feng"><?=returncount("fcw_fang where zt=0 and type1='出租' and ifxj=0")?></strong>套<?=webarea?>租房 供您选择</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt1" name="fstxt1" /></li>
     <li class="l2 fontyh"><input type="submit" value="找租房" /></li>
     <li class="l3"><a href="map/index.php?xs=rent" class="red" target="_blank">地图找房</a></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">区域筛选</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="rent/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u2 u20">
     <li class="l1 l12">价格筛选</li>
     <? 
     $i=0;$a=preg_split("/,/",$rowcontrol[ZFSELMv]);for($j=0;$j<=count($a);$j++){
     if(0==$i){$str=$a[0]."元以下";$money1=0;$money2=$a[0];}
     elseif(count($a)==$i){$str=$a[count($a)-1]."元以上";$money1=$a[count($a)-1];$money2=999999;}
     else{$str=$a[$j-1]."-".$a[$j];$money1=$a[$j-1];$money2=$a[$j];}
	 ?>
     <li class="l2 l21"><a href="rent/search_b<?=$money1?>v_c<?=$money2?>v.html"><?=$str?></a></li>
	 <? $i++;}?>     
     </ul>
     <ul class="u2 u21">
     <li class="l1 l13">热搜标签</li>
     <? $nty="公寓";while1("*","fcw_wyts where czwy like '%".$nty."%' limit 12");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="rent/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--租房E-->
   <!--买房团B-->
   <div class="sd" onMouseOver="sdover(16)" onMouseOut="sdout(16)">
   <a href="lptuan/tuanlist.html" id="la16" class="a1 fontyh">买房团</a>
    <div class="smain smain4" id="smain16" style="display:none;">
     <span class="xx"></span>
     <span class="s1">共发起了<strong class="feng"><?=returncount("fcw_kanfang where zt=0")?></strong>次<?=webarea?>看房活动</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt16" name="fstxt16" /></li>
     <li class="l2 fontyh"><input type="submit" value="找活动" /></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">区域筛选</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="lptuan/tuanlist_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u3">
     <li class="l1">正在进行的活动</li>
     <? while1("*","fcw_kanfang where zt=0 and bmzt=0 order by sj desc limit 6");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2">·<a href="loupan/tuanview<?=$row1[id]?>.html" title="<?=$row1[tit]?>">[<?=returnxq($row1[xqbh],"bh")?>] <?=strgb2312($row1[tit],0,50)?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--买房团E-->
   <!--写字楼B-->
   <? $xzlid=returnwylx(2,"写字楼");?>
   <div class="sd" onMouseOver="sdover(17)" onMouseOut="sdout(17)">
   <a href="second/search_f<?=$xzlid?>v.html" id="la17" class="a1 fontyh">写字楼</a>
    <div class="smain smain5" id="smain17" style="display:none;">
     <span class="xx"></span>
     <span class="s1">共<strong class="feng"><?=returncount("fcw_fang where zt=0 and (type1='出售' or type1='出租') and wylx='写字楼' and ifxj=0")?></strong>套<?=webarea?>写字楼 供您选择</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt17" name="fstxt17" /></li>
     <li class="l2 fontyh"><input type="submit" value="找写字楼" /></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">区域筛选</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_a<?=$row1[id]?>v_f<?=$xzlid?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u2 u20">
     <li class="l1 l12">价格筛选</li>
     <? 
     $i=0;$a=preg_split("/,/",$rowcontrol[ESFSELMv]);for($j=0;$j<=count($a);$j++){
     if(0==$i){$str=$a[0]."万以下";$money1=0;$money2=$a[0];}
     elseif(count($a)==$i){$str=$a[count($a)-1]."万以上";$money1=$a[count($a)-1];$money2=999999;}
     else{$str=$a[$j-1]."-".$a[$j]."万";$money1=$a[$j-1];$money2=$a[$j];}
	 ?>
     <li class="l2 l21"><a href="second/search_b<?=$money1?>v_c<?=$money2?>v_f<?=$xzlid?>v.html"><?=$str?></a></li>
	 <? $i++;}?>     
     </ul>
     <ul class="u2 u21">
     <li class="l1 l13">热搜标签</li>
     <? $nty="写字楼";while1("*","fcw_wyts where cswy like '%".$nty."%' limit 12");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_t<?=$row1[id]?>v_f<?=$xzlid?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--写字楼E-->
   <!--商铺B-->
   <? $spid=returnwylx(2,"商铺");?>
   <div class="sd" onMouseOver="sdover(18)" onMouseOut="sdout(18)">
   <a href="second/search_f<?=$spid?>v.html" id="la18" class="a1 fontyh">商铺</a>
    <div class="smain smain6" id="smain18" style="display:none;">
     <span class="xx"></span>
     <span class="s1">共<strong class="feng"><?=returncount("fcw_fang where zt=0 and (type1='出售' or type1='出租') and wylx='商铺' and ifxj=0")?></strong>套<?=webarea?>商铺 供您选择</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt18" name="fstxt18" /></li>
     <li class="l2 fontyh"><input type="submit" value="找商铺" /></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">区域筛选</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_a<?=$row1[id]?>v_f<?=$spid?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u2 u20">
     <li class="l1 l12">价格筛选</li>
     <? 
     $i=0;$a=preg_split("/,/",$rowcontrol[ESFSELMv]);for($j=0;$j<=count($a);$j++){
     if(0==$i){$str=$a[0]."万以下";$money1=0;$money2=$a[0];}
     elseif(count($a)==$i){$str=$a[count($a)-1]."万以上";$money1=$a[count($a)-1];$money2=999999;}
     else{$str=$a[$j-1]."-".$a[$j]."万";$money1=$a[$j-1];$money2=$a[$j];}
	 ?>
     <li class="l2 l21"><a href="second/search_b<?=$money1?>v_c<?=$money2?>v_f<?=$spid?>v.html"><?=$str?></a></li>
	 <? $i++;}?>     
     </ul>
     <ul class="u2 u21">
     <li class="l1 l13">热搜标签</li>
     <? $nty="商铺";while1("*","fcw_wyts where cswy like '%".$nty."%' limit 12");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_t<?=$row1[id]?>v_f<?=$spid?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--商铺E-->
   </form>
  </div>
  
 </div>
 
 <div class="iban1">
  
  <div class="qh">
  <div class="container" id="idTransformView">
  <ul class="slider" id="idSlider">
  <?
  $i=1;
  while1("*","fcw_ad where adbh='ADQH' order by xh asc");while($row1=mysql_fetch_array($res1)){
  ?>
  <li><a href="<?=$row1[aurl]?>"><img src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="830" height="313" border="0" /></a></li>
  <? $i++;}?>
  </ul>
  <span style="display:none" id="qhai"><?=$i-1?></span>
  <ul class="num" id="idNum">
  <? for($j=1;$j<$i;$j++){?><li><?=$j?></li><? }?>
  </ul>
  </div>  
  </div>
  
  <div class="ad"><? adread("ADI02",242,313);?></div>

 </div>
 <!--切换E-->

 <!--楼盘B-->
 <? adwhile("ADI08");?>
 <ul class="indexcap">
 <li class="l1 fontyh"><?=webarea?>楼盘</li>
 <li class="l2"><a href="map/index.php?xs=loupan">地图找房</a> | <a href="loupan/">更多</a></li>
 </ul>
 
 <div class="lp">
  
  <div class="d1">
  <ul class="tjsel">
  <li class="l1" onMouseOver="this.className='l1 l99';" onMouseOut="this.className='l1';">
  <strong>区域找房</strong>
   <div class="sel">
   <div class="xx"></div>
   <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <a href="loupan/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a>&nbsp;
   <? }?>
   </div>
  </li>
  
  <li class="l2" onMouseOver="this.className='l2 l99';" onMouseOut="this.className='l2';">
  <strong>价格找房</strong>
   <div class="sel">
   <div class="xx"></div>
   <? 
   $i=0;$a=preg_split("/,/",$rowcontrol[LPSELMv]);for($j=0;$j<=count($a);$j++){
   if(0==$i){$str=$a[0]."元以下";$money1=0;$money2=$a[0];}
   elseif(count($a)==$i){$str=$a[count($a)-1]."元以上";$money1=$a[count($a)-1];$money2=999999;}
   else{$str=$a[$j-1]."-".$a[$j];$money1=$a[$j-1];$money2=$a[$j];}
   ?>
   <a href="loupan/search_b<?=$money1?>v_c<?=$money2?>v.html"><?=$str?></a>&nbsp;
   <? $i++;}?>
   </div>
  </li>

  <li class="l3" onMouseOver="this.className='l3 l99';" onMouseOut="this.className='l3';">
  <strong>类型找房</strong>
   <div class="sel">
   <div class="xx"></div>
   <?
   $xsv=",loupan,";
   while1("id,name2,xh,ifuse","fcw_wylx where ifuse='on' and xs like '%".$xsv."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
   ?>
   <a href="loupan/search_f<?=$row1[id]?>v.html"><?=$row1[name2]?></a>&nbsp;
   <? }?>
   </div>
  </li>

  <li class="l4" onMouseOver="this.className='l4 l99';" onMouseOut="this.className='l4';">
  <strong>特色找房</strong>
   <div class="sel">
   <div class="xx"></div>
   <? $nty="楼盘";while1("*","fcw_wyts where lpwy like '%".$nty."%'");while($row1=mysql_fetch_array($res1)){?>
   <a href="loupan/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a>&nbsp;
   <? }?>     
   </div>
  </li>

  </ul>
  <div class="ad"><? adread("ADI17",233,140)?></div>
  <ul class="u1">
  <? while0("*","fcw_xqnews where zt=0 order by sj desc limit 8");while($row=mysql_fetch_array($res)){?>
  <li>·<a href="loupan/newsview<?=$row[id]?>.html" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,37)?></a></li>
  <? }?>
  </ul>
  
  </div>
  
  <div class="d2">
   <span class="cap fontyh">热门楼盘</span>
   <?
   while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 15");for($i=1;$i<=3;$i++){if($row=mysql_fetch_array($res)){
   $au="loupan/view".$row[id].".html";
   ?>
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>"><img border="0" src="upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home.jpg" width="203" height="120" /></a></li>
   <li class="l2"><a href="<?=$au?>" title="<?=$row[xq]?>"><?=strgb2312($row[xq],0,15)?></a></li>
   <li class="l3"><?=returnarea(1,$row[areaid])?> <span class="feng"><?=returnjgdw($row[money1],"元/㎡","价格待定")?></span></li>
   </ul>
   <? }}?>
   <div class="d21">
   <? 
   for($i=4;$i<=9;$i++){if($row=mysql_fetch_array($res)){
   $tpv="upload/".returnuserid($row[uid])."/f/".$row[bh]."/home.jpg";
   $au="loupan/view".$row[id].".html";
   ?>
   <ul class="u21" onClick="gourl('<?=$au?>');" id="lpu<?=$i?>" onMouseOver="lpover(4,9,<?=$i?>)"><li class="l1"><?=$row[xq]?></li><li class="l2"><?=returnarea(1,$row[areaid])?></li><li class="l3"><?=returnjgdw($row[money1],"元/㎡","价格待定")?></li></ul>
   <div class="dt" style="display:none;" id="lpd<?=$i?>">
   <a href="<?=$au?>"><img border="0" src="<?=returntppd($tpv,"img/none100x75.jpg")?>" width="100" height="75" align="left" /></a>
   <span class="s1"><a href="<?=$au?>"><?=$row[xq]?></a><br><?=returnarea(1,$row[areaid])?> <span class="feng"><?=returnjgdw($row[money1],"元/㎡","价格待定")?></span></span>
   </div>
   <? }}?>
   </div>
   <div class="d21">
   <? 
   $i=10;while($row=mysql_fetch_array($res)){
   $tpv="upload/".returnuserid($row[uid])."/f/".$row[bh]."/home.jpg";
   $au="loupan/view".$row[id].".html";
   ?>
   <ul class="u21" onClick="gourl('<?=$au?>');" id="lpu<?=$i?>" onMouseOver="lpover(10,15,<?=$i?>)"><li class="l1"><?=$row[xq]?></li><li class="l2"><?=returnarea(1,$row[areaid])?></li><li class="l3"><?=returnjgdw($row[money1],"元/㎡","价格待定")?></li></ul>
   <div class="dt" style="display:none;" id="lpd<?=$i?>">
   <a href="<?=$au?>"><img border="0" src="<?=returntppd($tpv,"img/none100x75.jpg")?>" width="100" height="75" align="left" /></a>
   <span class="s1"><a href="<?=$au?>"><?=$row[xq]?></a><br><?=returnarea(1,$row[areaid])?> <span class="feng"><?=returnjgdw($row[money1],"元/㎡","价格待定")?></span></span>
   </div>
   <? $i++;}?>
   <script language="javascript">lpover(4,9,4);lpover(10,15,10);</script>
   </div>

  </div>
  
  <div class="hotlp">
  <ul class="u1">
  <li class="l1 fontyh">关注度排行</li>
  <li class="l2 fontyh"><a href="loupan/">新房中心</a></li>
  <li class="l3">楼盘名称</li>
  <li class="l4">关注次数</li>
  </ul>
  <? 
  $i=1;
  while1("*","fcw_xq where admin=2 and zt=0 and ifxj=0 order by djl desc limit 13");while($row1=mysql_fetch_array($res1)){
  ?>
  <ul class="u2">
  <li class="l1"><span class="s<?=$i?>"><?=$i?></span></li>
  <li class="l2"><a href="loupan/view<?=$row1[id]?>.html"><?=$row1[xq]?> (<?=returnarea(1,$row1[areaid])?>)</a></li>
  <li class="l3"><?=$row1[djl]?></li>
  </ul>
  <? $i++;}?>
  </div>
 
 </div>
 <!--楼盘E-->


 <!--特价房B-->
 <? adwhile("ADI09");?>
 <ul class="indexcap">
 <li class="l1 fontyh">特价房</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <a href="lptj/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?>特价房</a> | 
 <? }?> <a href="lptj/search.html">更多</a>
 </li>
 </ul>
 <div class="lptj fontyh">
 <? $i=1;while1("*","fcw_tejia where zt=0 order by sj desc limit 8");while($row1=mysql_fetch_array($res1)){?>
 <ul class="u1<? if($i % 4==0){?> u0<? }?>">
 <li class="l1"><span><?=returnxq($row1[xqbh],"bh")?> (<?=returnarea(1,$row1[areaid])?>)</span><a href="lptj/view<?=$row1[id]?>.html"><img border="0" src="<?=returntp("bh='".$row1[bh]."'","-1")?>" width="282" height="180" /></a></li>
 <li class="l2"><?=$row1[hx1]?>室<?=$row1[hx2]?>厅<?=$row1[mj]?>㎡</li>
 <li class="l3"><?=$row1[zj1]?>万</li>
 <li class="l4"><?=strgb2312($row1[fh],0,20)?></li>
 <li class="l5"><s><?=$row1[zj]?>万</s></li>
 </ul>
 <? $i++;}?>
 </div>
 <!--特价房E-->

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
 <li class="l1"><a href="loupan/fxview<?=$row[id]?>.html"><img border="0" src="upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home.jpg" width="220" height="150" /></a></li>
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

 <!--资讯B-->
 <? adwhile("ADI12");?>
 <ul class="indexcap1 fontyh">
 <li class="l1 fontyh"><?=webarea?>资讯</li>
 <li class="l2">
 <? $tyarr=array();$w=954;$i=1;while1("*","fcw_newstype where admin=1 order by xh asc limit 4");while($row1=mysql_fetch_array($res1)){?>
 <a href="news/newslist_j<?=$row1[id]?>v.html" onMouseOver="inewsover(<?=$i?>)" id="inewa<?=$i?>"><?=$row1[name1]?></a>
 <? $tyarr[$i-1]=$row1[id];$w=$w-96;$i++;}?>
 </li>
 <li class="l3" style="width:<?=$w?>px;"><a href="news/">更多</a></li>
 </ul>

 <div class="news">
 
  <ul class="u1">
  <?
  while0("*","fcw_news where zt=0 and iftp=1 order by lastsj desc limit 3");if($row=mysql_fetch_array($res)){
  $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
  ?>
  <li class="l1"><a href="news/txtlist_i<?=$row[id]?>v.html"><img src="<?=$tp?>" width="242" height="180" border="0" /></a><a href="news/txtlist_i<?=$row[id]?>v.html" class="a1"><?=strgb2312($row[tit],0,32)?></a></li>
  <? }?>
  <? while($row=mysql_fetch_array($res)){$tp="../".returntp("bh='".$row[bh]."' order by xh asc","-1");?>
  <li class="l2">
  <a href="news/txtlist_i<?=$row[id]?>v.html"><img src="<?=$tp?>" width="73" height="54" border="0" align="left" /></a>
  <a href="news/txtlist_i<?=$row[id]?>v.html" class="a1"><?=strgb2312($row[tit],0,60)?></a>
  </li>
  <? }?>
  </ul>
  
  <? for($i=0;$i<count($tyarr);$i++){?>
  <ul class="u2" id="inewm<?=$i+1?>" style="display:none;">
  <?
  $tyid=$tyarr[$i];
  while0("*","fcw_news where zt=0 and type1id=".$tyid." order by lastsj desc limit 11");if($row=mysql_fetch_array($res)){
  ?>
  <li class="l1 fontyh"><a href="news/txtlist_i<?=$row[id]?>v.html" title="<?=$row[tit]?>" class="feng"><?=returntitcss(returntitdian($row[tit],40),$row[ifjc],$row[titys])?></a></li>
  <? }?>
  <? while($row=mysql_fetch_array($res)){?>
  <li class="l2">[<?=dateYMD($row[lastsj])?>] <a href="news/txtlist_i<?=$row[id]?>v.html" title="<?=$row[tit]?>"><?=returntitcss(strgb2312($row[tit],0,45),$row[ifjc],$row[titys])?></a></li>
  <? }?>
  </ul>
  <? }?>
  <span id="newsnum" style="display:none"><?=$i?></span>
  <script language="javascript">inewsover(1);</script>
  
  <ul class="u3">
  <li class="l1 fontyh">楼盘优惠</li>
  <? while0("*","fcw_xqnews where zt=0 order by sj desc limit 10");while($row=mysql_fetch_array($res)){?>
  <li class="l2">[<?=dateYMD($row[sj])?>] <a href="loupan/newsview<?=$row[id]?>.html" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,37)?></a></li>
  <? }?>
  </ul>
 
 </div>
 <!--资讯E-->

 <!--户型B-->
 <? adwhile("ADI13");?>
 <ul class="indexcap">
 <li class="l1 fontyh">楼盘户型</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <a href="lphuxing/huxinglist_a<?=$row1[id]?>v.html"><?=$row1[name1]?>户型</a> | 
 <? }?> <a href="lphuxing/huxinglist.html">更多</a>
 </li>
 </ul>
 <div class="hx">
  <div class="hxs">
  <ul class="u1">
  <li class="cap"><strong>价格</strong></li>
  <li class="l3">
  <a href="javascript:void(0);" target="_self" class="jg" id="leftjg1" onClick="jgonc(1)">50万以下</a>
  <a href="javascript:void(0);" target="_self" class="jg" id="leftjg2" onClick="jgonc(2)">50-80万</a>
  <a href="javascript:void(0);" target="_self" class="jg" id="leftjg3" onClick="jgonc(3)">80万以上</a>
  </li>
  <li class="cap"><strong>类型</strong></li>
  <li class="l1">
  <? $i=1;while1("*","fcw_fwlc order by xh asc limit 2");while($row1=mysql_fetch_array($res1)){if($i==1){$lcv=$row1[id];}?>
  <a href="javascript:void(0);" target="_self" class="lc<?=$i?>" id="leftlc<?=$i?>" onClick="lcsonc(<?=$i?>,<?=$row1[id]?>)"><?=$row1[name1]?></a>
  <? $i++;}?>
  <? $i=1;while1("*","fcw_zxqk order by xh asc limit 2");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" target="_self" class="zx<?=$i?>" id="leftzx<?=$i?>" onClick="zxsonc(<?=$i?>,<?=$row1[id]?>)"><?=$row1[name1]?></a>
  <? $i++;}?>
  </li>
  <li class="cap"><strong>户型</strong></li>
  <li class="l1">
  <a href="javascript:hxsonc(1)" target="_self" class="hx1" id="lefthx1">一室</a>
  <a href="javascript:hxsonc(2)" target="_self" class="hx2" id="lefthx2">二室</a>
  <a href="javascript:hxsonc(3)" target="_self" class="hx3" id="lefthx3">三室</a>
  <a href="javascript:hxsonc(4)" target="_self" class="hx4" id="lefthx4">四室</a>
  </li>
  <li class="l2"><input type="button" onClick="hxsearch()" value="立即筛选"></li>
  </ul>
  </div>
  
  <div class="d1">
   <?
   while0("*","fcw_huxing where zt=0 and iftj>0 order by iftj asc limit 6");while($row=mysql_fetch_array($res)){
   $tpv="upload/".returnuserid($row[uid])."/f/".$row[xqbh]."/".$row[bh]."-1.jpg";
   $au="loupan/huxingview".$row[id].".html";
   ?>
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>"><img border="0" src="<?=returntppd($tpv,"img/none200x150.jpg")?>" width="190" height="120" /></a></li>
   <li class="l2"><a href="<?=$au?>"><?=returnxq($row[xqbh],"bh")?></a></li>
   <li class="l3"><?=returnjgdw($row[hx1],"室","")?><?=returnjgdw($row[hx2],"厅","")?>&nbsp;&nbsp;<?=$row[mj]?>㎡&nbsp;&nbsp;<span class="feng"><?=returnjgdw($row[money1],"万","价格待定")?></span></li>
   </ul>
   <? }?>
  </div>
  
  <!--滚动开始-->
  <ul class="wd">
  <li class="l1">售楼处在线咨询</li>
  <li class="l2"><a href="feedback/feedbacklist.html">更多咨询</a></li>
  </ul>
  <div class="igdleft" id="Marquee1">
  <?
  while1("*","fcw_loupanmsg where zt=0 order by sj desc limit 30");while($row1=mysql_fetch_array($res1)){
  while2("id,bh","fcw_xq where bh='".$row1[xqbh]."'");$row2=mysql_fetch_array($res2);
  $xq=returnxq($row1[xqbh],"bh");
  ?>
  <div class="gd">
  <table align="left" width="237">
  <tr>
  <td valign="middle" width="237" style="line-height:22px;">
  【<?=strgb2312(returnjgdw($row1[uname],"","匿名用户"),0,10)?> 咨询 <a title="<?=$xq?>" href="loupan/view<?=$row2[id]?>.html" class="feng"><?=strgb2312($xq,0,15)?></a>】<br>
  <span class="s1">咨询</span>&nbsp;<?=returntitdian($row1[txt1],66)?>
  </td>
  </tr>
  </table>
  <table align="left" width="237">
  <tr>
  <td valign="middle" width="237" style="line-height:22px;"><span class="s2">回复</span>&nbsp;<span class="green"><?=returntitdian($row1[txt2],66)?></span></td>
  </tr>
  </table>
  </div>
  <? }?>
  <script>
    var Mar1 = document.getElementById("Marquee1");
    var child_div1=Mar1.getElementsByTagName("div")
    var picH1 = 130;//移动高度
    var scrollstep1=3;//移动步幅,越大越快
    var scrolltime1=20;//移动频度(毫秒)越大越慢
    var stoptime1=3000;//间断时间(毫秒)
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
		setTimeout(start1,stoptime);
	}
    }
  </script>
  </div>
  <!--滚动结束-->
  
 </div>
 <!--户型E-->

 <!--二手房B-->
 <? adwhile("ADI14");?>
 <ul class="indexcap">
 <li class="l1 fontyh"><?=webarea?>二手房</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <a href="second/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a> | 
 <? }?> <a href="second/">更多</a>
 </li>
 </ul>
 <div class="esf">
 
  <ul class="zjad">
  <? 
  $i=1;
  while0("id,uid,usertype,company,indexpm","fcw_user where usertype=4 and indexpm>0 order by indexpm asc limit 12");while($row=mysql_fetch_array($res)){
  $tp="upload/".$row[id]."/shop.jpg";
  ?>
  <li><a href="zj/view<?=$row[id]?>.html"><? if(is_file($tp)){?><img border="0" src="<?=$tp?>" width="114" height="60" /><? }else{?><span><?=$row[company]?></span><? }?></a></li>
  <? $i++;}?>
  <? for($j=$i;$j<=12;$j++){?>
  <li><span>虚位以待</span></li>
  <? }?>
  </ul>
  
  <div class="d1">
   <?
   while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='出售' order by sj desc limit 10");while($row=mysql_fetch_array($res)){
   $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
   $au="second/view".$row[id].".html";
   ?>
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>"><img border="0" src="<?=returntppd($tpv,"img/none100x75.jpg")?>" width="160" height="120" /></a></li>
   <li class="l2"><a href="<?=$au?>" title="<?=$row[xq]?>"><?=strgb2312($row[xq],0,15)?></a></li>
   <li class="l3"><?=returnarea(1,$row[areaid])?>&nbsp;<?=$row[mj]?>㎡&nbsp;<?=returnjgdw($row[hx1],"室","")?><?=returnjgdw($row[hx2],"厅","")?>&nbsp;<span class="feng"><?=returnjgdw($row[money1],"万","")?></span></li>
   </ul>
   <? }?>
  </div>
 
 </div>
 <!--二手房E-->

 <!--租房B-->
 <? adwhile("ADI15");?>
 <ul class="indexcap">
 <li class="l1 fontyh"><?=webarea?>租房</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <a href="rent/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?>租房</a> | 
 <? }?> <a href="rent/">更多</a>
 </li>
 </ul>
 
 <div class="izf">
 
  <div class="qy">
  <? 
  while2("*","fcw_area where admin=2 order by xh asc limit 24");while($row2=mysql_fetch_array($res2)){
  while1("*","fcw_area where admin=1 and name1='".$row2[name1]."'");$row1=mysql_fetch_array($res1);
  ?>
  <a href="rent/search_a<?=$row1[id]?>v_o<?=$row2[id]?>v.html"><?=$row2[name2]?></a>
  <? }?>
  </div>
  
  <div class="d1">
   <? 
   while1("*","fcw_fang where zt=0 and ifxj=0 and type1='出租' and xq<>'' order by sj desc limit 20");for($i=1;$i<=10;$i++){if($row1=mysql_fetch_array($res1)){
   $tpv=returntp("bh='".$row1[bh]."' order by iffm desc limit 1","-1");
   $au="rent/view".$row1[id].".html";
   ?>
   <ul class="u1" onClick="gourl('<?=$au?>');" id="zfu<?=$i?>" onMouseOver="zfover(1,10,<?=$i?>)"><li class="l1"><?=strgb2312($row1[xq],0,12)?></li><li class="l2"><?=returnarea(1,$row1[areaid])?></li><li class="l3"><?=$row1[hx1]?>室<?=$row1[hx2]?>厅</li><li class="l4"><?=$row1[money1].$row1[jgdw]?></li></ul>
   <div class="dt" style="display:none;" id="zfd<?=$i?>">
   <a href="<?=$au?>"><img border="0" src="<?=returntppd($tpv,"img/none100x75.jpg")?>" width="100" height="75" align="left" /></a>
   <span class="s1"><a href="<?=$au?>"><?=$row1[xq]?></a><br><?=returnarea(1,$row1[areaid])?> <span class="feng"><?=$row1[money1].$row1[jgdw]?></span></span>
   </div>
   <? }}?>
  </div>
  
  <div class="d1">
   <? 
   $i=11;
   while($row1=mysql_fetch_array($res1)){
   $tpv=returntp("bh='".$row1[bh]."' order by iffm desc limit 1","-1");
   $au="rent/view".$row1[id].".html";
   ?>
   <ul class="u1" onClick="gourl('<?=$au?>');" id="zfu<?=$i?>" onMouseOver="zfover(11,20,<?=$i?>)"><li class="l1"><?=strgb2312($row1[xq],0,12)?></li><li class="l2"><?=returnarea(1,$row1[areaid])?></li><li class="l3"><?=$row1[hx1]?>室<?=$row1[hx2]?>厅</li><li class="l4"><?=$row1[money1].$row1[jgdw]?></li></ul>
   <div class="dt" style="display:none;" id="zfd<?=$i?>">
   <a href="<?=$au?>"><img border="0" src="<?=returntppd($tpv,"img/none100x75.jpg")?>" width="100" height="75" align="left" /></a>
   <span class="s1"><a href="<?=$au?>"><?=$row1[xq]?></a><br><?=returnarea(1,$row1[areaid])?> <span class="feng"><?=$row1[money1].$row1[jgdw]?></span></span>
   </div>
   <? $i++;}?>
   <script language="javascript">zfover(1,10,1);zfover(11,<?=$i?>,11);</script>
  </div>
  
  <div class="tju">
   <ul class="u1">
   <? 
   while0("id,uid,usertype,nc,company,lastsj,sfzrz","fcw_user where usertype=2 and sfzrz=1 order by indexpm asc limit 3");while($row=mysql_fetch_array($res)){
   $au="jjr/view".$row[id].".html";
   ?>
   <li class="l1">
   <a href="<?=$au?>"><img class="tp" src="upload/<?=$row[id]?>/user.jpg" width="77" height="77" border="0" align="left" /></a>
   <span class="s1"><a href="<?=$au?>" class="a1"><?=$row[nc]?></a><br><?=$row[company]?></span>
   <span class="s2 ss"><?=returncount("fcw_fang where type1='出售' and ifxj=0 and zt=0 and ifok=0 and uid='".$row[uid]."'")?>套</span>
   <span class="s2 sz"><?=returncount("fcw_fang where type1='出租' and ifxj=0 and zt=0 and ifok=0 and uid='".$row[uid]."'")?>套</span>
   </li>
   <? }?>
   </ul>
  </div>
  
 </div>
 <!--租房E-->

 <? if(1==$rowcontrol[ifjia]){?>
 <!--装修B-->
 <? adwhile("ADI16");?>
 <ul class="indexcap">
 <li class="l1 fontyh"><?=webarea?>装修</li>
 <li class="l2">
 <a href="<?=weburl?>jc/">家装</a> | 
 <a href="<?=weburl?>zx/xzxlist.html">学装修</a> | 
 <a href="<?=weburl?>designer/caselist.html">看案例</a> | 
 <a href="<?=weburl?>zx/zbview.html">发招标</a> | 
 <a href="<?=weburl?>zx/">找公司</a> | 
 <a href="<?=weburl?>designer/">设计师</a> | 
 <a href="<?=weburl?>jc/">选建材</a>
 </li>
 </ul>
 <div class="indexzx">
 
  <!--左边B-->
  <div class="d1">
   <form name="zxf" method="post" target="_blank" onSubmit="return zxtj()">
   <ul class="u1">
   <li class="cap">免费设计</li>
   <li class="l1">10秒登记，免费获取3份专业设计方案</li>
   <li class="l2"><input class="inp" name="t1" size="30" onFocus="t1focus()" onBlur="t1blur()" value="您的称呼" type="text" /></li>
   <li class="l2"><input class="inp" name="t2" size="30" onFocus="t2focus()" onBlur="t2blur()" value="您的电话" type="text" /></li>
   <li class="l2">
   
   
 <div class="areaqy1" style="margin:7px 0 0 0;">
 <select name="area1" id="area1" class="inp1" onChange="areacha()">
 <option value="0">未选择</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[py]." - ".$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2" id="fareas" style="display:none;margin:5px 0 0 0;">
 <input type="hidden" id="area2" name="area2" value="0" />
 <iframe name="fareas" id="fareas" height="33" width="160" border="0" frameborder="0" src="config/areas.php"></iframe>
 <script language="javascript">areacha();</script>
 </div>
    
   </li>
   <li class="l4"><input type="text" class="inp" size="8" name="t3" onFocus="t3focus()" onBlur="t3blur()" value="验证码" /> <img height="32" class="yz" src="config/yzSes.php" /></li>
   <li class="l3"><? tjbtnr("提交申请")?></li>
   </ul>
   </form>
   
   <div class="gdmain2" id="Marquee2">
   <!--滚动开始-->
   <? 
   while1("*","fcw_jia_zb order by sj desc limit 30");while($row1=mysql_fetch_array($res1)){
   $mot=substr($row1[mot],0,3)."*****".substr($row1[mot],8,3);
   ?>
   <div class="gd"><?=dateYMDHM($row1[sj])?> <?=strgb2312($row1[lxr],0,2)?>**&nbsp;<?=$mot?></div>
   <? }?>
   <script>
   var Mar2 = document.getElementById("Marquee2");
   var child_div2=Mar2.getElementsByTagName("div")
   var picH2 = 39;//移动高度
   var scrollstep2=3;//移动步幅,越大越快
   var scrolltime2=40;//移动频度(毫秒)越大越慢
   var stoptime2=2000;//间断时间(毫秒)
   var tmpH2 = 0;
   Mar2.innerHTML += Mar2.innerHTML;
   function start2(){
	if(tmpH2 < picH2){
		tmpH2 += scrollstep2;
		if(tmpH2 > picH2 )tmpH2 = picH2;
		Mar2.scrollTop = tmpH2;
		setTimeout(start2,scrolltime2);
	}else{
		tmpH2 = 0;
		Mar2.appendChild(child_div2[0]);
		Mar2.scrollTop = 0;
		setTimeout(start2,stoptime2);
	}
   }
   setTimeout(start2,stoptime2);
   </script>
   <!--滚动结束-->
   </div>

  </div>
  <!--左边E-->
 
  <!--中间B-->
  <div class="d2">
   <div class="zxqh">
   <div class="flexslider">
   <ul class="slides">
   <? while1("*","fcw_ad where adbh='defaultI01' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <li><a href="<?=$row1[aurl]?>"><img src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="720" height="280" border="0" /></a></li>
   <? }?>
   </ul>
   </div>
   </div>
   <div class="zxad"><? adwhile("defaultI02",3)?></div>
  </div>
<script type="text/javascript">
var showcase_pos = 0, showcase_cnt = 8;
var showcase_len, showcase_arr=new Array();
$(function(){
 showcase_len = $("#showcase li").length;
 $("#showcase li").each(function(i,e){
 showcase_arr.push($(e).html());
 });
 if(showcase_arr.length>8){
 setInterval(showcase_scroll, 4000);
 }
 $('.flexslider').flexslider({
 controlNav: false
 });
 $('.flexslider2').cxScroll({
 direction: "top",
 step:5 
 });
});
</script>
  <!--中间E-->
  
  <!--右侧B-->
  <div class="d3"><? adread("defaultI03",208,387)?></div>
  <!--右侧E-->
  
 </div>
 <!--装修E-->
 <? }?>

 <!--友情B-->
 <div class="bolink">
 <ul class="u1">
 <li class="l1 fontyh"><?=webname?>合作伙伴</li>
 <li class="l2">
 <? while0("*","fcw_ad where adbh='ADI06' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>"><img alt="<?=$row[tit]?>" border=0 src="ad/<?=$row[bh]?>.<?=$row[jpggif]?>" width="100" height="35"></a>
 <? }?>
 </li>
 </ul>
 <ul class="u1">
 <li class="l1 fontyh"><?=webname?>友情链接</li>
 <li class="l3">
 <? while0("*","fcw_ad where adbh='ADI07' and type1='文字' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>"><?=$row[tit]?></a>
 <? }?>
 </li>
 </ul>
 </div>
 <!--友情E-->

</div>

<? include("template/bottom.html");?>
</body>
</html>