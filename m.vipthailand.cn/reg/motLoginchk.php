<?
include("../config/conn.php");
include("../config/function.php");
$mot=$_GET[mot];
if(empty($mot)){echo "True";exit;}
while0("*","fcw_user where mot='".$mot."' and ifmot=1");if(!$row=mysql_fetch_array($res)){echo "True";exit;}

while1("*","fcw_smsmb where mybh='002'");
if($row1=mysql_fetch_array($res1)){$txt=$row1[txt];}else{$txt="验证码：${yzm},您正在使用手机号码快速登录，如果不是本人操作，请忽略此信息。";}
$yz=MakePass(6);
if(empty($rowcontrol[smsmode])){
 include("../config/mobphp/mysendsms.php");
 $str=str_replace("\${yzm}",$yz,$txt);
 yjsendsms($mot,$str);
}else{
 if(1==$rowcontrol[smsmode]){$sms_txt="{yzm:'".$yz."'}";}else{$sms_txt="{\"yzm\":\"".$yz."\"}";}
 $sms_mot=$mot;
 $sms_id=$row1[mbid];
 @include("../config/mobphp/mysendsms.php");
}

updatetable("fcw_user","getpwd='".$yz."' where mot='".$mot."' and ifmot=1");
?>