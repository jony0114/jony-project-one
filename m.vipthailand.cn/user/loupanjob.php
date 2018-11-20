<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("权限受限！","./");}
$userid=returnuserid($_SESSION[FCWuser]);
$bh=$_GET[bh];
if($rowcontrol[fklook]=="on"){$zt=0;}else{$zt=1;}
$mybh=$_GET[mybh];

//函数开始
if($_GET[control]=="update"){
 zwzr();
 updatetable("fcw_loupanjob","
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 dy='".sqlzhuru($_POST[tdy])."',
			 zt=".$zt.",
			 zprs='".sqlzhuru($_POST[tzprs])."',
			 mot='".sqlzhuru($_POST[tmot])."',
			 lxr='".sqlzhuru($_POST[tlxr])."' where bh='".$mybh."' and uid='".$_SESSION[FCWuser]."' and xqbh='".$bh."'");
 php_toheader("loupanjob.php?t=suc&mybh=".$mybh."&bh=".$bh);

}
//函数结果

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

<link href="../config/ueditor_mini/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">
<script src="../config/ueditor_mini/jquery-1.10.2.min.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor_mini/umeditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor_mini/umeditor.min.js"></script>
<script type="text/javascript" src="../config/ueditor_mini/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 楼盘管理</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",9,");?>
 <? include("loupantop.php");?>
 <? include("rcap6.php");?>
 <script language="javascript">
 document.getElementById("rcap9").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功![<a href='loupanjoblx.php?bh=".$bh."'>继续发布招聘</a>]","loupanjob.php?bh=".$bh."&mybh=".$_GET[mybh])?>
 
 <? 
 while0("*","fcw_loupanjob where bh='".$_GET[mybh]."' and xqbh='".$bh."' and uid='".$_SESSION[FCWuser]."'");
 if(!$row=mysql_fetch_array($res)){php_toheader("loupannewslist.php?bh=".$bh);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入招聘岗位");document.f1.ttit.focus();return false;}
 tjwait();
 f1.action="loupanjob.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 招聘岗位：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">薪资待遇：</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[dy]?>" class="inp" name="tdy" /> 留空表示面议</li>
 <li class="l1">招聘人数：</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[zprs]?>" class="inp" name="tzprs" /> 留空表示若干</li>
 <li class="l1">联系电话：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[mot]?>" class="inp" name="tmot" /></li>
 <li class="l1">联系人：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[lxr]?>" class="inp" name="tlxr" /></li>
 <li class="l7">详情：</li>
 <li class="l8"><script name="content" id="editor" type="text/plain" style="width:100%;height:380px;"><?=$row[txt]?></script></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步","loupanjoblist.php?bh=".$bh)?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
<script type="text/javascript">
//实例化编辑器
var ue = UM.getEditor('editor');
</script>
</body>
</html>