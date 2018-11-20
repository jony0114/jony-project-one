<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sj=date("Y-m-d H:i:s");
while1("uid,sxnum","fcw_user where uid='".$_SESSION[FCWuser]."'");$row1=mysql_fetch_array($res1);$sxnum=$row1[sxnum];
$userid=returnuserid($_SESSION[FCWuser]);
$djsx=0;
while2("*","fcw_userdjsx where userid=".$userid);if($row2=mysql_fetch_array($res2)){$djsx=$row2[sxnum];}

//FUNB
if($_GET[control]=="gx"){

 if($_GET[jl]=="none"){
  while1("*","fcw_fang where type1='求购' and uid='".$_SESSION[FCWuser]."' and zt=0 order by sj desc");
  while($row1=mysql_fetch_array($res1)){
  if($sxnum>0 || $djsx>0){if($sxnum>0){$sxnum=$sxnum-1;}if($sxnum==0){$djsx=$djsx-1;}updatetable("fcw_fang","sj='".$sj."' where id=".$row1[id]);}
  }
 }else{
  $a=$_GET[jl];
  $b=preg_split("/,/",$a);
  for($i=0;$i<=count($b);$i++){
  if($b[$i]!=""){
   if($sxnum>0 || $djsx>0){if($sxnum>0){$sxnum=$sxnum-1;}if($sxnum==0){$djsx=$djsx-1;}updatetable("fcw_fang","sj='".$sj."' where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and bh='".$b[$i]."'");}
  }
  }
 }
updatetable("fcw_user","sxnum=".$sxnum." where uid='".$_SESSION[FCWuser]."'");
updatetable("fcw_userdjsx","sxnum=".$djsx." where userid=".$userid);
php_toheader("qiugoulist.php?t=suc");

}
//FUNE
$ses=" where (uid='".$_SESSION[FCWuser]."' or zjuid='".$_SESSION[FCWuser]."') and type1='求购' and zt<>99";
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
if($_GET[sd1]!=""){$ses=$ses." and wylx='".$_GET[sd1]."'";}
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
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
<script language="javascript">
function ser(){
location.href="qiugoulist.php?st1="+document.getElementById("st1").value+"&sd1="+document.getElementById("sd1").value;	
}
function gxfang(x){
 if(x==1){
 var c=document.getElementsByName("C1");
 str="";for(i=0;i<c.length;i++){if(c[i].checked){if(str==""){str=c[i].value;}else{str=str+","+c[i].value;}}}
 if(str==""){alert("至少选择一条数据！");return false;}
 v=str;
 }else if(x==2){
 v="none";
 }
 if(confirm("确定要更新吗？")){location.href="qiugoulist.php?control=gx&jl="+v;}else{return false;}
}
</script>
</head>
<body>
<? include("../template/top.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 我的求购信息</li>
</ul>
<? include("left.php");?>
<!--RB-->
<div class="right">
 <? returnuserqx($userqx,",4,");?>
 <!--selB-->
 <ul class="psel">
 <li class="l1">信息标题：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l1">物业类型：</li>
 <li class="l2">
 <select id="sd1">
 <option value="">==不限==</option>
 <? $xs="qiugou";while1("*","fcw_wylx where ifuse='on' and xs like '%".$xs."%' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[name1]?>"<? if(strstr($_GET[sd1],$row1[name1])!=""){?> selected="selected"<? }?>><?=$row1[name2]?></option>
 <? }?>
 </select>
 </li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <!---selE-->

 <? include("rcap4.php");?>
 <script language="javascript">
 document.getElementById("rcap<?=$_GET[zt]?>").className="l1 l2";
 </script>
 <ul class="typecap">
 <li class="l1">房源求购信息</li>
 <li class="l2">费用预算</li>
 <li class="l3">关注</li>
 <li class="l4">推广状态</li>
 <li class="l5">操作</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> 全选</li>
 <li class="l2">
 <a href="javascript:void(0)" onclick="fcwcheckDEL(1,'fcw_fang')" class="a1">橱窗推荐</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(2,'fcw_fang')" class="a1">取消推荐</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(4,'fcw_fang')" class="a2">删除</a>
 <a href="javascript:void(0)" onclick="fcwcheckDEL(3,'fcw_fang')" class="a1">上架/下架</a>
 <a href="javascript:void(0)" onclick="gxfang(1)" class="a1">更新选中</a>
 <a href="javascript:void(0)" onclick="gxfang(2)" class="a1">更新全部</a>
 </li>
 <li class="l3"><span class="fd">剩余刷新量为<strong><?=$sxnum?></strong> [<a href="adsx.php?ty=fang" class="red">购买</a>]</span></li>
 </ul>
 <?
 pagef($ses,20,"fcw_fang","order by sj desc");
 while($row=mysql_fetch_array($res)){
 if(0==$row[ifxj]){$xjv="<span class='blue'>上架</span>";}else{$xjv="<span class='red'>已下架</span>";}
 $aurl="qiugou.php?bh=".$row[bh];
 
 if(empty($row[zddq])){$ifzd=0;}else{
  if(strtotime($row[zddq])<=strtotime($sj)){$ifzd=0;}else{
  $ifzd=1;
  $second=strtotime($row[zddq])-strtotime($sj);
  $day = floor($second/(3600*24));
  $second = $second%(3600*24);//除去整天之后剩余的时间
  $hour = floor($second/3600);
  $second = $second%3600;//除去整小时之后剩余的时间 
  $minute = floor($second/60);
  $second = $second%60;//除去整分钟之后剩余的时间 
  $sjcv=$day."天".$hour."时".$minute."分".$second."秒";
  }
 }
 ?>
 <ul class="listcap">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2">最后更新：<?=$row[sj]?></li>
 </ul>
  <ul class="typelist" onmouseover="this.className='typelist typelist11';" onmouseout="this.className='typelist';">
  <li class="l0"><? if(1==$row[mytj]){?>已<br>推<br>荐<? }?></li>
  <li class="l1">
  <a title="<?=$row["tit"]?>" href="<?=$aurl?>" class="a1">[<?=$row[wylx]?>] <?=returntitdian($row["tit"],78)?></a><br>
  <?=$xjv." | ".returnztv($row[zt],$row[ztsm])?>
  </li>
  <li class="l2"><strong class="feng"><?=returnqiu($row[money1],$row[money2],"万")?></strong></li>
  <li class="l3"><?=$row[djl]?></li>
  <li class="l4 hui">
  <? if(0==$row[zt]){?>
  <? if(0==$ifzd){?>
  <a href="adzd.php?bh=<?=$row[bh]?>&ty=qiugou" class="a1">购买置顶位</a>
  <? }elseif(1==$ifzd){echo "<strong class='red'>已置顶</strong><br>位置:".$row[zdxh]."<br>剩".$sjcv;}?>
  <? }?>
  </li>
  <li class="l5">
  <a href="<?=$aurl?>">修改</a><br>
  <a href="../qiugou/view<?=$row[id]?>.html" target="_blank">预览</a>
  </li>
  </ul>
 <?
 }
 ?>
 
 <div class="npa">
 <?
 $nowurl="qiugoulist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1]."&sd1=".$_GET[sd1];
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
<? include("../template/bottom.html");?>
</body>
</html>