<?
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("权限不够","default.php");}
$bh=$_GET[bh];
while1("bh,uid,areaid,areaids","fcw_xq where bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){Audit_alert("楼盘不存在","loupanlist.php");}
$userid=returnuserid($row1[uid]);
$uid=$row1[uid];
$sj=date("Y-m-d H:i:s");
$areaid=$row1[areaid];
$areaids=$row1[areaids];

while1("*","fcw_huxing where zt=99 and uid='".$uid."' and xqbh='".$bh."'");if($row1=mysql_fetch_array($res1)){
 updatetable("fcw_huxing","sj='".$sj."' where zt=99 and uid='".$uid."' and xqbh='".$bh."'");
 $mbh=$row1[bh];
}else{
 $mbh=time()."j".$userid;
 $xh=returnxh("fcw_huxing"," and zt<>99 and uid='".$uid."' and xqbh='".$bh."'");
 intotable("fcw_huxing","uid,sj,xqbh,bh,djl,areaid,areaids,zt,xh","'".$uid."','".$sj."','".$bh."','".$mbh."',1,".$areaid.",".$areaids.",99,".$xh."");
}

php_toheader("loupanhx.php?mybh=".$mbh."&bh=".$bh);
?>
