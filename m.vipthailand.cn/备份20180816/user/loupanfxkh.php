<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[mybh];
$xqbh=$_GET[xqbh];

while0("*","fcw_loupanfxkh where bh='".$bh."' and xqbh='".$xqbh."' and (uid1='".$_SESSION[FCWuser]."' or uid2='".$_SESSION[FCWuser]."' or uid3='".$_SESSION[FCWuser]."')");
if(!$row=mysql_fetch_array($res)){Audit_alert("项目不存在或来源网址有误！","./");}

if($row[uid1]==$_SESSION[FCWuser]){$khsf=1;} //1表示录入者
if($row[uid2]==$_SESSION[FCWuser]){$khsf=2;} //2表示跟单经纪人
if($row[uid3]==$_SESSION[FCWuser]){$khsf=3;} //3表示跟单经理

if(sqlzhuru($_POST[jvs])=="fx"){
 zwzr();
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $ses="";
 if($khsf==2 || $khsf==3){
 $ses=$ses."jd=".sqlzhuru($_POST[Rjd]).",money1=".$money1.",";
 }
 if($khsf==3){
  $uid2=sqlzhuru($_POST[tuid2]);
  if(!empty($uid2)){
   if(panduan("uid,usertype","fcw_user where uid='".$uid2."' and usertype=2")==1){$ses=$ses."uid2='".$uid2."',";}
  }else{
  $ses=$ses."uid2='',";
  }
 }
 updatetable("fcw_loupanfxkh",$ses."
			 name1='".sqlzhuru($_POST[tname1])."',
			 mot='".sqlzhuru($_POST[tmot])."',
			 zt=0			 
			 where bh='".$bh."' and xqbh='".$xqbh."' and (uid1='".$_SESSION[FCWuser]."' or uid2='".$_SESSION[FCWuser]."' or uid3='".$_SESSION[FCWuser]."')");
 php_toheader("loupanfxkh.php?t=suc&mybh=".$bh."&xqbh=".$xqbh); 
}

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
<script language="javascript">
function tj(){
 if((document.f1.tname1.value).replace("/\s/","")==""){alert("请输入名称");document.f1.tname1.focus();return false;}
 if((document.f1.tmot.value).replace("/\s/","")==""){alert("请输入号码");document.f1.tmot.focus();return false;}
 tjwait();
 f1.action="loupanfxkh.php?mybh=<?=$bh?>&xqbh=<?=$xqbh?>";
}
function okmoneyc(x){
 if(2==x){document.getElementById("okmoney").style.display="";}else{document.getElementById("okmoney").style.display="none";}
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 楼盘分销客户管理</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap12.php");?>
 <script language="javascript">
 $("rcap2").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功!","loupanfxkh.php?mybh=".$bh."&xqbh=".$xqbh)?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="fx" name="jvs" />
 <ul class="uk">
 <li class="l1">分销楼盘：</li>
 <li class="l21"><?=returnxq($row[xqbh],"bh")?></li>
 <li class="l1">录入时间：</li>
 <li class="l21"><?=$row[sj]?></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 客户名称：</li>
 <li class="l2"><input type="text" class="inp" name="tname1" value="<?=$row[name1]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 联系电话：</li>
 <li class="l2"><input type="text" class="inp" name="tmot" value="<?=$row[mot]?>" /></li>
 <li class="l1">跟进进度：</li>
 
 <? if($khsf==2 || $khsf==3){?>
 <li class="l2">
 <strong class="finp">
 <input name="Rjd" type="radio" value="99" <? if(99==$row[jd]){?>checked="checked"<? }?> onclick="okmoneyc(99)" /> 新录入的客户 &nbsp;&nbsp;&nbsp;
 <input name="Rjd" type="radio" value="0" <? if(0==$row[jd]){?>checked="checked"<? }?> onclick="okmoneyc(0)" /> 前期电话沟通 &nbsp;&nbsp;&nbsp;
 <input name="Rjd" type="radio" value="1" <? if(1==$row[jd]){?>checked="checked"<? }?> onclick="okmoneyc(1)" /> 已看房，持续跟进中 &nbsp;&nbsp;&nbsp;
 <input name="Rjd" type="radio" value="2" <? if(2==$row[jd]){?>checked="checked"<? }?> onclick="okmoneyc(2)" /> 已签合同，成单 &nbsp;&nbsp;&nbsp;
 <input name="Rjd" type="radio" value="3" <? if(3==$row[jd]){?>checked="checked"<? }?> onclick="okmoneyc(3)" /> 客户放弃购买 &nbsp;&nbsp;&nbsp;
 </strong>
 </li>
 <? }else{?>
 <li class="l21"><?=returnfxjd($row[jd])?></li>
 <? }?>
 </ul>
 
 <ul class="uk" id="okmoney" style="display:none;">
 <li class="l1">成交金额：</li>
 <? if($khsf==2 || $khsf==3){?>
 <li class="l2">
 <input type="text" class="inp" name="tmoney1" size="10" value="<?=returnjgdw($row[money1],"",0)?>" />
 如果未成单，填入0即可
 </li>
 <? }else{?>
 <li class="l21"><?=returnjgdw($row[money1],"","暂未成单")?><input type="hidden" name="tmoney1" value="<?=returnjgdw($row[money1],"",0)?>" /></li>
 <? }?>
 </ul>

 <ul class="uk">
 <li class="l1">录入者：</li>
 <? while1("uid,uname,mot,qq","fcw_user where uid='".$row[uid1]."'");$row1=mysql_fetch_array($res1);?>
 <li class="l21"><strong><?=$row1[uname]?></strong> （联系电话：<?=$row1[mot]?>，QQ：<?=$row1[qq]?>）</li>
 
 <li class="l1">跟单经纪人：</li>
 <? while1("uid,uname,mot,qq","fcw_user where uid='".$row[uid2]."'");$row1=mysql_fetch_array($res1);?>
 <li class="l21"><strong><?=$row1[uname]?></strong> （联系电话：<?=$row1[mot]?>，QQ：<?=$row1[qq]?>）</li>
 <? if($khsf==3){?>
 <li class="l1">修改跟单经纪人：</li>
 <li class="l2"><input type="text" class="inp" name="tuid2" size="10" value="<?=$row[uid2]?>" /> 注：这里填入的是经纪人的帐号</li>
 <? }?>
 
 <li class="l1">项目经理：</li>
 <? while1("uid,uname,mot,qq","fcw_user where uid='".$row[uid3]."'");$row1=mysql_fetch_array($res1);?>
 <li class="l21"><strong><?=$row1[uname]?></strong> （联系电话：<?=$row1[mot]?>，QQ：<?=$row1[qq]?>）</li>
 
 <? if(2==$row[jd]){?>
 <li class="l1">佣金发放情况：</li>
 <li class="l21"><strong>
 <? if(1==$row[ifmoney]){?>
 <a href="loupanfxkhyj.php?bh=<?=$row[bh]?>" class="blue">佣金已发放</a>
 <? }else{?>
 <? if($khsf==3){?><a href="loupanfxkhyj.php?bh=<?=$row[bh]?>" class="red">佣金未发放，点击发放</a><? }else{?>佣金未发放<? }?>
 <? }?> 
 </strong></li>
 <? }?>

 <li class="l3"></li>
 <li class="l4"><? tjbtnr("保存修改","loupanfxkhlist.php")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
<script language="javascript">
okmoneyc(<?=$row[jd]?>);
</script>
</body>
</html>