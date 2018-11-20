<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","fcw_daikuan where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("dklist.php");}

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0601,")){Audit_alert("权限不够","default.php");}
 zwzr();
 updatetable("fcw_daikuan","
			 zt=".$_POST[Rzt]." where bh='".$bh."'");
 php_toheader("dk.php?t=suc&bh=".$bh);

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
document.getElementById("menu6").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=3;include("menu_ad.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","dk.php?bh=".$bh);}?>

 <div class="bqu1">
 <a class="a1" href="javascript:void(0);">贷款管理</a>
 <a href="dklist.php">返回列表</a>
 </div>

 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="dk.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">贷款金额：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[dkje]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">贷款用途：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[dkyt]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">贷款期限：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[dkqx]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">真实姓名：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[zsxm]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">身份证号：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[sfzh]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">QQ号码：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[qqhm]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">学历：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[xl]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">婚姻状况：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[hyzk]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">职业：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[zy]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">手机号码：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[mot]?>" class="inp redony" readonly="readonly" /></li>
 <li class="l1">申请时间：</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[sj]?>" class="inp redony" readonly="readonly" /></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">受理情况：</li>
 <li class="l2">
 <span class="finp">
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /><strong>未受理</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /><strong>已经受理</strong></label> 
 </span>
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