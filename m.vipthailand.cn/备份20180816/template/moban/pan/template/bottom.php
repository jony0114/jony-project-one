<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<div class="yjcode">
<!--二维B-->
<div class="ewm" style="display:none;">
 <div class="d1"></div>
 <ul class="u1">
 <li class="l1"><img src="<?=weburl?>template/getqr.php?u=<?=weburl?>m/&size=4" /></li>
 <li class="l2"><span class="s1">手机版找房</span><a href="<?=weburl?>mt/" class="a1">前往入口</a></li>
 </ul>
 <ul class="u1">
 <li class="l1"></li>
 <li class="l2"></li>
 </ul>
 <ul class="u1">
 <li class="l1"></li>
 <li class="l2"></li>
 </ul>
</div>
<!--二维E-->

<!--版权B-->
<div class="bottom">
<? 
while1("*","fcw_helptype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
$aurl="search_j".$row1[id]."v.html";
if(returncount("fcw_help where ty1id=".$row1[id])==1){
while3("id,ty1id","fcw_help where ty1id=".$row1[id]." order by sj desc");$row3=mysql_fetch_array($res3);
$aurl="view".$row3[id].".html";
}
?>
<a href="<?=weburl?>help/<?=$aurl?>" class="acy" target="_blank"><?=$row1[name1]?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
<? }?><a href="<?=weburl?>">返回首页</a><br>
<? $linkarr=array("房产","楼盘","楼盘信息","二手房","出租房","房产经纪人","小区找房","中介公司","卖房赚佣金","房价走势");for($i=0;$i<count($linkarr);$i++){?>
<a href="<?=weburl?>"><?=webarea.$linkarr[$i]?></a>&nbsp;&nbsp;&nbsp;&nbsp;
<? }?>
<br>
Copyright 2014-<?=date("Y")+1?> <a href="<?=weburl?>"><?=webname?></a>,All Rights Reserved 版权所有<br>
站长邮箱：<?=$rowcontrol[adminmail]?>&nbsp;&nbsp;客服热线：<?=webtel?>（周一至周五：8:00-17:00）&nbsp;&nbsp;<?=$rowcontrol[beian]?>&nbsp;&nbsp;<?=$rowcontrol[webtongji]?>
</div>
<!--版权E-->
</div>

<? while1("*","fcw_ad where adbh='ADKF' order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){echo $row1[txt];}?>

<!--***********右侧浮动开始*************-->
<? if($rowcontrol[ifqq]=="on"){?>
<div class="rightfd">

 <div class="d1">
  <span class="s1">在线咨询</span>
  <div class="sd1">
  <?
  $qq=preg_split("/,/",$rowcontrol[webqq]);
  for($qqi=0;$qqi<count($qq);$qqi++){
  $qv=preg_split("/\*/",$qq[$qqi]);
  if($qv[0]!=""){
  if($qv[1]==""){$qtit="网站客服";}else{$qtit=$qv[1];}
  ?>
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$qv[0]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$qtit?></a>
  <? }}?>
  <strong class="fontyh">咨询热线<br><?=webtel?></strong>
  </div>
 </div>

 <div class="d2">
  <span class="s1">扫一扫</span>
  <div class="sd1">
  <img src="<?=weburl?>template/getqr.php?u=<?=weburl."m/"?>&size=3" /><br>手机访问更便捷
  </div>
 </div>

 <div class="d3">
  <span class="s1" onClick="gotoTop();return false;">返回顶部</span>
 </div>
 
</div>
<? }?>
<!--**********右侧浮动结束***************-->
