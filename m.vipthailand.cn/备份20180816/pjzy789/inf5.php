<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST[yjcode])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 updatetable("fcw_control","
			  LPSELMv='".sqlzhuru($_POST[tLPSELMv])."',
			  LPSELMJv='".sqlzhuru($_POST[tLPSELMJv])."',
			  XQSELMv='".sqlzhuru($_POST[tXQSELMv])."',
			  ESFSELMv='".sqlzhuru($_POST[tESFSELMv])."',
			  ESFSEMJv='".sqlzhuru($_POST[tESFSEMJv])."',
			  ZFSELMv='".sqlzhuru($_POST[tZFSELMv])."',
			  ZFSEMJv='".sqlzhuru($_POST[tZFSEMJv])."',
			  QGSELMv='".sqlzhuru($_POST[tQGSELMv])."',
			  QZSELMv='".sqlzhuru($_POST[tQZSELMv])."',
			  LCSEL='".sqlzhuru($_POST[tLCSEL])."'
			  ");
 php_toheader("inf5.php?t=suc");
}

while0("*","fcw_control");$row=mysql_fetch_array($res);
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
f1.action="inf5.php";
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
 <script language="javascript">document.getElementById("rtit6").className="a1";</script>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","inf5.php");}?>
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" name="yjcode" value="control" />
 <ul class="uk">
 <li class="l1">操作提示：</li>
 <li class="l21">必须为数字，不能带中文，多个数据间用<span class="red">小写</span>的逗号隔开，如：1,2,3,4,5,6</li>
 <li class="l1">楼盘价格：</li>
 <li class="l2"><input type="text" class="inp" name="tLPSELMv" size="60" value="<?=$row[LPSELMv]?>" /></li>
 <li class="l1">楼盘面积：</li>
 <li class="l2"><input type="text" class="inp" name="tLPSELMJv" size="60" value="<?=$row[LPSELMJv]?>" /></li>
 <li class="l1">小区售价：</li>
 <li class="l2"><input type="text" class="inp" name="tXQSELMv" size="60" value="<?=$row[XQSELMv]?>" /></li>
 <li class="l1">二手房价格：</li>
 <li class="l2"><input type="text" class="inp" name="tESFSELMv" size="60" value="<?=$row[ESFSELMv]?>" /></li>
 <li class="l1">二手房面积：</li>
 <li class="l2"><input type="text" class="inp" name="tESFSEMJv" size="60" value="<?=$row[ESFSEMJv]?>" /></li>
 <li class="l1">租房价格：</li>
 <li class="l2"><input type="text" class="inp" name="tZFSELMv" size="60" value="<?=$row[ZFSELMv]?>" /></li>
 <li class="l1">租房面积：</li>
 <li class="l2"><input type="text" class="inp" name="tZFSEMJv" size="60" value="<?=$row[ZFSEMJv]?>" /></li>
 <li class="l1">求购价格：</li>
 <li class="l2"><input type="text" class="inp" name="tQGSELMv" size="60" value="<?=$row[QGSELMv]?>" /></li>
 <li class="l1">求租价格：</li>
 <li class="l2"><input type="text" class="inp" name="tQZSELMv" size="60" value="<?=$row[QZSELMv]?>" /></li>
 <li class="l1">楼层筛选：</li>
 <li class="l2"><input type="text" class="inp" name="tLCSEL" size="60" value="<?=$row[LCSEL]?>" /></li>
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