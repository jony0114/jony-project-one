<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<!--B B-->
<div class="bfb bottomy">
<div class="yjcode">
  <div class="d1">
<? 
while1("*","fcw_helptype where admin=1 order by xh asc limit 8");while($row1=mysql_fetch_array($res1)){
$aurl="search_j".$row1[id]."v.html";
if(returncount("fcw_help where ty1id=".$row1[id])==1){
while3("id,ty1id","fcw_help where ty1id=".$row1[id]." order by sj desc");$row3=mysql_fetch_array($res3);
$aurl="view".$row3[id].".html";
}
?>
<a href="<?=weburl?>help/<?=$aurl?>" class="acy" target="_blank"><?=$row1[name1]?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
<? }?><a href="<?=weburl?>">返回首页</a><br>
Copyright 2014-<?=date("Y")+1?> <?=webname?>,All Rights Reserved 版权所有<br>
客服热线：<?=webtel?>（周一至周五：8:00-7:00） <?=$rowcontrol[beian]?> <?=$rowcontrol[webtongji]?>
  </div>
</div>
</div>
<!--B E-->

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
