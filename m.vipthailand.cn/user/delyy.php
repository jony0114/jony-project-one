<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION[FCWuser]);
$sj=date("Y-m-d H:i:s");

$fid=$_GET[fid];
while0("*","fcw_fang where id=".$fid);$row=mysql_fetch_array($res);
if($row[type1]=="����"){$u="chushoulist.php";}
elseif($row[type1]=="����"){$u="chuzulist.php";}
deletetable("fcw_cflist where userid=".$userid." and fid=".$fid."");
Audit_alert("ɾ��ԤԼ�ط��ɹ�",$u);
?>
