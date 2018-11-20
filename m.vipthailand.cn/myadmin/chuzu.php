<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
while0("*","fcw_fang where bh='".$bh."' and type1='出租'");
if(!$row=mysql_fetch_array($res)){php_toheader("chuzulist.php");}
$wylx=$row[wylx];
$muid=$row[uid];
$timestamp=time();
while1("*","fcw_admin where adminuid='".$_SESSION[FCWADMINSES]."'");$row1=mysql_fetch_array($res1);$adminpwd=$row1[adminpwd];

$sqluser="select * from fcw_user where uid='".$row[uid]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}

//B
if($_GET[control]=="update" && $_POST[jvs]=="chuzu"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0101,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $lc1=$_POST[tlc1];if(!is_numeric($lc1)){$lc1=0;}
 $lc2=$_POST[tlc2];if(!is_numeric($lc2)){$lc2=0;}
 $hx1=$_POST[thx1];if(!is_numeric($hx1)){$hx1=0;}
 $hx2=$_POST[thx2];if(!is_numeric($hx2)){$hx2=0;}
 $hx3=$_POST[thx3];if(!is_numeric($hx3)){$hx3=0;}
 $hx4=$_POST[thx4];if(!is_numeric($hx4)){$hx4=0;}
 $hx5=$_POST[thx5];if(!is_numeric($hx5)){$hx5=0;}
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $money2=$_POST[tmoney2];if(!is_numeric($money2)){$money2=0;}
 $money3=$_POST[tmoney3];if(!is_numeric($money3)){$money3=0;}
 $mj1=$_POST[tmj1];if(!is_numeric($mj1)){$mj1=0;}
 $mj2=$_POST[tmj2];if(!is_numeric($mj2)){$mj2=0;}
 $zxqkid=$_POST[tzxqkid];if(!is_numeric($zxqkid)){$zxqkid=0;}
 $zxqkid=$_POST[tzxqkid];if(!is_numeric($zxqkid)){$zxqkid=0;}
 $cxid=$_POST[tcxid];if(!is_numeric($cxid)){$cxid=0;}
 $jznd=$_POST[tjznd];if(!is_numeric($jznd)){$jznd=0;}
 $lxid=$_POST[tlxid];if(!is_numeric($lxid)){$lxid=0;}
 $jbid=$_POST[tjbid];if(!is_numeric($jbid)){$jbid=0;}
 $zdxh=$_POST[tzdxh];if(!is_numeric($zdxh)){$zdxh=0;}
 $xq=sqlzhuru($_POST[txq]);

 if(!empty($_POST[tzddq])){$ses=$ses."zddq='".$_POST[tzddq]."',";}
 while1("id,admin,xq,zt,xqzb,xqzb1,xqzb2","fcw_xq where admin=1 and zt=0 and xq='".$xq."' order by id asc");if($row1=mysql_fetch_array($res1)){
 $ses=$ses."xqzb='".$row1[xqzb]."',xqzb1='".$row1[xqzb1]."',xqzb2='".$row1[xqzb2]."',";
 }
 updatetable("fcw_fang",
			 $ses."fangbh='".sqlzhuru($_POST[tfangbh])."',
			 uip='".$uip."',
			 lxr='".sqlzhuru($_POST[tlxr])."',
			 mot='".sqlzhuru($_POST[tmot])."',
			 fdname='".sqlzhuru($_POST[tfdname])."',
			 fdmot='".sqlzhuru($_POST[tfdmot])."',
			 wytsid='".$_GET[ts]."',
			 mj=".sqlzhuru($_POST[tmj]).",mj1=".$mj1.",mj2=".$mj2.",
			 money1=".$money1.",money2=".$money2.",money3=".$money3.",
			 xq='".$xq."',
			 tit='".sqlzhuru($_POST[ttit])."',
			 txt='".sqlzhuru($_POST[content])."',
			 hx1=".$hx1.",hx2=".$hx2.",hx3=".$hx3.",hx4=".$hx4.",hx5=".$hx5.",
			 lc1=".$lc1.",lc2=".$lc2.",
			 jgdw='".sqlzhuru($_POST[tjgdw])."',
			 zxqkid=".$zxqkid.",cxid=".$cxid.",jznd=".$jznd.",
			 pz='".$_GET[pt]."',
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 ditieid='".$_GET[ditie]."',
			 gongjiaoid='".$_GET[gongjiao]."',
			 fadd='".sqlzhuru($_POST[tfadd])."',
			 lxid=".$lxid.",jbid=".$jbid.",
			 ifxj=".sqlzhuru($_POST[Rifxj]).",
			 zt=".sqlzhuru($_POST[Rzt]).",
			 czfs=".sqlzhuru($_POST[Rczfs]).",
			 fkfs='".sqlzhuru($_POST[tfkfs])."',
			 mytj=".sqlzhuru($_POST[Rmytj]).",
			 iftj=".sqlzhuru($_POST[tiftj]).",
			 zdxh=".$zdxh.",
			 video='".sqlzhuru($_POST[tvideo])."',
			 jiejing='".sqlzhuru($_POST[tjiejing])."',
			 hylx=".intval($_POST[thylx]).",
			 hylx2=".intval($_POST[thylx2]).",
			 vrurl='".sqlzhuru($_POST[tvrurl])."',
			 ld1='".sqlzhuru($_POST[tld1])."',
			 ld2='".sqlzhuru($_POST[tld2])."',
			 ld3='".sqlzhuru($_POST[tld3])."'
             where uid='".$muid."' and bh='".$bh."'");
 php_toheader("chuzu.php?t=suc&bh=".$bh);

}
//E

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理后台</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>

<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="gbk" src="../config/ueditor/unit.js"></script>

<script language="javascript">
function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("请输入出租标题！");document.f1.ttit.focus();return false;}
 if((document.f1.tmj.value).replace(/\s/,"")=="" || isNaN(document.f1.tmj.value)){alert("请输入面积！");document.f1.tmj.focus();return false;}
 if((document.f1.tfadd.value).replace(/\s/,"")==""){alert("请输入地址！");document.f1.tfadd.focus();return false;}
 if((document.f1.tmot.value).replace(/\s/,"")==""){alert("请输入联系电话！");document.f1.tmot.focus();return false;}
 if((document.f1.tlxr.value).replace(/\s/,"")==""){alert("请输入联系人！");document.f1.tlxr.focus();return false;}
 r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
 c=document.getElementsByName("Cgongjiao");str=",";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+",";}}gongjiaoID=str;
 c=document.getElementsByName("Cditie");str=",";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+",";}}ditieID=str;
 c=document.getElementsByName("C1");
 str="xcf";
 for(i=0;i<c.length;i++){
 if(c[i].checked){str=str+c[i].value+"xcf";}
 }
 c11=document.getElementsByName("C11");
 str1="xcf";
 for(i=0;i<c11.length;i++){
 if(c11[i].checked){str1=str1+c11[i].value+"xcf";}
 }
 layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
 f1.action="chuzu.php?control=update&bh=<?=$row[bh]?>&pt="+str+"&ts="+str1+"&ditie="+ditieID+"&gongjiao="+gongjiaoID;
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu4").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0102,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_fang.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","chuzu.php?bh=".$_GET[bh]);}?>
 
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">出租信息</a>
 <a href="chuzulist.php">返回列表</a>
 </div> 

 <!--begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="chuzu" name="jvs" />
 <ul class="uk">
 <li class="l1">出租类型：</li>
 <li class="l21"><strong><?=returnwylx(4,$row[wylx])?></strong>  &nbsp;&nbsp;&nbsp;[<a href="chuzulx.php?action=update&id=<?=$row[id]?>">修改类型</a>]</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 标题：</li>
 <li class="l2"><input type="text" class="inp" name="ttit" size="80" value="<?=$row[tit]?>" /></li>
 <li class="l1">自定义编号：</li>
 <li class="l2"><input type="text" class="inp" name="tfangbh" size="10" value="<?=$row[fangbh]?>" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 面积：</li>
 <li class="l2">
 <input type="text" class="inp" name="tmj" size="5" value="<?=$row[mj]?>" /> 
 <span class="fd"><? if(check_in($wylx,"土地")){echo "亩";}else{echo "平米";}?></span>
 </li>
 <li class="l1">租金：</li>
 <li class="l2">
 <input type="text" class="inp" name="tmoney1" size="5" value="<?=returnzdv($row[money1])?>" />
 <select name="tjgdw" class="inp" style="margin-left:10px;">
 <option value="元/月" <? if($row[jgdw]=="元/月"){?> selected="selected"<? }?>>元/月</option>
 <option value="元/季" <? if($row[jgdw]=="元/季"){?> selected="selected"<? }?>>元/季</option>
 <option value="元/半年" <? if($row[jgdw]=="元/半年"){?> selected="selected"<? }?>>元/半年</option>
 <option value="元/年" <? if($row[jgdw]=="元/年"){?> selected="selected"<? }?>>元/年</option>
 <option value="元/天" <? if($row[jgdw]=="元/天"){?> selected="selected"<? }?>>元/天</option>
 </select>
 <select name="tfkfs" class="inp" style="margin-left:10px;">
 <option value="付3押1"<? if($row[fkfs]=="付3押1"){?> selected="selected"<? }?>>付3押1</option>
 <option value="付1押1"<? if($row[fkfs]=="付1押1"){?> selected="selected"<? }?>>付1押1</option>
 <option value="付2押1"<? if($row[fkfs]=="付2押1"){?> selected="selected"<? }?>>付2押1</option>
 <option value="付1押2"<? if($row[fkfs]=="付1押2"){?> selected="selected"<? }?>>付1押2</option>
 <option value="年付不押"<? if($row[fkfs]=="年付不押"){?> selected="selected"<? }?>>年付不押</option>
 <option value="半年付不押"<? if($row[fkfs]=="半年付不押"){?> selected="selected"<? }?>>半年付不押</option>
 <option value="面议"<? if($row[fkfs]=="面议"){?> selected="selected"<? }?>>面议</option>
 </select>
 <span class="fd hui">(小提示：不填表示面议)</span>
 </li>

 <? if(check_in($wylx,"商铺")){?>
 <li class="l1">转让费：</li>
 <li class="l2"><input type="text" class="inp" name="tmoney3" size="5" value="<?=returnzdv($row[money3])?>" /><span class="fd">万(小提示：不填表示无转让费)</span></li>
 <? }?>
  
 <li class="l1">出租方式：</li>
 <li class="l2">
 <label><input name="Rczfs" type="radio" value="1" <? if(1==$row[czfs]){?> checked="checked"<? }?> /> 整租</label>
 <label><input name="Rczfs" type="radio" value="2" <? if(2==$row[czfs]){?> checked="checked"<? }?> /> 合租</label>
 </li>

 <li class="l1">所在小区：</li>
 <li class="l2">
 <input name="txq" style="width:305px;" value="<?=$row[xq]?>" class="inp inpfd" type="text" autocomplete="off" disableautocomplete  id="searcht1" />
 <div id="searchHtml" style="display:none;" onmouseleave="this.style.display='none';"></div>
 </li>
  
 <? if(check_in($wylx,"别墅,平房")){?>
 <li class="l1">层数：</li>
 <li class="l2"><input name="tlc1" value="<?=returnzdv($row[lc1])?>" style="width:26px;" class="inp" type="text" /><span class="fd">层</span><span class="fd hui">(小提示：如不清楚，可以不用填写层数)</span></li>
 <? }?>

 <? if(check_in($wylx,"住宅,公寓")){?>
 <li class="l1">户号：</li>
 <li class="l2">
 <div id="ldread">
 <input name="tld1" value="<?=$row[ld1]?>" style="width:60px;" class="inp" type="text" /><span class="fd" style="margin-right:10px;">号楼</span>
 <input name="tld2" value="<?=$row[ld2]?>" style="width:60px;" class="inp" type="text" /><span class="fd" style="margin-right:10px;">单元</span>
 </div>
 <input name="tld3" value="<?=$row[ld3]?>" style="width:60px;" class="inp" type="text" /><span class="fd">室</span>
 </li>
 <? }?>

 <? if(check_in($wylx,"住宅,公寓,写字楼,商铺,旅馆/酒店")){?>
 <li class="l1">楼层：</li>
 <li class="l2">
 <span class="fd" style="margin-left:0;margin-right:10px;">第</span><input name="tlc1" value="<?=returnzdv($row[lc1])?>" class="inp" style="width:26px;" type="text" /> 
 <span class="fd" style="margin-right:10px;">层，共</span><input name="tlc2" value="<?=returnzdv($row[lc2])?>" class="inp" style="width:26px;" type="text" /><span class="fd">层</span>
 <span class="fd hui">(小提示：如不清楚总共几层，可以不用填写楼层总数)</span>
 </li>
 <? }?>
 
 <? if(check_in($wylx,"厂房")){?>
 <li class="l1">厂房楼层：</li>
 <li class="l2">
 <span class="fd" style="margin-left:0;margin-right:10px;">第</span><input name="tlc1" value="<?=returnzdv($row[lc1])?>" class="inp" style="width:26px;" type="text" /> 
 <span class="fd" style="margin-right:10px;">层，到</span><input name="tlc2" value="<?=returnzdv($row[lc2])?>" class="inp" style="width:26px;" type="text" /><span class="fd">层</span>
 <span class="fd hui">(小提示：如不清楚楼层，可以不用填写楼层)</span>
 </li>
 <? }?>
 
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
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 具体位置：</li>
 <li class="l2"><input type="text" class="inp" name="tfadd" id="tfadd" size="60" value="<?=$row[fadd]?>" /></li>
 </ul>

 <!--效果图/详情B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">效果图/详情</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">效果图：</li>
 <li class="l2">
 <iframe style="float:left;" src="tpupload.php?admin=1&bh=<?=$bh?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 <span class="fd">可最多上传16张效果图</span>
 </li>
 </ul>
 <div class="xgtp">
  <div id="xgtp1" style="display:none;">正在处理</div>
  <div id="xgtp2"></div>
 </div>
 <!--效果图/详情E-->

 <? if(panduan("admin","fcw_gongjiao where admin=1")==1){?>
 <ul class="uk1 uk0">
 <li class="l1">公交线路：</li>
 <li class="l2">
 <? while1("*","fcw_gongjiao where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <label><input name="Cgongjiao" type="checkbox" value="<?=$row1[id]?>"<? if(strstr($row[gongjiaoid],",".$row1[id].",")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <? }?>
 </li>
 </ul>
 <? }?>
 
 <? if(panduan("admin","fcw_ditie where admin=1")==1){?>
 <ul class="uk1 uk0">
 <li class="l1">地铁线路：</li>
 <li class="l2">
 <? while1("*","fcw_ditie where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <label><input name="Cditie" type="checkbox" value="<?=$row1[id]?>"<? if(strstr($row[ditieid],",".$row1[id].",")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <? }?>
 </li>
 </ul>
 <? }?>
 
 <ul class="uk uk0">
 <? if(check_in($wylx,"住宅,公寓,别墅")){?>
 <li class="l1">户型结构：</li>
 <li class="l2">
 <input name="thx1" value="<?=returnzdv($row[hx1])?>" class="inp" style="width:26px;" type="text" /><span class="fd" style="margin-right:10px;">室</span>
 <input name="thx2" value="<?=returnzdv($row[hx2])?>" class="inp" style="width:26px;" type="text" /><span class="fd" style="margin-right:10px;">厅</span> 
 <input name="thx3" value="<?=returnzdv($row[hx3])?>" class="inp" style="width:26px;" type="text" /><span class="fd" style="margin-right:10px;">卫</span> 
 <input name="thx4" value="<?=returnzdv($row[hx4])?>" class="inp" style="width:26px;" type="text" /><span class="fd" style="margin-right:10px;">厨</span>
 <input name="thx5" value="<?=returnzdv($row[hx5])?>" class="inp" style="width:26px;" type="text" /><span class="fd">阳台</span>
 <span class="fd hui">(小提示：如果不清楚或没有，可以不填写)</span>
 </li>
 <? }?>

 <? if(check_in($wylx,"写字楼")){?>
 <li class="l1">类型/级别：</li>
 <li class="l2">
 <select name="tlxid" class="inp" style="margin-right:10px;">
 <option value="0" <? if(0==$row[lxid]){?> selected="selected"<? }?>>选择类型</option>
 <? while1("*","fcw_xzllx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tjbid" class="inp">
 <option value="0" <? if(0==$row[jbid]){?> selected="selected"<? }?>>选择级别</option>
 <? while1("*","fcw_xzljb order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <? }?>

 <? if(check_in($wylx,"商铺")){?>
 <li class="l1">行业类型：</li>
 <li class="l2">
 <select name="thylx" id="thylx" class="inp" onchange="hylxcha()">
 <option value="0">选择行业</option>
 <? while1("*","fcw_sphy where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[hylx]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <div class="areaqy2">
 <input type="hidden" id="thylx2" name="thylx2" value="0" />
 <iframe name="fhylx2" id="fhylx2" height="33" width="150" border="0" frameborder="0" src="../config/hylx2.php?nid=<?=$row[hylx2]?>&id=<?=$row[hylx]?>"></iframe>
 <? if(empty($row[hylx])){?>
 <script language="javascript">hylxcha();</script>
 <? }?>
 </div>
 </li>
 <li class="l1">商铺类型：</li>
 <li class="l2">
 <select name="tlxid" style="margin:0 10px 0 0;" class="inp">
 <option value="0" <? if(0==$row[lxid]){?> selected="selected"<? }?>>选择类型</option>
 <? while1("*","fcw_splx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tjbid" class="inp">
 <option value="0" <? if(0==$row[jbid]){?> selected="selected"<? }?>>选择铺面类型</option>
 <? while1("*","fcw_pmlx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[jbid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <? }?>

 <? if(check_in($wylx,"别墅")){?>
 <li class="l1">别墅类型：</li>
 <li class="l2">
 <select name="tlxid" class="inp">
 <option value="0" <? if(0==$row[lxid]){?> selected="selected"<? }?>>选择类型</option>
 <? while1("*","fcw_bslx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[lxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1">花园面积：</li>
 <li class="l2"><input name="tmj1" value="<?=returnzdv($row[mj1])?>" style="width:60px;" class="inp" type="text" />
 <span class="fd">平米</span><span class="fd hui">(小提示：如不清楚或没有，可以不用填写花园面积)</span></li>
 <li class="l1">地下室面积：</li>
 <li class="l2"><input name="tmj2" value="<?=returnzdv($row[mj2])?>" style="width:60px;" class="inp" type="text" />
 <span class="fd">平米</span><span class="fd hui">(小提示：如不清楚或没有，可以不用填写地下室面积)</span></li>
 <? }?>

 <? if(check_in($wylx,"住宅,公寓,别墅,写字楼,商铺")){?>
 <li class="l1">物业费：</li>
 <li class="l2"><input name="tmoney2" value="<?=returnzdv($row[money2])?>" style="width:120px;" class="inp" type="text" /> 
 <span class="fd hui">(小提示：如不清楚或没有物业费，可以留空)</span></li>
 <? }?>

 <? if(check_in($wylx,"住宅,公寓,别墅,平房,写字楼,商铺,厂房,旅馆/酒店")){?>
 <li class="l1">房屋情况：</li>
 <li class="l2">
 <select name="tzxqkid" class="inp">
 <option value="0">装修情况</option>
 <? while1("*","fcw_zxqk order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[zxqkid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tcxid" class="inp" style="margin-left:10px;">
 <option value="0" selected="selected">朝向</option>
 <? while1("*","fcw_fwcx order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>" <? if($row1[id]==$row[cxid]){?> selected="selected"<? }?>><?=$row1[name1]?></option>
 <? }?>
 </select>
 <select name="tjznd" class="inp" style="margin-left:10px;">
 <option value="0">建筑年代</option>
 <? for($i=date("Y",time());$i>=1949;$i--){?>
 <option value="<?=$i?>" <? if($row[jznd]==$i){?> selected="selected"<? }?>><?=$i?>年</option>
 <? }?>
 </select>
 </li>
 <? }?>
 </ul>
 
 <?
 $xs="xcf".$row[wylx]."xcf";
 if(panduan("*","fcw_wyts where cswy like '%".$xs."%' order by xh asc")==1){
 ?>
 <ul class="uk1 uk0">
 <li class="l1">物业特色：</li>
 <li class="l2">
 <label><input name="C21" type="checkbox" onclick="xuan1()" /> 全选</label>
 <?
 while1("*","fcw_wyts where cswy like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <label><input name="C11" type="checkbox" value="<?=$row1[id]?>"<? if(strstr($row[wytsid],"xcf".$row1[id]."xcf")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <?
 }
 ?>
 </li>
 </ul>
 <? }?>
 
 <?
 $xs="xcf".$row[wylx]."xcf";
 if(panduan("*","fcw_peitao where cswy like '%".$xs."%' order by xh asc")==1){
 ?>
 <ul class="uk1 uk0">
 <li class="l1">配套设施：</li>
 <li class="l2">
 <label><input name="C2" type="checkbox" onclick="xuan()" /> 全选</label>
 <? while1("*","fcw_peitao where czwy like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <label><input name="C1" type="checkbox" value="<?=$row1[name1]?>"<? if(strstr($row[pz],"xcf".$row1[name1]."xcf")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
 <? }?>
 </li>
 </ul>
 <? }?>
 
 <ul class="uk">
 <li class="l4">街景代码：</li>
 <li class="l5"><textarea name="tjiejing"><?=$row[jiejing]?></textarea></li>
 <li class="l1">视频地址：</li>
 <li class="l2">
 <input type="text" class="inp" name="tvideo" size="60" value="<?=$row[video]?>" />
 <span class="fd">支持腾讯视频和优酷视频，复制播放地址即可</span>
 </li>
 <li class="l1">VR视频链接：</li>
 <li class="l2"><input type="text" class="inp" name="tvrurl" size="80" value="<?=$row[vrurl]?>" /></li>
 <li class="l10">详细描述：</li>
 <li class="l11"><script id="editor" name="content" type="text/plain" style="width:858px;height:390px;"><?=$row[txt]?></script></li>
 <li class="l1">上架/下架：</li>
 <li class="l2">
 <label><input name="Rifxj" type="radio" value="0" <? if(0==$row[ifxj]){?>checked="checked"<? }?> /> 上架</label>
 <label><input name="Rifxj" type="radio" value="1" <? if(1==$row[ifxj]){?>checked="checked"<? }?> /> 下架</label>
 </li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 橱窗推荐：</li>
 <li class="l2">
 <label><input name="Rmytj" type="radio" value="1"<? if(1==$row[mytj]){?> checked="checked"<? }?> /> 推荐</label>
 <label><input name="Rmytj" type="radio" value="0"<? if(0==$row[mytj]){?> checked="checked"<? }?> /> 普通展示</label>
 </li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 联系人：</li>
 <li class="l2"><input name="tlxr" value="<?=returnjgdw($row[lxr],"",$rowuser[nc])?>" style="width:160px;" class="inp" type="text" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 联系号码：</li>
 <li class="l2"><input name="tmot" value="<?=returnjgdw($row[mot],"",$rowuser[mot])?>" style="width:160px;" class="inp" type="text" /></li>
 <? if($row[fbty]==2){?>
 <li class="l1">房东姓名：</li>
 <li class="l2"><input name="tfdname" value="<?=$row[fdname]?>" style="width:160px;" class="inp" type="text" /></li>
 <li class="l1">房东号码：</li>
 <li class="l2"><input name="tfdmot" value="<?=$row[fdmot]?>" style="width:160px;" class="inp" type="text" /><span class="fd">(房东信息仅供自己查看，不对外显示)</span></li>
 <? }?>
 </ul>
 
 <ul class="rcap"><li class="l1"></li><li class="l2">管理员操作</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">发布会员：</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
 </li>
 <li class="l1">推荐序号：</li>
 <li class="l2">
 <input type="text" value="<?=returnjgdw($row[iftj],"",0)?>" class="inp" size="5" name="tiftj" />
 <span class="fd">0表示不推荐，反之按从小到大推荐</span>
 </li>
 <li class="l1">置顶序号：</li>
 <li class="l2">
 <input name="tzdxh" style="width:35px;" value="<?=$row[zdxh]?>" class="inp" type="text" />
 <span class="fd" style="margin-right:10px;">到期时间:</span><input name="tzddq" style="width:180px;" value="<?=$row[zddq]?>" class="inp" type="text" />
 <span class="fd">可留空,正确的格式如 2014-12-12 12:12:12</span>
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
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
<script type="text/javascript">
function searchCHA(){
 t1v=document.f1.txq.value;
 document.getElementById("searchHtml").innerHTML="";
 document.getElementById("searchHtml").style.display="none";
 if(t1v!=""){
    $.post("xqsearch.php",{keyv:t1v},function(result){
     $("#searchHtml").html(result);
	 if(result!=""){
	 document.getElementById("searchHtml").style.display="";
	 }
    });
 }
}
$('#searcht1').bind('input propertychange', function() {
 searchCHA();
});

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

//实例化编辑器
var ue = UE.getEditor('editor');
</script>
</body>
</html>