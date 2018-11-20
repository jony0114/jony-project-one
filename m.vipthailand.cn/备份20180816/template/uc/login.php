<?
//修改这个，要同步修改手机版的
/////////////////////有uc开始//////////////////////
if(1==$rowcontrol[ifuc]){
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 if($WAPLJ==1){$wapljv="../";$wapljv1="../../reg/";}
 include $wapljv."../config.inc.php";
 include $wapljv."../include/db_mysql.class.php";
 $db = new dbstuff;
 $db->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
 unset($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
 include $wapljv."../uc_client/client.php";
 list($uidnum, $username, $password, $email) = uc_user_login(sqlzhuru($_POST[t1]), sqlzhuru($_POST[t2]));  //登录
  if($uidnum>0) {   //uc登录成功
   echo uc_user_synlogin($uidnum);  //同步登录
   if(panduan("uid","fcw_user where uid='".sqlzhuru($_POST[t1])."'")==0){
    $uid=sqlzhuru($_POST[t1]);
    $pwd=sqlzhuru($_POST[t2]);
	$ut=1;
    $nc=$uid;
    include($wapljv1."reg_tem.php");
   }else{
	$uid=sqlzhuru($_POST[t1]);
	$sql="select * from fcw_user where uid='".$uid."'";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql,$conn);$row=mysql_fetch_array($res);
    $sj=date("Y-m-d H:i:s");
    $uip=$_SERVER["REMOTE_ADDR"];
    intotable("fcw_loginlog","admin,uid,sj,uip","1,".$row[uid].",'".$sj."','".$uip."'");
    $_SESSION["FCWuser"]=$uid;
    $_SESSION[FCWuserPWD]=sha1($row[pwd]);
    $_SESSION["FCWuserID"]=$row[usertype];
   }
  }else{   //uc登录失败
   $uid=sqlzhuru($_POST[t1]);$pwd=sqlzhuru($_POST[t2]);
   include($wapljv1."login_tem.php");
   if($data = uc_get_user($uid)) {
   uc_user_edit($uid ,$pwd,$pwd,"",1);
   }else{
   $ma=returnemail($uid);
   $uidnum = uc_user_register($uid,$pwd,$ma);
   }
   list($uidnum, $username, $password, $email) = uc_user_login(sqlzhuru($_POST[t1]),$pwd);  //uc登录
   echo uc_user_synlogin($uidnum);  //同步登录
  }
php_toheader(returnjgdw($_SESSION["sessurl"],"","../user/"));
}
////////////////////有UC结束////////////////////////

?>