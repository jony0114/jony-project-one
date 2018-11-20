<?
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
sesCheck();

if(4!=$_SESSION[FCWuserID]){Audit_alert("错误的路径来源！","inf4.php");}
$userid=returnuserid($_SESSION["FCWuser"]);

if(sqlzhuru($_POST[jvs])=="inf"){
 zwzr();
 $company=sqlzhuru($_POST[tcompany]);
 $uadd=sqlzhuru($_POST[tuadd]);
 $nc=sqlzhuru($_POST[tnc]);
 if(empty($company) || empty($uadd) || empty($nc)){Audit_alert("错误的路径来源！","inf4.php");}
 updatetable("fcw_user","
			 nc='".$nc."',
			 qq='".sqlzhuru($_POST[tqq])."',
			 utel='".sqlzhuru($_POST[tutel])."',
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 uadd='".$uadd."',
			 company='".$company."',
			 txt='".sqlzhuru($_POST[content])."' 
			 where uid='".$_SESSION[FCWuser]."'");
 uploadtpnodata(1,"upload/".$userid."/","shop.jpg","allpic",200,100,0,0,"no");
 updatetable("fcw_user","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2]).",uadd='".$uadd."' where zjuid='".$_SESSION["FCWuser"]."'");
 php_toheader("inf4.php?t=suc"); 
}

$sqluser="select * from fcw_user where uid='".$_SESSION[FCWuser]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$shoptx="../upload/".$userid."/shop.jpg";
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
<script type="text/javascript" charset="utf-8" src="../ckeditor/kindeditor.js"></script>
<script type="text/javascript">
KE.show({
id : 'content',
resizeMode : 1,
cssPath : '../ckeditor/examples/index.css',
items : [
'fontname', 'fontsize', 'textcolor', 'bgcolor', 'bold', 'italic', 'underline',
'removeformat', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
'insertunorderedlist']
});

function tj(){
 if((document.f1.tnc.value).replace("/\s/","")==""){alert("请输入联系人");document.f1.tnc.focus();return false;}
 if((document.f1.tuadd.value).replace("/\s/","")==""){alert("请输入中介地址");document.f1.tuadd.focus();return false;}
 if((document.f1.tcompany.value).replace("/\s/","")==""){alert("请输入中介名称");document.f1.tcompany.focus();return false;}
 tjwait();
 f1.action="inf4.php";
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 中介基本资料</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>
 <? systs("恭喜您，操作成功!","inf4.php")?>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="inf" name="jvs" />
 <ul class="uk">
 <li class="l1">用户帐号：</li>
 <li class="l21"><?=$_SESSION[FCWuser]?></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 联系人：</li>
 <li class="l2"><input type="text" class="inp" name="tnc" value="<?=$rowuser[nc]?>" /></li>
 <li class="l1">邮箱地址：</li>
 <li class="l21"><?=$rowuser["email"]?> <a href="emailbd.php" class="blue">[修改邮箱地址]</a></li>
 <li class="l1">手机号码：</li>
 <li class="l21"><?=$rowuser[mot]?> <a href="mobbd.php" class="blue">[修改手机号码]</a></li>
 <li class="l1">电话号码：</li>
 <li class="l2"><input type="text" class="inp" name="tutel" value="<?=$rowuser[utel]?>" /></li>
 <li class="l1">QQ号码：</li>
 <li class="l2"><input type="text" class="inp" name="tqq" value="<?=$rowuser[qq]?>" /></li>
 <li class="l1">所在区域：</li>
 <li class="l2">
 <div class="areaqy1">
 <select name="area1" id="area1" onchange="areacha(<?=$rowuser[areaid]?>)">
 <option value="0">未选择</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($rowuser[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="0" />
 <iframe name="fareas" id="fareas" height="30" width="300" border="0" frameborder="0" src="../config/areas.php?nid=<?=$rowuser[areaids]?>&id=<?=$rowuser[areaid]?>"></iframe>
 <? if($rowuser[areaid]==""){?>
 <script language="javascript">areacha(0);</script>
 <? }?>
 </div>
 </li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 门店地址：</li>
 <li class="l2"><input type="text" class="inp" size="50" name="tuadd" value="<?=$rowuser[uadd]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 中介名称：</li>
 <? if(1==$rowuser[yyzzrz]){?>
 <li class="l21"><strong><?=$rowuser[company]?></strong> [已通过实名认证]<input type="hidden" name="tcompany" value="<?=$rowuser[company]?>" /></li>
 <? }else{?>
 <li class="l2"><input type="text" class="inp" name="tcompany" value="<?=$rowuser[company]?>" /></li>
 <? }?>
 <li class="l1">中介图片：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25"> [最佳尺寸：200*100]</li>
 <? if(is_file($shoptx)){?>
 <li class="l5"></li>
 <li class="l6"><img src="<?=$shoptx?>" /></li>
 <? }?>
 <li class="l7">中介描述：</li>
 <li class="l8"><textarea id="content" name="content" style="width:100%;height:435px;visibility:hidden;"><?=$rowuser[txt]?></textarea></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("保存修改")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>