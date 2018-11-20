<?
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("È¨ÏÞ²»¹»","default.php");}
$sj=date("Y-m-d H:i:s");
intotable("fcw_tag","sj,djl,admin,zt,ifjc","'".$sj."',0,".$_GET[admin].",99,0");$id=mysql_insert_id();
php_toheader("tag.php?id=".$id);
?>
