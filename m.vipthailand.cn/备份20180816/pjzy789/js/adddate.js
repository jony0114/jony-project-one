
var cal; 
var isFocus=false; //�Ƿ�Ϊ���� 
var pickMode ={ 
"second":1, 
"minute":2, 
"hour":3, 
"day":4, 
"month":5, 
"year":6 }; 

var topY=0,leftX=0; //�Զ��嶨λƫ���� 2007-02-11 �� �������� //ѡ������ �� 
//�� ����� 2007-06-10 ��ӣ�ͨ�� ID ��ѡ���� 
function SelectDateById(id,strFormat,x,y) { var obj = document.getElementById(id); if(obj 
== null){return false;} obj.focus(); if(obj.onclick != null){obj.onclick();} 
else if(obj.click != null){obj.click();} else{SelectDate(obj,strFormat,x,y)} } 

//ѡ������ �� �� ����� 2006-06-25 ��� 
function SelectDate(obj,strFormat,x,y) 
{ 

leftX =(x == null) ? leftX : x; 
topY =(y == null) ? topY : y;//�Զ��嶨λƫ���� 2007-02-11 �� �������� 
if(document.getElementById("ContainerPanel")==null){InitContainerPanel();} 
var date = new Date(); 
var by = date.getFullYear()-50; //��Сֵ �� 50 ��ǰ 
var ey = date.getFullYear()+50; //���ֵ �� 50 ��� 
//cal = new Calendar(by, ey,1,strFormat);    //��ʼ��Ӣ�İ棬0 Ϊ���İ� 
cal = (cal==null) ? new Calendar(by, ey, 0) : cal;    //����ÿ�ζ���ʼ�� 2006-12-03 ���� 
cal.DateMode =pickMode["second"]; //��λ 
if(strFormat.indexOf('s')< 0) {cal.DateMode =pickMode["minute"];}//����Ϊ�� 
if(strFormat.indexOf('m')< 0) {cal.DateMode =pickMode["hour"];}//����Ϊʱ 
if(strFormat.indexOf('h')< 0) {cal.DateMode =pickMode["day"];}//����Ϊ�� 
if(strFormat.indexOf('d')< 0) {cal.DateMode =pickMode["month"];}//����Ϊ�� 
if(strFormat.indexOf('M')< 0) {cal.DateMode =pickMode["year"];}//����Ϊ�� 
if(strFormat.indexOf('y')< 0) {cal.DateMode =pickMode["second"];}//Ĭ�Ͼ���Ϊ�� 
cal.dateFormatStyleOld = cal.dateFormatStyle; 
cal.dateFormatStyle = strFormat; 
cal.show(obj); 
} 
/**//**//**//**//**//**//**//** 
* �������� 
* @param d the delimiter 
* @param p the pattern of your date 
2006-06-25 �� ����� �޸�Ϊ�����û�ָ���� style ��ȷ���� 
*/ 
String.prototype.toDate = function(style) { 
var y = this.substring(style.indexOf('y'),style.lastIndexOf('y')+1);// �� 
var M = this.substring(style.indexOf('M'),style.lastIndexOf('M')+1);// �� 
var d = this.substring(style.indexOf('d'),style.lastIndexOf('d')+1);// �� 
var h = this.substring(style.indexOf('h'),style.lastIndexOf('h')+1);// ʱ 
var m = this.substring(style.indexOf('m'),style.lastIndexOf('m')+1);// �� 
var s = this.substring(style.indexOf('s'),style.lastIndexOf('s')+1);// �� 

if(s == null ||s == "" || isNaN(s)) {s = new Date().getSeconds();} 
if(m == null ||m == "" || isNaN(m)) {m = new Date().getMinutes();} 
if(h == null ||h == "" || isNaN(h)) {h = new Date().getHours();} 
if(d == null ||d == "" || isNaN(d)) {d = new Date().getDate();} 
if(M == null ||M == "" || isNaN(M)) {M = new Date().getMonth()+1;} 
if(y == null ||y == "" || isNaN(y)) {y = new Date().getFullYear();} 
var dt ; 
eval ("dt = new Date('"+ y+"', '"+(M-1)+"','"+ d+"','"+ h+"','"+ m+"','"+ s +"')"); 
return dt; 
} 

/**//**//**//**//**//**//**//** 
* ��ʽ������ 
* @param   d the delimiter 
* @param   p the pattern of your date 
* @author meizz 
*/ 
Date.prototype.format = function(style) { 
var o = { 
"M+" : this.getMonth() + 1, //month 
"d+" : this.getDate(),      //day 
"h+" : this.getHours(),     //hour 
"m+" : this.getMinutes(),   //minute 
"s+" : this.getSeconds(),   //second 
"w+" : "��һ����������".charAt(this.getDay()),   //week 
"q+" : Math.floor((this.getMonth() + 3) / 3), //quarter 
"S" : this.getMilliseconds() //millisecond 
} 
if(/(y+)/.test(style)) { 
style = style.replace(RegExp.$1, 
(this.getFullYear() + "").substr(4 - RegExp.$1.length)); 
} 
for(var k in o){ 
if(new RegExp("("+ k +")").test(style)){ 
style = style.replace(RegExp.$1, 
RegExp.$1.length == 1 ? o[k] : 
("00" + o[k]).substr(("" + o[k]).length)); 
} 
} 
return style; 
} 

//2007-09-14 �ɺ������ӷ�����ѡ���� 
Calendar.prototype.ReturnDate = function(dt) { 
if (this.dateControl != null){this.dateControl.value = dt;} 
calendar.hide(); 
if(this.dateControl.onchange == null){return;} 
//�� onchange ת���������������ⴥ����֤�¼� 
var ev = this.dateControl.onchange.toString(); //�ҳ��������ִ� 
ev = ev.substring( 
((ev.indexOf("ValidatorOnChange();")> 0) ? ev.indexOf("ValidatorOnChange();") + 20 : ev.indexOf("{") + 1) 
, ev.lastIndexOf("}"));//ȥ����֤���� ValidatorOnChange(); 
var fun = new Function(ev);        //���¶��庯�� 
this.dateControl.changeEvent = fun; 
this.dateControl.changeEvent();//�����Զ��� changeEvent ���� 
} 

/**//**//**//**//**//**//**//** 
* ������ 
* @param   beginYear 1990 
* @param   endYear   2010 
* @param   lang      0(����)|1(Ӣ��) ���������� 
* @param   dateFormatStyle "yyyy-MM-dd"; 
* @version 2006-04-01 
* @author KimSoft (jinqinghua [at] gmail.com) 
* @update 
*/ 
function Calendar(beginYear, endYear, lang, dateFormatStyle) { 
this.beginYear = 1950; 
this.endYear = 2050; 
this.lang = 0;            //0(����) | 1(Ӣ��) 
this.dateFormatStyle = "yyyy-MM-dd hh:mm:ss"; 

if (beginYear != null && endYear != null){ 
this.beginYear = beginYear; 
this.endYear = endYear; 
} 
if (lang != null){ 
this.lang = lang 
} 

if (dateFormatStyle != null){ 
this.dateFormatStyle = dateFormatStyle 
} 

this.dateControl = null; 
this.panel = this.getElementById("calendarPanel"); 
this.container = this.getElementById("ContainerPanel"); 
this.form = null; 

this.date = new Date(); 
this.year = this.date.getFullYear(); 
this.month = this.date.getMonth(); 

this.day = this.date.getDate(); 
this.hour = this.date.getHours(); 
this.minute = this.date.getMinutes(); 
this.second = this.date.getSeconds(); 

this.colors = { 
"cur_word"      : "#FFFFFF", //��������������ɫ 
"cur_bg"        : "#00FF00", //�������ڵ�Ԫ��Ӱɫ 
"sel_bg"        : "#FFCCCC", //�ѱ�ѡ������ڵ�Ԫ��Ӱɫ 2006-12-03 �������� 
"sun_word"      : "#FF0000", //������������ɫ 
"sat_word"      : "#0000FF", //������������ɫ 
"td_word_light" : "#333333", //��Ԫ��������ɫ 
"td_word_dark" : "#CCCCCC", //��Ԫ�����ְ�ɫ 
"td_bg_out"     : "#EFEFEF", //��Ԫ��Ӱɫ 
"td_bg_over"    : "#FFCC00", //��Ԫ��Ӱɫ 
"tr_word"       : "#FFFFFF", //����ͷ������ɫ 
"tr_bg"         : "#666666", //����ͷ��Ӱɫ 
"input_border" : "#CCCCCC", //input�ؼ��ı߿���ɫ 
"input_bg"      : "#EFEFEF"   //input�ؼ��ı�Ӱɫ 
} 
/* //2008-01-29 �ŵ��� show ����ΪҪ�� pickMode �ж� 
this.draw(); 
this.bindYear(); 
this.bindMonth(); 
*/ 
//this.changeSelect(); 
//this.bindData(); //2006-12-30 ����.ש��ע�� 
} 

/**//**//**//**//**//**//**//** 
* ���������ԣ����԰�����������չ�� 
*/ 
Calendar.language = { 
"year"   : [[""], [""]], 
"months" : [["һ��","����","����","����","����","����","����","����","����","ʮ��","ʮһ��","ʮ����"], 
["JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC"] 
], 
"weeks" : [["��","һ","��","��","��","��"," ��"], 
["SUN","MON","TUR","WED","THU","FRI","SAT"] 
], 
"hour" : [["ʱ"], ["H"]], 
"minute" : [["��"], ["M"]], 
"second" : [["��"], ["S"]], 
"clear" : [["���"], ["CLS"]], 
"today" : [["����"], ["TODAY"]], 
"pickTxt" : [["ȷ��"], ["OK"]],//pickMode ��ȷ���ꡢ��ʱ�ѽ����ɡ�ȷ���� 
"close" : [["�ر�"], ["CLOSE"]] 
} 

Calendar.prototype.draw = function() { 
calendar = this; 

var mvAry = []; 
//mvAry[mvAry.length] = ' <form name="calendarForm" style="margin: 0px;">'; //�� <form> ����Ƕ�ף� 2006-12-01 �ɺ������� Div 
mvAry[mvAry.length] = ' <div name="calendarForm" style="margin: 0px;">'; 
mvAry[mvAry.length] = '    <table width="100%" border="0" cellpadding="0" cellspacing="1" style="font-size:12px;">'; 
mvAry[mvAry.length] = '      <tr>'; 
mvAry[mvAry.length] = '        <th align="left" width="1%"><input style="border: 1px solid ' + calendar.colors["input_border"] + ';background-color:' + calendar.colors["input_bg"] + ';width:16px;height:20px;'; 
if(calendar.DateMode > pickMode["month"]){mvAry[mvAry.length] = 'display:none;';}//pickMode ��ȷ����ʱ���� ���¡� 
mvAry[mvAry.length] ='" name="prevMonth" type="button" id="prevMonth" value="&lt;" /></th>'; 
mvAry[mvAry.length] = '        <th align="center" width="98%" nowrap="nowrap"><select name="calendarYear" id="calendarYear" style="font-size:12px;"></select><select name="calendarMonth" id="calendarMonth" style="font-size:12px;'; 
if(calendar.DateMode > pickMode["month"]){mvAry[mvAry.length] = 'display:none;';}//pickMode ��ȷ����ʱ���� ���¡� 
mvAry[mvAry.length] = '"></select></th>'; 
mvAry[mvAry.length] = '        <th align="right" width="1%"><input style="border: 1px solid ' + calendar.colors["input_border"] + ';background-color:' + calendar.colors["input_bg"] + ';width:16px;height:20px;'; 
if(calendar.DateMode > pickMode["month"]){mvAry[mvAry.length] = 'display:none;';}//pickMode ��ȷ����ʱ���� ���¡� 
mvAry[mvAry.length] ='" name="nextMonth" type="button" id="nextMonth" value="&gt;" /></th>'; 
mvAry[mvAry.length] = '      </tr>'; 
mvAry[mvAry.length] = '    </table>'; 
mvAry[mvAry.length] = '    <table id="calendarTable" width="100%" style="border:0px solid #CCCCCC;background-color:#FFFFFF;font-size:12px;'; 
if(calendar.DateMode >= pickMode["month"]){mvAry[mvAry.length] = 'display:none;';}//pickMode ��ȷ���ꡢ��ʱ���� ���족 
mvAry[mvAry.length] = '" border="0" cellpadding="3" cellspacing="1">'; 
mvAry[mvAry.length] = '      <tr>'; 
for(var i = 0; i < 7; i++) { 
mvAry[mvAry.length] = '      <th style="font-weight:normal;background-color:' + calendar.colors["tr_bg"] + ';color:' + calendar.colors["tr_word"] + ';">' + Calendar.language["weeks"][this.lang][i] + '</th>'; 
} 
mvAry[mvAry.length] = '      </tr>'; 
for(var i = 0; i < 6;i++){ 
mvAry[mvAry.length] = '    <tr align="center">'; 
for(var j = 0; j < 7; j++) { 
if (j == 0){ 
mvAry[mvAry.length] = ' <td style="cursor:default;color:' + calendar.colors["sun_word"] + ';"></td>'; 
} else if(j == 6) { 
mvAry[mvAry.length] = ' <td style="cursor:default;color:' + calendar.colors["sat_word"] + ';"></td>'; 
} else { 
mvAry[mvAry.length] = ' <td style="cursor:default;"></td>'; 
} 
} 
mvAry[mvAry.length] = '    </tr>'; 
} 

//2009-03-03 ��ӵĴ��룬����ʱ����� 
mvAry[mvAry.length] = '      <tr style="'; 
if(calendar.DateMode >= pickMode["day"]){mvAry[mvAry.length] = 'display:none;';}//pickMode ��ȷ��ʱ�����ء�ʱ�䡱 
mvAry[mvAry.length] = '"><td align="center" colspan="7">'; 
mvAry[mvAry.length] = '      <select name="calendarHour" id="calendarHour" style="font-size:12px;"></select>' + Calendar.language["hour"][this.lang]; 
mvAry[mvAry.length] = '<span style="' 
if(calendar.DateMode >= pickMode["hour"]){mvAry[mvAry.length] = 'display:none;';}//pickMode ��ȷ��Сʱʱ���� ���֡� 
mvAry[mvAry.length] = '"><select name="calendarMinute" id="calendarMinute" style="font-size:12px;"></select>' + Calendar.language["minute"][this.lang]+'</span>'; 
mvAry[mvAry.length] = '<span style="' 
if(calendar.DateMode >= pickMode["minute"]){mvAry[mvAry.length] = 'display:none;';}//pickMode ��ȷ��Сʱ����ʱ���� ���롱 
mvAry[mvAry.length] = '"><select name="calendarSecond" id="calendarSecond" style="font-size:12px;"></select>'+ Calendar.language["second"][this.lang]+'</span>'; 
mvAry[mvAry.length] = '      </td></tr>'; 

mvAry[mvAry.length] = '    </table>'; 
//mvAry[mvAry.length] = ' </from>'; 
mvAry[mvAry.length] = '      <div align="center" style="padding:4px 4px 4px 4px;background-color:' + calendar.colors["input_bg"] + ';">'; 
mvAry[mvAry.length] = '        <input name="calendarClear" type="button" id="calendarClear" value="' + Calendar.language["clear"][this.lang] + '" style="border: 1px solid ' + calendar.colors["input_border"] + ';background-color:' + calendar.colors["input_bg"] + ';width:40px;height:20px;font-size:12px;cursor:pointer;"/>'; 
mvAry[mvAry.length] = '        <input name="calendarToday" type="button" id="calendarToday" value="' 
mvAry[mvAry.length] = (calendar.DateMode == pickMode["day"]) ? Calendar.language["today"][this.lang] : Calendar.language["pickTxt"][this.lang]; 
mvAry[mvAry.length] = '" style="border: 1px solid ' + calendar.colors["input_border"] + ';background-color:' + calendar.colors["input_bg"] + ';width:60px;height:20px;font-size:12px;cursor:pointer"/>'; 
mvAry[mvAry.length] = '        <input name="calendarClose" type="button" id="calendarClose" value="' + Calendar.language["close"][this.lang] + '" style="border: 1px solid ' + calendar.colors["input_border"] + ';background-color:' + calendar.colors["input_bg"] + ';width:40px;height:20px;font-size:12px;cursor:pointer"/>'; 
mvAry[mvAry.length] = '      </div>'; 

mvAry[mvAry.length] = ' </div>'; 
this.panel.innerHTML = mvAry.join(""); 

/**//**//**//******** ���´����ɺ���� 2006-12-01 ��� **********/ 
var obj = this.getElementById("prevMonth"); 
obj.onclick = function () {calendar.goPrevMonth(calendar);} 
obj.onblur = function () {calendar.onblur();} 
this.prevMonth= obj; 

obj = this.getElementById("nextMonth"); 
obj.onclick = function () {calendar.goNextMonth(calendar);} 
obj.onblur = function () {calendar.onblur();} 
this.nextMonth= obj; 

obj = this.getElementById("calendarClear"); 
obj.onclick = function () 
{ calendar.ReturnDate(""); /*calendar.dateControl.value = "";calendar.hide();*///2007-09-14 �ɺ����ע�� 
} 
this.calendarClear = obj; 

obj = this.getElementById("calendarClose"); 
obj.onclick = function () {calendar.hide();} 
this.calendarClose = obj; 

obj = this.getElementById("calendarYear"); 
obj.onchange = function () {calendar.update(calendar);} 
obj.onblur = function () {calendar.onblur();} 
this.calendarYear = obj; 

obj = this.getElementById("calendarMonth"); 
with(obj) 
{ 
onchange = function () {calendar.update(calendar);} 
onblur = function () {calendar.onblur();} 
}this.calendarMonth = obj; 

obj = this.getElementById("calendarHour"); 
obj.onchange = function () {calendar.hour = this.options[this.selectedIndex].value;} 
obj.onblur = function () {calendar.onblur();} 
this.calendarHour = obj; 

obj = this.getElementById("calendarMinute"); 
obj.onchange = function () {calendar.minute = this.options[this.selectedIndex].value;} 
obj.onblur = function () {calendar.onblur();} 
this.calendarMinute = obj; 

obj = this.getElementById("calendarSecond"); 
obj.onchange = function () {calendar.second = this.options[this.selectedIndex].value;} 
obj.onblur = function () {calendar.onblur();} 
this.calendarSecond = obj; 

obj = this.getElementById("calendarToday"); 
obj.onclick = function () { 
var today = (calendar.DateMode != pickMode["day"]) ? 
new Date(calendar.year,calendar.month,calendar.day,calendar.hour,calendar.minute,calendar.second) 
: new Date();//2008-01-29 
calendar.ReturnDate(today.format(calendar.dateFormatStyle)); 
} 
this.calendarToday = obj; 
} 

//�������������� 
Calendar.prototype.bindYear = function() { 
var cy = this.calendarYear;//2006-12-01 �ɺ�����޸� 
cy.length = 0; 
for (var i = this.beginYear; i <= this.endYear; i++){ 
cy.options[cy.length] = new Option(i + Calendar.language["year"][this.lang], i); 
} 
} 

//�·������������ 
Calendar.prototype.bindMonth = function() { 
var cm = this.calendarMonth;//2006-12-01 �ɺ�����޸� 
cm.length = 0; 
for (var i = 0; i < 12; i++){ 
cm.options[cm.length] = new Option(Calendar.language["months"][this.lang][i], i); 
} 
} 

//Сʱ����������� 
Calendar.prototype.bindHour = function() { 
var ch = this.calendarHour; 
if(ch.length > 0){return;}//2009-03-03 ����Ҫ���°󶨣�������� 
//ch.length = 0; 
var h; 
for (var i = 0; i < 24; i++){ 
h = ("00" + i +"").substr(("" + i).length); 
ch.options[ch.length] = new Option(h, h); 
} 
} 

//��������������� 
Calendar.prototype.bindMinute = function() { 
var cM = this.calendarMinute; 
if(cM.length > 0){return;}//2009-03-03 ����Ҫ���°󶨣�������� 
//cM.length = 0; 
var M; 
for (var i = 0; i < 60; i++){ 
M = ("00" + i +"").substr(("" + i).length); 
cM.options[cM.length] = new Option(M, M); 
} 
} 

//��������������� 
Calendar.prototype.bindSecond = function() { 
var cs = this.calendarSecond; 
if(cs.length > 0){return;}//2009-03-03 ����Ҫ���°󶨣�������� 
//cs.length = 0; 
var s; 
for (var i = 0; i < 60; i++){ 
s = ("00" + i +"").substr(("" + i).length); 
cs.options[cs.length] = new Option(s, s); 
} 
} 

//��ǰһ�� 
Calendar.prototype.goPrevMonth = function(e){ 
if (this.year == this.beginYear && this.month == 0){return;} 
this.month--; 
if (this.month == -1) { 
this.year--; 
this.month = 11; 
} 
this.date = new Date(this.year, this.month, 1); 
this.changeSelect(); 
this.bindData(); 
} 

//���һ�� 
Calendar.prototype.goNextMonth = function(e){ 
if (this.year == this.endYear && this.month == 11){return;} 
this.month++; 
if (this.month == 12) { 
this.year++; 
this.month = 0; 
} 
this.date = new Date(this.year, this.month, 1); 
this.changeSelect(); 
this.bindData(); 
} 

//�ı�SELECTѡ��״̬ 
Calendar.prototype.changeSelect = function() { 
var cy = this.calendarYear;//2006-12-01 �ɺ�����޸� 
var cm = this.calendarMonth; 
var ch = this.calendarHour; 
var cM = this.calendarMinute; 
var cs = this.calendarSecond; 
//2006-12-30 ����.ש���޸ģ������������ 
cy[this.date.getFullYear()-this.beginYear].selected = true; 
cm[this.date.getMonth()].selected =true; 

//2009-03-03 ��ӣ���ʼ��ʱ���ֵ 
ch[this.hour].selected =true; 
cM[this.minute].selected =true; 
cs[this.second].selected =true; 
} 

//�����ꡢ�� 
Calendar.prototype.update = function (e){ 
this.year = e.calendarYear.options[e.calendarYear.selectedIndex].value;//2006-12-01 �ɺ�����޸� 
this.month = e.calendarMonth.options[e.calendarMonth.selectedIndex].value; 
this.date = new Date(this.year, this.month, 1); 
//this.changeSelect(); 
this.bindData(); 
} 

//�����ݵ�����ͼ 
Calendar.prototype.bindData = function () { 
var calendar = this; 
if(calendar.DateMode >= pickMode["month"]){return;}//2008-01-29 
// var dateArray = this.getMonthViewArray(this.date.getYear(), this.date.getMonth()); 
//2006-12-30 ����.ש���޸� ��Firefox ����ݴ��� 
var dateArray = this.getMonthViewArray(this.date.getFullYear(), this.date.getMonth()); 
var tds = this.getElementById("calendarTable").getElementsByTagName("td"); 
for(var i = 0; i < tds.length; i++) { 
tds[i].style.backgroundColor = calendar.colors["td_bg_out"]; 
tds[i].onclick = function () {return;} 
tds[i].onmouseover = function () {return;} 
tds[i].onmouseout = function () {return;} 
if (i > dateArray.length - 1) break; 
tds[i].innerHTML = dateArray[i]; 
if (dateArray[i] != "&nbsp;"){ 
tds[i].bgColorTxt = "td_bg_out"; //2009-03-03 ���汳��ɫ�� class 
var cur = new Date(); 
tds[i].isToday = false; 
if (cur.getFullYear() == calendar.date.getFullYear() && cur.getMonth() == calendar.date.getMonth() && cur.getDate() == dateArray[i]) { 
//�ǽ���ĵ�Ԫ�� 
tds[i].style.backgroundColor = calendar.colors["cur_bg"]; 
tds[i].bgColorTxt = "cur_bg"; 
tds[i].isToday = true; 
} 
if(calendar.dateControl != null ) 
{ 
cur = calendar.dateControl.value.toDate(calendar.dateFormatStyle); 
if (cur.getFullYear() == calendar.date.getFullYear() && cur.getMonth() == calendar.date.getMonth()&& cur.getDate() == dateArray[i]) { 
//���ѱ�ѡ�еĵ�Ԫ�� 
calendar.selectedDayTD = tds[i]; 
tds[i].style.backgroundColor = calendar.colors["sel_bg"]; 
tds[i].bgColorTxt = "sel_bg"; 
} 
} 
tds[i].onclick = function () { 
if(calendar.DateMode == pickMode["day"]) //2009-03-03 ��ѡ������ʱ��������Ӽ�����ֵ 
{ 
calendar.ReturnDate(new Date(calendar.date.getFullYear(), 
calendar.date.getMonth(), 
this.innerHTML).format(calendar.dateFormatStyle)); 
} 
else 
{ 
if(calendar.selectedDayTD != null) //2009-03-03 �����ѡ�еı���ɫ 
{ 
calendar.selectedDayTD.style.backgroundColor =(calendar.selectedDayTD.isToday)? calendar.colors["cur_bg"] : calendar.colors["td_bg_out"]; 
} 
this.style.backgroundColor = calendar.colors["sel_bg"]; 
calendar.day = this.innerHTML; 
calendar.selectedDayTD = this; //2009-03-03 ��¼��ѡ�е����� 
} 
} 
tds[i].style.cursor ="pointer"; //2007-08-06 �ɺ������ӣ��������ָ״ 
tds[i].onmouseover = function () { 
this.style.backgroundColor = calendar.colors["td_bg_over"]; 
} 
tds[i].onmouseout = function () { 
if(calendar.selectedDayTD != this) { 
this.style.backgroundColor = calendar.colors[this.bgColorTxt];} 
} 
tds[i].onblur = function () {calendar.onblur();} 
} 
} 
} 

//�����ꡢ�µõ�����ͼ����(������ʽ) 
Calendar.prototype.getMonthViewArray = function (y, m) { 
var mvArray = []; 
var dayOfFirstDay = new Date(y, m, 1).getDay(); 
var daysOfMonth = new Date(y, m + 1, 0).getDate(); 
for (var i = 0; i < 42; i++) { 
mvArray[i] = "&nbsp;"; 
} 
for (var i = 0; i < daysOfMonth; i++){ 
mvArray[i + dayOfFirstDay] = i + 1; 
} 
return mvArray; 
} 

//��չ document.getElementById(id) ������������� from meizz tree source 
Calendar.prototype.getElementById = function(id){ 
if (typeof(id) != "string" || id == "") return null; 
if (document.getElementById) return document.getElementById(id); 
if (document.all) return document.all(id); 
try {return eval(id);} catch(e){ return null;} 
} 

//��չ object.getElementsByTagName(tagName) 
Calendar.prototype.getElementsByTagName = function(object, tagName){ 
if (document.getElementsByTagName) return document.getElementsByTagName(tagName); 
if (document.all) return document.all.tags(tagName); 
} 

//ȡ��HTML�ؼ�����λ�� 
Calendar.prototype.getAbsPoint = function (e){ 
var x = e.offsetLeft; 
var y = e.offsetTop; 
while(e = e.offsetParent){ 
x += e.offsetLeft; 
y += e.offsetTop; 
} 
return {"x": x, "y": y}; 
} 

//��ʾ���� 
Calendar.prototype.show = function (dateObj, popControl) { 
if (dateObj == null){ 
throw new Error("arguments[0] is necessary") 
} 
this.dateControl = dateObj; 
var now = new Date(); 
this.date = (dateObj.value.length > 0) ? new Date(dateObj.value.toDate(this.dateFormatStyle)) : now.format(this.dateFormatStyle).toDate(this.dateFormatStyle) ;//2008-01-29 �������� �� ��Ϊ�������dateFormatStyle��ʼ������ 

if(this.panel.innerHTML==""||cal.dateFormatStyleOld != cal.dateFormatStyle)//2008-01-29 �ѹ�������ڴ˴���2009-03-03 ����ʾ����ʽ�ı䣬�����³�ʼ�� 
{ 
this.draw(); 
this.bindYear(); 
this.bindMonth(); 
this.bindHour(); 
this.bindMinute(); 
this.bindSecond(); 
} 
this.year = this.date.getFullYear(); 
this.month = this.date.getMonth(); 
this.day = this.date.getDate(); 
this.hour = this.date.getHours(); 
this.minute = this.date.getMinutes(); 
this.second = this.date.getSeconds(); 
this.changeSelect(); 
this.bindData(); 

if (popControl == null){ 
popControl = dateObj; 
} 
var xy = this.getAbsPoint(popControl); 
//this.panel.style.left = xy.x + "px"; 
//this.panel.style.top = (xy.y + dateObj.offsetHeight) + "px"; 
this.panel.style.left = (xy.x + leftX)+ "px"; //�ɺ���� 2007-02-11 �޸� �� �����Զ���ƫ���� 
this.panel.style.top = (xy.y + topY + dateObj.offsetHeight) + "px"; 

//�ɺ���� 2006-06-25 �޸� �� �� visibility ��Ϊ display�������ʧȥ������¼� //this.setDisplayStyle("select", "hidden"); 
//this.panel.style.visibility = "visible"; 
//this.container.style.visibility = "visible"; 
this.panel.style.display = ""; 
this.container.style.display = ""; 

if( !this.dateControl.isTransEvent) 
{ 
this.dateControl.isTransEvent = true; 
/* ��д�ڷ���ֵ��ʱ�� ReturnDate �����У�ȥ����֤�¼��ĺ��� 
this.dateControl.changeEvent = this.dateControl.onchange;//�� onchange ת���������������ⴥ����֤�¼� 
this.dateControl.onchange = function() 
{if(typeof(this.changeEvent) =='function'){this.changeEvent();}}*/ 
if(this.dateControl.onblur != null){ 
this.dateControl.blurEvent = this.dateControl.onblur;}//2007-09-14 �������ı���� onblur ��ʹ��ԭ�����¼��������� 
this.dateControl.onblur = function() 
{calendar.onblur();if(typeof(this.blurEvent) =='function'){this.blurEvent();} 
} 
} 

this.container.onmouseover = function(){isFocus=true;} 
this.container.onmouseout = function(){isFocus=false;} 
} 

//�������� 
Calendar.prototype.hide = function() { 
//this.setDisplayStyle("select", "visible"); 
//this.panel.style.visibility = "hidden"; 
//this.container.style.visibility = "hidden"; 
this.panel.style.display = "none"; 
this.container.style.display = "none"; 
isFocus=false; 
} 

//����ת��ʱ�������� �� �ɺ���� 2006-06-25 ��� 
Calendar.prototype.onblur = function() { 
if(!isFocus){this.hide();} 
} 

//�����ɺ���� 2007-07-26 �޸� �� ȷ�����������ڵ��� body ��󣬷��� FireFox �в��ܳ��������Ϸ� 
function InitContainerPanel() //��ʼ������ 
{ 
var str = '<div id="calendarPanel" style="position: absolute;display: none;z-index:9999; background-color: #FFFFFF;border: 1px solid #CCCCCC;width:175px;font-size:12px;"></div>'; 
if(document.all) 
{ 
str += '<iframe style="position:absolute;z-index:2000;width:expression(this.previousSibling.offsetWidth);'; 
str += 'height:expression(this.previousSibling.offsetHeight);'; 
str += 'left:expression(this.previousSibling.offsetLeft);top:expression(this.previousSibling.offsetTop);'; 
str += 'display:expression(this.previousSibling.style.display);" scrolling="no" frameborder="no"></iframe>'; 
} 
var div = document.createElement("div"); 
div.innerHTML = str; 
div.id = "ContainerPanel"; 
div.style.display ="none"; 
document.body.appendChild(div); 
}//����calendar.show(dateControl, popControl); 


