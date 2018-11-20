<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sj=date("Y-m-d H:i:s");
$ty=$_GET[ty];

while3("id,uid,money1,sxnum","fcw_user where uid='".$_SESSION[FCWuser]."'");$row3=mysql_fetch_array($res3);
$sxnum=$row3[sxnum];
$money1=$row3[money1];
$djsx=0;
while2("*","fcw_userdjsx where userid=".$row3[id]);if($row2=mysql_fetch_array($res2)){$djsx=$row2[sxnum];}

//B
if($_GET[control]=="update"){
 $id=$_GET[id];
 if(!is_numeric($id)){Audit_alert("数据验证有误，返回重试！","./");}
 while1("*","fcw_adsx where id=".$id);if(!$row1=mysql_fetch_array($res1)){Audit_alert("无此记录，返回重试！","./");}
 if($money1<$row1[money1]){Audit_alert("余额不足，请先充值！","pay.php?m=".($row1[money1]-$money1));}
 updatetable("fcw_user","sxnum=sxnum+".$row1[snum]." where uid='".$_SESSION[FCWuser]."'");
 $money1=$row1["money1"]*(-1);
 PointIntoM($_SESSION[FCWuser],"购买房源刷新量".$row1[snum]."条",$money1);
 PointUpdateM($_SESSION[FCWuser],$money1); 
 php_toheader("adsx.php?t=suc&ty=".$ty);
 
}
//E

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
nid=0;
function anumonc(x,y,z){
 nid=z;
 ax=parseInt(document.getElementById("allnum").innerHTML);
 for(i=1;i<=ax;i++){
 if(document.getElementById("anum"+i)){document.getElementById("anum"+i).className="s3";}
 }
 document.getElementById("anum"+x).className="s3 s32";
 document.getElementById("allmoney").innerHTML=y;
}

function tj(){
 if(0==nid){alert("请先选择购买数量！");return false;}
 if(confirm("购买成功后，费用将直接从您的余额中扣除，确认购买吗?")){}else{return false;}
 tjwait();
 f1.action="adsx.php?ty=<?=$ty?>&control=update&id="+nid;
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 购买刷新量</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l1 l2"><a href="adsx.php?ty=<?=$ty?>">购买刷新</a></li>
 <li class="l1"><a href="userdj.php">会员等级</a></li>
 </ul>
 
 <? systs("恭喜您，操作成功!","adsx.php?ty=".$ty)?>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ukad">
 <li class="l1">选择购买量：</li>
 <li class="l2">
 <?
 $i=0;
 while1("*","fcw_adsx where type1='".$ty."' order by snum asc");while($row1=mysql_fetch_array($res1)){
 $i++;
 ?>
 <a id="anum<?=$i?>" class="s3" href="javascript:anumonc(<?=$i?>,<?=$row1[money1]?>,<?=$row1[id]?>)">
 <b><?=$row1[snum]?>条</b><br>
 <strong><?=$row1[money1]?></strong>元
 </a>
 <? }?>
 </li>
 </ul>
 <span id="allnum" style="display:none"><?=$i?></span>
   
 <ul class="uk">
 <li class="l1">您的刷新量：</li>
 <li class="l21">尊敬的用户，您还剩余 <strong><?=$sxnum+$djsx?></strong> 条刷新量 </li>
 <li class="l1">总计费用：</li>
 <li class="l21"><strong class="red"><span id="allmoney">0</span></strong>元</li>
 <li class="l1">您的余额：</li>
 <li class="l21"><?=$money1?>元  [<a href="pay.php" class="red"><strong>充值</strong></a>]</li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("提交购买")?></li>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>