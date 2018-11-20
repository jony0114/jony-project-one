<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
while1("*","fcw_kehu where (userid=".$userid." or zjuserid=".$userid.") and bh='".$bh."'");
if(!$row1=mysql_fetch_array($res1)){Audit_alert("来源错误！","kehulist.php","parent.");}

$mybh=$_GET[mybh];
while0("*","fcw_kehugj where (userid=".$userid." or zjuserid=".$userid.") and mybh='".$mybh."'");
if(!$row=mysql_fetch_array($res)){Audit_alert("来源错误！","kehulist.php","parent.");}

if($_GET[control]=="update"){
 zwzr();
 $s1=sqlzhuru($_POST[s1]);
 if(empty($s1)){Audit_alert("跟进信息不得为空！","khgjtxt.php?bh=".$bh."&mybh=".$mybh);}
 updatetable("fcw_kehugj","txt='".$s1."',zt=0 where id=".$row[id]);
 php_toheader("khgjtxt.php?t=suc&bh=".$bh."&mybh=".$mybh);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>商铺导航</title>
<style type="text/css">
body{margin:0;font-size:12px;text-align:center;color:#333;word-wrap:break-word;font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu;}
*{margin:0 auto;padding:0;}
ul{list-style-type:none;margin:0;padding:0;}
.uk{float:left;width:600px;font-size:14px;padding:10px;}
.uk li{float:left;}
.uk .l1{width:80px;padding:7px 10px 0 0;height:161px;text-align:right;}
.uk .l2{width:510px;height:168px;}
.uk .l2 textarea{float:left;width:480px;height:155px;}
.uk .l3{width:211px;padding-left:89px;}
.uk .l3 input{cursor:pointer;float:left;width:211px;border:0;font-weight:700;color:#fff;background-color:#ff6600;height:35px;}
</style>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
layer.msg('正在保存', {icon: 16  ,time: 0,shade :0.25});
f1.action="khgjtxt.php?control=update&bh=<?=$bh?>&mybh=<?=$mybh?>";
}
<? if($_GET["t"]=="suc"){?>
parent.location.reload();
<? }?>
</script>
</head>
<body>
<form name="f1" method="post" onsubmit="return tj()">
<input type="hidden" value="gj" name="yjcode" />
<ul class="uk">
<li class="l1">跟进内容：</li>
<li class="l2"><textarea name="s1"><?=$row[txt]?></textarea></li>
<li class="l3"><? tjbtnr("保存修改")?></li>
</ul>
</form>
</body>
</html>