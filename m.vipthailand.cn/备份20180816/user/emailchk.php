<?
include("../config/conn.php");
include("../config/function.php");
if(empty($_SESSION[FCWuser])){echo "ok";exit;}
$email=$_GET[email];
if(empty($email)){echo "True";exit;}
if(panduan("uid,email,ifemail","fcw_user where email='".$email."' and ifemail=1")==1){echo "True";exit;}

require("../config/mailphp/sendmail.php");
$yz=MakePass(5);
$str="��֤�룺<font color='red' style='font-size:18px;'>".$yz."</font>,�����ڽ�������󶨣�������Ǳ��˲���������Դ���Ϣ����".webname."��<hr>���ʼ�Ϊϵͳ����������ظ�";
yjsendmail("����󶨡�".webname."��",$email,$str);
updatetable("fcw_user","bdemail='".$yz."',email='".$email."' where uid='".$_SESSION[FCWuser]."'");echo "ok";exit;

?>