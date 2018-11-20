<?
/*
2014年起，友价团队全部源码不再做加密处理，全部开源，方便用户二次开发。
同时我们仅对正规渠道购买的用户提供技术支持。
另：如果源码购买后有转卖行为，我们即删除你的认证帐号，同时也不再提供任何支持。
www.yj99.cn
友价源码
*/
require("return.php");

function zwzr(){
}

function intotable($itable,$zdarr,$resarr){
global $conn;
$sqlinto="insert into ".$itable."(".$zdarr.")values(".$resarr.")";mysql_query("SET NAMES 'GBK'");mysql_query($sqlinto,$conn);
}

function updatetable($utable,$ures){
global $conn;
$sqlupdate="update ".$utable." set ".$ures;mysql_query("SET NAMES 'GBK'");mysql_query($sqlupdate,$conn);
}

function deletetable($dsql){
global $conn;
$sqldelete="delete from ".$dsql;mysql_query("SET NAMES 'GBK'");mysql_query($sqldelete,$conn);
}


function PointUpdate($c_uid,$c_jfnum){ //会员积分币值变更
 updatetable("fcw_user","jf=jf+(".$c_jfnum.") where uid='".$c_uid."'");
}

function PointInto($c_uid,$c_tit,$c_jfnum){ //会员积分币值追踪
 intotable("fcw_jfrecord","uid,tit,jf,sj","'".$c_uid."','".$c_tit."',".$c_jfnum.",'".date('Y-m-d H:i:s')."'");
}

function PointUpdateM($c_uid,$c_money){ /*会员金额值变更*/
 if($c_money!=0){
 updatetable("fcw_user","money1=money1+(".$c_money.") where uid='".$c_uid."'");
 }
}

function PointIntoM($c_uid,$c_tit,$c_money){ /*会员金额值追踪*/
 if($c_money!=0){
 intotable("fcw_moneyrecord","bh,uid,tit,moneynum,sj,uip","'".time()."','".$c_uid."','".$c_tit."',".$c_money.",'".date('Y-m-d H:i:s')."','".$_SERVER['REMOTE_ADDR']."'");
 }
}

function uploadtp($tbh,$tty,$tuid){
 global $res;
 while0("*","fcw_clear where bh='".$tbh."' and type1='".$tty."' order by id asc");
 $i=1;
 while($row=mysql_fetch_array($res)){
  $nxh=returnxh("fcw_tp"," and bh='".$tbh."' and type1='".$tty."'");
  if(panduan("bh,iffm","fcw_tp where bh='".$tbh."' and iffm=1")==0){$fmv=1;}else{$fmv=0;}
  intotable("fcw_tp","bh,tp,type1,iffm,sj,uid,xh","'".$tbh."','".$row[tp]."','".$tty."',".$fmv.",'".$row[sj]."','".$tuid."',".$nxh."");
  deletetable("fcw_clear where id=".$row[id]);
 $i++;}}
 function uploadtpone($tpi,$lj,$mc,$tbh,$tty,$tuid,$bw,$bg,$sw=0,$sh=0,$ty1id=0,$ty2id=0,$needsy="yes"){
 if(check_in(";",$_FILES["inp$tpi"]["tmp_name"])){exit;}
 $cm=new CreatMiniature();
 createDir("../".$lj);
 $tpx=inp_tp_upload($tpi,"../".$lj,$mc);
 if($tpx!=""){
 $sjv=date("Y-m-d H:i:s");
 $t=$lj.$tpx;
 $imgsrc="../".$t; //图片路径
 list($width, $height) = getimagesize(weburl.$t);if($bg==0){$bgv=intval($height/($width/$bw));}else{$bgv=$bg;}
 $cm->SetVar($imgsrc,"file");if($width>$bw){$cm->Cut($imgsrc,$bw,$bgv);}
 if($needsy=="yes"){imageWaterMark($imgsrc,websypos,"../img/shuiyin.png","","","","",0,0);}
 if($sw!=0){$a=preg_split("/\./",$t);$cm->Cut("../".$a[0]."-1.".$a[1],$sw,$sh);}
 $uses="bh='".$tbh."' and type1='".$tty."'";
 $tpv=returntp($uses);if($tpv!=""){$a=preg_split("/\./",$tpv);if($a[0]!=$lj.$mc){delFile("../".$a[0]."-1.".$a[1]);delFile("../".$tpv);}}
 deletetable("fcw_tp where ".$uses);
 intotable("fcw_tp","bh,tp,type1,iffm,sj,uid,xh,ty1id,ty2id","'".$tbh."','".$t."','".$tty."',1,'".$sjv."','".$tuid."',1,".$ty1id.",".$ty2id."");
 }}function uploadtpnodata($tpi,$lj,$mc,$tpgs,$bw,$bg,$sw=0,$sh=0,$needsy="yes"){
 $cm=new CreatMiniature();
 createDir("../".$lj);
 $i=$tpi;
 if(!empty($_FILES["inp$i"]["tmp_name"]))
 {
  if($tpgs=="jpg"){$tp = array("image/pjpeg","image/jpeg","image/jpg");}
  elseif($tpgs=="gif"){$tp = array("image/gif");}
  elseif($tpgs=="allpic"){$tp = array("image/pjpeg","image/jpeg","image/jpg","image/gif","image/x-png","image/png");}
  if(!in_array($_FILES["inp$i"]["type"],$tp)){echo "<script>alert('格式不对');history.go(-1);</script>";exit;}
  $filetype = $_FILES["inp$i"]['type']; 
  if($filetype == 'image/jpeg' || $filetype == 'image/jpg' || $filetype == 'image/pjpeg'){$type = '.jpg';} 
  if($filetype == 'image/gif'){$type = '.gif';} 
  $tna=$_FILES["inp$i"]["name"];
  move_uploaded_file($_FILES["inp$i"]['tmp_name'], "../".$lj.$mc);
  $ljcle=str_replace("../","",$lj);
  list($width, $height) = getimagesize(weburl.$ljcle.$mc);if($bg==0){$bgv=intval($height/($width/$bw));}else{$bgv=$bg;}
  $cm->SetVar("../".$lj.$mc,"file");if($width>$bw || $height>$bgv){$cm->Cut("../".$lj.$mc,$bw,$bgv);}
  if($needsy=="yes"){$a="";if(check_in("../",$lj)){$a="../";}imageWaterMark("../".$lj.$mc,websypos,$a."../img/shuiyin.png","","","","",0,0);}
  if($sw!=0){$a=preg_split("/\./",$mc);$cm->Cut("../".$lj.$a[0]."-1.".$a[1],$sw,$sh);}
 }}function pagef($se,$ps,$ptable,$px,$pzd="*"){
global $res;
global $count;
global $page_count;
global $page;
global $row;
$ses=$se;
$pagesize=$ps;//每页显示的记录数
$sql="select count(*) as id from ".$ptable." ".$ses;
mysql_query("SET NAMES 'GBK'");
$res=mysql_query($sql);
$row=mysql_fetch_array($res);
$count=$row["id"];//取得总记录数
if($count%$pagesize==0){$allpage=$count/$pagesize;}else{$allpage=($count-$count%$pagesize)/$pagesize+1;}
if($count % $pagesize){$page_count=(int)($count / $pagesize)+1;}else{$page_count=$count / $pagesize;}
if($page>$page_count){$page=$page_count;}
if($page<1){$page=1;}
$sql="select ".$pzd." from ".$ptable." ".$ses." ".$px." limit ".($page-1)*$pagesize.",".$pagesize."";
mysql_query("SET NAMES 'GBK'");
$res=mysql_query($sql);}function whileother($wzd,$wses){
global $resother;
$sqlother="select ".$wzd." from ".$wses;mysql_query("SET NAMES 'GBK'");$resother=mysql_query($sqlother);
}function while0($wzd,$wses){global $res;$sql="select ".$wzd." from ".$wses;mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);}function while1($wzd,$wses){global $res1;$sql1="select ".$wzd." from ".$wses;mysql_query("SET NAMES 'GBK'");$res1=mysql_query($sql1);}function while2($wzd,$wses){global $res2;$sql2="select ".$wzd." from ".$wses;mysql_query("SET NAMES 'GBK'");$res2=mysql_query($sql2);}function while3($wzd,$wses){global $res3;$sql3="select ".$wzd." from ".$wses;mysql_query("SET NAMES 'GBK'");$res3=mysql_query($sql3);}


function deltp($id){
global $res3;
while3("*","fcw_tp where id=".$id);if($row3=mysql_fetch_array($res3)){
 $tpv=preg_split("/\./",$row3[tp]);delFile("../".$row3[tp]);delFile("../".$tpv[0]."-1.".$tpv[1]);
 deletetable("fcw_tp where id=".$id);
}
}

function lastsjjl($luid){
$sjv=date("Y-m-d H:i:s");
updatetable("fcw_user","lastsj='".$sjv."' where uid='".$luid."'");
}

function delDirAndFile( $dirName )  //删除目录及所有文件
{
if(is_dir($dirName)){
if ( $handle = opendir( "$dirName" ) ) {
while ( false !== ( $item = readdir( $handle ) ) ) {
if ( $item != "." && $item != ".." ) {
if ( is_dir( "$dirName/$item" ) ) {delDirAndFile( "$dirName/$item" );} 
else {if( unlink( "$dirName/$item" ) );}}
}
closedir( $handle );
if( rmdir( $dirName ) );
}
}
}

function deluid($u){//删除会员
 $userid=returnuserid($u);
 if(!empty($userid)){
  global $res1;
  updatetable("fcw_fang","zjuid='' where zjuid='".$u."'");
  while1("id,uid,bh","fcw_fang where uid='".$u."'");while($row1=mysql_fetch_array($res1)){
  deletetable("fcw_fang where id=".$row1[id]);
  deletetable("fcw_tp where bh='".$row1[bh]."'");
  }
  deletetable("fcw_fanggj where userid=".$userid." or zjuserid=".$userid."");
  while1("bh,uid","fcw_xq where uid='".$u."'");while($row1=mysql_fetch_array($res1)){
  deleteloupan($row1[bh],$row1[uid]);
  }
  updatetable("fcw_xq","fxuid='' where fxuid='".$u."'");
  deletetable("fcw_jfrecord where uid='".$u."'");
  deletetable("fcw_fav where uid='".$u."'");
  deletetable("fcw_jubao where uid='".$u."'");
  deletetable("fcw_smsmail where uid='".$u."'");
  deletetable("fcw_djl where uid='".$u."'");
  deletetable("fcw_dingdang where uid='".$u."'");
  deletetable("fcw_moneyrecord where uid='".$u."'");
  deletetable("fcw_loginlog where uid='".$u."'");
  updatetable("fcw_user","zjuid='' where zjuid='".$u."'");
  deletetable("fcw_loupanfxkh where uid1='".$u."'");
  updatetable("fcw_loupanfxkh","uid2='' where uid2='".$u."'");
  updatetable("fcw_loupanfxkh","uid3='' where uid3='".$u."'");
  deletetable("fcw_tejia where uid='".$u."'");
  deletetable("fcw_yuyue where uid='".$u."'");
  deletetable("fcw_userdjsx where userid=".$userid);
  updatetable("fcw_jia_photo","zjuid='' where zjuid='".$u."'");
  deletetable("fcw_kehu where userid=".$userid." or zjuserid=".$userid."");
  deletetable("fcw_kehugj where userid=".$userid." or zjuserid=".$userid."");
  deletetable("fcw_hetong where userid=".$userid." or zjuserid=".$userid."");
  deletetable("fcw_htcaiwu where zjuserid=".$userid."");
  deletetable("fcw_htyjfc where zjuserid=".$userid."");
  while1("id,uid,bh","fcw_jia_photo where uid='".$u."'");while($row1=mysql_fetch_array($res1)){
  deletetable("fcw_jia_photo where id=".$row1[id]);
  deletetable("fcw_tp where bh='".$row1[bh]."'");
  }
  deletetable("fcw_jia_myjctype where uid='".$u."'");
  while1("id,uid,bh","fcw_jia_jc where uid='".$u."'");while($row1=mysql_fetch_array($res1)){
  deletetable("fcw_jia_jc where id=".$row1[id]);
  deletetable("fcw_tp where bh='".$row1[bh]."'");
  }
  deletetable("fcw_jia_vr where userid=".$userid." or zjuserid=".$userid."");
  delDirAndFile("../upload/".$userid."/");
  clearstatcache();
  if(!is_dir("../upload/".$userid."/")){
  deletetable("fcw_user where uid='".$u."'");
  }
 }
}

function deleteloupan($b,$u){
 global $res;
 deletetable("fcw_xq where bh='".$b."' and uid='".$u."'");
 $tparr=array("fcw_kanfang","fcw_huxing","fcw_xqnews","fcw_xqvideo");
 for($ti=0;$ti<count($tparr);$ti++){
  while0("*",$tparr[$ti]." where xqbh='".$b."' and uid='".$u."'");while($row=mysql_fetch_array($res)){
  deletetable($tparr[$ti]." where id=".$row[id]);
  deletetable("fcw_tp where uid='".$u."' and bh='".$row[bh]."'");
  }
 }
 deletetable("fcw_kanfanguser where xqbh='".$b."' and uid='".$u."'");
 deletetable("fcw_loupanmsg where xqbh='".$b."' and uid='".$u."'");
 deletetable("fcw_huxingtype where xqbh='".$b."' and uid='".$u."'");
 deletetable("fcw_huxing where xqbh='".$b."' and uid='".$u."'");
 deletetable("fcw_xqphoto where xqbh='".$b."' and uid='".$u."'");
 deletetable("fcw_loupanjob where xqbh='".$b."' and uid='".$u."'");
 deletetable("fcw_loupanfxkh where xqbh='".$b."' and uid='".$u."'");
 deletetable("fcw_tejia where xqbh='".$b."' and uid='".$u."'");
 delDirAndFile("../upload/".returnuserid($u)."/f/".$b."/");
}

function createDir($path){if(!is_dir($path)){mkdir($path,0777);}}function delFile($nowu){if(is_file($nowu)){unlink($nowu);}}

function sesCheck(){
 if(empty($_SESSION["FCWuser"]) || empty($_SESSION["FCWuserPWD"])){Audit_alert("请先登录","../reg/");}
 global $userqx;$sqluser="select uid,pwd,qx from fcw_user where uid='".$_SESSION["FCWuser"]."' and pwd='".$_SESSION["FCWuserPWD"]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);if(!$rowuser=mysql_fetch_array($resuser)){$_SESSION["FCWuser"]="";$_SESSION["FCWuserPWD"]="";php_toheader("./");}else{$userqx=$rowuser[qx];}}
function sesCheck_m(){
 if(empty($_SESSION["FCWuser"]) || empty($_SESSION["FCWuserPWD"])){php_toheader("../reg/");}
 global $userqx;$sqluser="select uid,pwd,qx from fcw_user where uid='".$_SESSION["FCWuser"]."' and pwd='".$_SESSION["FCWuserPWD"]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);if(!$rowuser=mysql_fetch_array($resuser)){$_SESSION["FCWuser"]="";$_SESSION["FCWuserPWD"]="";php_toheader("./");}else{$userqx=$rowuser[qx];}}

function AdminSes_audit(){
 if($_SESSION["FCWADMINSES"]=="" || $_SESSION["FCWPWDSES"]==""){php_toheader("index.php");}
 global $adminqx;$sqladmin="select * from fcw_admin where adminuid='".$_SESSION["FCWADMINSES"]."' and adminpwd='".$_SESSION["FCWPWDSES"]."'";mysql_query("SET NAMES 'GBK'");
 $resadmin=mysql_query($sqladmin);
 if(!$rowadmin=mysql_fetch_array($resadmin)){$_SESSION["FCWADMINSES"]="";$_SESSION["FCWPWDSES"]="";php_toheader("./");}else{$adminqx=$rowadmin[qx];}

 $wzget=$_SERVER['PHP_SELF'];
 if(empty($wzget)){echo "HT001 [www.yj99.cn]";exit;}
 $ht1=preg_split("/\//",$wzget);
 $houtai=$ht1[count($ht1)-2];
 if(strstr($adminqx,",0,")){if(strcmp("fcwmanage",$houtai)==0 || strcmp("admin",$houtai)==0 || strcmp("manage",$houtai)==0 || strcmp("admin888",$houtai)==0){php_toheader("ht.php");}}

}

function php_toheader($nurlx){echo "<script>";echo "location.href='".$nurlx."';";echo "</script>";exit;}function Audit_alert($alertStr,$alertUrl,$par=""){echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=gb2312\"><script>";echo "alert('".$alertStr."');".$par."location.href='".$alertUrl."';";echo "</script>";exit;}define("CHR",weburl);

function html_template($yurl,$nurl){$url =weburl.$yurl;$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_HEADER, 0);$output = curl_exec($ch);curl_close($ch);$fp= fopen($nurl,"w");fwrite($fp,$output);fclose($fp);}

function recurse_copy($src,$dst) {$dir = opendir($src);@mkdir($dst);while(false !== ( $file = readdir($dir)) ) {if (( $file != '.' ) && ( $file != '..' )) {if ( is_dir($src . '/' . $file) ) {recurse_copy($src . '/' . $file,$dst . '/' . $file);}else {copy($src . '/' . $file,$dst . '/' . $file);}}}closedir($dir);}function tjbtnr($a,$b="",$c=""){if($c==""){$ts="正在处理数据，请不要刷新页面，也不要关闭页面 ^_^";}else{$ts=$c;}$bk="";if($b!=""){$bk="<input type=\"button\" class=\"btn1 tjinput\" onmouseover=\"this.className='btn2 tjinput';\" onclick=\"gourl('".$b."')\" onmouseout=\"this.className='btn1 tjinput';\" value=\"返回\" />";}echo "<div id=\"tjbtn\"><input type=\"submit\" class=\"btn1 tjinput\" onmouseover=\"this.className='btn2 tjinput';\" onmouseout=\"this.className='btn1 tjinput';\" value=\"".$a."\" />".$bk."</div><div id=\"tjing\" style=\"display:none;color:#F96F39;\"><img style=\"margin:0 0 6px 0;\" src=\"../img/ajax_loader.gif\" width=\"208\" height=\"13\" /><br>".$ts."</div>";}function tjbtnr_m($a){echo "<input type=\"submit\" class=\"tjinput\" value=\"".$a."\" />";}


function html1(){
global $rowcontrol;
$mb=$rowcontrol[nowmb];
if(empty($mb)){$mb="default";}
recurse_copy("../template/moban/".$mb."/css/","../css/");
recurse_copy("../template/moban/".$mb."/homeimg/","../homeimg/");
recurse_copy("../template/moban/".$mb."/js/","../js/");
html_template("template/moban/".$mb."/template/tops.php","../template/tops.html");
html_template("template/moban/".$mb."/template/top.php","../template/top.html");
html_template("template/moban/".$mb."/template/bottom.php","../template/bottom.html");
html_template("template/404.php","../404.html");
html_template("template/moban/".$mb."/index_template.php","../index.html");
}

function html2(){
 $sj1=dateYMD(date("Y-m-d H:i:s"))." 00:00:00";
 deletetable("fcw_news where sj<'".$sj1."' and zt=99");
 deletetable("fcw_fang where sj<'".$sj1."' and zt=99");
 deletetable("fcw_fanggj where sj<'".$sj1."' and zt=99");
 deletetable("fcw_xq where sj<'".$sj1."' and zt=99");
 deletetable("fcw_kanfang where sj<'".$sj1."' and zt=99");
 deletetable("fcw_loupanmsg where sj<'".$sj1."' and zt=99");
 deletetable("fcw_huxing where sj<'".$sj1."' and zt=99");
 deletetable("fcw_xqnews where sj<'".$sj1."' and zt=99");
 deletetable("fcw_xqvideo where sj<'".$sj1."' and zt=99");
 deletetable("fcw_xqphoto where sj<'".$sj1."' and zt=99");
 deletetable("fcw_loupanjob where sj<'".$sj1."' and zt=99");
 deletetable("fcw_help where sj<'".$sj1."' and zt=99");
 deletetable("fcw_loupanfxkh where sj<'".$sj1."' and zt=99");
 deletetable("fcw_tejia where sj<'".$sj1."' and zt=99");
 deletetable("fcw_jia_photo where sj<'".$sj1."' and zt=99");
 deletetable("fcw_jia_zx where sj<'".$sj1."' and zt=99");
 deletetable("fcw_jia_jc where sj<'".$sj1."' and zt=99");
 deletetable("fcw_weituo where sj<'".$sj1."' and zt=99");
 deletetable("fcw_shangquan where sj<'".$sj1."' and zt=99");
 deletetable("fcw_weituozhao where sj<'".$sj1."' and zt=99");
 deletetable("fcw_kehu where sj<'".$sj1."' and zt=99");
 deletetable("fcw_kehugj where sj<'".$sj1."' and zt=99");
 deletetable("fcw_hetong where sj<'".$sj1."' and zt=99");
 deletetable("fcw_htcaiwu where sj<'".$sj1."' and zt=99");
 deletetable("fcw_htyjfc where sj<'".$sj1."' and zt=99");
 deletetable("fcw_djl");
}

function checkdjl($c,$bhid,$tb){
 $sj1=date("Y-m-d H:i:s");
 $uip1=$_SERVER["REMOTE_ADDR"];
 global $res1;
 $y=0;
 while1("sj,uip,admin,bhid","fcw_djl where admin='".$c."' and uip='".$uip1."' and bhid='".$bhid."' order by sj desc");
 if(!$row1=mysql_fetch_array($res1)){$y=2;}else{
  $sjc=DateDiff($sj1,$row1[sj],"s");
  if($sjc>600){$y=1;}else{$y=0;}
 }	
 if(2==$y){intotable("fcw_djl","uid,sj,uip,admin,bhid","'".$_SESSION[FCWuser]."','".$sj1."','".$uip1."','".$c."','".$bhid."'");}
 elseif(1==$y){updatetable("fcw_djl","sj='".$sj1."' where admin='".$c."' and uip='".$uip1."' and bhid='".$bhid."'");}
 if(0!=$y){
  if(check_in($c,"c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11")){
  updatetable($tb,"djl=djl+1 where id=".$bhid);
  }
 }
}
function userregc($id,$mt=0){
$id=intval($id);
$lj="";if($mt==1){$lj="../";}
createDir($lj."../upload/".$id."/");
createDir($lj."../upload/".$id."/f/");
createDir($lj."../upload/".$id."/jia/");
createDir($lj."../upload/".$id."/zx/");
}
?>