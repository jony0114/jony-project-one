function checkBoxOnc(x){
 cbn=document.getElementById(x).checked;
 if(cbn==true){document.getElementById(x).checked=false;}else{document.getElementById(x).checked=true;}
}

function textinto(x,y){
$(x).value=y;	
}

function tphover(x){
 try{$("tpf"+x).tover();    //����FF��ie8
 }catch(e){
 window.frames["tpf"+x].tover();    //����IE6��7
 }
}
function tphout(x){
 try{$("tpf"+x).tout();    //����FF��ie8
 }catch(e){
 window.frames["tpf"+x].tout();    //����IE6��7
 }
}

function hylxcha(){
document.getElementById("fhylx2").style.display="";
window.frames["fhylx2"].location.href="../config/hylx2.php?id="+document.getElementById("thylx").value;	
}

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
function gourl(x){
location.href=x;
}

//ɾ������
function fcwcheckDEL(x,y){
	var c=document.getElementsByName("C1");
	str="";
	for(i=0;i<c.length;i++){
		if(c[i].checked){
			if(str==""){
				str=c[i].value;
				}else{
					str=str+","+c[i].value;
					}
			}
		}
	if(str==""){alert("������ѡ��һ������");return false;}
	if(confirm("ȷ��Ҫִ�иò�����?")){layer.msg('���ڴ���', {icon: 16  ,time: 0,shade :0.25});noRefresh(x,str,y);}else{return false;}
}

function noRefresh(admin,bhid,tablename) {
 if(bhid==""){alert("����������");return false;}
 $.get("noRefresh.php",{admin:admin,idbh:bhid,tab:tablename},function(result){
 if(result=="ERR074"){alert("����ʧ�ܣ�������");return false;}
 else if(result=="True"){location.reload();return false;}
 });
}

//js���㿪ʼ
function addNum(num1,num2){ //�������С�����λ�����
var sq1,sq2,m;
try{sq1=num1.toString().split(".")[1].length;} catch(e){sq1=0;}
try{sq2=num2.toString().split(".")[1].length;} catch(e){sq2=0;}
m=Math.pow(10,Math.max(sq1,sq2));
return ( num1 * m + num2 * m ) / m;
}

function accMul(arg1,arg2){
 var m=0,s1=arg1.toString(),s2=arg2.toString();
 try{m+=s1.split(".")[1].length}catch(e){}
 try{m+=s2.split(".")[1].length}catch(e){}
 return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m);
}
//js�������