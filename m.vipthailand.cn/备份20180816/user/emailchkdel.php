<?
include("../config/conn.php");
include("../config/function.php");
if(empty($_SESSION[FCWuser])){echo "ok";exit;}
while1("email,ifemail,uid","fcw_user where uid='".$_SESSION[FCWuser]."' and ifemail=1");if(!$row1=mysql_fetch_array($res1)){echo "ok";exit;}

require("../config/mailphp/sendmail.php");
$yz=MakePass(5);
$str="�������󶨣���֤�룺<font color='red' style='font-size:18px;'>".$yz."</font>,�����ڽ����������󶨲�����������Ǳ��˲���������Դ���Ϣ����".webname."��<hr>���ʼ�Ϊϵͳ����������ظ�";
yjsendmail("�������󶨡�".webname."��",$row1["email"],$str);

updatetable("fcw_user","bdemail='".$yz."' where uid='".$_SESSION[FCWuser]."'");echo "ok";exit;

?>