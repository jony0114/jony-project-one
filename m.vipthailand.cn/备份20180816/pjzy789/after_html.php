<?
set_time_limit(0);
require("../config/conn.php");
require("../config/function.php");
AdminSes_audit();

$sj=date("Y-m-d H:i:s");
$bh=time();

$admin=$_GET[admin];
if(empty($admin)){$admin="0";}
$zl=$_GET[zl];

switch($admin)
{
 case "0": //常规缓存清理
 if(check_in("xcf1xcf",$zl)){
  html1();
  html2();
 }
 if(check_in("xcf2xcf",$zl)){
  while1("id,xq,admin,zt,xqzb,xqzb1,xqzb2","fcw_xq where admin=1 and zt=0 order by id asc");while($row1=mysql_fetch_array($res1)){
   if(!empty($row1[xqzb])){
   updatetable("fcw_fang","xqzb='".$row1[xqzb]."',xqzb1='".$row1[xqzb1]."',xqzb2='".$row1[xqzb2]."' where xq='".$row1[xq]."'");
   }
  }
 }
 break;
}
 echo "ok";
?>