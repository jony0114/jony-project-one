//阅读更多
function readmore(x,y){
document.getElementById(x).className=y;
document.getElementById(x+"more").style.display="none";
}

function layerts(x){
layer.open({
    content: x
    ,skin: 'msg'
    ,time: 3
  });
}

//复制
function copyToClipboard(elementId) {

  var aux = document.createElement("input");

  aux.setAttribute("value", document.getElementById(elementId).innerHTML);

  document.body.appendChild(aux);

  aux.select();

  document.execCommand("copy");

  document.body.removeChild(aux);
  layerts("已复制");

}

//跳转
function gourl(x){
 location.href=x;
}

//搜索条件框
function sertjonc(x,y){ //x表示当前ID，y表示所有的
document.body.scrollTop = 0;
s=document.getElementById("sertj"+x);
if(s.style.display==""){s.style.display="none";}else{s.style.display="";}
for(i=1;i<=y;i++){
if(x!=i){document.getElementById("sertj"+i).style.display="none";}
}
}

//区域 
function areacha(){
document.getElementById("fareas").style.display="";
window.frames["fareas"].location.href="../../config/areas_m.php?id="+document.getElementById("area1").value;	
}

//全选
function xuan(){
 c2=document.getElementsByName("C2");
 c=document.getElementsByName("C1");
 if(c2[0].checked){
 for(i=0;i<c.length;i++){
 c[i].checked="checked";
 }
 }else{
 for(i=0;i<c.length;i++){
 c[i].checked=false;
 }
 }
}
function xuan1(){
 c21=document.getElementsByName("C21");
 c11=document.getElementsByName("C11");
 if(c21[0].checked){
 for(i=0;i<c11.length;i++){
 c11[i].checked="checked";
 }
 }else{
 for(i=0;i<c11.length;i++){
 c11[i].checked=false;
 }
 }
}

function tjwait(){
document.getElementById("tjbtn").style.display="none";
document.getElementById("tjing").style.display="";	
}

//邮箱判断
function isEmail(str){//判断邮箱
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}

//刷新SESSION，不退出
var xmlHttpsD = false;
try {
  xmlHttpsD = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpsD = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpsD = false;
  }
}
if (!xmlHttpsD && typeof XMLHttpRequest != 'undefined') {
  xmlHttpsD = new XMLHttpRequest();
}
function sessDOT() {
  xmlHttpsD.open("post", "../template/sesDOT.php", true);
  xmlHttpsD.onreadystatechange = updatePagesD;
  xmlHttpsD.send(null);  
}

function updatePagesD() {
  if (xmlHttpsD.readyState == 4) {
  setTimeout("sessDOT()",100000);
  }
}

//联系我们弹窗
function lxwmopen(){
str="<span class='lxwmopen1'>联系我们 / CONTACT US</span>";
str=str+"<span class='lxwmopen2'>"+document.getElementById("lxwmtxtYJ").innerHTML+"</span>";
//str=str+"<span class='lxwmopen2'>泰国总部 / （+66）082-535-6699</span>";
//str=str+"<span class='lxwmopen3'>83/87 Moo.2, T.Rawai, A.Mueang ,Phuket 83130, THAILAND</span>";
//str=str+"<span class='lxwmopen4'></span>";
//str=str+"<span class='lxwmopen2'>泰国总部 / （+66）082-535-6699</span>";
//str=str+"<span class='lxwmopen3'>83/87 Moo.2, T.Rawai, A.Mueang ,Phuket 83130, THAILAND</span>";
//str=str+"<span class='lxwmopen4'></span>";
//str=str+"<span class='lxwmopen2'>泰国总部 / （+66）082-535-6699</span>";
//str=str+"<span class='lxwmopen3'>83/87 Moo.2, T.Rawai, A.Mueang ,Phuket 83130, THAILAND</span>";
//str=str+"<span class='lxwmopen5'></span>";
layer.open({
    content: str
  });
}

//微信咨询弹窗
function wxzxopen(){
str="<span class='wxzxopen1'><img src='img/wx.png' /></span>";
str=str+"<span class='wxzxopen2'>微信联系我：<span id='wx_element'>"+document.getElementById("weixinLXYJ").innerHTML+"</span></span>";
str=str+"<span class='wxzxopen3'>添加普吉小助手微信，<strong class='s1'>备注“VIP T”</strong></span>";
str=str+"<span class='wxzxopen4'>普吉置业为您提供一站式优质服务</span>";
str=str+"<span class='wxzxopen5' onclick=\"copyToClipboard('wx_element')\">点击复制微信号</span>";
layer.open({
    content: str
  });
}

function clolayer(){
layer.closeAll();
}

//电话弹窗
function telopen(){
str="<span class='telopen1'>点击号码即可拔号</span>";
str=str+"<span class='telopen2'><a href='tel:4008036089'>(深圳) 4008-036-089</a></span>";
str=str+"<span class='telopen3'><a href='tel:4008988987'>(北京) 4008-988-987</a></span>";
layer.open({
    content: str
  });
}
