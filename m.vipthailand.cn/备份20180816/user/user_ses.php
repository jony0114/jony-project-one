<?php
include("../config/conn.php");
include("../config/function.php");
sesCheck();
while0("*","fcw_user where zjuid='".$_SESSION[FCWuser]."' and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){Audit_alert("�����·����Դ��","./");}
$_SESSION[FCWuser]=$row[uid];
$_SESSION[FCWuserID]=$row[usertype];
php_toheader("./");
?>