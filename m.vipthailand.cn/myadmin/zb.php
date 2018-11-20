<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();

$id=$_GET[id];
while0("*","fcw_jia_zb where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("zblist.php");}

if($_GET[control]=="update"){
 $t1=sqlzhuru($_POST[tlxr]);
 $t2=sqlzhuru($_POST[tmot]);
 updatetable("fcw_jia_zb","lxr='".$t1."',mot='".$t2."',areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2]).",ys='".sqlzhuru($_POST[tys])."',txt='".sqlzhuru($_POST[ttxt])."',zt=".sqlzhuru($_POST[Rzt])." where id=".$id);
 php_toheader("zb.php?t=suc&id=".$id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu7").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0802,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=4;include("menu_jia.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","zb.php?id=".$id);}?>

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">招标信息</a>
 <a href="zblist.php">返回列表</a>
 </div> 

 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="zb.php?id=<?=$id?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">申请时间：</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[sj]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">IP地址：</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[uip]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">联系人：</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[lxr]?>" class="inp" name="tlxr" /></li>
 <li class="l1">手机：</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[mot]?>" class="inp" name="tmot"/></li>
 <li class="l1">预算：</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[ys]?>" class="inp" name="tys"/></li>
 <li class="l1">所在区域：</li>
 <li class="l2">
 <div class="areaqy1">
 <select name="area1" id="area1" class="inp" onchange="areacha(<?=$row[areaid]?>)">
 <option value="0">未选择</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[py]." - ".$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="0" />
 <iframe name="fareas" id="fareas" height="50" width="300" border="0" frameborder="0" src="areas.php?nid=<?=$row[areaids]?>&id=<?=$row[areaid]?>"></iframe>
 <? if($row[areaid]==""){?>
 <script language="javascript">areacha(0);</script>
 <? }?>
 </div>
 </li>
 <li class="l4">描述：</li>
 <li class="l5"><textarea name="ttxt"><?=$row[txt]?></textarea></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">审核状态：</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>已派发</strong></label>
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>等待派发</strong></label>
 </li>
 <li class="l3"><input type="submit" value="下一步" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>