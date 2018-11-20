<?
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){Audit_alert("È¨ÏÞ²»¹»","default.php");}
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$bh=time()."jk".rnd_num(100);
createDir("../upload/jia/".dateYMDN($sj)."/");
createDir("../upload/jia/".dateYMDN($sj)."/".$bh."/");
$djl=rnd_num(200);
intotable("fcw_jia_zx","type1id,type2id,djl,sj,lastsj,uip,bh,zt,iftp","0,0,".$djl.",'".$sj."','".$sj."','".$uip."','".$bh."',99,0");

php_toheader("zx.php?bh=".$bh);
?>
