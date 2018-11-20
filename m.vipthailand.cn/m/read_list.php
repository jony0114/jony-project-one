<?
set_time_limit(0);
header("Content-Type:text/html;charset=GB2312");
include("../config/conn.php");
include("../config/function.php");
$page=intval($_GET[p]);
$admin=$_GET[admin];
$ni=$_GET[ni];
$tyid=$_GET[tyid];

if($admin==1){ //资讯
 pagef(" where zt=0 and type1id=".$tyid."",5,"fcw_news","order by lastsj desc");echo $page_count."yj99";while($row=mysql_fetch_array($res)){
 $tit=returntitdian($row[tit],64);
 $tpv="../".returntp("bh='".$row[bh]."' order by xh asc","-1");
 echo "<div class='newslist box' onClick='gourl(\"txtlist_i".$row[id]."v.html\");'><div class='d1'><img src='".returntppd($tpv,"../../img/none180x180.gif")."' /></div>
<div class='d2'><a href='javascript:void(0);'>".$tit."</a><span class='s1'>".dateYMDHM($row[lastsj])."</span></div></div>";
 }

}elseif($admin==2){ //发现泰国
 pagef(" where zt=0 and admin=".$ni."",2,"fcw_fxtg","order by lastsj desc");echo $page_count."yj99";while($row=mysql_fetch_array($res)){
 $tpv="../upload/news/".$row[bh]."/xgt.jpg";
 echo "<div class='shouye4 box' onClick='gourl(\"fxtgview".$row[id].".html\");'><div class='main'><div class='d1'><img src='".returntppd($tpv,"../../img/none180x180.gif")."' /></div>
<div class='d2'>".$row[tit]."</div><div class='d3'>".$row[tit1]."</div></div></div>";
 }

}
?>
