<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];
$mybh=$_GET[mybh];

//函数开始
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $ifjc=$_POST[tifjc];if(!is_numeric($ifjc)){$ifjc=0;}
 $u="";
 $userid=returnuserid($_POST[tuid]);
 if(1==intval($_POST[d1])){$u=$_POST[t2];}else{$u=inp_tp_upload(1,"../upload/".$userid."/f/".$bh."/",$mybh);}
 if($u!=""){$ses=",url='".$u."'";}
 if(1==intval($_POST[d2])){updatetable("fcw_xqvideo","iftj=0 where xqbh='".$bh."'");}
 if(1==sqlzhuru($_POST[Rindextj])){updatetable("fcw_xqvideo","indextj=0 where indextj=1");}
 updatetable("fcw_xqvideo","tit='".sqlzhuru($_POST[ttit])."'".$ses.",iftj=".$_POST[d2].",admin=".$_POST[d1].",ifjc=".$ifjc.",titys='".sqlzhuru($_POST[ttitys])."',zt=".$_POST[Rzt].",indextj=".sqlzhuru($_POST[Rindextj])." where bh='".$mybh."' and xqbh='".$bh."'");
 uploadtpnodata(2,"upload/".$userid."/f/".$bh."/",$mybh.".jpg","allpic",140,84,0,0,"no");
 php_toheader("loupanvideo.php?t=suc&action=update&mybh=".$mybh."&bh=".$bh);

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
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0402,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_loupan.php");?>

<div class="right">
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！[<a href='loupanvideolx.php?bh=".$bh."'>继续添加新视频</a>]","loupanvideo.php?bh=".$bh."&mybh=".$mybh);}?>
 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit6").className="a1";</script>

 <!--B-->
 <div class="rkuang">
 <? while0("*","fcw_xqvideo where bh='".$_GET[mybh]."' and xqbh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("loupanvideolist.php?bh=".$bh);}?>
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入标题");document.f1.ttit.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="loupanvideo.php?bh=<?=$bh?>&control=update&mybh=<?=$row[bh]?>";
 }
 
 function infcha(){
 d=parseInt(document.f1.d1.value);
 document.getElementById("infout").style.display="none";
 document.getElementById("infmy").style.display="none";
 if(d==1){document.getElementById("infout").style.display="";}
 else if(d==2){document.getElementById("infmy").style.display="";}
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red">*</span> 标题：</li>
 <li class="l2"><input type="text" size="50" value="<?=$row[tit]?>" class="inp" name="ttit" /> </li>
 <li class="l1">视频截图：</li>
 <li class="l2"><input type="file" name="inp2" class="inp1" id="inp2" size="25"><span class="fd">最佳尺寸：140*84</span></li>
 <li class="l8"></li>
 <li class="l9"><img src="<?="../upload/".$userid."/f/".$row[xqbh]."/".$row[bh].".jpg"?>" width="108" height="65" /></li>
 <li class="l1">是否加粗：</li>
 <li class="l2">
 <select name="tifjc" class="inp">
 <option value="0">否</option>
 <option value="1"<? if(1==$row[ifjc]){?> selected="selected"<? }?>>是</option>
 </select>
 </li>
 <li class="l1">标题颜色：</li>
 <li class="l2">
 <select name="ttitys" class="inp">
 <?
 $ysarr=array("#333","#ff6600","#9C02F8","#ff0000","#2C64B1","#07BF2E","#36ADC2");
 for($i=0;$i<count($ysarr);$i++){
 ?>
 <option style="background-color:<?=$ysarr[$i]?>;" value="<?=$ysarr[$i]?>"<? if($ysarr[$i]==$row[titys]){?> selected="selected"<? }?>><?=$ysarr[$i]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">推荐：</li>
 <li class="l2">
 <select name="d2" class="inp">
 <option value="1">推荐，即在该楼盘主页能看到</option>
 <option value="0"<? if(0==$row[iftj]){?> selected="selected"<? }?>>不推荐</option>
 </select>
 </li>
 <li class="l1">来路：</li>
 <li class="l2">
 <select name="d1" onchange="infcha()" class="inp">
 <option value="1">外部视频地址</option>
 <option value="2"<? if(2==$row[admin]){?> selected="selected"<? }?>>自己上传</option>
 </select>
 </li>
 </ul>
 
 <ul class="uk uk0" id="infout" style="display:none;">
 <li class="l1">视频路径：</li>
 <li class="l2"><input value="<?=$row[url]?>" name="t2" class="inp" style="width:500px;" type="text"/></li>
 <li class="l1">特别说明：</li>
 <li class="l21 red"><strong>请填入swf或flv后缀的视频文件地址</strong></li>
 </ul>
 
 <? $du="../upload/".$userid."/f/".$bh."/".$row[url];?>
 <ul class="uk uk0" id="infmy" style="display:none;">
 <li class="l1">自己上传：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="15" accept=".swf,.flv"> </li>
 <li class="l1">视频路径：</li>
 <li class="l2"><input value="<?=$du?>" readonly="readonly" class="inp redony" size="40" type="text"/><span class="fd">[<a href="<?=$du?>" target="_blank">下载</a>]</span></li>
 <li class="l1">特别说明：</li>
 <li class="l21 red"><strong>请上传swf或flv后缀的视频文件</strong></li>
 </ul>

 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">发布会员：</li>
 <li class="l2"><input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /></li>
 <li class="l1">首页推荐：</li>
 <li class="l2">
 <label><input name="Rindextj" type="radio" value="0" <? if(empty($row[indextj])){?>checked="checked"<? }?> /> <strong>普通</strong></label>
 <label><input name="Rindextj" type="radio" value="1" <? if(1==$row[indextj]){?>checked="checked"<? }?> /> <strong>首页推荐</strong></label>
 </li>
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
<script language="javascript">
infcha();
</script>
</body>
</html>