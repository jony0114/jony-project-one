<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
while0("*","fcw_kehu where (userid=".$userid." or zjuserid=".$userid.") and bh='".$bh."'");
if(!$row=mysql_fetch_array($res)){php_toheader("kehulist.php");}

//B
if($_GET[control]=="add" && $_POST[yjcode]=="kehu"){
 zwzr();
 $sj=date("Y-m-d H:i:s");

 $hx1=$_POST[thx1];if(!is_numeric($hx1)){$hx1=0;}
 $hx2=$_POST[thx2];if(!is_numeric($hx2)){$hx2=0;}
 $hx3=$_POST[thx3];if(!is_numeric($hx3)){$hx3=0;}
 $hx4=$_POST[thx4];if(!is_numeric($hx4)){$hx4=0;}
 $mj1=$_POST[tmj1];if(!is_numeric($mj1)){$mj1=0;}
 $mj2=$_POST[tmj2];if(!is_numeric($mj2)){$mj2=0;}
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $money2=$_POST[tmoney2];if(!is_numeric($money2)){$money2=0;}

 updatetable("fcw_kehu",
			 "sj='".$sj."',
			 zt=0,
			 admin=1,
			 kh='".sqlzhuru($_POST[tkh])."',
			 lxr='".sqlzhuru($_POST[tlxr])."',
			 sfz='".sqlzhuru($_POST[tsfz])."',
			 xzz='".sqlzhuru($_POST[txzz])."',
			 mot='".sqlzhuru($_POST[tmot])."',
			 dj='".sqlzhuru($_POST[tdj])."',
			 yx='".sqlzhuru($_POST[tyx])."',
			 txt='".sqlzhuru($_POST[ttxt])."',
			 jy='".sqlzhuru($_POST[tjy])."',
			 jyzt='".sqlzhuru($_POST[tjyzt])."',
			 fadd='".sqlzhuru($_POST[tfadd])."',
			 hx1=".$hx1.",hx2=".$hx2.",hx3=".$hx3.",hx4=".$hx4.",
			 mj1=".$mj1.",mj2=".$mj2.",
			 wtsj='".sqlzhuru($_POST[twtsj])."',
			 money1=".$money1.",money2=".$money2.",
			 ly='".sqlzhuru($_POST[tly])."',
			 yt='".sqlzhuru($_POST[tyt])."',
			 lc='".sqlzhuru($_POST[tlc])."',
			 lx='".sqlzhuru($_POST[tlx])."',
			 cx=".sqlzhuru($_POST[tcx]).",
			 zx=".sqlzhuru($_POST[tzx]).",
			 fk='".sqlzhuru($_POST[tfk])."',
			 pt='".sqlzhuru($_POST[tpt])."',
			 fy='".sqlzhuru($_POST[tfy])."'
			 where bh='".$bh."'
			 ");
 php_toheader("kehu.php?bh=".$bh."&t=suc");
 
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
<link href="css/oa.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script type="text/javascript" src="js/adddate.js" ></script> 
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
 if(document.f1.tkh.value==""){alert("请输入客户名称");document.f1.tkh.focus();return false;}
 if(document.f1.tmot.value==""){alert("请输入手机号码");document.f1.tmot.focus();return false;}
 layer.msg('正在处理', {icon: 16  ,time: 0,shade :0.25});
 f1.action="kehu.php?control=add&bh=<?=$bh?>";
}
function jycha(){
a=document.f1.tjy.value;
if(a=="求购" || a=="出售"){d="万";}else{d="元";}
document.getElementById("jiage").innerHTML=d;
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 完善客户信息</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <? include("rcap14.php");?>
 <? include("khmenu.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 document.getElementById("rmenu1").className="a1";
 </script>
 <? systs("恭喜您，操作成功!","kehu.php?bh=".$bh)?>

 <!--客户B-->
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="kehu" name="yjcode" />
 <div class="kehu">
  <ul class="u1">
  <li class="l1"><span class="red">*</span> <strong>客户</strong></li><li class="l2"><input type="text" name="tkh" value="<?=$row[kh]?>" /></li>
  <li class="l1">联系人</li><li class="l2"><input type="text" name="tlxr" value="<?=$row[lxr]?>" /></li>
  <li class="l1"><span class="red">*</span> <strong>手机</strong></li><li class="l2"><input type="text" name="tmot" value="<?=$row[mot]?>" /></li>
  <li class="l1">身份证</li><li class="l2"><input type="text" name="tsfz" value="<?=$row[sfz]?>" /></li>
  <li class="l1">现住址</li><li class="l2"><input type="text" name="txzz" value="<?=$row[xzz]?>" /></li>
  <li class="l1">等级</li>
  <li class="l2">
  <select name="tdj" class="selinp">
  <? $arr=array("A","B","C","D","E");for($i=0;$i<count($arr);$i++){?>
  <option value="<?=$arr[$i]?>"<? if($row[dj]==$arr[$i]){?> selected="selected"<? }?>><?=$arr[$i]?></option>
  <? }?>
  </select>
  </li>
  <li class="l1">意向</li><li class="l2"><input type="text" name="tyx" value="<?=$row[yx]?>" /></li>
  <li class="l1">编号</li><li class="l2"><input type="text" readonly="readonly" class="readony" value="<?=$row[bh]?>" name="tbh" /></li>
  </ul>
  <ul class="u2">
  <li class="l1">备注</li><li class="l2"><textarea name="ttxt"><?=$row[txt]?></textarea></li>
  </ul>
  <ul class="u3">
  <li class="l1">交易</li>
  <li class="l2">
  <select name="tjy" onchange="jycha()" class="selinp">
  <? $arr=array("求购","求租","出售","出租");for($i=0;$i<count($arr);$i++){?>
  <option value="<?=$arr[$i]?>"<? if($row[jy]==$arr[$i]){?> selected="selected"<? }?>><?=$arr[$i]?></option>
  <? }?>
  </select>
  </li>
  <li class="l1">状态</li><li class="l2"><input type="text" name="tjyzt" value="<?=$row[jyzt]?>" /></li>
  <li class="l3">房源地址</li><li class="l4"><input type="text" name="tfadd" value="<?=$row[fadd]?>" /></li>
  <li class="l5">房型</li>
  <li class="l6">
  <input type="text" name="thx1" value="<?=returnjgdw($row[hx1],"","")?>" /><span class="fd">房</span>
  <input type="text" name="thx2" value="<?=returnjgdw($row[hx2],"","")?>" /><span class="fd">厅</span>
  <input type="text" name="thx3" value="<?=returnjgdw($row[hx3],"","")?>" /><span class="fd">卫</span>
  <input type="text" name="thx4" value="<?=returnjgdw($row[hx4],"","")?>" /><span class="fd">阳台</span>
  </li>
  <li class="l7">面积</li>
  <li class="l8">
  <input type="text" name="tmj1" value="<?=returnjgdw($row[mj1],"","")?>" /><span class="fd">-</span>
  <input type="text" name="tmj2" value="<?=returnjgdw($row[mj2],"","")?>" /><span class="fd">平米</span>
  </li>
  <li class="l9">委托</li>
  <li class="l10"><input class="inp" name="twtsj" value="<?=dateYMD($row[wtsj])?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd')" type="text"/></li>
  <li class="l7">价格</li>
  <li class="l8">
  <input type="text" name="tmoney1" value="<?=returnjgdw($row[money1],"","")?>" /><span class="fd">-</span>
  <input type="text" name="tmoney2" value="<?=returnjgdw($row[money2],"","")?>" /><span class="fd" id="jiage">万</span>
  </li>
  <li class="l9">来源</li>
  <li class="l10"><input type="text" name="tly" value="<?=$row[ly]?>" /></li>
  </ul>
  <ul class="u4">
  <li class="l1">用途</li>
  <li class="l2">
  <select name="tyt" class="selinp">
  <option value="0">未知</option>
  <? while1("*","fcw_wylx where ifuse='on' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <option value="<?=$row1[name1]?>" <? if($row1[name1]==$row[yt]){?> selected="selected"<? }?>><?=$row1[name2]?></option>
  <? }?>
  </select>
  </li>
  <li class="l1">楼层</li><li class="l2"><input type="text" name="tlc"  value="<?=$row[lc]?>" /></li>
  <li class="l1">类型</li><li class="l2"><input type="text" name="tlx" value="<?=$row[lx]?>" /></li>
  <li class="l1">朝向</li>
  <li class="l2">
  <select name="tcx" class="selinp">
  <option value="0">未知</option>
  <? while1("*","fcw_fwcx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <option value="<?=$row1[id]?>" <? if($row1[id]==$row[cx]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
  <? }?>
  </select>
  </li>
  <li class="l1">装修</li>
  <li class="l2">
  <select name="tzx" class="selinp">
  <option value="0">未知</option>
  <? while1("*","fcw_zxqk order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <option value="<?=$row1[id]?>" <? if($row1[id]==$row[zx]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
  <? }?>
  </select>
  </li>
  <li class="l1">付款</li><li class="l2"><input type="text" name="tfk" value="<?=$row[fk]?>" /></li>
  <li class="l1">配套</li><li class="l2"><input type="text" name="tpt" value="<?=$row[pt]?>" /></li>
  <li class="l1">付佣</li><li class="l2"><input type="text" name="tfy" value="<?=$row[fy]?>" /></li>
  <li class="l1">员工</li><li class="l2"><input type="text" class="readony" readonly="readonly" value="<?=returnuname(returnuser($row[userid]))?>" /></li>
  <li class="l1">门店</li><li class="l2"><input type="text" class="readony" readonly="readonly" value="<?=returnzjgs($row[userid])?>" /></li>
  </ul>
  <div class="kehutj"><input type="submit" class="tj" value="保存" /></div>
 </div>
 </form>
 <!--客户E-->

</div> 
<!--RE-->

</div>
<script language="javascript">
jycha();
</script>

<? include("../template/bottom.html");?>
</body>
</html>