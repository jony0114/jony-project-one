<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","fcw_jia_jc where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("jclist.php");}
$timestamp=time();
while1("*","fcw_admin where adminuid='".$_SESSION[FCWADMINSES]."'");$row1=mysql_fetch_array($res1);$adminpwd=$row1[adminpwd];

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $myty=preg_split("/xcf/",sqlzhuru($_POST[d1]));
 updatetable("fcw_jia_jc","
			 mytype1id=".$myty[0].",
			 mytype2id=".$myty[1].",
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 zt=".sqlzhuru($_POST[Rzt]).",
			 ifxj=".sqlzhuru($_POST[Rifxj]).",
			 mytj=".sqlzhuru($_POST[Rmytj]).",
			 money1=".$money1.",
			 buyurl='".sqlzhuru($_POST[tbuyurl])."' where bh='".$bh."'");
 uploadtp($bh,"家居建材",sqlzhuru($_POST[tuid]));
 php_toheader("jc.php?t=suc&action=update&bh=".$bh);

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

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu7").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0802,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_jia.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！[<a href='jclx.php'>继续添加宝贝</a>]","jc.php?bh=".$bh);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">建材信息</a>
 <a href="jclist.php">返回列表</a>
 </div> 
 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="jc.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 系统分组：</li>
 <li class="l21">
 <strong class="blue">
 <?=returnjcty(1,$row[type1id])." - ".returnjcty(2,$row[type2id])." - ".returnjcty(3,$row[type3id])?> [<a href="jclx.php?action=update&bh=<?=$bh?>">修改分组</a>]
 </strong> 
 </li>
 <li class="l1"><span class="red">*</span> 标题：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">售价：</li>
 <li class="l2"><input type="text" class="inp" name="tmoney1" size="5" value="<?=$row[money1]?>" /><span class="fd">元 (小提示：0或留空表示来电咨询)</span></li>
 <li class="l1">购买链接：</li>
 <li class="l2"><input type="text" class="inp" name="tbuyurl" size="70" value="<?=$row[buyurl]?>" /></li>
 <li class="l1">店内分组：</li>
 <li class="l2">
 <select name="d1" class="inp">
 <option value="0xcf0">选择商品归类</option>
 <? while1("*","fcw_jia_myjctype where uid='".$row[uid]."' and admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>xcf0"<? if($row1[id]==$row[mytype1id] && $row[mytype2id]==0){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[type1]?></option>
 <? while2("*","fcw_jia_myjctype where uid='".$row[uid]."' and admin=2 and type1='".$row1[type1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>xcf<?=$row2[id]?>"<? if($row1[id]==$row[mytype1id] && $row2[id]==$row[mytype2id]){?> selected="selected"<? }?>> - <?=$row2[type2]?></option>
 <? }?>
 <? }?>
 </select>
 </li>
 </ul>
 
 <!--效果图/详情B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">效果图/详情</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">效果图：</li>
 <li class="l2">
 <iframe style="float:left;" src="tpupload.php?admin=4&bh=<?=$bh?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 <span class="fd">可最多上传16张效果图</span>
 </li>
 </ul>
 <div class="xgtp">
  <div id="xgtp1" style="display:none;">正在处理</div>
  <div id="xgtp2"></div>
 </div>
 <!--效果图/详情E-->

 <ul class="uk">
 <li class="l10"><span class="red">*</span> 详细描述：</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 <li class="l1">上架/下架：</li>
 <li class="l2">
 <label><input name="Rifxj" type="radio" value="0" <? if(0==$row[ifxj]){?>checked="checked"<? }?> /> 上架</label>
 <label><input name="Rifxj" type="radio" value="1" <? if(1==$row[ifxj]){?>checked="checked"<? }?> /> 下架</label>
 </li>
 <li class="l1">橱窗推荐：</li>
 <li class="l2">
 <label><input name="Rmytj" type="radio" value="1"<? if(1==$row[mytj]){?> checked="checked"<? }?> /> 推荐</label>
 <label><input name="Rmytj" type="radio" value="0"<? if(0==$row[mytj]){?> checked="checked"<? }?> /> 普通展示</label>
 </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">发布会员：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /></li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>正常展示</strong></label>
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>正在审核</strong></label>
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /> <strong>审核不通过</strong></label>
 </li>
 </ul>
 <ul class="uk">
 <li class="l3"><input type="submit" value="下一步" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
//实例化编辑器
var ue = UE.getEditor('editor');

function xgtread(x){
 $.get("fangtp.php",{bh:x},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("fangtpdel.php",{id:x},function(result){
  xgtread("<?=$bh?>");
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread("<?=$bh?>");

</script>
</body>
</html>