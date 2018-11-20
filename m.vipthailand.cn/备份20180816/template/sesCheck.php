<?
set_time_limit(0);
header("Content-Type:text/html;charset=GB2312");
include("../config/conn.php");
include("../config/function.php");
if($_SESSION["FCWuser"]==""){echo "none";exit;}
else{
 while0("uid,nc","fcw_user where  uid='".$_SESSION[FCWuser]."'");if($row=mysql_fetch_array($res)){
  if(empty($row[nc])){echo $_SESSION["FCWuser"];}else{echo $row[nc];exit;}
 }else{echo "none";exit;}
}
?>