<?
set_time_limit(0);
error_reporting(NULL);
ini_set('display_errors','Off');
include("../config/conn.php");
include("../config/function.php");
date_default_timezone_set('Asia/Shanghai');
$wzget=$_SERVER['PHP_SELF'];
if(empty($wzget)){echo "ok";}
$ht1=preg_split("/\//",$wzget);
$houtai=$ht1[count($ht1)-2];
$sj=date("Y-m-d H:i:s");
$zip_filename = "gx.zip";
$zip_filepath = $zip_filename;
if(!is_file($zip_filepath))
{die('Error Code:1002');}
$zip = new ZipArchive();
$rs = $zip->open($zip_filepath);
if($rs !== TRUE)
{die('Error Code:1001');}
$zip->extractTo("../");
$zip->close();
@recurse_copy("../fcwmanage/","../".$houtai."/");
@delDirAndFile("../fcwmanage/");
@htmlget(weburl."update.php");
@delFile("../update.php");
delFile("gx.zip");
intotable("fcw_update","sj","'".$_GET[sersj]."'");
echo "ok";
?>