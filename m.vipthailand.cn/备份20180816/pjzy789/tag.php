<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$id=$_GET[id];
while0("*","fcw_tag where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("default.php");}

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $name1=sqlzhuru($_POST[tname1]);
 if(panduan("name1,admin","fcw_tag where name1='".$name1."' and id<>".$id." and admin=".$row[admin])==1){Audit_alert("标签已存在","tag.php?id=".$id);}
 updatetable("fcw_tag","
			 name1='".$name1."',
			 djl=".sqlzhuru($_POST[tdjl]).",
			 sj='".sqlzhuru($_POST[tsj])."',
			 zt=".$_POST[Rzt].",
			 ifjc=".$_POST[tifjc].",
			 titys='".sqlzhuru($_POST[ttitys])."'
			 where id=".$id);
 php_toheader("tag.php?t=suc&id=".$id);
}
//函数结果

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>

</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu5").className="l51";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_ad.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - 标签管理 - <strong><?=returntagv($row[admin])?></strong> - [<a href="taglist.php?admin=<?=$row[admin]?>">返回</a>]</li><li class="l2"></li>
 </ul>
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！[<a href='taglx.php?admin=".$row[admin]."'>继续添加新标签</a>]","tag.php?id=".$id);}?>
 <!--B-->
 <script language="javascript">
 function tj(){
 if((document.f1.tname1.value).replace(/\s/,"")==""){alert("请输入标签");document.f1.tname1.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 tjwait();
 f1.action="tag.php?id=<?=$id?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 标签：</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[name1]?>" class="inp" name="tname1" /></li>
 <li class="l1">是否加粗：</li>
 <li class="l2">
 <select name="tifjc">
 <option value="0">否</option>
 <option value="1"<? if(1==$row[ifjc]){?> selected="selected"<? }?>>是</option>
 </select>
 </li>
 <li class="l1">标题颜色：</li>
 <li class="l2">
 <select name="ttitys">
 <?
 $ysarr=array("#333","#ff6600","#9C02F8","#ff0000","#2C64B1","#07BF2E","#36ADC2");
 for($i=0;$i<count($ysarr);$i++){
 ?>
 <option style="background-color:<?=$ysarr[$i]?>;" value="<?=$ysarr[$i]?>"<? if($ysarr[$i]==$row[titys]){?> selected="selected"<? }?>><?=$ysarr[$i]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">更新时间：</li>
 <li class="l2"><input class="inp" name="tsj" value="<?=$row[sj]?>" size="20" type="text"/> 正确的时间格式如：2012-12-12 12:12:12</li>
 <li class="l1">点击率：</li>
 <li class="l2"><input class="inp" name="tdjl" value="<?=$row[djl]?>" size="10" type="text"/></li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <span class="finp">
 <input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /><strong>正常展示</strong> 
 <input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /><strong>正在审核</strong> 
 <input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /><strong>审核不通过</strong> 
 </span>
 </li>
 <li class="l3"><? tjbtnr("下一步","taglist.php?admin=".$row[admin])?></li>
 </ul>
 </form>


 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>