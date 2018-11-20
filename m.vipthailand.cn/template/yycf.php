<?
include("../config/conn.php");
include("../config/function.php");
$sj=date("Y-m-d H:i:s");

while1("*","fcw_cflist where sj<='".$sj."' and ifok=0 order by sj asc");while($row1=mysql_fetch_array($res1)){
$userid=$row1[userid];

 while2("id,sxnum","fcw_user where id=".$userid);$row2=mysql_fetch_array($res2);$sxnum=$row2[sxnum];
 $djsx=0;
 while3("*","fcw_userdjsx where userid=".$userid);if($row3=mysql_fetch_array($res3)){$djsx=$row3[sxnum];}
   
 if($sxnum>0 || $djsx>0){
  if($sxnum>0){$sxnum=$sxnum-1;}
  if($sxnum==0){$djsx=$djsx-1;}
  updatetable("fcw_user","sxnum=".$sxnum." where id=".$userid);
  updatetable("fcw_userdjsx","sxnum=".$djsx." where userid=".$userid);
  
  updatetable("fcw_cflist","ifok=1 where id=".$row1[id]);
  updatetable("fcw_fang","sj='".$row1[sj]."' where id=".$row1[fid]);
 }else{
  deletetable("fcw_cflist where userid=".$userid);
 }
 
}
echo rnd_num(100);
?>