<?
set_time_limit(0);
header("Content-Type:text/html;charset=GB2312");
include("../../config/conn.php");
include("../../config/function.php");

$admin=intval($_GET[admin]);

if($admin==1){ //表示会员登录，并判断是否有发布权限
 while1("uid,pwd,usertype,qx","fcw_user where uid='".$_GET[uid]."' and pwd='".sha1($_GET[pwd])."'");if(!$row1=mysql_fetch_array($res1)){echo "err1";exit;}
 if($_GET[control]=="chuzu"){$qxv=",2,";}
 elseif($_GET[control]=="chushou"){$qxv=",3,";}
 elseif($_GET[control]=="qiugou"){$qxv=",4,";}
 elseif($_GET[control]=="qiuzu"){$qxv=",5,";}
 if(!strstr($row1[qx],$qxv)){echo "err2";exit;}
 if($row1[usertype]!=1 && $row1[usertype]!=2){echo "err2";exit;}
 $_SESSION[FCWuser]=$_GET[uid];
 $_SESSION[FCWuserID]=$row1[usertype]; 
 echo "ok";
	
}elseif($admin==2){ //表示会员注册
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 if($_GET[uid]=="" || $_GET[pwd]==""){echo "err0";exit;}
 $uid=$_GET[uid];
 if(strlen(stripos($uid,"/"))>0 || strlen(stripos($uid,";"))>0){echo "err0";exit;}
 if(panduan("uid","fcw_user where uid='".$uid."'")==1){echo "err2";exit;} 
 if($_GET[qx]=="cz"){$qxv=",2,";}elseif($_GET[qx]=="cs"){$qxv=",3,";}elseif($_GET[qx]=="qg"){$qxv=",4,";}elseif($_GET[qx]=="qz"){$qxv=",5,";}
 $qx="";
 if($rowcontrol[userfb]=="on"){$qx=",2,3,4,5,";}
 intotable("fcw_user","uid,pwd,usertype,sj,uip,email,money1,jf,djl,qx,sfzrz,yyzzrz,indexpm,sxnum,ifqq,zfmm","'".$uid."','".sha1($_GET[pwd])."',1,'".$sj."','".$uip."','".$_GET["mail"]."',0,0,0,'".$qx."',3,3,0,0,0,'".sha1(sqlzhuru($_GET[pwd]))."'");$id=mysql_insert_id();
 userregc($id,1);
 $_SESSION[FCWuser]=$uid;
 $_SESSION[FCWuserID]=1; 
 echo "ok";

}
?>