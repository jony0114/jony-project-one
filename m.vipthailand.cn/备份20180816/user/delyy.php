<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION[FCWuser]);
$sj=date("Y-m-d H:i:s");

$fid=$_GET[fid];
while0("*","fcw_fang where id=".$fid);$row=mysql_fetch_array($res);
if($row[type1]=="出售"){$u="chushoulist.php";}
elseif($row[type1]=="出租"){$u="chuzulist.php";}
deletetable("fcw_cflist where userid=".$userid." and fid=".$fid."");
Audit_alert("删除预约重发成功",$u);
?>
