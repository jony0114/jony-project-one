<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");

if($_GET[control]=="update" && $_POST[jvs]=="jgzs"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
 zwzr();
 deletetable("fcw_jgzs where admin=2");
 for($i=11;$i>=0;$i--){
 $mon=sqlzhuru($_POST["mon".$i]);
 $money=sqlzhuru($_POST["money".$i]);
 if(!is_numeric($money)){$money=0;}
 intotable("fcw_jgzs","admin,areaid,money1,mon","2,0,".$money.",'".$mon."'");
 }
 php_toheader("esfjgzs.php?t=suc");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="esfjgzs.php?control=update";
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu4").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_fang.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","esfjgzs.php");}?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">二手房价格走势</a>
 </div> 

 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="jgzs" name="jvs" />
 <ul class="uk">
 <?
 $m1= date("Y-m",strtotime($sj));
 for($i=11;$i>=0;$i--){
 $m2 = date("Y-m",strtotime("$m1 -".$i." month"));
 while1("*","fcw_jgzs where admin=2 and mon='".$m2."'");if($row1=mysql_fetch_array($res1)){$mv=$row1[money1];}else{$mv=0;}
 ?>
 <li class="l1"><?=$m2?>：</li>
 <li class="l2">
 <input type="hidden" value="<?=$m2?>" name="mon<?=$i?>" />
 <input type="text" class="inp" name="money<?=$i?>" value="<?=$mv?>" onfocus="inpf(this)" onblur="inpb(this)" /><span class="fd">元/平米</span>
 </li>
 <? }?>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>