<?
include("../config/conn.php");
include("../config/function.php");

$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);
$u="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$wxlogin[0]."&secret=".$wxlogin[1]."&code=".$_GET[code]."&grant_type=authorization_code";
$str1=file_get_contents($u);
$a1=preg_split("/access_token\":\"/",$str1);
if(empty($a1[0])){php_toheader("../");}
$a2=preg_split("/\"/",$a1[1]);
$b1=preg_split("/openid\":\"/",$str1);
$b2=preg_split("/\"/",$b1[1]); 
$wxopenid=$b2[0]; //Ψһʶ���
if(empty($wxopenid)){php_toheader(weburl);}

$u="https://api.weixin.qq.com/sns/userinfo?access_token=".$a2[0]."&openid=".$wxlogin[0];
$str3=file_get_contents($u);
$c1=preg_split("/nickname\":\"/",$str3);
$c2=preg_split("/\"/",$c1[1]);
$d1=preg_split("/headimgurl\":\"/",$str3);
$d2=preg_split("/\"/",$d1[1]);
$tx=str_replace("\\","",$d2[0]); //ͷ��
if(check_in("unionid",$str3)){
$e1=preg_split("/unionid\":\"/",$str3);
$e2=preg_split("/\"/",$e1[1]); 
$unionid=$e2[0];
$noses="unionid='".$unionid."'";
}else{
$noses="wxopenid='".$wxopenid."'";
}

if(empty($wxopenid)){php_toheader(weburl);}

//��ʾδ��¼��ʼ
while0("uid,usertype,wxopenid,pwd","fcw_user where wxopenid='".$wxopenid."'");if($row=mysql_fetch_array($res)){ //��ʾ��΢���Ѿ�����
 $_SESSION[FCWuser]=$row[uid];
 $_SESSION[FCWuserID]=$row["usertype"];
 $_SESSION["FCWuserPWD"]=$row[pwd];
 php_toheader("../user/");
 exit;
}

//�޸ĸ��ļ���Ҫͬ���޸���reg/reg.php

$nc=iconv('UTF-8', 'GB2312',$c2[0]);
$bh=time();
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$uid="wx".$bh.rnd_num(300);
$pwd=rnd_num(100).time().rnd_num(1000);
$email=$uid."@qq.com";
$ut=1;
include("../reg/reg_tem.php");
php_toheader("../user/");

//��ʾδ��¼����

?>