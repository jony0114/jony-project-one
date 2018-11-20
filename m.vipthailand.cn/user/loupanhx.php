<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();

if(5!=$_SESSION[FCWuserID]){Audit_alert("权限受限！","./");}
$userid=returnuserid($_SESSION[FCWuser]);
$bh=$_GET[bh];
if($rowcontrol[fklook]=="on"){$zt=0;}else{$zt=1;}

//函数开始
if($_GET[control]=="update"){
 zwzr();
 $mbh=$_GET[mybh];
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $mj=$_POST[tmj];if(!is_numeric($mj)){$mj=0;}
 $hx1=$_POST[thx1];if(!is_numeric($hx1)){$hx1=0;}
 $hx2=$_POST[thx2];if(!is_numeric($hx2)){$hx2=0;}
 $hx3=$_POST[thx3];if(!is_numeric($hx3)){$hx3=0;}
 $hx4=$_POST[thx4];if(!is_numeric($hx4)){$hx4=0;}
 $hx5=$_POST[thx5];if(!is_numeric($hx5)){$hx5=0;}
 updatetable("fcw_huxing","tit='".sqlzhuru($_POST[ttit])."',mj=".$mj.",hx1=".$hx1.",hx2=".$hx2.",hx3=".$hx3.",hx4=".$hx4.",hx5=".$hx5.",cx=".$_POST[tcx].",zxqkid=".$_POST[tzxqkid].",fwlcid=".$_POST[tfwlcid].",money1=".$money1.",zt=".$zt.",vrurl='".sqlzhuru($_POST[tvrurl])."' where bh='".$mbh."' and uid='".$_SESSION[FCWuser]."'");
 uploadtpnodata(1,"upload/".$userid."/f/".$bh."/",$mbh.".jpg","allpic",600,0,210,160,"yes");
 php_toheader("loupanhx.php?t=suc&action=update&bh=".$bh."&mybh=".$mbh);
 
}
//函数结果

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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 楼盘管理</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",9,");?>
 <? include("loupantop.php");?>
 <? include("rcap6.php");?>
 <script language="javascript">
 document.getElementById("rcap3").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功!","loupanhx.php?action=".$_GET[action]."&bh=".$bh."&mybh=".$_GET[mybh])?>
 
 <? 
 while0("*","fcw_huxing where bh='".$_GET[mybh]."' and xqbh='".$bh."' and uid='".$_SESSION[FCWuser]."'");if(!$row=mysql_fetch_array($res)){php_toheader("loupanhxlist.php?bh=".$bh);};
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入户型标题名称");document.f1.ttit.focus();return false;}
 tjwait();
 f1.action="loupanhx.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 户型标题名称：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">面积：</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[mj]?>" class="inp" name="tmj" /> <span class="fd fd1">平米 (如不详请留空)</span></li>
 <li class="l1">价格：</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[money1]?>" class="inp" name="tmoney1" /> <span class="fd fd1">万 (如不详请留空)</span></li>
 <li class="l1">户型：</li>
 <li class="l2">
 <input name="thx1" value="<?=returnzdv($row[hx1])?>" class="inp" style="width:26px;" type="text" onfocus="inpf(this)" onblur="inpb(this)" /><span class="fd">室</span>
 <input name="thx2" value="<?=returnzdv($row[hx2])?>" class="inp" style="width:26px;" type="text" onfocus="inpf(this)" onblur="inpb(this)" /><span class="fd">厅</span>
 <input name="thx3" value="<?=returnzdv($row[hx3])?>" class="inp" style="width:26px;" type="text" onfocus="inpf(this)" onblur="inpb(this)" /><span class="fd">卫</span>
 <input name="thx4" value="<?=returnzdv($row[hx4])?>" class="inp" style="width:26px;" type="text" onfocus="inpf(this)" onblur="inpb(this)" /><span class="fd">厨</span>
 <input name="thx5" value="<?=returnzdv($row[hx5])?>" class="inp" style="width:26px;" type="text" onfocus="inpf(this)" onblur="inpb(this)" /><span class="fd">阳台</span>
 <span class="hui">(小提示：如果不清楚或没有，可以不填写)</span>
 </li>
 <li class="l1">户型情况：</li>
 <li class="l2">
 <select name="tcx">
 <option value="0">朝向未知</option>
 <? while3("*","fcw_fwcx order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <option value="<?=$row3[id]?>" <? if($row[cx]==$row3[id]){?> selected="selected"<? }?>><?=$row3[name1]?></option>
 <? }?>
 </select>
 <select name="tzxqkid">
 <option value="0">装修不详</option>
 <? while1("*","fcw_zxqk order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[zxqkid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tfwlcid">
 <option value="0">楼层不详</option>
 <? while1("*","fcw_fwlc order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[fwlcid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">户型图：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l5"></li>
 <li class="l6"><img src="<?=returntppd("../upload/".$userid."/f/".$bh."/".$row[bh]."-1.jpg","img/none100x100.gif")?>" width="100" height="100" /></li>
 <li class="l1">VR视频链接：</li>
 <li class="l2"><input type="text" class="inp" name="tvrurl" size="80" value="<?=$row[vrurl]?>" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("下一步","loupanhxlist.php?bh=".$bh)?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>