<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[FCWuser]);
while0("*","fcw_hetong where (userid=".$userid." or zjuserid=".$userid.") and bh='".$bh."'");
if(!$row=mysql_fetch_array($res)){php_toheader("hetonglist.php");}

//B
if($_GET[control]=="add" && $_POST[yjcode]=="hetong"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $money2=$_POST[tmoney2];if(!is_numeric($money2)){$money2=0;}
 $mj=$_POST[tmj];if(!is_numeric($mj)){$mj=0;}

 updatetable("fcw_hetong",
			 "sj='".$sj."',
			 zt=0,
			 htbh='".sqlzhuru($_POST[thtbh])."',
			 jy='".sqlzhuru($_POST[tjy])."',
			 fadd='".sqlzhuru($_POST[tfadd])."',
			 money1=".$money1.",money2=".$money2.",
			 yzxm='".sqlzhuru($_POST[tyzxm])."',
			 yzmot='".sqlzhuru($_POST[tyzmot])."',
			 yztel='".sqlzhuru($_POST[tyztel])."',
			 yzsfz='".sqlzhuru($_POST[tyzsfz])."',
			 yzadd='".sqlzhuru($_POST[tyzadd])."',
			 fcz='".sqlzhuru($_POST[tfcz])."',
			 qyr='".sqlzhuru($_POST[tqyr])."',
			 yt='".sqlzhuru($_POST[tyt])."',
			 mj=".$mj.",
			 khxm='".sqlzhuru($_POST[tkhxm])."',
			 khmot='".sqlzhuru($_POST[tkhmot])."',
			 khtel='".sqlzhuru($_POST[tkhtel])."',
			 khadd='".sqlzhuru($_POST[tkhadd])."',
			 khsfz='".sqlzhuru($_POST[tkhsfz])."',
			 fjtk='".sqlzhuru($_POST[tfjtk])."',
			 bz='".sqlzhuru($_POST[tbz])."'
			 where bh='".$bh."'
			 ");
 php_toheader("hetong.php?bh=".$bh."&t=suc");
 
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
 if(document.f1.thtbh.value==""){alert("请输入合同编号");document.f1.thtbh.focus();return false;}
 layer.msg('正在处理', {icon: 16  ,time: 0,shade :0.25});
 f1.action="hetong.php?control=add&bh=<?=$bh?>";
}
</script>
</head>
<body>
<? include("../template/top.html");?>

<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 完善合同信息</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">

 <? include("rcap15.php");?>
 <? include("htmenu.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 document.getElementById("rmenu1").className="a1";
 </script>

 <? systs("恭喜您，操作成功!","hetong.php?bh=".$bh)?>

 <!--客户B-->
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="hetong" name="yjcode" />
 <div class="hetong">
  <ul class="u1">
  <li class="l1"><span class="red">*</span> 合同编号</li><li class="l2"><input type="text" name="thtbh" value="<?=$row[htbh]?>" /></li>
  <li class="l1">交易</li>
  <li class="l2">
  <select name="tjy" class="selinp">
  <? $arr=array("出售","出租");for($i=0;$i<count($arr);$i++){?>
  <option value="<?=$arr[$i]?>"<? if($row[jy]==$arr[$i]){?> selected="selected"<? }?>><?=$arr[$i]?></option>
  <? }?>
  </select>
  </li>
  <li class="l5">房源地址</li><li class="l6"><input type="text" name="tfadd" value="<?=$row[fadd]?>" /></li>
  <li class="l7">售价</li>
  <li class="l8"><input type="text" name="tmoney1" value="<?=returnjgdw($row[money1],"","")?>" /><span class="fd">元</span></li>
  <li class="l7">单价</li>
  <li class="l8"><input type="text" name="tmoney2" value="<?=returnjgdw($row[money2],"","")?>" /><span class="fd">元</span></li>
  </ul>
  <ul class="u2">
  <li class="l1">房产证号</li>
  <li class="l2"><input type="text" name="tfcz" value="<?=$row[fcz]?>" /></li>
  <li class="l1">签约日</li>
  <li class="l2"><input class="inp" name="tqyr" value="<?=dateYMD($row[qyr])?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd')" type="text"/></li>
  <li class="l1">用途</li>
  <li class="l2">
  <select name="tyt" class="selinp">
  <option value="0">未知</option>
  <? while1("*","fcw_wylx where ifuse='on' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <option value="<?=$row1[name1]?>" <? if($row1[name1]==$row[yt]){?> selected="selected"<? }?>><?=$row1[name2]?></option>
  <? }?>
  </select>
  </li>
  <li class="l1">面积</li>
  <li class="l2"><input type="text" name="tmj" value="<?=returnjgdw($row[mj],"","")?>" /><span class="fd">平</span></li>
  <li class="l1">签约人员</li><li class="l2"><input type="text" class="readony" readonly="readonly" value="<?=returnuname(returnuser($row[userid]))?>" /></li>
  <li class="l1">门店</li><li class="l2"><input type="text" class="readony" readonly="readonly" value="<?=returnzjgs($row[userid])?>" /></li>
  </ul>
  <ul class="u3">
  <li class="l1"><strong class="blue">业主姓名</strong></li>
  <li class="l2"><input type="text" name="tyzxm" value="<?=$row[yzxm]?>" /></li>
  <li class="l1">手机</li>
  <li class="l2"><input type="text" name="tyzmot" value="<?=$row[yzmot]?>" /></li>
  <li class="l1">业主电话</li>
  <li class="l2"><input type="text" name="tyztel" value="<?=$row[yztel]?>" /></li>
  <li class="l1">身份证</li>
  <li class="l2"><input type="text" name="tyzsfz" value="<?=$row[yzsfz]?>" /></li>
  <li class="l3">联系地址</li>
  <li class="l4"><input type="text" name="tyzadd" value="<?=$row[yzadd]?>" /></li>
  </ul>
  <ul class="u4">
  <li class="l1"><strong class="green">客户姓名</strong></li>
  <li class="l2"><input type="text" name="tkhxm" value="<?=$row[khxm]?>" /></li>
  <li class="l1">手机</li>
  <li class="l2"><input type="text" name="tkhmot" value="<?=$row[khmot]?>" /></li>
  <li class="l1">客户电话</li>
  <li class="l2"><input type="text" name="tkhtel" value="<?=$row[khtel]?>" /></li>
  <li class="l1">身份证</li>
  <li class="l2"><input type="text" name="tkhsfz" value="<?=$row[khsfz]?>" /></li>
  <li class="l3">联系地址</li>
  <li class="l4"><input type="text" name="tkhadd" value="<?=$row[khadd]?>" /></li>
  </ul>
  <ul class="u5">
  <li class="l1">附加条款</li><li class="l2"><textarea name="tfjtk"><?=$row[fjtk]?></textarea></li>
  </ul>
  <ul class="u5">
  <li class="l1">备注</li><li class="l2"><textarea name="tbz"><?=$row[bz]?></textarea></li>
  </ul>
  <div class="hetongtj"><input type="submit" class="tj" value="保存" /></div>
 </div>
 </form>
 <!--客户E-->

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>