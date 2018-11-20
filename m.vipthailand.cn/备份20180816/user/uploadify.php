<?php
set_time_limit(0);
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
require("../config/tpclass.php");
$bh=returndeldian($_POST["bh"]);
if(!preg_match("/^[-a-zA-Z0-9]*$/",$bh)){exit;}

$userid=sqlzhuru($_POST["uid"]);
while1("id,uid","fcw_user where id=".$userid);$row1=mysql_fetch_array($res1);$uid=$row1[uid];
if(empty($userid)){echo "1";exit;}
while1("uid,pwd,usertype","fcw_user where uid='".$uid."' and pwd='".sqlzhuru($_POST["pwd"])."' and usertype=5");if(!$row1=mysql_fetch_array($res1)){echo "1";exit;}
while1("uid,bh,xq","fcw_xq where uid='".$uid."' and bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){echo "1";exit;}

if($rowcontrol[fklook]=="on"){$zt=0;}else{$zt=1;}
$xq=$row1[xq];
$tptyarr=preg_split("/,/",tptyarr_d);
$tpnumarr=preg_split("/,/",tpnumarr_d);
$tpnum=sqlzhuru($_POST["tpnumv"]);
$ty=$tptyarr[$tpnum];
$tit=$xq.$ty;
$sj=date("Y-m-d H:i:s");
$targetFolder = "upload/".$userid."/f/".$bh."/";
$mbh=str_replace(" ","",microtime()."pho".$userid);
$mbh=str_replace(".","",$mbh);

$verifyToken = md5('unique_salt' . sqlzhuru($_POST['timestamp']));

if (!empty($_FILES) && (sqlzhuru($_POST['token']) == $verifyToken)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = "../".$targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $mbh.".jpg";
	
	$fileTypes = array('jpg','jpeg','gif','png');
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array(strtolower($fileParts['extension']),$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		 
		 $cm=new CreatMiniature();
		 $bw=850;$bg=0;$sw=150;$sh=120;
		 $imgsrc="../".$targetFolder.$mbh.".jpg";
		 list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
         $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->BackFill($imgsrc,$bw,$bgv);}
         imageWaterMark($imgsrc,websypos,"../img/shuiyin.png","","","","",0,0);
		if($width>$sw){$cm->Cut("../".$targetFolder.$mbh."-1.jpg",$sw,$sh);}else{copy($imgsrc,"../".$targetFolder.$mbh."-1.jpg");}

        $ar1=sqlzhuru($_POST[lpareaid]);if(!is_numeric($ar1)){$ar1=0;}
		$ar2=sqlzhuru($_POST[lpareaids]);if(!is_numeric($ar2)){$ar2=0;}
		intotable("fcw_xqphoto","uid,xqbh,sj,tit,djl,bh,zt,tyid,iffm,areaid,areaids","'".$uid."','".$bh."','".$sj."','".$tit."',1,'".$mbh."',".$zt.",".$tpnumarr[$tpnum].",0,".$ar1.",".$ar2."");
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
?>
