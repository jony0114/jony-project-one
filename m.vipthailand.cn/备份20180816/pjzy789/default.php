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
<title><?=webname?>����ϵͳ</title>
<link rel="stylesheet" href="layui/css/layui.css">
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="js/gx.js"></script>
<script language="javascript">
function retgx(){
if(confirm("����������ʧ�ܵ�����²��ύ����������ȷ����")){location.href="default.php?control=ret";}else{return false;}	
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
<a class="a1" href="default.php">ȫ�ֹ���</a>
</div>
  
<!--B-->
<div class="rkuang">

<!--��ʼ�жϸ�Σ-->
<div class="gaowei" id="gaowei" style="display:none;">
 <span class="gaocap">������վ����<strong id="errnum"></strong>����Σ©�����뾡���޸�������������ʧ</span>
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
 <li class="l1"><a href="http://www.yj99.cn/faq/view20.html" target="_blank">�޸�����</a></li>
 <li class="l2">�ļ��У�<strong><?=$dirarr[$i]?></strong> ���ڿ�ִ�нű�Ȩ��©�����б�ע�벢����ľ��ķ���</li>
 </ul>
 <? }}?>
  
 <?
 while1("*","fcw_admin where adminuid='".$_SESSION["FCWADMINSES"]."'");$row1=mysql_fetch_array($res1);
 if(strcmp("admin",$row1[adminuid])==0){$errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="adminlist.php">�����޸�</a></li>
 <li class="l2">�벻Ҫ����admin֮������ױ��µ����ַ���Ϊ����Ա�˺�</li>
 </ul>
 <? }?>
 
 <?
 if(strcmp(sha1("admin"),$row1[adminpwd])==0 || strcmp(sha1("123456"),$row1[adminpwd])==0 || strcmp(sha1("admin888"),$row1[adminpwd])==0){$errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="pwd.php">�����޸�</a></li>
 <li class="l2">�벻Ҫ����admin��123456��admin888֮������ױ��µ����ַ���Ϊ����</li>
 </ul>
 <? }?>
 
</div>
<script language="javascript">
if(<?=$errnum?>==0){location.href="inf.php";document.getElementById("gaowei").style.display="none";}else{document.getElementById("gaowei").style.display="";document.getElementById("errnum").innerHTML=<?=$errnum?>;}
</script>
<!--�����жϸ�Σ--> 


</div>
<!--E-->

</div>
</div>
<? include("bottom.php");?>
</body>
</html>