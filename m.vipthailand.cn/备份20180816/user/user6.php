<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if(6!=$_SESSION[FCWuserID]){Audit_alert("错误的路径来源！","./");}

if($_GET[control]=="update"){
 zwzr();
 if(panduan("id,zjuid","fcw_user where zjuid='".$_SESSION[FCWuser]."' and id=".$_GET[id])==0){Audit_alert("权限出错","userlist6.php");}
 $pwd=sqlzhuru($_POST[tpwd]);if(!empty($pwd)){$ses="pwd='".sha1($pwd)."',";}
 updatetable("fcw_user",$ses."nc='".sqlzhuru($_POST[tnc])."',mot='".sqlzhuru($_POST[tmot])."',email='".sqlzhuru($_POST[temail])."',qq='".sqlzhuru($_POST[tqq])."'where zjuid='".$_SESSION[FCWuser]."' and id=".$_GET[id]);
 php_toheader("user6.php?t=suc&action=update&id=".$_GET[id]);

}elseif($_GET[control]=="have"){
 zwzr();
 $zh=sqlzhuru($_POST[tzh]);
 if(panduan("uid,pwd,usertype","fcw_user where uid='".$zh."' and pwd='".sha1($_POST[tmm])."' and usertype=7")==0){Audit_alert("身份核实有误，返回重试","user6.php");}
 updatetable("fcw_user","zjuid='".$_SESSION[FCWuser]."' where uid='".$zh."'");
 updatetable("fcw_jia_photo","zjuid='".$_SESSION[FCWuser]."' where uid='".$zh."'");
 php_toheader("userlist6.php");

}
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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 成员管理</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",7,");?>
 <? include("rcap11.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功!","user6.php?id=".$_GET[id]."&action=".$_GET[action])?>
 
 <? if($_GET[action]==""){?>
 <script language="javascript">
 function tj1(){
 if((document.f2.tzh.value).replace(/\s/,"")==""){alert("请输入会员账号！");document.f2.tzh.focus();return false;}
 if((document.f2.tmm.value).replace(/\s/,"")==""){alert("请输入密码！");document.f2.tmm.focus();return false;}
 tjwait();
 f2.action="user6.php?control=have";
 }
 </script>
 <form name="f2" method="post" onsubmit="return tj1()">
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 成员帐号：</li>
 <li class="l2"><input type="text" autocomplete="off" class="inp" disableautocomplete name="tzh" /> 请输入<span class="red">设计师会员性质</span>的账号</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 密码：</li>
 <li class="l2"><input type="text" class="inp" name="tmm" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("提交保存")?></li>
 </ul>
 </form>

 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_user where zjuid='".$_SESSION[FCWuser]."' and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("userlist6.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.tnc.value).replace(/\s/,"")==""){alert("请输入联系人！");document.f1.tnc.focus();return false;}
 if((document.f1.tmot.value).replace(/\s/,"")==""){alert("请输入联系电话！");document.f1.tmot.focus();return false;}
 tjwait();
 f1.action="user6.php?control=update&id=<?=$row[id]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">成员帐号：</li>
 <li class="l21"><?=$row[uid]?></li>
 <li class="l1">密码：</li>
 <li class="l2"><input type="text" class="inp" name="tpwd" /> 留空表示不修改</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 联系人：</li>
 <li class="l2"><input type="text" class="inp" name="tnc" value="<?=$row[nc]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 联系电话：</li>
 <li class="l2"><input type="text" class="inp" name="tmot" value="<?=$row[mot]?>" /></li>
 <li class="l1">常用邮箱：</li>
 <li class="l2"><input type="text" class="inp" name="temail" value="<?=$row[email]?>" /></li>
 <li class="l1">联系QQ：</li>
 <li class="l2"><input type="text" class="inp" name="tqq" value="<?=$row[qq]?>" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("提交保存")?></li>
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