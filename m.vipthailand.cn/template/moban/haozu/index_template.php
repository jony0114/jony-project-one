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
<!--对联广告判断开始-->
<?
while1("*","fcw_ad where adbh='ADDL' order by xh asc");if($row1=mysql_fetch_array($res1)){
?>
<script language="JavaScript" src="js/dlad.js"></script>
<script language="javascript">
 var theFloaters= new floaters();
 //右面
 theFloaters.addItem('followDiv1','document.body.clientWidth-106',80,'<div class="ad1"><a href="<?=$row1[aurl]?>" target=_blank><img border=0 src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>"></a></div><span class="dlclo" onclick="dlonc()">关闭</span>');
 //左面
 <? $row1=mysql_fetch_array($res1)?>
 theFloaters.addItem('followDiv2',6,80,'<div class="ad1"><a href="<?=$row1[aurl]?>" target=_blank><img border=0 src="ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>"></a></div><span class="dlclo" onclick="dlonc()">关闭</span>');
 theFloaters.play();
</script>
<?
}
?>
<!--对联广告判断结束-->

<!--切换B-->
<div class="yjcode">
 
 <div class="banner" id="banner" >
 <? $i=0;while1("*","fcw_ad where adbh='haozu_01' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=$row1[aurl]?>" class="d1" style="background:url(ad/<?=$row1[bh]?>.<?=$row1[jpggif]?>) center no-repeat;"></a>
 <? $i++;}?>
 <div class="d2" id="banner_id">
 <ul style="margin-left:-<?=86*$i/2?>px;">
 <? for($j=0;$j<$i;$j++){?><li></li><? }?>
 </ul>
 </div>
 </div>
 
 <div class="daoh">
  <div class="logo"><img src="homeimg/logo1.png" /></div>
  <div class="daoh1">
   <div class="d1"><a href="reg/" class="a1">登录</a><a href="reg/reg.php" class="a2">立即注册</a><span class="tel"><?=$rowcontrol[webtelv]?></span></div>
   
   <div class="d2">
    <ul class="topmenu">
    <li><a  class="a1" href="<?=weburl?>" >首页</a></li>
    <li><a href="<?=weburl?>lptuan/tuanlist.html" class="a1">买房团</a></li>
    
    <li class="hover">
     <a  class="a1" href="<?=weburl?>loupan/" >新楼盘</a>
     <div class="nav-list">
     <dd>
     <i class="i1"></i>
     <i class="i2"></i>
     <dl><a href="<?=weburl?>lphuxing/huxinglist.html" class="a2">户型找房</a></dl>
     <dl><a href="<?=weburl?>lpjg/" class="a2">价格走势</a></dl>
     <dl><a href="<?=weburl?>lpnews/newslist.html" class="a2">楼盘优惠</a></dl>
     <dl><a href="<?=weburl?>lpphoto/photolist.html" class="a2">图解楼盘</a></dl>
     <dl><a href="<?=weburl?>lpvideo/videolist.html" class="a2">精彩视频</a></dl>
     <dl><a href="<?=weburl?>lpjob/joblist.html" class="a2">楼盘招聘</a></dl>
     </dd>
     </div>
    </li>
    
    <li class="hover">
     <a  class="a1" href="<?=weburl?>second/" >二手房</a>
     <div class="nav-list">
     <dd>
     <i class="i1"></i>
     <i class="i2"></i>
     <dl><a href="<?=weburl?>second/" class="a2">房源列表</a></dl>
     <dl><a href="<?=weburl?>xq/" class="a2">小区找房</a></dl>
     <dl><a href="<?=weburl?>jjr/jjrlist.html" class="a2">找经纪人</a></dl>
     <dl><a href="<?=weburl?>zj/zjlist.html" class="a2">中介公司</a></dl>
     <dl><a href="<?=weburl?>qiugou/" class="a2">求购信息</a></dl>
     </dd>
     </div>
    </li>
    
    <li class="hover">
     <a  class="a1" href="<?=weburl?>rent/" >租 房</a>
     <div class="nav-list">
     <dd>
     <i class="i1"></i>
     <i class="i2"></i>
     <dl><a href="<?=weburl?>rent/" class="a2">房源列表</a></dl>
     <dl><a href="<?=weburl?>xq/" class="a2">小区找房</a></dl>
     <dl><a href="<?=weburl?>jjr/jjrlist.html" class="a2">找经纪人</a></dl>
     <dl><a href="<?=weburl?>zj/zjlist.html" class="a2">中介公司</a></dl>
     <dl><a href="<?=weburl?>qiuzu/" class="a2">求租信息</a></dl>
     </dd>
     </div>
    </li>
    
    <li><a href="<?=weburl?>news/" class="a1">房产资讯</a></li>
    
    </ul>
   </div>
   
   </div>
  </div>

<script language="javascript">
 banner();
 jQuery(".topmenu").slide({ 
 type:"menu", //效果类型
 titCell:"li", // 鼠标触发对象
 targetCell:".nav-list", // 效果对象，必须被titCell包含
 effect:"slideDown",//下拉效果
 delayTime:300, // 效果时间
 triggerTime:0, //鼠标延迟触发时间
 returnDefault:true  //返回默认状态
 });
</script>


 <div class="qhsearch">
  <form name="f1" method="post" action="search/index.php?admin=20">
  <ul class="u1">
  <li class="l1">
  <input type="text" name="t1" data-tip="请输入小区名称" placeholder="请输入小区名称" id="searcht1" autocomplete="off" disableautocomplete>
  <div id="searchHtml" style="display:none;"></div>
  </li>
  <li class="l2"><input type="submit" class="fontyh" value="开始找房" /></li>
  <li class="l3"><a href="map/index.php?xs=xq" target="_blank">地图找房</a></li>
  </ul>
  </form>
 </div>
 <script language="javascript">
 function searchCHA(){
  t1v=document.f1.t1.value;
  document.getElementById("searchHtml").innerHTML="";
  document.getElementById("searchHtml").style.display="none";
  if(t1v!=""){
     $.post("homeimg/xqsearch.php",{keyv:t1v},function(result){
      $("#searchHtml").html(result);
	  if(result!=""){
	  document.getElementById("searchHtml").style.display="";
	  }
     });
  }
 }
 $('#searcht1').bind('input propertychange', function() {
  searchCHA();
 });
 </script>

 
</div>
<!--切换E-->
<div class="bfb"></div>
<div class="yjcode">

<!--核心商圈B-->
<? adwhile("haozu01");?>
<div class="hxsq">
 <ul class="indexcap">
 <li class="l1">核心商圈</li>
 <li class="l2">核心地段 成熟配套</li>
 </ul>
 <div class="dcap">
 <? $i=1;while1("*","fcw_area where admin=1 order by xh asc limit 10");while($row1=mysql_fetch_array($res1)){?>
 <a href="javascript:void(0);" onMouseOver="dcapover(<?=$i?>)" id="dcapa<?=$i?>"><?=$row1[name1]?></a>
 <? $i++;}?>
 </div>
 <? $i=1;while1("*","fcw_area where admin=1 order by xh asc limit 10");while($row1=mysql_fetch_array($res1)){?>
 <div class="sq" id="sq<?=$i?>" style="display:none;">
 <? while2("*","fcw_shangquan where zt=0 and areaid=".$row1[id]." order by sj desc limit 4");while($row2=mysql_fetch_array($res2)){$au="xq/search_e".$row2[id]."v.html";?>
 <div class="sqm">
  <div class="d1"><a href="<?=$au?>" target="_blank"><img class="sqmimg" src="upload/shangquan/<?=$row2[bh]?>/home.jpg" width="285" height="360" /></a></div>
  <div class="d2" id="sqmd<?=$row2[id]?>"><span><strong><?=$row2[tit]?></strong><br><?=returntitdian(strip_tags($row2[txt]),90)?>[<a href="<?=$au?>" target="_blank">更多</a>]</span></div>
 </div>
 <? }?>
 </div>
 <? $i++;}?>
 <span id="spnum" style="display:none;"><?=$i?></span>
</div>
<!--核心商圈E-->

<!--精选写字楼B-->
<? adwhile("haozu02");?>
<div class="jxxzl">
 <ul class="indexcap">
 <li class="l1">精选写字楼</li>
 <li class="l2">高性价 高格调 超精致</li>
 </ul>
 <? 
 $i=1;
 while1("*","fcw_fang where zt=0 and ifxj=0 and xq<>'' and type1='出租' and wylx='写字楼' and iftj>0 order by iftj asc limit 8");while($row1=mysql_fetch_array($res1)){
 $tpv=returntp("bh='".$row1[bh]."' order by iffm desc limit 1","-1");
 $au="rent/view".$row1[id].".html";
 ?>
 <ul class="u1 u1<?=$i?>">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border=0 src="<?=$tpv?>" /></a></li>
 <li class="l2"><a href="<?=$au?>" target="_blank"><?=strgb2312($row1[xq],0,30)?></a></li>
 <li class="l3"><?=returnarea(1,$row1[areaid])?>-<?=returnarea(2,$row1[areaids])?></li>
 <li class="l4"><strong><?=$row1[money1]?></strong>元/月</li>
 </ul>
 <?
 $i++;
 }
 ?>
</div>
<!--精选写字楼E-->

<!--找B-->
<div class="zhao"><a href="weituozhao/" target="_blank"></a></div>
<!--找E-->

</div>

<div class="bfb bfbinew">
<div class="yjcode">
 <!--资讯B-->
 <? adwhile("haozu03");?>
 <ul class="indexcap">
 <li class="l1">资讯中心</li>
 <li class="l2">了解行业动态，把握市场脉搏</li>
 </ul>
 <? while1("*","fcw_news where indextop=1 and zt=0 order by lastsj desc limit 1");if($row1=mysql_fetch_array($res1)){$au="news/txtlist_i".$row1[id]."v.html";$tid=$row1[id];?>
 <div class="d1">
 <span><a href="<?=$au?>" target="_blank"><?=strgb2312($row1[tit],0,43)?></a></span>
 <a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntp("bh='".$row1[bh]."' order by xh asc","")?>" width=380 /></a>
 </div>
 <? }?>
 <? while1("*","fcw_newstype where admin=1 order by xh asc limit 2");while($row1=mysql_fetch_array($res1)){?>
 <div class="d2">
  <? 
  while2("*","fcw_news where zt=0 and type1id=".$row1[id]." and id<>".$tid." order by lastsj desc limit 6");if($row2=mysql_fetch_array($res2)){
  $au="news/txtlist_i".$row2[id]."v.html";
  ?>
  <div class="dtp">
   <span><a href="<?=$au?>" target="_blank"><?=strgb2312($row2[tit],0,43)?></a></span>
   <a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntp("bh='".$row2[bh]."' order by xh asc","-1")?>" width=390 /></a>
  </div>
  <ul class="u1">
  <li class="l1"><?=$row1[name1]?></li>
  <li class="l2"><a href="news/newslist_j<?=$row1[id]?>v.html" target="_blank">更多>></a></li>
  <? while($row2=mysql_fetch_array($res2)){$au="news/txtlist_i".$row2[id]."v.html";?>
  <li class="l3"><a href="<?=$au?>" target="_blank"><?=strgb2312($row2[tit],0,43)?></a></li>
  <li class="l4"><?=date("m",strtotime($row2[sj]))?>/<?=date("d",strtotime($row2[sj]))?></li>
  <? }?>
  </ul>
  <? }?>
 </div>
 <? }?>
 <!--资讯E-->
 
 <ul class="nzhuce">
 <li class="l1">注册会员啦！会员季招募，加入<?=webname?>会员，尊享贵宾找房福利</li>
 <li class="l2"><a href="reg/reg.php">立即注册</a></li>
 </ul>
 
</div>
</div>

<script language="javascript">
function dcapover(x){
for(i=1;i<document.getElementById("spnum").innerHTML;i++){
 document.getElementById("sq"+i).style.display="none";
 document.getElementById("dcapa"+i).className="";
}
 document.getElementById("sq"+x).style.display="";
 document.getElementById("dcapa"+x).className="a1";
}
dcapover(1);
$(function(){
	$w = $('.sqmimg').width();
	$h = $('.sqmimg').height();
	$w2 = $w + 10;
	$h2 = $h + 10;
	$('.sqmimg').hover(function(){
		 $(this).stop().animate({height:$h2,width:$w2,left:"-5px",top:"-5px"},200);
	},function(){
		 $(this).stop().animate({height:$h,width:$w,left:"0px",top:"0px"},200);
	});

	$('.sqm').hover(function(){
		 $(this).find(".d2").stop().animate({top:"-80px"},300);
	},function(){
		 $(this).find(".d2").stop().animate({top:"0px"},300);
	});

});
</script>

<div class="bfb bfbibgg">
<img src="homeimg/ibottom.gif" />
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