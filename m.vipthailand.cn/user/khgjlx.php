<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
while1("*","fcw_kehu where (userid=".$userid." or zjuserid=".$userid.") and bh='".$bh."'");
if(!$row1=mysql_fetch_array($res1)){Audit_alert("À´Ô´´íÎó£¡","kehulist.php","parent.");}

$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$mybh=time()."gj".$row2[id];
intotable("fcw_kehugj","userid,zjuserid,khbh,mybh,fbuserid,sj,uip,zt","".$row1[userid].",".$row1[zjuserid].",'".$bh."','".$mybh."',".$userid.",'".$sj."','".$uip."',99");
php_toheader("khgjtxt.php?bh=".$bh."&mybh=".$mybh);
?>
