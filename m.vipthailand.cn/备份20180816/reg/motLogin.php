<?
include("../config/conn.php");
include("../config/function.php");

$mot=$_GET["mot"];
if(panduan("mot,ifmot","fcw_user where mot='".$mot."' and ifmot=1")==1){echo "False";}else{echo "True";}
?>