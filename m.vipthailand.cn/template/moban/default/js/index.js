//��ҳ������ʼ
var leftid=19;
function tj(){
v=document.getElementById("fstxt"+leftid).value;
if(v.replace("/\s/","")==""){alert("������ؼ���");return false;}
f1.action="../search/index.php?admin="+leftid;
}
function sdover(x){
leftid=x;
document.getElementById("smain"+x).style.display="";
document.getElementById("la"+x).className="a1 ah fontyh";
}
function sdout(x){
document.getElementById("smain"+x).style.display="none";
document.getElementById("la"+x).className="a1 fontyh";
}

//�����濪ʼ
function slideUp(){
if(document.getElementById("toplsad").offsetHeight>0){
if(document.getElementById("toplsad").offsetHeight>10){
document.getElementById("toplsad").style.height=document.getElementById("toplsad").offsetHeight-10+"px"
setTimeout("slideUp();",30);
}else{
document.getElementById("toplsad").style.display="none";
document.getElementById("toplsimg").src=document.getElementById("toplsimg").innerHTML;
document.getElementById("toplsad").style.display="block";
slideDown();
}
}
}
function slideDown(){
if(document.getElementById("toplsad").offsetHeight<80){
if(document.getElementById("toplsad").offsetHeight<70){
document.getElementById("toplsad").style.height=document.getElementById("toplsad").offsetHeight+10+"px";
setTimeout("slideDown();",30);
}else{
document.getElementById("toplsad").style.height="80px";
}
}
}
//���������

//��Ѷ��ʼ
function inewsover(x){
 a=document.getElementById("newsnum").innerHTML;
 for(i=1;i<=a;i++){
 document.getElementById("inewa"+i).className="";
 document.getElementById("inewm"+i).style.display="none";
 }
 document.getElementById("inewa"+x).className="a1";
 document.getElementById("inewm"+x).style.display="";
}
//��Ѷ����

//����B
var glojg=0;
var glolc=0;
var glozx=0;
var glohx=0;
function hxsonc(x){
 glohx=0;
 for(i=1;i<=4;i++){document.getElementById("lefthx"+i).className="hx"+i;}
 if(document.getElementById("lefthx"+x).className=="hx"+x){
 document.getElementById("lefthx"+x).className="hx"+x+"y";
 }
 glohx=x;
}
function jgonc(x){
 glojg=0;
 for(i=1;i<=3;i++){document.getElementById("leftjg"+i).className="jg";}
 if(document.getElementById("leftjg"+x).className=="jg"){
 document.getElementById("leftjg"+x).className="jgy";
 }
 glojg=x;
}
function lcsonc(x,y){
 glolc=0;
 for(i=1;i<=2;i++){document.getElementById("leftlc"+i).className="lc"+i;}
 if(document.getElementById("leftlc"+x).className=="lc"+x){
 document.getElementById("leftlc"+x).className="lc"+x+"y";
 }
 glolc=y;
}
function zxsonc(x,y){
 glozx=0;
 for(i=1;i<=2;i++){document.getElementById("leftzx"+i).className="zx"+i;}
 if(document.getElementById("leftzx"+x).className=="zx"+x){
 document.getElementById("leftzx"+x).className="zx"+x+"y";
 }
 glozx=y;
}
function hxsearch(){
str="";
if(glohx!=0){str="_d"+glohx+"v_e"+glohx+"v";}
if(glojg==1){str=str+"_b0v_c50v";}else if(glojg==2){str=str+"_b50v_c80v";}else if(glojg==3){str=str+"_b80v_c99999v";}
if(glolc!=0){str=str+"_m"+glolc+"v";}
if(glozx!=0){str=str+"_l"+glozx+"v";}
location.href="lphuxing/huxinglist"+str+".html";
}//����E

//¥�̰��B
function lpover(x,y,z){
for(i=x;i<=y;i++){
 u=document.getElementById("lpd"+i);if(u){u.style.display="none";document.getElementById("lpu"+i).style.display="";}
}
document.getElementById("lpu"+z).style.display="none";
document.getElementById("lpd"+z).style.display="";
}
//¥�̰��E

//�ⷿ���B
function zfover(x,y,z){
for(i=x;i<=y;i++){
 u=document.getElementById("zfd"+i);if(u){u.style.display="none";document.getElementById("zfu"+i).style.display="";}
}
document.getElementById("zfu"+z).style.display="none";
document.getElementById("zfd"+z).style.display="";
}
//�ⷿ���E

//װ���ύ
function zxtj(){
 if((document.zxf.t1.value).replace("/\s/","")=="" || document.zxf.t1.value=="���ĳƺ�"){alert("������ƺ�");document.zxf.t1.focus();return false;}	
 if((document.zxf.t2.value).replace("/\s/","")=="" || document.zxf.t2.value=="���ĵ绰"){alert("�������ֻ�����");document.zxf.t2.focus();return false;}	
 if((document.zxf.t3.value).replace("/\s/","")=="" || document.zxf.t3.value=="��֤��"){alert("��������֤��");document.zxf.t3.focus();return false;}	
 zxf.action="zx/zbview.php?control=update";
}
function t1focus(){
 if(document.zxf.t1.value=="���ĳƺ�"){document.zxf.t1.value="";return false;}
}
function t2focus(){
 if(document.zxf.t2.value=="���ĵ绰"){document.zxf.t2.value="";return false;}
}
function t3focus(){
 if(document.zxf.t3.value=="��֤��"){document.zxf.t3.value="";return false;}
}
function t1blur(){
 if(document.zxf.t1.value==""){document.zxf.t1.value="���ĳƺ�";return false;}
}
function t2blur(){
 if(document.zxf.t2.value==""){document.zxf.t2.value="���ĵ绰";return false;}
}
function t3blur(){
 if(document.zxf.t3.value==""){document.zxf.t3.value="��֤��";return false;}
}

//�л����뿪ʼ

var Class = {
  create: function() {
	return function() {
	  this.initialize.apply(this, arguments);
	}
  }
}

Object.extend = function(destination, source) {
	for (var property in source) {
		destination[property] = source[property];
	}
	return destination;
}

var TransformView = Class.create();
TransformView.prototype = {
  //��������,��������,�л�����,�л�����
  initialize: function(container, slider, parameter, count, options) {
	if(parameter <= 0 || count <= 0) return;
	var oContainer = document.getElementById(container), oSlider = document.getElementById(slider), oThis = this;

	this.Index = 0;//��ǰ����
	
	this._timer = null;//��ʱ��
	this._slider = oSlider;//��������
	this._parameter = parameter;//�л�����
	this._count = count || 0;//�л�����
	this._target = 0;//Ŀ�����
	
	this.SetOptions(options);
	
	this.Up = !!this.options.Up;
	this.Step = Math.abs(this.options.Step);
	this.Time = Math.abs(this.options.Time);
	this.Auto = !!this.options.Auto;
	this.Pause = Math.abs(this.options.Pause);
	this.onStart = this.options.onStart;
	this.onFinish = this.options.onFinish;
	
	oContainer.style.overflow = "hidden";
	oContainer.style.position = "relative";
	
	oSlider.style.position = "absolute";
	oSlider.style.top = oSlider.style.left = 0;
  },
  //����Ĭ������
  SetOptions: function(options) {
	this.options = {//Ĭ��ֵ
		Up:			true,//�Ƿ�����(��������)
		Step:		5,//�����仯��
		Time:		10,//������ʱ
		Auto:		true,//�Ƿ��Զ�ת��
		Pause:		2000,//ͣ��ʱ��(AutoΪtrueʱ��Ч)
		onStart:	function(){},//��ʼת��ʱִ��
		onFinish:	function(){}//���ת��ʱִ��
	};
	Object.extend(this.options, options || {});
  },
  //��ʼ�л�����
  Start: function() {
	if(this.Index < 0){
		this.Index = this._count - 1;
	} else if (this.Index >= this._count){ this.Index = 0; }
	
	this._target = -1 * this._parameter * this.Index;
	this.onStart();
	this.Move();
  },
  //�ƶ�
  Move: function() {
	clearTimeout(this._timer);
	var oThis = this, style = this.Up ? "top" : "left", iNow = parseInt(this._slider.style[style]) || 0, iStep = this.GetStep(this._target, iNow);
	
	if (iStep != 0) {
		this._slider.style[style] = (iNow + iStep) + "px";
		this._timer = setTimeout(function(){ oThis.Move(); }, this.Time);
	} else {
		this._slider.style[style] = this._target + "px";
		this.onFinish();
		if (this.Auto) { this._timer = setTimeout(function(){ oThis.Index++; oThis.Start(); }, this.Pause); }
	}
  },
  //��ȡ����
  GetStep: function(iTarget, iNow) {
	var iStep = (iTarget - iNow) / this.Step;
	if (iStep == 0) return 0;
	if (Math.abs(iStep) < 1) return (iStep > 0 ? 1 : -1);
	return iStep;
  },
  //ֹͣ
  Stop: function(iTarget, iNow) {
	clearTimeout(this._timer);
	this._slider.style[this.Up ? "top" : "left"] = this._target + "px";
  }
};

window.onload=function(){
    setTimeout(start1,stoptime1);
	setTimeout("slideUp();",3000);
	function Each(list, fun){
		for (var i = 0, len = list.length; i < len; i++) { fun(list[i], i); }
	};
	
	var objs = document.getElementById("idNum").getElementsByTagName("li");
	
	var tv = new TransformView("idTransformView", "idSlider", 313, document.getElementById("qhai").innerHTML, {
		onStart : function(){ Each(objs, function(o, i){ o.className = tv.Index == i ? "on" : ""; }) }//��ť��ʽ
	});
	
	tv.Start();
	
	Each(objs, function(o, i){
		o.onmouseover = function(){
			o.className = "on";
			tv.Auto = false;
			tv.Index = i;
			tv.Start();
		}
		o.onmouseout = function(){
			o.className = "";
			tv.Auto = true;
			tv.Start();
		}
	})
	
	
}
//�л��������