<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $nc=sqlzhuru($_POST[tnc]);
 if(empty($nc)){Audit_alert("错误的路径来源！","user1.php");}
 $pwd=sqlzhuru($_POST[tpwd]);if(!empty($pwd)){$ses="pwd='".sha1($pwd)."',";}
 updatetable("fcw_user",$ses."
			 nc='".$nc."',
			 email='".sqlzhuru($_POST[temail])."',
			 ifemail=".$_GET[ife].",
			 mot='".sqlzhuru($_POST[tmot])."',
			 ifmot=".$_GET[ifm].",
			 utel='".sqlzhuru($_POST[tutel])."',
			 qq='".sqlzhuru($_POST[tqq])."',
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 sxnum=".sqlzhuru($_POST[tsxnum]).",
			 qx='".$_GET[qx]."',
			 userdj=".sqlzhuru($_POST[tuserdj]).",
			 userdjdq='".sqlzhuru($_POST[tuserdjdq])."' where id=".$id);
 uploadtpnodata(1,"upload/".$id."/","user.jpg","allpic",150,200,0,0,"no");
 php_toheader("user1.php?t=suc&id=".$id);

}
//函数结果
while0("*","fcw_user where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("userlist.php");}
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
function tj(){
 if((document.f1.tnc.value).replace("/\s/","")==""){alert("请输入联系人");document.f1.tnc.focus();return false;}
 c=document.getElementsByName("C1");str=",";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+",";}}
 c=document.getElementsByName("Cr2");if(c[0].checked){ife=1;}else{ife=0;}
 c=document.getElementsByName("Cr3");if(c[0].checked){ifm=1;}else{ifm=0;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="user1.php?control=update&id=<?=$id?>&qx="+str+"&ife="+ife+"&ifm="+ifm;
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu2").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_user.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","user1.php?id=".$id);}?>
 <? include("rightcap5.php");?>
 <script language="javascript">document.getElementById("rtit1").className="a1";</script>
 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">会员帐号：</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
 </li>
 <li class="l1">会员密码：</li>
 <li class="l2"><input type="text" size="20" class="inp" name="tpwd" /><span class="fd">留空表示不修改</span></li>
 <li class="l1"><span class="red">*</span> 联系人：</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[nc]?>" class="inp" name="tnc" /></li>
 <li class="l1">邮箱地址：</li>
 <li class="l2">
 <input type="text" size="20" value="<?=$row[email]?>" class="inp" name="temail" />
 <label style="margin-left:10px;"><input name="Cr2" type="checkbox" value="1"<? if(1==$row[ifemail]){?> checked="checked"<? }?>/> 绑定邮箱</label>
 </li>
 <li class="l1">手机号码：</li>
 <li class="l2">
 <input type="text" size="20" value="<?=$row[mot]?>" class="inp" name="tmot" />
 <label style="margin-left:10px;"><input name="Cr3" type="checkbox" value="1"<? if(1==$row[ifmot]){?> checked="checked"<? }?>/> 绑定手机</label>
 </li>
 <li class="l1">联系电话：</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[utel]?>" class="inp" name="tutel" /></li>
 <li class="l1">QQ号码：</li>
 <li class="l2"><input type="text" size="20" value="<?=$row[qq]?>" class="inp" name="tqq" /></li>
 <li class="l1">所在区域：</li>
 <li class="l2">
 <div class="areaqy1">
 <select name="area1" id="area1" onchange="areacha()" class="inp">
 <option value="0">不限制</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[py]." - ".$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="0" />
 <iframe name="fareas" id="fareas" height="50" width="150" border="0" frameborder="0" src="areas.php?nid=<?=$row[areaids]?>&id=<?=$row[areaid]?>"></iframe>
 <? if($row[areaid]==""){?>
 <script language="javascript">areacha();</script>
 <? }?>
 </div>
 </li>
 <li class="l1">个人头像：</li>
 <li class="l2"><input type="file" class="inp1" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../upload/<?=$id?>/user.jpg?t=<?=rnd_num(100)?>" width="54" height="54" /></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">权限：</li>
 <li class="l2">
 <label><input name="C2" type="checkbox" onclick="xuan()" /> 全选</label>
 <label><input name="C1" type="checkbox" value="2"<? if(strstr($row[qx],",2,")){?> checked="checked"<? }?>/> 管理出租</label>
 <label><input name="C1" type="checkbox" value="3"<? if(strstr($row[qx],",3,")){?> checked="checked"<? }?>/> 管理出售</label>
 <label><input name="C1" type="checkbox" value="4"<? if(strstr($row[qx],",4,")){?> checked="checked"<? }?>/> 管理求购</label> 
 <label><input name="C1" type="checkbox" value="5"<? if(strstr($row[qx],",5,")){?> checked="checked"<? }?>/> 管理求租</label> 
 </li>
 <li class="l1">剩余刷新量：</li>
 <li class="l2"><input class="inp" name="tsxnum" value="<?=returnjgdw($row[sxnum],"",0)?>" size="5" type="text"/></li>
 <li class="l1">会员等级：</li>
 <li class="l2">
 <select name="tuserdj" class="inp">
 <? while1("*","fcw_userdj order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[userdj]==$row1[id]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">等级到期：</li>
 <li class="l2"><input class="inp" name="tuserdjdq" value="<?=returnjgdw($row[userdjdq],"",$sj)?>" size="20" type="text"/><span class="fd">正确格式：<?=$sj?></span></li>
 <li class="l1">可用余额：</li>
 <li class="l2"><input class="inp redony" readonly="readonly" value="<?=$row[money1]?>" size="5" type="text"/><span class="fd">[<a href="usermoney.php?id=<?=$row[id]?>">改变金额</a>]</span></li>
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