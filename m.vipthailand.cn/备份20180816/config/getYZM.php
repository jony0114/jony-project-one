<?
session_start();
include("getSes.php");
$_vc = new ValidateCode();
$_vc->doimg();
$_SESSION["authnum_session"] = $_vc->getCode();
?>