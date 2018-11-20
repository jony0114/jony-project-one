<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
while1("*","fcw_hetong where zjuserid=".$userid." and bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){Audit_alert("需要店长身份才可以编辑！","hetonglist.php","parent.");}

$sj=date("Y-m-d H:i:s");
$mybh=time()."cw".$row2[id];
$uip=$_SERVER["REMOTE_ADDR"];
intotable("fcw_htcaiwu","userid,zjuserid,htbh,mybh,sj,uip,zt","".$row1[userid].",".$userid.",'".$bh."','".$mybh."','".$sj."','".$uip."',99");
php_toheader("htcaiwutxt.php?bh=".$bh."&mybh=".$mybh);
?>
