<?
include("../../config/conn.php");
include("../../config/function.php");
$sj=date("Y-m-d H:i:s");
if(empty($_SESSION["FCWuser"])){Audit_alert("��¼��ʱ!","./","parent.");}

$userid=returnuserid($_SESSION["FCWuser"]);
$sj=date("Y-m-d H:i:s");
$bh=time();
$uip=$_SERVER["REMOTE_ADDR"];
$money1=$_GET[m];
$ddbh=time().$userid.rnd_num(1000);	
intotable("fcw_dingdang","bh,ddbh,uid,sj,uip,money1,ddzt,alipayzt,bz,ifok","'".$bh."','".$ddbh."','".$_SESSION["FCWuser"]."','".$sj."','".$uip."',".$money1.",'�ȴ���Ҹ���','','΢��֧��',0");
php_toheader("example/native.php?ddbh=".$ddbh);
?>
