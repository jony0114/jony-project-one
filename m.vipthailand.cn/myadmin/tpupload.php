<?
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
AdminSes_audit();
$bh=returndeldian($_GET[bh]);
if(!preg_match("/^[-a-zA-Z0-9]*$/",$bh)){exit;}
$sj=date("Y-m-d H:i:s");
$admin=intval($_GET[admin]);

if($_GET[action]=="update"){  //上传

 if($admin==1 || $admin==2){ //房源
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
 if($admin==1){$type1="出租";}elseif($admin==2){$type1="出售";}
 while1("*","fcw_fang where bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){Audit_alert("来源错误","./","parent.");}
 $userid=returnuserid($row1[uid]);
 $targetFolder = "upload/".$userid."/f/".$bh."/";
 createDir("../".$targetFolder);
 $total = count($_FILES['inp1']['tmp_name']);
 for($k=0; $k<$total; $k++) {
  if(returncount("fcw_tp where bh='".$bh."'")<16){
   if(is_uploaded_file($_FILES['inp1']['tmp_name'][$k])){
    $sj=date("Y-m-d H:i:s");
    $mbh=str_replace(" ","",microtime()."tp".$userid);
    $mbh=str_replace(".","",$mbh);
    $targetFile = "../".$targetFolder.$mbh.".jpg";
	move_uploaded_file($_FILES['inp1']['tmp_name'][$k],$targetFile);
	$cm=new CreatMiniature();
	$bw=850;$bg=0;$sw=150;$sh=120;
	$imgsrc="../".$targetFolder.$mbh.".jpg";
    list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
    $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bgv);}
    imageWaterMark($imgsrc,websypos,"../img/shuiyin.png","","","","",0,0);
	if($width>$sw){$cm->Cut("../".$targetFolder.$mbh."-1.jpg",$sw,$sh);}else{copy($imgsrc,"../".$targetFolder.$mbh."-1.jpg");}
	$wjv=$targetFolder.$mbh.".jpg";
	$nxh=returnxh("fcw_tp"," and bh='".$bh."'");
	intotable("fcw_tp","bh,tp,type1,iffm,sj,uid,xh","'".$bh."','".$wjv."','".$type1."',0,'".$sj."','".$uid."',".$nxh."");
   }
  }
 }
 
 }else if($admin==3){ //小区图片
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0501,")){Audit_alert("权限不够","default.php");}
 include("../config/loupandef.php");
 while1("*","fcw_xq where bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){Audit_alert("来源错误","./","parent.");}
 $xq=$row1[xq];
 $tptyarr=preg_split("/,/",tptyarr_d);
 $tpnumarr=preg_split("/,/",tpnumarr_d);
 $tpnum=$_GET["tpnum"];
 $ty=$tptyarr[$tpnum];
 $tit=$xq.$ty;
 $userid=returnuserid($row1[uid]);
 $sj=date("Y-m-d H:i:s");
 $targetFolder = "upload/".$userid."/f/".$bh."/";
 createDir("../".$targetFolder);
 $total = count($_FILES['inp1']['tmp_name']);
 for($k=0; $k<$total; $k++) {
   if(is_uploaded_file($_FILES['inp1']['tmp_name'][$k])){
    $sj=date("Y-m-d H:i:s");
    $mbh=str_replace(" ","",microtime()."tp".$userid);
    $mbh=str_replace(".","",$mbh);
    $targetFile = "../".$targetFolder.$mbh.".jpg";
	move_uploaded_file($_FILES['inp1']['tmp_name'][$k],$targetFile);
	$cm=new CreatMiniature();
	$bw=850;$bg=0;$sw=456;$sh=351;
	$imgsrc="../".$targetFolder.$mbh.".jpg";
    list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
    $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bgv);}
    imageWaterMark($imgsrc,websypos,"../img/shuiyin.png","","","","",0,0);
	if($width>$sw){$cm->Cut("../".$targetFolder.$mbh."-1.jpg",$sw,$sh);}else{copy($imgsrc,"../".$targetFolder.$mbh."-1.jpg");}
	$wjv=$targetFolder.$mbh.".jpg";
	intotable("fcw_xqphoto","uid,xqbh,sj,tit,djl,bh,zt,tyid,areaid,areaids,iffm","'".$row1[uid]."','".$bh."','".$sj."','".$tit."',1,'".$mbh."',0,".$tpnumarr[$tpnum].",".$row1[areaid].",".$row1[areaids].",0");
   }
 }
 
 }elseif($admin==4){ //建材
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){Audit_alert("权限不够","default.php");}
 while1("*","fcw_jia_jc where bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){Audit_alert("来源错误","./","parent.");}
 $userid=returnuserid($row1[uid]);
 $targetFolder = "upload/".$userid."/jia/".$bh."/";
 createDir("../".$targetFolder);
 $total = count($_FILES['inp1']['tmp_name']);
 for($k=0; $k<$total; $k++) {
  if(returncount("fcw_tp where bh='".$bh."'")<16){
   if(is_uploaded_file($_FILES['inp1']['tmp_name'][$k])){
    $sj=date("Y-m-d H:i:s");
    $mbh=str_replace(" ","",microtime()."tp".$userid);
    $mbh=str_replace(".","",$mbh);
    $targetFile = "../".$targetFolder.$mbh.".jpg";
	move_uploaded_file($_FILES['inp1']['tmp_name'][$k],$targetFile);
	$cm=new CreatMiniature();
	$bw=850;$bg=0;$sw=300;$sh=300;
	$imgsrc="../".$targetFolder.$mbh.".jpg";
    list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
    $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bgv);}
    imageWaterMark($imgsrc,websypos,"../img/shuiyin.png","","","","",0,0);
	if($width>$sw){$cm->Cut("../".$targetFolder.$mbh."-1.jpg",$sw,$sh);}else{copy($imgsrc,"../".$targetFolder.$mbh."-1.jpg");}
	$wjv=$targetFolder.$mbh.".jpg";
	$nxh=returnxh("fcw_tp"," and bh='".$bh."'");
	intotable("fcw_tp","bh,tp,type1,iffm,sj,uid,xh","'".$bh."','".$wjv."','家居建材',0,'".$sj."','".$uid."',".$nxh."");
   }
  }
 }

 }elseif($admin==5){ //装修效果图
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){Audit_alert("权限不够","default.php");}
 while1("*","fcw_jia_photo where bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){Audit_alert("来源错误","./","parent.");}
 $userid=returnuserid($row1[uid]);
 $targetFolder = "upload/".$userid."/jia/".$bh."/";
 createDir("../".$targetFolder);
 $total = count($_FILES['inp1']['tmp_name']);
 for($k=0; $k<$total; $k++) {
   if(is_uploaded_file($_FILES['inp1']['tmp_name'][$k])){
    $sj=date("Y-m-d H:i:s");
    $mbh=str_replace(" ","",microtime()."tp".$userid);
    $mbh=str_replace(".","",$mbh);
    $targetFile = "../".$targetFolder.$mbh.".jpg";
	move_uploaded_file($_FILES['inp1']['tmp_name'][$k],$targetFile);
	$cm=new CreatMiniature();
	$bw=800;$bg=600;$sw=400;$sh=300;
	$imgsrc="../".$targetFolder.$mbh.".jpg";
    list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
    $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bgv);}
    imageWaterMark($imgsrc,websypos,"../img/shuiyin.png","","","","",0,0);
	if($width>$sw){$cm->Cut("../".$targetFolder.$mbh."-1.jpg",$sw,$sh);}else{copy($imgsrc,"../".$targetFolder.$mbh."-1.jpg");}
	$wjv=$targetFolder.$mbh.".jpg";
	$nxh=returnxh("fcw_tp"," and bh='".$bh."'");
	intotable("fcw_tp","bh,tp,type1,iffm,sj,uid,xh","'".$bh."','".$wjv."','装修效果图',0,'".$sj."','".$uid."',".$nxh."");
   }
 }

 }elseif($admin==6){ //资讯
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){Audit_alert("权限不够","default.php");}
 while1("*","fcw_news where bh='".$bh."'");if(!$row1=mysql_fetch_array($res1)){Audit_alert("来源错误","./","parent.");}
 $targetFolder="upload/news/".dateYMDN($row1[sj])."/".$bh."/";
 createDir("../".$targetFolder);
 $total = count($_FILES['inp1']['tmp_name']);
 for($k=0; $k<$total; $k++) {
  if(returncount("fcw_tp where bh='".$bh."'")<2){
   if(is_uploaded_file($_FILES['inp1']['tmp_name'][$k])){
    $sj=date("Y-m-d H:i:s");
    $mbh=str_replace(" ","",microtime()."tp".$userid);
    $mbh=str_replace(".","",$mbh);
    $targetFile = "../".$targetFolder.$mbh.".jpg";
	move_uploaded_file($_FILES['inp1']['tmp_name'][$k],$targetFile);
	$cm=new CreatMiniature();
	$bw=600;$bg=450;$sw=200;$sh=150;
	$imgsrc="../".$targetFolder.$mbh.".jpg";
    list($width, $height) = getimagesize(weburl.$targetFolder.$mbh.".jpg");$bgv=intval($height/($width/$bw));
    $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bgv);}
    imageWaterMark($imgsrc,websypos,"../img/shuiyin.png","","","","",0,0);
	if($width>$sw){$cm->Cut("../".$targetFolder.$mbh."-1.jpg",$sw,$sh);}else{copy($imgsrc,"../".$targetFolder.$mbh."-1.jpg");}
	$wjv=$targetFolder.$mbh.".jpg";
	$nxh=returnxh("fcw_tp"," and bh='".$bh."'");
	intotable("fcw_tp","bh,tp,type1,iffm,sj,uid,xh","'".$bh."','".$wjv."','资讯',1,'".$sj."','".$uid."',".$nxh."");
   }
  }
 }

 }
 
 php_toheader("tpupload.php?bh=".$bh."&admin=".$admin."&t=suc&tpnum=".$_GET[tpnum]);
 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>图片上传</title>
<style type="text/css">
body{margin:0;font-size:12px;color:#333;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
.main{float:left;width:150px;height:33px;cursor:pointer;}
#upload input{position: relative;border:solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;float:left;width:150px;height:33px;z-index:2;}
#upload .inptp{position:relative;overflow: hidden;display:inline-block;*display:inline;padding:6px 0 0 0;height:27px;text-align:center;cursor:pointer;width:150px;float:left;color:#fff;background-color:#00B7EE;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;font-size:14px;margin-top:-33px;z-index:1;}
@media screen and (-webkit-min-device-pixel-ratio:0) {
#upload .inptp{margin-top:-39px;}
}
#uping{float:left;padding:5px 0 0 0;height:26px;text-align:center;width:148px;border:#00B7EE dotted 1px;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;font-size:14px;color:#ff6600;background-color:#f2f2f2;}
</style>
<script language="javascript">
function filecha(){
document.getElementById("upload").style.display="none";
document.getElementById("uping").style.display="";
tpf.submit();
}
</script>
</head>
<body>
<div class="main">

<!--等待上传开始-->
<form method="post" name="tpf" enctype="multipart/form-data" action="tpupload.php?bh=<?=$bh?>&admin=<?=$admin?>&tpnum=<?=$_GET[tpnum]?>&action=update">
<div id="upload">
 <input type="file" onchange="filecha()" multiple="multiple" name="inp1[]" size="25" accept=".jpg,.gif,.jpeg,.png">
 <span class="inptp">选择图片上传</span>
</div>
<input type="hidden" value="upload" name="yjcode" />
</form>
<!--等待上传结束-->

<!--正在上传-->
<div id="uping" style="display:none;">正在处理图片……</div>
<!--正在上传-->

</div>
<? if($_GET[t]=="suc"){?>
 <script language="javascript">
 <? if($admin==1 || $admin==2 || $admin==4 || $admin==5 || $admin==6){?>
 parent.xgtread("<?=$bh?>");
 <? }elseif($admin==3){?>
 parent.location.reload();
 <? }?>
 </script>
<? }?>
</body>
</html>