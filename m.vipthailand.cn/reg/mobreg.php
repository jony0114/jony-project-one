<?
include("../config/conn.php");
include("../config/function.php");
$mot=$_GET[mot];
if(empty($mot)){echo "err1";exit;}

$yzm=$_GET[txyzm];
if(empty($yzm)){echo "err2";exit;}
if(strtolower($_SESSION["authnum_session"])!=strtolower($yzm)){echo "err2";exit;}

if(panduan("mot,ifmot","fcw_user where mot='".$mot."' and ifmot=1")==1){echo "err1";exit;}

while1("*","fcw_smsmb where mybh='001'");
if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="验证码：${yzm},您正在进行手机验证，如果不是本人操作，请忽略此信息。";}
$yz=MakePass(6);
if(empty($rowcontrol[smsmode])){
 include("../config/mobphp/mysendsms.php");
 $str=str_replace("\${yzm}",$yz,$txt);
 yjsendsms($mot,$str);
}else{
 $sms_txt="{yzm:'".$yz."'}";
 $sms_mot=$mot;
 $sms_id=$row1[mbid];
 include("../config/mobphp/mysendsms.php");
}

$_SESSION["REGMOT"]=$mot;
$_SESSION["REGMOTYZ"]=$yz;echo "ok";exit;

?>