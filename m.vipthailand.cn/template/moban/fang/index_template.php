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
<link rel="shortcut icon" href="img/favicon.ico" />
<link href="css/basic.css?vt=<?=time()?>" rel="stylesheet" type="text/css" />
<link href="css/index.css?vt=<?=time()?>" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js?vt=<?=time()?>"></script>
<script language="javascript" src="homeimg/jquery.js"></script>
<script language="javascript" src="js/index.js?vt=<?=time()?>"></script>
<? if(empty($rowcontrol[ifwap])){?>
<script language="javascript">
if(is_mobile()) {document.location.href= '<?=weburl?>m/';}
</script>
<? }?>
</head>
<body>
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


<!--������ʼ-->
<div class="bfb bfbindextop">
<div class="yjcode">

 <div class="top1">
  <ul class="u1">
  <li class="l2"><a href="<?=weburl?>" class="a1">��ҳ</a></li>
  
  <li class="l3" onMouseOver="smenuover(2)" onMouseOut="smenuout(2)">
   <a href="<?=weburl?>loupan/" class="a1">��¥��</a>
   <div class="smenu" id="smenu2" style="display:none;">
   <a href="<?=weburl?>lphuxing/huxinglist.html" class="a2">�����ҷ�</a>
   <a href="<?=weburl?>lpjg/" class="a2">�۸�����</a>
   <a href="<?=weburl?>lpnews/newslist.html" class="a2">¥���Ż�</a>
   <a href="<?=weburl?>lpphoto/photolist.html" class="a2">ͼ��¥��</a>
   <a href="<?=weburl?>lpvideo/videolist.html" class="a2">������Ƶ</a>
   <a href="<?=weburl?>lpjob/joblist.html" class="a2">¥����Ƹ</a>
   </div>
  </li>
  
  <li class="l3"><a href="<?=weburl?>lptuan/tuanlist.html" class="red a1">����<span class="s1"><img border="0" src="<?=weburl?>img/icon7.gif" /></span></a></li>
  
  <li class="l3" onMouseOver="smenuover(1)" onMouseOut="smenuout(1)">
   <a href="<?=weburl?>second/" class="a1">���ַ�</a>
   <div class="smenu" id="smenu1" style="display:none;">
   <a href="<?=weburl?>second/" class="a2">��Ҫ��</a>
   <a href="<?=weburl?>rent/" class="a2">��Ҫ�ⷿ</a>
   <a href="<?=weburl?>xq/" class="a2">С���ҷ�</a>
   <a href="<?=weburl?>jjr/jjrlist.html" class="a2">�Ҿ�����</a>
   <a href="<?=weburl?>zj/zjlist.html" class="a2">�н鹫˾</a>
   <a href="<?=weburl?>qiugou/" class="a2">����Ϣ</a>
   <a href="<?=weburl?>qiuzu/" class="a2">������Ϣ</a>
   </div>
  </li>

  <? if(1==$rowcontrol[ifjia]){?>
  <li class="l3" onMouseOver="smenuover(4)" onMouseOut="smenuout(4)">
  <a href="<?=weburl?>jc/" class="a1">��װ��</a>
   <div class="smenu" id="smenu4" style="display:none;">
   <a href="<?=weburl?>zx/xzxlist.html" class="a2">ѧװ��</a>
   <a href="<?=weburl?>zx/" class="a2">װ�޹�˾</a>
   <a href="<?=weburl?>designer/caselist.html" class="a2">������</a>
   <a href="<?=weburl?>zx/zbview.html" class="a2">���б�</a>
   <a href="<?=weburl?>designer/" class="a2">���ʦ</a>
   <a href="<?=weburl?>jc/" class="a2">ѡ����</a>
   </div>
  </li>
  <? }?>

  <li class="l4"><a href="<?=weburl?>map/index.php?xs=loupan" class="a1" target="_blank">��ͼ�ҷ�</a></li>

  <li class="l4"><a href="<?=weburl?>news/" class="a1">������Ѷ</a></li>
  
  <li class="l3" onMouseOver="smenuover(5)" onMouseOut="smenuout(5)">
   <a href="<?=weburl?>tool/dkjsq/" class="a1">��������</a>
   <div class="smenu" id="smenu5" style="display:none;">
   <a href="<?=weburl?>dai/" class="a2">���ڴ���</a>
   <a href="<?=weburl?>tool/dkjsq/" class="a2">���������</a>
   <a href="<?=weburl?>tool/dkjsq/index.php?t=gjj" class="a2">���������</a>
   <a href="<?=weburl?>tool/tqhdjsq/" class="a2">��ǰ����</a>
   <a href="<?=weburl?>tool/gfnlpg/" class="a2">��������</a>
   </div>
  </li>
  
  </ul>
 <div class="ks">
  <span id="notlogin">
   <span class="s1"><a href="<?=weburl?>reg/" class="a1">��¼</a> | <a href="<?=weburl?>reg/reg.php" class="a1">���ע��</a></span>
  </span>
  <span id="yeslogin" style="display:none;">
  <span class="feng" id="yesuid"></span>&nbsp;<a href="<?=weburl?>user/" id="tuzx">��Ա����</a> | <a href="<?=weburl?>user/un.php">�˳�</a>
  </span>
 </div>
 </div>
 
</div>
</div>
<span id="webhttp" style="display:none"><?=weburl?></span>
<script language="javascript">
userCheckses();
</script>
<!--��������-->


<!--�л�B-->
<div class="yjcode">
 
<div class="qhsearch">
  <div class="logo"><img border="0" src="homeimg/logo1.png" /></div>
  <? if(panduan("*","fcw_fz")==1){?>
  <div class="ifz">
  <span class="s1"><?=webarea?></span>
  <div class="d1" onMouseOver="ifzqhover()" onmouseleave="ifzqhout()">
  <a href="javascript:void(0)" class="a1">[�л�����]</a>
  <div id="ifzqh" style="display:none;">
  <? while1("*","fcw_fz order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <a href="<?=$row1[furl]?>" class="a2" target="_blank"><?=$row1[name1]?></a>
  <? }?>
  </div>
  </div>
  </div>
  <? }?>
  <form name="f1" method="post" onSubmit="return indextj()">
  <ul class="u1">
  <li class="l1 l11" id="sercap1" onMouseOver="serover(1)">���·�</li>
  <li class="l1" id="sercap2" onMouseOver="serover(2)">���ַ�</li>
  <li class="l1" id="sercap3" onMouseOver="serover(3)">�ⷿ</li>
  <li class="l1" id="sercap4" onMouseOver="serover(4)">���н�</li>
  <li class="l1" id="sercap5" onMouseOver="serover(5)">������</li>
  <li class="l2"><a href="mt/" target="_blank">�ֻ��ҷ�</a></li>
  </ul>
  <div class="sermain" id="sermain1">
  <ul class="u2">
  <li class="l1 l11"></li>
  <li class="l2"><input value="������ؼ���" onFocus="fstxtfocus(19)" onBlur="fstxtblur(19)" id="fstxt19" name="fstxt19" type="text" /></li>
  <li class="l3"><input type="image" src="homeimg/search.png" width="60" height="42" /></li>
  </ul>
  </div>
  <div class="sermain" id="sermain2" style="display:none;">
  <ul class="u2">
  <li class="l1 l12"></li>
  <li class="l2"><input value="������ؼ���" onFocus="fstxtfocus(2)" onBlur="fstxtblur(2)" id="fstxt2" name="fstxt2" type="text" /></li>
  <li class="l3"><input type="image" src="homeimg/search.png" width="60" height="42" /></li>
  </ul>
  </div>
  <div class="sermain" id="sermain3" style="display:none;">
  <ul class="u2">
  <li class="l1 l13"></li>
  <li class="l2"><input value="������ؼ���" onFocus="fstxtfocus(1)" name="fstxt1" id="fstxt1" onBlur="fstxtblur(1)" type="text" /></li>
  <li class="l3"><input type="image" src="homeimg/search.png" width="60" height="42" /></li>
  </ul>
  </div>
  <div class="sermain" id="sermain4" style="display:none;">
  <ul class="u2">
  <li class="l1 l14"></li>
  <li class="l2"><input value="������ؼ���" onFocus="fstxtfocus(10)" name="fstxt10" id="fstxt10" onBlur="fstxtblur(10)" type="text" /></li>
  <li class="l3"><input type="image" src="homeimg/search.png" width="60" height="42" /></li>
  </ul>
  </div>
  <div class="sermain" id="sermain5" style="display:none;">
  <ul class="u2">
  <li class="l1 l15"></li>
  <li class="l2"><input value="������ؼ���" onFocus="fstxtfocus(9)" name="fstxt9" id="fstxt9" onBlur="fstxtblur(9)" type="text" /></li>
  <li class="l3"><input type="image" src="homeimg/search.png" width="60" height="42" /></li>
  </ul>
  </div>
  </form>
 </div>
 
 <div class="banner" id="banner" >
 <? $i=0;while1("*","fcw_ad where adbh='fang_ADQH' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=$row1[aurl]?>" class="d1" style="background:url(ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>) center no-repeat;"></a>
 <? $i++;}?>
 <div class="d2" id="banner_id">
 <ul style="margin-left:-<?=86*$i/2?>px;">
 <? for($j=0;$j<$i;$j++){?><li></li><? }?>
 </ul>
 </div>
 </div>
 <script language="javascript">
 banner();
 </script>
</div>
<!--�л�E-->

<div class="bfb bfbks">
<div class="yjcode">
 <ul class="indexks fontyh">
 <li class="l1">
 <strong>�·�</strong>
 <span><a href="loupan/" target="_blank">�·�����</a><br><a href="loupan/fenxiaoview.html">ȫ��Ӫ��</a></span>
 </li>
 <li class="l2">
 <strong>���ַ�</strong>
 <span><a href="second/" target="_blank">�з�����</a><br><a href="qiugou/" target="_blank">��</a> <a href="map/index.php?xs=second" target="_blank">��ͼ</a></span>
 </li>
 <li class="l3">
 <strong>�ⷿ</strong>
 <span><a href="rent/" target="_blank">�з�����</a><br><a href="qiuzu/" target="_blank">����</a> <a href="map/index.php?xs=rent" target="_blank">��ͼ</a></span>
 </li>
 </ul>
</div>
</div>

<div class="yjcode">

 <? adwhile("ADI08")?>
 <!--¥��B-->
 <div class="lp fontyh">
 <ul class="u1">
 <li class="l0 l1" id="lpcap0" onMouseOver="lpcapover(0)">����¥��</li>
 <? $i=1;$ts="xcf¥��";while1("*","fcw_wyts where lpwy like '%".$ts."%' order by xh asc limit 3");while($row1=mysql_fetch_array($res1)){?>
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
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="../upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home.jpg" width="220" height="145" /></a></li>
 <li class="l2"><a href="<?=$au?>" target="_blank"><?=$row[xq]?></a> [<?=returnarea(1,$row[areaid])?>]</li>
 <li class="l3">���ۣ�<strong><?=$row[money1]?></strong>Ԫ/�O</li>
 <? while2("*","fcw_kanfang where xqbh='".$row[bh]."' and zt=0 order by sj desc limit 1");if($row2=mysql_fetch_array($res2)){$u="loupan/tuanview".$row2[id].".html";?>
 <li class="l4"><a href="<?=$u?>" title="<?=$row2[tit]?>" target="_blank"><?=strgb2312($row2[tit],0,40)?></a></li>
 <li class="l5"><input type="button" onClick="gourl('<?=$u?>')" value="����" class="fontyh" /></li>
 <? }?>
 </ul>
 <? $i++;}?>
 </div>

 <? $j=1;$ts="xcf¥��";while1("*","fcw_wyts where lpwy like '%".$ts."%' order by xh asc limit 3");while($row1=mysql_fetch_array($res1)){?>
 <div class="lpmain" id="lpmain<?=$j?>" style="display:none;">
 <? 
 $i=1;
 $wyts="xcf".$row1[id]."xcf";
 while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 and wytsid like '%".$wyts."%' order by iftj asc limit 5");while($row=mysql_fetch_array($res)){
 $au="loupan/view".$row[id].".html";
 ?>
 <ul class="u2<? if($i==1){?> u21<? }?>">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="../upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home.jpg" width="220" height="145" /></a></li>
 <li class="l2"><a href="<?=$au?>" target="_blank"><?=$row[xq]?></a> [<?=returnarea(1,$row[areaid])?>]</li>
 <li class="l3">���ۣ�<strong><?=$row[money1]?></strong>Ԫ/�O</li>
 <? while2("*","fcw_kanfang where xqbh='".$row[bh]."' and zt=0 order by sj desc limit 1");if($row2=mysql_fetch_array($res2)){$u="loupan/tuanview".$row2[id].".html";?>
 <li class="l4"><a href="<?=$u?>" title="<?=$row2[tit]?>" target="_blank"><?=strgb2312($row2[tit],0,40)?></a></li>
 <li class="l5"><input type="button" onClick="gourl('<?=$u?>')" value="����" class="fontyh" /></li>
 <? }?>
 </ul>
 <? $i++;}?>
 </div>
 <? $j++;}?>

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
 <li class="l1"><span><?=returnxq($row1[xqbh],"bh")?> (<?=returnarea(1,$row1[areaid])?>)</span><a href="lptj/view<?=$row1[id]?>.html"><img border="0" src="<?=returntp("bh='".$row1[bh]."'","-1")?>" width="282" height="190" /></a></li>
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
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="upload/<?=returnuserid($row[uid])?>/f/<?=$row[xqbh]?>/<?=$row[bh]?>.jpg" width="383" height="260" /></a></li>
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
  <a href="javascript:void(0);" target="_self" class="jgy" id="leftjg1" onMouseOver="jgover(1)" onMouseOut="jgout(1)" onClick="jgonc(1)">50������</a>
  <a href="javascript:void(0);" target="_self" class="jg" id="leftjg2" onMouseOver="jgover(2)" onMouseOut="jgout(2)" onClick="jgonc(2)">50-80��</a>
  <a href="javascript:void(0);" target="_self" class="jg" id="leftjg3" onMouseOver="jgover(3)" onMouseOut="jgout(3)" onClick="jgonc(3)">80������</a>
  </li>
  <li class="cap"><strong>����</strong></li>
  <li class="l1">
  <? $i=1;while1("*","fcw_fwlc order by xh asc limit 2");while($row1=mysql_fetch_array($res1)){if($i==1){$lcv=$row1[id];}?>
  <a href="javascript:void(0);" target="_self" class="lx lx<?=$i?>y" id="leftlx<?=$i?>" onMouseOver="hxsover('lx',<?=$i?>)" onMouseOut="hxsout('lx',<?=$i?>)" onClick="hxsonc('lx',<?=$i?>,<?=$row1[id]?>)"><?=$row1[name1]?></a>
  <? $i++;}?>
  <? $i=3;while1("*","fcw_zxqk order by xh asc limit 2");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" target="_self" class="lx lx<?=$i?>y" id="leftlx<?=$i?>" onMouseOver="hxsover('lx',<?=$i?>)" onMouseOut="hxsout('lx',<?=$i?>)" onClick="hxsonc('lx',<?=$i?>,<?=$row1[id]?>)"><?=$row1[name1]?></a>
  <? $i++;}?>
  </li>
  <li class="cap"><strong>����</strong></li>
  <li class="l1">
  <a href="javascript:hxsonc('hx',1,1)" target="_self" class="hx hx1y" id="lefthx1" onMouseOver="hxsover('hx',1)" onMouseOut="hxsout('hx',1)">һ��</a>
  <a href="javascript:hxsonc('hx',2,2)" target="_self" class="hx hx2" id="lefthx2" onMouseOver="hxsover('hx',2)" onMouseOut="hxsout('hx',2)">����</a>
  <a href="javascript:hxsonc('hx',3,3)" target="_self" class="hx hx3" id="lefthx3" onMouseOver="hxsover('hx',3)" onMouseOut="hxsout('hx',3)">����</a>
  <a href="javascript:hxsonc('hx',4,4)" target="_self" class="hx hx4" id="lefthx4" onMouseOver="hxsover('hx',4)" onMouseOut="hxsout('hx',4)">����</a>
  </li>
  <li class="l2"><input type="button" onClick="hxsearch()" value="����ɸѡ"></li>
  </ul>
  </div>
  <script language="javascript">jgonc(1);hxsonc('lx',1,<?=$lcv?>);hxsonc('hx',1,1);</script>
  
  <div class="d1">
   <?
   while0("*","fcw_huxing where zt=0 order by sj desc limit 6");while($row=mysql_fetch_array($res)){
   $tpv="upload/".returnuserid($row[uid])."/f/".$row[xqbh]."/".$row[bh]."-1.jpg";
   $au="loupan/huxingview".$row[id].".html";
   ?>
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none200x150.jpg'" width="190" height="120" /></a></li>
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
	setTimeout(start1,stoptime1);
  </script>
  </div>
  <!--��������-->
  
 </div>
 <!--����E-->

 <? adwhile("ADI14")?>
 <!--���ַ�B-->
 <div class="esf fontyh">
 <ul class="ucap">
 <li class="l1">���ַ�</li>
 <li class="l2 l21" id="esf1" onMouseOver="esfover(1)">���ַ�����</li>
 <li class="l2" id="esf2" onMouseOver="esfover(2)">���ַ�����</li>
 <li class="l2" id="esf3" onMouseOver="esfover(3)">д��¥����</li>
 <li class="l2" id="esf4" onMouseOver="esfover(4)">д��¥����</li>
 <li class="l2" id="esf5" onMouseOver="esfover(5)">���̳���</li>
 <li class="l2" id="esf6" onMouseOver="esfover(6)">���̳���</li>
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
 <a href="second/search_d1v_e1v.html">һ����</a> | 
 <a href="second/search_d2v_e2v.html">������</a> | 
 <a href="second/search_d3v_e3v.html">������</a> | 
 <a href="second/search_d4v_e4v.html">�ľ���</a> | 
 <a href="second/">����</a>
 </li>
 <li class="l1">
 <? 
 $i=0;$a=preg_split("/,/",$rowcontrol[ESFSELMv]);$ai=count($a);if($ai>5){$ai=5;}for($j=0;$j<=$ai;$j++){
 if(0==$i){$str=$a[0]."������";$m1=0;$m2=$a[0];}
 elseif(count($a)==$i){$str=$a[count($a)-1]."������";$m1=$a[count($a)-1];$m2=99999;}
 else{$str=$a[$j-1]."-".$a[$j]."��";$m1=$a[$j-1];$m2=$a[$j];}
 ?>
 <a href="second/search_b<?=$m1?>v_c<?=$m2?>v.html"><?=$str?></a> | 
 <? $i++;}?>
 </li>
 <li class="l2"><a href="second/">��������</a></li>
 </ul>
 <ul class="u2">
 <? while0("id,uid,usertype,nc,company,lastsj,sfzrz","fcw_user where usertype=2 and sfzrz=1 order by lastsj desc limit 4");while($row=mysql_fetch_array($res)){?>
 <li class="l1">
 <a href="jjr/view<?=$row[id]?>.html"><img class="tp" src="<?="upload/".$row[id]."/user.jpg"?>" onerror="this.src='user/img/nonetx.gif'" style="margin:0 10px 0 0;" width="77" height="77" border="0" align="left" /></a>
 <a href="jjr/view<?=$row[id]?>.html" class="a1"><?=$row[nc]?></a><br><?=$row[company]?><br>
 ����<strong class="red"><?=returncount("fcw_fang where type1='����' and ifxj=0 and zt=0 and ifok=0 and uid='".$row[uid]."'")?></strong>�� | 
 ����<strong class="red"><?=returncount("fcw_fang where type1='����' and ifxj=0 and zt=0 and ifok=0 and uid='".$row[uid]."'")?></strong>��
 </li>
 <? }?>
 <li class="l2"><a href="jjr/jjrlist.html">���ྭ����</a></li>
 </ul>
 </div>
 
 <div class="d2" id="esfmain1">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' and (wylx='��Ԣ' or wylx='סլ') order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="second/view<?=$row[id]?>.html"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="209" height="130" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong>�� <?=$row[mj]?>�O <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><?=$row[hx1]?>��<?=$row[hx2]?>��&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>�� <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>
 
 <div class="d2" id="esfmain2" style="display:none;">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' and (wylx='��Ԣ' or wylx='סլ') order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="rent/view<?=$row[id]?>.html"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="209" height="130" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong><?=$row[jgdw]?> <?=$row[mj]?>�O <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><?=$row[hx1]?>��<?=$row[hx2]?>��&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>�� <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>
 
 <div class="d2" id="esfmain3" style="display:none;">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' and wylx='д��¥' order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="second/view<?=$row[id]?>.html"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="209" height="130" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong>�� <?=$row[mj]?>�O <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><? while1("id,name1","fcw_xzllx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?>&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>�� <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>
 
 <div class="d2" id="esfmain4" style="display:none;">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' and wylx='д��¥' order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="rent/view<?=$row[id]?>.html"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="209" height="130" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong><?=$row[jgdw]?> <?=$row[mj]?>�O <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><? while1("id,name1","fcw_xzllx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?>&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>�� <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>
 
 <div class="d2" id="esfmain5" style="display:none;">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' and wylx='����' order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="second/view<?=$row[id]?>.html"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="209" height="130" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong>�� <?=$row[mj]?>�O <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><? while1("id,name1","fcw_splx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?>&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>�� <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>
 
 <div class="d2" id="esfmain6" style="display:none;">
 <? 
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' and wylx='����' order by sj desc limit 9");while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1">
 <span><?=$row[xq]?></span><a href="rent/view<?=$row[id]?>.html"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="209" height="130" /></a>
 </li>
 <li class="l2"><strong><?=$row[money1]?></strong><?=$row[jgdw]?> <?=$row[mj]?>�O <?=returnarea(1,$row[areaid])?></li>
 <li class="l3"><? while1("id,name1","fcw_splx where id=".$row[lxid]);if($row1=mysql_fetch_array($res1)){echo $row1[name1];}?>&nbsp;&nbsp;<?=$row[lc1]?>/<?=$row[lc2]?>�� <?=returnfwcx($row[cxid])?></li>
 </ul>
 <? }?>
 </div>

 <div class="d3">
  <div class="ks">
  <a href="reg/" class="a1" target="_blank">�û���¼</a>
  <a href="reg/reg.php" class="a2" target="_blank">ע���û�</a>
  <a href="user/mianzhuce.php?control=chushou" class="a3" target="_blank">��������</a>
  <a href="user/mianzhuce.php?control=chuzu" class="a4" target="_blank">��������</a>
  <a href="tool/dkjsq/" class="a6" target="_blank">��������</a>
  <a href="tool/dkjsq/index.php?t=gjj" class="a7" target="_blank">���������</a>
  <a href="tool/gfnlpg/" class="a5" target="_blank">��������</a>
  <a href="tool/tqhdjsq/" class="a8" target="_blank">��ǰ����</a>
  </div>
  <div class="ad"><? adread("fang_ad01",280,410)?></div>
 </div>
 
 </div>
 <!--���ַ�E-->


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