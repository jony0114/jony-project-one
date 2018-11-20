<?php
set_time_limit(0);
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");

$bh=sqlzhuru($_POST["bh"]);
while1("*","fcw_admin where adminuid='".sqlzhuru($_POST[adminuid])."' and adminpwd='".sqlzhuru($_POST[adminpwd])."'");if(!$row1=mysql_fetch_array($res1)){echo "1";exit;}
while1("*","fcw_fang where bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){echo "1";exit;}
if(returncount("fcw_tp where bh='".$bh."'")>=14){echo "2";exit;}
$userid=returnuserid($row1[uid]);
$sj=date("Y-m-d H:i:s");
$targetFolder = "upload/".$userid."/f/".$bh."/";
createDir("../".$targetFolder);
$mbh=str_replace(" ","",microtime()."f".$userid);
$mbh=str_replace(".","",$mbh);

$verifyToken = md5('unique_salt' . sqlzhuru($_POST['timestamp']));


if (!empty($_FILES) && sqlzhuru($_POST['token']) == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = "../".$targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $mbh.".jpg";
	
	$fileTypes = array('jpg','jpeg','gif','png');
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
		
		move_uploaded_file($tempFile,$targetFile);
		$cm=new CreatMiniature();
		$bw=600;$bg=0;$sw=200;$sh=150;
		$imgsrc="../".$targetFolder.$mbh.".jpg";
        list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
        $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bgv);}
        imageWaterMark($imgsrc,websypos,"../img/shuiyin.png","","","","",0,0);
		if($width>$sw){$cm->Cut("../".$targetFolder.$mbh."-1.jpg",$sw,$sh);}else{copy($imgsrc,"../".$targetFolder.$mbh."-1.jpg");}
		$wjv=$targetFolder.$mbh.".jpg";
		$nxh=returnxh("fcw_tp"," and bh='".$bh."'");
		intotable("fcw_tp","bh,tp,type1,iffm,sj,uid,xh","'".$bh."','".$wjv."','".$row1[type1]."',0,'".$sj."','".$row1[uid]."',".$nxh."");
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
?>
