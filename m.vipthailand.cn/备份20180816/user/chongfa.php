<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION[FCWuser]);

if($_GET[control]=="sj"){   //随机
 deletetable("fcw_chongfa where userid=".$userid." and ty1id=".$_GET[dj]);
 for($i=1;$i<=10;$i++){
  $s=rnd_num(23);
  $f=rnd_num(59);
  intotable("fcw_chongfa","userid,ty1id,sj1,sj2,xh","".$userid.",".$_GET[dj].",".$s.",".$f.",".$i."");
 }
 Audit_alert("重发方案设置成功","chongfa.php");

}elseif($_POST[fah]!=""){ //提交
 $dj=intval($_POST[fah]);
 deletetable("fcw_chongfa where userid=".$userid." and ty1id=".$dj);
 for($i=1;$i<=10;$i++){
  $s=$_POST["s_".$dj."_".$i];
  $f=$_POST["f_".$dj."_".$i];
  intotable("fcw_chongfa","userid,ty1id,sj1,sj2,xh","".$userid.",".$dj.",".$s.",".$f.",".$i."");
 }
 Audit_alert("重发方案设置成功","chongfa.php");

}

$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
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
function tjf(x){
document.f1.fah.value=x;
document.f1.submit();
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 自动重发方案</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",3,");?>

 <!--方案B-->
 <form name="f1" method="post">
 <input type="hidden" value="0" name="fah" />
 <?
 $mr=array("一","二","三","四");
 for($m=1;$m<=4;$m++){
 ?>
 <div class="cffa">
  <span class="cap">方案<?=$mr[$m-1]?></span>
  
  <? 
  for($j=1;$j<=10;$j++){
  while1("*","fcw_chongfa where userid=".$userid." and ty1id=".$m." and xh=".$j."");if($row1=mysql_fetch_array($res1)){$s=$row1[sj1];$f=$row1[sj2];}else{$s="";$f="";}
  ?>
  <div class="d1">
  
   <div class="ds1"><?=$j?>.</div>
   <div class="ds2">
   <select style="font-size:18px;font-weight:700;" name="s_<?=$m?>_<?=$j?>">
   <option value="">--</option>
   <? for($i=1;$i<=23;$i++){?>
   <option value="<?=$i?>"<? if($s==$i){?> selected="selected"<? }?>><?=$i?></option>
   <? }?>
   </select>
   </div>
   <div class="ds3">点</div>
   <div class="ds4">
   <select style="font-size:18px;font-weight:700;" name="f_<?=$m?>_<?=$j?>">
   <option value="">--</option>
   <? for($i=0;$i<=59;$i++){?>
   <option value="<?=$i?>"<? if($f==$i){?> selected="selected"<? }?>><?=$i?></option>
   <? }?>
   </select>
   </div>
   
  </div>
  <? }?>
  
  <div class="b">
  <input type="image" onclick="tjf(<?=$m?>)" src="img/b1.gif" width="95" height="41" style="margin:0 10px;" border="0" />
  <a href="chongfa.php?control=sj&dj=<?=$m?>"><img src="img/b2.gif" width="129" height="41" style="margin:0 10px;" border="0" /></a>
  </div>
 </div>
 <? }?>
 </form>
 <!--方案E-->

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>