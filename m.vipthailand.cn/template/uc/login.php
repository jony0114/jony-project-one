<?
//�޸������Ҫͬ���޸��ֻ����
/////////////////////��uc��ʼ//////////////////////
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
 list($uidnum, $username, $password, $email) = uc_user_login(sqlzhuru($_POST[t1]), sqlzhuru($_POST[t2]));  //��¼
  if($uidnum>0) {   //uc��¼�ɹ�
   echo uc_user_synlogin($uidnum);  //ͬ����¼
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
  }else{   //uc��¼ʧ��
   $uid=sqlzhuru($_POST[t1]);$pwd=sqlzhuru($_POST[t2]);
   include($wapljv1."login_tem.php");
   if($data = uc_get_user($uid)) {
   uc_user_edit($uid ,$pwd,$pwd,"",1);
   }else{
   $ma=returnemail($uid);
   $uidnum = uc_user_register($uid,$pwd,$ma);
   }
   list($uidnum, $username, $password, $email) = uc_user_login(sqlzhuru($_POST[t1]),$pwd);  //uc��¼
   echo uc_user_synlogin($uidnum);  //ͬ����¼
  }
php_toheader(returnjgdw($_SESSION["sessurl"],"","../user/"));
}
////////////////////��UC����////////////////////////

?>