<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("Ȩ�޲���","default.php");}
$sql="select * from fcw_user where uid='".$_GET[uid]."'";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql,$conn);$row=mysql_fetch_array($res);
$_SESSION["FCWuser"]=$_GET[uid];
$_SESSION["FCWuserID"]=$row[usertype];
$_SESSION["FCWuserPWD"]=$row[pwd];
php_toheader("../user/");
?>