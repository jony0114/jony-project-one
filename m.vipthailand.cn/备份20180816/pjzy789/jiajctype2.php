<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$ty1id=$_GET[ty1id];

//函数开始
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","fcw_jia_jctype where admin=2 and type1='".sqlzhuru($_POST[t0])."' and type2='".sqlzhuru($_POST[t1])."'")==1)
 {Audit_alert("该分组已存在！","jiajctype2.php?ty1id=".$ty1id);}
 intotable("fcw_jia_jctype","admin,type1,type2,xh,sj","2,'".sqlzhuru($_POST[t0])."','".sqlzhuru($_POST[t1])."',".sqlzhuru($_POST[t2]).",'".$sj."'");
 php_toheader("jiajctype2.php?t=suc&ty1id=".$ty1id);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","fcw_jia_jctype where admin=2 and type1='".sqlzhuru($_POST[t0])."' and type2='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1)
 {Audit_alert("该分组已存在！","jiajctype2.php?action=update&id=".$_GET[id]."&ty1id=".$ty1id);}
 updatetable("fcw_jia_jctype","type2='".sqlzhuru($_POST[t1])."' where type1='".sqlzhuru($_POST[oldty1])."' and type2='".sqlzhuru($_POST[oldty2])."'");
 updatetable("fcw_jia_jctype","sj='".$sj."',xh=".sqlzhuru($_POST[t2])." where id=".$_GET[id]);
 php_toheader("jiajctype2.php?t=suc&action=update&id=".$_GET[id]."&ty1id=".$ty1id);

}
//函数结果

while0("*","fcw_jia_jctype where id=".$ty1id);if(!$row=mysql_fetch_array($res)){php_toheader("jiajctypelist.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理后台</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=3;include("menu_quan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","jiajctype2.php?action=".$_GET[action]."&ty1id=".$ty1id."&id=".$_GET[id]);}?>

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">家居建材分组</a>
 <a href="jiajctypelist.php">返回列表</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="jiajctype2.php?control=add&ty1id=<?=$ty1id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">父类名称：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t0" value="<?=$row[type1]?>" /></li>
 <li class="l1">子类名称：</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("fcw_jia_jctype"," and type1='".$row[type1]."' and admin=2")?>" /> <span class="fd">序号越小，越靠前</span></li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_jia_jctype where admin=2 and id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("jiajctypelist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="jiajctype2.php?control=update&id=<?=$row[id]?>&ty1id=<?=$ty1id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="<?=$row[type1]?>" name="oldty1" />
 <input type="hidden" value="<?=$row[type2]?>" name="oldty2" />
 <ul class="uk">
 <li class="l1">父类名称：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="t0" value="<?=$row[type1]?>" /></li>
 <li class="l1">分类名称：</li>
 <li class="l2"><input type="text" value="<?=$row[type2]?>" class="inp" name="t1" /></li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">序号越小，越靠前</span></li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 
 <? }?>
 </div>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>