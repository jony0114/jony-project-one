<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/loupandef.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","fcw_tixian where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("txlist.php");}

if($_GET[control]=="update"){
 $zt=intval(sqlzhuru($_POST[R1]));
 if(4==$row[zt] && ($zt==1 || $zt==3)){
  if(3==$zt){
  PointUpdateM($row[uid],$row[money1]);
  PointIntoM($row[uid],"提现申请被拒,原因:".sqlzhuru($_POST[tsm]),$row[money1]);
  }
  updatetable("fcw_tixian","zt=".$zt.",sm='".sqlzhuru($_POST[tsm])."' where id=".$id);
 }
php_toheader("tx.php?t=suc&id=".$id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/user.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
r=document.getElementsByName("R1");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请设置提现状态！");return false;}
if(confirm("确定执行该操作吗？")){tjwait();f1.action="tx.php?id=<?=$id?>&control=update";}else{return false;}
}
function ztonc(x){
if(3==x){document.getElementById("ztsmv").style.display="";}else{document.getElementById("ztsmv").style.display="none";}
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu2").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=3;include("menu_user.php");?>

<div class="right">

 <div class="bqu1">
 <a class="a1" href="txlist.php">提现信息</a>
 </div>

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","tx.php?id=".$id);}?>
 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">会员信息：</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" size="40" value="<?=$row[uid]?> 名称：<?=returnuname($row[uid])?>" /> 
 <? while1("*","fcw_user where uid='".$row[uid]."'");$row1=mysql_fetch_array($res1);?>
 <span class="fd"><a href="user_ses.php?uid=<?=$row1[uid]?>&uty=<?=$row1[usertype]?>" target="_blank">进后台</a></span>
 </li>
 <li class="l1">提现金额：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="40" value="<?=$row[money1]?>元" /></li>
 <li class="l1">收款人：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="40" value="<?=$row[txname]?>" /></li>
 <li class="l1">收款银行：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="40" value="<?=$row[txyh]?>" /></li>
 <li class="l1">卡/帐号：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" size="40" value="<?=$row[txzh]?>" /></li>
 <li class="l1">当前状态：</li>
 <li class="l21"><strong><?=returntxzt($row[zt],$row[sm])?></strong></li>
 </ul>
 
 <? if(4==$row[zt]){?>
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">操作：</li>
 <li class="l2">
 <span class="finp">
 <input name="R1" type="radio" onclick="ztonc(1)" value="1"<? if(1==$row[zt]){?> checked="checked"<? }?> />已转帐，提现成功&nbsp;&nbsp;&nbsp;&nbsp;
 <input name="R1" type="radio" onclick="ztonc(3)" value="3"<? if(3==$row[zt]){?> checked="checked"<? }?> />提现失败
 </span>
 </li>
 </ul>
 <ul class="uk" id="ztsmv"<? if(3!=$row[zt]){?> style="display:none;"<? }?>>
 <li class="l1">失败原因：</li>
 <li class="l2"><input type="text" class="inp" name="tsm" size="90" value="<?=$row[sm]?>" /></li>
 </ul>
 <ul class="uk">
 <li class="l3"><? tjbtnr("下一步","txlist.php")?></li>
 </ul>
 <? }?>
 </form>
 </div>
 <!--E-->

</div>
</div>
<?php include("bottom.php");?>
</body>
</html>