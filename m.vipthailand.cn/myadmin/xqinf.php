<?php
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
AdminSes_audit();
$bh=$_GET[bh];

//函数开始
if($_GET[control]=="update" && $_POST[jvs]=="xq"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0501,")){Audit_alert("权限不够","default.php");}
 zwzr();
 $money1=$_POST[tmoney1];if(!is_numeric($money1)){$money1=0;}
 $ld1=$_POST[tld1];if(!is_numeric($ld1)){$ld1=0;}
 $xqzb=sqlzhuru($_POST[txqzb]);
 $xqzbarr=array("","");
 if(!empty($xqzb)){
 $a=preg_split("/,/",$xqzb);
 for($i=0;$i<count($a);$i++){$xqzbarr[$i]=$a[$i];}
 }
 $djl=$_POST[tdjl];if(!is_numeric($djl)){$djl=0;}
 updatetable("fcw_xq","
			 xqzb='".$xqzb."',
			 xqzb1='".$xqzbarr[0]."',
			 xqzb2='".$xqzbarr[1]."',
			 areaid=".sqlzhuru($_POST[area1]).",
			 areaids=".sqlzhuru($_POST[area2]).",
			 xqadd='".sqlzhuru($_POST[txqadd])."',
			 ditieid='".$_GET[ditie]."',
			 gjid='".$_GET[gongjiao]."',
			 money1=".$money1.",
			 wylx='".$_GET[wy]."',
			 cq='".sqlzhuru($_POST[tcq])."',
			 kfs='".sqlzhuru($_POST[tkfs])."',
			 jzlb='".sqlzhuru($_POST[tjzlb])."',
			 zdmj='".sqlzhuru($_POST[tzdmj])."',
			 jzmj='".sqlzhuru($_POST[tjzmj])."',
			 zhs='".sqlzhuru($_POST[tzhs])."',
			 rjl='".sqlzhuru($_POST[trjl])."',
			 lhl='".sqlzhuru($_POST[tlhl])."',
			 wyf='".sqlzhuru($_POST[twyf])."',
			 wygs='".sqlzhuru($_POST[twygs])."',
			 wsfw='".sqlzhuru($_POST[twsfw])."',
			 xqrk='".sqlzhuru($_POST[txqrk])."',
			 tcw='".sqlzhuru($_POST[ttcw])."',
			 zt=".sqlzhuru($_POST[Rzt]).",
			 iftj=".sqlzhuru($_POST[tiftj]).",
			 djl=".$djl.",
			 zygw='".sqlzhuru($_POST[tzygw])."',
			 sqid=".$_POST[sqid].",
			 vrurl='".sqlzhuru($_POST[tvrurl])."',
			 ld1=".$ld1.",
			 ld2='".sqlzhuru($_POST[tld2])."'
			 where bh='".$bh."'
			 ");
 uploadtpnodata(1,"upload/".returnuserid($_POST[tuid])."/f/".$bh."/","home.jpg","allpic",180,120,325,222,"no");
 php_toheader("xqinf.php?t=suc&bh=".$bh);

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
function tj(){
r=document.getElementsByName("Rzt");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("请选择审核状态！");return false;}
c=document.getElementsByName("C1");
str="xcf";for(i=0;i<c.length;i++){if(c[i].checked==true){str=str+c[i].value+"xcf";}}wylx=str;
c=document.getElementsByName("Cgongjiao");str=",";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+",";}}gongjiaoID=str;
c=document.getElementsByName("Cditie");str=",";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+",";}}ditieID=str;
layer.msg('正在提交', {icon: 16  ,time: 0,shade :0.25});
f1.action="xqinf.php?bh=<?=$bh?>&control=update&wy="+wylx+"&ditie="+ditieID+"&gongjiao="+gongjiaoID;
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu5").className="a1";
</script>

<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0502,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="yjcode">
 <? $leftid=2;include("menu_loupan.php");?>

<div class="right">

 <? if($_GET[t]=="suc"){systs("恭喜您，操作成功！","xqinf.php?bh=".$bh);}?>

 <? include("rightcap3.php");?>
 <script language="javascript">document.getElementById("rtit1").className="a1";</script>

 <!--B-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="xq" name="jvs" />
 <ul class="uk">
 <li class="l1">温馨提示：</li>
 <li class="l21 feng">尽可能填写完善，有助于小区更好地展现给用户</li>
 <li class="l1">小区名称：</li>
 <li class="l21"><strong class="blue"><?=$xq?></strong> [<a class="green" href="xqlx.php?bh=<?=$bh?>&action=update">修改名称</a>]</li>
 <li class="l1">参考售价：</li>
 <li class="l2"><input type="text" value="<?=$row[money1]?>" size="10" class="inp" name="tmoney1" /> <span class="fd">元/平米 (如不确定请留空或填0)</span></li>
 <li class="l1">楼栋数量：</li>
 <li class="l2">
 <input type="text" value="<?=$row[ld1]?>" size="5" class="inp" name="tld1" />
 <span class="fd">栋，楼栋单位数：</span>
 <input type="text" value="<?=$row[ld2]?>" size="5" class="inp" name="tld2" />
 <span class="fd">支持数字或字母，如数字2表示1单元、2单元，字母B表示A单元、B单元</span>
 </li>
 </ul>

 <ul class="uk1 uk0">
 <li class="l1">物业类型：</li>
 <li class="l2">
 <label><input name="C2" type="checkbox" onclick="xuan()" /> 全选</label>
 <?
 $xs="loupan";
 while1("*","fcw_wylx where xs like '%".$xs."%' and ifuse='on' order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <label><input name="C1" type="checkbox" value="<?=$row1[name1]?>"<? if(strstr($row[wylx],"xcf".$row1[name1]."xcf")){?> checked="checked"<? }?> /> <?=$row1[name2]?></label>
 <?
 }
 ?>
 </li>
 </ul>

 <ul class="uk uk0">
 <li class="l1">小区封面图：</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="25" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$tp?>" width="90" height="67" /></li>
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
 </div>
 </li>
 <li class="l1">所属商圈：</li>
 <li class="l2">
 <input type="hidden" id="sqid" name="sqid" value="0" />
 <iframe name="fsqid" id="fsqid" height="50" width="150" border="0" frameborder="0" src="shangquana.php?mid=<?=$row[sqid]?>&areaid=<?=$row[areaid]?>"></iframe>
 <? if($row[areaid]==""){?>
 <script language="javascript">areacha();</script>
 <? }?>
 </li>
 <li class="l1">小区地址：</li>
 <li class="l2"><input type="text" value="<?=$row[xqadd]?>" size="50" class="inp" name="txqadd" /> </li>
 <li class="l1">地图坐标：</li>
 <li class="l2">
 <input type="text" value="<?=$row[xqzb]?>" class="inp" name="txqzb" /> 
 <span class="fd">[<a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">点击获取</a>]</span>
 </li>
 <li class="l1">VR视频链接：</li>
 <li class="l2"><input type="text" class="inp" name="tvrurl" size="80" value="<?=$row[vrurl]?>" /></li>
 <li class="l1">置业顾问：</li>
 <li class="l2">
 <input type="text" value="<?=$row[zygw]?>" class="inp" size="20" name="tzygw" />
 <span class="fd">请输入会员帐号，如没有，可留空</span>
 </li>
 </ul>
 
 <? if(panduan("admin","fcw_gongjiao where admin=1")==1){?>
 <ul class="uk1 uk0">
 <li class="l1">公交线路：</li>
 <li class="l2">
 <? while1("*","fcw_gongjiao where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <label><input name="Cgongjiao" type="checkbox" value="<?=$row1[id]?>"<? if(strstr($row[gjid],",".$row1[id].",")){?> checked="checked"<? }?> /> <?=$row1[name1]?></label>
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
 <li class="l1">产权：</li>
 <li class="l2">
 <input type="text" value="<?=$row[cq]?>" size="10" class="inp" name="tcq" id="tcq" /> 
 <span class="fd">如:<a href="javascript:textinto('tcq','70年')">70年</a>、<a href="javascript:textinto('tcq','50年')">50年</a>、<a href="javascript:textinto('tcq','40年')">40年</a></span>
 </li>
 <li class="l1">开发商：</li>
 <li class="l2"><input type="text" value="<?=$row[kfs]?>" class="inp" name="tkfs" /> </li>
 <li class="l1">建筑类别：</li>
 <li class="l2"><input type="text" value="<?=$row[jzlb]?>" class="inp" name="tjzlb" id="tjzlb" /> <span class="fd">如：<a href="javascript:textinto('tjzlb','塔楼、高层')">塔楼、高层</a>，<a href="javascript:textinto('tjzlb','叠排别墅、联排别墅')">叠排别墅、联排别墅</a></span></li>
 <li class="l1">占地面积：</li>
 <li class="l2"><input type="text" value="<?=$row[zdmj]?>" class="inp" size="10" name="tzdmj" /> <span class="fd">平米</span></li>
 <li class="l1">建筑面积：</li>
 <li class="l2"><input type="text" value="<?=$row[jzmj]?>" class="inp" size="10" name="tjzmj" /> <span class="fd">平米</span></li>
 <li class="l1">总户数：</li>
 <li class="l2"><input type="text" value="<?=$row[zhs]?>" class="inp" size="10" name="tzhs" /></li>
 <li class="l1">容积率：</li>
 <li class="l2"><input type="text" value="<?=$row[rjl]?>" class="inp" size="10" name="trjl" /></li>
 <li class="l1">绿化率：</li>
 <li class="l2"><input type="text" value="<?=$row[lhl]?>" class="inp" size="10" name="tlhl" /></li>
 <li class="l1">物业费：</li>
 <li class="l2"><input type="text" value="<?=$row[wyf]?>" class="inp" size="30" name="twyf" /></li>
 <li class="l1">物业公司：</li>
 <li class="l2"><input type="text" value="<?=$row[wygs]?>" class="inp" size="30" name="twygs" /></li>
 <li class="l1">卫生服务：</li>
 <li class="l2"><input type="text" value="<?=$row[wsfw]?>" class="inp" size="30" name="twsfw" id="twsfw" /> <span class="fd">如：<a href="javascript:textinto('twsfw','物业保洁 定时打扫')">物业保洁 定时打扫</a></span></li>
 <li class="l1">入口：</li>
 <li class="l2"><input type="text" value="<?=$row[xqrk]?>" class="inp" size="30" name="txqrk" /> <span class="fd">如：5个车位入口14个小门</span></li>
 <li class="l1">车位数：</li>
 <li class="l2"><input type="text" value="<?=$row[tcw]?>" class="inp" size="30" name="ttcw" /></li>
 <li class="l1">点击率：</li>
 <li class="l2"><input type="text" value="<?=$row[djl]?>" class="inp" size="10" name="tdjl" /></li>
 <li class="l1">发布会员：</li>
 <li class="l2">
 <input type="text" class="inp redony" readonly="readonly" name="tuid" size="20" value="<?=$row[uid]?>" /> 
 </li>
 <li class="l1">推荐序号：</li>
 <li class="l2">
 <input type="text" value="<?=returnjgdw($row[iftj],"",0)?>" class="inp" size="5" name="tiftj" />
 <span class="fd">0表示不推荐，反之按从小到大推荐</span>
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
</body>
</html>