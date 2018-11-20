<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];
$mybh=$_GET[mybh];

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $userid=returnuserid($_POST[tuid]);
 $hx1=$_POST[thx1];if(!is_numeric($hx1)){$hx1=0;}
 $hx2=$_POST[thx2];if(!is_numeric($hx2)){$hx2=0;}
 $hx3=$_POST[thx3];if(!is_numeric($hx3)){$hx3=0;}
 $hx4=$_POST[thx4];if(!is_numeric($hx4)){$hx4=0;}
 $hx5=$_POST[thx5];if(!is_numeric($hx5)){$hx5=0;}
 updatetable("fcw_tejia","mj=".sqlzhuru($_POST[tmj]).",mj1=".sqlzhuru($_POST[tmj1]).",yj='".sqlzhuru($_POST[tyj])."',zj='".sqlzhuru($_POST[tzj])."',hx1=".$hx1.",hx2=".$hx2.",hx3=".$hx3.",hx4=".$hx4.",hx5=".$hx5.",tj=".sqlzhuru($_POST[ttj]).",zj1=".sqlzhuru($_POST[tzj1]).",fh='".sqlzhuru($_POST[ttit])."',zt=".$_POST[Rzt].",txt='".sqlzhuru($_POST[ttxt])."' where bh='".$mybh."' and xqbh='".$bh."'");
 uploadtpone(1,"upload/".$userid."/f/".$bh."/",$mybh,$mybh,'特价',sqlzhuru($_POST[tuid]),600,0,250,160,0,0,"no");
 php_toheader("loupantj.php?t=suc&bh=".$bh."&mybh=".$mybh);
 
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

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！[<a href='loupantjlx.php?bh=".$bh."'>继续添加</a>]","loupantj.php?action=".$_GET[action]."&bh=".$bh."&mybh=".$mybh);}?>

 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit10").className="a1";</script>

 <!--B-->
 <div class="rkuang">
 <? while0("*","fcw_tejia where bh='".$_GET[mybh]."' and xqbh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("loupantjlist.php?bh=".$bh);}?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入房号信息");document.f1.ttit.focus();return false;}
 if((document.f1.tmj.value).replace(/\s/,"")=="" || isNaN(document.f1.tmj.value)){alert("请输入产权面积");document.f1.tmj.focus();return false;}
 if((document.f1.tmj1.value).replace(/\s/,"")=="" || isNaN(document.f1.tmj1.value)){alert("请输入套内面积");document.f1.tmj1.focus();return false;}
 if((document.f1.ttj.value).replace(/\s/,"")=="" || isNaN(document.f1.ttj.value)){alert("请输入特价");document.f1.ttj.focus();return false;}
 if((document.f1.tzj1.value).replace(/\s/,"")=="" || isNaN(document.f1.tzj1.value)){alert("请输入总价");document.f1.tzj1.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="loupantj.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 房号信息：</li>
 <li class="l2"><input type="text" size="50" class="inp" value="<?=$row[fh]?>" name="ttit" /> </li>
 <li class="l1"><span class="red">*</span> 产权面积：</li>
 <li class="l2"><input type="text" size="20" class="inp" value="<?=$row[mj]?>" name="tmj" /><span class="fd">平米</span></li>
 <li class="l1"><span class="red">*</span> 套内面积：</li>
 <li class="l2"><input type="text" size="20" class="inp" value="<?=$row[mj1]?>" name="tmj1" /><span class="fd">平米</span></li>
 <li class="l1">原价：</li>
 <li class="l2"><input type="text" size="20" class="inp" value="<?=$row[yj]?>" name="tyj" /><span class="fd">元/平米</span></li>
 <li class="l1">原总价：</li>
 <li class="l2"><input type="text" size="20" class="inp" value="<?=$row[zj]?>" name="tzj" /><span class="fd">万元</span></li>
 <li class="l1"><span class="red">*</span> 特价：</li>
 <li class="l2"><input type="text" size="20" class="inp" value="<?=$row[tj]?>" name="ttj" /><span class="fd">元/平米</span></li>
 <li class="l1"><span class="red">*</span> 特价总价：</li>
 <li class="l2"><input type="text" size="20" class="inp" value="<?=$row[zj1]?>" name="tzj1" /><span class="fd">万元</span></li>
 <li class="l1">户型图：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="<?=returntppd("../upload/".$userid."/f/".$bh."/".$row[bh]."-1.jpg","img/none100x100.gif")?>" width="65" height="65" /></li>
 <li class="l1">户型结构：</li>
 <li class="l2">
 <input name="thx1" class="inp" style="width:26px;" value="<?=$row[hx1]?>" type="text" /><span class="fd" style="margin-right:10px;">室</span>
 <input name="thx2" class="inp" style="width:26px;" value="<?=$row[hx2]?>" type="text" /><span class="fd" style="margin-right:10px;">厅</span> 
 <input name="thx3" class="inp" style="width:26px;" value="<?=$row[hx3]?>" type="text" /><span class="fd" style="margin-right:10px;">卫</span> 
 <input name="thx4" class="inp" style="width:26px;" value="<?=$row[hx4]?>" type="text" /><span class="fd" style="margin-right:10px;">厨</span> 
 <input name="thx5" class="inp" style="width:26px;" value="<?=$row[hx5]?>" type="text" /><span class="fd">阳台</span> 
 <span class="fd hui">(小提示：如果不清楚或没有，可以不填写)</span>
 </li>
 <li class="l1">备注：</li>
 <li class="l2"><input type="text" size="90" value="<?=$row[txt]?>" class="inp" name="ttxt" /> </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">楼盘会员：</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
 </li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>正常展示</strong></label>
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>正在审核</strong></label>
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /> <strong>审核不通过</strong></label>
 </li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>