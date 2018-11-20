<?
include("../config/conn.php");
include("../config/function.php");
$mob=$_GET[mob];
if(empty($mob) || empty($_GET[uid])){echo "True";exit;}
if(panduan("uid,mot","fcw_user where mot='".$mob."' and uid='".$_GET[uid]."'")==0){echo "True";exit;}

while1("*","fcw_smsmb where mybh='003'");
if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="验证码：${yzm},您正在找回密码，如果不是本人操作，请忽略此信息。";}
$yz=MakePass(6);
if(empty($rowcontrol[smsmode])){
 include("../config/mobphp/mysendsms.php");
 $str=str_replace("\${yzm}",$yz,$txt);
 yjsendsms($mob,$str);
}else{
 if(1==$rowcontrol[smsmode]){$sms_txt="{yzm:'".$yz."'}";}else{$sms_txt="{\"yzm\":\"".$yz."\"}";}
 $sms_mot=$mob;
 $sms_id=$row1[mbid];
 @include("../config/mobphp/mysendsms.php");
}

updatetable("fcw_user","getpwd='".$yz."' where uid='".$_GET[uid]."'");echo "ok";exit;

?>