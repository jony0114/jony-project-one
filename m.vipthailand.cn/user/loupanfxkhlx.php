<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$xqbh=$_GET[xqbh];
if(empty($xqbh)){Audit_alert("来源路径有误！","../");}
while1("*","fcw_xq where bh='".$xqbh."' and iffx=1 and zt=0 and ifxj=0");if(!$row1=mysql_fetch_array($res1)){Audit_alert("项目不存在或来源网址有误！","../");}
$uid=$row1[uid];
$userid=returnuserid($_SESSION[FCWuser]);
$fxuid=$row1[fxuid];
$sj=date("Y-m-d H:i:s");
while1("*","fcw_loupanfxkh where zt=99 and uid1='".$_SESSION[FCWuser]."' and xqbh='".$xqbh."'");if($row1=mysql_fetch_array($res1)){
 updatetable("fcw_loupanfxkh","sj='".$sj."' where zt=99 and uid1='".$_SESSION[FCWuser]."' and xqbh='".$xqbh."'");
 $mbh=$row1[bh];
}else{
 $mbh=time()."fx".$userid;
 intotable("fcw_loupanfxkh","bh,uid,xqbh,zt,jd,uid1,uid2,uid3,sj,ifmoney","'".$mbh."','".$uid."','".$xqbh."',99,99,'".$_SESSION[FCWuser]."','','".$fxuid."','".$sj."',0");
}

php_toheader("loupanfxkh.php?mybh=".$mbh."&xqbh=".$xqbh);

?>