<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST["yjcode"])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $tyarr=array("fang");
 for($ti=0;$ti<count($tyarr);$ti++){
  $ty=$tyarr[$ti];
  deletetable("fcw_adsx where type1='".$ty."'");
  for($i=1;$i<=10;$i++){
  $n=$_POST[$ty."s".$i];$m=$_POST[$ty.$i];if(is_numeric($n) && is_numeric($m)){intotable("fcw_adsx","type1,snum,money1","'".$ty."',".$n.",".$m."");}
  }
 }
 
 $tyarr=array("chushou","chuzu","qiugou","qiuzu");
 for($ti=0;$ti<count($tyarr);$ti++){
  $ty=$tyarr[$ti];
  deletetable("fcw_adzd where type1='".$ty."'");
  for($i=1;$i<=20;$i++){
  $n=$_POST[$ty."s".$i];$m=$_POST[$ty.$i];if(is_numeric($n) && is_numeric($m)){intotable("fcw_adzd","type1,xh,money1","'".$ty."',".$n.",".$m."");}
  }
 }

 php_toheader("inf4.php?t=suc");
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
f1.action="inf4.php";
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? include("rightcap1.php");?>
 <script language="javascript">document.getElementById("rtit5").className="a1";</script>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","inf4.php");}?>
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" name="yjcode" value="control" />
 
 <ul class="rcap"><li class="l1"></li><li class="l2">房源刷新资费</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">刷新数量：</li>
 <li class="l2">
 <? 
 while1("*","fcw_adsx where type1='fang' order by snum asc limit 10");
 for($i=1;$i<=10;$i++){
 if($row1=mysql_fetch_array($res1)){$n=$row1[snum];}else{$n="";}
 ?>
 <input class="inp" style="width:30px;text-align:center;margin-right:10px;padding-left:0;border:#999 solid 1px;" value="<?=$n?>" name="fangs<?=$i?>" type="text"/>
 <? }?>
 </li>
 <li class="l1">对应资费：</li>
 <li class="l2">
 <? 
 while1("*","fcw_adsx where type1='fang' order by snum asc limit 20");
 for($i=1;$i<=10;$i++){
 if($row1=mysql_fetch_array($res1)){$n=$row1[money1];}else{$n="";}
 ?>
 <input class="inp" name="fang<?=$i?>" style="width:30px;text-align:center;padding-left:0;margin-right:10px;border:#999 solid 1px;" value="<?=$n?>" type="text"/>
 <? }?><span class="fd">元</span>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">出售区置顶</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">置顶位置：</li>
 <li class="l2">
 <? 
 while1("*","fcw_adzd where type1='chushou' order by xh asc limit 20");
 for($i=1;$i<=20;$i++){
 if($row1=mysql_fetch_array($res1)){$n=$row1[xh];}else{$n="";}
 ?>
 <input class="inp" style="width:30px;text-align:center;margin-right:10px;padding-left:0;border:#999 solid 1px;" value="<?=$n?>" name="chushous<?=$i?>" type="text"/>
 <? }?>
 </li>
 <li class="l1">置顶费用：</li>
 <li class="l2">
 <? 
 while1("*","fcw_adzd where type1='chushou' order by xh asc limit 20");
 for($i=1;$i<=20;$i++){
 if($row1=mysql_fetch_array($res1)){$n=$row1[money1];}else{$n="";}
 ?>
 <input class="inp" name="chushou<?=$i?>" style="width:30px;text-align:center;padding-left:0;margin-right:10px;border:#999 solid 1px;" value="<?=$n?>" type="text"/>
 <? }?>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">出租区置顶</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">置顶位置：</li>
 <li class="l2">
 <? 
 while1("*","fcw_adzd where type1='chuzu' order by xh asc limit 20");
 for($i=1;$i<=20;$i++){
 if($row1=mysql_fetch_array($res1)){$n=$row1[xh];}else{$n="";}
 ?>
 <input class="inp" style="width:30px;text-align:center;margin-right:10px;padding-left:0;border:#999 solid 1px;" value="<?=$n?>" name="chuzus<?=$i?>" type="text"/>
 <? }?>
 </li>
 <li class="l1">置顶费用：</li>
 <li class="l2">
 <? 
 while1("*","fcw_adzd where type1='chuzu' order by xh asc limit 20");
 for($i=1;$i<=20;$i++){
 if($row1=mysql_fetch_array($res1)){$n=$row1[money1];}else{$n="";}
 ?>
 <input class="inp" name="chuzu<?=$i?>" style="width:30px;text-align:center;padding-left:0;margin-right:10px;border:#999 solid 1px;" value="<?=$n?>" type="text"/>
 <? }?>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">求购区置顶</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">置顶位置：</li>
 <li class="l2">
 <? 
 while1("*","fcw_adzd where type1='qiugou' order by xh asc limit 20");
 for($i=1;$i<=20;$i++){
 if($row1=mysql_fetch_array($res1)){$n=$row1[xh];}else{$n="";}
 ?>
 <input class="inp" style="width:30px;text-align:center;margin-right:10px;padding-left:0;border:#999 solid 1px;" value="<?=$n?>" name="qiugous<?=$i?>" type="text"/>
 <? }?>
 </li>
 <li class="l1">置顶费用：</li>
 <li class="l2">
 <? 
 while1("*","fcw_adzd where type1='qiugou' order by xh asc limit 20");
 for($i=1;$i<=20;$i++){
 if($row1=mysql_fetch_array($res1)){$n=$row1[money1];}else{$n="";}
 ?>
 <input class="inp" name="qiugou<?=$i?>" style="width:30px;text-align:center;padding-left:0;margin-right:10px;border:#999 solid 1px;" value="<?=$n?>" type="text"/>
 <? }?>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">求租区置顶</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">置顶位置：</li>
 <li class="l2">
 <? 
 while1("*","fcw_adzd where type1='qiuzu' order by xh asc limit 20");
 for($i=1;$i<=20;$i++){
 if($row1=mysql_fetch_array($res1)){$n=$row1[xh];}else{$n="";}
 ?>
 <input class="inp" style="width:30px;text-align:center;margin-right:10px;padding-left:0;border:#999 solid 1px;" value="<?=$n?>" name="qiuzus<?=$i?>" type="text"/>
 <? }?>
 </li>
 <li class="l1">置顶费用：</li>
 <li class="l2">
 <? 
 while1("*","fcw_adzd where type1='qiuzu' order by xh asc limit 20");
 for($i=1;$i<=20;$i++){
 if($row1=mysql_fetch_array($res1)){$n=$row1[money1];}else{$n="";}
 ?>
 <input class="inp" name="qiuzu<?=$i?>" style="width:30px;text-align:center;padding-left:0;margin-right:10px;border:#999 solid 1px;" value="<?=$n?>" type="text"/>
 <? }?>
 </li>

 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--End-->
 
</div>
</div>

<?php include("bottom.php");?>

</body>
</html>