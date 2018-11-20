<?
set_time_limit(0);
require("../config/conn.php");
require("../config/function.php");
AdminSes_audit();
$admin=$_GET[admin];
$bhid=$_GET[idbh];
$tab=$_GET[tab];
switch($admin){
 case "1":   //删除区域
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]大类ID $a[1]小类ID
  if(intval($a[0])!=0){  //表示删除大类
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_area where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_area where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //表示删除小类
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	while0("*","fcw_area where id=".$a[1]);$row=mysql_fetch_array($res);
	deletetable("fcw_area where name1='".$row[name1]."' and name2='".$row[name2]."'");
  }
 }
 break;	
 case "2":   //删除地铁
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
	if(!is_numeric($nb[$i])){echo "ERR074";exit;}
	deletetable("fcw_ditie where id=".$nb[$i]);
 }
 break;	
 case "3":   //删除房屋朝向
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_fwcx where id=".$nb[$i]);
 }
 break;	
 case "4":   //删除写字楼类型
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_xzllx where id=".$nb[$i]);
 }
 break;	
 case "5":   //删除写字楼级别
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_xzljb where id=".$nb[$i]);
 }
 break;	
 case "6":   //删除商铺类型
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_splx where id=".$nb[$i]);
 }
 break;	
 case "7":   //删除商铺级别
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_pmlx where id=".$nb[$i]);
 }
 break;	
 case "8":   //删除帮助中心分类
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]大类ID $a[1]小类ID
  if(intval($a[0])!=0){  //表示删除大类
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_helptype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_helptype where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //表示删除小类
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_helptype where id=".$a[1]);
  }
 }
 break;	
 case "9":   //删除资讯分类
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]大类ID $a[1]小类ID
  if(intval($a[0])!=0){  //表示删除大类
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_newstype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_newstype where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //表示删除小类
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_newstype where id=".$a[1]);
  }
 }
 break;	
 case "10":   //删除装修情况
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_zxqk where id=".$nb[$i]);
 }
 break;	
 case "11":   //删除物业类型
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_wylx  where ifsys=0 and id=".$nb[$i]);
 }
 break;	
 case "12":   //删除物业配套
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_peitao where id=".$nb[$i]);
 }
 break;	
 case "13":   //删除物业特色
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_wyts where id=".$nb[$i]);
 }
 break;	
 case "14":   //橱窗推荐
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  updatetable($tab,"mytj=1 where bh='".$nb[$i]."'");
 }
 break;	
 case "15":   //取消橱窗推荐
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  updatetable($tab,"mytj=0 where bh='".$nb[$i]."'");
 }
 break;	
 case "16":   //上下架
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj",$tab." where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(0==$row[ifxj]){$nn=1;}else{$nn=0;}
  updatetable($tab,"ifxj=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;	
 case "17":   //删除房源
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("id,uid,bh","fcw_fang where bh='".$nb[$i]."'");
  if($row1=mysql_fetch_array($res1)){
  deletetable("fcw_fang where id=".$row1[id]);
  deletetable("fcw_yuyue where fangbh='".$row1[bh]."'");
  deletetable("fcw_tp where bh='".$row1[bh]."'");
  deletetable("fcw_fanggj where fangbh='".$row1[bh]."'");
  delDirAndFile("../upload/".returnuserid($row1[uid])."/f/".$nb[$i]."/");
  }
 }
 break;	
 case "18":   //变更房源审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_fang where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_fang","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "19":   //变更楼盘楼盘审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,") && !strstr($adminqx,",0501,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_xq where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_xq","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "20":   //变更楼盘户型审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_huxing where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_huxing","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "21":   //删除户型
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_huxing where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
  $tp="upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh].".jpg";
  delFile("../".$tp);
  delFile("../".returnnotp($tp,"-1"));
  deletetable("fcw_huxing where id=".$row1[id]);
  }
 }
 break;	
 case "22":   //删除相册
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,") && !strstr($adminqx,",0503,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_xqphoto where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
  deletetable("fcw_xqphoto where id=".$row1[id]);
  delFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh].".jpg");
  delFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh]."-1.jpg");
  }
 }
 break;	
 case "23":   //变更楼盘相册审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,") && !strstr($adminqx,",0501,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_xqphoto where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_xqphoto","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "24":   //变更楼盘动态审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_xqnews where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_xqnews","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "25":   //删除楼盘动态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_xqnews where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
   delDirAndFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh]."/");
   deletetable("fcw_xqnews where id=".$row1[id]);
   deletetable("fcw_tp where bh='".$row1[bh]."'");
  }
 }
 break;	
 case "26":   //变更楼盘视频审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_xqvideo where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_xqvideo","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "27":   //删除视频
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_xqvideo where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
   delFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1["url"]);
   delFile("../upload/".returnuserid($row1[uid])."/f/".$row1[xqbh]."/".$row1[bh].".jpg");
   deletetable("fcw_xqvideo where id=".$row1[id]);
  }
 }
 break;	
 case "28":   //变更楼盘看房团审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_kanfang where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_kanfang","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "29":   //删除看房团
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_kanfang where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
  deletetable("fcw_kanfang where id=".$row1[id]);
  deletetable("fcw_kanfanguser where kfbh='".$row1[bh]."'");
  $tp=returntp("bh='".$row1[bh]."' and uid='".$row1[uid]."'");
  delFile("../".$tp);
  delFile("../".returnnotp($tp,"-1"));
  deletetable("fcw_tp where bh='".$nb[$i]."' and uid='".$row1[uid]."'");
  }
 }
 break;	
 case "30":   //看房团用户通知状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while0("id,uid,zt","fcw_kanfanguser where id=".$nb[$i]);while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_kanfanguser","zt=".$nn." where id=".$row[id]);
  }
 }
 break;	
 case "31":   //删除看房团用户
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_kanfanguser where id=".$nb[$i]);
 }
 break;	
 case "32":   //楼盘点评状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while0("id,uid,zt","fcw_loupanmsg where id=".$nb[$i]);while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_loupanmsg","zt=".$nn." where id=".$row[id]);
  }
 }
 break;	
 case "33":   //删除楼盘点评
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_loupanmsg where id=".$nb[$i]);
 }
 break;	
 case "34":   //删除楼盘
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,") && !strstr($adminqx,",0503,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,uid","fcw_xq where bh='".$nb[$i]."'");if($row=mysql_fetch_array($res)){
  deleteloupan($row[bh],$row[uid]);
  }
 }
 break;	
 case "35":   //楼盘小区互换
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,") && !strstr($adminqx,",0501,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,admin","fcw_xq where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[admin]){$nn=2;}else{$nn=1;}
  updatetable("fcw_xq","admin=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "36":   //资讯审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_news where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_news","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "37":   //删除资讯
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0203,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","fcw_news where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("fcw_news where bh='".$row[bh]."'");
  deletetable("fcw_tp where type1='资讯' and bh='".$row[bh]."'");
  }
 }
 break;	
 case "36a":   //房产考察审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_fckc where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_fckc","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "37a":   //删除房产考察
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0203,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","fcw_fckc where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("fcw_fckc where bh='".$row[bh]."'");
  }
 }
 break;	
 case "36b":   //投资礼包审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_tzlb where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_tzlb","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "37b":   //删除投资礼包
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0203,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","fcw_tzlb where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("fcw_tzlb where bh='".$row[bh]."'");
  }
 }
 break;	
 case "36c":   //发现泰国审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_fxtg where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_fxtg","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "37c":   //删除发现泰国
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0203,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","fcw_fxtg where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/news/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("fcw_fxtg where bh='".$row[bh]."'");
  }
 }
 break;	
 case "38":   //删除广告
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("*","fcw_ad where bh='".$nb[$i]."' and (type1='图片' or type1='动画')");if($row=mysql_fetch_array($res)){
   delFile("../ad/".$nb[$i].".".$row[jpggif]);
   delFile("../ad/".$nb[$i]."-99.".$row[jpggif]);
  }
  deletetable("fcw_ad where bh='".$nb[$i]."'");
 }
 break;	
 case "39":   //删除公交
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
	if(!is_numeric($nb[$i])){echo "ERR074";exit;}
	deletetable("fcw_gongjiao where id=".$nb[$i]);
 }
 break;	
 case "40":   //删除会员
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while3("id,uid","fcw_user where id=".$nb[$i]);while($row3=mysql_fetch_array($res3)){
  deluid($row3[uid]);
  }
 }
 break;	
 case "41":   //变更楼盘招聘审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("id,zt","fcw_loupanjob where id=".$nb[$i]);while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_loupanjob","zt=".$nn." where id=".$row[id]);
  }
 }
 break;
 case "42":   //删除楼盘招聘
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_loupanjob where id=".$nb[$i]);
 }
 break;	
 case "43":   //删除管理员
 if(!strstr($adminqx,",0,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $qx=",0,";
  deletetable("fcw_admin where qx<>'".$qx."' and id=".$nb[$i]);
 }
 break;	
 case "44":   //删除家装效果图二三级分类
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]大类ID $a[1]小类ID
  if(intval($a[0])!=0){  //表示删除大类
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_jia_phototype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_jia_phototype where type1='".$row[type1]."' and type2='".$row[type2]."'");
  }elseif(intval($a[0])==0){  //表示删除小类
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_jia_phototype where id=".$a[1]);
  }
 }
 break;	
 case "45":   //删除家装效果图大类
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("*","fcw_jia_phototype where id=".$nb[$i]);$row=mysql_fetch_array($res);
  deletetable("fcw_jia_phototype where type1='".$row[type1]."'");
 }
 break;	
 case "46":   //变更装修效果图审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_jia_photo where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_jia_photo","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "47":   //修效果图上下架
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj",$tab." where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(0==$row[ifxj]){$nn=1;}else{$nn=0;}
  updatetable($tab,"ifxj=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;	
 case "48":   //删除装修效果图
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0803,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_jia_photo where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
   deletetable("fcw_jia_photo where id=".$row1[id]);
   deletetable("fcw_tp where bh='".$row1[bh]."'");
   delDirAndFile("../upload/".returnuserid($row1[uid])."/jia/".$row1[bh]."/");
  }
 }
 break;	
 case "49":   //删除帮助内容
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   deletetable("fcw_help where bh='".$nb[$i]."'");
 }
 break;	
 case "50":   //删除装修知识分类
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]大类ID $a[1]小类ID
  if(intval($a[0])!=0){  //表示删除大类
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_jia_zxtype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_jia_zxtype where type1='".$row[type1]."'");
  }elseif(intval($a[0])==0){  //表示删除小类
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_jia_zxtype where id=".$a[1]);
  }
 }
 break;	
 case "51":   //装修知识审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_jia_zx where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_jia_zx","zt=".$nn." where bh='".$nb[$i]."'");
  }
 }
 break;	
 case "52":   //删除装修知识
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0803,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,sj","fcw_jia_zx where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  delDirAndFile("../upload/jia/".dateYMDN($row[sj])."/".$row[bh]."/");
  deletetable("fcw_jia_zx where bh='".$row[bh]."'");
  }
 }
 break;	
 case "53":   //删除提现，要非等待受理状态的
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_tixian where zt<>4 and id=".$nb[$i]);
 }
 break;	
 case "54":   //删除装修招标
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0803,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_jia_zb where id=".$nb[$i]);
 }
 break;	
 case "55":   //删除家居建材二三级分类
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]大类ID $a[1]小类ID
  if(intval($a[0])!=0){  //表示删除大类
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_jia_jctype where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_jia_jctype where type1='".$row[type1]."' and type2='".$row[type2]."'");
  }elseif(intval($a[0])==0){  //表示删除小类
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_jia_jctype where id=".$a[1]);
  }
 }
 break;	
 case "56":   //删除家居建材大类
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("*","fcw_jia_jctype where id=".$nb[$i]);$row=mysql_fetch_array($res);
  deletetable("fcw_jia_jctype where type1='".$row[type1]."'");
 }
 break;	
 case "57":   //变更家居建材审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,zt","fcw_jia_jc where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_jia_jc","zt=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;
 case "58":   //家居建材上下架
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while0("bh,ifxj",$tab." where bh='".$nb[$i]."'");while($row=mysql_fetch_array($res)){
  if(0==$row[ifxj]){$nn=1;}else{$nn=0;}
  updatetable($tab,"ifxj=".$nn." where bh='".$row[bh]."'");
  }
 }
 break;	
 case "59":   //删除建材
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0803,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  while1("*","fcw_jia_jc where bh='".$nb[$i]."'");if($row1=mysql_fetch_array($res1)){
   deletetable("fcw_jia_jc where id=".$row1[id]);
   deletetable("fcw_tp where bh='".$row1[bh]."'");
   delDirAndFile("../upload/".returnuserid($row1[uid])."/jia/".$row1[bh]."/");
  }
 }
 break;	
 case "60":   //删除别墅类型
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_bslx where id=".$nb[$i]);
 }
 break;	
 case "61":   //删除分站
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_fz where id=".$nb[$i]);
 }
 break;	
 case "62":   //删除标签
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("fcw_tag where id=".$nb[$i]);
 }
 break;	
 case "63":   //标签审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while0("id,zt","fcw_tag where id=".$nb[$i]);while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_tag","zt=".$nn." where id=".$nb[$i]);
  }
 }
 break;	
 case "64":   //删除楼层情况
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  deletetable("fcw_fwlc where id=".$nb[$i]);
 }
 break;	
 case "65":   //删除特价房源
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0403,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("fcw_tejia where id=".$nb[$i]);
 }
 break;	
 case "66":   //特价审核状态
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  if(!is_numeric($nb[$i])){echo "ERR074";exit;}
  while0("id,zt","fcw_tejia where id=".$nb[$i]);while($row=mysql_fetch_array($res)){
  if(1==$row[zt]){$nn=0;}else{$nn=1;}
  updatetable("fcw_tejia","zt=".$nn." where id=".$nb[$i]);
  }
 }
 break;	
 case "67":   //删除学校
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]大类ID $a[1]小类ID
  if(intval($a[0])!=0){  //表示删除大类
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_school where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_school where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //表示删除小类
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_school where id=".$a[1]);
  }
 }
 break;	
 case "68":   //删除会员等级
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 if(!is_numeric($nb[$i])){echo "ERR074";exit;}
 deletetable("fcw_userdj where id=".$nb[$i]);
 }
 break;	
 case "69":   //删除房源委托
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_weituo where id=".$nb[$i]);
 }
 break;	
 case "70":   //删除房源图片
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   while1("*","fcw_tp where id=".$nb[$i]);if($row1=mysql_fetch_array($res1)){
   if(!empty($row1[tp])){
   delFile("../".str_replace(".","-1.",$row1[tp]));
   delFile("../".$row1[tp]);
   }
   deletetable("fcw_tp where id=".$nb[$i]);
   }
 }
 break;	
 case "71":   //删除金融贷款
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0603,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   deletetable("fcw_daikuan where bh='".$nb[$i]."'");
 }
 break;	
 case "72":   //删除房源预约
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   deletetable("fcw_yuyue where id=".$nb[$i]);
 }
 break;	
 case "73":   //删除商圈
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   deletetable("fcw_shangquan where bh='".$nb[$i]."'");
   delDirAndFile("../upload/shangquan/".$nb[$i]."/");
 }
 break;	
 case "74":   //删除找房委托
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0103,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_weituozhao where id=".$nb[$i]);
 }
 break;	
 case "75":   //删除资金记录
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0703,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
   if(!is_numeric($nb[$i])){echo "ERR074";exit;}
   deletetable("fcw_moneyrecord where id=".$nb[$i]);
 }
 break;	
 case "76":   //删除登录日志
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  deletetable("fcw_loginlog where id=".$nb[$i]);
 }
 break;	
 case "77":   //删除商铺行业
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0303,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
  $a=preg_split("/xcf/",$nb[$i]); //$a[0]大类ID $a[1]小类ID
  if(intval($a[0])!=0){  //表示删除大类
	if(!is_numeric($a[0])){echo "ERR074";exit;}
	while0("*","fcw_sphy where id=".$a[0]);$row=mysql_fetch_array($res);
	deletetable("fcw_sphy where name1='".$row[name1]."'");
  }elseif(intval($a[0])==0){  //表示删除小类
	if(!is_numeric($a[1])){echo "ERR074";exit;}
	deletetable("fcw_sphy where id=".$a[1]);
  }
 }
 break;	
 case "78":   //更新选中房源
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 $sj=date("Y-m-d H:i:s");
 updatetable("fcw_fang","sj='".$sj."' where bh='".$nb[$i]."'");
 }
 break;	
 case "79":   //更新全部出售房源
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 $sj=date("Y-m-d H:i:s");
 updatetable("fcw_fang","sj='".$sj."' where bh='".$nb[$i]."' and type1='出售'");
 }
 break;	
 case "80":   //更新全部出租房源
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){echo "+Err9";exit;}
 $nb=preg_split("/,/",$bhid);
 for($i=0;$i<count($nb);$i++){
 $sj=date("Y-m-d H:i:s");
 updatetable("fcw_fang","sj='".$sj."' where bh='".$nb[$i]."' and type1='出租'");
 }
 break;	

}
echo "+True";
?>