<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION[FCWuser]);
$sj=date("Y-m-d H:i:s");

$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);

$fid=$_GET[fid];
while0("*","fcw_fang where id=".$fid);$row=mysql_fetch_array($res);
$type1=$row[type1];
if($row[type1]=="出售"){$u="chushoulist.php";}
elseif($row[type1]=="出租"){$u="chuzulist.php";}

if($_POST[fah]!=""){
 $fah=intval($_POST[fah]);
 $fid=intval($_POST[fid]);
 $tianshu=intval($_POST[tianshu]);
 deletetable("fcw_cflist where userid=".$userid." and fid=".$fid."");
 if($fah!=0){ //预设方案
 
  if(intval($_POST[R1])==0){Audit_alert("请选择一套重发方案","yycf.php?fid=".$fid);}
  while1("*","fcw_chongfa where userid=".$userid." and ty1id=".$fah." order by xh asc");while($row1=mysql_fetch_array($res1)){
   for($i=0;$i<$tianshu;$i++){
   $bh=time()."a-".$i."-".$row1[id];
   $s=date("Y-m-d H:i:s",strtotime("+".$i." day"));
   $sjv=dateYMD($s)." ".$row1[sj1].":".$row1[sj2].":00";
   intotable("fcw_cflist","bh,userid,fid,sj,ifok,type1","'".$bh."',".$userid.",".$fid.",'".$sjv."',0,'".$type1."'");
   }
  }
  Audit_alert("恭喜您，预约重发任务提交成功","yycf.php?fid=".$fid);
 
 }else{ //自定义方案
  for($i=0;$i<$tianshu;$i++){
   for($j=1;$j<=10;$j++){
   $s=$_POST["s_1_".$j];
   $f=$_POST["f_1_".$j];
   if(!empty($s) && !empty($f)){
    $bh=time()."z-".$i."-".$j;
    $s1=date("Y-m-d H:i:s",strtotime("+".$i." day"));
    $sjv=dateYMD($s1)." ".$s.":".$f.":00";
    intotable("fcw_cflist","bh,userid,fid,sj,ifok,type1","'".$bh."',".$userid.",".$fid.",'".$sjv."',0,'".$type1."'");
   }
   }
  }
  Audit_alert("恭喜您，重发任务提交成功","yycf.php?fid=".$fid);
 
 }
 
}

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
function faonc(x){
document.f1.fah.value=x;
if(x==0){document.getElementById("cffa").style.display="";}else{document.getElementById("cffa").style.display="none";}
}

function tj(){
document.f1.submit();
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 自动重发</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",3,");?>

 <div class="cfts">
VIP用户的增值服务，可以为您每日各个时间点自动重发（顶）您设定的房源信息，在您出差或者休息的时候也能让您的房源自动展示到第一页（假如整点有N个经纪人的自动房源信息需要重发，则随机排序首末位置） 操作说明： <br>
1、您可以设置四种预约方案，10个时间点来预设发送时间，方便您预约发送N个房源预约。<br> 
2、您也可以自定义时间点来临时设置预约 <br>
3、特别提醒：预设重发条数将从您今日可发条数中扣除，因网络原因，有可能会使预约时间顺延一分钟左右，敬请谅解<br>
 </div>
 
 <form name="f1" method="post">
 <input type="hidden" value="0" name="fah" />
 <input type="hidden" value="<?=$fid?>" name="fid" />
 <div class="yycf">
  <div class="d0"><?=$row[tit]?></div>
  <ul class="u1">
  <li class="l1">选择预约重发方案</li>
  <li class="l2">
  <label><input name="R1" type="radio" onclick="faonc(0)" value="0" checked="checked" /> 自定义</label>
  <label><input name="R1" type="radio" onclick="faonc(1)" value="1" /> 方案一</label>
  <label><input name="R1" type="radio" onclick="faonc(2)" value="2" /> 方案二</label>
  <label><input name="R1" type="radio" onclick="faonc(3)" value="3" /> 方案三</label>
  <label><input name="R1" type="radio" onclick="faonc(4)" value="4" /> 方案四</label>
  </li>
  <li class="l3">
  <a href="chongfa.php"><img border="0" src="img/b3.gif" width="129" height="41" /></a>
  </li>
  </ul>
 </div>
 
 <div class="cffa">
 
  <div id="cffa">
  <? 
  for($j=1;$j<=10;$j++){
  ?>
  <div class="d1">
   <div class="ds1"><?=$j?>.</div>
   <div class="ds2">
   <select style="font-size:18px;font-weight:700;" name="s_1_<?=$j?>">
   <option value="">--</option>
   <? for($i=1;$i<=23;$i++){?>
   <option value="<?=$i?>"<? if($s==$i){?> selected="selected"<? }?>><?=$i?></option>
   <? }?>
   </select>
   </div>
   <div class="ds3">点</div>
   <div class="ds4">
   <select style="font-size:18px;font-weight:700;" name="f_1_<?=$j?>">
   <option value="">--</option>
   <? for($i=0;$i<=59;$i++){?>
   <option value="<?=$i?>"><?=$i?></option>
   <? }?>
   </select>
   </div>
  </div>
  <? }?>
  </div>
  
  <div class="d2">
  本次预约重发当日即可生效，请选择执行天数：
  <select name="tianshu">
  <option value="1">今天</option>
  <option value="3">三天</option>
  <option value="5">五天</option>
  <option value="10">十天</option>
  <option value="15">十五天</option>
  <option value="30">三十天</option>
  </select>
  </div>
  
  <div class="b">
  <input type="image" onclick="tj()" src="img/b4.gif" width="95" height="41" style="margin:0 10px;" border="0" />
  </div>
  
 </div>
 </form>


</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>