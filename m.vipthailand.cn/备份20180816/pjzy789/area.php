<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/py.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");

//函数开始
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","fcw_area where admin=1 and name1='".sqlzhuru($_POST[t1])."'")==1){Audit_alert("该区域已存在！","area.php");}
 $py = new py_class();$pyall=$py -> str2py(sqlzhuru($_POST[t1]));$pyv=strtoupper(substr($pyall,0,1));
 intotable("fcw_area","name1,sj,xh,admin,py,zb,ifhot","'".sqlzhuru($_POST[t1])."','".$sj."',".sqlzhuru($_POST[t2]).",1,'".$pyv."','".sqlzhuru($_POST[t3])."',".sqlzhuru($_POST[R1])."");
 php_toheader("area.php?t=suc");
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","fcw_area where admin=1 and name1='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1){Audit_alert("该区域已存在！","area.php?action=update&id=".$_GET[id]);}
 updatetable("fcw_area","name1='".sqlzhuru($_POST[t1])."' where name1='".sqlzhuru($_POST[oldty1])."'");
 updatetable("fcw_area","sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",zb='".sqlzhuru($_POST[t3])."',py='".sqlzhuru(strtoupper($_POST[tpy]))."',ifhot=".sqlzhuru($_POST[R1])." where id=".$_GET[id]);
 php_toheader("area.php?t=suc&action=update&id=".$_GET[id]);

}
//函数结果

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
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","area.php?action=".$_GET[action]."&id=".$_GET[id]);}?>

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">区域信息</a>
 <a href="arealist.php">返回列表</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="area.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">区域名称：</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("fcw_area"," and admin=1")?>" /><span class="fd">序号越小，越靠前</span></li>
 <li class="l1">区域坐标：</li>
 <li class="l2">
 <input type="text" class="inp" name="t3" />
 <span class="fd">[<a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">点击获取</a>]</span>
 </li>
 <li class="l1">是否热门：</li>
 <li class="l2"><label><input type="radio" value="1" name="R1" checked="checked" /> 是</label><label><input type="radio" value="0" name="R1" /> 否</label></li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while0("*","fcw_area where id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("arealist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入名称！");document.f1.t1.focus();return false;}
 if((document.f1.tpy.value).replace(/\s/,"")==""){alert("请输入拼音首字母！");document.f1.tpy.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="area.php?control=update&id=<?=$row[id]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="<?=$row[name1]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">分类名称：</li>
 <li class="l2"><input type="text" value="<?=$row[name1]?>" class="inp" name="t1" /></li>
 <li class="l1">拼音首字母：</li>
 <li class="l2"><input type="text" value="<?=$row1[py]?>" class="inp" name="tpy" /></li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /><span class="fd">序号越小，越靠前</span></li>
 <li class="l1">区域坐标：</li>
 <li class="l2">
 <input type="text" class="inp" name="t3" value="<?=$row[zb]?>" />
 <span class="fd">[<a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">点击获取</a>]</span>
 </li>
 <li class="l1">是否热门：</li>
 <li class="l2">
 <label><input type="radio" value="1" name="R1"<? if(1==$row[ifhot]){?> checked="checked"<? }?> /> 是</label>
 <label><input type="radio" value="0" name="R1"<? if(empty($row[ifhot])){?> checked="checked"<? }?> /> 否</label>
 </li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 
 <? }?>
 </div>
 <!--end-->
 
</div>
</div>
<? include("bottom.php");?>
</body>
</html>