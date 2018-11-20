<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];

while0("*","fcw_jia_zx where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("zxlist.php");}
$tp="../upload/jia/".dateYMDN($row[sj])."/".$row[bh]."/home.jpg";

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0801,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $tyid=preg_split("/xcf/",sqlzhuru($_POST[d1]));
 clearstatcache();
 if(is_file($tp)){$iftp=1;}else{$iftp=0;}
 $txt=sqlzhuru($_POST[content]);
 $wdes=sqlzhuru($_POST[twdes]);if(empty($wdes)){$wdes=strgb2312(strip_tags($txt),0,220);}
 $tit=sqlzhuru($_POST[ttit]);
 $wkey=sqlzhuru($_POST[twkey]);if(empty($wkey)){$wkey=$tit;}
 updatetable("fcw_jia_zx","
			 type1id=".$tyid[0].",
			 type2id=".$tyid[1].",
			 tit='".$tit."',
			 txt='".$txt."',
			 djl=".sqlzhuru($_POST[tdjl]).",
			 lastsj='".sqlzhuru($_POST[tlastsj])."',
			 zze='".sqlzhuru($_POST[tzze])."',
			 ly='".sqlzhuru($_POST[tly])."',
			 lyurl='".sqlzhuru($_POST[tlyurl])."',
			 wkey='".$wkey."',
			 wdes='".$wdes."',
			 zt=".$_POST[Rzt].",
			 iftp=".$iftp." where bh='".$bh."'");
 uploadtpnodata(1,"upload/jia/".dateYMDN($row[sj])."/".$bh."/","home.jpg","allpic",140,140,0,0,"no");
 php_toheader("zx.php?t=suc&action=update&bh=".$bh);

}
//函数结果

$tp=returntppd($tp,"img/none100x100.gif");
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
 <? $leftid=3;include("menu_jia.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！[<a href='zxlx.php'>继续添加新信息</a>]","zx.php?bh=".$bh);}?>

 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">装修知识</a>
 <a href="zxlist.php">返回列表</a>
 </div> 

 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="zx.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 分组：</li>
 <li class="l2">
 <select name="d1" class="inp">
 <? while1("*","fcw_jia_zxtype where admin=1");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>xcf0"<? if($row1[id]==$row[type1id] && $row[type2id]==0){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[type1]?></option>
 <? while2("*","fcw_jia_zxtype where admin=2 and type1='".$row1[type1]."'");while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>xcf<?=$row2[id]?>"<? if($row1[id]==$row[type1id] && $row2[id]==$row[type2id]){?> selected="selected"<? }?>> - <?=$row2[type2]?></option>
 <? }?>
 <? }?>
 </select>
 </li>
 <li class="l1"><span class="red">*</span> 标题：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l1">作者：</li>
 <li class="l2"><input class="inp" name="tzze" value="<?=$row[zze]?>" size="10" type="text"/></li>
 <li class="l1">来源：</li>
 <li class="l2">
 <input class="inp" name="tly" value="<?=$row[ly]?>" size="10" type="text"/>
 <span class="fd">来源网址：</span><input class="inp" name="tlyurl" value="<?=$row[lyurl]?>" size="30" type="text"/>
 </li>
 <li class="l1">缩略图：</li>
 <li class="l2"><input type="file" name="inp1" class="inp1" id="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">最佳尺寸：140*140</span></li>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp?>" width="67" height="67" /></li>
 <li class="l10"><span class="red">*</span> 详细描述：</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:330px;"><?=$row[txt]?></script></li>
 <li class="l1">SEO关键词：</li>
 <li class="l2"><input type="text" value="<?=$row[wkey]?>" class="inp" size="70" name="twkey" /></li>
 <li class="l4">SEO描述：</li>
 <li class="l5"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">更新时间：</li>
 <li class="l2"><input class="inp" name="tlastsj" value="<?=$row[lastsj]?>" size="20" type="text"/><span class="fd">正确的时间格式如：2012-12-12 12:12:12</span></li>
 <li class="l1">点击率：</li>
 <li class="l2"><input class="inp" name="tdjl" value="<?=$row[djl]?>" size="10" type="text"/></li>
 <li class="l1">审核状态：</li>
 <li class="l2">
 <label><input name="Rzt" type="radio" value="0" <? if(0==$row[zt]){?>checked="checked"<? }?> /> <strong>正常展示</strong></label>
 <label><input name="Rzt" type="radio" value="1" <? if(1==$row[zt]){?>checked="checked"<? }?> /> <strong>正在审核</strong></label> 
 <label><input name="Rzt" type="radio" value="2" <? if(2==$row[zt]){?>checked="checked"<? }?> /> <strong>审核不通过</strong></label>
 </li>
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
</script>
</body>
</html>