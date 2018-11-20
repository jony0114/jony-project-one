<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<!--B B-->
<div class="bottomy">
 <div class="yjcode">
 <ul class="u1">
 <li class="l1">快速导航</li>
 <li class="l2">
 <a href="<?=weburl?>" class="acy"><?=webname?></a><br>
 <a href="<?=weburl?>loupan/" class="acy"><?=webarea?>新房</a><br>
 <a href="<?=weburl?>second/" class="acy"><?=webarea?>二手房</a><br>
 <a href="<?=weburl?>rent/" class="acy"><?=webarea?>租房</a>
 </li>
 </ul>
 <ul class="u2">
 <li class="l1">帮助中心</li>
 <? 
 while1("*","fcw_helptype where admin=1 order by xh asc limit 8");while($row1=mysql_fetch_array($res1)){
 $aurl="search_j".$row1[id]."v.html";
 if(returncount("fcw_help where ty1id=".$row1[id])==1){
 while3("id,ty1id","fcw_help where ty1id=".$row1[id]." order by sj desc");$row3=mysql_fetch_array($res3);
 $aurl="view".$row3[id].".html";
 }
 ?>
 <li class="l2"><a href="<?=weburl?>help/<?=$aurl?>" class="acy" target="_blank"><?=$row1[name1]?></a></li>
 <? 
 }
 ?>
 </ul>
 <div class="bao"><img src="../homeimg/bao.jpg" width="80" height="81" /></div>
 <ul class="u1">
 <li class="l1">商业合作</li>
 <li class="l2">
 <a href="<?=weburl?>reg/reg.php" class="acy">个人用户加入房产网</a><br>
 <a href="<?=weburl?>reg/reg.php?u=2" class="acy">经纪人入驻</a><br>
 <a href="<?=weburl?>reg/reg.php?u=4" class="acy">中介门店加盟</a><br>
 <a href="<?=weburl?>reg/reg.php?u=5" class="acy">楼盘入驻</a><br>
 </li>
 </ul>
 <ul class="u1 u3">
 <li class="l1">特色服务</li>
 <li class="l2">
 <a href="<?=weburl?>user/mianzhuce.php?control=chushou" class="acy">免费发布出售房源</a><br>
 <a href="<?=weburl?>user/mianzhuce.php?control=chuzu" class="acy">免费发布出租房源</a><br>
 <a href="<?=weburl?>user/mianzhuce.php?control=qiugou" class="acy">免费发布求购信息</a><br>
 <a href="<?=weburl?>user/mianzhuce.php?control=qiuzu" class="acy">免费发布求租信息</a><br>
 </li>
 </ul>
 <div class="bo">
 <?=$rowcontrol[beian]?> <?=webname?> 版权所有 &copy; 2014-2024 客服热线：<?=webtel?> <br>  
声明：本网站所发布的新房、二手房、出租房的价格等信息仅供网友参考，真实信息要以发布者的资料为准。 
 <?=$rowcontrol[webtongji]?>
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
