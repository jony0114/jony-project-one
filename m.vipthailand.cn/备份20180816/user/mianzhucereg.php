<?
if(empty($_SESSION[FCWuser]) && !empty($_POST[R1]) && empty($rowcontrol[mzc])){
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 while1("sj,uip","fcw_user where uip='".$uip."' order by sj desc");if($row1=mysql_fetch_array($res1)){
  $sjc=DateDiff($sj,$row1[sj],"s");
  if($sjc<=60){Audit_alert("发布过于频繁，休息一下","../");}
 }
 $uid=time().rnd_num(1000);
 $pwd=sha1(rnd_num(500).time().rnd_num(50));
 $nc="免注册用户";
 if($rowcontrol[userfb]=="on"){$qx=",2,3,4,5,";}
 intotable("fcw_user","uid,pwd,usertype,sj,uip,nc,ifmot,money1,jf,djl,qx,sfzrz,yyzzrz,indexpm,sxnum,ifqq,zfmm","'".$uid."','".$pwd."',1,'".$sj."','".$uip."','".$nc."',0,0,0,0,'".$qx."',3,3,0,0,0,'".$pwd."'");
 $id=mysql_insert_id();
 userregc($id);
 $_SESSION[FCWuser]=$uid;
 $_SESSION[FCWuserID]=1;
}

?>