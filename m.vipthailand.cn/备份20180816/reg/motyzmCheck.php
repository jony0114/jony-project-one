<?
include("../config/conn.php");
include("../config/function.php");
$yzm=$_GET["yzm"];
if(empty($yzm)){echo "True";exit;}
if(strtolower($_SESSION["REGMOTYZ"])!=strtolower($yzm)){echo "True";exit;}
echo "False";
?>