//�һ�����
function getpwdtj(){
 if((document.f1.t0.value).replace(/\s/,"")==""){alert("�������ʺ�!");document.f1.t0.focus();return false;}
 if((document.f1.t1.value).replace(/\s/,"")=="" || !isEmail(document.f1.t1.value)){alert("��������Ч������!");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")==""){alert("��������֤��!");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="getpasswd.php"
}
function repwdtj(x,y,z){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("����������!");document.f1.t1.focus();return false;}
 if(document.f1.t1.value!=document.f1.t2.value){alert("�����������벻һ��!");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="repwd.php?id="+x+"&chk="+y+"&tmp="+z
}
function getmobtj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("��������Ч���ʺ�!");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")==""){alert("�������ֻ�����!");document.f1.t2.focus();return false;}
 if((document.f1.t3.value).replace(/\s/,"")==""){alert("��������֤��!");document.f1.t3.focus();return false;}
 tjwait();
 f1.action="getmob.php"
}

//��¼
function logintj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("�������Ա����");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")==""){alert("���������룡");document.f1.t2.focus();return false;}
 f1.action="index.php?action=login";
}
function dlover(x){
for(i=1;i<=3;i++){
if(document.getElementById("dlcap"+i)){
document.getElementById("dlcap"+i).className="l0";
document.getElementById("dldiv"+i).style.display="none";
}
}
document.getElementById("dlcap"+x).className="l1";
document.getElementById("dldiv"+x).style.display="";
}
var xmlHttpdx = false;
try {
  xmlHttpdx = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpdx = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpdx = false;
  }
}
if (!xmlHttpdx && typeof XMLHttpRequest != 'undefined') {
  xmlHttpdx = new XMLHttpRequest();
}
function updatePagedx() {
  if (xmlHttpdx.readyState == 4) {
    var response = xmlHttpdx.responseText;
	response=response.replace(/\s+/g,"");
	if(response=="True"){objhtml("motyz","<font color=red>�ֻ����벻���ڻ�δ��</font>");}
   else if(response=="False"){objdis("motyz","none");objdis("fsid1","");ifmotok=1;}
  }
}
var ifmotok;
ifmotok=0;
function motCheck(){
mobile=document.getElementById("tmot").value;
objdis("fsid1","none");objdis("fsid2","none");objdis("motyz","");
if(mobile.length==0){objhtml("motyz","<font color=red>�ֻ������ʽ����</font>");return false;}
if(mobile.length!=11){objhtml("motyz","<font color=red>�ֻ������ʽ����</font>");return false;} 
var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
if(!myreg.test(mobile)){objhtml("motyz","<font color=red>�ֻ������ʽ����</font>");return false;}
objhtml("motyz","�ֻ��������ڼ�⡭��");
var url = "motLogin.php?mot="+mobile;
xmlHttpdx.open("get", url, true);
xmlHttpdx.onreadystatechange = updatePagedx;
xmlHttpdx.send(null);
}

function mottj(){
if((document.f2.tmot.value).replace(/\s/,"")==""){alert("�������ֻ����룡");document.f2.tmot.focus();return false;}
if((document.f2.tyzm.value).replace(/\s/,"")==""){alert("��������֤�룡");document.f2.tyzm.focus();return false;}
if(0==ifmotok){alert("�ֻ��������������ԣ�");document.f1.tmot.focus();return false;}
f2.action="index.php?action=mot";
}

//���Ϳ�ʼ
var sz;
var xmlHttpm = false;
try {
  xmlHttpm = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpm = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpm = false;
  }
}
if (!xmlHttpm && typeof XMLHttpRequest != 'undefined') {
  xmlHttpm = new XMLHttpRequest();
}


function updatePagem() {
 if (xmlHttpm.readyState == 4) {
 var response = xmlHttpm.responseText;
 response=response.replace(/[\r\n]/g,'');
 response=response.replace(/\s+/g,"");
  if(response=="True"){
  objdis("motyz","");objhtml("motyz","<font color=red>�ֻ����벻���ڻ�δ��</font>");
  }
 }
}

function yzonc(){
 objhtml("sjzouv",120);
 objdis("motyz","none");objdis("fsid1","none");objdis("fsid2","");
 sz=setInterval("sjzou()",1000);
 url = "motLoginchk.php?mot="+document.getElementById("tmot").value;
 xmlHttpm.open("post", url, true);
 xmlHttpm.onreadystatechange = updatePagem;
 xmlHttpm.send(null);
}

function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
  clearInterval(sz);
  document.getElementById("fsid1").style.display="none"; 
  document.getElementById("fsid2").style.display=""; 
  return false;
 }else{document.getElementById("sjzouv").innerHTML=s-1;}
}

function objdis(x,y){
document.getElementById(x).style.display=y;
}

function objhtml(x,y){
document.getElementById(x).innerHTML=y;
}

