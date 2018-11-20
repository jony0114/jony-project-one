//手机版判断
function is_mobile() {
    var regex_match = /(nokia|iphone|android|motorola|^mot-|softbank|foma|docomo|kddi|up.browser|up.link|htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte-|longcos|pantech|gionee|^sie-|portalmmm|jigs browser|hiptop|^benq|haier|^lct|operas*mobi|opera*mini|320x320|240x320|176x220)/i;
  var u = navigator.userAgent;
  if (null == u) {
   return true;
  }
  var result = regex_match.exec(u);

  if (null == result) {
   return false
  } else {
   return true
  }
}

//顶部搜索
var topweb="loupan";
var toptj="";
var topp="search";
function topaover(a,b,c,d){
topweb=b;
toptj=c;
topp=d;
for(i=1;i<=6;i++){
document.getElementById("topa"+i).className="";
}
document.getElementById("topa"+a).className="a1";
}
function topser(){
if((document.topf.topsert.value).replace("/\s/","")==""){alert("请输入关键词");document.topf.topsert.focus();return false;}
topf.action=document.getElementById("webhttp").innerHTML+"search/index.php?admin=99"+"&web="+topweb+"&tj="+toptj+"&p="+topp;
}

var xmlHttpses = false;
try {
  xmlHttpses = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpses = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpses = false;
  }
}
if (!xmlHttpses && typeof XMLHttpRequest != 'undefined') {
  xmlHttpses = new XMLHttpRequest();
}
function userCheckses(){
    url =document.getElementById("webhttp").innerHTML+"template/sesCheck.php";
    xmlHttpses.open("get", url, true);
    xmlHttpses.onreadystatechange = updatePageses;
    xmlHttpses.send(null);
	}
function updatePageses() {
  if (xmlHttpses.readyState == 4) {
   response = xmlHttpses.responseText;
   response=response.replace(/[\r\n]/g,'');
   if(response=="none"){notlogin.style.display="";yeslogin.style.display="none";return false;}
   else{
    yeslogin.style.display="";
	notlogin.style.display="none";
	fh=response;
	if(response=="yk"){document.getElementById("tuzx").style.display="none";fh="游客";}
	document.getElementById("yesuid").innerHTML=fh;
	return false;
   }
  }
}

//菜单
function smenuover(x){
document.getElementById("smenu"+x).style.display="";
}
function smenuout(x){
document.getElementById("smenu"+x).style.display="none";
}

//用$进行简写
function $(objectId) { 
if(document.getElementById && document.getElementById(objectId)) { // W3C DOM 
return document.getElementById(objectId); 
} 
else if (document.all && document.all(objectId)) { // MSIE 4 DOM 
return document.all(objectId); 
} 
else if (document.layers && document.layers[objectId]) { // NN 4 DOM.. note: this won't find nested layers 
return document.layers[objectId]; 
} 
else { 
return false; 
} 
}

function areacha(){
document.getElementById("fareas").style.display="";
window.frames["fareas"].location.href="../config/areas.php?id="+document.getElementById("area1").value;	
}

function tjwait(){
document.getElementById("tjbtn").style.display="none";
document.getElementById("tjing").style.display="";	
}

//弹窗
function tangc(x){
 if(0==x){document.getElementById("bghui").style.display="none";document.getElementById("openw").style.display="none";}
 else if(1==x){document.getElementById("bghui").style.display="";document.getElementById("openw").style.display="";
  document.getElementById("bghui").style.width="100%";
  st=Math.max(document.documentElement.scrollTop,document.body.scrollTop);
  if(!+[1,]){
  document.getElementById("bghui").style.height=document.body.clientHeight;
  document.getElementById("openw").style.left=document.body.clientWidth/2-151;
  document.getElementById("openw").style.top=st+200;
  }else{
  document.getElementById("bghui").style.height=document.documentElement.clientHeight;
  document.getElementById("openw").style.left=document.documentElement.clientWidth/2-151;
  document.getElementById("openw").style.top=window.document.body.offsetHeight/2-170+st;
  }
 }
}

//邮箱判断
function isEmail(str){//判断邮箱
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}

//回到顶部
function gotoTop(acceleration,stime){acceleration=acceleration||0.1;stime=stime||10;var x1=0;var y1=0;var x2=0;var y2=0;var x3=0;var y3=0;if(document.documentElement){x1=document.documentElement.scrollLeft||0;y1=document.documentElement.scrollTop||0;}
if(document.body){x2=document.body.scrollLeft||0;y2=document.body.scrollTop||0;}
var x3=window.scrollX||0;var y3=window.scrollY||0;var x=Math.max(x1,Math.max(x2,x3));var y=Math.max(y1,Math.max(y2,y3));var speeding=1+ acceleration;window.scrollTo(Math.floor(x/speeding),Math.floor(y/speeding));if(x>0||y>0){var run="gotoTop("+ acceleration+", "+ stime+")";window.setTimeout(run,stime);}}

//对象DIS
function objdis(x,y){
 if(0==x){document.getElementById(y).style.display="none";}	
 else if(1==x){document.getElementById(y).style.display="";}	
}

//跳转
function gourl(x){
 location.href=x;
}

//分站
function fzqhover(){
document.getElementById("fzqh").style.display="";
}
function fzqhout(){
document.getElementById("fzqh").style.display="none";
}

//二维码下拉
function adi17over(){
document.getElementById("tadi17").style.display="";
}
function adi17out(){
document.getElementById("tadi17").style.display="none";
}