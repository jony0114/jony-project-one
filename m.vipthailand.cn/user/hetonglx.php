<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$userid=returnuserid($_SESSION[FCWuser]);
$bh=time()."ht".$userid;
$sj=date("Y-m-d H:i:s");
while1("uid,zjuid","fcw_user where uid='".$_SESSION[FCWuser]."'");$row1=mysql_fetch_array($res1);
intotable("fcw_hetong","userid,zjuserid,sj,bh,zt,qyr","".$userid.",".returnuserid($row1[zjuid]).",'".$sj."','".$bh."',99,'".dateYMD($sj)."'");
php_toheader("hetong.php?bh=".$bh);
?>
