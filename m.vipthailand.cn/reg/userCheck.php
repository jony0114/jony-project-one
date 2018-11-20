<?
include("../config/conn.php");
include("../config/function.php");
$uid=js_unescape($_POST["uid"]);
if(empty($uid)){echo "True";exit;}
if(strlen($uid)<2 || strlen($uid)>20 || strlen(stripos($uid,"/"))>0 || strlen(stripos($uid,";"))>0){echo "err";exit;}
if(panduan("*","fcw_user where uid='".$uid."'")==1){echo "True";}else{
 include("../template/uc/usercheck.php");
 echo "False";exit;
}
?>