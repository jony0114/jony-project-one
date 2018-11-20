<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];

//函数开始
if($_GET[control]=="update" && $_POST[jvs]=="loupan"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0401,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $tjly=strgb2312(sqlzhuru($_POST[ttjly]),0,250);
 $xqzb=sqlzhuru($_POST[txqzb]);
 $xqzbarr=array("","");
 if(!empty($xqzb)){
 $a=preg_split("/,/",$xqzb);
 for($i=0;$i<count($a);$i++){$xqzbarr[$i]=$a[$i];}
 }
 $ts=str_replace("，",",",$_POST[twytsid]);
 updatetable("fcw_xq",$ses."
			 xqzb='".$xqzb."',
			 xqzb1='".$xqzbarr[0]."',
			 xqzb2='".$xqzbarr[1]."',
			 zbdj=".sqlzhuru($_POST[tzbdj]).",
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 xqadd='".sqlzhuru($_POST[txqadd])."',
			 money1=".$money1.",
			 wytsid='".$ts."',
			 zj='".sqlzhuru($_POST[tzj])."',
			 sfbl='".sqlzhuru($_POST[tsfbl])."',
			 xmxx='".sqlzhuru($_POST[txmxx])."',
			 other1='".sqlzhuru($_POST[tother1])."',
			 other1v='".sqlzhuru($_POST[tother1v])."',
			 njzj='".sqlzhuru($_POST[tnjzj])."',
			 zt=".sqlzhuru($_POST[Rzt]).",
			 ifxj=".sqlzhuru($_POST[R2]).",
			 djl=".sqlzhuru($_POST[tdjl]).",
			 tjly='".$tjly."',
			 xsxh=".sqlzhuru($_POST[txsxh])."
			 where bh='".$bh."'
			 ");
 updatetable("fcw_huxing","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_xqnews","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_xqvideo","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_xqphoto","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_kanfang","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_loupanjob","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 updatetable("fcw_tejia","areaid=".sqlzhuru($_POST[area1]).",areaids=".sqlzhuru($_POST[area2])." where xqbh='".$bh."'");
 uploadtpnodata(1,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home.jpg","allpic",700,400,325,222,"no");
 uploadtpnodata(2,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home2.jpg","allpic",700,400,325,222,"no");
 uploadtpnodata(3,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home3.jpg","allpic",700,400,325,222,"no");
 uploadtpnodata(4,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home4.jpg","allpic",700,400,325,222,"no");
 uploadtpnodata(5,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home5.jpg","allpic",700,400,325,222,"no");
 php_toheader("loupaninf.php?t=suc&bh=".$bh);

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
<script type="text/javascript">
function tj(){
r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
f1.action="loupaninf.php?bh=<?=$bh?>&control=update";
}
</script>
<script type="text/javascript" src="js/adddate.js" ></script> 

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

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
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","loupaninf.php?bh=".$bh);}?>

 <? include("rightcap2.php");?>
 <script language="javascript">document.getElementById("rtit1").className="a1";</script>

 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="loupan" name="jvs" />
 <ul class="uk">
 <li class="l1">温馨提示：</li>
 <li class="l21 feng">尽可能填写完善，有助于楼盘更好地展现给用户</li>
 <li class="l1">楼盘名称：</li>
 <li class="l21"><strong class="blue"><?=$xq?></strong> [<a class="green" href="loupanlx.php?bh=<?=$bh?>&action=update">修改名称</a>]</li>
 <li class="l1">楼盘封面图1：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">最佳尺寸：700*400</span></li>
 <? if(is_file($tp)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp?>" width="90" height="67" /></li>
 <? }?>

 <? $tp2="../upload/".$userid."/f/".$bh."/home2.jpg";?>
 <li class="l1">楼盘封面图2：</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">最佳尺寸：700*400</span></li>
 <? if(is_file($tp2)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp2?>" width="90" height="67" /></li>
 <? }?>

 <? $tp3="../upload/".$userid."/f/".$bh."/home3.jpg";?>
 <li class="l1">楼盘封面图3：</li>
 <li class="l2"><input type="file" name="inp3" id="inp3" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">最佳尺寸：700*400</span></li>
 <? if(is_file($tp3)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp3?>" width="90" height="67" /></li>
 <? }?>

 <? $tp4="../upload/".$userid."/f/".$bh."/home4.jpg";?>
 <li class="l1">楼盘封面图4：</li>
 <li class="l2"><input type="file" name="inp4" id="inp4" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">最佳尺寸：700*400</span></li>
 <? if(is_file($tp4)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp4?>" width="90" height="67" /></li>
 <? }?>

 <? $tp5="../upload/".$userid."/f/".$bh."/home5.jpg";?>
 <li class="l1">楼盘封面图5：</li>
 <li class="l2"><input type="file" name="inp5" id="inp5" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"><span class="fd">最佳尺寸：700*400</span></li>
 <? if(is_file($tp5)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp5?>" width="90" height="67" /></li>
 <? }?>

 <li class="l1">地图坐标：</li>
 <li class="l2">
 <input type="text" value="<?=$row[xqzb]?>" class="inp" name="txqzb" /> 
 <span class="fd">[<a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">点击获取</a>]</span>
 </li>
 <li class="l1">坐标缩放等级：</li>
 <li class="l2"><input type="text" value="<?=returnjgdw($row[zbdj],"",15)?>" class="inp" name="tzbdj" /></li>
 <li class="l1">所在区域：</li>
 <li class="l2">
 <div class="areaqy1">
 <select name="area1" class="inp" id="area1" onchange="areacha()">
 <option value="0">未选择</option>
 <? while1("*","fcw_area where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row[areaid]==$row1[id]){?> selected="selected"<? }?>><?=$row1[py]." - ".$row1[name1]?></option>
 <? }?>
 </select>
 </div>
 <div class="areaqy2">
 <input type="hidden" id="area2" name="area2" value="<?=$row[areaids]?>" />
 <iframe name="fareas" id="fareas" height="50" width="150" border="0" frameborder="0" src="areas.php?nid=<?=$row[areaids]?>&id=<?=$row[areaid]?>"></iframe>
 <? if($row[areaid]==""){?>
 <script language="javascript">areacha();</script>
 <? }?>
 </div>
 </li>
 <li class="l1">楼盘地址：</li>
 <li class="l2"><input type="text" value="<?=$row[xqadd]?>" size="50" class="inp" name="txqadd" /> </li>
 <li class="l1">参考均价：</li>
 <li class="l2"><input type="text" value="<?=$row[money1]?>" size="10" class="inp" name="tmoney1" /> <span class="fd">元/平米 (如不确定请留空或填0)</span></li>
 <li class="l1">总价：</li>
 <li class="l2"><input type="text" value="<?=$row[zj]?>" size="10" class="inp" name="tzj" /></li>
 <li class="l1">首付比例：</li>
 <li class="l2"><input type="text" value="<?=$row[sfbl]?>" size="10" class="inp" name="tsfbl" /></li>
 <li class="l1">年均租金：</li>
 <li class="l2"><input type="text" value="<?=$row[njzj]?>" size="10" class="inp" name="tnjzj" /></li>
 <li class="l1">其他信息：</li>
 <li class="l2">
 <input type="text" value="<?=$row[other1]?>" size="10" class="inp" name="tother1" /><span class="fd"></span>
 <input type="text" value="<?=$row[other1v]?>" size="10" class="inp" name="tother1v" />
 </li>
 <li class="l41">项目信息：</li>
 <li class="l51"><textarea name="txmxx"><?=$row[xmxx]?></textarea><span class="fd"> 一行一个</span></li>
 <li class="l1">物业特色：</li>
 <li class="l2"><input type="text" value="<?=$row[wytsid]?>" size="80" class="inp" name="twytsid" /><span class="fd">多个特色用逗号,隔开</span></li>
 </ul>
 
 <ul class="uk uk0">
 <li class="l1">上架状态：</li>
 <li class="l2">
 <label><input name="R2" type="radio"<? if(0==$row[ifxj]){?> checked="checked"<? }?> value="0" /> 正常展示</label>
 <label><input name="R2" type="radio"<? if(1==$row[ifxj]){?> checked="checked"<? }?> value="1" /> 下架(注：下架后楼盘将不会显示在网站中)</label>
 </li>
 <li class="l1">楼盘特色：</li>
 <li class="l2"><input type="text" value="<?=$row[tjly]?>" size="100" class="inp" name="ttjly" /> </li>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">关注度：</li>
 <li class="l2"><input type="text" value="<?=$row[djl]?>" class="inp" size="5" name="tdjl" /></li>
 <li class="l1">显示顺序：</li>
 <li class="l2">
 <input type="text" value="<?=returnjgdw($row[xsxh],"",9999)?>" class="inp" size="5" name="txsxh" />
 <span class="fd">默认为9999，按从小到大的顺序显示在楼盘列表中</span>
 </li>
 <li class="l1">发布会员：</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
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
//实例化编辑器
var ue = UE.getEditor('editor');
</script>
</body>
</html>