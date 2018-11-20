//首页搜索开始
var leftid=19;
function tj(){
v=document.getElementById("fstxt"+leftid).value;
if(v.replace("/\s/","")==""){alert("请输入关键词");return false;}
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

//拉伸广告开始
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
//拉伸广告结束

//资讯开始
function inewsover(x){
 a=document.getElementById("newsnum").innerHTML;
 for(i=1;i<=a;i++){
 document.getElementById("inewa"+i).className="";
 document.getElementById("inewm"+i).style.display="none";
 }
 document.getElementById("inewa"+x).className="a1";
 document.getElementById("inewm"+x).style.display="";
}
//资讯结束

//户型B
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
}//户型E

//楼盘版块B
function lpover(x,y,z){
for(i=x;i<=y;i++){
 u=document.getElementById("lpd"+i);if(u){u.style.display="none";document.getElementById("lpu"+i).style.display="";}
}
document.getElementById("lpu"+z).style.display="none";
document.getElementById("lpd"+z).style.display="";
}
//楼盘版块E

//租房版块B
function zfover(x,y,z){
for(i=x;i<=y;i++){
 u=document.getElementById("zfd"+i);if(u){u.style.display="none";document.getElementById("zfu"+i).style.display="";}
}
document.getElementById("zfu"+z).style.display="none";
document.getElementById("zfd"+z).style.display="";
}
//租房版块E

//装修提交
function zxtj(){
 if((document.zxf.t1.value).replace("/\s/","")=="" || document.zxf.t1.value=="您的称呼"){alert("请输入称呼");document.zxf.t1.focus();return false;}	
 if((document.zxf.t2.value).replace("/\s/","")=="" || document.zxf.t2.value=="您的电话"){alert("请输入手机号码");document.zxf.t2.focus();return false;}	
 if((document.zxf.t3.value).replace("/\s/","")=="" || document.zxf.t3.value=="验证码"){alert("请输入验证码");document.zxf.t3.focus();return false;}	
 zxf.action="zx/zbview.php?control=update";
}
function t1focus(){
 if(document.zxf.t1.value=="您的称呼"){document.zxf.t1.value="";return false;}
}
function t2focus(){
 if(document.zxf.t2.value=="您的电话"){document.zxf.t2.value="";return false;}
}
function t3focus(){
 if(document.zxf.t3.value=="验证码"){document.zxf.t3.value="";return false;}
}
function t1blur(){
 if(document.zxf.t1.value==""){document.zxf.t1.value="您的称呼";return false;}
}
function t2blur(){
 if(document.zxf.t2.value==""){document.zxf.t2.value="您的电话";return false;}
}
function t3blur(){
 if(document.zxf.t3.value==""){document.zxf.t3.value="验证码";return false;}
}

//切换代码开始

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
  //容器对象,滑动对象,切换参数,切换数量
  initialize: function(container, slider, parameter, count, options) {
	if(parameter <= 0 || count <= 0) return;
	var oContainer = document.getElementById(container), oSlider = document.getElementById(slider), oThis = this;

	this.Index = 0;//当前索引
	
	this._timer = null;//定时器
	this._slider = oSlider;//滑动对象
	this._parameter = parameter;//切换参数
	this._count = count || 0;//切换数量
	this._target = 0;//目标参数
	
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
  //设置默认属性
  SetOptions: function(options) {
	this.options = {//默认值
		Up:			true,//是否向上(否则向左)
		Step:		5,//滑动变化率
		Time:		10,//滑动延时
		Auto:		true,//是否自动转换
		Pause:		2000,//停顿时间(Auto为true时有效)
		onStart:	function(){},//开始转换时执行
		onFinish:	function(){}//完成转换时执行
	};
	Object.extend(this.options, options || {});
  },
  //开始切换设置
  Start: function() {
	if(this.Index < 0){
		this.Index = this._count - 1;
	} else if (this.Index >= this._count){ this.Index = 0; }
	
	this._target = -1 * this._parameter * this.Index;
	this.onStart();
	this.Move();
  },
  //移动
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
  //获取步长
  GetStep: function(iTarget, iNow) {
	var iStep = (iTarget - iNow) / this.Step;
	if (iStep == 0) return 0;
	if (Math.abs(iStep) < 1) return (iStep > 0 ? 1 : -1);
	return iStep;
  },
  //停止
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
		onStart : function(){ Each(objs, function(o, i){ o.className = tv.Index == i ? "on" : ""; }) }//按钮样式
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
//切换代码结束