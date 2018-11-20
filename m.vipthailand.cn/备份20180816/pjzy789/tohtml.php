<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$admin=intval(returnjgdw($_GET["admin"],"",0));
if($admin==0){$nwz="常规缓存清理";}
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
<!--
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}
function callServer(url) {
  xmlHttp.open("post", url, true);
  xmlHttp.onreadystatechange = updatePage;
  xmlHttp.send(null);  
}

function updatePage() {
  if (xmlHttp.readyState == 4) {
   var response = xmlHttp.responseText;
   response=response.replace(/[\r\n]/g,'');
   if(response=="ok"){
   <? if($_GET[bkpage]!=""){?>
   location.href="<?=$_GET[bkpage]?>?t=suc";
   <? }else{?>
   location.href="tohtml.php?t=suc&admin="+document.getElementById("nadmin").innerHTML;return false;
   <? }?>
   }else{alert("更新失败！请登录售后官网www.yjcode.com查找解决方案\n"+response);window.location.reload();return false;}
  }
}


function startHTML(adminnum){
layer.msg('正在处理数据', {icon: 16  ,time: 0,shade :0.25});
c=document.getElementsByName("C1");str="xcf";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+"xcf";}}
callServer("after_html.php?admin="+adminnum+"&zl="+str);
}
//-->
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","tohtml.php?admin=".$admin);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1"><?=$nwz?></a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <form name="f1" method="post">
 <ul class="uk">
 <? if($admin==0){?>
 <li class="l1">执行项目：</li>
 <li class="l2"><label><input name="C1" type="checkbox" value="1" checked="checked" /> 常规更新 (公用部分常规缓存清理)</label></li>
 <? }?>
 <li class="l3"><input type="button" value="开始处理" class="btn1" onclick="startHTML(<?=$admin?>)" /></li>
 </ul>
 </form>
 </div>
 <span id="nadmin" style="display:none"><?=$admin?></span>
 </div>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
<?
if($_GET[action]=="gx"){
?>
<script language="javascript">
startHTML(<?=$admin?>);
</script>
<?
}
?>
</body>
</html>