<?
include("../config/conn.php");
include("../config/function.php");
$yx=$_POST["yx"];
if(empty($yx)){echo "True";exit;}
if(panduan("*","fcw_user where email='".$yx."' and ifemail=1")==1){echo "True";}else{echo "False";exit;}
?>