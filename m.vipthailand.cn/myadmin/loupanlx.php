<?php
include("../config/conn.php");
include("../config/function.php");
include("../config/pinyin.php");
AdminSes_audit();

//函数开始
if($_GET[control]=="add" && $_POST[jvs]=="loupan"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("权限不够","default.php");}
 $qx=",9,";
 while1("uid,usertype","fcw_user where uid='".sqlzhuru($_POST[tuid])."' and usertype=5 and qx like '%".$qx."%'");
 if(!$row1=mysql_fetch_array($res1)){Audit_alert("会员验证有误！","loupanlx.php");}
 zwzr();
 $bh=time()."lp".returnuserid($_POST[tuid]);
 $sj=date("Y-m-d H:i:s");
 if(panduan("xq","fcw_xq where xq='".sqlzhuru($_POST[txq])."' and zt<>99")==1){Audit_alert("楼盘名称已被使用，返回重试","loupanlx.php");}
 $PingYing = new GetPingYing();
 $pyall=$PingYing->getFirstPY(sqlzhuru($_POST[txq]));
 intotable("fcw_xq","bh,uid,sj,xq,py,pyall,areaid,areaids,admin,zt,djl,ifxj,xsxh","'".$bh."','".$_POST[tuid]."','".$sj."','".sqlzhuru($_POST[txq])."','".substr($pyall,0,1)."','".$pyall."',0,0,2,99,1,0,9999");
 php_toheader("loupaninf.php?bh=".$bh);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $bh=$_GET[bh];
 if(panduan("xq","fcw_xq where xq='".sqlzhuru($_POST[txq])."' and bh<>'".$bh."'")==1){Audit_alert("楼盘名称已被使用，返回重试","loupanlx.php?action=update&bh=".$bh);}
 $PingYing = new GetPingYing();
 $pyall=$PingYing->getFirstPY(sqlzhuru($_POST[txq]));
 updatetable("fcw_xq","xq='".sqlzhuru($_POST[txq])."',py='".substr($pyall,0,1)."',pyall='".$pyall."' where bh='".$bh."'");
 php_toheader("loupaninf.php?bh=".$_GET[bh]);

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
<script language="javascript">
function uidsel(){
document.f1.tuid.value=document.f1.d1.value;	
}
</script>
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

 <div class="rights">
 &nbsp;&nbsp;温馨提示：<br>&nbsp;&nbsp;楼盘与小区之间可相互转换，楼盘必须登记在房开公司性质的会员名下。
 </div>

 <!--B-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.txq.value).replace(/\s/,"")==""){alert("请输入楼盘名称！");document.f1.txq.focus();return false;}
 if(document.f1.tuid.value==""){alert("请输入会员帐号");document.f1.tuid.focus();return false;} 
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="loupanlx.php?control=add";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1">楼盘名称：</li>
 <li class="l2"><input type="text" class="inp" size="30" name="txq" /></li>
 <li class="l1">选择会员：</li>
 <li class="l2">
 <input name="tuid" size="30" type="text" class="inp" />
 <select name="d1" onchange="uidsel()" class="inp" style="margin-left:10px;">
 <option value="">最近使用</option>
 <? while1("uid,nc,adminczsj","fcw_user where usertype=5 order by adminczsj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[uid]?>"><?=$row1[uid]." ".$row1[nc]?></option>
 <? }?>
 </select>
 </li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 <? 
 }elseif($_GET[action]=="update"){
 $bh=$_GET[bh];
 while0("*","fcw_xq where bh='".$bh."' and admin=2");if(!$row=mysql_fetch_array($res)){php_toheader("loupanlist.php");}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.txq.value).replace(/\s/,"")==""){alert("请输入楼盘名称！");document.f1.txq.focus();return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="loupanlx.php?control=update&bh=<?=$bh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1">楼盘名称：</li>
 <li class="l2"><input type="text" class="inp" size="30" value="<?=$row[xq]?>" name="txq" /></li>
 <li class="l3"><input type="submit" value="保存修改" class="btn1" /></li>
 </ul>
 </form>
 <? }?>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>