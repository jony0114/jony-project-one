<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(3!=$_SESSION[FCWuserID]){Audit_alert("权限受限！","./");}
$sj=date("Y-m-d H:i:s");
$ty1id=$_GET[ty1id];
//函数开始
if($_GET[control]=="add"){
 zwzr();
 if(panduan("*","fcw_jia_myjctype where admin=2 and type1='".sqlzhuru($_POST[t0])."' and type2='".sqlzhuru($_POST[t1])."' and uid='".$_SESSION[FCWuser]."'")==1){Audit_alert("该分类已存在！","jctype2.php?ty1id=".$ty1id);}
 intotable("fcw_jia_myjctype","uid,admin,type1,type2,xh,sj","'".$_SESSION[FCWuser]."',2,'".sqlzhuru($_POST[t0])."','".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[t2]).",'".$sj."'");
 php_toheader("jctype2.php?t=suc&ty1id=".$ty1id);
 
}elseif($_GET[control]=="update"){
 zwzr();
 if(panduan("*","fcw_jia_myjctype where admin=2 and type1='".sqlzhuru($_POST[t0])."' and type2='".sqlzhuru($_POST[t1])."' and uid='".$_SESSION[FCWuser]."' and id<>".$_GET[myid])==1){Audit_alert("该分类已存在！","jctype2.php?action=update&myid=".$_GET[myid]."&ty1id=".$ty1id);}
 updatetable("fcw_jia_myjctype","sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",type2='".sqlzhuru($_POST[t1])."' where uid='".$_SESSION[FCWuser]."' and id=".$_GET[myid]);
 php_toheader("jctype2.php?t=suc&action=update&myid=".$_GET[myid]."&ty1id=".$ty1id);

}
//函数结果

while0("*","fcw_jia_myjctype where uid='".$_SESSION[FCWuser]."' and id=".$ty1id);if(!$row=mysql_fetch_array($res)){php_toheader("jctypelist.php");}

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
<script language="javascript" src="js/index.js"></script></head>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 宝贝分类</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",10,");?>
 <? include("rcap13.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功!","jctype2.php?ty1id=".$ty1id."&myid=".$_GET[myid]."&action=".$_GET[action])?>
 
 <? if($_GET[action]==""){?>
 <form name="f1" method="post" onsubmit="return tj()">
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="jctype2.php?control=add&ty1id=<?=$ty1id?>";
 }
 </script>
 <ul class="uk">
 <li class="l1">父类名称：</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$row[type1]?>" name="t0" readonly="readonly" size="20" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 子类名称：</li>
 <li class="l2"><input type="text" class="inp" name="t1" size="20" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 排列序号：</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("fcw_jia_myjctype"," and admin=2 and type1='".$row[type1]."' and uid='".$_SESSION[FCWuser]."'")?>" size="5" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步","jctypelist.php")?></li>
 </ul>
 </form>
 <? 
 }elseif($_GET[action]=="update"){
 while1("*","fcw_jia_myjctype where uid='".$_SESSION[FCWuser]."' and admin=2 and id=".$_GET[myid]);if(!$row1=mysql_fetch_array($res1)){php_toheader("jctypelist.php");}
 ?>
 <form name="f1" method="post" onsubmit="return tj()">
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 tjwait();
 f1.action="jctype2.php?control=update&myid=<?=$_GET[myid]?>&ty1id=<?=$ty1id?>";
 }
 </script>
 <ul class="uk">
 <li class="l1">父类名称：</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$row1[type1]?>" name="t0" readonly="readonly" size="20" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 分类名称：</li>
 <li class="l2"><input type="text" class="inp" name="t1" value="<?=$row1[type2]?>" size="20" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 排列序号：</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row1[xh]?>" size="5" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步","jctypelist.php")?></li>
 </ul>
 </form>
 <? }?>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>