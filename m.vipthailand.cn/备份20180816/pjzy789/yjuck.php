<?
set_time_limit(0);
ini_set('display_errors','Off');
require("../config/conn.php");
require("../config/function.php");
$sj=date("Y-m-d H:i:s");
$gxsj=htmlget("http://www.yjcode.com/update/getsj.php?ty1=fcw&ty2=t601");
if(strstr($gxsj,"none")!=""){echo "zx";exit;}
while0("*","fcw_update order by sj desc");if(!$row=mysql_fetch_array($res)){echo $gxsj;exit;}
if(strtotime($gxsj)>strtotime($row[sj])){echo $gxsj;exit;}else{echo "zx";exit;}

?>