<?
 //UC��ʼ
 if(1==$rowcontrol[ifuc]){
 if($WAPLJ==1){$wapljv="../";}
 include $wapljv."../config.inc.php";
 include $wapljv."../include/db_mysql.class.php";
 $db = new dbstuff;
 $db->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
 unset($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
 include $wapljv."../uc_client/client.php";
 if($data = uc_get_user($uid)){Audit_alert("���û����Ѿ���ע�ᣬ����ѡ��","reg.php");}
 }
 //UC����
?>