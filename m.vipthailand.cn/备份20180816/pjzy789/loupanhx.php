<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $userid=returnuserid($_POST[tuid]);
 $mbh=$_GET[mybh];
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $mj=$_POST[tmj];if(!is_numeric($mj)){$mj=0;}
 $hx1=$_POST[thx1];if(!is_numeric($hx1)){$hx1=0;}
 $hx2=$_POST[thx2];if(!is_numeric($hx2)){$hx2=0;}
 $hx3=$_POST[thx3];if(!is_numeric($hx3)){$hx3=0;}
 $hx4=$_POST[thx4];if(!is_numeric($hx4)){$hx4=0;}
 $hx5=$_POST[thx5];if(!is_numeric($hx5)){$hx5=0;}
 updatetable("fcw_huxing","tit='".sqlzhuru($_POST[ttit])."',zt=".$_POST[Rzt].",xh=".intval($_POST[txh])." where bh='".$mbh."' and xqbh='".$bh."'");
 uploadtpnodata(1,"upload/".$userid."/f/".$bh."/",$mbh.".jpg","allpic",800,0,400,550,"no");
 php_toheader("loupanhx.php?t=suc&action=update&bh=".$bh."&mybh=".$mbh);
 
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

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","loupanhx.php?bh=".$bh."&mybh=".$_GET[mybh]);}?>

 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit3").className="a1";</script>
 <? while0("*","fcw_huxing where bh='".$_GET[mybh]."' and xqbh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("loupanhxlist.php?bh=".$bh);}?>
 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入户型标题名称");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="loupanhx.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 户型标题名称：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1"><span class="red">*</span> 排序：</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[xh]?>" class="inp" name="txh" /> <span class="fd">越小越靠前</span></li>
 <li class="l1">户型图：</li>
 <li class="l2"><input type="file" name="inp1" class="inp1" id="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"> 最佳尺寸：400*550</li>
 <li class="l8"></li>
 <li class="l9"><img src="<?=returntppd("../upload/".$userid."/f/".$bh."/".$row[bh]."-1.jpg","img/none100x100.gif")?>" width="65" height="65" /></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">发布会员：</li>
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