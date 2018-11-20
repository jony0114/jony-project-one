<?
if(empty($_SESSION[FCWuser]) && !empty($_POST[R1])){
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $sj0=dateYMD($sj)." 00:00:00";
 $sj1=dateYMD($sj)." 23:59:59";
 if(returncount("fcw_user where uip='".$uip."' and sj>'".$sj0."' and sj<'".$sj1."'")>20){Audit_alert("发布过于频繁，请明天再来","../");}
 $ut=1;
 $uid=time().rnd_num(1000);
 $pwd=sha1(rnd_num(500).time().rnd_num(50));
 $nc="免注册用户";
 $email="mianzhuce@qq.com";
 include("../template/uc/reg.php");
 include("../reg/reg_tem.php");
 include("../template/uc/reg1.php");
}

?>