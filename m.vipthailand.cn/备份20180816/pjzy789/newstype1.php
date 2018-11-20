<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
//函数开始
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","fcw_newstype where admin=2 and name1='".sqlzhuru($_POST[t0])."' and name2='".sqlzhuru($_POST[t1])."'")==1){Audit_alert("该资讯分类已存在！","newstype1.php?ty1id=".$_GET[ty1id]);}
 intotable("fcw_newstype","name1,name2,sj,xh,admin,xswz,xstype","'".sqlzhuru($_POST[t0])."','".sqlzhuru($_POST[t1])."','".$sj."',".sqlzhuru($_POST[t2]).",2,'".$_GET[xs]."','".sqlzhuru($_POST[R1])."'");
 php_toheader("newstype1.php?t=suc&ty1id=".$_GET[ty1id]);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(panduan("*","fcw_newstype where admin=2 and name1='".sqlzhuru($_POST[t0])."' and name2='".sqlzhuru($_POST[t1])."' and id<>".$_GET[id])==1){Audit_alert("该资讯分类已存在！","newstype1.php?action=update&id=".$_GET[id]."&ty1id=".$_GET[ty1id]);}
 updatetable("fcw_newstype","name2='".sqlzhuru($_POST[t1])."',sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",xstype='".sqlzhuru($_POST[R1])."',xswz='".$_GET[xs]."' where id=".$_GET[id]);
 php_toheader("newstype1.php?t=suc&action=update&id=".$_GET[id]."&ty1id=".$_GET[ty1id]);

}
//函数结果

while0("*","fcw_newstype where id=".$_GET[ty1id]);$row=mysql_fetch_array($res);

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
 <? $leftid=4;include("menu_quan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","newstype1.php?action=".$_GET[action]."&ty1id=".$_GET[ty1id]."&id=".$_GET[id]);}?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">资讯分类</a>
 <a href="newstypelist.php">返回列表</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入资讯分类名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 c=document.getElementsByName("C1");
 str="xcf";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+"xcf";}
 }
 layer.msg('正在验证', {icon: 16  ,time: 0,shade :0.25});
 f1.action="newstype1.php?control=add&ty1id=<?=$_GET[ty1id]?>&xs="+str;
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">大分类：</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$row[name1]?>" name="t0" readonly="readonly" /></li>
 <li class="l1">小分类：</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("fcw_newstype"," and admin=2 and name1='".$row[name1]."'")?>" /> <span class="fd">序号越小，越靠前</span></li>
 <li class="l1">显示方式：</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="font" checked="checked" /> 文字列表</label>
 <label><input name="R1" type="radio" value="pic" /> 图片列表</label>
 </li>
 </li>
 <li class="l1">显示位置：</li>
 <li class="l2">
 <label><input name="C1" type="checkbox" value="首页" /> 首页</label>
 <label><input name="C1" type="checkbox" value="小区" /> 小区</label>
 <label><input name="C1" type="checkbox" value="出租" /> 出租</label>
 <label><input name="C1" type="checkbox" value="出售" /> 出售</label>
 <label><input name="C1" type="checkbox" value="求租" /> 求租</label>
 <label><input name="C1" type="checkbox" value="求购" /> 求购</label>
 <label><input name="C1" type="checkbox" value="经纪人" /> 经纪人</label>
 <label><input name="C1" type="checkbox" value="中介" /> 中介</label>
 <label><input name="C1" type="checkbox" value="家居" /> 家居</label>
 </li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 while1("*","fcw_newstype where id=".$_GET[id]);if(!$row1=mysql_fetch_array($res1)){php_toheader("newstypelist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("请输入资讯分类名称！");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("请输入有效的排序号！");document.f1.t2.focus();return false;}
 c=document.getElementsByName("C1");
 str="xcf";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+"xcf";}
 }
 layer.msg('正在验证', {icon: 16  ,time: 0,shade :0.25});
 f1.action="newstype1.php?control=update&id=<?=$row1[id]?>&ty1id=<?=$_GET[ty1id]?>&xs="+str;
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="<?=$row[name1]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">大名称：</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$row[name1]?>" name="t0" readonly="readonly" /></li>
 <li class="l1">小分类：</li>
 <li class="l2"><input type="text" value="<?=$row1[name2]?>" class="inp" name="t1" /></li>
 <li class="l1">排序：</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row1[xh]?>" /> <span class="fd">序号越小，越靠前</span></li>
 <li class="l1">显示方式：</li>
 <li class="l2">
 <label><input name="R1" type="radio" value="font" <? if($row1[xstype]=="font"){?> checked="checked"<? }?> /> 文字列表</label>
 <label><input name="R1" type="radio" value="pic" <? if($row1[xstype]=="pic"){?> checked="checked"<? }?> /> 图片列表</label>
 </li>
 <li class="l1">显示位置：</li>
 <li class="l2">
 <label><input name="C1" type="checkbox" value="首页" <? if(check_in("xcf首页",$row1[xswz])){?>checked="checked"<? }?> /> 首页</label>
 <label><input name="C1" type="checkbox" value="小区" <? if(check_in("xcf小区",$row1[xswz])){?>checked="checked"<? }?> /> 小区</label>
 <label><input name="C1" type="checkbox" value="出租" <? if(check_in("xcf出租",$row1[xswz])){?>checked="checked"<? }?> /> 出租</label>
 <label><input name="C1" type="checkbox" value="出售" <? if(check_in("xcf出售",$row1[xswz])){?>checked="checked"<? }?> /> 出售</label>
 <label><input name="C1" type="checkbox" value="求租" <? if(check_in("xcf求租",$row1[xswz])){?>checked="checked"<? }?> /> 求租</label>
 <label><input name="C1" type="checkbox" value="求购" <? if(check_in("xcf求购",$row1[xswz])){?>checked="checked"<? }?> /> 求购</label>
 <label><input name="C1" type="checkbox" value="经纪人" <? if(check_in("xcf经纪人",$row1[xswz])){?>checked="checked"<? }?> /> 经纪人</label>
 <label><input name="C1" type="checkbox" value="中介" <? if(check_in("xcf中介",$row1[xswz])){?>checked="checked"<? }?> /> 中介</label>
 <label><input name="C1" type="checkbox" value="家居" <? if(check_in("xcf家居",$row1[xswz])){?>checked="checked"<? }?> /> 家居</label>
 </li>
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