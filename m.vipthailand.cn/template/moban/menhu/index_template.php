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
<link href="homeimg/jquery.flexslider.css" rel="stylesheet" type="text/css" >
<script language="javascript" src="js/basic.js?vt=<?=time()?>"></script>
<script language="javascript" src="js/index.js?vt=<?=time()?>"></script>
<script type ="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="homeimg/jquery.flexslider-min.js"></script>
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

<!--��������жϿ�ʼ-->
<?
while1("*","fcw_ad where adbh='ADDL' order by xh asc");if($row1=mysql_fetch_array($res1)){
?>
<script language="JavaScript" src="js/dlad.js"></script>
<script language="javascript">
 var theFloaters= new floaters();
 //����
 theFloaters.addItem('followDiv1','document.body.clientWidth-106',80,'<div class="ad1"><a href="<?=$row1[aurl]?>" target=_blank><img border=0 src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>"></a></div><span class="dlclo" onclick="dlonc()">�ر�</span>');
 //����
 <? $row1=mysql_fetch_array($res1)?>
 theFloaters.addItem('followDiv2',6,80,'<div class="ad1"><a href="<?=$row1[aurl]?>" target=_blank><img border=0 src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>"></a></div><span class="dlclo" onclick="dlonc()">�ر�</span>');
 theFloaters.play();
</script>
<?
}
?>
<!--��������жϽ���-->

<? include("../../../template/top.html");?>

<div class="yjcode">

<? adwhile("menhu_ADI12");?>
<div class="ilad"><? adread("menhu_ADI05",165,125);?></div>
<!--������ʼ-->
<form name="formsearch" method="post" onSubmit="return fseaonc()">
<input type="hidden" id="fsarea" name="fsarea" />
<input type="hidden" id="fsmoney1" name="fsmoney1" />
<input type="hidden" id="fsmoney2" name="fsmoney2" />
<input type="hidden" id="fswylx" name="fswylx" />
<div class="isearch">
 <ul class="scap fontyh">
 <li class="l1" id="scap1" onMouseOver="scapover(1)">�� ��</li>
 <li class="l0" id="scap2" onMouseOver="scapover(2)">���ַ�</li>
 <li class="l0" id="scap3" onMouseOver="scapover(3)">�ⷿ</li>
 <li class="l0" id="scap4" onMouseOver="scapover(4)">������</li>
 <li class="l0"><a href="map/index.php?xs=loupan" target="_blank">��ͼ�ҷ�</a></li>
 </ul>
 <!--�·���ʼ-->
 <div class="kuang" id="kuang1">
 <ul class="ssk">
 <li class="l1" onMouseOver="kuover(1)" onMouseOut="kuout(1)">
  <span id="nowx1" class="k1">ѡ������</span>
  <div class="nowlist" id="nowlist1" style="display:none;">
  <? while1("id,name1,admin,xh","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" target="_self" onClick="nowlistonc(1,'<?=$row1[name1]?>','fsarea',<?=$row1[id]?>,'','')"><?=$row1[name1]?></a>
  <? }?>
  </div>
 </li>
 
 <li class="l1" onMouseOver="kuover(2)" onMouseOut="kuout(2)">
  <span id="nowx2" class="k1">ѡ����ҵ</span>
  <div class="nowlist" id="nowlist2" style="display:none;">
  <? while1("id,name2,xh,ifuse","fcw_wylx where ifuse='on' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" target="_self" onClick="nowlistonc(2,'<?=$row1[name2]?>','fswylx',<?=$row1[id]?>,'','')"><?=$row1[name2]?></a>
  <? }?>
  </div>
 </li>
 
 <li class="l1" onMouseOver="kuover(3)" onMouseOut="kuout(3)">
  <span id="nowx3" class="k1">ѡ��۸�</span>
  <div class="nowlist" id="nowlist3" style="display:none;">
  <? 
  $i=0;$a=preg_split("/,/",$rowcontrol[LPSELMv]);for($j=0;$j<=count($a);$j++){
  if(0==$i){$str=$a[0]."Ԫ����";$money1=0;$money2=$a[0];}
  elseif(count($a)==$i){$str=$a[count($a)-1]."Ԫ����";$money1=$a[count($a)-1];$money2=999999;}
  else{$str=$a[$j-1]."-".$a[$j];$money1=$a[$j-1];$money2=$a[$j];}
  ?>
  <a href="javascript:void(0);" target="_self" onClick="nowlistonc(3,'<?=$str?>','fsmoney1',<?=$money1?>,'fsmoney2',<?=$money2?>)"><?=$str?></a>
  <? $i++;}?>
  </div>
 </li>
 
 <li class="l2"><input type="text" name="fstxt15" style="width:397px;" /></li>
 <li class="l3"><input type="image" src="homeimg/search.gif" width="68" height="32" /></li>
 
 </ul>
 <div class="tj">
  <strong class="red">����������</strong>
  <? while1("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 4");while($row1=mysql_fetch_array($res1)){?>
  <a class="a1" href="loupan/view<?=$row1[id]?>.html"><?=$row1[xq]?></a>
  <? }?>
 </div>
 </div>
 <!--�·�����-->

 <!--���ַ���ʼ-->
 <div class="kuang" id="kuang2" style="display:none;">
 <ul class="ssk">
 <li class="l1" onMouseOver="kuover(4)" onMouseOut="kuout(4)">
  <span id="nowx4" class="k1">ѡ������</span>
  <div class="nowlist" id="nowlist4" style="display:none;">
  <? while1("id,name1,admin,xh","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" target="_self" onClick="nowlistonc(4,'<?=$row1[name1]?>','fsarea',<?=$row1[id]?>,'','')"><?=$row1[name1]?></a>
  <? }?>
  </div>
 </li>
 
 <li class="l1" onMouseOver="kuover(5)" onMouseOut="kuout(5)">
  <span id="nowx5" class="k1">ѡ����ҵ</span>
  <div class="nowlist" id="nowlist5" style="display:none;">
  <? while1("id,name2,xh,ifuse","fcw_wylx where ifuse='on' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" target="_self" onClick="nowlistonc(5,'<?=$row1[name2]?>','fswylx',<?=$row1[id]?>,'','')"><?=$row1[name2]?></a>
  <? }?>
  </div>
 </li>
 
 <li class="l1" onMouseOver="kuover(6)" onMouseOut="kuout(6)">
  <span id="nowx6" class="k1">ѡ��۸�</span>
  <div class="nowlist" id="nowlist6" style="display:none;">
  <? 
  $i=0;$a=preg_split("/,/",$rowcontrol[ESFSELMv]);for($j=0;$j<=count($a);$j++){
  if(0==$i){$str=$a[0]."������";$money1=0;$money2=$a[0];}
  elseif(count($a)==$i){$str=$a[count($a)-1]."������";$money1=$a[count($a)-1];$money2=999999;}
  else{$str=$a[$j-1]."-".$a[$j]."��";$money1=$a[$j-1];$money2=$a[$j];}
  ?>
  <a href="javascript:void(0);" target="_self" onClick="nowlistonc(6,'<?=$str?>','fsmoney1',<?=$money1?>,'fsmoney2',<?=$money2?>)"><?=$str?></a>
  <? $i++;}?>
  </div>
 </li>
 
 <li class="l2"><input type="text" name="fstxt2" style="width:397px;" /></li>
 <li class="l3"><input type="image" src="homeimg/search.gif" width="68" height="32" /></li>
 
 </ul>
 <div class="tj">
  <strong class="red">����������</strong>
  <?
  $nty="��Ԣ";
  while1("*","fcw_wyts where cswy like '%".$nty."%' limit 7");while($row1=mysql_fetch_array($res1)){
  ?>
  <a href="second/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
  <? }?>
 </div>
 </div>
 <!--���ַ�����-->

 <!--�ⷿ��ʼ-->
 <div class="kuang" id="kuang3" style="display:none;">
 <ul class="ssk">
 <li class="l1" onMouseOver="kuover(7)" onMouseOut="kuout(7)">
  <span id="nowx7" class="k1">ѡ������</span>
  <div class="nowlist" id="nowlist7" style="display:none;">
  <? while1("id,name1,admin,xh","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" target="_self" onClick="nowlistonc(7,'<?=$row1[name1]?>','fsarea',<?=$row1[id]?>,'','')"><?=$row1[name1]?></a>
  <? }?>
  </div>
 </li>
 
 <li class="l1" onMouseOver="kuover(8)" onMouseOut="kuout(8)">
  <span id="nowx8" class="k1">ѡ����ҵ</span>
  <div class="nowlist" id="nowlist8" style="display:none;">
  <? while1("id,name2,xh,ifuse","fcw_wylx where ifuse='on' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" target="_self" onClick="nowlistonc(8,'<?=$row1[name2]?>','fswylx',<?=$row1[id]?>,'','')"><?=$row1[name2]?></a>
  <? }?>
  </div>
 </li>
 
 <li class="l1" onMouseOver="kuover(9)" onMouseOut="kuout(9)">
  <span id="nowx9" class="k1">ѡ�����</span>
  <div class="nowlist" id="nowlist9" style="display:none;">
  <? 
  $i=0;$a=preg_split("/,/",$rowcontrol[ZFSELMv]);for($j=0;$j<=count($a);$j++){
  if(0==$i){$str=$a[0]."Ԫ����";$money1=0;$money2=$a[0];}
  elseif(count($a)==$i){$str=$a[count($a)-1]."Ԫ����";$money1=$a[count($a)-1];$money2=999999;}
  else{$str=$a[$j-1]."-".$a[$j];$money1=$a[$j-1];$money2=$a[$j];}
  ?>
  <a href="javascript:void(0);" target="_self" onClick="nowlistonc(9,'<?=$str?>','fsmoney1',<?=$money1?>,'fsmoney2',<?=$money2?>)"><?=$str?></a>
  <? $i++;}?>
  </div>
 </li>
 
 <li class="l2"><input type="text" name="fstxt1" style="width:397px;" /></li>
 <li class="l3"><input type="image" src="homeimg/search.gif" width="68" height="32" /></li>
 
 </ul>
 <div class="tj">
  <strong class="red">���ű�ǩ��</strong>
  <?
  $nty="��Ԣ";
  while1("*","fcw_wyts where czwy like '%".$nty."%' limit 7");while($row1=mysql_fetch_array($res1)){
  ?>
  <a href="rent/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
  <? }?>
 </div>
 </div>
 <!--�ⷿ����-->

 <!--�����˿�ʼ-->
 <div class="kuang" id="kuang4" style="display:none;">
 <ul class="ssk">
 <li class="l2"><input type="text" name="fstxt9" style="width:745px;" /></li>
 <li class="l3"><input type="image" src="homeimg/search.gif" width="68" height="32" /></li>
 
 </ul>
 <div class="tj">
  <strong class="red">���ű�ǩ��</strong>
  <?
  while1("id,usertype,nc,lastsj,sfzrz","fcw_user where usertype=2 and sfzrz=1 order by lastsj desc limit 6");while($row1=mysql_fetch_array($res1)){
  ?>
  <a href="jjr/view<?=$row1[id]?>.html"><?=$row1[nc]?></a>
  <? }?>
 </div>
 </div>
 <!--�����˽���-->
 
</div>
</form>
<!--���������-->
<div class="ilad"><? adread("menhu_ADI06",165,125);?></div>

<!--���Ĺ��B-->
<div class="rwad">
<div class="dleft">
<div class="d1">
<?
while1("*","fcw_ad where adbh='menhu_ADI04' order by xh desc limit 18");
for($i=1;$i<=5;$i++){
if($row1=mysql_fetch_array($res1)){
?>
<a href="<?=$row1[aurl]?>" title="<?=$row1[tit]?>" target="_blank"><?=strgb2312($row1[tit],0,25)?></a><br>
<? }}?>
</div>
<ul class="u1">
<?
for($i=1;$i<=4;$i++){
if($row1=mysql_fetch_array($res1)){
?>
<li><a href="<?=$row1[aurl]?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,27)?></a><br></li>
<? }}?>
</ul>
<div class="ad"><? adread("menhu_ADI03",830,70)?></div>
<ul class="u2">
<?
for($i=1;$i<=4;$i++){
if($row1=mysql_fetch_array($res1)){
?>
<li><a href="<?=$row1[aurl]?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,27)?></a><br></li>
<? }}?>
</ul>
</div>
<div class="d1">
<? while($row1=mysql_fetch_array($res1)){?>
<a href="<?=$row1[aurl]?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,25)?></a><br>
<? }?>
</div>
</div>
<!--���Ĺ��E-->

<? adwhile("menhu_ADI10");?>
<!--��ѶB-->
<ul class="indexcap">
<li class="l1 fontyh">������Ѷ</li>
<li class="l2">
<a href="news/" target="_blank">������Ѷ</a>
<?
while0("*","fcw_newstype where admin=1 order by xh asc");while($row=mysql_fetch_array($res)){
?>
 | <a href="news/newslist_j<?=$row[id]?>v.html" target="_blank"><?=$row[name1]?></a>
<? }?>
</li>
</ul>
<?
$jdnewty=array(0,0,0,0);$i=0;
while1("*","fcw_newstype where admin=1 order by xh asc limit 1");$row1=mysql_fetch_array($res1);$newsid1=$row1[id];
while2("*","fcw_newstype where admin=2 and name1='".$row1[name1]."' order by xh asc limit 4");while($row2=mysql_fetch_array($res2)){
$newsid2arr[$i]=$row2[id];
$i++;
}
?>
<div class="inews">
 <? while1("*","fcw_news where indextop=1 and zt=0 order by lastsj desc limit 1");if($row1=mysql_fetch_array($res1)){?>
 <h2 class="fontyh"><a href="news/txtlist_i<?=$row1[id]?>v.html" title="<?=$row1[tit]?>" target="_blank"><?=strgb2312($row1[tit],0,68)?></a></h2>
 <? }?>
 
 <div class="nleft1">
  <div class="qh">
  <div class="container" id="idTransformView">
  <ul class="slider" id="idSlider">
  <?
  $i=1;
  $qhtit=array();
  $qhurl=array();
  while3("*","fcw_ad where adbh='menhu_ADI09' order by xh asc");while($row3=mysql_fetch_array($res3)){
  $qhtit[$i]=$row3[tit];
  $qhurl[$i]=$row3[aurl];
  ?>
  <li><a href="<?=$row3[aurl]?>" target="_blank"><img alt="<?=$row3[tit]?>" src="<?="ad/".$row3[bh].".".$row3[jpggif]?>" width="270" height="173" border="0" /></a></li>
  <? $i++;}?>
  </ul>
  <span style="display:none" id="qhai"><?=$i-1?></span>
  <ul class="num" id="idNum">
  <? for($j=1;$j<$i;$j++){?><li><?=$j?></li><? }?>
  </ul>
  </div> 
  </div>
  <? if($newsid2arr[0]!=0){?>
  <ul class="u2">
  <li class="l1 fontyh"><?=returnnewstype(2,$newsid2arr[0])?></li>
  <li class="l2"><a href="news/newslist_j<?=$newsid1?>v_k<?=$newsid2arr[0]?>v.html" target="_blank">����</a></li>
  <? 
  while1("*","fcw_news where zt=0 and iftj=1 and type1id=".$newsid1." and type2id=".$newsid2arr[0]." order by lastsj desc limit 11");
  while($row1=mysql_fetch_array($res1)){
  ?>
  <li class="l3"><span>��<a href="news/txtlist_i<?=$row1[id]?>v.html" target="_blank" title="<?=$row1[tit]?>"><?=returntitcss($row1[tit],$row1[ifjc],$row1[titys],40)?></a></span></li>
  <? }?>
  </ul>
  <? }?>
 </div>
   
 <? if($newsid2arr[1]!=0){?>
 <div class="nleft2">
  <ul class="u1">
  <li class="l1 fontyh"><?=returnnewstype(2,$newsid2arr[1])?></li>
  <li class="l2"><a href="news/newslist_j<?=$newsid1?>v_k<?=$newsid2arr[1]?>v.html" target="_blank">����</a></li>
  </ul>
  <? 
  while0("*","fcw_news where zt=0 and iftj=1 and type1id=".$newsid1." and type2id=".$newsid2arr[1]." order by lastsj desc limit 5");while($row=mysql_fetch_array($res)){
  ?>
  <ul class="u2">
  <li class="l1 fontyh">
  <? $z=130;if(1==$row[iftp]){$z=90;?>
  <a href="news/txtlist_i<?=$row[id]?>v.html" target="_blank"><img src="<?=returntp("bh='".$row[bh]."'","-1")?>" border="0" width="100" height="70" align="right" /></a>
  <? }?>
  <a href="news/txtlist_i<?=$row[id]?>v.html" target="_blank" title="<?=$row[tit]?>"><?=returntitcss($row[tit],$row[ifjc],$row[titys],46)?></a>
  <br><?=returntitdian($row[wdes],$z)?>
  </li>
  </ul>
  <? }?>
 </div>
 <? }?>
  
 <div class="nright">
  <? if($newsid2arr[2]!=0){?>
  <ul class="ban1y">
  <li class="l1 fontyh"><?=returnnewstype(2,$newsid2arr[2])?></li>
  <li class="l2"><a href="news/newslist_j<?=$newsid1?>v_k<?=$newsid2arr[2]?>v.html" target="_blank">����</a></li>
  <? 
  while1("*","fcw_news where zt=0 and iftj=1 and type1id=".$newsid1." and type2id=".$newsid2arr[2]." order by lastsj desc limit 6");
  while($row1=mysql_fetch_array($res1)){
  ?>
  <li class="l3">
  ��<a href="news/txtlist_i<?=$row1[id]?>v.html" target="_blank" title="<?=$row1[tit]?>"><?=returntitcss($row1[tit],$row1[ifjc],$row1[titys],42)?></a>
  </li>
  <? }?>
  </ul>
  <? }?>
  <? if($newsid2arr[3]!=0){?>
  <ul class="ban1y">
  <li class="l1 fontyh"><?=returnnewstype(2,$newsid2arr[3])?></li>
  <li class="l2"><a href="news/newslist_j<?=$newsid1?>v_k<?=$newsid2arr[3]?>v.html" target="_blank">����</a></li>
  <? 
  while1("*","fcw_news where zt=0 and iftj=1 and type1id=".$newsid1." and type2id=".$newsid2arr[3]." order by lastsj desc limit 12");
  while($row1=mysql_fetch_array($res1)){
  ?>
  <li class="l3">
  ��<a href="news/txtlist_i<?=$row1[id]?>v.html" target="_blank" title="<?=$row1[tit]?>"><?=returntitcss($row1[tit],$row1[ifjc],$row1[titys],42)?></a>
  </li>
  <? }?>
  </ul>
  <? }?>
 </div>
</div>
<!--��ѶE-->

<? adwhile("menhu_ADI10");?>
<!--�·�B-->
<ul class="indexcap">
<li class="l1 fontyh">�·��Ż�</li>
<li class="l2">
<a href="loupan/">�·���ҳ</a> | 
<a href="lphuxing/huxinglist.html">���ʹ�ȫ</a> | 
<a href="lpnews/newslist.html">¥���Ż�</a> | 
<a href="lpphoto/photolist.html">ͼ��</a> | 
<a href="feedback/feedbacklist.html">������ѯ</a> | 
<a href="lptuan/tuanlist.html">�����Ź�</a> | 
<a href="map/index.php?xs=loupan" target="_blank">��ͼ�ҷ�</a>
</li>
</ul>
<div class="lpyh">
 <div class="d1">
 <? adwhile("menhu_ADI02",2);?>
 <div class="cap"><?=webarea?>��Ʒ¥��<span class="feng">������¥��</span></div>
 <div class="lp" onMouseOver="this.className='lp lp1';" onMouseOut="this.className='lp';">
  <ul class="u1">
  <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <li class="l1"><?=$row1[name1]?></li>
  <li class="l2">
  <? while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 and areaid=".$row1[id]." order by iftj asc limit 14");while($row=mysql_fetch_array($res)){?>
  <a href="loupan/view<?=$row[id]?>.html" target="_blank"><?=$row[xq]?></a>&nbsp;&nbsp;
  <? }?>
  </li>
  <? }?>
  </ul>
 </div>
 </div>

  <div class="d2">
  <? 
  while0("*","fcw_xqnews where zt=0 order by sj desc limit 70");
  for($i=1;$i<=7;$i++){
  if($row=mysql_fetch_array($res)){
  ?>
  <ul class="u2">
  <li class="l1 fontyh">
  <a href="loupan/newsview<?=$row[id]?>.html" title="<?=$row[tit]?>"><?=returntitcss($row[tit],$row[ifjc],$row[titys],58)?></a>
  <br><?=returntitdian($row[wdes],130)?></li>
  </ul>
  <? }}?>
  <ul class="u3">
  <li class="l1 fontyh">
  <? if($row=mysql_fetch_array($res)){?><a href="loupan/newsview<?=$row[id]?>.html"><?=returntitcss($row[tit],$row[ifjc],$row[titys],58)?></a><? }?>
  </li>
  <li class="l2">
  <? 
  for($i=1;$i<=6;$i++){
  if($row=mysql_fetch_array($res)){
  ?>
  <a href="loupan/newsview<?=$row[id]?>.html" title="<?=$row[tit]?>"><?=returntitcss($row[tit],$row[ifjc],$row[titys],41)?></a>
  <? if($i % 2==0){echo "<br>";}else{echo " | ";}?>
  <? }}?>
  </li>
  </ul>
  <ul class="u3">
  <li class="l1 fontyh">
  <? if($row=mysql_fetch_array($res)){?><a href="loupan/newsview<?=$row[id]?>.html"><?=returntitcss($row[tit],$row[ifjc],$row[titys],56)?></a><? }?>
  </li>
  <li class="l2">
  <? 
  for($i=1;$i<=4;$i++){
  if($row=mysql_fetch_array($res)){
  ?>
  <a href="loupan/newsview<?=$row[id]?>.html" title="<?=$row[tit]?>"><?=returntitcss($row[tit],$row[ifjc],$row[titys],40)?></a>
  <? if($i % 2==0){echo "<br>";}else{echo " | ";}?>
  <? }}?>
  </li>
  </ul>
  </div>
   
  <div class="d3">
  <ul class="u1 u11">
  <li class="l1 fontyh">¥����Ƶ</li>
  <li class="l2"><a href="lpvideo/videolist.html">����</a></li>
  </ul>
  <ul class="video">
  <li class="l1">
  <?
  $pid=0;
  while1("id,uid,xqbh,bh,tit,zt,indextj","fcw_xqvideo where zt=0 and indextj=1 limit 1");if($row1=mysql_fetch_array($res1)){
  $au="loupan/videoview".$row1[id].".html";
  $pid=$row1[id];
  ?>
  <a href="<?=$au?>" target="_blank" class="a1" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,26)?></a>
  <a href="<?=$au?>" target="_blank"><img border="0" src="upload/<?=returnuserid($row1[uid])?>/f/<?=$row1[xqbh]?>/<?=$row1[bh]?>.jpg" width="270" height="188" /></a>
  <? }?>
  <li class="l2">
  <? 	$i=1;while1("id,uid,xqbh,bh,tit,zt","fcw_xqvideo where zt=0 and id<>".$pid." order by sj desc limit 4");while($row1=mysql_fetch_array($res1)){?>
  <a href="loupan/videoview<?=$row1[id]?>.html" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,20)?></a><? if($i % 2==0){echo "<br>";}else{echo " | ";}?>
  <? $i++;}?>
  </li>
  </li>
  </ul>
  <ul class="u1 u11">
  <li class="l1 fontyh">�������</li>
  <li class="l2"><a href="loupan/" target="_blank">����</a></li>
  </ul>
  <ul class="u2">
  <? $i=1;while1("*","fcw_xq where admin=2 and zt=0 and ifxj=0 order by sj desc limit 8");while($row1=mysql_fetch_array($res1)){?>
  <li class="l1"><span><?=$i?></span></li>
  <li class="l2"><a href="loupan/view<?=$row1[id]?>.html" target="_blank" title="<?=$row1[xq]?>"><?=strgb2312($row1[xq],0,20)?></a></li>
  <li class="l3"><?=returnjgdw($row1[money1],"Ԫ/�O","δ����")?></li>
  <li class="l4"><a href="loupan/tuanlist_i<?=$row1[id]?>v.html" target="_blank">�Ź�</a></li>
  <? $i++;}?>
  </ul>
  <ul class="u1 u11">
  <li class="l1 fontyh">¥�ж�̬</li>
  <li class="l2"><a href="lpnews/newslist.html" target="_blank">����</a></li>
  </ul>
  <!--������ʼ-->
  <div class="dtgd" id="Marquee1">
  <? 
  while($row=mysql_fetch_array($res)){
  while1("bh,xq","fcw_xq where bh='".$row[xqbh]."'");$row1=mysql_fetch_array($res1);
  ?>
  <div class="gd">
  <ul class="u3">
  <li class="l1"><a href="loupan/view<?=$row1[id]?>.html" target="_blank"><?=$row1[xq]?></a></li>
  <li class="l2"><?=dateYMD($row[sj])?> ����</li>
  <li class="l3 fontyh"><a href="loupan/newsview<?=$row[id]?>.html" target="_blank"><?=returntitcss(strgb2312($row[tit],0,80),$row[ifjc],$row[titys])?></a></li>
  </ul>
  </div>
  <? }?>
  </div>
  <script>
  var Mar1 = document.getElementById("Marquee1");
  var child_div1=Mar1.getElementsByTagName("div")
  var picH1 = 64;//�ƶ��߶�
  var scrollstep1=4;//�ƶ�����,Խ��Խ��
  var scrolltime1=30;//�ƶ�Ƶ��(����)Խ��Խ��
  var stoptime1=3000;//���ʱ��(����)
  var tmpH1 = 0;
  Mar1.innerHTML += Mar1.innerHTML;
  function start1(){
  if(tmpH1 < picH1){
	tmpH1 += scrollstep1;
	if(tmpH1 > picH1 )tmpH1 = picH1;
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
  <!--��������-->
 </div>
 
</div>
<!--�·�E-->

<? adwhile("ADI08");?>
<!--¥��B-->
<ul class="indexcap">
<li class="l1 fontyh"><?=webarea?>¥��</li>
<li class="l2">
<span><a href="tool/dkjsq/" target="_blank">���������</a></span>
<span><a href="tool/dkjsq/index.php?t=gjj" target="_blank">���������</a></span>
<span><a href="tool/tqhdjsq/" target="_blank">��ǰ����</a></span>
<span><a href="tool/gfnlpg/" target="_blank">������������</a></span>
<span><a href="dai/" target="_blank">���ڴ���</a></span>
</li>
</ul>
<div class="loupan">
 <? $i=1;while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 12");while($row=mysql_fetch_array($res)){?>
 <ul class="u1"><li class="l1"><a target="_blank" href="loupan/view<?=$row[id]?>.html"><img border="0" src="upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home.jpg" width="166" height="90" /></a></li><li class="l2"><a target="_blank" href="loupan/view<?=$row[id]?>.html" title="<?=$row[xq]?>"><?=strgb2312($row[xq],0,15)?></a></li><li class="l3"><?=returnjgdw($row[money1],"Ԫ","�۸����")?></li></ul>
 <? }?>
 <ul class="u2">
 <li class="l1 fontyh"><?=webname?>��¥�̴�ȫ</li>
 <li class="l2 fontyh">
 <? $i=1;while1("*","fcw_area where admin=1 order by xh asc limit 8");while($row1=mysql_fetch_array($res1)){?>
 <a onMouseOver="loupanaover(<?=$i?>)" id="loupana<?=$i?>" href="loupan/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
 <? $i++;}?>
 </li>
 </ul>
 <? $i=1;while1("*","fcw_area where admin=1 order by xh asc limit 8");while($row1=mysql_fetch_array($res1)){?>
 <ul id="loupanu<?=$i?>" class="u3" style="display:none;">
 <? while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and areaid=".$row1[id]." order by sj desc limit 14");while($row=mysql_fetch_array($res)){?>
 <li class="l1"><span class="s1"><a href="loupan/view<?=$row[id]?>.html" target="_blank" title="<?=$row[xq]?>"><?=strgb2312($row[xq],0,15)?></a></span><span class="s2"><a href="loupan/tuanlist_i<?=$row[id]?>v.html" target="_blank">����</a></span></li>
 <? }?>
 </ul>
 <? $i++;}?>
 <span id="loupanaall" style="display:none;"><?=$i?></span>
 <ul class="u4">
 <li class="l1 fontyh">�Ƽ�¥��</li>
 <li class="l2 fontyh"><a href="loupan/" target="_blank">�·�����</a></li>
 <li class="l3">¥������</li>
 <li class="l4">��ע����</li>
 <li class="l5">�Ź�</li>
 <? $i=1;while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 9");while($row=mysql_fetch_array($res)){?>
 <li class="l30"><span><?=$i?></span></li>
 <li class="l31"><a href="loupan/view<?=$row[id]?>.html" target="_blank"><?=$row[xq]?></a></li>
 <li class="l41"><?=$row[djl]?></li>
 <li class="l51"><a href="loupan/tuanlist_i<?=$row[id]?>v.html" target="_blank">����</a></li>
 <? $i++;}?>
 </ul>
 <ul class="u4">
 <li class="l1 fontyh">��ע������</li>
 <li class="l2 fontyh"><a href="loupan/" target="_blank">�·�����</a></li>
 <li class="l3">¥������</li>
 <li class="l4">��ע����</li>
 <li class="l5">�Ź�</li>
 <? $i=1;while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 order by djl desc limit 9");while($row=mysql_fetch_array($res)){?>
 <li class="l30"><span><?=$i?></span></li>
 <li class="l31"><a href="loupan/view<?=$row[id]?>.html" target="_blank"><?=$row[xq]?></a></li>
 <li class="l41"><?=$row[djl]?></li>
 <li class="l51"><a href="loupan/tuanlist_i<?=$row[id]?>v.html" target="_blank">����</a></li>
 <? $i++;}?>
 </ul>
 <ul class="u4 u41">
 <li class="l1 fontyh">�������</li>
 <li class="l2 fontyh"><a href="loupan/">�·�����</a></li>
 <li class="l3">¥������</li>
 <li class="l4">��ע����</li>
 <li class="l5">�Ź�</li>
 <? $i=1;while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 order by sj desc limit 9");while($row=mysql_fetch_array($res)){?>
 <li class="l30"><span><?=$i?></span></li>
 <li class="l31"><a href="loupan/view<?=$row[id]?>.html" target="_blank" title="<?=$row[xq]?>"><?=strgb2312($row[xq],0,26)?></a></li>
 <li class="l41"><?=$row[djl]?></li>
 <li class="l51"><a href="loupan/tuanlist_i<?=$row[id]?>v.html" target="_blank">����</a></li>
 <? $i++;}?>
 </ul>
</div>
<script language="javascript">
loupanaover(1);
</script>
<!--¥��E-->

<!--��ҵB-->
<? 
$wy1id=returnwylx(2,"����");
$wy2id=returnwylx(2,"д��¥");
$wy1=returnwylx(4,"����");
$wy2=returnwylx(4,"д��¥");
while1("*","fcw_newstype where admin=1 order by xh asc limit 2");$row1=mysql_fetch_array($res1);$row1=mysql_fetch_array($res1);$newsid2=$row1[id];$newsty2=$row1[name1];
?>
<ul class="indexcap">
<li class="l1 fontyh"><?=webarea?>��ҵ</li>
<li class="l2">
<a href="loupan/search_f<?=$wy1id?>v.html"><?=$wy1?></a> | 
<a href="loupan/search_f<?=$wy2id?>v.html"><?=$wy2?></a> | 
<a href="second/search_f<?=$wy1id?>v.html"><?=$wy1?>����</a> | 
<a href="second/search_f<?=$wy2id?>v.html"><?=$wy2?>����</a> | 
<a href="rent/search_f<?=$wy1id?>v.html"><?=$wy1?>����</a> | 
<a href="second/search_f<?=$wy2id?>v.html"><?=$wy2?>����</a>
</li>
</ul>
<div class="isy">

 <div class="sy1">
 <ul class="u1">
 <? 
 if($newsid2!=0){
 $tid=0;
 while2("*","fcw_newstype where admin=2 and name1='".$newsty2."' order by xh asc");$row2=mysql_fetch_array($res2);
 ?>
 <li class="l1 fontyh"><?=$row2[name2]?></li>
 <li class="l2"><a href="news/newslist_j<?=$newsid2?>v_k<?=$row2[id]?>v.html">����</a></li>
 <?
 while0("*","fcw_news where type1id=".$newsid2." and type2id=".$row2[id]." and zt=0 and iftj=1 and iftp=1 order by lastsj desc limit 1");
 if($row=mysql_fetch_array($res)){
 $tid=$row[id];
 $au="news/txtlist_i".$row[id]."v.html";
 ?>
 <li class="l3"><a href="<?=$au?>" target="_blank"><img src="<?=returntp("bh='".$row[bh]."'","-1")?>" border="0" width="120" height="80" /></a></li>
 <li class="l4"><?=returntitdian($row[wdes],75)?>��<a href="<?=$au?>" target="_blank">��ϸ</a>��</li>
 <?
 }
 while0("*","fcw_news where type1id=".$newsid2." and type2id=".$row2[id]." and zt=0 and iftj=1 and id<>".$tid." order by lastsj desc limit 5");
 while($row=mysql_fetch_array($res)){
 ?>
 <li class="l5">��<a href="news/txtlist_i<?=$row[id]?>v.html" title="<?=$row[tit]?>"><?=returntitcss(strgb2312($row[tit],0,35),$row[ifjc],$row[titys])?></a></li>
 <? }}?>
 <li class="l6"><? adread("menhu_ADI13","270","100")?></li>
 </ul>
 </div>
 
 <?
 if($row2=mysql_fetch_array($res2)){
 while0("*","fcw_news where type1id=".$newsid2." and type2id=".$row2[id]." and zt=0 and iftj=1 order by lastsj desc limit 4");
 ?>
 <div class="sy2">
 <ul class="u1">
 <? while($row=mysql_fetch_array($res)){?>
 <li class="l1">
 <a href="news/txtlist_i<?=$row[id]?>v.html" class="a1" target="_blank"><?=returntitcss(strgb2312($row[tit],0,55),$row[ifjc],$row[titys])?></a><br>
 <? $z=130;if(1==$row[iftp]){$z=100;?>
 <a href="news/txtlist_i<?=$row[id]?>v.html"><img src="<?=returntp("bh='".$row[bh]."'","-1")?>" border="0" width="60" height="45" align="right" /></a>
 <? }?>
 <?=returntitdian($row[wdes],$z)?>
 </li>
 <? }?>
 </ul>
 </div>
 <? }?>
 
 <div class="sy3">
 <ul class="u1">
 <li class="l1 fontyh" id="indexsyc1" onMouseOver="indexsyover(1)">�Ƽ�����</li>
 <li class="l0 fontyh" id="indexsyc2" onMouseOver="indexsyover(2)">�Ƽ�д��¥</li>
 </ul>
 <div id="indexsy1" class="indexsy">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and wylx='����' and type1='����' and iftj>0 order by iftj asc limit 4");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 $au="second/view".$row[id].".html";
 ?>
 <ul class="u2">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="100" height="60" /></a></li>
 <li class="l2"><a href="<?=$au?>" target="_blank"><?=$row[xq]?></a><br>�ο��ۣ�<strong class="feng"><?=returnjgdw($row[money1],"��","����")?></strong><br>����<?=returnarea(1,$row[areaid])?> <?=returnarea(2,$row[areaids])?></li>
 </ul>
 <? }?>
 </div>
 <div id="indexsy2" style="display:none;" class="indexsy">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and wylx='д��¥' and type1='����' and iftj>0 order by iftj limit 4");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 $au="second/view".$row[id].".html";
 ?>
 <ul class="u2">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="100" height="60" /></a></li>
 <li class="l2"><a href="<?=$au?>" target="_blank"><?=$row[xq]?></a><br>�ο��ۣ�<strong class="feng"><?=returnjgdw($row[money1],"��","����")?></strong><br>����<?=returnarea(1,$row[areaid])?> <?=returnarea(2,$row[areaids])?></li>
 </ul>
 <? }?>
 </div>
 </div>
 
</div>
<!--��ҵE-->

<? adwhile("ADI14");?>
<!--����B-->
<ul class="indexcap">
<li class="l1 fontyh"><?=webarea?>���ַ�</li>
<li class="l2">
<a href="second/" target="_blank">����</a> | 
<a href="rent/" target="_blank">����</a> | 
<a href="qiugou/" target="_blank">��</a> | 
<a href="qiuzu/" target="_blank">����</a> | 
<a href="jjr/jjrlist.html" target="_blank">������</a> | 
<a href="zj/zjlist.html" target="_blank">�н鹫˾</a> | 
<a href="user/" target="_blank">��Ա����</a> | 
<a href="reg/reg.php" target="_blank">ע���Ա</a>
</li>
</ul>
<div class="esf">
 <ul class="fkad">
 <? while0("id,uid,usertype,indexpm","fcw_user where usertype=4 and indexpm>0 order by indexpm asc");while($row=mysql_fetch_array($res)){?>
 <li class="l1"><a href="zj/view<?=$row[id]?>.html" target="_blank"><img border="0" src="upload/<?=$row[id]?>/shop.jpg" width="147" height="73" /></a></li>
 <? }?>
 </ul>
 <div class="es1">
 <ul class="u1">
 <li class="l1"><a href="second/" target="_blank"><?=webarea?>�۷�</a></li>
 <li class="l1"><a href="rent/" target="_blank"><?=webarea?>�ⷿ</a></li>
 <li class="l1"><a href="user/chushoulx.php" target="_blank">��������</a></li>
 <li class="l1"><a href="user/chuzulx.php" target="_blank">��������</a></li>
 <li class="l1"><a href="user/qiugoulx.php" target="_blank">��Ҫ����</a></li>
 <li class="l1"><a href="user/qiuzulx.php" target="_blank">��Ҫ�ⷿ</a></li>
 <li class="l2"><a href="user/" target="_blank"><img border="0" src="homeimg/user.jpg" width="217" height="40" /></a></li>
 </ul>
 <ul class="u2">
 <li class="l1 fontyh">��ԾVIP������</li>
 <li class="l2"><a href="jjr/jjrlist.html" target="_blank">���ྭ����</a></li>
 <? while0("id,uid,usertype,nc,lastsj,sfzrz","fcw_user where usertype=2 and sfzrz=1 order by lastsj desc limit 6");while($row=mysql_fetch_array($res)){?>
 <li class="l3"><a href="jjr/view<?=$row[id]?>.html" target="_blank"><img src="<?="upload/".$row[id]."/user.jpg"?>" onerror="this.src='user/img/nonetx.gif'" width="76" height="76" border="0" /><br><?=strgb2312($row[nc],0,8)?></a></li>
 <? }?>
 </ul>
 </div>
 <div class="es2">
 <ul class="u1">
 <li class="l1 fontyh"><?=webarea?>���¶��ַ���Ϣ</li>
 <li class="l2"><a href="second/" target="_blank">����</a></li>
 </ul>
 <ul class="u2">
 <? 
 while0("*","fcw_fang where type1='����' and ifok=0 and ifxj=0 and zt=0 and zdxh>0 order by zdxh asc limit 3");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 $au="second/view".$row[id].".html";
 ?>
 <li class="l1">
 <a href="<?=$au?>" target="_blank"><span class="js">����</span><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="118" height="75" /></a><br>
 <a href="<?=$au?>" target="_blank" class="acy"><?=$row[xq]?></a><br><?=$row[mj]?>�O-<?=$row[money1]?>��
 </li>
 <? }?>
 </ul>
 <ul class="u3">
 <? while0("id,zt,ifxj,xq,type1,sj,hx1,hx2,mj,money1","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' order by sj desc limit 10");while($row=mysql_fetch_array($res)){?>
 <li class="l1"><a href="second/view<?=$row[id]?>.html" target="_blank" title="<?=$row[xq]?>"><?=strgb2312($row[xq],0,17)?></a></li>
 <li class="l2"><?=returnjgdw($row[hx1],"��","")?><?=returnjgdw($row[hx2],"��","")?></li>
 <li class="l3"><?=$row[mj]?>�O</li>
 <li class="l4"><?=$row[money1]?>��Ԫ/��</a></li>
 <? }?>
 </ul>
 </div>
 <div class="es2">
 <ul class="u1">
 <li class="l1 fontyh"><?=webarea?>�����ⷿ��Ϣ</li>
 <li class="l2"><a href="rent/" target="_blank">����</a></li>
 </ul>
 <ul class="u2">
 <? 
 while0("*","fcw_fang where type1='����' and ifok=0 and ifxj=0 and zt=0 and zdxh>0 order by zdxh asc limit 3");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 $au="rent/view".$row[id].".html";
 ?>
 <li class="l1">
 <a href="<?=$au?>" target="_blank"><span class="js">����</span><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="118" height="75" /></a><br>
 <a href="<?=$au?>" target="_blank" class="acy"><?=$row[xq]?></a><br><?=$row[mj]?>�O-<?=returnjgdw($row[money1],$row[jgdw],"����")?>
 </li>
 <? }?>
 </ul>
 <ul class="u3">
 <? while0("id,zt,ifxj,xq,type1,sj,hx1,hx2,mj,money1,jgdw","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' order by sj desc limit 10");while($row=mysql_fetch_array($res)){?>
 <li class="l1"><a href="rent/view<?=$row[id]?>.html" target="_blank" title="<?=$row[xq]?>"><?=strgb2312($row[xq],0,17)?></a></li>
 <li class="l2"><?=returnjgdw($row[hx1],"��","")?><?=returnjgdw($row[hx2],"��","")?></li>
 <li class="l3"><?=$row[mj]?>�O</li>
 <li class="l4"><?=returnjgdw($row[money1],$row[jgdw],"����")?></a></li>
 <? }?>
 </ul>
 </div>
</div>
<!--����E-->
 
<!--װ��B-->
<? if(1==$rowcontrol[ifjia]){?>
<ul class="indexcap">
<li class="l1 fontyh"><?=webarea?>װ��</li>
<li class="l2">
<a href="<?=weburl?>jc/" target="_blank">��װ</a> | 
<a href="<?=weburl?>zx/xzxlist.html" target="_blank">ѧװ��</a> | 
<a href="<?=weburl?>designer/caselist.html" target="_blank">������</a> | 
<a href="<?=weburl?>zx/zbview.html" target="_blank">���б�</a> | 
<a href="<?=weburl?>zx/" target="_blank">�ҹ�˾</a> | 
<a href="<?=weburl?>designer/" target="_blank">���ʦ</a> | 
<a href="<?=weburl?>jc/" target="_blank">ѡ����</a>
</li>
</ul>
<div class="indexzx">

 <!--���B-->
 <div class="d1">
  <form name="zxf" method="post" target="_blank" onSubmit="return zxtj()">
  <ul class="u1">
  <li class="cap">������</li>
  <li class="l1">10��Ǽǣ���ѻ�ȡ3��רҵ��Ʒ���</li>
  <li class="l2"><input class="inp" name="t1" size="30" onFocus="t1focus()" onBlur="t1blur()" value="���ĳƺ�" type="text" /></li>
  <li class="l2"><input class="inp" name="t2" size="30" onFocus="t2focus()" onBlur="t2blur()" value="���ĵ绰" type="text" /></li>
  <li class="l2">
   <div class="areaqy1" style="margin:7px 0 0 0;">
   <select name="area1" id="area1" onChange="areacha(0)">
   <? while1("*","fcw_area where admin=1 order by id asc");while($row1=mysql_fetch_array($res1)){?>
   <option value="<?=$row1[id]?>"><?=$row1[name1]?></option>
   <? }?>
   </select>
   </div>
   <div class="areaqy2" style="margin-top:7px;">
   <input type="hidden" id="area2" name="area2" value="0" />
   <iframe name="fxq" id="fxq" height="30" width="160" border="0" frameborder="0" src="config/areas.php">�������֧��Ƕ��ʽ���</iframe>
   <script language="javascript">areacha(0);</script>
   </div>
  </li>
  <li class="l4"><input type="text" class="inp" size="8" name="t3" onFocus="t3focus()" onBlur="t3blur()" value="��֤��" /> <img height="32" class="yz" src="config/yzSes.php" /></li>
  <li class="l3"><? tjbtnr("�ύ����")?></li>
  </ul>
  </form>
 
  <!--������ʼ-->
  <div class="gdmain2" id="Marquee2">
  <? 
  while1("*","fcw_jia_zb order by sj desc limit 30");while($row1=mysql_fetch_array($res1)){
  $mot=substr($row1[mot],0,3)."*****".substr($row1[mot],8,3);
  ?>
  <div class="gd"><?=dateYMDHM($row1[sj])?> <?=strgb2312($row1[lxr],0,2)?>**&nbsp;<?=$mot?></div>
  <? }?>
  </div>
  <script>
  var Mar2 = document.getElementById("Marquee2");
  var child_div2=Mar2.getElementsByTagName("div")
  var picH2 = 39;//�ƶ��߶�
  var scrollstep2=3;//�ƶ�����,Խ��Խ��
  var scrolltime2=40;//�ƶ�Ƶ��(����)Խ��Խ��
  var stoptime2=2000;//���ʱ��(����)
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
  setTimeout(start2,scrolltime2);
  </script>
  <!--��������-->
 </div>
 <!--���E-->

 <!--�м�B-->
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
 <!--�м�E-->
 
 <!--�Ҳ�B-->
 <div class="d3"><? adread("defaultI03",208,387)?></div>
 <!--�Ҳ�E-->
 
</div>
<? }?>
<!--װ��E-->

<!--Ʒ���̼�B-->
<div class="ippsj">
<ul class="u1"><li class="l1 fontyh">Ʒ���̼�</li></ul>
<ul class="u2">
<? while0("*","fcw_ad where adbh='menuhu_ADI01' order by xh asc");while($row=mysql_fetch_array($res)){?>
<li><a href="<?=$row[aurl]?>" target="_blank"><img alt="<?=$row[tit]?>" border=0 src="ad/<?=$row[bh]?>.<?=$row[jpggif]?>" width="160" height="100"><br><?=$row[tit]?></a></li>
<? }?>
</ul>
</div>
<!--Ʒ���̼�E-->

<!--����B-->
<div class="bolink">
<ul class="u1">
<li class="l1 fontyh"><?=webname?>�������</li>
<li class="l2">
<? while0("*","fcw_ad where adbh='ADI06' order by xh asc");while($row=mysql_fetch_array($res)){?>
<a href="<?=$row[aurl]?>" target="_blank"><img alt="<?=$row[tit]?>" border=0 src="ad/<?=$row[bh]?>.<?=$row[jpggif]?>" width="100" height="35"></a>
<? }?>
</li>
</ul>
<ul class="u1">
<li class="l1 fontyh"><?=webname?>��������</li>
<li class="l3">
<? while0("*","fcw_ad where adbh='ADI07' and type1='����' order by xh asc");while($row=mysql_fetch_array($res)){?>
<a href="<?=$row[aurl]?>" target="_blank"><?=$row[tit]?></a>
<? }?>
</li>
</ul>
</div>
<!--����E-->

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