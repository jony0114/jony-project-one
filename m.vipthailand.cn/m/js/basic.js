//�Ķ�����
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

//����
function copyToClipboard(elementId) {

  var aux = document.createElement("input");

  aux.setAttribute("value", document.getElementById(elementId).innerHTML);

  document.body.appendChild(aux);

  aux.select();

  document.execCommand("copy");

  document.body.removeChild(aux);
  layerts("�Ѹ���");

}

//��ת
function gourl(x){
 location.href=x;
}

//����������
function sertjonc(x,y){ //x��ʾ��ǰID��y��ʾ���е�
document.body.scrollTop = 0;
s=document.getElementById("sertj"+x);
if(s.style.display==""){s.style.display="none";}else{s.style.display="";}
for(i=1;i<=y;i++){
if(x!=i){document.getElementById("sertj"+i).style.display="none";}
}
}

//���� 
function areacha(){
document.getElementById("fareas").style.display="";
window.frames["fareas"].location.href="../../config/areas_m.php?id="+document.getElementById("area1").value;	
}

//ȫѡ
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

//�����ж�
function isEmail(str){//�ж�����
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}

//ˢ��SESSION�����˳�
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

//��ϵ���ǵ���
function lxwmopen(){
str="<span class='lxwmopen1'>��ϵ���� / CONTACT US</span>";
str=str+"<span class='lxwmopen2'>"+document.getElementById("lxwmtxtYJ").innerHTML+"</span>";
//str=str+"<span class='lxwmopen2'>̩���ܲ� / ��+66��082-535-6699</span>";
//str=str+"<span class='lxwmopen3'>83/87 Moo.2, T.Rawai, A.Mueang ,Phuket 83130, THAILAND</span>";
//str=str+"<span class='lxwmopen4'></span>";
//str=str+"<span class='lxwmopen2'>̩���ܲ� / ��+66��082-535-6699</span>";
//str=str+"<span class='lxwmopen3'>83/87 Moo.2, T.Rawai, A.Mueang ,Phuket 83130, THAILAND</span>";
//str=str+"<span class='lxwmopen4'></span>";
//str=str+"<span class='lxwmopen2'>̩���ܲ� / ��+66��082-535-6699</span>";
//str=str+"<span class='lxwmopen3'>83/87 Moo.2, T.Rawai, A.Mueang ,Phuket 83130, THAILAND</span>";
//str=str+"<span class='lxwmopen5'></span>";
layer.open({
    content: str
  });
}

//΢����ѯ����
function wxzxopen(){
str="<span class='wxzxopen1'><img src='img/wx.png' /></span>";
str=str+"<span class='wxzxopen2'>΢����ϵ�ң�<span id='wx_element'>"+document.getElementById("weixinLXYJ").innerHTML+"</span></span>";
str=str+"<span class='wxzxopen3'>����ռ�С����΢�ţ�<strong class='s1'>��ע��VIP T��</strong></span>";
str=str+"<span class='wxzxopen4'>�ռ���ҵΪ���ṩһվʽ���ʷ���</span>";
str=str+"<span class='wxzxopen5' onclick=\"copyToClipboard('wx_element')\">�������΢�ź�</span>";
layer.open({
    content: str
  });
}

function clolayer(){
layer.closeAll();
}

//�绰����
function telopen(){
str="<span class='telopen1'>������뼴�ɰκ�</span>";
str=str+"<span class='telopen2'><a href='tel:4008036089'>(����) 4008-036-089</a></span>";
str=str+"<span class='telopen3'><a href='tel:4008988987'>(����) 4008-988-987</a></span>";
layer.open({
    content: str
  });
}
