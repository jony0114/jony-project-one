<?
include("../../../config/conn.php");
include("../../../config/function.php");
include("../../../config/loupandef.php");
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
<script language="javascript" src="homeimg/jquery.SuperSlide.2.1.1.js"></script>
<script language="javascript" src="homeimg/jquery.SuperSlide.2.1.1.source.js"></script>
<base target="_blank">
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

<!--�л�B-->
<div class="yjcode">

<div class="qhsearch">
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
  <li class="l3"><input type="image" src="homeimg/search.png" width="48" height="49" /></li>
  <li class="l4"><a href="map/index.php?xs=loupan" target="_blank"><img border="0" src="homeimg/ditu.png" width="107" height="49" /></a></li>
  </ul>
  </div>
  <div class="sermain" id="sermain2" style="display:none;">
  <ul class="u2">
  <li class="l1 l12"></li>
  <li class="l2"><input value="������ؼ���" onFocus="fstxtfocus(2)" onBlur="fstxtblur(2)" id="fstxt2" name="fstxt2" type="text" /></li>
  <li class="l3"><input type="image" src="homeimg/search.png" width="48" height="49" /></li>
  <li class="l4"><a href="map/index.php?xs=second" target="_blank"><img border="0" src="homeimg/ditu.png" width="107" height="49" /></a></li>
  </ul>
  </div>
  <div class="sermain" id="sermain3" style="display:none;">
  <ul class="u2">
  <li class="l1 l13"></li>
  <li class="l2"><input value="������ؼ���" onFocus="fstxtfocus(1)" name="fstxt1" id="fstxt1" onBlur="fstxtblur(1)" type="text" /></li>
  <li class="l3"><input type="image" src="homeimg/search.png" width="48" height="49" /></li>
  <li class="l4"><a href="map/index.php?xs=rent" target="_blank"><img border="0" src="homeimg/ditu.png" width="107" height="49" /></a></li>
  </ul>
  </div>
  <div class="sermain" id="sermain4" style="display:none;">
  <ul class="u2">
  <li class="l1 l14"></li>
  <li class="l2"><input value="������ؼ���" onFocus="fstxtfocus(10)" name="fstxt10" id="fstxt10" onBlur="fstxtblur(10)" type="text" /></li>
  <li class="l3"><input type="image" src="homeimg/search.png" width="48" height="49" /></li>
  <li class="l4"></li>
  </ul>
  </div>
  <div class="sermain" id="sermain5" style="display:none;">
  <ul class="u2">
  <li class="l1 l15"></li>
  <li class="l2"><input value="������ؼ���" onFocus="fstxtfocus(9)" name="fstxt9" id="fstxt9" onBlur="fstxtblur(9)" type="text" /></li>
  <li class="l3"><input type="image" src="homeimg/search.png" width="48" height="49" /></li>
  <li class="l4"></li>
  </ul>
  </div>
  </form>
 </div>
 
 <div class="banner" id="banner" >
 <? $i=0;while1("*","fcw_ad where adbh='jia_01' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=$row1[aurl]?>" class="d1" style="background:url(ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>) center no-repeat;"></a>
 <? $i++;}?>
 <div class="d2" id="banner_id">
 <ul style="margin-left:-<?=86*$i/2?>px;">
 <? for($j=0;$j<$i;$j++){?><li></li><? }?>
 </ul>
 </div>
 </div>
 
 <div class="daoh">
  <div class="logo"><img src="homeimg/logo1.png" width="158" height="57" /></div>
  <div class="daoh1">
   <div class="d1"><a href="reg/" class="a1">��¼</a><a href="reg/reg.php" class="a2">����ע��</a></div>
   
   <div class="d2">
    <ul class="topmenu">
    <li><a  class="a1" href="<?=weburl?>" >��ҳ</a></li>
    <li><a href="<?=weburl?>lptuan/tuanlist.html" class="a1">����</a></li>
    
    <li class="hover">
     <a  class="a1" href="<?=weburl?>loupan/" >��¥��</a>
     <div class="nav-list">
     <dd>
     <i></i>
     <dl><a href="<?=weburl?>loupan/" >ȫ��</a></dl>
     <dl><a href="<?=weburl?>lphuxing/huxinglist.html" class="a2">�����ҷ�</a></dl>
     <dl><a href="<?=weburl?>lpjg/" class="a2">�۸�����</a></dl>
     <dl><a href="<?=weburl?>lpnews/newslist.html" class="a2">¥���Ż�</a></dl>
     <dl><a href="<?=weburl?>lpphoto/photolist.html" class="a2">ͼ��¥��</a></dl>
     <dl><a href="<?=weburl?>lpvideo/videolist.html" class="a2">������Ƶ</a></dl>
     <dl><a href="<?=weburl?>lpjob/joblist.html" class="a2">¥����Ƹ</a></dl>
     </dd>
     </div>
    </li>
    
    <li class="hover">
     <a  class="a1" href="<?=weburl?>second/" >���ַ�</a>
     <div class="nav-list">
     <dd>
     <i></i>
     <dl><a href="<?=weburl?>second/" >ȫ��</a></dl>
     <dl><a href="<?=weburl?>second/" class="a2">��Դ�б�</a></dl>
     <dl><a href="<?=weburl?>xq/" class="a2">С���ҷ�</a></dl>
     <dl><a href="<?=weburl?>jjr/jjrlist.html" class="a2">�Ҿ�����</a></dl>
     <dl><a href="<?=weburl?>zj/zjlist.html" class="a2">�н鹫˾</a></dl>
     <dl><a href="<?=weburl?>qiugou/" class="a2">����Ϣ</a></dl>
     </dd>
     </div>
    </li>
    
    <li class="hover">
     <a  class="a1" href="<?=weburl?>rent/" >�� ��</a>
     <div class="nav-list">
     <dd>
     <i></i>
     <dl><a href="<?=weburl?>rent/" class="a2">��Դ�б�</a></dl>
     <dl><a href="<?=weburl?>xq/" class="a2">С���ҷ�</a></dl>
     <dl><a href="<?=weburl?>jjr/jjrlist.html" class="a2">�Ҿ�����</a></dl>
     <dl><a href="<?=weburl?>zj/zjlist.html" class="a2">�н鹫˾</a></dl>
     <dl><a href="<?=weburl?>qiuzu/" class="a2">������Ϣ</a></dl>
     </dd>
     </div>
    </li>
    
    <li><a href="<?=weburl?>news/" class="a1">������Ѷ</a></li>
    
    </ul>
   </div>
   
   </div>
  </div>
  
<script language="javascript">
 banner();
 jQuery(".topmenu").slide({ 
 type:"menu", //Ч������
 titCell:"li", // ��괥������
 targetCell:".nav-list", // Ч�����󣬱��뱻titCell����
 effect:"slideDown",//����Ч��
 delayTime:300, // Ч��ʱ��
 triggerTime:0, //����ӳٴ���ʱ��
 returnDefault:true  //����Ĭ��״̬
 });
</script>


 
</div>
<!--�л�E-->

<div class="yjcode">
 
 <!--�м�B-->
 <div class="zhonj">
 <ul class="u1">
 <li class="l1">�·�</li>
 <li class="l2"><a href="loupan/"><img border="0" src="homeimg/z1.jpg" width="228" height="231" /></a></li>
 <li class="l3">רҵ��ʵ���·���Ϣ�����¼�ʱ<br><a href="loupan/">���·�</a></li>
 </ul>
 <ul class="u1">
 <li class="l1">ҵ��ί��</li>
 <li class="l2"><a href="weituo/"><img border="0" src="homeimg/z2.jpg" width="228" height="231" /></a></li>
 <li class="l3">���ʾ���������ʱ��׼����<br><a href="weituo/">����ί��</a></li>
 </ul>
 <ul class="u1">
 <li class="l1">���ڴ���</li>
 <li class="l2"><a href="dai/"><img border="0" src="homeimg/z3.jpg" width="228" height="231" /></a></li>
 <li class="l3">һվʽ���ڴ��������������<br><a href="dai/">ȥ����</a></li>
 </ul>
 </div>
 <!--�м�E-->
 
 <? adwhile("ADI08");?>
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
 while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 4");while($row=mysql_fetch_array($res)){
 $au="loupan/view".$row[id].".html";
 ?>
 <ul class="u2<? if($i==1){?> u21<? }?>">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="../upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home-1.jpg" width="278" height="185" /></a></li>
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
 while0("*","fcw_xq where admin=2 and zt=0 and ifxj=0 and iftj>0 and wytsid like '%".$wyts."%' order by iftj asc limit 4");while($row=mysql_fetch_array($res)){
 $au="loupan/view".$row[id].".html";
 ?>
 <ul class="u2<? if($i==1){?> u21<? }?>">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="../upload/<?=returnuserid($row[uid])?>/f/<?=$row[bh]?>/home-1.jpg" width="278" height="185" /></a></li>
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

<? adwhile("ADI14");?>
<!--���ַ�B-->
<div class="esf">

 <div class="d1">
  <ul class="u1"><li class="l1">��ѡ���ַ�</li><li class="l2">/����ԤԼ24Сʱ����</li></ul>
  <?
  while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' and iftj>0 order by iftj asc limit 7");if($row=mysql_fetch_array($res)){
  $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
  ?>
  <ul class="u2">
  <li class="l1"><a href="second/view<?=$row[id]?>.html"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="280" height="250" /></a></li>
  <li class="l2"><?=$row[xq]?>[<?=returnarea(1,$row[areaid])?>]</li>
  <li class="l3">
  <?
  $ts=preg_split("/xcf/",$row[wytsid]);
  $tsa=count($ts);if($tsa>4){$tsa=4;}
  for($ti=1;$ti<=$tsa;$ti++){
   if($ts[$ti]!=""){echo returnwyts(1,$ts[$ti])." / ";}
  }?>
  </li>
  <li class="l4"><?=$row[money1]."��"?></li>
  <li class="l5"><?=$row[hx1]?>��<?=$row[hx2]?>��</li>
  <li class="l6"><?=$row[mj]?>�O</li>
  </ul>
  <? }?>
 </div>
 
 <div class="d2">
 <?
 while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1"><a href="second/view<?=$row[id]?>.html"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="193" height="140" /></a></li>
 <li class="l2"><?=$row[xq]?>[<?=returnarea(1,$row[areaid])?>]</li>
 <li class="l3"><?=$row[money1]?>��</li>
 <li class="l4"><?=$row[hx1]?>��<?=$row[hx2]?>��</li>
 <li class="l5"><?=intval($row[mj])?>�O</li>
 </ul>
 <? }?>
 </div>
 
 <div class="d3">
 <ul class="u1"><li class="l1">�����ϼܷ�Դ</li><li class="l2"><a href="second/">����</a></li></ul>
 <?
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' and iftj>0 order by sj desc limit 6");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="u2">
 <li class="l1"><a href="second/view<?=$row[id]?>.html"><?=$row[xq]?></a></li>
 <li class="l2"><?=$row[hx1]?>��<?=$row[hx2]?>��</li>
 <li class="l3"><?=intval($row[mj])?>�O</li>
 <li class="l4"><?=$row[money1]?>��</li>
 </ul>
 <? }?>
 <ul class="u3">
 <li class="l1">���ŵ���</li>
 <? 
 $xs="xcf����xcf";
 $ses="(id=0";
 while1("*","fcw_newstype where admin=2 and xswz like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ses=$ses." or type2id=".$row1[id];
 }
 $ses=$ses.")";
 $id1=0;
 while1("*","fcw_news where zt=0 and ".$ses." order by lastsj desc");if($row1=mysql_fetch_array($res1)){
 $id1=$row1[id];
 ?>
 <a href="news/txtlist_i<?=$row1[id]?>v.html"><?=strgb2312($row1[tit],0,34)?></a><br>
 <? }?>
 <? $id2=0;while1("*","fcw_news where zt=0 and id<>".$id1." and iftp=1 and ".$ses." order by lastsj desc");if($row1=mysql_fetch_array($res1)){$id2=$row1[id];?>
 <li class="l2"><a href="news/txtlist_i<?=$row1[id]?>v.html"><img src="<?=returntp("bh='".$row1[bh]."' order by xh asc","-1")?>" width="70" height="50"></a></li>
 <li class="l3"><a class="a1" href="news/txtlist_i<?=$row1[id]?>v.html"><?=strgb2312($row1[tit],0,44)?></a><br><a href="lptuan/tuanlist.html" class="a2">������������Ѱ೵����</a></li>
 <? }?>
 <? $id2=0;while1("*","fcw_news where zt=0 and id<>".$id1." and id<>".$id2." and iftp=1 and ".$ses." order by lastsj desc");if($row1=mysql_fetch_array($res1)){$id2=$row1[id];?>
 <li class="l4"><a href="news/txtlist_i<?=$row1[id]?>v.html"><?=strgb2312($row1[tit],0,34)?></a></li>
 <? }?>
 <li class="l5"><a href="lptuan/tuanlist.html">������������Ѱ೵����</a></li>
 <li class="l6"><a href="lptuan/tuanlist.html">�鿴����>></a></li>
 </ul>
 </div>
 
</div>
<!--���ַ�E-->

<? adwhile("ADI15");?>
<!--�ⷿB-->
<div class="esf">

 <div class="d1">
  <ul class="u1"><li class="l1">��ѡ�ⷿ</li><li class="l2">/����ԤԼ24Сʱ����</li></ul>
  <?
  while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' and iftj>0 order by iftj asc limit 7");if($row=mysql_fetch_array($res)){
  $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
  ?>
  <ul class="u2">
  <li class="l1"><a href="rent/view<?=$row[id]?>.html"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="280" height="250" /></a></li>
  <li class="l2"><?=$row[xq]?>[<?=returnarea(1,$row[areaid])?>]</li>
  <li class="l3">
  <?
  $ts=preg_split("/xcf/",$row[wytsid]);
  $tsa=count($ts);if($tsa>4){$tsa=4;}
  for($ti=1;$ti<=$tsa;$ti++){
   if($ts[$ti]!=""){echo returnwyts(1,$ts[$ti])." / ";}
  }?>
  </li>
  <li class="l4"><?=returnjgdw($row[money1],$row[jgdw],"����")?></li>
  <li class="l5"><?=$row[hx1]?>��<?=$row[hx2]?>��</li>
  <li class="l6"><?=intval($row[mj])?>�O</li>
  </ul>
  <? }?>
 </div>
 
 <div class="d2">
 <?
 while($row=mysql_fetch_array($res)){
 $tpv=returntp("bh='".$row[bh]."' order by iffm desc limit 1","-1");
 ?>
 <ul class="u1">
 <li class="l1"><a href="rent/view<?=$row[id]?>.html"><img border="0" src="<?=$tpv?>" onerror="this.src='img/none100x75.jpg'" width="193" height="140" /></a></li>
 <li class="l2"><?=$row[xq]?>[<?=returnarea(1,$row[areaid])?>]</li>
 <li class="l3"><?=returnjgdw($row[money1],$row[jgdw],"����")?></li>
 <li class="l4"><?=$row[hx1]?>��<?=$row[hx2]?>��</li>
 <li class="l5"><?=intval($row[mj])?>�O</li>
 </ul>
 <? }?>
 </div>
 
 <div class="d3">
 <ul class="u1"><li class="l1">�����ϼܷ�Դ</li><li class="l2"><a href="rent/">����</a></li></ul>
 <?
 while0("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='����' and iftj>0 order by sj desc limit 6");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="u2">
 <li class="l1"><a href="rent/view<?=$row[id]?>.html"><?=$row[xq]?></a></li>
 <li class="l2"><?=$row[hx1]?>��<?=$row[hx2]?>��</li>
 <li class="l3"><?=$row[mj]?>�O</li>
 <li class="l4"><?=returnjgdw($row[money1],$row[jgdw],"����")?></li>
 </ul>
 <? }?>
 <ul class="u3">
 <li class="l1">���ŵ���</li>
 <? 
 $xs="xcf����xcf";
 $ses="(id=0";
 while1("*","fcw_newstype where admin=2 and xswz like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ses=$ses." or type2id=".$row1[id];
 }
 $ses=$ses.")";
 $id1=0;
 while1("*","fcw_news where zt=0 and ".$ses." order by lastsj desc");if($row1=mysql_fetch_array($res1)){
 $id1=$row1[id];
 ?>
 <a href="news/txtlist_i<?=$row1[id]?>v.html"><?=strgb2312($row1[tit],0,34)?></a><br>
 <? }?>
 <? $id2=0;while1("*","fcw_news where zt=0 and id<>".$id1." and iftp=1 and ".$ses." order by lastsj desc");if($row1=mysql_fetch_array($res1)){$id2=$row1[id];?>
 <li class="l2"><a href="news/txtlist_i<?=$row1[id]?>v.html"><img src="<?=returntp("bh='".$row1[bh]."' order by xh asc","-1")?>" width="70" height="50"></a></li>
 <li class="l3"><a class="a1" href="news/txtlist_i<?=$row1[id]?>v.html"><?=strgb2312($row1[tit],0,44)?></a><br><a href="lptuan/tuanlist.html" class="a2">������������Ѱ೵����</a></li>
 <? }?>
 <? $id2=0;while1("*","fcw_news where zt=0 and id<>".$id1." and id<>".$id2." and iftp=1 and ".$ses." order by lastsj desc");if($row1=mysql_fetch_array($res1)){$id2=$row1[id];?>
 <li class="l4"><a href="news/txtlist_i<?=$row1[id]?>v.html"><?=strgb2312($row1[tit],0,34)?></a></li>
 <? }?>
 <li class="l5"><a href="lptuan/tuanlist.html">������������Ѱ೵����</a></li>
 <li class="l6"><a href="lptuan/tuanlist.html">�鿴����>></a></li>
 </ul>
 </div>
 
</div>
<!--�ⷿE-->

<? adwhile("ADI10");?>
<!--�·���B-->
<div class="tuan">
<ul class="u1"><li class="l1">�·���</li><li class="l2">/����ѡ�����Ź�����</li></ul>
<?
$i=1;
while0("*","fcw_kanfang where zt=0 and iftj>0 order by iftj asc limit 6");while($row=mysql_fetch_array($res)){
$au="loupan/tuanview".$row[id].".html";
while1("*","fcw_xq where bh='".$row[xqbh]."'");$row1=mysql_fetch_array($res1);
?>
<ul class="u2<? if($i % 3==0){?> u20<? }?>" onMouseMove="this.className='u2 u21<? if($i % 3==0){?> u20<? }?>'" onMouseOut="this.className='u2<? if($i % 3==0){?> u20<? }?>'">
<li class="l1"><a href="<?=$au?>" target="_blank"><img src="upload/<?=returnuserid($row[uid])?>/f/<?=$row[xqbh]?>/<?=$row[bh]?>.jpg" border="0" width="383" height="240" /></a></li>
<li class="l2"><?=$row1[xq]?>[<?=returnarea(1,$row[areaid])?>]</li>
<li class="l3">¥�̵�ַ��<?=strgb2312($row1[sladd],0,40)?></li>
<li class="l4"><strong><?=$row1[money1]?></strong>Ԫ/�O</li>
<li class="l5">��ע<strong><?=$row1[djl]?></strong>��</li>
<li class="l6"><a href="<?=$au?>" target="_blank"><img border="0" src="homeimg/kan.gif" width="114" height="32" /></a></li>
</ul>
<? $i++;}?>
</div>
<!--�·���E-->

<? adwhile("ADI12");?>
<!--��ѶB-->
<div class="news">

 <div class="d1">
  <ul class="u1"><li class="l1">������Ѷ</li><li class="l2">/¥�з��ƣ�Ͷ��ָ��</li></ul>
  <div class="fl">
  <? while1("*","fcw_newstype where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
  <a href="news/newslist_j<?=$row1[id]?>v.html"><?=$row1[name1]?></a>
  <? }?>
  </div>
  <ul class="u2">
  <? while1("*","fcw_news where zt=0 and iftp=1 order by lastsj desc limit 4");while($row1=mysql_fetch_array($res1)){?>
  <li class="l1"><a href="news/txtlist_i<?=$row1[id]?>v.html"><img src="<?=returntp("bh='".$row1[bh]."' order by xh asc","-1")?>" width="210" height="110"><span><?=strgb2312($row1[tit],0,40)?></span></a></li>
  <? }?>
  </ul>
 </div>

 <div class="d2">
 <ul class="u1"><li class="l1">���·�����Ѷ</li><li class="l2"><a href="news/">������Ѷ</a></li></ul>
 <ul class="u2">
 <li class="l1"><img src="homeimg/zx.png" width="70" height="70" /></li>
 <li class="l2">
 <? while1("*","fcw_news where zt=0 order by lastsj desc limit 10");for($i=1;$i<=3;$i++){if($row1=mysql_fetch_array($res1)){?>
 <a href="news/txtlist_i<?=$row1[id]?>v.html"><?=strgb2312($row1[tit],0,44)?></a><br>
 <? }}?>
 </li>
 <? $i=1;while($row1=mysql_fetch_array($res1)){?>
 <li class="l3"><span><?=$i?></span></li>
 <li class="l4"><a href="news/txtlist_i<?=$row1[id]?>v.html"><?=strgb2312($row1[tit],0,45)?></a></li>
 <li class="l5"><?=date("n",$row1[sj])?>.<?=date("d",$row1[sj])?></li>
 <? $i++;}?>
 </ul>
 </div>
 
 <div class="d3">
 <iframe marginwidth="1" marginheight="1" width="313px" height="315px" border="0" frameborder="0" src="lpjg/lpjgzs/esf.php"></iframe>
 </div>

</div>
<!--��ѶE-->

</div>

<!--�ײ�B-->
<div class="bfb ibottom">
<div class="yjcode">
 <ul class="u1">
 <li class="l1"><img src="homeimg/zhen.gif" width="131" height="153" /></li>
 <li class="l2">
 <span class="cap">���ٵ���</span>
 <a href="<?=weburl?>"><?=webname?></a><br>
 <a href="<?=weburl?>loupan/"><?=webarea?>�·�</a><br>
 <a href="<?=weburl?>second/"><?=webarea?>���ַ�</a><br>
 <a href="<?=weburl?>rent/"><?=webarea?>�ⷿ</a>
 </li>
 <li class="l2">
 <span class="cap">��ҵ����</span>
 <a href="<?=weburl?>reg/reg.php">�����û����뷿����</a><br>
 <a href="<?=weburl?>reg/reg.php?u=2">��������פ</a><br>
 <a href="<?=weburl?>reg/reg.php?u=3">�н��ŵ����</a><br>
 <a href="<?=weburl?>reg/reg.php?u=5">¥����פ</a><br>
 </li>
 <li class="l2">
 <span class="cap">��ɫ����</span>
 <a href="<?=weburl?>user/mianzhuce.php?control=chushou">��ѷ������۷�Դ</a><br>
 <a href="<?=weburl?>user/mianzhuce.php?control=chuzu">��ѷ������ⷿԴ</a><br>
 <a href="<?=weburl?>user/mianzhuce.php?control=qiugou">��ѷ�������Ϣ</a><br>
 <a href="<?=weburl?>user/mianzhuce.php?control=qiuzu">��ѷ���������Ϣ</a><br>
 </li>
 <li class="l2">
 <span class="cap">��������</span>
 <a href="tool/dkjsq/" target="_blank">��������</a><br>
 <a href="tool/dkjsq/index.php?t=gjj" target="_blank">���������</a><br>
 <a href="tool/gfnlpg/" target="_blank">��������</a><br>
 <a href="tool/tqhdjsq/" target="_blank">��ǰ����</a>
 </li>
 <li class="l2">
 <span class="cap">��ά��ɨ��</span>
 <a href="mt/" target="_blank"><img border="0" src="<?=weburl?>template/getqr.php?u=<?=weburl."m/"?>&size=3" style="margin:5px 0 0 0;" /></a>
 </li>
 </ul>
 <ul class="u2">
 <li class="l1">�������ӣ�</li>
 <li class="l2">
 <? while0("*","fcw_ad where adbh='ADI07' and type1='����' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>"><?=$row[tit]?></a>
 <? }?>
 </li>
 </ul>
 
</div>
</div>
<!--�ײ�E-->

<? include("../../../template/bottom.html");?>
<script language="javascript">
if(document.getElementById("rightcontact")){
document.getElementById("rightcontact").className="contact fontyh disyes";
document.getElementById("righttel").className="tel fontyh disno";
}
</script>
</body>
</html>