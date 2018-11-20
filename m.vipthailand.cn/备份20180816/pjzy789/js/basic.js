//layer提示整合
function layerTS(x,y){
 $("#"+y).focus();
 $("#"+y).blur();
 iflayerMSG=1;
 nfocus=y;
 layer.alert(x, {icon:5,closeBtn: 0,title:"提示",success:layTSclo()},function(index){layer.close(index);iflayerMSG=0;$("#"+y).focus();
 });
 return false;
}
function layTSclo(){
 document.onkeydown = function (e) {
  var ev = document.all ? window.event : e;
  if (ev.keyCode =="13" || ev.keyCode =="27") {if(iflayerMSG==0){layer.close(layer.index);$("#"+nfocus).focus();}iflayerMSG=0;}
  }
}

function topd3over(){
document.getElementById("tla").style.display="";
}
function topd3out(){
document.getElementById("tla").style.display="none";
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

function checkDEL(x,y){
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
if(str==""){alert("请至少选择一条数据");return false;}

 if(confirm("确定执行该项操作吗?")){
 layer.msg('正在处理数据', {icon: 16  ,time: 0,shade :0.25});
 $.get("noRefresh.php",{admin:x,idbh:str,tab:y},function(result){
  layer.closeAll();
  a=result.split("+");
  if(a[1]=="True"){location.reload();return false;}
  else if(a[1]=="Err9"){alert("删除失败，权限不够");return false;}
  else{alert("删除失败，该分类下还有二级分类或其他关联信息未删除");return false;}
 });
 
 }else{return false;}

}

//分页跳转
function pagegoto(x,y){
if(isNaN(document.getElementById("pagetext").value)){alert("请输入正确的页数！");document.getElementById("pagetext").select();return false;}	
gourl(x+"?"+"page="+document.getElementById("pagetext").value+"&"+y);
}
function gourl(x){
location.href=x;	
}

function areacha(){
document.getElementById("fareas").style.display="";
window.frames["fareas"].location.href="areas.php?id="+document.getElementById("area1").value;	
if(document.getElementById("fsqid")){
window.frames["fsqid"].location.href="shangquana.php?areaid="+document.getElementById("area1").value;	
}
}

function hylxcha(){
document.getElementById("fhylx2").style.display="";
window.frames["fhylx2"].location.href="../config/hylx2.php?id="+document.getElementById("thylx").value;	
}

//学区切换
function schoolover(x,y){
 for(i=1;i<document.getElementById("schoolnum").innerHTML;i++){
 document.getElementById("schoolm"+i).style.display="none";
 }
 document.getElementById("schoolm"+x).style.display="";
 document.getElementById("nowschool"+x).innerHTML=y+"：";
}
