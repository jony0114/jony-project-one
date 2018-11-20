<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
while1("*","fcw_hetong where (userid=".$userid." or zjuserid=".$userid.") and bh='".$bh."'");
if(!$row1=mysql_fetch_array($res1)){Audit_alert("来源错误！","hetonglist.php","parent.");}

$mybh=$_GET[mybh];
while0("*","fcw_htcaiwu where zjuserid=".$userid." and mybh='".$mybh."'");
if(!$row=mysql_fetch_array($res)){Audit_alert("来源错误！","hetonglist.php","parent.");}

if($_GET[control]=="update"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $money1ok=$_POST[tmoney1ok];if(!is_numeric($money1ok)){$money1ok=0;}
 $money2=$_POST[tmoney2];if(!is_numeric($money2)){$money2=0;}
 $money2ok=$_POST[tmoney2ok];if(!is_numeric($money2ok)){$money2ok=0;}
 updatetable("fcw_htcaiwu","sj='".$sj."',type1='".sqlzhuru($_POST[R1])."',sf='".sqlzhuru($_POST[R2])."',money1=".$money1.",money1ok=".$money1ok.",ff='".sqlzhuru($_POST[R3])."',money2=".$money2.",money2ok=".$money2ok.",zt=0,txt='".sqlzhuru($_POST[ttxt])."' where id=".$row[id]);
 php_toheader("htcaiwutxt.php?t=suc&bh=".$bh."&mybh=".$mybh);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>合同财务收付</title>
<style type="text/css">
body{margin:0;font-size:12px;text-align:center;color:#333;word-wrap:break-word;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
.uk{float:left;width:300px;font-size:14px;padding:10px;}
.uk li{float:left;}
.uk .l1{width:80px;padding:5px 10px 0 0;height:34px;text-align:right;}
.uk .l2{width:210px;height:39px;}
.uk .l2 .inp{float:left;border:#CCCCCC solid 1px;height:25px;padding:2px 0 0 5px;outline:medium;}
.uk .l2 label{float:left;cursor:pointer;margin:-2px 10px 0 0;padding:6px 7px 0 7px;height:20px;background-color:#FCFCFD;border:#ECECEC solid 1px;border-radius:5px;}
.uk .l3{width:210px;padding-left:90px;}
.uk .l3 input{cursor:pointer;float:left;width:176px;border:0;font-weight:700;color:#fff;background-color:#ff6600;height:35px;}
</style>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
layer.msg('正在保存', {icon: 16  ,time: 0,shade :0.25});
f1.action="htcaiwutxt.php?control=update&bh=<?=$bh?>&mybh=<?=$mybh?>";
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
<li class="l1">登记日期：</li>
<li class="l2"><input class="inp" name="tsj" value="<?=dateYMD($row[sj])?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd')" type="text"/></li>
<li class="l1">款项类型：</li>
<li class="l2">
<label><input name="R1" type="radio" value="佣金"<? if($row[type1]=='佣金'){?> checked="checked"<? }?> /> 佣金</label>
<label><input name="R1" type="radio" value="其他"<? if($row[type1]=='其他'){?> checked="checked"<? }?> /> 其他</label>
</li>
<li class="l1">收方：</li>
<li class="l2">
<label><input name="R2" type="radio" value="业主"<? if($row[sf]=='业主'){?> checked="checked"<? }?> /> 业主</label>
<label><input name="R2" type="radio" value="客户"<? if($row[sf]=='客户'){?> checked="checked"<? }?> /> 客户</label>
<label><input name="R2" type="radio" value=""<? if($row[sf]==''){?> checked="checked"<? }?> /> 无</label>
</li>
<li class="l1">应收：</li>
<li class="l2"><input type="text" class="inp" name="tmoney1" value="<?=$row[money1]?>" /></li>
<li class="l1">实收：</li>
<li class="l2"><input type="text" class="inp" name="tmoney1ok" value="<?=$row[money1ok]?>" /></li>
<li class="l1">付方：</li>
<li class="l2">
<label><input name="R3" type="radio" value="业主"<? if($row[sf]=='业主'){?> checked="checked"<? }?> /> 业主</label>
<label><input name="R3" type="radio" value="客户"<? if($row[sf]=='客户'){?> checked="checked"<? }?> /> 客户</label>
<label><input name="R3" type="radio" value=""<? if($row[sf]==''){?> checked="checked"<? }?> /> 无</label>
</li>
<li class="l1">应付：</li>
<li class="l2"><input type="text" class="inp" name="tmoney2" value="<?=$row[money2]?>" /></li>
<li class="l1">实付：</li>
<li class="l2"><input type="text" class="inp" name="tmoney2ok" value="<?=$row[money2ok]?>" /></li>
<li class="l1">摘要：</li>
<li class="l2"><input type="text" class="inp" name="ttxt" value="<?=$row[txt]?>" /></li>
<li class="l3"><? tjbtnr("保存修改")?></li>
</ul>
</form>
</body>
</html>