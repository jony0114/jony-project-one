<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
while1("*","fcw_hetong where (userid=".$userid." or zjuserid=".$userid.") and bh='".$bh."'");
if(!$row1=mysql_fetch_array($res1)){Audit_alert("来源错误！","hetonglist.php","parent.");}

$mybh=$_GET[mybh];
while0("*","fcw_htyjfc where zjuserid=".$userid." and mybh='".$mybh."'");
if(!$row=mysql_fetch_array($res)){Audit_alert("来源错误！","hetonglist.php","parent.");}

if($_GET[control]=="update"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $fcbl=$_POST[tfcbl];if(!is_numeric($fcbl)){$fcbl=0;}
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $money1ok=$_POST[tmoney1ok];if(!is_numeric($money1ok)){$money1ok=0;}
 updatetable("fcw_htyjfc","sj='".$sj."',yg='".sqlzhuru($_POST[tyg])."',yggs='".sqlzhuru($_POST[tyggs])."',fcbl=".$fcbl.",money1=".$money1.",money1ok=".$money1ok.",txt='".sqlzhuru($_POST[ttxt])."',zt=0 where id=".$row[id]);
 php_toheader("htyjfctxt.php?t=suc&bh=".$bh."&mybh=".$mybh);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>合同佣金分成</title>
<style type="text/css">
body{margin:0;font-size:12px;text-align:center;color:#333;word-wrap:break-word;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
.uk{float:left;width:300px;font-size:14px;padding:10px;}
.uk li{float:left;}
.uk .l1{width:80px;padding:5px 10px 0 0;height:34px;text-align:right;}
.uk .l2{width:210px;height:39px;}
.uk .l2 .inp{float:left;border:#CCCCCC solid 1px;height:25px;padding:2px 0 0 5px;outline:medium;}
.uk .l2 .inp1{width:50px;}
.uk .l2 .fd{float:left;margin:5px 0 0 10px;}
.uk .l2 label{float:left;cursor:pointer;margin:-2px 10px 0 0;padding:6px 7px 0 7px;height:20px;background-color:#FCFCFD;border:#ECECEC solid 1px;border-radius:5px;}
.uk .l21{width:210px;height:34px;padding-top:5px;text-align:left;}
.uk .l3{width:210px;padding-left:90px;}
.uk .l3 input{cursor:pointer;float:left;width:176px;border:0;font-weight:700;color:#fff;background-color:#ff6600;height:35px;}
</style>
<script type="text/javascript" src="js/index.js" ></script> 
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
layer.msg('正在保存', {icon: 16  ,time: 0,shade :0.25});
f1.action="htyjfctxt.php?control=update&bh=<?=$bh?>&mybh=<?=$mybh?>";
}
<? if($_GET["t"]=="suc"){?>
parent.location.reload();
<? }?>
</script>
</head>
<body>
<form name="f1" method="post" onsubmit="return tj()">
<input type="hidden" value="cw" name="yjcode" />
<ul class="uk">
<?
$shou=0;
$zhi=0;
while1("*","fcw_htcaiwu where htbh='".$bh."' and zt=0 order by sj desc");while($row1=mysql_fetch_array($res1)){
$shou=$shou+$row1[money1ok];
$zhi=$zhi+$row1[money2ok];
}
?>
<li class="l1">总计佣金：</li>
<li class="l21"><span id="yjall"><?=$shou-$zhi?></span>元</li>
<li class="l1">登记日期：</li>
<li class="l2"><input class="inp" name="tsj" value="<?=dateYMD($row[sj])?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd')" type="text"/></li>
<li class="l1">员工名称：</li>
<li class="l2"><input type="text" class="inp" name="tyg" value="<?=$row[yg]?>" /></li>
<li class="l1">员工门店：</li>
<li class="l2"><input type="text" class="inp" name="tyggs" value="<?=$row[yggs]?>" /></li>
<li class="l1">分成比例：</li>
<li class="l2"><input type="text" class="inp inp1" name="tfcbl" id="tfcbl" value="<?=$row[fcbl]?>" /><span class="fd">%</span></li>
<li class="l1">应收业绩：</li>
<li class="l2"><input type="text" class="inp" name="tmoney1" value="<?=$row[money1]?>" /></li>
<li class="l1">实收业绩：</li>
<li class="l2"><input type="text" class="inp" name="tmoney1ok" value="<?=$row[money1ok]?>" /></li>
<li class="l1">摘要：</li>
<li class="l2"><input type="text" class="inp" name="ttxt" value="<?=$row[txt]?>" /></li>
<li class="l3"><? tjbtnr("保存修改")?></li>
</ul>
</form>

<script language="javascript">
function fcblcha(){
 a=parseFloat(document.getElementById("yjall").innerHTML);
 b=document.getElementById("tfcbl").value;
 if(isNaN(b)){alert("比例无效，请输入数字");document.getElementById("tfcbl").focus();return false;}
 document.f1.tmoney1.value=accMul(a,b/100);
 document.f1.tmoney1ok.value=document.f1.tmoney1.value;
}

$('#tfcbl').bind('input propertychange', function() {
 fcblcha();
});
</script>

</body>
</html>