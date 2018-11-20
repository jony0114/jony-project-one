<?
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
sesCheck();
$userid=returnuserid($_SESSION["FCWuser"]);

if($_POST[jvs]=="tx"){
 zwzr();
 uploadtpnodata(1,"upload/".$userid."/","user.jpg","allpic",150,200,0,0,"no");
 php_toheader("touxiang.php?t=suc"); 
}

$usertx="../upload/".$userid."/user.jpg";
if(!is_file($usertx)){$usertx="img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);}
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
function tj(){
tjwait();
f1.action="touxiang.php";
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 个人头像设置</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功!","touxiang.php")?>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="tx" name="jvs" />
 <ul class="uk">
 <li class="l1">选择图片：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25"> 最佳尺寸：150*200</li>
 <li class="l5"></li>
 <li class="l6"><img src="<?=$usertx?>" width="100" height="100" /></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("点击上传")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>