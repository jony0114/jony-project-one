<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if(sqlzhuru($_POST[yjcode])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","fcw_control")==0){intotable("code_control","webnamev","'保存失败'");}
 $regmob=sqlzhuru($_POST[Rregmob]);
 updatetable("fcw_control","
			  userfb='".sqlzhuru($_POST[R1])."',
			  userfy='".sqlzhuru($_POST[R2])."',
			  jjrfb='".sqlzhuru($_POST[R3])."',
			  jjrfy='".sqlzhuru($_POST[R4])."',
			  zjfb='".sqlzhuru($_POST[Rzjfb])."',
			  zjfy='".sqlzhuru($_POST[Rzjfy])."',
			  jcfb='".sqlzhuru($_POST[Rjcfb])."',
			  jcfy='".sqlzhuru($_POST[Rjcfy])."',
			  jiafb='".sqlzhuru($_POST[R5])."',
			  jialook='".sqlzhuru($_POST[R6])."',
			  fkfb='".sqlzhuru($_POST[R7])."',
			  fklook='".addslashes($_POST[R8])."',
			  ifqq='".sqlzhuru($_POST[R11])."',
			  ifjia=".sqlzhuru($_POST[Rifjia]).",
			  regmob=".$regmob.",
			  fangmot=".sqlzhuru($_POST[Rfangmot]).",
			  ifwap=".$_POST[Rifwap].",
			  ifuc=".$_POST[Rifuc]."
			  ");
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../img/anzhuo.apk");
 php_toheader("inf1.php?t=suc");
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
f1.action="inf1.php";
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
 <script language="javascript">document.getElementById("rtit2").className="a1";</script>
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","inf1.php");}?>
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" name="yjcode" value="control" />
 <ul class="rcap"><li class="l1"></li><li class="l2">个人用户</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">信息发布权限：</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="off" <? if($row[userfb]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="R1" type="radio" value="on" <? if($row[userfb]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 <li class="l1">信息展示权限：</li>
 <li class="l2">
 <label><input name="R2" type="radio" value="off" <? if($row[userfy]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="R2" type="radio" value="on" <? if($row[userfy]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">经纪人</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">信息发布权限：</li>
 <li class="l2">
 <label><input name="R3" type="radio" value="off" <? if($row[jjrfb]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="R3" type="radio" value="on" <? if($row[jjrfb]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 <li class="l1">信息展示权限：</li>
 <li class="l2">
 <label><input name="R4" type="radio" value="off" <? if($row[jjrfy]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="R4" type="radio" value="on" <? if($row[jjrfy]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">中介公司</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">信息发布权限：</li>
 <li class="l2">
 <label><input name="Rzjfb" type="radio" value="off" <? if($row[zjfb]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="Rzjfb" type="radio" value="on" <? if($row[zjfb]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 <li class="l1">信息展示权限：</li>
 <li class="l2">
 <label><input name="Rzjfy" type="radio" value="off" <? if($row[zjfy]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="Rzjfy" type="radio" value="on" <? if($row[zjfy]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">房开公司</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">信息发布权限：</li>
 <li class="l2">
 <label><input name="R7" type="radio" value="off" <? if($row[fkfb]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="R7" type="radio" value="on" <? if($row[fkfb]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 <li class="l1">信息展示权限：</li>
 <li class="l2">
 <label><input name="R8" type="radio" value="off" <? if($row[fklook]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="R8" type="radio" value="on" <? if($row[fklook]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">设计/装修</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">信息发布权限：</li>
 <li class="l2">
 <label><input name="R5" type="radio" value="off" <? if($row[jiafb]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="R5" type="radio" value="on" <? if($row[jiafb]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 <li class="l1">信息展示权限：</li>
 <li class="l2">
 <label><input name="R6" type="radio" value="off" <? if($row[jialook]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="R6" type="radio" value="on" <? if($row[jialook]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">建材公司</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">信息发布权限：</li>
 <li class="l2">
 <label><input name="Rjcfb" type="radio" value="off" <? if($row[jcfb]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="Rjcfb" type="radio" value="on" <? if($row[jcfb]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 <li class="l1">信息展示权限：</li>
 <li class="l2">
 <label><input name="Rjcfy" type="radio" value="off" <? if($row[jcfy]=="off"){?> checked="checked"<? }?> /> 需要审核</label>
 <label><input name="Rjcfy" type="radio" value="on" <? if($row[jcfy]=="on"){?> checked="checked"<? }?> /> 不需要审核</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">其他开关</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">右侧客服：</li>
 <li class="l2">
 <label><input name="R11" type="radio" value="on" <? if($row[ifqq]=="on"){?> checked="checked"<? }?> /> 启用</label>
 <label><input name="R11" type="radio" value="off" <? if($row[ifqq]=="off"){?> checked="checked"<? }?> /> 关闭</label>
 </li>
 <li class="l1">房源联系方式：</li>
 <li class="l2">
 <label><input name="Rfangmot" type="radio" value="0" <? if(empty($row[fangmot])){?> checked="checked"<? }?> /> 默认</label>
 <label><input name="Rfangmot" type="radio" value="1" <? if($row[fangmot]==1){?> checked="checked"<? }?> /> 隐藏(显示网站本身的)</label>
 </li>
 <li class="l1">手机版：</li>
 <li class="l2">
 <label><input name="Rifwap" type="radio" value="0" <? if(empty($row[ifwap])){?> checked="checked"<? }?> /> 启用</label>
 <label><input name="Rifwap" type="radio" value="1" <? if(1==$row[ifwap]){?> checked="checked"<? }?> /> 关闭</label>
 </li>
 <li class="l1">安卓APP：</li>
 <li class="l2"><input class="inp1" type="file" name="inp1" id="inp1" size="15" accept=".apk"></li>
 <? if(is_file("../img/anzhuo.apk")){?>
 <li class="l8"></li>
 <li class="l9"><a href="../img/anzhuo.apk" target="_blank"><img border="0" src="img/anzhuo.png" width="54" height="54" /></a></li>
 <? }?>
 <li class="l1">家装馆：</li>
 <li class="l2">
 <label><input name="Rifjia" type="radio" value="1" <? if(1==$row[ifjia]){?> checked="checked"<? }?> /> 启用</label>
 <label><input name="Rifjia" type="radio" value="0" <? if(0==$row[ifjia]){?> checked="checked"<? }?> /> 关闭</label>
 </li>
 <li class="l1">注册短信验证：</li>
 <li class="l2">
 <label><input name="Rregmob" type="radio" value="1" <? if(1==$row[regmob]){?> checked="checked"<? }?> /> 启用</label> 
 <label><input name="Rregmob" type="radio" value="0" <? if(0==$row[regmob]){?> checked="checked"<? }?> /> 关闭</label>
 </li>
 <li class="l1">是否开启UC：</li>
 <li class="l2">
 <label><input name="Rifuc" type="radio" value="0" <? if(empty($row[ifuc])){?> checked="checked"<? }?> /> 不开启</label>
 <label><input name="Rifuc" type="radio" value="1" <? if($row[ifuc]==1){?> checked="checked"<? }?> /> 开启</label>
 <span class="fd">(<a href="http://www.yj99.cn/faq/view41.html" target="_blank" class="red">查看教程</a>)</span>
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