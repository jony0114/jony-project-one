<?
include("../config/conn.php");
include("../config/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title><?=$rowcontrol[webtit]?></title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="index.js"></script>

<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/idangerous.swiper.min.js"></script>
<link rel="stylesheet" href="css/idangerous.swiper1.css">
  <style>
.swiper-container {
  width: 100%;
  color: #666;
  text-align: center;
}
.swiper-slide {
  text-align:left;
}
.swiper-slide .dm{float:left;margin:0 5px;width:calc(100% - 10px);}
.swiper-slide img{border-radius:5px;}
.swiper-slide span{float:left;width:100%;clear:both;}
.swiper-slide .s1{font-size:16px;height:27px;margin:7px 0 0 0;color:#24354F;}
.swiper-slide .s2{line-height:20px;color:#666666;font-size:14px;overflow:hidden;height:40px;}
.swiper-slide .s3{font-size:15px;color:#F9BE00;padding:7px 0 0 0;}
.pagination {
  position: absolute;
  z-index: 20;
  left: 10px;
  bottom: 10px;
}
.swiper-pagination-switch {
  display: inline-block;
  width: 8px;
  height: 8px;
  border-radius: 8px;
  background: #222;
  margin-right: 5px;
  opacity: 0.8;
  border: 1px solid #fff;
  cursor: pointer;
}
.swiper-visible-switch {
  background: #aaa;
}
.swiper-active-switch {
  background: #fff;
}  
  
  </style>

</head>
<body>
<div class="yjcode">
<? include("template/top.php");?>

<!--ͼƬB-->
<div class="addWrap">
 <div class="swipe" id="mySwipe">
   <div class="swipe-wrap">
   <?
   $iv=0;
   while1("*","fcw_ad where adbh='MT01' order by xh asc");while($row1=mysql_fetch_array($res1)){
   $tp="../ad/".$row1[bh].".".$row1[jpggif];
   ?>
   <div>
    <a href="<?=$row1[aurl]?>"><img class="img-responsive" src="<?=$tp?>" /></a>
   </div>
   <? $iv++;}?>
   </div>
  </div>
  <ul id="position"><? for($j=0;$j<$iv;$j++){?><li class="<? if(0==$j){?>cur<? }?>"></li><? }?></ul>
</div>
<script src="js/swipe.js"></script> 
<script type="text/javascript">
var bullets = document.getElementById('position').getElementsByTagName('li');
var banner = Swipe(document.getElementById('mySwipe'), {
auto: 2000,
continuous: true,
disableScroll:false,
callback: function(pos) {
var i = bullets.length;
while (i--) {
bullets[i].className = ' ';
}
bullets[pos].className = 'cur';
}});
</script>
<!--ͼƬE-->

<div class="shouye1 box">
<div class="d1" onclick="gourl('xmlist.php')"><img src="img/index1.png" height="25" /><br>�ռ���Ŀ</div>
<div class="d1" onclick="gourl('tzznlist.php')"><img src="img/index2.png" height="25" /><br>Ͷ��ָ��</div>
<div class="d1" onclick="gourl('fckc.php')"><img src="img/index3.png" height="25" /><br>��������</div>
<div class="d1 d0" onclick="gourl('about.php')"><img src="img/index4.png" height="25" /><br>��������</div>
</div>

<!--�ռ���Ŀ-->
<div class="shouye2 box">
<div class="d1"><strong>�ռ���Ŀ</strong><span><?=strtoupper("Phuket Project")?></span></div>
</div>
<div class="pjxm box">
<div class="main">

  <div class="swiper-container" id="swiper-container">
    <div class="swiper-wrapper">
                <? $i=1;
                while0("*","fcw_xq where admin=2 and zt=0 and areaid>0 and ifxj=0 order by xsxh asc limit 20");while($row=mysql_fetch_array($res)){
					$tp="../upload/".returnuserid($row[uid])."/f/".$row[bh]."/home.jpg";
				?>
        <div class="swiper-slide" onclick="gourl('xmview<?=$row[id]?>.html')"><div class="dm">
<img src="<?=$tp?>" width="100%" id="lrimg<?=$i?>" /><span class="s1"><?=$row[xq]?></span><span class="s2"><?=$row[tjly]?></span><span class="s3">���ۣ�<?=$row[money1]/10000?>��/�O</span>
        </div></div>
        <? $i++;}?>
    </div>
    <div class="pagination" style="display:none;"></div>
  </div>
  <script src="js/jquery-1.10.1.min.js"></script>
  <script src="js/idangerous.swiper.min.js"></script>
  <script>
  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    paginationClickable: true,
    slidesPerView: 2,
    loop: true
  })
  a=document.getElementById("lrimg1").height+110;
  document.getElementById("swiper-container").style.height=a+"px";
  </script>

</div>
</div>

<!--Ͷ������-->
<div class="shouye2 box">
<div class="d1"><strong>Ͷ������</strong><span><?=strtoupper("Investment Assistant")?></span></div>
</div>
<div class="shouye6 box">
<div class="d1" onclick="gourl('wd.php')"><img src="img/i1.png" height="25" /><br>�����ʴ�</div>
<div class="d1" onclick="gourl('gflc.php')"><img src="img/i2.png" height="25" /><br>��������</div>
<div class="d1" onclick="gourl('tzlblist.php')"><img src="img/i3.png" height="25" /><br>Ͷ�����</div>
<div class="d1" onclick="gourl('tzznlist_j57v.html')"><img src="img/i4.png" height="25" /><br>���߽��</div>
</div>

<div class="tzzncap box">
<div class="d1">
 <? $i=1;while1("*","fcw_newstype where admin=1 order by xh asc limit 3");while($row1=mysql_fetch_array($res1)){?>
 <a href="javascript:void(0);"<? if($i==1){$nja="tzznonc(".$i.",".$row1[id].")";}?> onclick="tzznonc(<?=$i?>,<?=$row1[id]?>)" id="tzzncap<?=$i?>"><?=$row1[name1]?></a>
 <? $i++;}?>
</div>
</div>
<div id="newsdiv"></div>
<div class="shouye5 box" onclick="morenews()">
<div class="d1">���ظ��� ></div>
</div>
</div>
<script language="javascript">
function tzznonc(x,y){
 for(i=1;i<=3;i++){
 document.getElementById("tzzncap"+i).className="";
 }
 document.getElementById("tzzncap"+x).className="a1";
 document.getElementById("newsdiv").innerHTML="";
 npage=1;
 allpage=1;
 readlist(x,y);
}
function morenews(){
readlist(nowi,nowtyid);
}

var npage=1; //��ǰҳ��
var allpage=1; //����ҳ��
var nowi;
var nowtyid;
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}
 
function updatePage() {
 if (xmlHttp.readyState == 4) {
  response = xmlHttp.responseText;
  npage=npage+1;
  str=response.split("yj99");
  allpage=parseInt(str[0]);
  document.getElementById("newsdiv").innerHTML=document.getElementById("newsdiv").innerHTML+str[1];
 }
}

function readlist(y,z){ //y�ǵ�ǰIֵ z�ǵ�ǰ����ID
 nowi=y;
 nowtyid=z;
 if(npage>allpage){alert("�Ѿ���ʾ������Ϣ");return false;}
 url = "read_list.php?p="+npage+"&admin=1&ni="+y+"&tyid="+z;
 xmlHttp.open("get", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}
<?=$nja?>
</script>

<!--����̩��-->
<div class="shouye2 box">
<div class="d1"><strong>����̩��</strong><span><?=strtoupper("Discover Thailand")?></span></div>
</div>
<div class="shouye3 box">
<div class="d1">
 <a href="javascript:void(0);" onclick="fxtgonc(1)" id="fxtgcap1">������·</a>
 <a href="javascript:void(0);" onclick="fxtgonc(2)" id="fxtgcap2">�Ժ�����</a>
 <a href="javascript:void(0);" onclick="fxtgonc(3)" id="fxtgcap3">̩���Ļ�</a>
</div>
</div>
<div id="fxtgdiv"></div>
<div class="shouye5 box" onclick="morefxtg()">
<div class="d1">���ظ��� ></div>
</div>
</div>
<script language="javascript">
function fxtgonc(x){
 for(i=1;i<=3;i++){
 document.getElementById("fxtgcap"+i).className="";
 }
 document.getElementById("fxtgcap"+x).className="a1";
 document.getElementById("fxtgdiv").innerHTML="";
 npage1=1;
 allpage1=1;
 readlist1(x);
}
function morefxtg(){
readlist1(nowi1);
}

var npage1=1; //��ǰҳ��
var allpage1=1; //����ҳ��
var nowi1=1;
var xmlHttp1 = false;
try {
  xmlHttp1 = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp1 = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp1 = false;
  }
}
if (!xmlHttp1 && typeof XMLHttpRequest != 'undefined') {
  xmlHttp1 = new XMLHttpRequest();
}
 
function updatePage1() {
 if (xmlHttp1.readyState == 4) {
  response = xmlHttp1.responseText;
  npage1=npage1+1;
  str=response.split("yj99");
  allpage1=parseInt(str[0]);
  document.getElementById("fxtgdiv").innerHTML=document.getElementById("fxtgdiv").innerHTML+str[1];
 }
}

function readlist1(y){ //y�ǵ�ǰIֵ
 nowi1=y;
 if(npage1>allpage1){alert("�Ѿ���ʾ������Ϣ");return false;}
 url1 = "read_list.php?p="+npage1+"&admin=2&ni="+y;
 xmlHttp1.open("get", url1, true);
 xmlHttp1.onreadystatechange = updatePage1;
 xmlHttp1.send(null);
}
fxtgonc(1);
</script>

<div id="weixinLXYJ" style="display:none;"><?=$rowcontrol[weixin]?></div>
<div class="shouye7 box">
<div class="d1"><a href="https://weibo.com/phuket0755" target="_blank"><img src="img/ib1.png" /></a></div>
<div class="d1"><a href="https://www.zhihu.com/org/vippu-ji-dao-zhi-ye/activities" target="_blank"><img src="img/ib2.png" /></a></div>
<div class="d1 d0"><img src="img/ib3.png" onclick="wxzxopen()" /></div>
</div>
<div class="shouye8 box">
<div class="d1"><?=returnonecontrol(10)?></div>
</div>

<div class="bottommain"></div>
<div class="gbottom1 box">
 <div class="d1"><img src="img/nbo1.png" /><br>��ҳ</div>
 <div class="d2"><a href="https://static.meiqia.com/dist/standalone.html?_=t&eid=115738" target="_blank"><img src="img/nbo2.png" /><br>������ѯ</a></div>
 <div class="d3"><a href="javascript:void(0);" onclick="telopen()"><img src="img/nbo4.png" /><br>400�绰</a></div>
</div>
</div>

</body>
</html>