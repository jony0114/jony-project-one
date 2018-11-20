<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(2!=$_SESSION[FCWuserID]){Audit_alert("权限受限！","./");}
$userid=returnuserid($_SESSION[FCWuser]);
$bh=time()."kh".$userid;
$sj=date("Y-m-d H:i:s");
while1("uid,zjuid","fcw_user where uid='".$_SESSION[FCWuser]."'");$row1=mysql_fetch_array($res1);
intotable("fcw_kehu","userid,zjuserid,bh,sj,zt,admin,wtsj","'".$userid."','".returnuserid($row1[zjuid])."','".$bh."','".$sj."',99,1,'".$sj."'");
php_toheader("kehu.php?bh=".$bh);
?>
