<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];
$id=$_GET[id];

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("权限不够","default.php");}
 zwzr();
 if(empty($_POST[tsj])){$sj=date("Y-m-d H:i:s");}else{$sj=$_POST[tsj];}
 updatetable("fcw_loupanmsg","txt1='".sqlzhuru($_POST[ttxt1])."',txt2='".sqlzhuru($_POST[ttxt2])."',sj='".$sj."',zt=".$_POST[Rzt].",uname='".sqlzhuru($_POST[tuname])."',mot='".sqlzhuru($_POST[tmot])."' where id=".$id." and xqbh='".$bh."'");
 php_toheader("loupanmsg.php?t=suc&action=update&id=".$id."&bh=".$bh);

}
//函数结果

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
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0402,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_loupan.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","loupanmsg.php?action=".$_GET[action]."&bh=".$bh."&id=".$id);}?>
 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit8").className="a1";</script>
 <!--B-->
 <div class="rkuang">
 <?
 while0("*","fcw_loupanmsg where id=".$id." and xqbh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("loupanmsglist.php?bh=".$bh);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttxt1.value).replace(/\s/,"")==""){alert("请输入留言信息！");return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="loupanmsg.php?bh=<?=$bh?>&control=update&id=<?=$id?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1">留言会员：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="tmsguid" size="20" value="<?=$row[msguid]?>" /></li>
 <li class="l1">联 系 人：</li>
 <li class="l2"><input type="text" class="inp" name="tuname" size="20" value="<?=$row[uname]?>" /></li>
 <li class="l1">手机号码：</li>
 <li class="l2"><input type="text" class="inp" name="tmot" size="20" value="<?=$row[mot]?>" /></li>
 <li class="l1">留言时间：</li>
 <li class="l2"><input  name="tsj" value="<?=$row[sj]?>" size="20" type="text" class="inp" /><span class="fd">留空表示当前时间,手动填写正确时间格式为2014-12-12 12:12:12</span></li>
 <li class="l4">留言：</li>
 <li class="l5"><textarea name="ttxt1"><?=$row[txt1]?></textarea></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l4">回复：</li>
 <li class="l5"><textarea name="ttxt2"><?=$row[txt2]?></textarea></li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>正常展示</strong></label>
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>正在审核</strong></label>
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /> <strong>审核不通过</strong></label>
 </li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 <li class="l1"></li>
 <li class="l21">【<a href="loupanmsglist.php">或查看所有楼盘用户咨询</a>】</li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>