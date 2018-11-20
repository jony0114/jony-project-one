<?
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("È¨ÏÞ²»¹»","default.php");}
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$bh=time()."s".rnd_num(100);
createDir("../upload/shangquan/".$bh."/");
intotable("fcw_shangquan","areaid,bh,sj,djl,zt","0,'".$bh."','".$sj."',".rnd_num(100).",99");

php_toheader("shangquan.php?bh=".$bh);
?>
