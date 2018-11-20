<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
if($_GET[control]=="ret"){deletetable("fcw_update");php_toheader("default.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link rel="stylesheet" href="layui/css/layui.css">
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="js/gx.js"></script>
<script language="javascript">
function retgx(){
if(confirm("建议在升级失败的情况下才提交重新升级，确定吗？")){location.href="default.php?control=ret";}else{return false;}	
}
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

<div class="bqu1">
<a class="a1" href="default.php">全局管理</a>
</div>
  
<!--B-->
<div class="rkuang">

<!--开始判断高危-->
<div class="gaowei" id="gaowei" style="display:none;">
 <span class="gaocap">您的网站发现<strong id="errnum"></strong>个高危漏洞，请尽快修复，避免严重损失</span>
 <?
 $errnum=0;
 $testv="yes";
 $dirarr=array("img/",
			   "ad/",
			   "ckeditor/attached/",
			   "config/ueditor/php/upload/",
			   "config/ueditor/php/upload1/",
			   "config/ueditor/php/upload2/",
			   "config/ueditor/php/upload3/",
			   "config/ueditor_mini/php/upload/",
			   "config/ueditor_mini/php/upload1/",
			   "config/ueditor_mini/php/upload2/",
			   "config/ueditor_mini/php/upload3/",
			   "upload/"
			   );
 for($i=0;$i<count($dirarr);$i++){
 createDir("../".$dirarr[$i]);
 $fp= fopen("../".$dirarr[$i]."shell.php","w");fwrite($fp,$testv);fclose($fp);if(@htmlget(weburl.$dirarr[$i]."shell.php")=="yes"){
  $errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="http://www.yj99.cn/faq/view20.html" target="_blank">修复方法</a></li>
 <li class="l2">文件夹：<strong><?=$dirarr[$i]?></strong> 存在可执行脚本权限漏洞，有被注入并运行木马的风险</li>
 </ul>
 <? }}?>
  
 <?
 while1("*","fcw_admin where adminuid='".$_SESSION["FCWADMINSES"]."'");$row1=mysql_fetch_array($res1);
 if(strcmp("admin",$row1[adminuid])==0){$errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="adminlist.php">立即修复</a></li>
 <li class="l2">请不要采用admin之类的容易被猜到的字符做为管理员账号</li>
 </ul>
 <? }?>
 
 <?
 if(strcmp(sha1("admin"),$row1[adminpwd])==0 || strcmp(sha1("123456"),$row1[adminpwd])==0 || strcmp(sha1("admin888"),$row1[adminpwd])==0){$errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="pwd.php">立即修复</a></li>
 <li class="l2">请不要采用admin、123456、admin888之类的容易被猜到的字符做为密码</li>
 </ul>
 <? }?>
 
</div>
<script language="javascript">
if(<?=$errnum?>==0){location.href="inf.php";document.getElementById("gaowei").style.display="none";}else{document.getElementById("gaowei").style.display="";document.getElementById("errnum").innerHTML=<?=$errnum?>;}
</script>
<!--结束判断高危--> 


</div>
<!--E-->

</div>
</div>
<? include("bottom.php");?>
</body>
</html>