<?
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){Audit_alert("È¨ÏÞ²»¹»","default.php");}
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$bh=time()."tz".rnd_num(100);
createDir("../upload/news/".dateYMDN($sj)."/");
createDir("../upload/news/".dateYMDN($sj)."/".$bh."/");
$djl=rnd_num(200);
intotable("fcw_tzlb","djl,sj,lastsj,uip,bh,zt","".$djl.",'".$sj."','".$sj."','".$uip."','".$bh."',99");
php_toheader("tzlb.php?bh=".$bh);
?>
