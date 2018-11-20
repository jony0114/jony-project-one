<?
include("../config/conn.php");
include("../config/function.php");
require_once("../config/qq/API/qqConnectAPI.php");
if(1==$rowcontrol[regqq]){Audit_alert("本站未开启QQ登录，请用帐号形式登录","./");}
$qc = new QC();
$acs = $qc->qq_callback();
$openid = $qc->get_openid();


//表示已登录开始 进行绑定
if(!empty($_SESSION["FCWuser"])){
 if(panduan("openid,uid,ifqq","fcw_user where openid='".$openid."' and ifqq=1")==1){Audit_alert("绑定失败，该QQ已经绑定过其他帐号","../user/");}
 updatetable("fcw_user","openid='',ifqq=0 where openid='".$openid."'");
 updatetable("fcw_user","openid='".$openid."',ifqq=1 where uid='".$_SESSION[FCWuser]."'");	
 php_toheader("../user/");
}
//表示已登录结束 进行绑定

//表示未登录开始
while0("uid,usertype,openid,pwd","fcw_user where openid='".$openid."'");if($row=mysql_fetch_array($res)){ //表示该QQ已经登录过
 $_SESSION[FCWuser]=$row[uid];
 $_SESSION[FCWuserID]=$row["usertype"];
 $_SESSION["FCWuserPWD"]=$row[pwd];
 php_toheader("../user/");
 exit;
}


$qc = new QC($acs,$openid);
$arr = $qc->get_user_info();
$nc=iconv('UTF-8', 'GB2312',$arr["nickname"]);

$bh=time();
$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
$uid="qq".$bh.rnd_num(300);
$pwd=rnd_num(100).time().rnd_num(1000);
$email=$uid."@qq.com";
$ut=1;
include("../reg/reg_tem.php");
php_toheader("../user/");

//表示未登录结束
?>