<?
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
sesCheck();

$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

if(sqlzhuru($_POST[jvs])=="sf"){
 zwzr();
 if(panduan("uid,sfzrz","fcw_user where uid='".$_SESSION[FCWuser]."' and (sfzrz=2 or sfzrz=3)")==0){Audit_alert("错误的请求！","smrz5.php");}
 $sfz=sqlzhuru($_POST[tsfz]);
 if(strlen(stripos($sfz,"/"))>0 || strlen(stripos($sfz,";"))>0){Audit_alert("身份证号码格式有误！","smrz5.php");}
 updatetable("fcw_user","
			 uname='".sqlzhuru($_POST[tuname])."',
			 sfz='".$sfz."',
			 sfzrz=0
			 where uid='".$_SESSION[FCWuser]."'");
 uploadtpnodata(1,"upload/".$rowuser[id]."/",strgb2312($sfz,0,15)."-1.jpg","allpic",510,300);
 uploadtpnodata(2,"upload/".$rowuser[id]."/",strgb2312($sfz,0,15)."-2.jpg","allpic",510,300);
 php_toheader("smrz5.php"); 

}elseif(sqlzhuru($_POST[jvs])=="yy"){
 if(panduan("uid,yyzzrz","fcw_user where uid='".$_SESSION[FCWuser]."' and (yyzzrz=2 or yyzzrz=3)")==0){Audit_alert("错误的请求！","smrz5.php");}
 $yyzz=sqlzhuru($_POST[tyyzz]);
 if(strlen(stripos($yyzz,"/"))>0 || strlen(stripos($yyzz,";"))>0){Audit_alert("营业执照号码格式有误！","smrz5.php");}
 updatetable("fcw_user","
			 company='".sqlzhuru($_POST[tcompany])."',
			 yyzz='".$yyzz."',
			 yyzzrz=0 
			 where uid='".$_SESSION[FCWuser]."'");
 uploadtpnodata(3,"upload/".$rowuser[id]."/",strgb2312($yyzz,0,15).".jpg","allpic",510,300);
 php_toheader("smrz5.php"); 
}

$sfz1="../upload/".$rowuser[id]."/".strgb2312($rowuser[sfz],0,15)."-1.jpg";
$sfz2="../upload/".$rowuser[id]."/".strgb2312($rowuser[sfz],0,15)."-2.jpg";
$yyzz1="../upload/".$rowuser[id]."/".strgb2312($rowuser[yyzz],0,15).".jpg";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tjsf(){
 if((document.fsf.tuname.value).replace("/\s/","")==""){alert("请输入真实姓名");document.fsf.tuname.focus();return false;}
 if((document.fsf.tsfz.value).replace("/\s/","")==""){alert("请输入身份证号码");document.fsf.tsfz.focus();return false;}
 if(!confirm("确认提交审核？")){return false;}
 tjwait();
 fsf.action="smrz5.php";
}
function tjyy(){
 if((document.fyy.tcompany.value).replace("/\s/","")==""){alert("请输入公司名称");document.fyy.tcompany.focus();return false;}
 if((document.fyy.tyyzz.value).replace("/\s/","")==""){alert("请输入营业执照号码");document.fyy.tyyzz.focus();return false;}
 if(!confirm("确认提交审核？")){return false;}
 fyy.action="smrz5.php";
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 实名认证</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap0").className="l1 l2";
 </script>
x <div class="rts">
 身份证认证状态<br>
 <? 
 if(0==$rowuser[sfzrz]){echo "<strong class='blue'>身份证已提交，正在审核认证，请耐心等待</strong>";}
 elseif(1==$rowuser[sfzrz]){echo "<strong class='green'>已经通过实名认证</strong>";}
 elseif(2==$rowuser[sfzrz]){echo "<strong class='red'>认证被拒，原因：".$rowuser[sfzrzsm]."</strong>";}
 elseif(3==$rowuser[sfzrz]){echo "<strong>未提交认证资料，请填写以下信息并提交</strong>";}
 ?>
 </div>
 <form name="fsf" method="post" onsubmit="return tjsf()" enctype="multipart/form-data">
 <input type="hidden" value="sf" name="jvs" />
 <ul class="uk">
 <li class="l1">安全提示：</li>
 <li class="l21 blue">您所提交的认证信息，我们仅用于实名认证，不会透露给任何第三方</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 真实姓名：</li>
 <li class="l2"><input type="text" class="inp" name="tuname" value="<?=$rowuser[uname]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 身份证号：</li>
 <li class="l2"><input type="text" class="inp" name="tsfz" value="<?=$rowuser[sfz]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 身份证正面：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25"></li>
 <? if(is_file($sfz1)){?>
 <li class="l5"></li>
 <li class="l6"><a href="<?=$sfz1?>" target="_blank"><img border="0" src="<?=$sfz1?>" width="170" height="100" /></a></li>
 <? }?>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 身份证反面：</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" size="25"></li>
 <? if(is_file($sfz2)){?>
 <li class="l5"></li>
 <li class="l6"><a href="<?=$sfz2?>" target="_blank"><img border="0" src="<?=$sfz2?>" width="170" height="100" /></a></li>
 <? }?>
 <? if(2==$rowuser[sfzrz] || 3==$rowuser[sfzrz]){?>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("保存修改")?></li>
 <? }?>
 </ul>
 </form>

 <div class="rts">
 营业执照认证状态<br>
 <? 
 if(0==$rowuser[yyzzrz]){echo "<strong class='blue'>营业执照已提交，正在审核认证，请耐心等待</strong>";}
 elseif(1==$rowuser[yyzzrz]){echo "<strong class='green'>已经通过营业执照认证</strong>";}
 elseif(2==$rowuser[yyzzrz]){echo "<strong class='red'>认证被拒，原因：".$rowuser[yyzzrzsm]."</strong>";}
 elseif(3==$rowuser[yyzzrz]){echo "<strong>未提交认证资料，请填写以下信息并提交</strong>";}
 ?>
 </div>
 <form name="fyy" method="post" onsubmit="return tjyy()" enctype="multipart/form-data">
 <input type="hidden" value="yy" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 公司名称：</li>
 <li class="l2"><input type="text" class="inp" name="tcompany" value="<?=$rowuser[company]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 营业执照号码：</li>
 <li class="l2"><input type="text" class="inp" name="tyyzz" value="<?=$rowuser[yyzz]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 营业执照：</li>
 <li class="l2"><input type="file" name="inp3" id="inp3" size="25"></li>
 <? if(is_file($yyzz1)){?>
 <li class="l5"></li>
 <li class="l6"><a href="<?=$yyzz1?>" target="_blank"><img border="0" src="<?=$yyzz1?>" width="170" height="100" /></a></li>
 <? }?>
 <? if(2==$rowuser[yyzzrz] || 3==$rowuser[yyzzrz]){?>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("保存修改")?></li>
 <? }?>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>