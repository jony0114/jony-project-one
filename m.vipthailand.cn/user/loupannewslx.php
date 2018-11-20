<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("权限受限！","./");}
$userid=returnuserid($_SESSION[FCWuser]);
$bh=$_GET[bh];
while1("bh,uid,areaid,areaids","fcw_xq where bh='".$bh."' and uid='".$_SESSION[FCWuser]."'");if(!$row1=mysql_fetch_array($res1)){Audit_alert("楼盘不存在","loupanlist.php");}
$sj=date("Y-m-d H:i:s");
$areaid=$row1[areaid];
$areaids=$row1[areaids];

while1("*","fcw_xqnews where zt=99 and uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");if($row1=mysql_fetch_array($res1)){
 updatetable("fcw_xqnews","sj='".$sj."' where zt=99 and uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
 $mbh=$row1[bh];
}else{
 $mbh=time()."n".$userid;
 intotable("fcw_xqnews","uid,xqbh,sj,djl,bh,zt,areaid,areaids","'".$_SESSION[FCWuser]."','".$bh."','".$sj."',1,'".$mbh."',99,".$areaid.",".$areaids."");
}

php_toheader("loupannews.php?mybh=".$mbh."&bh=".$bh);
?>
