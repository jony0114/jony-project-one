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

<!--��������жϿ�ʼ-->
<?
while1("*","fcw_ad where adbh='ADDL' order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){
?>
<script language="JavaScript" src="js/dlad.js"></script>
<script language="javascript">
 var theFloaters= new floaters();
 //����
 theFloaters.addItem('followDiv1','document.body.clientWidth-106',80,'<?=adwhile("ADDL",1)?><span class="dlclo" onclick="dlonc()">�ر�</span>');
 //����
 theFloaters.addItem('followDiv2',6,80,'<?=adwhile("ADDL",1)?><span class="dlclo" onclick="dlonc()">�ر�</span>');
 theFloaters.play();
</script>
<?
}
?>
<!--��������жϽ���-->


<div class="yjcode">

 <!--�л�B-->
 
 <div class="imenu">
  
  <div class="sleft">
   <form name="f1" method="post" onSubmit="return tj()">
   <!--¥��B-->
   <div class="sd" onMouseOver="sdover(19)" onMouseOut="sdout(19)">
   <a href="loupan/" id="la19" class="a1 fontyh">��¥��</a>
    <div class="smain smain1" id="smain19" style="display:none;">
     <span class="xx"></span>
     <span class="s1">��<strong class="feng"><?=returncount("fcw_xq where admin=2 and zt=0")?></strong>��<?=webarea?>��¥�� ����ѡ��</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt19" name="fstxt19" /></li>
     <li class="l2 fontyh"><input type="submit" value="����¥��" /></li>
     <li class="l3"><a href="map/index.php?xs=loupan" class="red" target="_blank">��ͼ�ҷ�</a></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">����ɸѡ</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="loupan/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u2 u20">
     <li class="l1 l12">�۸�ɸѡ</li>
     <? 
     $i=0;$a=preg_split("/,/",$rowcontrol[LPSELMv]);for($j=0;$j<=count($a);$j++){
     if(0==$i){$str=$a[0]."Ԫ����";$money1=0;$money2=$a[0];}
     elseif(count($a)==$i){$str=$a[count($a)-1]."Ԫ����";$money1=$a[count($a)-1];$money2=999999;}
     else{$str=$a[$j-1]."-".$a[$j];$money1=$a[$j-1];$money2=$a[$j];}
	 ?>
     <li class="l2 l21"><a href="loupan/search_b<?=$money1?>v_c<?=$money2?>v.html"><?=$str?></a></li>
	 <? $i++;}?>     
     </ul>
     <ul class="u2 u21">
     <li class="l1 l13">����¥��</li>
     <? while1("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 12");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="loupan/view<?=$row1[id]?>.html"><?=strgb2312($row1[xq],0,12)?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--¥��E-->
   <!--���ַ�B-->
   <div class="sd" onMouseOver="sdover(2)" onMouseOut="sdout(2)">
   <a href="second/" id="la2" class="a1 fontyh">���ַ�</a>
    <div class="smain smain2" id="smain2" style="display:none;">
     <span class="xx"></span>
     <span class="s1">��<strong class="feng"><?=returncount("fcw_fang where zt=0 and type1='����' and ifxj=0")?></strong>��<?=webarea?>���ַ� ����ѡ��</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt2" name="fstxt2" /></li>
     <li class="l2 fontyh"><input type="submit" value="�Ҷ��ַ�" /></li>
     <li class="l3"><a href="map/index.php?xs=second" class="red" target="_blank">��ͼ�ҷ�</a></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">����ɸѡ</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u2 u20">
     <li class="l1 l12">�۸�ɸѡ</li>
     <? 
     $i=0;$a=preg_split("/,/",$rowcontrol[ESFSELMv]);for($j=0;$j<=count($a);$j++){
     if(0==$i){$str=$a[0]."������";$money1=0;$money2=$a[0];}
     elseif(count($a)==$i){$str=$a[count($a)-1]."������";$money1=$a[count($a)-1];$money2=999999;}
     else{$str=$a[$j-1]."-".$a[$j]."��";$money1=$a[$j-1];$money2=$a[$j];}
	 ?>
     <li class="l2 l21"><a href="second/search_b<?=$money1?>v_c<?=$money2?>v.html"><?=$str?></a></li>
	 <? $i++;}?>     
     </ul>
     <ul class="u2 u21">
     <li class="l1 l13">���ѱ�ǩ</li>
     <? $nty="��Ԣ";while1("*","fcw_wyts where cswy like '%".$nty."%' limit 12");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--���ַ�E-->
   <!--�ⷿB-->
   <div class="sd" onMouseOver="sdover(1)" onMouseOut="sdout(1)">
   <a href="rent/" id="la1" class="a1 fontyh">�ⷿ</a>
    <div class="smain smain3" id="smain1" style="display:none;">
     <span class="xx"></span>
     <span class="s1">��<strong class="feng"><?=returncount("fcw_fang where zt=0 and type1='����' and ifxj=0")?></strong>��<?=webarea?>�ⷿ ����ѡ��</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt1" name="fstxt1" /></li>
     <li class="l2 fontyh"><input type="submit" value="���ⷿ" /></li>
     <li class="l3"><a href="map/index.php?xs=rent" class="red" target="_blank">��ͼ�ҷ�</a></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">����ɸѡ</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="rent/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u2 u20">
     <li class="l1 l12">�۸�ɸѡ</li>
     <? 
     $i=0;$a=preg_split("/,/",$rowcontrol[ZFSELMv]);for($j=0;$j<=count($a);$j++){
     if(0==$i){$str=$a[0]."Ԫ����";$money1=0;$money2=$a[0];}
     elseif(count($a)==$i){$str=$a[count($a)-1]."Ԫ����";$money1=$a[count($a)-1];$money2=999999;}
     else{$str=$a[$j-1]."-".$a[$j];$money1=$a[$j-1];$money2=$a[$j];}
	 ?>
     <li class="l2 l21"><a href="rent/search_b<?=$money1?>v_c<?=$money2?>v.html"><?=$str?></a></li>
	 <? $i++;}?>     
     </ul>
     <ul class="u2 u21">
     <li class="l1 l13">���ѱ�ǩ</li>
     <? $nty="��Ԣ";while1("*","fcw_wyts where czwy like '%".$nty."%' limit 12");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="rent/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--�ⷿE-->
   <!--����B-->
   <div class="sd" onMouseOver="sdover(16)" onMouseOut="sdout(16)">
   <a href="lptuan/tuanlist.html" id="la16" class="a1 fontyh">����</a>
    <div class="smain smain4" id="smain16" style="display:none;">
     <span class="xx"></span>
     <span class="s1">��������<strong class="feng"><?=returncount("fcw_kanfang where zt=0")?></strong>��<?=webarea?>�����</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt16" name="fstxt16" /></li>
     <li class="l2 fontyh"><input type="submit" value="�һ" /></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">����ɸѡ</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="lptuan/tuanlist_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u3">
     <li class="l1">���ڽ��еĻ</li>
     <? while1("*","fcw_kanfang where zt=0 and bmzt=0 order by sj desc limit 6");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2">��<a href="loupan/tuanview<?=$row1[id]?>.html" title="<?=$row1[tit]?>">[<?=returnxq($row1[xqbh],"bh")?>] <?=strgb2312($row1[tit],0,50)?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--����E-->
   <!--д��¥B-->
   <? $xzlid=returnwylx(2,"д��¥");?>
   <div class="sd" onMouseOver="sdover(17)" onMouseOut="sdout(17)">
   <a href="second/search_f<?=$xzlid?>v.html" id="la17" class="a1 fontyh">д��¥</a>
    <div class="smain smain5" id="smain17" style="display:none;">
     <span class="xx"></span>
     <span class="s1">��<strong class="feng"><?=returncount("fcw_fang where zt=0 and (type1='����' or type1='����') and wylx='д��¥' and ifxj=0")?></strong>��<?=webarea?>д��¥ ����ѡ��</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt17" name="fstxt17" /></li>
     <li class="l2 fontyh"><input type="submit" value="��д��¥" /></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">����ɸѡ</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_a<?=$row1[id]?>v_f<?=$xzlid?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u2 u20">
     <li class="l1 l12">�۸�ɸѡ</li>
     <? 
     $i=0;$a=preg_split("/,/",$rowcontrol[ESFSELMv]);for($j=0;$j<=count($a);$j++){
     if(0==$i){$str=$a[0]."������";$money1=0;$money2=$a[0];}
     elseif(count($a)==$i){$str=$a[count($a)-1]."������";$money1=$a[count($a)-1];$money2=999999;}
     else{$str=$a[$j-1]."-".$a[$j]."��";$money1=$a[$j-1];$money2=$a[$j];}
	 ?>
     <li class="l2 l21"><a href="second/search_b<?=$money1?>v_c<?=$money2?>v_f<?=$xzlid?>v.html"><?=$str?></a></li>
	 <? $i++;}?>     
     </ul>
     <ul class="u2 u21">
     <li class="l1 l13">���ѱ�ǩ</li>
     <? $nty="д��¥";while1("*","fcw_wyts where cswy like '%".$nty."%' limit 12");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_t<?=$row1[id]?>v_f<?=$xzlid?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--д��¥E-->
   <!--����B-->
   <? $spid=returnwylx(2,"����");?>
   <div class="sd" onMouseOver="sdover(18)" onMouseOut="sdout(18)">
   <a href="second/search_f<?=$spid?>v.html" id="la18" class="a1 fontyh">����</a>
    <div class="smain smain6" id="smain18" style="display:none;">
     <span class="xx"></span>
     <span class="s1">��<strong class="feng"><?=returncount("fcw_fang where zt=0 and (type1='����' or type1='����') and wylx='����' and ifxj=0")?></strong>��<?=webarea?>���� ����ѡ��</span>
     <ul class="u1">
     <li class="l1"><input type="text" id="fstxt18" name="fstxt18" /></li>
     <li class="l2 fontyh"><input type="submit" value="������" /></li>
     </ul>
     <ul class="u2">
     <li class="l1 l11">����ɸѡ</li>
     <? while1("*","fcw_area where admin=1 order by xh asc limit 15");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_a<?=$row1[id]?>v_f<?=$spid?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
     <ul class="u2 u20">
     <li class="l1 l12">�۸�ɸѡ</li>
     <? 
     $i=0;$a=preg_split("/,/",$rowcontrol[ESFSELMv]);for($j=0;$j<=count($a);$j++){
     if(0==$i){$str=$a[0]."������";$money1=0;$money2=$a[0];}
     elseif(count($a)==$i){$str=$a[count($a)-1]."������";$money1=$a[count($a)-1];$money2=999999;}
     else{$str=$a[$j-1]."-".$a[$j]."��";$money1=$a[$j-1];$money2=$a[$j];}
	 ?>
     <li class="l2 l21"><a href="second/search_b<?=$money1?>v_c<?=$money2?>v_f<?=$spid?>v.html"><?=$str?></a></li>
	 <? $i++;}?>     
     </ul>
     <ul class="u2 u21">
     <li class="l1 l13">���ѱ�ǩ</li>
     <? $nty="����";while1("*","fcw_wyts where cswy like '%".$nty."%' limit 12");while($row1=mysql_fetch_array($res1)){?>
     <li class="l2"><a href="second/search_t<?=$row1[id]?>v_f<?=$spid?>v.html"><?=$row1[name1]?></a></li>
	 <? }?>     
     </ul>
    </div>
   </div>
   <!--����E-->
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
 <!--�л�E-->

 <!--¥��B-->
 <? adwhile("ADI08");?>
 <ul class="indexcap">
 <li class="l1 fontyh"><?=webarea?>¥��</li>
 <li class="l2"><a href="map/index.php?xs=loupan">��ͼ�ҷ�</a> | <a href="loupan/">����</a></li>
 </ul>
 
 <div class="lp">
  
  <div class="d1">
  <ul class="tjsel">
  <li class="l1" onMouseOver="this.className='l1 l99';" onMouseOut="this.className='l1';">
  <strong>�����ҷ�</strong>
   <div class="sel">
   <div class="xx"></div>
   <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <a href="loupan/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a>&nbsp;
   <? }?>
   </div>
  </li>
  
  <li class="l2" onMouseOver="this.className='l2 l99';" onMouseOut="this.className='l2';">
  <strong>�۸��ҷ�</strong>
   <div class="sel">
   <div class="xx"></div>
   <? 
   $i=0;$a=preg_split("/,/",$rowcontrol[LPSELMv]);for($j=0;$j<=count($a);$j++){
   if(0==$i){$str=$a[0]."Ԫ����";$money1=0;$money2=$a[0];}
   elseif(count($a)==$i){$str=$a[count($a)-1]."Ԫ����";$money1=$a[count($a)-1];$money2=999999;}
   else{$str=$a[$j-1]."-".$a[$j];$money1=$a[$j-1];$money2=$a[$j];}
   ?>
   <a href="loupan/search_b<?=$money1?>v_c<?=$money2?>v.html"><?=$str?></a>&nbsp;
   <? $i++;}?>
   </div>
  </li>

  <li class="l3" onMouseOver="this.className='l3 l99';" onMouseOut="this.className='l3';">
  <strong>�����ҷ�</strong>
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
  <strong>��ɫ�ҷ�</strong>
   <div class="sel">
   <div class="xx"></div>
   <? $nty="¥��";while1("*","fcw_wyts where lpwy like '%".$nty."%'");while($row1=mysql_fetch_array($res1)){?>
   <a href="loupan/search_t<?=$row1[id]?>v.html"><?=$row1[name1]?></a>&nbsp;
   <? }?>     
   </div>
  </li>

  </ul>
  <div class="ad"><? adread("ADI17",233,140)?></div>
  <ul class="u1">
  <? while0("*","fcw_xqnews where zt=0 order by sj desc limit 8");while($row=mysql_fetch_array($res)){?>
  <li>��<a href="loupan/newsview<?=$row[id]?>.html" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,37)?></a></li>
  <? }?>
  </ul>
  
  </div>
  
  <div class="d2">
   <span class="cap fontyh">����¥��</span>
   <?
   while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 15");for($i=1;$i<=3;$i++){if($row=mysql_fetch_array($res)){
   $au="loupan/view".$row[id].".html";
   ?>
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>"><img border="0" src="upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home.jpg" width="203" height="120" /></a></li>
   <li class="l2"><a href="<?=$au?>" title="<?=$row[xq]?>"><?=strgb2312($row[xq],0,15)?></a></li>
   <li class="l3"><?=returnarea(1,$row[areaid])?> <span class="feng"><?=returnjgdw($row[money1],"Ԫ/�O","�۸����")?></span></li>
   </ul>
   <? }}?>
   <div class="d21">
   <? 
   for($i=4;$i<=9;$i++){if($row=mysql_fetch_array($res)){
   $tpv="upload/".returnuserid($row[uid])."/f/".$row[bh]."/home.jpg";
   $au="loupan/view".$row[id].".html";
   ?>
   <ul class="u21" onClick="gourl('<?=$au?>');" id="lpu<?=$i?>" onMouseOver="lpover(4,9,<?=$i?>)"><li class="l1"><?=$row[xq]?></li><li class="l2"><?=returnarea(1,$row[areaid])?></li><li class="l3"><?=returnjgdw($row[money1],"Ԫ/�O","�۸����")?></li></ul>
   <div class="dt" style="display:none;" id="lpd<?=$i?>">
   <a href="<?=$au?>"><img border="0" src="<?=returntppd($tpv,"img/none100x75.jpg")?>" width="100" height="75" align="left" /></a>
   <span class="s1"><a href="<?=$au?>"><?=$row[xq]?></a><br><?=returnarea(1,$row[areaid])?> <span class="feng"><?=returnjgdw($row[money1],"Ԫ/�O","�۸����")?></span></span>
   </div>
   <? }}?>
   </div>
   <div class="d21">
   <? 
   $i=10;while($row=mysql_fetch_array($res)){
   $tpv="upload/".returnuserid($row[uid])."/f/".$row[bh]."/home.jpg";
   $au="loupan/view".$row[id].".html";
   ?>
   <ul class="u21" onClick="gourl('<?=$au?>');" id="lpu<?=$i?>" onMouseOver="lpover(10,15,<?=$i?>)"><li class="l1"><?=$row[xq]?></li><li class="l2"><?=returnarea(1,$row[areaid])?></li><li class="l3"><?=returnjgdw($row[money1],"Ԫ/�O","�۸����")?></li></ul>
   <div class="dt" style="display:none;" id="lpd<?=$i?>">
   <a href="<?=$au?>"><img border="0" src="<?=returntppd($tpv,"img/none100x75.jpg")?>" width="100" height="75" align="left" /></a>
   <span class="s1"><a href="<?=$au?>"><?=$row[xq]?></a><br><?=returnarea(1,$row[areaid])?> <span class="feng"><?=returnjgdw($row[money1],"Ԫ/�O","�۸����")?></span></span>
   </div>
   <? $i++;}?>
   <script language="javascript">lpover(4,9,4);lpover(10,15,10);</script>
   </div>

  </div>
  
  <div class="hotlp">
  <ul class="u1">
  <li class="l1 fontyh">��ע������</li>
  <li class="l2 fontyh"><a href="loupan/">�·�����</a></li>
  <li class="l3">¥������</li>
  <li class="l4">��ע����</li>
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
 <!--¥��E-->


 <!--�ؼ۷�B-->
 <? adwhile("ADI09");?>
 <ul class="indexcap">
 <li class="l1 fontyh">�ؼ۷�</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <a href="lptj/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?>�ؼ۷�</a> | 
 <? }?> <a href="lptj/search.html">����</a>
 </li>
 </ul>
 <div class="lptj fontyh">
 <? $i=1;while1("*","fcw_tejia where zt=0 order by sj desc limit 8");while($row1=mysql_fetch_array($res1)){?>
 <ul class="u1<? if($i % 4==0){?> u0<? }?>">
 <li class="l1"><span><?=returnxq($row1[xqbh],"bh")?> (<?=returnarea(1,$row1[areaid])?>)</span><a href="lptj/view<?=$row1[id]?>.html"><img border="0" src="<?=returntp("bh='".$row1[bh]."'","-1")?>" width="282" height="180" /></a></li>
 <li class="l2"><?=$row1[hx1]?>��<?=$row1[hx2]?>��<?=$row1[mj]?>�O</li>
 <li class="l3"><?=$row1[zj1]?>��</li>
 <li class="l4"><?=strgb2312($row1[fh],0,20)?></li>
 <li class="l5"><s><?=$row1[zj]?>��</s></li>
 </ul>
 <? $i++;}?>
 </div>
 <!--�ؼ۷�E-->

 <!--�Ź�B-->
 <? adwhile("ADI10");?>
 <ul class="indexcap">
 <li class="l1 fontyh">����</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <a href="lptuan/tuanlist_a<?=$row1[id]?>v.html"><?=$row1[name1]?>�Ź�</a> | 
 <? }?> <a href="lptuan/tuanlist.html">����</a>
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
 <li class="l2 fontyh"><a href="<?=$au?>" target="_blank">��<?=returnxq($row[xqbh],"bh")?>��<?=strgb2312($row[tit],0,60)?></a></li>
 <li class="l3">����<strong class="red"><?=returncount("fcw_kanfanguser where xqbh='".$row[xqbh]."' and kfbh='".$row[bh]."'")?></strong>�˲μ��Ź�</li>
 <li class="l4">
 <? if(0==$row[bmzt]){?>
 <input type="button" class="inp1" onClick="javascript:gourl('<?=$au?>');" value="��������" />
 <? 
 }else{
 if(1==$row[bmzt]){$bmv="��������";}
 elseif(2==$row[bmzt]){$bmv="���ڿ���";}
 elseif(3==$row[bmzt]){$bmv="��ѽ���";}
 ?>
 <input type="button" class="inp2" onClick="javascript:gourl('<?=$au?>');" value="<?=$bmv?>" />
 <? }?>
 </li>
 </ul>
 <? $i++;}?>
 </div>
 <!--�Ź�E-->

 <!--����B-->
 <? adwhile("ADI11");?>
 <ul class="indexcap">
 <li class="l1 fontyh">ȫ��Ӫ��</li>
 <li class="l2"><a href="loupan/fxlist.html">����</a></li>
 </ul>
 <!--�б�B-->
 <div class="fxilist">

 <div class="lmain">
 <? $i=1;while0("*","fcw_xq where iffx=1 order by sj desc limit 5");while($row=mysql_fetch_array($res)){?>
 <ul class="u2<? if($i==5){echo " u20";}?>" onMouseOver="this.className='u2 u21<? if($i==5){echo " u20";}?>';" onMouseOut="this.className='u2<? if($i==5){echo " u20";}?>';">
 <li class="l1"><a href="loupan/fxview<?=$row[id]?>.html"><img border="0" src="upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home.jpg" width="220" height="150" /></a></li>
 <li class="l2"><a href="loupan/fxview<?=$row[id]?>.html"><?=$row[xq]?></a></li>
 <li class="l3"><span>׬ȡ<br>Ӷ��</span></li>
 <li class="l4"><strong><?=$row[fxmoney]?></strong>��</li>
 <li class="l5">¥�̾���<br><?=returnjgdw($row[money1],"Ԫ","��δ����")?></li>
 <li class="l6"><a href="user/loupanfxkhlx.php?xqbh=<?=$row[bh]?>" class="a1">�Ƽ��ͻ�</a><a href="loupan/fxview<?=$row[id]?>.html" class="a2">�鿴����</a></li>
 </ul>
 <? $i++;}?>
 </div>

 </div>
 <!--�б�E-->
 <!--����E-->

 <!--��ѶB-->
 <? adwhile("ADI12");?>
 <ul class="indexcap1 fontyh">
 <li class="l1 fontyh"><?=webarea?>��Ѷ</li>
 <li class="l2">
 <? $tyarr=array();$w=954;$i=1;while1("*","fcw_newstype where admin=1 order by xh asc limit 4");while($row1=mysql_fetch_array($res1)){?>
 <a href="news/newslist_j<?=$row1[id]?>v.html" onMouseOver="inewsover(<?=$i?>)" id="inewa<?=$i?>"><?=$row1[name1]?></a>
 <? $tyarr[$i-1]=$row1[id];$w=$w-96;$i++;}?>
 </li>
 <li class="l3" style="width:<?=$w?>px;"><a href="news/">����</a></li>
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
  <li class="l1 fontyh">¥���Ż�</li>
  <? while0("*","fcw_xqnews where zt=0 order by sj desc limit 10");while($row=mysql_fetch_array($res)){?>
  <li class="l2">[<?=dateYMD($row[sj])?>] <a href="loupan/newsview<?=$row[id]?>.html" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,37)?></a></li>
  <? }?>
  </ul>
 
 </div>
 <!--��ѶE-->

 <!--����B-->
 <? adwhile("ADI13");?>
 <ul class="indexcap">
 <li class="l1 fontyh">¥�̻���</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <a href="lphuxing/huxinglist_a<?=$row1[id]?>v.html"><?=$row1[name1]?>����</a> | 
 <? }?> <a href="lphuxing/huxinglist.html">����</a>
 </li>
 </ul>
 <div class="hx">
  <div class="hxs">
  <ul class="u1">
  <li class="cap"><strong>�۸�</strong></li>
  <li class="l3">
  <a href="javascript:void(0);" target="_self" class="jg" id="leftjg1" onClick="jgonc(1)">50������</a>
  <a href="javascript:void(0);" target="_self" class="jg" id="leftjg2" onClick="jgonc(2)">50-80��</a>
  <a href="javascript:void(0);" target="_self" class="jg" id="leftjg3" onClick="jgonc(3)">80������</a>
  </li>
  <li class="cap"><strong>����</strong></li>
  <li class="l1">
  <? $i=1;while1("*","fcw_fwlc order by xh asc limit 2");while($row1=mysql_fetch_array($res1)){if($i==1){$lcv=$row1[id];}?>
  <a href="javascript:void(0);" target="_self" class="lc<?=$i?>" id="leftlc<?=$i?>" onClick="lcsonc(<?=$i?>,<?=$row1[id]?>)"><?=$row1[name1]?></a>
  <? $i++;}?>
  <? $i=1;while1("*","fcw_zxqk order by xh asc limit 2");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" target="_self" class="zx<?=$i?>" id="leftzx<?=$i?>" onClick="zxsonc(<?=$i?>,<?=$row1[id]?>)"><?=$row1[name1]?></a>
  <? $i++;}?>
  </li>
  <li class="cap"><strong>����</strong></li>
  <li class="l1">
  <a href="javascript:hxsonc(1)" target="_self" class="hx1" id="lefthx1">һ��</a>
  <a href="javascript:hxsonc(2)" target="_self" class="hx2" id="lefthx2">����</a>
  <a href="javascript:hxsonc(3)" target="_self" class="hx3" id="lefthx3">����</a>
  <a href="javascript:hxsonc(4)" target="_self" class="hx4" id="lefthx4">����</a>
  </li>
  <li class="l2"><input type="button" onClick="hxsearch()" value="����ɸѡ"></li>
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
   <li class="l3"><?=returnjgdw($row[hx1],"��","")?><?=returnjgdw($row[hx2],"��","")?>&nbsp;&nbsp;<?=$row[mj]?>�O&nbsp;&nbsp;<span class="feng"><?=returnjgdw($row[money1],"��","�۸����")?></span></li>
   </ul>
   <? }?>
  </div>
  
  <!--������ʼ-->
  <ul class="wd">
  <li class="l1">��¥��������ѯ</li>
  <li class="l2"><a href="feedback/feedbacklist.html">������ѯ</a></li>
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
  ��<?=strgb2312(returnjgdw($row1[uname],"","�����û�"),0,10)?> ��ѯ <a title="<?=$xq?>" href="loupan/view<?=$row2[id]?>.html" class="feng"><?=strgb2312($xq,0,15)?></a>��<br>
  <span class="s1">��ѯ</span>&nbsp;<?=returntitdian($row1[txt1],66)?>
  </td>
  </tr>
  </table>
  <table align="left" width="237">
  <tr>
  <td valign="middle" width="237" style="line-height:22px;"><span class="s2">�ظ�</span>&nbsp;<span class="green"><?=returntitdian($row1[txt2],66)?></span></td>
  </tr>
  </table>
  </div>
  <? }?>
  <script>
    var Mar1 = document.getElementById("Marquee1");
    var child_div1=Mar1.getElementsByTagName("div")
    var picH1 = 130;//�ƶ��߶�
    var scrollstep1=3;//�ƶ�����,Խ��Խ��
    var scrolltime1=20;//�ƶ�Ƶ��(����)Խ��Խ��
    var stoptime1=3000;//���ʱ��(����)
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
  <!--��������-->
  
 </div>
 <!--����E-->

 <!--���ַ�B-->
 <? adwhile("ADI14");?>
 <ul class="indexcap">
 <li class="l1 fontyh"><?=webarea?>���ַ�</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <a href="second/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?></a> | 
 <? }?> <a href="second/">����</a>
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
  <li><span>��λ�Դ�</span></li>
  <? }?>
  </ul>
  
  <div class="d1">
   <?
   while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' order by sj desc limit 10");while($row=mysql_fetch_array($res)){
   $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
   $au="second/view".$row[id].".html";
   ?>
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>"><img border="0" src="<?=returntppd($tpv,"img/none100x75.jpg")?>" width="160" height="120" /></a></li>
   <li class="l2"><a href="<?=$au?>" title="<?=$row[xq]?>"><?=strgb2312($row[xq],0,15)?></a></li>
   <li class="l3"><?=returnarea(1,$row[areaid])?>&nbsp;<?=$row[mj]?>�O&nbsp;<?=returnjgdw($row[hx1],"��","")?><?=returnjgdw($row[hx2],"��","")?>&nbsp;<span class="feng"><?=returnjgdw($row[money1],"��","")?></span></li>
   </ul>
   <? }?>
  </div>
 
 </div>
 <!--���ַ�E-->

 <!--�ⷿB-->
 <? adwhile("ADI15");?>
 <ul class="indexcap">
 <li class="l1 fontyh"><?=webarea?>�ⷿ</li>
 <li class="l2">
 <? while1("*","fcw_area where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <a href="rent/search_a<?=$row1[id]?>v.html"><?=$row1[name1]?>�ⷿ</a> | 
 <? }?> <a href="rent/">����</a>
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
   while1("*","fcw_fang where zt=0 and ifxj=0 and type1='����' and xq<>'' order by sj desc limit 20");for($i=1;$i<=10;$i++){if($row1=mysql_fetch_array($res1)){
   $tpv=returntp("bh='".$row1[bh]."' order by iffm desc limit 1","-1");
   $au="rent/view".$row1[id].".html";
   ?>
   <ul class="u1" onClick="gourl('<?=$au?>');" id="zfu<?=$i?>" onMouseOver="zfover(1,10,<?=$i?>)"><li class="l1"><?=strgb2312($row1[xq],0,12)?></li><li class="l2"><?=returnarea(1,$row1[areaid])?></li><li class="l3"><?=$row1[hx1]?>��<?=$row1[hx2]?>��</li><li class="l4"><?=$row1[money1].$row1[jgdw]?></li></ul>
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
   <ul class="u1" onClick="gourl('<?=$au?>');" id="zfu<?=$i?>" onMouseOver="zfover(11,20,<?=$i?>)"><li class="l1"><?=strgb2312($row1[xq],0,12)?></li><li class="l2"><?=returnarea(1,$row1[areaid])?></li><li class="l3"><?=$row1[hx1]?>��<?=$row1[hx2]?>��</li><li class="l4"><?=$row1[money1].$row1[jgdw]?></li></ul>
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
   <span class="s2 ss"><?=returncount("fcw_fang where type1='����' and ifxj=0 and zt=0 and ifok=0 and uid='".$row[uid]."'")?>��</span>
   <span class="s2 sz"><?=returncount("fcw_fang where type1='����' and ifxj=0 and zt=0 and ifok=0 and uid='".$row[uid]."'")?>��</span>
   </li>
   <? }?>
   </ul>
  </div>
  
 </div>
 <!--�ⷿE-->

 <? if(1==$rowcontrol[ifjia]){?>
 <!--װ��B-->
 <? adwhile("ADI16");?>
 <ul class="indexcap">
 <li class="l1 fontyh"><?=webarea?>װ��</li>
 <li class="l2">
 <a href="<?=weburl?>jc/">��װ</a> | 
 <a href="<?=weburl?>zx/xzxlist.html">ѧװ��</a> | 
 <a href="<?=weburl?>designer/caselist.html">������</a> | 
 <a href="<?=weburl?>zx/zbview.html">���б�</a> | 
 <a href="<?=weburl?>zx/">�ҹ�˾</a> | 
 <a href="<?=weburl?>designer/">���ʦ</a> | 
 <a href="<?=weburl?>jc/">ѡ����</a>
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
 <select name="area1" id="area1" class="inp1" onChange="areacha()">
 <option value="0">δѡ��</option>
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
   <li class="l4"><input type="text" class="inp" size="8" name="t3" onFocus="t3focus()" onBlur="t3blur()" value="��֤��" /> <img height="32" class="yz" src="config/yzSes.php" /></li>
   <li class="l3"><? tjbtnr("�ύ����")?></li>
   </ul>
   </form>
   
   <div class="gdmain2" id="Marquee2">
   <!--������ʼ-->
   <? 
   while1("*","fcw_jia_zb order by sj desc limit 30");while($row1=mysql_fetch_array($res1)){
   $mot=substr($row1[mot],0,3)."*****".substr($row1[mot],8,3);
   ?>
   <div class="gd"><?=dateYMDHM($row1[sj])?> <?=strgb2312($row1[lxr],0,2)?>**&nbsp;<?=$mot?></div>
   <? }?>
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
   setTimeout(start2,stoptime2);
   </script>
   <!--��������-->
   </div>

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
  <!--�м�E-->
  
  <!--�Ҳ�B-->
  <div class="d3"><? adread("defaultI03",208,387)?></div>
  <!--�Ҳ�E-->
  
 </div>
 <!--װ��E-->
 <? }?>

 <!--����B-->
 <div class="bolink">
 <ul class="u1">
 <li class="l1 fontyh"><?=webname?>�������</li>
 <li class="l2">
 <? while0("*","fcw_ad where adbh='ADI06' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>"><img alt="<?=$row[tit]?>" border=0 src="ad/<?=$row[bh]?>.<?=$row[jpggif]?>" width="100" height="35"></a>
 <? }?>
 </li>
 </ul>
 <ul class="u1">
 <li class="l1 fontyh"><?=webname?>��������</li>
 <li class="l3">
 <? while0("*","fcw_ad where adbh='ADI07' and type1='����' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>"><?=$row[tit]?></a>
 <? }?>
 </li>
 </ul>
 </div>
 <!--����E-->

</div>

<? include("template/bottom.html");?>
</body>
</html>