<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$bh=$_GET[bh];
while1("*","fcw_fang where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$bh."'");
if(!$row1=mysql_fetch_array($res1)){Audit_alert("À´Ô´´íÎó£¡","./","parent.");}

$sj=date("Y-m-d H:i:s");
$mybh=time()."f".$row2[id];
$uip=$_SERVER["REMOTE_ADDR"];
intotable("fcw_fanggj","userid,zjuserid,type1,fangbh,mybh,fbuserid,sj,uip,zt","".returnuserid($row1[uid]).",".returnuserid($row1[zjuid]).",'".$row1[type1]."','".$bh."','".$mybh."',".returnuserid($_SESSION[FCWuser]).",'".$sj."','".$uip."',99");
php_toheader("fanggjtxt.php?bh=".$bh."&mybh=".$mybh);
?>
