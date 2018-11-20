<?php
/*
2014年起，友价团队全部源码不再做加密处理，全部开源，方便用户二次开发。
同时我们仅对正规渠道购买的用户提供技术支持。
另：如果源码购买后有转卖行为，我们即删除你的认证帐号，同时也不再提供任何支持。
www.yj99.cn
友价源码
*/
require("return1.php");
function panduan($pzd,$ptable){
 global $conn;
 $sqlpd="select ".$pzd." from ".$ptable;mysql_query("SET NAMES 'GBK'");$respd=mysql_query($sqlpd,$conn);
 if($rowpd=mysql_fetch_array($respd)){return 1;}else{return 0;}
}

function returnxh($tabxh,$sesxh=""){
$sqlxh="select * from ".$tabxh." where id<>0 ".$sesxh." order by xh desc";mysql_query("SET NAMES 'GBK'");$resxh=mysql_query($sqlxh);
if($rowxh=mysql_fetch_array($resxh)){$nxh=$rowxh[xh]+1;}else{$nxh=1;}
return $nxh;
}

function returnsum($zd,$t){
$sqlb="select sum(".$zd.") as allzd from ".$t;mysql_query("SET NAMES 'GBK'");$resb=mysql_query($sqlb);$rowb=mysql_fetch_array($resb);
if(empty($rowb[allzd])){return "0";}else{return $rowb[allzd];}
}

function returncount($ctable){
 $sqlcount="select count(*) as id from ".$ctable;
 mysql_query("SET NAMES 'GBK'");$rescount=mysql_query($sqlcount);$rowcount=mysql_fetch_array($rescount);return $rowcount[id];
}

function returnonecontrol($x){
$sqltp="select * from fcw_onecontrol where tyid=".$x;mysql_query("SET NAMES 'GBK'");$restp=mysql_query($sqltp);
if($rowtp=mysql_fetch_array($restp)){return $rowtp[txt];}else{return "";}
}

function returntp($tsql,$a=""){
$sqltp="select * from fcw_tp where ".$tsql;mysql_query("SET NAMES 'GBK'");$restp=mysql_query($sqltp);
if($rowtp=mysql_fetch_array($restp)){$t=preg_split("/\./",$rowtp[tp]);return $t[0].$a.".".$t[1];}else{return "";}
}

function returnarea($jbid,$aid){
if(empty($aid)){return "";}else{
$sqlarea="select id,name1,name2,admin from fcw_area where id=".$aid." and admin=".$jbid." order by xh asc";mysql_query("SET NAMES 'GBK'");$resarea=mysql_query($sqlarea);
 if($rowarea=mysql_fetch_array($resarea)){
  if($jbid==1){return $rowarea[name1];}	
  elseif($jbid==2){return $rowarea[name2];}	
 }else{return "";}
}
}

function returnsplx($jbid,$aid){
if(empty($aid)){return "";}else{
$sqlarea="select id,name1,name2,admin from fcw_sphy where id=".$aid." and admin=".$jbid." order by xh asc";mysql_query("SET NAMES 'GBK'");$resarea=mysql_query($sqlarea);
 if($rowarea=mysql_fetch_array($resarea)){
  if($jbid==1){return $rowarea[name1];}	
  elseif($jbid==2){return $rowarea[name2];}	
 }else{return "";}
}
}

function returnpmlx($aid){
if(empty($aid)){return "";}else{
$sqlarea="select id,name1 from fcw_splx where id=".$aid."";mysql_query("SET NAMES 'GBK'");$resarea=mysql_query($sqlarea);
 if($rowarea=mysql_fetch_array($resarea)){
  return $rowarea[name1];
 }else{return "";}
}
}

function returnemail($uid){
global $conn;
if(empty($uid)){return "";}
$sqlother="select uid,email from fcw_user where uid='".$uid."'";mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother,$conn);
if($rowother=mysql_fetch_array($resother)){return $rowother[email];}else{return "";}
}

function returnschool($jbid,$aid){
if(empty($aid)){return "";}else{
$sqlschool="select id,name1,name2,admin from fcw_school where id=".$aid." and admin=".$jbid." order by xh asc";mysql_query("SET NAMES 'GBK'");$resschool=mysql_query($sqlschool);
 if($rowschool=mysql_fetch_array($resschool)){
  if($jbid==1){return $rowschool[name1];}	
  elseif($jbid==2){return $rowschool[name2];}	
 }else{return "";}
}
}

function returnhelptype($tv,$tid){
$sqltype="select * from fcw_helptype where id=".$tid."";mysql_query("SET NAMES 'GBK'");$restype=mysql_query($sqltype);
$rowtype=mysql_fetch_array($restype);
if($tv==1){return $rowtype[name1];}else{return $rowtype[name2];}
}

function returnditie($jbid,$aid){
$sqlditie="select * from fcw_ditie where id=".$aid;mysql_query("SET NAMES 'GBK'");$resditie=mysql_query($sqlditie);
 if($rowditie=mysql_fetch_array($resditie)){
  if($jbid==1){return $rowditie[name1];}	
 }else{return "";}
}

function returnshangquan($aid){
$sqlsq="select * from fcw_shangquan where id=".$aid;mysql_query("SET NAMES 'GBK'");$ressq=mysql_query($sqlsq);
 if($rowsq=mysql_fetch_array($ressq)){return $rowsq[tit];}else{return "";}
}

function returngongjiao($jbid,$aid){
$sqlgongjiao="select * from fcw_gongjiao where id=".$aid." and admin=".$jbid." order by xh asc";mysql_query("SET NAMES 'GBK'");$resgongjiao=mysql_query($sqlgongjiao);
 if($rowgongjiao=mysql_fetch_array($resgongjiao)){
  if($jbid==1){return $rowgongjiao[name1];}	
 }else{return "";}
}

function returnwylx($tyid,$wv){
 global $res3;
 if($tyid==1){while3("id,name2","fcw_wylx where id=".$wv);if($row3=mysql_fetch_array($res3)){return $row3[name2];}else{return "";}}
 if($tyid==2){while3("id,name1","fcw_wylx where name1='".$wv."'");if($row3=mysql_fetch_array($res3)){return $row3[id];}else{return "";}}
 if($tyid==3){while3("id,name1","fcw_wylx where id=".$wv);if($row3=mysql_fetch_array($res3)){return $row3[name1];}else{return "";}}
 if($tyid==4){while3("id,name1,name2","fcw_wylx where name1='".$wv."'");if($row3=mysql_fetch_array($res3)){return $row3[name2];}else{return "";}}
}

function returnbslx($tyid){
 global $res3;
 while3("*","fcw_bslx where id=".$tyid);if($row3=mysql_fetch_array($res3)){return $row3[name1];}else{return "";}
}

function returnjiazxtype($tyid,$wv){
 global $res3;
 if($tyid==1){while3("id,type1","fcw_jia_zxtype where id=".$wv);if($row3=mysql_fetch_array($res3)){return $row3[type1];}else{return "";}}
 if($tyid==2){while3("id,type2","fcw_jia_zxtype where id=".$wv);if($row3=mysql_fetch_array($res3)){return $row3[type2];}else{return "";}}
}

function returnnewstype($tyid,$wv){
 global $res3;
 if($tyid==1){while3("id,name1","fcw_newstype where id=".$wv);if($row3=mysql_fetch_array($res3)){return $row3[name1];}else{return "";}}
 if($tyid==2){while3("id,name2","fcw_newstype where id=".$wv);if($row3=mysql_fetch_array($res3)){return $row3[name2];}else{return "";}}
}

function returnwyts($tyid,$wv){
 global $res3;
 if($tyid==1){while3("id,name1","fcw_wyts where id=".$wv);if($row3=mysql_fetch_array($res3)){return $row3[name1];}else{return "";}}
 if($tyid==2){while3("id,name1","fcw_wyts where name1='".$wv."'");if($row3=mysql_fetch_array($res3)){return $row3[id];}else{return "";}}
}

function returnzxqk($zxid){ 
 if(empty($zxid)){return "";}
 global $res3;
 while3("id,name1","fcw_zxqk where id=".$zxid);if($row3=mysql_fetch_array($res3)){return $row3[name1];}else{return "";}
}

function returnfwlc($zxid){ 
 if(empty($zxid)){return "";}
 global $res3;
 while3("id,name1","fcw_fwlc where id=".$zxid);if($row3=mysql_fetch_array($res3)){return $row3[name1];}else{return "";}
}

function returnfwcx($cxid){
 global $res3;
 while3("id,name1","fcw_fwcx where id=".$cxid);if($row3=mysql_fetch_array($res3)){return $row3[name1];}else{return "";}
}

function returnxq($xid,$xs="id"){
 global $res3;
 if($xs=="id"){$ses="id=".$xid;}elseif($xs=="bh"){$ses="bh='".$xid."'";}
 while3("id,xq","fcw_xq where ".$ses);if($row3=mysql_fetch_array($res3)){return $row3[xq];}else{return "";}
}

function returnxqid($xxq){
 global $res3;
 while3("id,xq","fcw_xq where xq='".$xxq."'");if($row3=mysql_fetch_array($res3)){return $row3[id];}else{return "";}
}

function returnuname($ruid){
 global $res3;
 while3("uid,uname","fcw_user where uid='".$ruid."'");if($row3=mysql_fetch_array($res3)){return $row3[uname];}else{return "";}
}

function returnnc($ruid){
 global $res3;
 while3("uid,nc","fcw_user where uid='".$ruid."'");if($row3=mysql_fetch_array($res3)){return $row3[nc];}else{return "";}
}

function returnmot($ruid){
 global $res3;
 while3("uid,mot","fcw_user where uid='".$ruid."'");if($row3=mysql_fetch_array($res3)){return $row3[mot];}else{return "";}
}

function returnzjuid($muid){
 global $res3;
 while3("uid,zjuid,ifzjuser","fcw_user where uid='".$muid."' and ifzjuser=1");if($row3=mysql_fetch_array($res3)){return $row3[zjuid];}else{return "";}
}

function returnuserid($u){
if(empty($u)){return 0;}
$sqlother="select id,uid from fcw_user where uid='".$u."'";mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);
$rowother=mysql_fetch_array($resother);
return $rowother[id];
}

function returnuser($u){
$sqlother="select id,uid from fcw_user where id=".$u;mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);
$rowother=mysql_fetch_array($resother);
return $rowother[uid];
}

function returnzjgs($x){
 if(empty($x)){return "";}
 $sqlu="select id,usertype,zjuid,company from fcw_user where usertype=2 and id=".$x;mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);if(!$rowu=mysql_fetch_array($resu)){return "";}
 if(!empty($rowu[zjuid])){
  $sqlu1="select id,uid,company from fcw_user where uid='".$rowu[zjuid]."'";mysql_query("SET NAMES 'GBK'");$resu1=mysql_query($sqlu1);$rowu1=mysql_fetch_array($resu1);
  return $rowu1[company];
 }else{
  return $rowu[company];
 }
}

function returnjiapty($jbid,$aid){
$sqlp="select * from fcw_jia_phototype where id=".$aid;mysql_query("SET NAMES 'GBK'");$resp=mysql_query($sqlp);
 if($rowp=mysql_fetch_array($resp)){
  if($jbid==1){return $rowp[type1];}	
  elseif($jbid==2){return $rowp[type2];}	
  elseif($jbid==3){return $rowp[type3];}	
 }else{return "";}
}

function returnjcty($jbid,$aid){
$sqlp="select * from fcw_jia_jctype where id=".$aid;mysql_query("SET NAMES 'GBK'");$resp=mysql_query($sqlp);
 if($rowp=mysql_fetch_array($resp)){
  if($jbid==1){return $rowp[type1];}	
  elseif($jbid==2){return $rowp[type2];}	
  elseif($jbid==3){return $rowp[type3];}	
 }else{return "";}
}

function returnjcmyty($jbid,$aid){
$sqlp="select * from fcw_jia_myjctype where id=".$aid;mysql_query("SET NAMES 'GBK'");$resp=mysql_query($sqlp);
 if($rowp=mysql_fetch_array($resp)){
  if($jbid==1){return $rowp[type1];}	
  elseif($jbid==2){return $rowp[type2];}	
 }else{return "";}
}

function returnuserdj($u){
$sqlu="select * from fcw_user where id=".$u;mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);$rowu=mysql_fetch_array($resu);
if(empty($rowu[userdj])){
 $sqld="select * from fcw_userdj order by xh asc";mysql_query("SET NAMES 'GBK'");$resd=mysql_query($sqld);if($rowd=mysql_fetch_array($resd)){return $rowd[id];}else{return 0;}
 }else{
 return $rowu[userdj];
 }
}

function returndjname($d){
 $sqld="select * from fcw_userdj where id=".$d;mysql_query("SET NAMES 'GBK'");$resd=mysql_query($sqld);if($rowd=mysql_fetch_array($resd)){return $rowd[name1];}else{return "";}
}

function adread($adbh,$w,$h){
$sqlad="select * from fcw_ad where adbh='".$adbh."'";
mysql_query("SET NAMES 'GBK'");
$resad=mysql_query($sqlad);
if($rowad=mysql_fetch_array($resad)){
switch($rowad[type1]){
case "代码":
echo "$rowad[txt]";
break;
case "图片":
if($h==0 || $w==0){
echo "<a href=\"".$rowad[aurl]."\" target=_blank><img border=0 src=".weburl."ad/".$rowad[bh].".".$rowad[jpggif]."></a>";
}else{
echo "<a href=$rowad[aurl] target=_blank><img border=0 src=".weburl."ad/$rowad[bh].$rowad[jpggif] width=$w height=$h></a>";
}
break;
case "文字":
echo "·<a href=\"".$rowad[aurl]."\" target=_blank>".$rowad[utit]."</a>";
break;
case "动画":
echo "<div class=\"ad\"><embed src=\"".weburl."ad/".$rowad[bh].".swf\" quality=\"high\" width=\"".$rowad[aw]."\" height=\"".$rowad[ah]."\" wmode=transparent type=\"application/x-shockwave-flash\"></embed></div>";
break;
}
}
}

function adreadid($adid,$w,$h){
$sqlad="select * from fcw_ad where id=".$adid."";
mysql_query("SET NAMES 'GBK'");
$resad=mysql_query($sqlad);
if($rowad=mysql_fetch_array($resad)){
switch($rowad[type1]){
case "代码":
echo "$rowad[txt]";
break;
case "图片":
if($h==0 || $w==0){
echo "<a href=\"".$rowad[aurl]."\" target=_blank><img border=0 src=".weburl."ad/".$rowad[bh].".".$rowad[jpggif]."></a>";
}else{
echo "<a href=$rowad[aurl] target=_blank><img border=0 src=".weburl."ad/$rowad[bh].$rowad[jpggif] width=$w height=$h></a>";
}
break;
case "文字":
echo "·<a href=\"".$rowad[aurl]."\" target=_blank>".$rowad[utit]."</a>";
break;
case "动画":
echo "<div class=\"ad\"><embed src=\"".weburl."ad/".$rowad[bh].".swf\" quality=\"high\" width=\"".$rowad[aw]."\" height=\"".$rowad[ah]."\" wmode=transparent type=\"application/x-shockwave-flash\"></embed></div>";
break;
}
}
}
function adwhile($adbh,$adnum=0){
$li="";
if($adnum!=0){$li=" limit ".$adnum;}
$sqlad="select * from fcw_ad where adbh='".$adbh."' order by xh asc".$li;
mysql_query("SET NAMES 'GBK'");
$resad=mysql_query($sqlad);
while($rowad=mysql_fetch_array($resad)){
switch($rowad[type1]){
case "代码":
echo "<div class=\"ad1\">$rowad[txt]</div>";
break;
case "图片":
echo "<div class=\"ad1\"><a href=\"".$rowad[aurl]."\" target=_blank><img alt=\"".$rowad[tit]."\" border=0 src=".weburl."ad/".$rowad[bh].".".$rowad[jpggif]."></a></div>";
break;
case "文字":
echo "<div class=\"ad1\">·<a href=\"".$rowad[aurl]."\" target=_blank>".$rowad[tit]."</a></div>";
break;
case "动画":
echo "<div class=\"ad1\"><embed src=\"".weburl."/ad/".$rowad[bh].".swf\" quality=\"high\" width=\"".$rowad[aw]."\" height=\"".$rowad[ah]."\" wmode=transparent type=\"application/x-shockwave-flash\"></embed></div>";
break;
}
}
}
?>