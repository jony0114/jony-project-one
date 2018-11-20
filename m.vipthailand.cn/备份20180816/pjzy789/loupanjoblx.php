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

while1("*","fcw_loupanjob where zt=99 and uid='".$uid."' and xqbh='".$bh."'");if($row1=mysql_fetch_array($res1)){
 updatetable("fcw_loupanjob","sj='".$sj."' where zt=99 and uid='".$uid."' and xqbh='".$bh."'");
 $mbh=$row1[bh];
}else{
 $mbh=time()."j".$userid;
 intotable("fcw_loupanjob","uid,xqbh,sj,djl,bh,zt,areaid,areaids","'".$uid."','".$bh."','".$sj."',1,'".$mbh."',99,".$areaid.",".$areaids."");
}

php_toheader("loupanjob.php?mybh=".$mbh."&bh=".$bh);
?>
