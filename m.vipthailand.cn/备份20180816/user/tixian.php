<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
if(empty($rowuser[txyh]) || empty($rowuser[txname]) || empty($rowuser[txzh])){Audit_alert("您未设置收款帐号，请先设置","txsz.php");}

if(sqlzhuru($_POST[jvs])=="tixian"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $money1=sqlzhuru($_POST[t1]);
 if(!eregi("^[0-9,\.]+$",$money1)){Audit_alert("提现金额不正确","tixian.php");}
 $m=(float)$money1;
 if($m>$rowuser[money1] || $m<=0){Audit_alert("提现金额不正确，提现失败","tixian.php");}
 $bh=time()."tx".$rowuser[id];
 intotable("fcw_tixian","bh,uid,money1,sj,uip,txyh,txname,txzh,txkhh,zt,sm","'".$bh."','".$_SESSION[FCWuser]."',".$m.",'".$sj."','".$uip."','".$rowuser[txyh]."','".$rowuser[txname]."','".$rowuser[txzh]."','".$rowuser[txkhh]."',4,''");
  PointUpdateM($_SESSION[FCWuser],$m*(-1));
  PointIntoM($_SESSION[FCWuser],"提现申请",$m*(-1));
  php_toheader("tixian.php?t=suc");
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
function tj(){
if((document.f1.t1.value).replace(/\s/,"")=="" || isNaN(document.f1.t1.value)){alert("请输入有效的提现金额");document.f1.t1.focus();return false;}	
if(confirm("确定要提现吗？")){tjwait();f1.action="tixian.php";}else{return false;}
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 我要提现</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap4").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功，我们会尽快处理您的提现申请!","tixian.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="tixian" name="jvs" />
 <ul class="uk">
 <li class="l1">友情提示：</li>
 <li class="l21">如果不想用以下的收款帐号收款，您可以【<a href="txsz.php" class="feng">修改收款帐号信息</a>】</li>
 <li class="l1">可用余额：</li>
 <li class="l21 red"><strong style="font-family:Arial, Helvetica, sans-serif;font-size:16px;">￥<?=$rowuser[money1]?></strong></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span>提现金额：</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">提现类型：</li>
 <li class="l21"><?=$rowuser[txyh]?></li>
 <li class="l1">卡号/账号：</li>
 <li class="l21"><?=$rowuser[txzh]?></li>
 <li class="l1"<? if($rowuser[txyh]=="支付宝" || $rowuser[txyh]=="财付通"){?> style="display:none;"<? }?>>开户行：</li>
 <li class="l21"<? if($rowuser[txyh]=="支付宝" || $rowuser[txyh]=="财付通"){?> style="display:none;"<? }?>><?=$rowuser[txkhh]?></li>
 <li class="l1">户名：</li>
 <li class="l21"><?=$rowuser[txname]?></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("下一步")?></li>
 </ul>
 </form>
 
</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>