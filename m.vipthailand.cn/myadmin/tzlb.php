<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0201,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $tit=sqlzhuru($_POST[ttit]);
 $tit1=sqlzhuru($_POST[ttit1]);
 $tp=$_FILES["inp2"]["name"];
 if(!empty($tp)){$b=preg_split("/\./",$tp);$tptype=$b[1];move_uploaded_file($_FILES["inp2"]['tmp_name'],"../upload/news/".$bh."/xz.".returnhz($tp));}else{$tptype=sqlzhuru($_POST[thz]);}
 updatetable("fcw_tzlb","
			 tit='".$tit."',
			 tit1='".$tit1."',
			 hz='".$tptype."',
			 djl=".sqlzhuru($_POST[tdjl]).",
			 lastsj='".sqlzhuru($_POST[tlastsj])."',
			 gs='".sqlzhuru($_POST[tgs])."',
			 yy='".sqlzhuru($_POST[tyy])."',
			 zt=".$_POST[Rzt]." where bh='".$bh."'");
 uploadtpnodata(1,"upload/news/".$bh."/","xgt.jpg","allpic",317,427,0,0,"no");
 php_toheader("tzlb.php?t=suc&action=update&bh=".$bh);

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
document.getElementById("menu3").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0202,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_news.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！[<a href='tzlblx.php'>继续添加新信息</a>]","tzlb.php?bh=".$bh);}?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">投资礼包信息</a>
 <a href="tzlblist.php">返回列表</a>
 </div> 

 <!--B-->
 <div class="rkuang">
 <? while0("*","fcw_tzlb where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("tzlblist.php");}?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="tzlb.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[hz]?>" name="thz" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 主标题：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l1"><span class="red">*</span> 副标题：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit1]?>" class="inp" name="ttit1" /></li>
 <li class="l1"><span class="red">*</span> 格式：</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[gs]?>" class="inp" name="tgs" /></li>
 <li class="l1"><span class="red">*</span> 语言：</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[yy]?>" class="inp" name="tyy" /></li>
 <li class="l1">效果图：</li>
 <li class="l2"><input type="file" class="inp1" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"> <span class="fd">最佳尺寸：317*427</span></li>
 <li class="l8"></li>
 <li class="l9"><img src="../upload/news/<?=$bh?>/xgt.jpg?t=<?=rnd_num(100)?>" width="54" height="54" /></li>
 <li class="l1">文件包：</li>
 <li class="l2"><input type="file" class="inp1" name="inp2" id="inp2" size="15"></li>
 <? $w="../upload/news/".$bh."/xz.".$row[hz];if(is_file($w)){?>
 <li class="l1"></li>
 <li class="l21"><a href="<?=$w?>" target="_blank">【点击下载】</a></li>
 <? }?>
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