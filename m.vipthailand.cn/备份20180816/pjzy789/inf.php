<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

$flogo="../template/moban/".$rowcontrol[nowmb]."/homeimg/logo1.png";

if(sqlzhuru($_POST["yjcode"])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 $sj=date("Y-m-d H:i:s");
 zwzr();
 if(panduan("*","fcw_control")==0){intotable("code_control","webnamev","'保存失败'");}
 updatetable("fcw_control","
			  webareav='".sqlzhuru($_POST[twebareav])."',
			  webnamev='".sqlzhuru($_POST[twebnamev])."',
			  weburlv='".sqlzhuru($_POST[tweburlv])."',
			  beian='".sqlzhuru($_POST[tbeian])."',
			  webtit='".sqlzhuru($_POST[twebtit])."',
			  webkey='".sqlzhuru($_POST[twebkey])."',
			  webdes='".sqlzhuru($_POST[swebdes])."',
			  webtongji='".sqlzhuru($_POST[swebtongji])."',
			  weixin='".sqlzhuru($_POST[tweixin])."',
			  zb='".sqlzhuru($_POST[tzb])."',
			  zbdj=".sqlzhuru($_POST[tzbdj]).",
			  sermode=".sqlzhuru($_POST[R2])."
			  ");
 move_uploaded_file($_FILES["inp4"]['tmp_name'], "../m/img/logo.png");
 php_toheader("inf.php?t=suc");
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
f1.action="inf.php";
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

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","inf.php");}?>

 <? include("rightcap1.php");?>
 <script language="javascript">document.getElementById("rtit1").className="a1";</script>
 
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" name="yjcode" value="control" />
 <ul class="uk">
 <li class="l1">地域名称：</li>
 <li class="l2"><input type="text" class="inp" name="twebareav" size="30" value="<?=webarea?>" /></li>
 <li class="l1">网站名称：</li>
 <li class="l2"><input type="text" class="inp" name="twebnamev" size="30" value="<?=webname?>" /></li>
 <li class="l1">微信号码：</li>
 <li class="l2"><input class="inp" name="tweixin" value="<?=$row[weixin]?>" size="30" type="text"/></li>
 <li class="l1">网址：</li>
 <li class="l2">
 <input type="text" class="inp" name="tweburlv" value="<?=weburl?>" size="30" /> 
 <span class="fd red">切记：必须以 http:// 开头，斜杆 / 结尾</span>
 </li>
 <li class="l1">手机站LOGO：</li>
 <li class="l2"><input class="inp1" type="file" name="inp4" id="inp4" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><a href="../m/img/logo.png" target="_blank"><img border="0" src="../m/img/logo.png?t=<?=rnd_num(100)?>" width="100" height="54" /></a></li>
 <li class="l1">网站备案号：</li>
 <li class="l2"><input name="tbeian" value="<?=$row[beian]?>" size="30" type="text" class="inp" /></li>
 <li class="l1">网站标题：</li>
 <li class="l2"><input  name="twebtit" value="<?=$row[webtit]?>" size="80" type="text" class="inp" /></li>
 <li class="l1">站点关键词：</li>
 <li class="l2"><input  name="twebkey" value="<?=$row[webkey]?>" size="80" type="text" class="inp" /></li>
 <li class="l4">站点描述：</li>
 <li class="l5"><textarea name="swebdes"><?=$row[webdes]?></textarea></li>
 <li class="l4">统计代码：</li>
 <li class="l5"><textarea name="swebtongji"><?=$row[webtongji]?></textarea></li>
 <li class="l1">全站坐标：</li>
 <li class="l2">
 <input name="tzb" value="<?=$row[zb]?>" size="30" type="text" class="inp" />
 <span class="fd">[<a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">点击获取</a>]</span>
 </li>
 <li class="l1">坐标缩放等级：</li>
 <li class="l2"><input name="tzbdj" value="<?=returnjgdw($row[zbdj],"",15)?>" size="5" type="text" class="inp" /></li>
 <li class="l1">搜索模式：</li>
 <li class="l2">
 <label><input name="R2" type="radio" value="1" <? if(1==$row[sermode]){?> checked="checked"<? }?> /> 常规模式</label>
 <label><input name="R2" type="radio" value="2" <? if(2==$row[sermode]){?> checked="checked"<? }?> /> 常规转码</label>
 <label><input name="R2" type="radio" value="0" <? if(empty($row[sermode])){?> checked="checked"<? }?> /> 强化转码模式</label>
 </li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--End-->
 
</div>
</div>

<? include("bottom.php");?>
</body>
</html>