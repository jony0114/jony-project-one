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

<!--����B-->
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
<!--����E-->

<!--����B-->
<? while1("*","fcw_ad where adbh='ADDL' order by xh asc");if($row1=mysql_fetch_array($res1)){?>
<div class="dlfixediv leftadv">
	<a href="<?=$row1[aurl]?>"><img src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="100" height="280" /></a>
	<a class="close" href="javascript:void(0);">�رչ��</a>
</div>
<? }?>
<? if($row1=mysql_fetch_array($res1)){?>
<div class="dlfixediv rightadv">
	<a href="<?=$row1[aurl]?>"><img src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="100" height="280" /></a>
	<a class="close" href="javascript:void(0);">�رչ��</a>
</div>
<? }?>
<!--����E-->


<? include("../../../template/top.html");?>

<div class="bfb bfbindex">
<div class="yjcode">
 
 <!--�л�B-->
 <div class="qieh">
  <div class="d1">
  <a href="javascript:void(0);" onClick="qhaonc(1)" id="qha1">����ת��</a>
  <a href="javascript:void(0);" onClick="qhaonc(2)" id="qha2">��������</a>
  <a href="javascript:void(0);" onClick="qhaonc(3)" id="qha3">д��¥</a>
  <a href="javascript:void(0);" onClick="qhaonc(4)" id="qha4">�����ֿ�</a>
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
  <a href="rent/search_f13v.html" target="_blank">���̳���</a>
  <a href="second/search_f13v.html" target="_blank">���̳���</a>
  </li>
  </ul>
  
  <ul class="u1" id="qhu3" style="display:none;">
  <li class="l1">
  <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="rent/search_f12v_a<?=$row1[id]?>v.html" target="_blank"><?=$row1[name1]?></a>
  <? }?>
  </li>
  <li class="l2">
  <a href="rent/search_f12v.html" target="_blank">д��¥����</a>
  <a href="second/search_f12v.html" target="_blank">д��¥����</a>
  </li>
  </ul>
  
  <ul class="u1" id="qhu4" style="display:none;">
  <li class="l1">
  <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="rent/search_f14v_a<?=$row1[id]?>v.html" target="_blank"><?=$row1[name1]?></a>
  <? }?>
  </li>
  <li class="l2">
  <a href="rent/search_f14v.html" target="_blank">��������</a>
  <a href="second/search_f14v.html" target="_blank">��������</a>
  <a href="rent/search_f25v.html" target="_blank">�ֿ����</a>
  <a href="second/search_f25v.html" target="_blank">�ֿ����</a>
  </li>
  </ul>
  
 </div>
 <!--�л�E-->
 
 <!--��B-->
 <div class="zhao">
  <div class="d1">
  <a href="javascript:void(0);" class="a1" id="zhaoa1" onClick="zhaoonc(1)">��Ҫת��</a>
  <a href="javascript:void(0);" id="zhaoa2" onClick="zhaoonc(2)">��Ҫ�ҵ�</a>
  </div>
  
  <div class="d2" id="zhao1">
  <form name="f1" method="post" onSubmit="return tjla1()" autocomplete="off">
   <input type="hidden" value="la1" name="yjcode" />
   <ul class="u1">
   <li class="l1">����</li>
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
   <li class="l1">��Ӫ</li>
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
   <li class="l1">���</li>
   <li class="l2"><input type="text" name="t3" /></li>
   <li class="l3">ƽ��</li>
   </ul>
   <ul class="u2">
   <li class="l1">�ֻ�</li>
   <li class="l2"><input type="text" name="t4" /></li>
   </ul>
   <ul class="u1">
   <li class="l1">���</li>
   <li class="l2"><input type="text" name="t5" /></li>
   <li class="l3">Ԫ/��</li>
   </ul>
   <ul class="u2">
   <li class="l1">����</li>
   <li class="l2"><input type="text" name="t6" /></li>
   </ul>
   <div class="fb"><input type="submit" value="���ٷ���" /></div>
  </form>
  </div>
  
  <div class="d2" id="zhao2" style="display:none;">
  <form name="f2" method="post" onSubmit="return tjla2()" autocomplete="off">
   <input type="hidden" value="la2" name="yjcode" />
   <ul class="u1">
   <li class="l1">����</li>
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
   <li class="l1">��Ӫ</li>
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
   <li class="l1">���</li>
   <li class="l2"><input type="text" name="t3" /></li>
   <li class="l3">ƽ��</li>
   </ul>
   <ul class="u2">
   <li class="l1">�ֻ�</li>
   <li class="l2"><input type="text" name="t4" /></li>
   </ul>
   <ul class="u1">
   <li class="l1">���</li>
   <li class="l2"><input type="text" name="t5" /></li>
   <li class="l3">Ԫ/��</li>
   </ul>
   <ul class="u2">
   <li class="l1">����</li>
   <li class="l2"><input type="text" name="t6" /></li>
   </ul>
   <div class="fb"><input type="submit" value="���ٷ���" /></div>
  </form>
  </div>
 
 </div>
 <!--��E-->
 
 <? adwhile("pu_03")?>
 
 <!--��ҵB-->
 <div class="hy">
  <div class="d1">������ҵ�ҵ���</div>
  <div class="d2">
  <a href="javascript:void(0);" id="hya0" onClick="hyaonc(0)">��ҵ����</a><span></span>
  <? $i=1;while1("*","fcw_sphy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" id="hya<?=$i?>" onClick="hyaonc(<?=$i?>)"><?=$row1[name1]?></a><span></span>
  <? $i++;}?>
  </div> 
  <div class="hyleft">
  <div class="hym" id="hym0" style="display:none;">
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and type1='����' and wylx='����' order by sj desc limit 12");while($row2=mysql_fetch_array($res2)){
  $tpv=returntp("bh='".$row2[bh]."' order by iffm desc limit 1","-1");
  $au="rent/view".$row2[id].".html";
  ?>
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="150" /></a></li>
  <li class="l2"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],25)?></a></li>
  <li class="l3"><span><?=$row2[money1]?></span><?=$row2[jgdw]?>&nbsp;&nbsp;&nbsp;<span><?=$row2[mj]?></span>ƽ��</li>
  </ul>
  <? }?>
  </div>
  <? $i=1;while1("*","fcw_sphy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <div class="hym" id="hym<?=$i?>" style="display:none;">
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and type1='����' and wylx='����' and hylx=".$row1[id]." order by sj desc limit 12");while($row2=mysql_fetch_array($res2)){
  $tpv=returntp("bh='".$row2[bh]."' order by iffm desc limit 1","-1");
  $au="rent/view".$row2[id].".html";
  ?>
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="200" height="150" /></a></li>
  <li class="l2"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],25)?></a></li>
  <li class="l3"><span><?=$row2[money1]?></span><?=$row2[jgdw]?>&nbsp;&nbsp;&nbsp;<span><?=$row2[mj]?></span>ƽ��</li>
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
 <!--��ҵE-->
 
 <!--��������B-->
 <div class="qyzp">
  <div class="d1">������������</div>
  <div class="d2">
  <? $i=1;while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" id="qya<?=$i?>" onClick="qyaonc(<?=$i?>)"><?=$row1[name1]?></a><span></span>
  <? $i++;}?>
  </div> 
  <? $i=1;while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <div id="qym<?=$i?>">
  <? 
  $j=1;
  while2("*","fcw_fang where zt=0 and ifxj=0 and type1='����' and wylx='����' and areaid=".$row1[id]." order by sj desc limit 12");while($row2=mysql_fetch_array($res2)){
  $au="rent/view".$row2[id].".html";
  ?>
  <ul class="u1<? if($j % 3==0){?> u0<? }?>">
  <li class="l1"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],40)?></a></li>
  <li class="l2"><span><?=$row2[money1]?></span><?=$row2[jgdw]?></li>
  </ul>
  <? $j++;}?>
  <div class="qymore"><a href="rent/search_a<?=$row1[id]?>v_f13v.html" target="_blank">����<?=$row1[name1]?>ת����Ϣ>></a></div>
  </div>
  <? $i++;}?>
  <span id="allqy" style="display:none;"><?=$i?></span>
 </div>
 <!--��������E-->
 
 <!--���̳���B-->
 <div class="spcz">
  <div class="d1">���̳���</div>
  <? 
  $i=1;
  while2("*","fcw_fang where zt=0 and ifxj=0 and type1='����' and wylx='����' order by sj desc limit 4");while($row2=mysql_fetch_array($res2)){
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
 <!--���̳���E-->
 
 <!--д��¥��B-->
 <div class="xzl">
  <ul class="u1"><li class="l1">д��¥����</li><li class="l2"></li></ul>
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and wylx='д��¥' order by sj desc limit 8");while($row2=mysql_fetch_array($res2)){
  if($row2[type1]=="����"){$u="second";}
  elseif($row2[type1]=="����"){$u="rent";}
  $au=$u."/view".$row2[id].".html";
  ?>
  <ul class="u2"><li class="l1"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],40)?></a></li><li class="l2"><span><?=$row2[mj]?></span>ƽ��</li></ul>
  <? }?> 
 </div>
 <!--д��¥E-->
 
 <!--���̳���B-->
 <div class="spcz">
  <div class="d1">���̳���</div>
  <? 
  $i=1;
  while2("*","fcw_fang where zt=0 and ifxj=0 and type1='����' and wylx='����' order by sj desc limit 4");while($row2=mysql_fetch_array($res2)){
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
 <!--���̳���E-->
 
 <div class="pu02"><? adread("pu_02",428,85)?></div>
 
 <!--������B-->
 <div class="qzqg">
  <ul class="u1"><li class="l1">������</li><li class="l2"></li></ul>
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and (type1='����' or type1='��') order by sj desc limit 4");while($row2=mysql_fetch_array($res2)){
  if($row2[type1]=="����"){$u="qiuzu";}
  elseif($row2[type1]=="��"){$u="qiugou";}
  $au=$u."/view".$row2[id].".html";
  ?>
  <ul class="u2"><li class="l1"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],40)?></a></li><li class="l2"><span><?=$row2[mot]?></span></li></ul>
  <? }?> 
 </div>
 <!--������E-->
 
</div>
</div>

<div class="yjcode">
 <? adwhile("ADI12");?>
 <!--�ֿ�����B-->
 <div class="ckcf">
  <ul class="u1"><li class="l1">�ֿ�����</li><li class="l2"></li></ul>
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and (type1='����' or type1='����') and wylx='�ֿ�' order by sj desc limit 10");while($row2=mysql_fetch_array($res2)){
  if($row2[type1]=="����"){$u="second";}
  elseif($row2[type1]=="����"){$u="rent";}
  $au=$u."/view".$row2[id].".html";
  ?>
  <ul class="u2"><li class="l1"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],40)?></a></li><li class="l2"><span><?=$row2[mj]?></span>ƽ��</li></ul>
  <? }?> 
 </div>
 <!--�ֿ�����E-->
 <!--��������B-->
 <div class="ckcf">
  <ul class="u1"><li class="l1">��������</li><li class="l2"></li></ul>
  <? 
  while2("*","fcw_fang where zt=0 and ifxj=0 and (type1='����' or type1='����') and wylx='����' order by sj desc limit 10");while($row2=mysql_fetch_array($res2)){
  if($row2[type1]=="����"){$u="second";}
  elseif($row2[type1]=="����"){$u="rent";}
  $au=$u."/view".$row2[id].".html";
  ?>
  <ul class="u2"><li class="l1"><a href="<?=$au?>" target="_blank"><?=returntitdian($row2[tit],40)?></a></li><li class="l2"><span><?=$row2[mj]?></span>ƽ��</li></ul>
  <? }?> 
 </div>
 <!--��������E-->
 <!--��ѶB-->
 <div class="inews">
  <ul class="u1"><li class="l1">������Ѷ</li><li class="l2"></li></ul>
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
 <!--��ѶE-->
</div>

<script language="javascript">
qhaonc(1);
hyaonc(0);
qyaonc(1);
</script>

<div class="bfb bfbbottom">
<div class="yjcode">
 <ul class="u1">
 <li class="l1">��������</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=weburl?>rent/search_j<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
 <? }?>
 </li>
 </ul>
 <ul class="u1">
 <li class="l1">�������ӣ�(������ϵ���䣺<?=$rowcontrol[adminmail]?>)</li>
 <li class="l2">
 <? while0("*","fcw_ad where adbh='ADI07' and type1='����' order by xh asc");while($row=mysql_fetch_array($res)){?>
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