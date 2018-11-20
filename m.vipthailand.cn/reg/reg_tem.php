<?
 if($WAPLJ==1){$wapljv="../";}
 if(strlen($uid)<2 || strlen($uid)>20 || strlen(stripos($uid,"/"))>0 || strlen(stripos($uid,";"))>0){Audit_alert("会员帐号格式有误！","reg.php");}
 if(panduan("uid","fcw_user where uid='".$uid."'")==1){Audit_alert("该用户名已经被注册，重新选择","reg.php");}
 $qx="";
 if($ut==1){if($rowcontrol[userfb]=="on"){$qx=",2,3,4,5,";}}
 elseif($ut==2){if($rowcontrol[jjrfb]=="on"){$qx=",2,3,4,5,6,";}}
 elseif($ut==3){if($rowcontrol[jcfb]=="on"){$qx=",6,10,";}}
 elseif($ut==4){if($rowcontrol[zjfb]=="on"){$qx=",2,3,4,5,6,7,";}}
 elseif($ut==5){if($rowcontrol[fkfb]=="on"){$qx=",9,";}}
 elseif($ut==6){if($rowcontrol[jiafb]=="on"){$qx=",1,6,7";}}
 elseif($ut==7){if($rowcontrol[jiafb]=="on"){$qx=",1,6,";}}
 $ifmot=returnjgdw($ifmot,"",0);
 if(empty($openid)){$ifqq=0;}else{$ifqq=1;}
 intotable("fcw_user","uid,pwd,usertype,sj,uip,nc,email,mot,ifmot,money1,jf,djl,qx,sfzrz,yyzzrz,indexpm,sxnum,openid,ifqq,zfmm,wxopenid","'".$uid."','".sha1($pwd)."',".$ut.",'".$sj."','".$uip."','".$nc."','".$email."','".$mot."',".$ifmot.",0,0,0,'".$qx."',3,3,0,0,'".$openid."',".$ifqq.",'".sha1($pwd)."','".$wxopenid."'");
 $id=mysql_insert_id($conn);
 userregc($id,returnjgdw($WAPLJ,"",0));
 $_SESSION[FCWuser]=$uid;
 $_SESSION[FCWuserID]=$ut;
 $_SESSION[FCWuserPWD]=sha1($pwd);
 intotable("fcw_loginlog","admin,userid,sj,uip","1,".$id.",'".$sj."','".$uip."'");

?>