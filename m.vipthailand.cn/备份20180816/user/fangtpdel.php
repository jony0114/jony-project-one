<?
include("../config/conn.php");
include("../config/function.php");
while1("*","fcw_tp where id=".$_GET[id]);if($row1=mysql_fetch_array($res1)){
 while2("uid,zjuid","fcw_user where uid='".$row1[uid]."'");if($row2=mysql_fetch_array($res2)){
  if($row2[uid]==$_SESSION[FCWuser] || $row2[zjuid]==$_SESSION[FCWuser]){  
  delFile("../".str_replace(".","-1.",$row1[tp]));
  delFile("../".$row1[tp]);
  deletetable("fcw_tp where id=".$_GET[id]);
  }
 }
}
?>
