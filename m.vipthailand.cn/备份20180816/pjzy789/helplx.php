<?
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(!strstr($adminqx,",0,") && !strstr($adminqx,",0601,")){Audit_alert("Ȩ�޲���","default.php");}
$sj=date("Y-m-d H:i:s");
while1("*","fcw_help where zt=99");
if($row1=mysql_fetch_array($res1)){
 updatetable("fcw_help","sj='".$sj."' where id=".$row1[id]);$bh=$row1[bh];
 }else{
 $bh=time()."h".rnd_num(100);intotable("fcw_help","bh,sj,zt,djl","'".$bh."','".$sj."',99,1");
}
php_toheader("help.php?bh=".$bh);
?>
