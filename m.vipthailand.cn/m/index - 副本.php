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

<link rel="stylesheet" href="css/owl.carousel.min.css"/>
<style type="text/css">
	.post-slide{
		width:90%;
	}
	.post-slide .post-img img{
		width: 100%;
		transition: all 1s ease-in-out 0s;
	}
	.post-slide:hover .post-img img{
		transform: scale(1.08);
	}
	.post-slide .post-content{
		padding: 10px 0;
	}
	.post-slide .post-title{color:#21354D;
		font-size: 17px;
		font-weight: 100;
		margin-top: 0;
		text-transform: capitalize;
	}
	.post-slide .post-title a{
		display: inline-block;
		color: #21354D;
		transition: all 0.3s ease 0s;
	}
	.post-slide .post-title a:hover{
		color: #3d3030;
		text-decoration: none;
	}
	.post-slide .post-description{
		font-size: 15px;
		color: #666666;
		line-height: 24px;
		margin:5px 0;
	}
	.post-slide .post-bar{
		padding: 0;
		margin-bottom: 15px;
		list-style: none;
	}
	.post-slide .post-bar li{
		color: #676767;
		padding: 2px 0;
	}
	.post-slide .post-bar li i{
		margin-right: 5px;
	}
	.post-slide .post-bar li a{
		display: inline-block;
		font-size: 12px;
		color: #808080;
		transition: all 0.3s ease 0s;
	}
	.post-slide .post-bar li a:after{
		content: ",";
	}
	.post-slide .post-bar li a:last-child:after{
		content: "";
	}
	.post-slide .post-bar li a:hover{
		color: #3d3030;
		text-decoration: none;
	}
	.post-slide .read-more{
		font-size: 15px;
font-weight:100;		color: #FABE00;
		border-bottom-right-radius: 10px;
		text-transform: capitalize;
		transition: all 0.30s linear;
	}
</style>

</head>
<body>
<div class="yjcode">
<? include("template/top.php");?>

<!--图片B-->
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
<!--图片E-->

<div class="shouye1 box">
<div class="d1" onclick="gourl('xmlist.php')"><img src="img/index1.png" height="25" /><br>普吉项目</div>
<div class="d1" onclick="gourl('tzznlist.php')"><img src="img/index2.png" height="25" /><br>投资指南</div>
<div class="d1" onclick="gourl('fckc.php')"><img src="img/index3.png" height="25" /><br>房产考察</div>
<div class="d1 d0" onclick="gourl('about.php')"><img src="img/index4.png" height="25" /><br>关于我们</div>
</div>

<!--普吉项目-->
<div class="shouye2 box">
<div class="d1"><strong>普吉项目</strong><span>Phuket Project</span></div>
</div>
<div class="pjxm box">
<div class="main">
<div class="demo">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="padding: 1em 0;">
				<div id="news-slider" class="owl-carousel">
                <?
                while0("*","fcw_xq where admin=2 and zt=0 and areaid>0 and ifxj=0 order by xsxh asc limit 20");while($row=mysql_fetch_array($res)){
					$tp="../upload/".returnuserid($row[uid])."/f/".$row[bh]."/home.jpg";
				?>
					<div class="post-slide">
						<div class="post-img">
							<a href="xmview<?=$row[id]?>.html"><img src="<?=$tp?>" style="border-radius:4px;" alt=""></a>
						</div>
						<div class="post-content">
							<h3 class="post-title"><a href="xmview<?=$row[id]?>.html"><?=$row[xq]?></a></h3>
							<p class="post-description">
								<?=$row[tjly]?>
							</p>
							<a href="xmview<?=$row[id]?>.html" class="read-more">均价：<?=$row[money1]/10000?>万/㎡</a>
						</div>
					</div>
                    <? }?>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#news-slider").owlCarousel({
			items:3,
			itemsDesktop:[1199,2],
			itemsDesktopSmall:[980,2],
			itemsMobile:[400,1],
			pagination:false,
			navigationText:false,
			autoPlay:true
		});
	});
</script>
</div>
</div>

<!--投资助手-->
<div class="shouye2 box">
<div class="d1"><strong>投资助手</strong><span>Investment Assistant</span></div>
</div>
<div class="shouye6 box">
<div class="d1" onclick="gourl('wd.php')"><img src="img/i1.png" height="25" /><br>房产问答</div>
<div class="d1" onclick="gourl('gflc.php')"><img src="img/i2.png" height="25" /><br>购房流程</div>
<div class="d1" onclick="gourl('tzlblist.php')"><img src="img/i3.png" height="25" /><br>投资礼包</div>
<div class="d1" onclick="gourl('tzznlist_j57v.html')"><img src="img/i4.png" height="25" /><br>政策解答</div>
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
<div class="d1">加载更多 ></div>
</div>
</div>
<script language="javascript">
function tzznonc(x,y){
 for(i=1;i<=3;i++){
 document.getElementById("tzzncap"+i).className="";
 }
 document.getElementById("tzzncap"+x).className="a1";
 document.getElementById("newsdiv").innerHTML="";
 npage1=1;
 allpage1=1;
 nowadmin=1;
 nceng="newsdiv";
 readlist(1,x,y);
}
function morenews(){
readlist(1,nowi,nowtyid);
}

var nowadmin=1;
var npage1=1; //资讯当前页面
var npage2=1; //发现泰国当前页面
var allpage1=1; //资讯所有页面
var allpage2=1; //发现泰国所有页面
var nowi1;
var nowtyid1;
var nowi2;
var nowtyid2;
var nceng;
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
  str=response.split("yj99");
  if(nowadmin==1){npage1=npage1+1;npage=npage1;allpage1=parseInt(str[0]);}
  else if(nowadmin==2){npage2=npage2+1;npage=npage2;allpage2=parseInt(str[0]);}
  document.getElementById(nceng).innerHTML=document.getElementById(nceng).innerHTML+str[1];
 }
}

function readlist(x,y,z){ //x=1表示资讯 2表示发现泰国 y是当前I值 z是当前分类ID
 nowadmin=x;
 if(x==1){
 nowi1=y;
 nowtyid1=z;
 allpage=allpage1;
 npage=npage1;
 }else{
 nowi2=y;
 nowtyid2=z;
 allpage=allpage2;
 npage=npage2;
 }
 if(npage>allpage){alert("已经显示所有信息");return false;}
 var url = "read_list.php?p="+npage+"&admin="+x+"&ni="+y+"&tyid="+z;
 xmlHttp.open("get", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}
<?=$nja?>
</script>

<!--发现泰国-->
<div class="shouye2 box">
<div class="d1"><strong>发现泰国</strong><span>Discover Thailand</span></div>
</div>
<div class="shouye3 box">
<div class="d1">
 <a href="javascript:void(0);" onclick="fxtgonc(1,1)" id="fxtgcap1">旅游线路</a>
 <a href="javascript:void(0);" onclick="fxtgonc(2,2)" id="fxtgcap2">吃喝玩乐</a>
 <a href="javascript:void(0);" onclick="fxtgonc(3,3)" id="fxtgcap3">泰国文化</a>
</div>
</div>
<div id="fxtgdiv"></div>
<div class="shouye5 box" onclick="morefxtg()">
<div class="d1">加载更多 ></div>
</div>
</div>
<script language="javascript">
function fxtgonc(x,y){
 for(i=1;i<=3;i++){
 document.getElementById("fxtgcap"+i).className="";
 }
 document.getElementById("fxtgcap"+x).className="a1";
 document.getElementById("fxtgdiv").innerHTML="";
 npage2=1;
 nowadmin=2;
 allpage2=1;
 nceng="fxtgdiv";
 readlist(2,x,y);
}
function morefxtg(){
readlist(2,nowi2,nowtyid2);
}

fxtgonc(1,1);
</script>

<div id="weixinLXYJ" style="display:none;"><?=$rowcontrol[weixin]?></div>
<div class="shouye7 box">
<div class="d1"><img src="img/ib1.png" /></div>
<div class="d1"><img src="img/ib2.png" /></div>
<div class="d1 d0"><img src="img/ib3.png" onclick="wxzxopen()" /></div>
</div>
<div class="shouye8 box">
<div class="d1"><?=returnonecontrol(10)?></div>
</div>

<div class="bottommain"></div>
<div class="gbottom1 box">
 <div class="d1"><img src="img/nbo1.png" /><br>首页</div>
 <div class="d2"><img src="img/nbo2.png" /><br>在线咨询</div>
 <div class="d3"><a href="tel:<?=$rowcontrol[webtelv]?>"><img src="img/nbo4.png" /><br>400电话</a></div>
</div>
</div>

</body>
</html>