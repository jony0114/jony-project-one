<?
set_time_limit(0);
require("../config/conn.php");
require("../config/function.php");
sesCheck();
$admin=$_GET[admin];
$bhid=$_GET[idbh];
$tab=$_GET[tab];
$userid=returnuserid($_SESSION[FCWuser]);
switch($admin){
 case "1":   //橱窗推荐
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  updatetable($tab,"mytj=1 where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");
 }
 break;	
 case "2":   //取消橱窗推荐
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  updatetable($tab,"mytj=0 where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");
 }
 break;	
 case "3":   //上下架
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj",$tab." where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");while($row=mysql_fetch_array($res)){
  if(0==$row[ifxj]){$nn=1;}else{$nn=0;}
  updatetable($tab,"ifxj=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;	
 case "4":   //删除房源
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("id,uid,zjuid,bh,type1","fcw_fang where bh='".$nb[$i]."' and (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."')");
  if($row1=mysql_fetch_array($res1)){
  deletetable("fcw_fang where id=".$row1[id]);
  deletetable("fcw_tp where bh='".$row1[bh]."'");
  deletetable("fcw_fanggj where fangbh='".$row1[bh]."'");
  delDirAndFile("../upload/".returnuserid($row1[uid])."/f/".$row1[bh]."/");
  }
 }
 break;	
 case "5":   //删除户型
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_huxing where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");if($row1=mysql_fetch_array($res1)){
  $tp="upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh].".jpg";
  delFile("../".$tp);
  delFile("../".returnnotp($tp,"-1"));
  deletetable("fcw_huxing where id=".$row1[id]);
  }
 }
 break;	
 case "6":   //删除楼盘动态
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_xqnews where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");if($row1=mysql_fetch_array($res1)){
   deletetable("fcw_xqnews where id=".$row1[id]);
   deletetable("fcw_tp where bh='".$row1[bh]."' and uid='".$_SESSION[FCWuser]."'");
   delDirAndFile("../upload/".returnuserid($_SESSION[FCWuser])."/f/".$row1[xqbh]."/".$row1[bh]."/");
  }
 }
 break;	
 case "7":   //删除楼盘视频
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_xqvideo where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");if($row1=mysql_fetch_array($res1)){
   delFile("../upload/".returnuserid($_SESSION[FCWuser])."/f/".$row1[xqbh]."/".$row1["url"]);
   delFile("../upload/".returnuserid($_SESSION[FCWuser])."/f/".$row1[xqbh]."/".$row1[bh].".jpg");
   deletetable("fcw_xqvideo where id=".$row1[id]);
  }
 }
 break;	
 case "8":   //删除相册
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_xqphoto where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");if($row1=mysql_fetch_array($res1)){
  deletetable("fcw_xqphoto where id=".$row1[id]);
  delFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh].".jpg");
  delFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh]."-1.jpg");
  }
 }
 break;	
 case "9":   //删除看房团
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_kanfang where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");if($row1=mysql_fetch_array($res1)){
  deletetable("fcw_kanfang where id=".$row1[id]);
  deletetable("fcw_kanfanguser where kfbh='".$row1[bh]."'");
  $tp=returntp("bh='".$row1[bh]."' and uid='".$_SESSION[FCWuser]."'");
  delFile("../".$tp);
  delFile("../".returnnotp($tp,"-1"));
  deletetable("fcw_tp where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");
  }
 }
 break;	
 case "10":   //看房团用户通知状态
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while0("id,uid,zt","fcw_kanfanguser where id=".$nb[$i]." and uid='".$_SESSION[FCWuser]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_kanfanguser","zt=".$nn." where id=".$row[id]);
  }
 }
 break;	
 case "11":   //删除看房团用户
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_kanfanguser where id=".$nb[$i]." and uid='".$_SESSION[FCWuser]."'");
 }
 break;	
 case "12":   //删除楼盘点评
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_loupanmsg where id=".$nb[$i]." and uid='".$_SESSION[FCWuser]."'");
 }
 break;	
 case "13":   //变更楼盘点评审核状态
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while0("id,uid,zt","fcw_loupanmsg where id=".$nb[$i]." and uid='".$_SESSION[FCWuser]."'");if($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_loupanmsg","zt=".$nn." where id=".$row[id]);
  }
 }
 break;	
 case "14":   //删除楼盘
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,uid","fcw_xq where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");if($row=mysql_fetch_array($res)){
  deleteloupan($row[bh],$row[uid]);
  }
 }
 break;	
 case "15":   //删除成员
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("id,uid,zjuid","fcw_user where zjuid='".$_SESSION[FCWuser]."' and id=".$nb[$i]);if($row=mysql_fetch_array($res)){
  deluid($row[uid]);
  }
 }
 break;	
 case "16":   //删除楼盘招聘
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_loupanjob where uid='".$_SESSION[FCWuser]."' and id=".$nb[$i]);
 }
 break;	
 case "17":   //删除装修效果图
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_jia_photo where bh='".$nb[$i]."' and (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."')");if($row1=mysql_fetch_array($res1)){
   deletetable("fcw_jia_photo where id=".$row1[id]);
   deletetable("fcw_tp where bh='".$row1[bh]."'");
   delDirAndFile("../upload/".returnuserid($row1[uid])."/jia/".$row1[bh]."/");
  }
 }
 break;	
 case "18":   //删除分销客户
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 deletetable("fcw_loupanfxkh where bh='".$nb[$i]."' and jd<>2 and ((uid2='".$_SESSION[FCWuser]."' or uid3='".$_SESSION[FCWuser]."') or (uid1='".$_SESSION[FCWuser]."' and uid2=''))");
 }
 break;	
 case "19":   //删除家居建材分类
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]大类ID $a[1]小类ID
  if(intval($a[0])!=0){  //表示删除大类
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_jia_myjctype where uid='".$_SESSION[FCWuser]."' and id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_jia_myjctype where uid='".$_SESSION[FCWuser]."' and type1='".$row[type1]."'");
  }elseif(intval($a[0])==0){  //表示删除小类
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_jia_myjctype where id=".$a[1]);
  }
 }
 break;	
 case "20":   //删除家居建材宝贝
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_jia_jc where bh='".$nb[$i]."' and uid='".$_SESSION[FCWuser]."'");if($row1=mysql_fetch_array($res1)){
   deletetable("fcw_jia_jc where id=".$row1[id]);
   deletetable("fcw_tp where bh='".$row1[bh]."' and uid='".$_SESSION[FCWuser]."'");
   delDirAndFile("../upload/".returnuserid($row1[uid])."/jia/".$row1[bh]."/");
  }
 }
 break;	
 case "21":   //删除预约
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("fcw_yuyue where id=".$nb[$i]."  and uid='".$_SESSION[FCWuser]."'");
 }
 break;	
 case "23":   //中介公司审核房源
 if($_SESSION[FCWuserID]==4){
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_fang where bh='".$nb[$i]."' and zjuid='".$_SESSION[FCWuser]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_fang","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 }
 break;	
 case "24":   //删除客户
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 deletetable("fcw_kehu where bh='".$nb[$i]."' and (userid=".$userid." or zjuserid=".$userid.")");
 deletetable("fcw_kehugj where bh='".$nb[$i]."' and (userid=".$userid." or zjuserid=".$userid.")");
 }
 break;	
 case "25":   //删除合同
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 deletetable("fcw_hetong where bh='".$nb[$i]."' and (userid=".$userid." or zjuserid=".$userid.")");
 }
 break;	
 case "26":   //删除客户跟进记录
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 deletetable("fcw_kehugj where id=".$nb[$i]." and (userid=".$userid." or zjuserid=".$userid.")");
 }
 break;	
 case "27":   //删除合同财务收付
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 deletetable("fcw_htcaiwu where id=".$nb[$i]." and zjuserid=".$userid."");
 }
 break;	
 case "28":   //删除合同佣金分成
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 deletetable("fcw_htyjfc where id=".$nb[$i]." and zjuserid=".$userid."");
 }
 break;	
 case "29":   //删除房源跟进记录
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 deletetable("fcw_fanggj where id=".$nb[$i]." and (userid=".$userid." or zjuserid=".$userid.")");
 }
 break;	
}
echo "True";
?>