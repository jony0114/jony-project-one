<?
include("../config/conn.php");
include("../config/function.php");
include("../config/pinyin.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("权限受限！","./");}

//函数开始
if($_GET[control]=="add" && $_POST[jvs]=="loupan"){
 zwzr();
 $bh=time()."lp".returnuserid($_SESSION[FCWuser]);
 $sj=date("Y-m-d H:i:s");
 if(panduan("*","fcw_xq where xq='".sqlzhuru($_POST[t1])."' and zt<>99")==1){Audit_alert("楼盘名称已被使用，返回重试","loupanlx.php");}
 $PingYing = new GetPingYing();
 $pyall=$PingYing->getFirstPY(sqlzhuru($_POST[t1]));
 intotable("fcw_xq","bh,uid,sj,xq,py,pyall,areaid,areaids,admin,zt,djl,ifxj,xsxh","'".$bh."','".$_SESSION[FCWuser]."','".$sj."','".sqlzhuru($_POST[t1])."','".substr($pyall,0,1)."','".$pyall."',0,0,2,99,1,0,9999");
 php_toheader("loupaninf.php?bh=".$bh);
 
}elseif($_GET[control]=="update"){
 zwzr();
 $bh=$_GET[bh];
 if(panduan("*","fcw_xq where xq='".sqlzhuru($_POST[t1])."' and bh<>'".$bh."'")==1){Audit_alert("楼盘名称已被使用，返回重试","loupanlx.php?action=update&bh=".$bh);}
 $PingYing = new GetPingYing();
 $pyall=$PingYing->getFirstPY(sqlzhuru($_POST[t1]));
 updatetable("fcw_xq","xq='".sqlzhuru($_POST[t1])."',py='".substr($pyall,0,1)."',pyall='".$pyall."' where bh='".$bh."' and uid='".$_SESSION[FCWuser]."'");
 php_toheader("loupaninf.php?bh=".$bh);

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
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 编辑楼盘</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",9,");?>
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入楼盘名称！");document.f1.t1.focus();return false;}
 tjwait();
 f1.action="loupanlx.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1">楼盘名称：</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步","loupanlist.php")?></li>
 </ul>
 </form>
 <? 
 }elseif($_GET[action]=="update"){
 $bh=$_GET[bh];
 while0("*","fcw_xq where bh='".$bh."' and admin=2 and uid='".$_SESSION[FCWuser]."'");if(!$row=mysql_fetch_array($res)){php_toheader("loupanlist.php");}
 ?>
 <? include("rcap6.php");?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入楼盘名称！");document.f1.t1.focus();return false;}
 tjwait();
 f1.action="loupanlx.php?control=update&bh=<?=$bh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1">楼盘名称：</li>
 <li class="l2"><input type="text" value="<?=$row[xq]?>" class="inp" name="t1" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步","loupanlist.php")?></li>
 </ul>
 </form>
 
 <?
 }
 ?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>