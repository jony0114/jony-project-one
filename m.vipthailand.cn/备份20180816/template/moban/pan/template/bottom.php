<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<div class="yjcode">
<!--��άB-->
<div class="ewm" style="display:none;">
 <div class="d1"></div>
 <ul class="u1">
 <li class="l1"><img src="<?=weburl?>template/getqr.php?u=<?=weburl?>m/&size=4" /></li>
 <li class="l2"><span class="s1">�ֻ����ҷ�</span><a href="<?=weburl?>mt/" class="a1">ǰ�����</a></li>
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
<!--��άE-->

<!--��ȨB-->
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
<? }?><a href="<?=weburl?>">������ҳ</a><br>
<? $linkarr=array("����","¥��","¥����Ϣ","���ַ�","���ⷿ","����������","С���ҷ�","�н鹫˾","����׬Ӷ��","��������");for($i=0;$i<count($linkarr);$i++){?>
<a href="<?=weburl?>"><?=webarea.$linkarr[$i]?></a>&nbsp;&nbsp;&nbsp;&nbsp;
<? }?>
<br>
Copyright 2014-<?=date("Y")+1?> <a href="<?=weburl?>"><?=webname?></a>,All Rights Reserved ��Ȩ����<br>
վ�����䣺<?=$rowcontrol[adminmail]?>&nbsp;&nbsp;�ͷ����ߣ�<?=webtel?>����һ�����壺8:00-17:00��&nbsp;&nbsp;<?=$rowcontrol[beian]?>&nbsp;&nbsp;<?=$rowcontrol[webtongji]?>
</div>
<!--��ȨE-->
</div>

<? while1("*","fcw_ad where adbh='ADKF' order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){echo $row1[txt];}?>

<!--***********�Ҳม����ʼ*************-->
<? if($rowcontrol[ifqq]=="on"){?>
<div class="rightfd">

 <div class="d1">
  <span class="s1">������ѯ</span>
  <div class="sd1">
  <?
  $qq=preg_split("/,/",$rowcontrol[webqq]);
  for($qqi=0;$qqi<count($qq);$qqi++){
  $qv=preg_split("/\*/",$qq[$qqi]);
  if($qv[0]!=""){
  if($qv[1]==""){$qtit="��վ�ͷ�";}else{$qtit=$qv[1];}
  ?>
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$qv[0]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$qtit?></a>
  <? }}?>
  <strong class="fontyh">��ѯ����<br><?=webtel?></strong>
  </div>
 </div>

 <div class="d2">
  <span class="s1">ɨһɨ</span>
  <div class="sd1">
  <img src="<?=weburl?>template/getqr.php?u=<?=weburl."m/"?>&size=3" /><br>�ֻ����ʸ����
  </div>
 </div>

 <div class="d3">
  <span class="s1" onClick="gotoTop();return false;">���ض���</span>
 </div>
 
</div>
<? }?>
<!--**********�Ҳม������***************-->
