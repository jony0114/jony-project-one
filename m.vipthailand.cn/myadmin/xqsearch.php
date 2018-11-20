<?
header('Content-type: text/html; charset=gbk');
include("../config/conn.php");
include("../config/function.php");
$k1=returnsearch($_POST[keyv]);
$k=iconv('utf-8', 'gbk',safeEncoding($k1));
if(!empty($k)){
while1("*","fcw_xq where admin=1 and zt=0 and ifxj=0 and (xq like '%".$k."%' or py like '%".$k."%' or pyall like '%".$k."%') order by id asc limit 10");
while($row1=mysql_fetch_array($res1)){
?>
<a href="javascript:void(0);" onclick="onc('<?=$row1[xq]?>',<?=$row1[areaid]?>,<?=$row1[areaids]?>,'<?=$row1[xqadd]?>','<?=$row1[wyf]?>','<?=$row1[ld1]?>','<?=strtoupper($row1[ld2])?>')"><?=returntitdian($row1[xq],30)?></a>
<? }}?>
<script language="javascript">
function onc(x,y,z,xad,wy,a1,a2){
parent.document.f1.txq.value=x;
parent.document.f1.area2.value=z;
parent.document.f1.tmoney2.value=wy;
parent.document.getElementById("searchHtml").style.display="none";

if(y!=0){
 var obj = parent.document.getElementById('area1');
 var len = obj.length;
 for(var i=0;i<len;i++) {if(obj.options[i].value == y) {obj.options[i].selected = true;break;}}
 parent.document.f1.tfadd.value=xad;
 }
if(z!=0){parent.areacha();parent.document.getElementById("fareas").src="../config/areas.php?nid="+z+"&id="+y;}

ldr=parent.document.getElementById("ldread");
if(ldr){
str="";
if(a1!=""){
str="<select name='tld1' class='inp'>";
for(i=1;i<=a1;i++){
str=str+"<option value='"+i+"'>"+i+"</option>";
}
str=str+"</select><span class='fd' style='margin-right:10px;'>ºÅÂ¥</span>";
}
if(a2!=""){
str=str+"<select name='tld2' class='inp'>";
ti=91;
if(isNaN(a2)){
 for(var i=65;i<91;i++){
 zm=String.fromCharCode(i);
 if(zm==a2){ti=i;}
 if(i<=ti){str=str+"<option value='"+zm+"'>"+zm+"</option>";}
 }
}else{
 for(i=1;i<=a2;i++){
 str=str+"<option value='"+i+"'>"+i+"</option>";
 }
}
str=str+"</select><span class='fd' style='margin-right:10px;'>µ¥Ôª</span>";
}
if(str!=""){ldr.innerHTML=str;}
}

}
</script>