<?
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("权限不够","default.php");}
$bh=$_GET[bh];
while1("bh,uid","fcw_xq where bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){Audit_alert("楼盘不存在","loupanlist.php");}
$uid=$row1[uid];
$uip=$_SERVER["REMOTE_ADDR"];
intotable("fcw_loupanmsg","uid,xqbh,uip,zt","'".$uid."','".$bh."','".$uip."',99");$id=mysql_insert_id();
php_toheader("loupanmsg.php?bh=".$bh."&id=".$id);

?>
