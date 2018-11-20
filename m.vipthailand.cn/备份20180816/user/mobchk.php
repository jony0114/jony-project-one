<?
include("../config/conn.php");
include("../config/function.php");
if(empty($_SESSION[FCWuser])){echo "ok";exit;}
$mob=$_GET[mob];
if(empty($mob)){echo "True";exit;}
if(panduan("uid,mot,ifmot","fcw_user where mot='".$_GET[mob]."' and ifmot=1")==1){echo "True";exit;}

while1("*","fcw_smsmb where mybh='004'");
if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="验证码：${yzm},您正在进行手机绑定，如果不是本人操作，请忽略此信息。";}
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


updatetable("fcw_user","bdmot='".$yz."',mot='".$_GET[mob]."' where uid='".$_SESSION[FCWuser]."'");echo "ok";exit;

?>