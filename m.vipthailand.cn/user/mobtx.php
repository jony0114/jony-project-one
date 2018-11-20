<?
include("../config/conn.php");
include("../config/function.php");
while1("mot,uid","fcw_user where uid='".$_SESSION[FCWuser]."'");$row1=mysql_fetch_array($res1);
if(empty($row1[mot])){echo "err";exit;}
include("../config/mobphp/mysendsms.php");
$yz=MakePass(5);
$str="验证码：".$yz.",您正在进行提现设置，如果不是本人操作，请忽略此信息。";
yjsendsms($row1[mot],$str);
updatetable("fcw_user","getpwd='".$yz."' where uid='".$_SESSION[FCWuser]."'");
?>