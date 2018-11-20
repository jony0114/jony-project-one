<?
 if(empty($uid) || empty($pwd)){Audit_alert("帐号或密码输入有误，返回重试","./");}
 $sql="select * from fcw_user where (uid='".$uid."' or (mot='".$uid."' and ifmot=1)) and pwd='".sha1($pwd)."'";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql,$conn);
 ;if(!$row=mysql_fetch_array($res)){Audit_alert("帐号密码验证错误，请返回重试","./");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 intotable("fcw_loginlog","admin,uid,sj,uip","1,".$row[uid].",'".$sj."','".$uip."'");
 updatetable("fcw_user","lastsj='".$sj."' where uid='".$row[uid]."'");
 $_SESSION["FCWuser"]=$row[uid];
 $_SESSION["FCWuserID"]=$row[usertype];
 $_SESSION["FCWuserPWD"]=$row[pwd];
?>